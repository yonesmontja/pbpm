<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Siswa;

class UserController extends Controller
{
    //
    public function profile1($siswa)
    {
    	//$user = \App\Models\User::find($id);
        return view('profile.profile',['user' => $siswa]);
    }
    public function userprofile($id)
    {
        $user = \App\Models\User::find($id);
        //dd($user);
        //$siswa = \App\Models\Siswa::all();
        //dd($siswa);
        return view('user.profile',['user' => $user]);
    }
    public function my_profile($id)
    {
        $user = \App\Models\User::find($id);
        
        return view('profile.my_profile',['user' => $user]);
    }

    public function portofolio()
    {
    	return view('profile.ecommerce');
    }
    public function projects()
    {
    	return view('profile.projects');
    }
    public function projects_add()
    {
    	return view('profile.projects-add');
    }
    public function projects_edit()
    {
    	return view('profile.projects-edit');
    }
    public function projects_detail()
    {
    	return view('profile.projects-detail');
    }
    public function contacts()
    {
    	$siswa = Siswa::all();
        return view('profile.contacts',['siswa' => $siswa]);
    }
    public function user()
    {
        $data_user = \App\Models\User::all();
        return view('user.index',['data_user' => $data_user]);
    }
    public function create(Request $request)
    {
        $this -> validate($request,[
            'name' => 'required|min:3',
            'role' => 'required',
            'email' => 'required|email|unique:users',
            'avatar' => 'mimes:jpeg,jpg,png',
        ]);

        //insert ke tabel Users
        $user = new \App\Models\User;
        $user -> role = $request -> role;
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> password = bcrypt('rahasia');
        $user -> remember_token = Str::random(60);
                if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $user->avatar= $request->file('avatar')->getClientOriginalName();
            $user->save();
        }
        //$user -> save();

        //return $request -> all();

        return redirect('/user')->with('sukses','berhasil diinput');
    }
    public function useredit(User $user)
    {
        return view('user/edit',['user'=>$user]);
    }
    public function userupdate(Request $request, User $user)
    {

        $user ->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $user->avatar= $request->file('avatar')->getClientOriginalName();
            $user->save();
        }
        return redirect('/user')->with('sukses','berhasil diupdate!');
    }
}
