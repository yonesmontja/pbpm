<?php

namespace App\Http\Controllers;

use App\Models\Guru;

use App\Models\Misi;
use App\Models\Visi;
use App\Models\Testimony;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class TestimonyController extends Controller
{
    //
    public function index()
    {
        $visi = Visi::all();
        $misi = Misi::all();
        $guru = Guru::all();
        //dd($visi);
        return view('frontend.index', ['visi' => $visi, 'misi' => $misi, 'guru' => $guru]);
    }

    public function testimony()
    {
        $testimony = Testimony::all();
        return view('frontend.testimony', ['testimony' => $testimony]);
    }
    public function testimonycreate(Request $request)
    {
        $this->validate($request, [

            'nama' => 'required',
            'pekerjaan' => 'required',
            'komentar' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ]);
        $image = $request->file('image')->move(public_path('images/testimonies'), $request->file('image')->getClientOriginalName() . "." . $request->file('image')->getClientOriginalExtension());
        $file_name = rand(1000, 9999) . $request->file('image')->getClientOriginalName();
        $img = Image::make($image);
        //dd($img);
        $img->resize('120', '120')->save(public_path('images/testimonies/') . 'small_' . $file_name);
        $image->move(public_path('images/testimonies'), $file_name);

        //insert ke tabel testimony
        $input = $request->all();

        $testimony = new Testimony();
        //$request -> request -> add(['user_id' => $user -> id]);
        $testimony->nama = $input['nama'];
        $testimony->pekerjaan = $input['pekerjaan'];
        $testimony->komentar = $input['komentar'];
        $testimony->image = $file_name;
        $testimony->save();
        //return $request -> all();
        return redirect('/testimony')->with('sukses', 'berhasil diinput');
    }
}
