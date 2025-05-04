<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;


class produkcontroller extends Controller
{
    public function produkpage(Request $request){

        $query = DB::table('produk'); 

        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                $q->where('nama_produk', 'like', "%{$search}%")
                  ->orWhere('id_produk', $search); // cocokkan ID secara tepat
            });
        }

        $produk = $query->paginate(10); // atau ->get() jika tidak ingin paginate

        return view('produk', ['produk' => $produk]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('gambar_produk', 'public');
        }

        DB::table('produk')->insert([
            'nama_produk' => $request->nama_produk,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'gambar' => $gambarPath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('berhasil', 'Produk berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $produk = DB::table('produk')->where('id_produk', $id)->first();

        $gambarPath = $produk->gambar;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('gambar_produk', 'public');
        }

        DB::table('produk')->where('id_produk', $id)->update([
            'nama_produk' => $request->nama_produk,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'gambar' => $gambarPath,
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('berhasil', 'Produk berhasil diperbarui.');
    }

    public function delete($id)
    {
        DB::table('produk')->where('id_produk', $id)->delete();
        return redirect()->back()->with('berhasil', 'Produk berhasil dihapus.');
    }

    public function exportPdf()
    {
        $produks = DB::table('produk')->get();

        $pdf = Pdf::loadView('pdf_produk', compact('produks'));

        // Tampilkan di browser, bukan download
        return $pdf->stream('data_produk.pdf');
    }

}
