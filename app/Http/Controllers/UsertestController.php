<?php

namespace App\Http\Controllers;

use App\Models\Usertest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class UsertestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'User';
        $data['q'] = $request->query('q');
        //dd($data['q']);
        $data['usertests'] = Usertest::where('name', 'like', '%' . $data['q'] . '%')->get();
        //dd($data);
        return view('usertest.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['title'] = 'Add Usertest';
        return view('usertest.create', $data);
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
            'email' => 'required',
            'avatar' => 'required',
        ]);

        $avatar = $request->file('avatar');
        $file_name = rand(1000, 9999) . $avatar->getClientOriginalName();

        $img = Image::make($avatar->path());
        $img->resize('120', '120')
            ->save(public_path('avatars/posting') . '/small_' . $file_name);

        $avatar->move('avatars/posting', $file_name);
        //insert ke tabel Users
        $usertest = new Usertest();
        $usertest -> role = $request -> role;
        $usertest -> name = $request->name;
        $usertest -> avatar = $file_name;
        $usertest -> email = $request -> email;
        $usertest -> password = bcrypt('rahasia');
        $usertest -> remember_token = Str::random(60);
        $usertest->save();
        return redirect()->route('usertest.index')->with('success', 'Usertest added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usertest  $usertest
     * @return \Illuminate\Http\Response
     */
    public function show(Usertest $usertest)
    {
        //
        $data['title'] = $usertest->name;
        $data['usertest'] = $usertest;
        return view('usertest.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usertest  $usertest
     * @return \Illuminate\Http\Response
     */
    public function edit(Usertest $usertest)
    {
        //
        $data['title'] = 'Edit Usertest';
        $data['usertest'] = $usertest;
        return view('usertest.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usertest  $usertest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usertest $usertest)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);
        //$usertest ->update($request->all());
        if ($request->hasFile('avatar')) {
            $usertest->delete_avatar();
            $avatar = $request->file('avatar');
            $file_name = rand(1000, 9999) . $avatar->getClientOriginalName();
            $img = Image::make($avatar->path());
            $img->resize('120', '120')
                ->save(public_path('avatars/posting') . '/small_' . $file_name);
            $avatar->move('avatars/posting', $file_name);
            $usertest->avatar = $file_name;
        }
        $usertest->name = $request->name;
        $usertest->email = $request->email;
        $usertest->save();
        return redirect()->route('usertest.index')->with('success', 'Usertest edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usertest  $usertest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usertest $usertest)
    {
        //
        $usertest->delete_avatar();
        $usertest->delete();
        return redirect()->route('usertest.index')->with('success', 'Usertest deleted successfully');
    }
}