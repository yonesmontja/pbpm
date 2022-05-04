<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
    public function index(Request $request)
    {
        $data_user = User::select("*")
                        ->whereNotNull('last_seen')
                        ->orderBy('last_seen','DESC')
                        ->paginate(10);
        return view('user.online',compact('data_user'));
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
        $avatar = $request->file('avatar');
        $file_name = rand(1000, 9999) . $avatar->getClientOriginalName();
        $img = Image::make($avatar->path());
        $img->resize('120', '120')
            ->save(public_path('/images') . '/small_' . $file_name);

        $avatar->move('/images', $file_name);
        //insert ke tabel Users
        $user = new User();
        $user -> role = $request -> role;
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> avatar = $file_name;
        $user -> password = bcrypt('rahasia');
        $user -> remember_token = Str::random(60);
        //        if($request->hasFile('avatar')){
        //    $request->file('avatar')->move('/storage/images',$request->file('avatar')->getClientOriginalName());
        //    $user->avatar= $request->file('avatar')->getClientOriginalName();
        //    $user->save();
        //}
        $user -> save();

        //return $request -> all();

        return redirect('/user')->with('sukses','berhasil diinput');
    }
    public function useredit(User $user)
    {
        return view('user/edit',['user'=>$user]);
    }
    public function userupdate(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
        ]);
        //$user ->update($request->all());
        if ($request->hasFile('avatar')) {
            $user->delete_avatar();
            $avatar = $request->file('avatar');
            $file_name = rand(1000, 9999) . $avatar->getClientOriginalName();
            $img = Image::make($avatar->path());
            $img->resize('120', '120')
                ->save(public_path('/images') . '/small_' . $file_name);
            $avatar->move('/images', $file_name);
            $user->avatar = $file_name;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect('/user')->with('sukses','berhasil diupdate!');
    }
    public function userdelete(User $user)
    {
        $user ->delete_avatar();
        $user ->delete();
        return redirect('/user')->with('sukses','berhasil dihapus!');
    }
}
