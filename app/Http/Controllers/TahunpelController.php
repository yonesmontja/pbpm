<?php

namespace App\Http\Controllers;

use App\Models\Tahunpel;
use Illuminate\Http\Request;



class TahunpelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data['title'] = 'Tahun pelajaran';
        //dd($data['q']);

        $data['tahunpel'] = Tahunpel::all();
        $data['tp'] = Tahunpel::find(1);
        $data['tp1'] =  Tahunpel::find(1)->thn_pel;
        //$data['tp'] = Tahunpel::where(id,thn_pel)->get();
        //dd($data);
        return view('tahunpel.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'thn_pel' => 'required',
            'tahun' => 'required',
        ]);
        //$tahunpel -> tgl_raport = Carbon::createFromFormat('d-m-Y', $request->tgl_raport);
        //insert ke tabel tahunpelajaran
        $tahunpel = new Tahunpel();
        $tahunpel -> thn_pel = $request -> thn_pel;
        $tahunpel -> semester = $request->semester;
        $tahunpel -> aktif = $request -> aktif;
        $tahunpel -> tahun = $request -> tahun;
        $tahunpel -> nama_kepsek = $request -> nama_kepsek;
        $tahunpel -> kode_kepsek = $request -> kode_kepsek;
        $tahunpel -> tgl_raport = $request -> tgl_raport;
        $tahunpel -> tgl_raport_kelas3 = $request -> tgl_raport_kelas3;
        $tahunpel->save();
        return redirect()->route('tahunpel.index')->with('success', 'Tahun pelajaran added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tahunpel  $tahunpel
     * @return \Illuminate\Http\Response
     */
    public function show(Tahunpel $tahunpel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tahunpel  $tahunpel
     * @return \Illuminate\Http\Response
     */
    public function edit(Tahunpel $tahunpel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tahunpel  $tahunpel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tahunpel $tahunpel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tahunpel  $tahunpel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tahunpel $tahunpel)
    {
        //
    }
}
