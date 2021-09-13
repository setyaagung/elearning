<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Kelas;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelases = Kelas::all();
        return view('backend.kelas.index', compact('kelases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.kelas.create');
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
            'kode_kelas.unique' => 'Maaf, kode kelas ini sudah digunakan kelas lain',
        ];
        $request->validate([
            'kode_kelas' => 'required|string|max:255|unique:kelas',
            'nama_kelas' => 'required|string|max:255',
        ], $message);
        $data = $request->all();
        Kelas::create($data);
        return redirect()->route('kelas.index')->with('create', 'Data kelas berhasil ditambahkan');
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
        $kelas = Kelas::findOrFail($id);
        return view('backend.kelas.edit', \compact('kelas'));
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
        $kelas = Kelas::findOrFail($id);
        $message = [
            'kode_kelas.unique' => 'Maaf, kode kelas ini sudah digunakan kelas lain',
        ];
        $request->validate([
            'kode_kelas' => 'required|string|max:255|unique:kelas,kode_kelas,' . $kelas->id_kelas . ',id_kelas',
            'nama_kelas' => 'required|string|max:255',
        ], $message);
        $data = $request->all();
        $kelas->update($data);
        return redirect()->route('kelas.index')->with('update', 'Data kelas berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->route('kelas.index')->with('delete', 'Data kelas berhasil dihapus');
    }
}
