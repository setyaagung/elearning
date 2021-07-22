<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\MataKuliah;
use App\Model\Materi;
use Illuminate\Support\Facades\Auth;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->id_role == 1) {
            $materis = Materi::all();
        } else {
            $materis = Materi::where('id_user', Auth::user()->id)->get();
        }
        return view('backend.materi.index', \compact('materis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matkuls = MataKuliah::orderBy('nama_matkul', 'ASC')->get();
        return view('backend.materi.create', compact('matkuls'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_matkul' => 'required',
            'deskripsi' => 'required',
            'semester' => 'required'
        ]);
        $data = $request->all();
        $data['id_user'] = Auth::user()->id;
        Materi::create($data);
        return redirect()->route('materi.index')->with('create', 'Data materi berhasil ditambahkan');
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
        $materi = Materi::findOrFail($id);
        $matkuls = MataKuliah::orderBy('nama_matkul', 'ASC')->get();
        return view('backend.materi.create', compact('materi', 'matkuls'));
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
        $materi = Materi::findOrFail($id);
        $request->validate([
            'id_matkul' => 'required',
            'deskripsi' => 'required',
            'semester' => 'required'
        ]);
        $data = $request->all();
        $materi->update($data);
        return redirect()->route('materi.index')->with('update', 'Data materi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materi = Materi::findOrFail($id);
        $materi->delete();
        return redirect()->route('materi.index')->with('delete', 'Data materi berhasil dihapus');
    }
}
