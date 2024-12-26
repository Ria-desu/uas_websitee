<?php
namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Barang;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::with('barang')->get();
        return view('pesanan.index', compact('pesanans'));
    }

    public function create()
    {
        $barang = Barang::all()->map(function ($item) {
            return [
                'id' => $item->id,
                'merk' => $item->merk,
                'harga' => $item->harga,
                'stok' => $item->stok,
                'ukuran_tersedia' => explode(',', $item->ukuran) // Pisahkan ukuran jika disimpan dalam format string
            ];
        });
    
        return view('pesanan.create', compact('barang'));
    }
    


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pembeli' => 'required|string|max:255',
            'ukuran_id' => 'required|numeric',
            'barang_id' => 'required|exists:barang,id',
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric|min:1',
        ]);

        $barang = Barang::findOrFail($validated['barang_id']);

        if ($barang->stok < $validated['jumlah']) {
            return back()->with('error', 'Stok tidak mencukupi!');
        }

        // Kurangi stok barang
        $barang->decrement('stok', $validated['jumlah']);

        // Simpan pesanan
        Pesanan::create([
            'nama_pembeli' => $validated['nama_pembeli'],
            'barang_id' => $validated['barang_id'],
            'ukuran_id' => $validated['ukuran_id'],
            'harga' => $validated['harga'] * $validated['jumlah'], // Total harga
            'jumlah' => $validated['jumlah'],
            'tanggal_pesan' => now(),
        ]);

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dibuat');
    }

    public function edit($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $barang = Barang::all();
        return view('pesanan.edit', compact('pesanan', 'barang'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_pembeli' => 'required|string|max:255',
            'ukuran_id' => 'required|numeric',
            'barang_id' => 'required|exists:barang,id',
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric|min:1',
        ]);

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->update($validated);

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->delete();

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dihapus');
    }

    public function laporan(Request $request)
    {
        // Ambil filter merk dan bulan dari request
        $filterMerk = $request->input('merk');
        $filterBulan = $request->input('bulan');

        // Ambil daftar semua merk untuk dropdown filter
        $merkList = Barang::pluck('merk')->unique();

        // Ambil daftar bulan dari data pesanan
        $bulanList = Pesanan::selectRaw('DATE_FORMAT(tanggal_pesan, "%Y-%m") as bulan')
            ->groupBy('bulan')
            ->pluck('bulan');

        // Query laporan
        $laporan = Pesanan::selectRaw(
            'barang.merk as merk, DATE_FORMAT(pesanan.tanggal_pesan, "%Y-%m") as bulan, SUM(pesanan.jumlah) as jumlah, SUM(pesanan.harga) as pendapatan'
        )
            ->join('barang', 'pesanan.barang_id', '=', 'barang.id')
            ->when($filterMerk, function ($query) use ($filterMerk) {
                $query->where('barang.merk', $filterMerk);
            })
            ->when($filterBulan, function ($query) use ($filterBulan) {
                $query->whereRaw('DATE_FORMAT(pesanan.tanggal_pesan, "%Y-%m") = ?', [$filterBulan]);
            })
            ->groupBy('barang.merk', 'bulan')
            ->orderBy('bulan', 'desc')
            ->get();

        return view('laporan.laporan', compact('laporan', 'merkList', 'bulanList'));
    }



    public function exportPdf(Request $request)
    {
        // Ambil data laporan yang difilter
        $filterMerk = $request->input('merk');
        $filterBulan = $request->input('bulan');

        $laporan = Pesanan::selectRaw(
            'barang.merk as merk, DATE_FORMAT(pesanan.tanggal_pesan, "%Y-%m") as bulan, SUM(pesanan.jumlah) as jumlah, SUM(pesanan.harga) as pendapatan'
        )
            ->join('barang', 'pesanan.barang_id', '=', 'barang.id')
            ->when($filterMerk, function ($query) use ($filterMerk) {
                $query->where('barang.merk', $filterMerk);
            })
            ->when($filterBulan, function ($query) use ($filterBulan) {
                $query->whereRaw('DATE_FORMAT(pesanan.tanggal_pesan, "%Y-%m") = ?', [$filterBulan]);
            })
            ->groupBy('barang.merk', 'bulan')
            ->orderBy('bulan', 'desc')
            ->get();

        // Export PDF menggunakan view laporan.pdf
        $pdf = PDF::loadView('laporan.pdf', compact('laporan'));
        return $pdf->download('laporan-penjualan.pdf');
    }

}
