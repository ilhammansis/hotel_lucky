<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['user']=User::all();
        $data['judul']='Data Pengguna';
        return view('user.user_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list_pengguna']=[
            'Admin',
            'Staff'
        ];
        return view('user.user_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'username'=>'required|unique:users,username',
            'email'=>'required|unique:users,email',
            'role'=>'required',
            'no_telepon'=>'required',
            'password'=>'password'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->no_telepon = $request->no_telepon;
        $user->password = $request->password;
        $user->save();

        return redirect('/user')->with('Pesan', 'Data Sudah Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['user'] = User::findOrFail($id);
        $data['list_pengguna']=[
            'Admin',
            'Staff',
            'Tamu'
        ];
        return view('user.user_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'username'=>'required|unique:users,username'.$id,
            'email'=>'required|unique:users,email'.$id,
            'role'=>'required',
            'no_telepon'=>'required',
            'password'=>'password'
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->no_telepon = $request->no_telepon;
        $user->password = $request->password;
        $user->save();

        return redirect('/user')->with('Pesan','Data Sudah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('Pesan','Data Sudah Dihapus');
    }
}
