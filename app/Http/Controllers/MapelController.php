<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data['gurus'] = Guru::pluck('nama_guru','id');
        $data['title'] = 'Mapel';
        $data['q'] = $request->query('q');
        //dd($data['q']);
        $data['mapel'] = Mapel::where('nama_mapel', 'like', '%' . $data['q'] . '%')->get();
        return view('mapel.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['gurus'] = Guru::pluck('nama_guru','id');
        $data['title'] = 'Add Mapel';
        return view('mapel.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_mapel' => 'required',
            'kode' => 'required',
        ]);

        //insert ke tabel Users
        $mapel = new Mapel();
        $mapel -> kode = $request -> kode;
        $mapel -> nama_mapel = $request->nama_mapel;
        $mapel -> semester = $request -> semester;
        $mapel -> kelompok = $request -> kelompok;
        $mapel -> is_sikap = $request -> is_sikap;
        $mapel -> tambahan_sub = $request -> tambahan_sub;
        $mapel -> kd_singkat = $request -> kd_singkat;
        $mapel->save();
        return redirect()->route('mapel.index')->with('success', 'Mapel added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
