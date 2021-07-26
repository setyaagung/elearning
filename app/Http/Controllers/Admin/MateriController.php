<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\DetailMateri;
use App\Model\MataKuliah;
use App\Model\Materi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            'kategori' => 'required|string|max:255',
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
        $materi = Materi::findOrFail($id);
        $details = DetailMateri::where('id_materi', $materi->id_materi)->get();
        return view('backend.materi.show', \compact('materi', 'details'));
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
        return view('backend.materi.edit', compact('materi', 'matkuls'));
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
            'kategori' => 'required|string|max:255',
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
    public function create_detail($id_materi)
    {
        $materi = Materi::where('id_materi', $id_materi)->first();
        return view('backend.materi.create_detail', compact('materi'));
    }

    public function store_detail(Request $request)
    {
        //$materi = Materi::where('id_materi', $id_materi)->first();
        $request->validate([
            'judul' => 'required|string|max:255',
            'video' => 'mimes:mp4,mov,ogg,qt|max:50000',
            'file' => 'mimes:pdf,ppt,pptx|max:5096',
            'deskripsi' => 'required'
        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($request->input('judul'));
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $file_extension;
            $data['file'] = Storage::putFileAs('public/materi/file', $request->file('file'), $filename);
        }
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $video_extension = $video->getClientOriginalExtension();
            $videoname = time() . '.' . $video_extension;
            $data['video'] = Storage::putFileAs('public/materi/video', $request->file('video'), $videoname);
        }
        DetailMateri::create($data);
        return redirect()->back()->with('create', 'Materi baru berhasil dibuat. Silahkan tambah materi lagi');
    }
    public function edit_detail($id_materi, $id)
    {
        $materi = Materi::where('id_materi', $id_materi)->first();
        $detail = DetailMateri::findOrFail($id);
        return view('backend.materi.edit_detail', compact('materi', 'detail'));
    }

    public function update_detail(Request $request, $id_materi, $id)
    {
        $materi = Materi::where('id_materi', $id_materi)->first();
        $detail = DetailMateri::findOrFail($id);
        $request->validate([
            'judul' => 'required|string|max:255',
            'video' => 'mimes:mp4,mov,ogg,qt|max:20000',
            'file' => 'mimes:pdf,ppt,pptx|max:5096',
            'deskripsi' => 'required',
        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($request->input('judul'));
        if ($request->hasFile('file')) {
            Storage::delete($detail->file);
            $file = $request->file('file');
            $file_extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $file_extension;
            $data['file'] = Storage::putFileAs('public/materi/file', $request->file('file'), $filename);
        }
        if ($request->hasFile('video')) {
            Storage::delete($detail->video);
            $video = $request->file('video');
            $video_extension = $video->getClientOriginalExtension();
            $videoname = time() . '.' . $video_extension;
            $data['video'] = Storage::putFileAs('public/materi/video', $request->file('video'), $videoname);
        }
        $detail->update($data);
        return redirect()->route('materi.show', $materi->id_materi)->with('update', 'Materi baru berhasil diperbarui');
    }

    public function destroy_detail($id_materi, $id)
    {
        $materi = Materi::where('id_materi', $id_materi)->first();
        $detail = DetailMateri::findOrFail($id);
        Storage::delete($detail->file);
        Storage::delete($detail->video);
        $detail->delete();
        return redirect()->back()->with('delete', 'Materi berhasil dihapus');
    }
    public function update_status($id)
    {
        $detail = DetailMateri::findOrFail($id);
        if ($detail->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        $detail->status = $status;
        $detail->update();
    }
}
