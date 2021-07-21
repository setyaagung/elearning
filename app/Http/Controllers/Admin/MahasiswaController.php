<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Kelas;
use App\Model\Mahasiswa;
use App\User;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('backend.mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelases =  Kelas::all();
        return view('backend.mahasiswa.create', compact('kelases'));
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
            'nim.unique' => 'Maaf, NIM ini sudah digunakan mahasiswa lain',
        ];
        $request->validate([
            'id_kelas' => 'required',
            'nim' => 'required|string|max:255|unique:mahasiswa',
            'nama_mahasiswa' => 'required|string|max:255',
            'progdi' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], $message);
        $user = User::create([
            'name' => $request->input('nama_mahasiswa'),
            'email' => $request->input('email'),
            'password' => \bcrypt($request->input('password')),
            'id_role' => 3
        ]);
        Mahasiswa::create([
            'id_user' => $user->id,
            'id_kelas' => $request->input('id_kelas'),
            'nim' => $request->input('nim'),
            'nama_mahasiswa' => $request->input('nama_mahasiswa'),
            'progdi' => $request->input('progdi'),
        ]);
        return redirect()->route('mahasiswa.index')->with('create', 'Data mahasiswa berhasil ditambahkan');
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
        $mahasiswa = Mahasiswa::findOrFail($id);
        $user = User::where('id', $mahasiswa->id_user)->get()->first();
        $kelases =  Kelas::all();
        return view('backend.mahasiswa.edit', compact('mahasiswa', 'user', 'kelases'));
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
        $mahasiswa = Mahasiswa::findOrFail($id);
        $user = User::where('id', $mahasiswa->id_user)->get()->first();

        $message = [
            'nim.unique' => 'Maaf, NIM ini sudah digunakan mahasiswa lain',
        ];
        $request->validate([
            'id_kelas' => 'required',
            'nim' => 'required|string|max:255|unique:mahasiswa,nim,' . $mahasiswa->id_mahasiswa . ',id_mahasiswa',
            'nama_mahasiswa' => 'required|string|max:255',
            'progdi' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ], $message);
        $user->update([
            'name' => $request->input('nama_mahasiswa'),
            'email' => $request->input('email'),
        ]);
        $mahasiswa->update([
            'id_user' => $user->id,
            'id_kelas' => $request->input('id_kelas'),
            'nim' => $request->input('nim'),
            'nama_mahasiswa' => $request->input('nama_mahasiswa'),
            'progdi' => $request->input('progdi'),
        ]);
        return redirect()->route('mahasiswa.index')->with('update', 'Data mahasiswa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('delete', 'Data mahasiswa berhasil dihapus');
    }
}
