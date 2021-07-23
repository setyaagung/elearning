<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Dosen;
use App\Model\Mahasiswa;
use App\Model\MataKuliah;
use App\Model\Materi;

class DashboardController extends Controller
{
    public function index()
    {
        $dosen = Dosen::count();
        $mahasiswa = Mahasiswa::count();
        $matakuliah = MataKuliah::count();
        $materi = Materi::count();
        return view('backend.dashboard', \compact('dosen', 'mahasiswa', 'matakuliah', 'materi'));
    }
}
