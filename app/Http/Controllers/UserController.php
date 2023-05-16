<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Rombel;
use App\Models\Journal;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    //
    public function profile1($siswa)
    {
        //$user = User::find($id);
        return view('profile.profile', ['user' => $siswa]);
    }
    public function userprofile($id)
    {
        $user = User::find($id);
        //dd($user->role);
        //dd($user->siswa());
        //$siswa = Siswa::all();
        //dd($siswa);
        return view('user.profile', ['user' => $user]);
    }
    public function my_profile($id)
    {
        $user = User::find($id);
        //dd($user);
        $guru = Guru::where('user_id', $id)->pluck('id')->first();
        $nama_guru = Guru::where('user_id', $id)->pluck('nama_guru')->first();
        $siswa = Siswa::where('user_id', $id)->pluck('id')->first();
        $kategori = Kategori::all();
        $journal = Journal::all();
        $nilai = Nilai::where('guru_id', '=', $guru)->orderBy('tanggal')->get();
        //dd($nilai);

        if (auth()->user()->role == 'admin') {
            return view('profile.my_profile', [
                'user' => $user,
                'guru' => $guru,
                'nama_guru' => $nama_guru,
                'siswa' => $siswa,
                'kategori' => $kategori,
                'journal' => $journal,

            ]);
        } else {
            return view('profile.my_profile', [
                'user' => $user,
                'guru' => $guru,
                'nama_guru' => $nama_guru,
                'siswa' => $siswa,
                'kategori' => $kategori,
                'journal' => $journal,
                'nilai' => $nilai,
            ]);
        }
    }

    public function portofolio()
    {
        return view('profile.ecommerce');
    }

    public function contacts()
    {
        $siswa = Siswa::all();
        $rombel = Rombel::all();
        //$rombel1 = DB::table('rombel_siswa')->pluck('siswa_id')->toArray();
        $siswa_rombel = DB::table('rombel_siswa')->paginate(10)->pluck('siswa_id')->toArray();
        $data = DB::table('rombel_siswa')->paginate(10);
        foreach ($siswa_rombel as $n => $m) {
            $rombel_siswa[] = $siswa->find($m);
        }
        //dd($rombel_siswa);
        return view(
            'profile.contacts',
            [
                'siswa' => $siswa,
                'rombel' => $rombel,
                'siswa_rombel' => $siswa_rombel,
                'rombel_siswa' => $rombel_siswa,
                'data' => $data,
            ]
        );
    }
    public function index(Request $request)
    {
        $data_user = User::select("*")
            ->whereNotNull('last_seen')
            ->orderBy('last_seen', 'DESC')
            ->paginate(10);
        return view('user.online', compact('data_user'));
    }
    public function user()
    {
        $data_user = User::all();
        return view('user.index', ['data_user' => $data_user]);
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'role' => 'required',
            'email' => 'required|email|unique:users',
            'avatar' => 'mimes:jpeg,jpg,png',
        ]);
        $avatar = $request->file('avatar')->move('images/users', $request->file('avatar')->getClientOriginalName() . "." . $request->file('avatar')->getClientOriginalExtension());
        $file_name = rand(1000, 9999) . $request->file('avatar')->getClientOriginalName();
        $img = Image::make($avatar);
        $img->resize('120', '120')->save('images/users' . '/small_' . $file_name);
        $avatar->move('images/users', $file_name);
        //insert ke tabel Users
        $user = new User();
        $user->role = $request->role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->avatar = $file_name;
        $user->password = bcrypt('rahasia');
        $user->remember_token = Str::random(60);
        //        if($request->hasFile('avatar')){
        //    $request->file('avatar')->move('/storage/images',$request->file('avatar')->getClientOriginalName());
        //    $user->avatar= $request->file('avatar')->getClientOriginalName();
        //    $user->save();
        //}
        $user->save();

        //return $request -> all();

        return redirect('/user')->with('sukses', 'berhasil diinput');
    }
    public function useredit(User $user)
    {
        $id_user = $user->id;
        if (auth()->user()->role == 'guru') {
            $guru = Guru::where('user_id', '=', $id_user)->pluck('id')->first();
        }
        if (auth()->user()->role == 'admin') {
            $guru = auth()->user()->id;
        }

        //dd($guru);
        return view('user.edit', [
            'user' => $user,
            'guru' => $guru,
        ]);
    }
    public function userupdate(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $id = $user->id;
        $guru = Guru::where('user_id', $id)->pluck('id')->first();
        $nama_guru = Guru::where('user_id', $id)->pluck('nama_guru')->first();
        $siswa = Siswa::where('user_id', $id)->pluck('id')->first();
        $kategori = Kategori::all();
        $journal = Journal::all();
        $nilai = Nilai::where('guru_id', '=', $guru)->orderBy('tanggal')->get();
        //$user ->update($request->all());
        if ($request->hasFile('avatar')) {
            $user->delete_avatar();
            $avatar = $request->file('avatar')->move('images/users/', $request->file('avatar')->getClientOriginalName() . "." . $request->file('avatar')->getClientOriginalExtension());
            //dd($avatar);
            $file_name = rand(1000, 9999) . $request->file('avatar')->getClientOriginalName();
            //dd($file_name);
            $img = Image::make($avatar);
            //dd($img);
            $img->resize('120', '120')->save('images/users/' . 'small_' . $file_name);
            //dd($img);
            $avatar->move('images/users/', $file_name);
            $user->avatar = $file_name;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        //$user = User::find($id);
        //dd($user);
        $guru = Guru::where('user_id', $user->id)->pluck('id')->first();
        $nama_guru = Guru::where('user_id', $user->id)->pluck('nama_guru')->first();
        $siswa = Siswa::where('user_id', $user->id)->pluck('id')->first();
        //dd($guru);
        //dd($user->guru());
        if (auth()->user()->role == 'admin') {
            return view('profile.my_profile', [
                'user' => $user,
                'guru' => $guru,
                'nama_guru' => $nama_guru,
                'siswa' => $siswa,
                'kategori' => $kategori,
                'journal' => $journal,

            ])->with('sukses', 'berhasil diupdate!');
        } else {
            return view('profile.my_profile', [
                'user' => $user,
                'guru' => $guru,
                'nama_guru' => $nama_guru,
                'siswa' => $siswa,
                'kategori' => $kategori,
                'journal' => $journal,
                'nilai' => $nilai,
            ])->with('sukses', 'berhasil diupdate!');
        }

    }
    public function userdelete(User $user)
    {
        $user->delete_avatar();
        $user->delete();
        return redirect('/user')->with('sukses', 'berhasil dihapus!');
    }
    function save_user(Request $request)
    {
        $img = time() . "_" . $request->photo->getClientOriginalName();
        $hobbies = implode(',', $request->hobbies);
        $request->photo->move(public_path('uploads'), $img);
        DB::insert(
            'insert into users (email, password, country, gender, hobbies, photo) values (?, ?, ?, ?, ?, ?)',
            [
                $request->email,
                $request->pwd,
                $request->country,
                $request->gender,
                $hobbies, $img
            ]
        );
    }
}