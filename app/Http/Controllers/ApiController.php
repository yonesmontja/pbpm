<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function editnilai(Request $request, $id)
    {
    	$siswa = \App\Models\Siswa::find($id);
        //$aduh = $siswa->penilaian->pluck('id')->first();
        //$aduh = $request->$bk;
        //dd($aduh);
    	$siswa->mapel()->updateExistingPivot($request->pk,['nilai'=>$request->value]);
    	$siswa->penilaian()->updateExistingPivot($request->pk,['nilai'=>$request->value]);
    }
}
