<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Journal;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class JurnalController extends Controller
{
    //
    public function index()
    {
    	$jurnal = Journal::all();
        $weekS = Carbon::now()->startOfWeek()->subWeek(0);
        $weekE = Carbon::now();
        $jurnal_this_month = Journal::

            whereBetween('created_at',[$weekS,$weekE]);
        //dd($jurnal_this_month);
        return view('jurnal.index',[
            'jurnal_this_month' => $jurnal_this_month,
            'jurnal' => $jurnal,
        ]);
    }
    public function jurnalsiswa()
    {
    	return view('jurnal.jurnalsiswa');
    }
    public function jurnalkelas()
    {
    	return view('jurnal.jurnalkelas');
    }
    public function jurnalbelajar()
    {
    	$kategori = Kategori::all();
        return view('jurnal.jurnalbelajar',[
            'kategori' => $kategori,
        ]);
    }
    public function jurnalpost()
    {
        $posts = Journal::all();
        return view('jurnal.jurnalpost',compact(['posts']));
    }
    public function jurnalcreate(Request $request)
    {
        $this -> validate($request,[
            'title' => 'required',
            'thumbnail' => 'mimes:jpeg,jpg,png',
        ]);
        $thumbnail = $request->file('thumbnail');
        $file_name = rand(1000, 9999) . $thumbnail->getClientOriginalName();
        $img = Image::make($thumbnail->path());
        $img->resize('120', '120')
            ->save(public_path('/images') . '/small_' . $file_name);
        $thumbnail->move('/images', $file_name);
        $post = new Journal();
        $post -> title = $request -> title;
        $post -> content = $request -> content;
        $post -> kategori_id = $request -> kategori_id;
        $post -> user_id = auth() -> user() -> id;
        $post -> thumbnail = $file_name;
        $post -> save();

        return redirect('/jurnalpost') -> with('sukses','jurnal berhasil diinput');
    }
    public function singlepost($slug)
    {
        $dateS = Carbon::now()->startOfMonth()->subMonth(0);
        $dateE = Carbon::now();
        $weekS = Carbon::now()->startOfWeek()->subWeek(0);
        $weekE = Carbon::now();
        $userjournal_this_week_1 = Journal::where('kategori_id','=',1)->orderBy('created_at','desc')->whereBetween('created_at',[$weekS,$weekE])->get()->first();
        $userjournal_this_week_2 = Journal::where('kategori_id','=',2)->orderBy('created_at','desc')->whereBetween('created_at',[$weekS,$weekE])->get()->first();
        $userjournal_this_week_3 = Journal::where('kategori_id','=',3)->orderBy('created_at','desc')->whereBetween('created_at',[$weekS,$weekE])->get()->first();

        $userjournal_this_date_1 = Journal::where('kategori_id','=',1)->orderBy('created_at','desc')->whereBetween('created_at',[$dateS,$dateE])->get()->first();
        $userjournal_this_date_2 = Journal::where('kategori_id','=',2)->orderBy('created_at','desc')->whereBetween('created_at',[$dateS,$dateE])->get()->first();
        $userjournal_this_date_3 = Journal::where('kategori_id','=',3)->orderBy('created_at','desc')->whereBetween('created_at',[$dateS,$dateE])->get()->first();

        $jml_this_date_1 = 0.00;
        $jml_this_date_2 = 0.00;
        $jml_this_date_3 = 0.00;

        if(Journal::where('kategori_id','=',1)->orderBy('created_at','desc')->whereBetween('created_at',[$dateS,$dateE]) -> count() == !null)
        {
            $jml_this_date_1 = Journal::where('kategori_id','=',1)->orderBy('created_at','desc')->whereBetween('created_at',[$dateS,$dateE]) -> count();
        }
        if(Journal::where('kategori_id','=',2)->orderBy('created_at','desc')->whereBetween('created_at',[$dateS,$dateE]) -> count() == !null)
        {
             $jml_this_date_2 = Journal::where('kategori_id','=',2)->orderBy('created_at','desc')->whereBetween('created_at',[$dateS,$dateE]) -> count();
        }
        if(Journal::where('kategori_id','=',3)->orderBy('created_at','desc')->whereBetween('created_at',[$dateS,$dateE]) -> count() == !null)
        {
            $jml_this_date_3 = Journal::where('kategori_id','=',3)->orderBy('created_at','desc')->whereBetween('created_at',[$dateS,$dateE]) -> count();
        }
        $total_jml_this_date = $jml_this_date_1+$jml_this_date_2+$jml_this_date_3;

        for($i = 1; $i < 4; $i++)
        {
            if(Journal::where('kategori_id','=',$i)
                        ->orderBy('created_at','desc')
                        ->whereBetween('created_at',[$weekS,$weekE])
                        ->get()
                        ->first() == !null)
            {
                $userjournal_this_week[] = Journal::where('kategori_id','=',$i)
                        ->orderBy('created_at','desc')
                        ->whereBetween('created_at',[$weekS,$weekE])
                        ->get()
                        ->first()
                        ->count();
            }
        }
        for($i = 1; $i < 4; $i++)
        {
            if(Journal::where('kategori_id','=',$i)
                        ->orderBy('created_at','desc')
                        ->whereBetween('created_at',[$dateS,$dateE])
                        ->get()
                        ->first() == !null)
            {
                $userjournal_this_date[] = Journal::where('kategori_id','=',$i)
                        ->orderBy('created_at','desc')
                        ->whereBetween('created_at',[$dateS,$dateE])
                        ->get()
                        ->first()
                        ->count();
            }
        }
        //dd(count($userjournal_this_week));
        $post = Journal::where('slug','=',$slug)->first();
        return view('jurnal.singlepost',compact([
            'post',
            'userjournal_this_week_1',
            'userjournal_this_week_2',
            'userjournal_this_week_3',
            'userjournal_this_week',
            'userjournal_this_date_1',
            'userjournal_this_date_2',
            'userjournal_this_date_3',
            'userjournal_this_date',
            'jml_this_date_1',
            'jml_this_date_2',
            'jml_this_date_3',
            'total_jml_this_date',
        ]));
    }
    public function jurnaledit(Journal $jurnal)
    {
        $kategori = Kategori::all();

        return view('jurnal.jurnaledit',[
            'jurnal' => $jurnal,
            'kategori' => $kategori,
        ]);
    }
    public function jurnalupdate(Request $request, Journal $jurnal)
    {

        $jurnal ->update($request->all());
        if ($request->hasFile('thumbnail')) {
            $jurnal->delete_avatar();
            $thumbnail = $request->file('thumbnail');
            $file_name = rand(1000, 9999) . $thumbnail->getClientOriginalName();
            $img = Image::make($thumbnail->path());
            $img->resize('120', '120')
                ->save(public_path('/images') . '/small_' . $file_name);
            $thumbnail->move('/images', $file_name);
            $jurnal->thumbnail = $file_name;
        }
        $input = $request->all();
        $jurnal -> title = $input['title'];
        $jurnal -> content = $input['content'];
        $jurnal -> kategori_id = $input['kategori_id'];
        $jurnal -> slug = Str::of($input['title'])->slug('-');
        $jurnal -> save();
        return redirect('/jurnalpost')->with('sukses','berhasil diupdate!');
    }
    public function jurnaldelete($id)
    {
        $journal = Journal::find($id);
        $journal -> delete_avatar();
        $journal -> delete();
        return redirect('/jurnalpost')->with('sukses','berhasil dihapus!');
    }

}
