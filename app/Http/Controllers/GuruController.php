<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class GuruController extends Controller
{
    //
    public function profile($id)
    {
    	$guru = Guru::find($id);
        //dd($guru -> mapel);
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
        $avatar = $request->file('avatar')->move(public_path('storage\guru'),$request->file('avatar')->getClientOriginalName().".".$request->file('avatar')->getClientOriginalExtension());
        $file_name = rand(1000, 9999) . $request->file('avatar')->getClientOriginalName();
        $img = Image::make($avatar);
        $img->resize('120', '120')->save(public_path('storage\guru') . '\small_' . $file_name);
        $avatar->move(public_path('storage\guru'), $file_name);
        //insert ke tabel Users
        $user = new User();
        $user -> role = 'guru';
        $user -> name = $request -> nama_guru;
        $user -> email = $request -> email;
        $user -> password = bcrypt('rahasia');
        $user -> remember_token = Str::random(60);
        $user -> avatar = $file_name;
        $user -> save();
        //insert ke tabel Guru
        $input = $request->all();
        $user_id = $user->id;
        $guru = new Guru();
        //$request -> request -> add(['user_id' => $user -> id]);
        $guru -> user_id = $user_id;
        $guru -> nama_guru = $input['nama_guru'];
        $guru -> telpon = $input['telpon'];
        $guru -> alamat = $input['alamat'];
        $guru -> kode_guru = $input['kode_guru'];
        $guru -> jk = $input['jk'];
        $guru -> is_bk = $input['is_bk'];
        $guru -> stat_data = $input['stat_data'];
        $guru -> status = $input['status'];
        $guru -> email = $input['email'];
        $guru -> avatar = $file_name;
        $guru->save();
        //return $request -> all();
        return redirect('/guru')->with('sukses','berhasil diinput');
    }
    public function guruedit(Guru $guru)
    {
        return view('guru/guruedit',['guru'=>$guru]);
    }
    public function guruupdate(Request $request, Guru $guru)
    {

        $guru ->update($request->all());
        //if($request->hasFile('avatar')){
        //    $request->file('avatar')->move('/images/',$request->file('avatar')->getClientOriginalName());
        //    $guru->avatar= $request->file('avatar')->getClientOriginalName();
        //    $guru->save();
        //}
        if ($request->hasFile('avatar')) {
            $guru->delete_avatar();
            $avatar = $request->file('avatar')->move(public_path('storage/guru/'), $request->file('avatar')->getClientOriginalName() . "." . $request->file('avatar')->getClientOriginalExtension());

            $file_name = rand(1000, 9999) . $request->file('avatar')->getClientOriginalName();
            $img = Image::make($avatar);
            $img->resize('120', '120')->save(public_path('storage/guru') . '/small_' . $file_name);
            $avatar->move(public_path('storage/guru'), $file_name);
            $guru->avatar = $file_name;
        }
        //$user = new User();
        //insert ke tabel Guru
        $input = $request->all();
        //$user_id = $user->id;
        //$guru = new Guru();
        //$request -> request -> add(['user_id' => $user -> id]);
        $guru -> user_id = $input['user_id'];
        $guru -> nama_guru = $input['nama_guru'];
        $guru -> telpon = $input['telpon'];
        $guru -> alamat = $input['alamat'];
        $guru -> kode_guru = $input['kode_guru'];
        $guru -> jk = $input['jk'];
        $guru -> is_bk = $input['is_bk'];
        $guru -> stat_data = $input['stat_data'];
        $guru -> status = $input['status'];
        $guru -> email = $input['email'];
        $guru -> avatar = $file_name;

        $guru->save();
        return redirect('/guru')->with('sukses','berhasil diupdate!');
    }
    public function gurudelete(Guru $guru)
    {
        $guru ->delete_avatar();
        $guru ->delete();
        return redirect('/guru')->with('sukses','berhasil dihapus!');
    }
}
