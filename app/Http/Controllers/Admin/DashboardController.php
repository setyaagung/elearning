<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Dosen;
use App\Model\Mahasiswa;
use App\Model\MataKuliah;
use App\Model\Materi;
use App\User;
use Illuminate\Support\Facades\Auth;

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

    public function show_password()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('backend.ganti-password', compact('user'));
    }

    public function ganti_password(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();

        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);
        //$data = $request->all();
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return redirect()->back()->with('update', 'Password berhasil diperbarui');
    }
}
