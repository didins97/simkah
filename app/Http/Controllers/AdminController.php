<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        return view('admin.admin.index', [
            'users' => User::where('level', 'admin')->get()
        ]);
    }

    public function store(Request $request){
        // return $request->all();
        $request->validate([
            'nama_belakang' => 'required',
            'nama_depan' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nohp' => '-',
            'level' => 'admin'
        ]);

        return redirect()->route('admin.index');
    }

    public function edit($id){
        $data = User::where('id', $id)->first();
        return response()->json($data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama_belakang' => 'required',
            'nama_depan' => 'required',
            'email' => 'required',
            // 'password' => 'required'
        ]);

        $user = User::where('id', $id)->first();

        $user->update([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'email' => $request->email,
            // 'password' => Hash::make($request->password),
            'nohp' => '-',
            'level' => 'admin'
        ]);

        return redirect()->route('admin.index');
    }

    public function delete($id){
        $user = User::where('id', $id)->first();
        $user->delete();

        return ['success' => true];
    }
}
