<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function editnilai(Request $request, $id)
    {
        $nilai = Nilai::find($id);
        //$aduh = $siswa->penilaian->pluck('id')->first();
        //$aduh = $request->$bk;
        //dd($aduh);
    	//$siswa->mapel()->updateExistingPivot($request->pk,['nilai'=>$request->value]);
    	//$siswa->penilaian()->updateExistingPivot($request->pk,['nilai'=>$request->value]);
        $nilai ->update($request->all());
    }
    public function editnilai1(Request $request)
    {
        if ($request->ajax()) {
            Nilai::find($request->pk)
                ->update([
                    $request->name => $request->value
                ]);

            return response()->json(['success' => true]);
        }
    }
}