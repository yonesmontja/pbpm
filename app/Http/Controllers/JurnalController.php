<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Journal;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class JurnalController extends Controller
{
    //
    public function index()
    {
    	return view('jurnal.index');
    }
    public function jurnalsiswa()
    {
    	return view('jurnal.jurnalsiswa');
    }
    public function jurnalasrama()
    {
    	return view('jurnal.jurnalasrama');
    }
    public function jurnalbelajar()
    {
    	return view('jurnal.jurnalbelajar');
    }
    public function jurnalpost()
    {
        $posts = Journal::all();
        return view('jurnal.jurnalpost',compact(['posts']));
    }
    public function jurnalcreate(Request $request)
    {
        //dd($request->all());
        $post = Journal::create([
            'title' => $request -> title,
            'content' => $request -> content,
            'user_id' => auth() -> user() -> id,
            'thumbnail' => $request -> thumbnail
        ]);
        return redirect('/jurnalpost') -> with('sukses','jurnal berhasil diinput');
    }
    public function singlepost($slug)
    {
        $post = Journal::where('slug','=',$slug)->first();
        return view('jurnal.singlepost',compact(['post']));
    }
    public function jurnaledit(Journal $jurnal)
    {
        return view('jurnal.jurnaledit',['jurnal'=>$jurnal]); 
    }
    public function jurnalupdate(Request $request, Journal $jurnal)
    {

        $jurnal ->update($request->all());
        if($request->hasFile('thumbnail')){
            $request->file('thumbnail')->move('images/',$request->file('thumbnail')->getClientOriginalName());
            $jurnal->thumbnail= $request->file('thumbnail')->getClientOriginalName();
            $jurnal->save();
        }
        return redirect('/jurnalpost')->with('sukses','berhasil diupdate!');
    }

}
