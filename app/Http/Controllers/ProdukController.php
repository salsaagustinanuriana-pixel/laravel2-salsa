<?php
namespace App\Http\Controllers;

use App\Models\ProdukStock;
use Illuminate\Http\Request;

class ProdukStockController extends Controller
{
    public function index()
    {
        $produk = ProdukStock::all();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:100',
            'harga'       => 'required|numeric',
            'stok'        => 'required|integer',
        ]);

        ProdukStock::create($request->all());
        return redirect()->route('produk-stock.index')->with('success', 'Data produk berhasil disimpan.');
    }

    public function show($id)
    {
        $produk = ProdukStock::findOrFail($id);
        return view('produk.show', compact('produk'));
    }

    public function edit($id)
    {
        $produk = ProdukStock::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = ProdukStock::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required|string|max:100',
            'harga'       => 'required|numeric',
            'stok'        => 'required|integer',
        ]);

        $produk->update($request->all());
        return redirect()->route('produk-stock.index')->with('success', 'Data produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        ProdukStock::findOrFail($id)->delete();
        return redirect()->route('produk-stock.index')->with('success', 'Data produk berhasil dihapus.');
    }
}
