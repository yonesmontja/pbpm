<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class LevelController extends Controller
{
    public function profile($id)
    {
    	$mapel = Mapel::all();
        $level = Level::find($id);
        //dd($level->level);
    	return view('level.profile',['level' => $level,'mapel'=>$mapel]);
    }
    public function index()
    {
    	$level1 = Level::all();
    	return view('level.index',['level1' => $level1]);
    }
     public function leveledit(Level $level)
    {
        return view('level.leveledit',['level'=>$level]);
    }
    public function levelupdate(Request $request, Level $level)
    {
        $level ->update($request->all());
        if ($request->hasFile('avatar')) {
            $level->delete_avatar();
            $avatar = $request->file('avatar')->move(public_path('storage\level'),$request->file('avatar')->getClientOriginalName().".".$request->file('avatar')->getClientOriginalExtension());
            $file_name = rand(1000, 9999) . $request->file('avatar')->getClientOriginalName();
            $img = Image::make($avatar);
            $img->resize('120', '120')->save(public_path('storage\level') . '\small_' . $file_name);
            $avatar->move(public_path('storage\level'), $file_name);
            $level->avatar = $file_name;
        }
        $input = $request->all();
        $level -> level = $input['level'];
        $level->save();
        return redirect('/level')->with('sukses','berhasil diupdate!');
    }
    public function levelcreate(Request $request)
    {
        $this -> validate($request,[
            'level' => 'required',
            'avatar' => 'mimes:jpeg,jpg,png',
        ]);
        $avatar = $request->file('avatar')->move(public_path('storage\level'),$request->file('avatar')->getClientOriginalName().".".$request->file('avatar')->getClientOriginalExtension());
        $file_name = rand(1000, 9999) . $request->file('avatar')->getClientOriginalName();
        $img = Image::make($avatar);
        $img->resize('120', '120')->save(public_path('storage\level') . '\small_' . $file_name);
        $avatar->move(public_path('storage\level'), $file_name);
        //insert ke tabel level
        $level = new Level();
        $level -> level = $request -> level;
        $level -> avatar = $file_name;
        $level -> save();
        //return $request -> all();
        return redirect('/level')->with('sukses','berhasil diinput');
    }
    public function leveldelete(Level $level)
    {
        $level ->delete_avatar();
        $level ->delete();
        return redirect('/level')->with('sukses','berhasil dihapus!');
    }
}
