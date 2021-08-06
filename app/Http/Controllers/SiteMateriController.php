<?php

namespace App\Http\Controllers;

use App\Model\DetailMateri;
use App\Model\Mahasiswa;
use App\Model\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteMateriController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::where('id_user', Auth::user()->id)->first();
        if ($mahasiswa->progdi == 'S1 - Akuntansi') {
            $materis = Materi::where('kategori', '!=', 'Managemen')->where('status', 1)->orderBy('semester', 'ASC')->filter(request(['search']))->paginate(12);
        } else {
            $materis = Materi::where('kategori', '!=', 'Akuntansi')->where('status', 1)->orderBy('semester', 'ASC')->filter(request(['search']))->paginate(12);
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
}
