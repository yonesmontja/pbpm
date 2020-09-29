<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class ApiController extends Controller
{
    public function editnilai(Request $request, $id)
    {
    	$siswa = \App\Models\Siswa::find($id);
    	$siswa->mapel()->updateExistingPivot($request->pk,['nilai'=>$request->value]);
    }
}
