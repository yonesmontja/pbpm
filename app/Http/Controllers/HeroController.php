<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Misi;
use App\Models\Visi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class HeroController extends Controller
{
    //
    public function index()
    {
        $visi = Visi::all();
        $misi = Misi::all();
        //dd($visi);
        return view('welcome', ['visi' => $visi, 'misi' => $misi]);
    }

    public function hero()
    {
        $hero = Hero::all();
        return view('frontend.hero', ['hero' => $hero]);
    }
    public function herocreate(Request $request)
    {
        $this->validate($request, [

            'header1' => 'required',
            'header2' => 'required',

            'image' => 'mimes:jpeg,jpg,png',
        ]);
        $image = $request->file('image')->move(public_path('storage\hero'), $request->file('image')->getClientOriginalName() . "." . $request->file('image')->getClientOriginalExtension());
        $file_name = rand(1000, 9999) . $request->file('image')->getClientOriginalName();
        $img = Image::make($image);
        //dd($img);
        $img->resize('120', '120')->save(public_path('storage\hero') . '\small_' . $file_name);
        $image->move(public_path('storage\hero'), $file_name);

        //insert ke tabel hero
        $input = $request->all();

        $hero = new Hero();
        //$request -> request -> add(['user_id' => $user -> id]);
        $hero->header1 = $input['header1'];
        $hero->header2 = $input['header2'];

        $hero->image = $file_name;
        $hero->save();
        //return $request -> all();
        return redirect('/hero')->with('sukses', 'berhasil diinput');
    }
}
