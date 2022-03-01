<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function editnilai(Request $request, $id)
    {
    	$siswa = \App\Models\Siswa::find($id);
    	$siswa->mapel()->updateExistingPivot($request->pk,['nilai'=>$request->value]);
    }
}
