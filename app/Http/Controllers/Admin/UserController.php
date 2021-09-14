<?php

namespace App\Http\Controllers\Admin;

use App\Dosen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Role;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('backend.user.create', \compact('roles'));
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
            'email.unique' => 'Maaf, Email ini sudah digunakan user lain'
        ];
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'id_role' => 'required'
        ], $message);
        $data = $request->all();
        $data['password'] = bcrypt($request->input('password'));
        User::create($data);
        return redirect()->route('user.index')->with('create', 'Data user berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.reset-password', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('backend.user.edit', compact('user', 'roles'));
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
        $user = User::findOrFail($id);
        $message = [
            'email.unique' => 'Maaf, Email ini sudah digunakan user lain'
        ];
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'id_role' => 'required'
        ], $message);
        $data = $request->all();
        $user->update($data);
        return redirect()->route('user.index')->with('update', 'Data user berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('delete', 'Data user berhasil dihapus');
    }
    public function update_status($id)
    {
        $user = User::findOrFail($id);
        if ($user->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        $user->status = $status;
        $user->update();
    }

    public function reset_password(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);
        //$data = $request->all();
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return redirect()->route('user.index')->with('update', 'Password berhasil direset');
    }
}
