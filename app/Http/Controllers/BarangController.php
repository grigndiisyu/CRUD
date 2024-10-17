<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'harga' => 'required|numeric',
            'qty' => 'required|numeric',
            'unit' => 'required',
        ]);

        Barang::create([
            'name' => $request->name,
            'harga' => $request->harga,
            'qty' => $request->qty,
            'unit' => $request->unit,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data barang!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $barang = Barang::find($id);

        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'harga' => 'required|numeric',
            'qty' => 'required|numeric',
            'unit' => 'required',
        ]);

        Barang::where('id', $id)->update([
            'name' => $request->name,
            'harga' => $request->harga,
            'qty' => $request->qty,
            'unit' => $request->unit,
        ]);

        return redirect()->route('barang.index')->with('edit', 'Data Barang Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Barang::where('id', $id)->delete();

        return redirect()->back()->with('delete', 'Data Barang Berhasil Dihapus!');
    }
}
