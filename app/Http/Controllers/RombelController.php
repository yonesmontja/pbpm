<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Rombel;
use App\Models\Tahunpel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class RombelController extends Controller
{
    public function index(Rombel $rombel)
    {
        $rombel = Rombel::all();
        //dd($rombel);
        $kelas = Kelas::all();
        $guru = Guru::all();
        $tahunpelajaran = Tahunpel::all();

        return view('rombel.index', [
            'rombel' => $rombel,
            'kelas' => $kelas,
            'guru' => $guru,
            'tahunpelajaran' => $tahunpelajaran
        ]);
    }
    public function rombelcreate(Request $request)
    {

        $rombel = Rombel::create($request->all());

        //dd($rombel);
        return Redirect::back()->with('sukses', 'berhasil diinput');
    }
}
