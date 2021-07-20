<?php

namespace App\Http\Controllers\Admin;

use App\Dosen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosens = Dosen::all();
        return view('backend.dosen.index', compact('dosens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.dosen.create');
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
            'nip.unique' => 'Maaf, NIP ini sudah digunakan dosen lain',
            'email.unique' => 'Maaf, Email ini sudah digunakan user lain'
        ];
        $request->validate([
            'nama_dosen' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:dosen',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], $message);
        $user = User::create([
            'name' => $request->input('nama_dosen'),
            'email' => $request->input('email'),
            'id_role' => 2,
            'password' => \bcrypt($request->input('password'))
        ]);
        Dosen::create([
            'id_user' => $user->id,
            'nama_dosen' => $request->input('nama_dosen'),
            'nip' => $request->input('nip'),
        ]);
        return redirect()->route('dosen.index')->with('create', 'Data dosen berhasil ditambahkan');
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
        $dosen = Dosen::findOrFail($id);
        $user = User::where('id', $dosen->id_user)->get()->first();
        return view('backend.dosen.edit', compact('dosen', 'user'));
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
        $dosen = Dosen::findOrFail($id);
        $user = User::where('id', $dosen->id_user)->get()->first();
        $message = [
            'nip.unique' => 'Maaf, NIP ini sudah digunakan dosen lain',
            'email.unique' => 'Maaf, Email ini sudah digunakan user lain'
        ];
        $request->validate([
            'nama_dosen' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:dosen,nip,' . $dosen->id_dosen . ',id_dosen',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ], $message);
        $data = $request->all();
        $dosen->update($data);
        $user->update([
            'name' => $dosen->nama_dosen,
            'email' => $request->input('email'),
        ]);
        return redirect()->route('dosen.index')->with('update', 'Data dosen berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        return redirect()->route('dosen.index')->with('delete', 'Data dosen berhasil dihapus');
    }
}
