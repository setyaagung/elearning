<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\DetailPerkuliahan;
use App\Model\MataKuliah;
use App\Model\Perkuliahan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PerkuliahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->id_role == 2) {
            $perkuliahans = Perkuliahan::where('id_user', Auth::user()->id)->get();
        } else {
            $perkuliahans = Perkuliahan::all();
        }
        return view('backend.perkuliahan.index', \compact('perkuliahans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matkuls = MataKuliah::orderBy('nama_matkul', 'ASC')->get();
        return view('backend.perkuliahan.create', \compact('matkuls'));
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
            'program_studi' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'semester' => 'required|string|max:255'
        ]);
        $data = $request->all();
        $data['id_user'] = Auth::user()->id;
        Perkuliahan::create($data);
        return redirect()->route('perkuliahan.index')->with('create', 'Data buku kemajuan perkuliahan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perkuliahan = Perkuliahan::findOrFail($id);
        $details = DetailPerkuliahan::where('id_perkuliahan', $perkuliahan->id_perkuliahan)->orderBy('tanggal', 'ASC')->get();
        return view('backend.perkuliahan.show', \compact('perkuliahan', 'details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perkuliahan = Perkuliahan::findOrFail($id);
        $matkuls = MataKuliah::orderBy('nama_matkul', 'ASC')->get();
        return view('backend.perkuliahan.edit', \compact('perkuliahan', 'matkuls'));
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
        $perkuliahan = Perkuliahan::findOrFail($id);
        $request->validate([
            'id_matkul' => 'required',
            'program_studi' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'semester' => 'required|string|max:255'
        ]);
        $data = $request->all();
        $perkuliahan->update($data);
        return redirect()->route('perkuliahan.index')->with('update', 'Data buku kemajuan perkuliahan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perkuliahan = Perkuliahan::findOrFail($id);
        $perkuliahan->delete();
        return redirect()->route('perkuliahan.index')->with('delete', 'Data buku kemajuan perkuliahan berhasil dihapus');
    }

    public function create_detail($id_perkuliahan)
    {
        $perkuliahan = Perkuliahan::where('id_perkuliahan', $id_perkuliahan)->first();
        return view('backend.perkuliahan.create_detail', compact('perkuliahan'));
    }

    public function store_detail(Request $request)
    {
        //$perkuliahan = perkuliahan::where('id_perkuliahan', $id_perkuliahan)->first();
        $request->validate([
            'tanggal' => 'required',
            'file' => 'mimes:pdf,|max:5096',
        ]);
        $data = $request->all();
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $file_extension;
            $data['file'] = Storage::putFileAs('public/perkuliahan/file', $request->file('file'), $filename);
        }
        DetailPerkuliahan::create($data);
        return redirect()->back()->with('create', 'Buku kemajuan perkuliahan baru berhasil ditambahkan. Silahkan tambah buku kemajuan lagi');
    }
    public function edit_detail($id_perkuliahan, $id)
    {
        $perkuliahan = Perkuliahan::where('id_perkuliahan', $id_perkuliahan)->first();
        $detail = DetailPerkuliahan::findOrFail($id);
        return view('backend.perkuliahan.edit_detail', compact('perkuliahan', 'detail'));
    }

    public function update_detail(Request $request, $id_perkuliahan, $id)
    {
        $perkuliahan = Perkuliahan::where('id_perkuliahan', $id_perkuliahan)->first();
        $detail = DetailPerkuliahan::findOrFail($id);
        $request->validate([
            'tanggal' => 'required',
            'file' => 'mimes:pdf,|max:5096',
        ]);
        $data = $request->all();
        if ($request->hasFile('file')) {
            Storage::delete($detail->file);
            $file = $request->file('file');
            $file_extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $file_extension;
            $data['file'] = Storage::putFileAs('public/perkuliahan/file', $request->file('file'), $filename);
        }
        $detail->update($data);
        return redirect()->route('perkuliahan.show', $perkuliahan->id_perkuliahan)->with('update', 'Buku kemajuan perkuliahan berhasil diperbarui');
    }

    public function destroy_detail($id_perkuliahan, $id)
    {
        $perkuliahan = perkuliahan::where('id_perkuliahan', $id_perkuliahan)->first();
        $detail = Detailperkuliahan::findOrFail($id);
        Storage::delete($detail->file);
        $detail->delete();
        return redirect()->back()->with('delete', 'Buku kemajuan perkuliahan berhasil dihapus');
    }
}
