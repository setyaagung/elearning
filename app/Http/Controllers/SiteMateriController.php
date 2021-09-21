<?php

namespace App\Http\Controllers;

use App\Model\Absensi;
use App\Model\DetailMateri;
use App\Model\Mahasiswa;
use App\Model\Materi;
use App\Model\Tugas;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SiteMateriController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::where('id_user', Auth::user()->id)->first();
        $user = User::where('id', Auth::user()->id)->where('id_role', '!=', 3)->first();
        if ($user) {
            $materis = Materi::where('status', 1)->orderBy('semester', 'ASC')->filter(request(['search']))->paginate(12);
        } elseif ($mahasiswa->progdi == 'S1 - Akuntansi') {
            $materis = Materi::where('kategori', '!=', 'Managemen')->where('status', 1)->orderBy('semester', 'ASC')->filter(request(['search']))->paginate(12);
        } elseif ($mahasiswa->progdi == 'S1 - Managemen') {
            $materis = Materi::where('kategori', '!=', 'Akuntansi')->where('status', 1)->orderBy('semester', 'ASC')->filter(request(['search']))->paginate(12);
        } else {
            return \abort(404);
        }
        return view('frontend.materi.index', \compact('materis'));
    }

    public function detail_course($id)
    {
        $materi = Materi::findOrFail($id);
        $details = DetailMateri::where('id_materi', $materi->id_materi)->where('status', 1)->get();
        return view('frontend.materi.detail', \compact('materi', 'details'));
    }
    public function course($id, $slug)
    {
        $materi = Materi::findOrFail($id);
        $detail = DetailMateri::where('slug', $slug)->first();
        return view('frontend.materi.course', compact('materi', 'detail'));
    }

    public function absensi(Request $request, $id, $slug)
    {
        $materi = Materi::findOrFail($id);
        $detail = DetailMateri::where('slug', $slug)->first();
        $mahasiswa = Mahasiswa::where('id_user', Auth::user()->id)->first();
        $data = $request->all();
        $data['id_detail_materi'] = $detail->id_detail_materi;
        $data['id_mahasiswa'] = $mahasiswa->id_mahasiswa;
        $data['waktu'] = \Carbon\Carbon::now();
        $absensi = Absensi::where([
            ['id_mahasiswa', $mahasiswa->id_mahasiswa],
            ['id_detail_materi', $detail->id_detail_materi]
        ])->first();
        if (!$absensi) {
            Absensi::create($data);
            return redirect()->back()->with('success', 'Anda telah berhasil melakukan absensi pada pertemuan materi mata kuliah ini');
        } else {
            return redirect()->back()->with('error', 'Anda sudah melakukan absensi pada pertemuan materi mata kuliah ini');
        }
    }

    public function upload_tugas(Request $request, $id, $slug)
    {
        $materi = Materi::findOrFail($id);
        $detail = DetailMateri::where('slug', $slug)->first();
        $mahasiswa = Mahasiswa::where('id_user', Auth::user()->id)->first();
        $data = $request->all();
        $data['id_detail_materi'] = $detail->id_detail_materi;
        $data['id_mahasiswa'] = $mahasiswa->id_mahasiswa;
        $tugas = Tugas::where([
            ['id_mahasiswa', $mahasiswa->id_mahasiswa],
            ['id_detail_materi', $detail->id_detail_materi]
        ])->first();
        $request->validate([
            'file' => 'required|mimes:pdf,|max:5096',
        ]);
        if (!$tugas) {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $file_extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $file_extension;
                $data['file'] = Storage::putFileAs('public/tugas/file', $request->file('file'), $filename);
            }
            Tugas::create($data);
            return redirect()->back()->with('upload', 'Anda telah berhasil mengunggah tugas yang telah diberikan dosen pada pertemuan mata kuliah ini');
        } else {
            return redirect()->back()->with('gagal', 'Anda sudah mengunggah tugas yang diberikan dosen pada pertemuan materi mata kuliah ini');
        }
    }
}
