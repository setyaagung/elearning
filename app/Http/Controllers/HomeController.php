<?php

namespace App\Http\Controllers;

use App\Model\Kelas;
use App\Model\Mahasiswa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $mahasiswa = Mahasiswa::where('id_user', $user->id)->first();
        $kelases = Kelas::all();
        return view('frontend.profile', compact('user', 'mahasiswa', 'kelases'));
    }

    public function update_profile(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $mahasiswa = Mahasiswa::where('id_user', $user->id)->first();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id . ',id',
            'nim' => 'required|string|max:255|unique:mahasiswa,nim,' . $mahasiswa->id_mahasiswa . ',id_mahasiswa',
            'id_kelas' => 'required',
            'progdi' => 'required|string|max:255',
        ]);
        $data = $request->all();
        $user->update($data);
        $mahasiswa->update([
            'id_user' => $user->id,
            'id_kelas' => $request->input('id_kelas'),
            'nim' => $request->input('nim'),
            'nama_mahasiswa' => $request->input('name'),
            'progdi' => $request->input('progdi')
        ]);
        return redirect()->back()->with('update', 'Profil anda berhasil diperbarui');
    }

    public function show_password()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('auth.passwords.ganti-password', compact('user'));
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
