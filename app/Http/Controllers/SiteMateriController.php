<?php

namespace App\Http\Controllers;

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
            $materis = Materi::where('kategori', '!=', 'Managemen')->orderBy('semester', 'ASC')->get();
        } else {
            $materis = Materi::where('kategori', '!=', 'Akuntansi')->orderBy('semester', 'ASC')->get();
        }
        return view('frontend.materi.index', \compact('materis'));
    }
}
