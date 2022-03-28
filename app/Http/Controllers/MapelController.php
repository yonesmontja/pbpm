<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
        $data['gurus'] = Guru::all();
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
        $data['gurus'] = Guru::all();
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
        $avatar = $request->file('avatar');
        $file_name = rand(1000, 9999) . $avatar->getClientOriginalName();

        $img = Image::make($avatar->path());
        $img->resize('120', '120')
            ->save(public_path('/images') . '/small_' . $file_name);

        $avatar->move('/images', $file_name);
        //insert ke tabel Mapel
        $mapel = new Mapel();
        $mapel -> kode = $request -> kode;
        $mapel -> nama_mapel = $request->nama_mapel;
        $mapel -> semester = $request -> semester;
        $mapel -> kelompok = $request -> kelompok;
        $mapel -> is_sikap = $request -> is_sikap;
        $mapel -> tambahan_sub = $request -> tambahan_sub;
        $mapel -> kd_singkat = $request -> kd_singkat;
        $mapel -> guru_id = $request -> guru_id;
        $mapel -> avatar = $file_name;
        $mapel->save();
        return redirect()->route('mapel.index')->with('success', 'Mapel added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mapel $mapel)
    {
        //
        $data['title'] = $mapel->nama_mapel;
        $data['mapel'] = $mapel;
        return view('mapel.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapel $mapel)
    {
        //
        $data['gurus'] = Guru::all();
        $data['title'] = 'Edit Mapel';
        $data['mapel'] = $mapel;
        return view('mapel.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapel $mapel)
    {
        //
        $request->validate([
            'nama_mapel' => 'required',
        ]);
        //$usertest ->update($request->all());
        if ($request->hasFile('avatar')) {
            $mapel->delete_avatar();
            $avatar = $request->file('avatar');
            $file_name = rand(1000, 9999) . $avatar->getClientOriginalName();
            $img = Image::make($avatar->path());
            $img->resize('120', '120')
                ->save(public_path('/images') . '/small_' . $file_name);
            $avatar->move('/images', $file_name);
            $mapel->avatar = $file_name;
        }
        $mapel->nama_mapel = $request->nama_mapel;
        $mapel->kode = $request->kode;
        $mapel->semester = $request->semester;
        $mapel->is_sikap = $request->is_sikap;
        $mapel->tambahan_sub = $request->tambahan_sub;
        $mapel->guru_id = $request->guru_id;
        $mapel->kd_singkat = $request->kd_singkat;
        $mapel->kelompok = $request->kelompok;
        $mapel->save();
        return redirect()->route('mapel.index')->with('success', 'Mapel edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapel $mapel)
    {
        //
        $mapel->delete_avatar();
        $mapel->delete();
        return redirect()->route('mapel.index')->with('success', 'Mapel deleted successfully');
    }
}
