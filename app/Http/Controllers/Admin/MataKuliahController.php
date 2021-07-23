<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\MataKuliah;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matkuls = MataKuliah::orderBy('nama_matkul', 'ASC')->get();
        return view('backend.matakuliah.index', compact('matkuls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.matakuliah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'nama_matkul.unique' => 'Maaf, Mata Kuliah ini sudah diada dalam data',
        ];
        $request->validate([
            'nama_matkul' => 'required|string|max:255|unique:mata_kuliah',
        ], $message);
        $data = $request->all();
        MataKuliah::create($data);
        return redirect()->route('matakuliah.index')->with('create', 'Data mata kuliah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matkul = MataKuliah::findOrFail($id);
        return view('backend.matakuliah.edit', \compact('matkul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $matkul = MataKuliah::findOrFail($id);
        $message = [
            'nama_matkul.unique' => 'Maaf, Mata Kuliah ini sudah diada dalam data',
        ];
        $request->validate([
            'nama_matkul' => 'required|string|max:255|unique:mata_kuliah,nama_matkul,' . $matkul->id_matkul . ',id_matkul',
        ], $message);
        $data = $request->all();
        $matkul->update($data);
        return redirect()->route('matakuliah.index')->with('update', 'Data mata kuliah berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matkul = MataKuliah::findOrFail($id);
        $matkul->delete();
        return redirect()->route('matakuliah.index')->with('delete', 'Data mata kuliah berhasil dihapus');
    }
}
