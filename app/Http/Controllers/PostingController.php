<?php

namespace App\Http\Controllers;

use App\Models\Posting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class PostingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data['title'] = 'Postings';
        $data['q'] = $request->query('q');
        $data['postings'] = Posting::where('title', 'like', '%' . $data['q'] . '%')->get();
        return view('posting.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['title'] = 'Add Post';
        return view('posting.create', $data);
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
            'title' => 'required',
            'image' => 'required',
        ]);

        $image = $request->file('image');
        $file_name = rand(1000, 9999) . $image->getClientOriginalName();

        $img = Image::make($image->path());
        $img->resize('180', '120')
            ->save(public_path('images/posting') . '/small_' . $file_name);

        $image->move('images/posting', $file_name);

        $post = new Posting();
        $post->title = $request->title;
        $post->image = $file_name;
        $post->description = $request->description;
        $post->save();
        return redirect()->route('posting.index')->with('success', 'Posting added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posting  $posting
     * @return \Illuminate\Http\Response
     */
    public function show(Posting $posting)
    {
        //
        $data['title'] = $posting->title;
        $data['posting'] = $posting;
        return view('posting.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posting  $posting
     * @return \Illuminate\Http\Response
     */
    public function edit(Posting $posting)
    {
        //
        $data['title'] = 'Edit Posting';
        $data['posting'] = $posting;
        return view('posting.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posting  $posting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posting $posting)
    {
        //
        $request->validate([
            'title' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $posting->delete_image();
            $image = $request->file('image');
            $file_name = rand(1000, 9999) . $image->getClientOriginalName();
            $img = Image::make($image->path());
            $img->resize('180', '120')
                ->save(public_path('images/posting') . '/small_' . $file_name);
            $image->move('images/posting', $file_name);
            $posting->image = $file_name;
        }
        $posting->title = $request->title;
        $posting->description = $request->description;
        $posting->save();
        return redirect()->route('posting.index')->with('success', 'Posting edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posting  $posting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posting $posting)
    {
        //
        $posting->delete_image();
        $posting->delete();
        return redirect()->route('posting.index')->with('success', 'Posting deleted successfully');
    }
}
