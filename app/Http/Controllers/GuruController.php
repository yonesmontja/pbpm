<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Guru;
use App\Models\User;

class GuruController extends Controller
{
    //
    public function profile($id)
    {
    	$guru = Guru::find($id);
    	return view('guru.profile',['guru' => $guru]);
    }
    public function index()
    {
    	$data_guru = \App\Models\Guru::all();
    	return view('guru.index',['data_guru' => $data_guru]);
    }
    public function gurucreate(Request $request)
    {
        $this -> validate($request,[
            'nama_guru' => 'required|min:3',
            'kode_guru' => 'required',
            'email' => 'required|email|unique:users',
            'jk' => 'required',
            'status' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'avatar' => 'mimes:jpeg,jpg,png',
        ]);

        //insert ke tabel Users
        $user = new \App\Models\User;
        $user -> role = 'guru';
        $user -> name = $request -> nama_guru;
        $user -> email = $request -> email;
        $user -> password = bcrypt('rahasia');
        $user -> remember_token = Str::random(60);
        $user -> save();
        //insert ke tabel Guru
        $request -> request -> add(['user_id' => $user -> id]);
        $guru = \App\Models\Guru::create($request -> all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $guru->avatar= $request->file('avatar')->getClientOriginalName();
            $guru->save();
        }
        //return $request -> all();
        return redirect('/guru')->with('sukses','berhasil diinput');    	
    }
}
