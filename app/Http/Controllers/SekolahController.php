<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class SekolahController extends Controller
{
    public function profile($id)
    {
    	$sekolah = Sekolah::find($id);
    	return view('sekolah.profile',['sekolah' => $sekolah]);
    }
    public function index()
    {
    	$data_sekolah = Sekolah::all();
    	return view('sekolah.index',['data_sekolah' => $data_sekolah]);
    }
    public function sekolahedit(Sekolah $sekolah)
    {
        return view('sekolah.sekolahedit',['sekolah'=>$sekolah]);
    }
    public function sekolahupdate(Request $request, Sekolah $sekolah)
    {

        $sekolah ->update($request->all());

        if ($request->hasFile('logo')) {
            $sekolah->delete_avatar();
            $logo = $request->file('logo');
            $file_name = rand(1000, 9999) . $logo->getClientOriginalName();
            $img = Image::make($logo->path());
            $img->resize('120', '120')
                ->save(public_path('/images') . '/small_' . $file_name);
            $logo->move('/images', $file_name);
            $sekolah->logo = $file_name;
        }
        if ($request->hasFile('kop_1')) {
            $sekolah->delete_avatar();
            $kop_1 = $request->file('kop_1');
            $file_name1 = rand(1000, 9999) . $kop_1->getClientOriginalName();
            $img = Image::make($kop_1->path());
            $img->resize('120', '120')
                ->save(public_path('/images') . '/small_' . $file_name1);
            $kop_1->move('/images', $file_name1);
            $sekolah->kop_1 = $file_name1;
        }
        if ($request->hasFile('kop_2')) {
            $sekolah->delete_avatar();
            $kop_2 = $request->file('kop_2');
            $file_name2 = rand(1000, 9999) . $kop_2->getClientOriginalName();
            $img = Image::make($kop_2->path());
            $img->resize('120', '120')
                ->save(public_path('/images') . '/small_' . $file_name2);
            $kop_2->move('/images', $file_name2);
            $sekolah->kop_2 = $file_name2;
        }
        $input = $request->all();
        $sekolah -> nama = $input['nama'];
        $sekolah -> npsn = $input['npsn'];
        $sekolah -> nss = $input['nss'];
        $sekolah -> alamat = $input['alamat'];
        $sekolah -> kode_pos = $input['kode_pos'];
        $sekolah -> no_telp = $input['no_telp'];
        $sekolah -> kelurahan = $input['kelurahan'];
        $sekolah -> kecamatan = $input['kecamatan'];
        $sekolah -> kota = $input['kota'];
        $sekolah -> email = $input['email'];
        $sekolah -> provinsi = $input['provinsi'];
        $sekolah -> website = $input['website'];
        $sekolah -> kepsek = $input['kepsek'];
        $sekolah -> nip_kepsek = $input['nip_kepsek'];
        $sekolah -> kop_1 = $file_name;
        $sekolah -> kop_2 = $file_name;
        $sekolah -> logo = $file_name;

        $sekolah->save();
        return redirect('/sekolah')->with('sukses','berhasil diupdate!');
    }
}
