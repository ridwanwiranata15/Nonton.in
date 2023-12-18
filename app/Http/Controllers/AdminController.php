<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('Admin.movies', ['movies' => $movies]);
    }
    public function edit($id)
    {
        $movie = Movie::find($id);
        return view('Admin.movie-edit', ['movie' => $movie]);
    }
    public function create()
    {
        return view('Admin.movie-create');
    }
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $request->validate([
            'title' => 'required',
            'trailer' => 'required',
            'movie' => 'required',
            'cast' => 'required',
            'category' => 'required',
            'small_thumbnail' => 'required',
            'large_thumbnail' => 'required',
            'release_date' => 'required',
            'about' => 'required',
            'duration' => 'required',
            'featured' => 'required'

        ]);

        $SmallThumbnail = $request->small_thumbnail;
        $LargeThumbnail = $request->large_thumbnail;

        $OriginalSmallThumbnailName = Str::random(10).$SmallThumbnail->getClientOriginalName();
        $OriginalLargeThumbnailName = Str::random(10).$LargeThumbnail->getClientOriginalName();

        $SmallThumbnail->storeAs('public/thumbnail', $OriginalSmallThumbnailName);
        $LargeThumbnail->storeAs('public/thumbnail', $OriginalLargeThumbnailName);

        $data['large_thumbnail'] = $OriginalLargeThumbnailName;
        $data['small_thumbnail'] = $OriginalSmallThumbnailName;

        Movie::create($data);

    }
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $request->validate([
            'title' => 'required',
            'trailer' => 'required',
            'movie' => 'required',
            'cast' => 'required',
            'category' => 'required',
            'small_thumbnail' => 'required',
            'large_thumbnail' => 'required',
            'release_date' => 'required',
            'about' => 'required',
            'duration' => 'required',
            'featured' => 'required'

        ]);
        $movie = Movie::find($id);

        if($request->small_thumbnail)
        {
            //save the image
            $SmallThumbnail = $request->small_thumbnail;
            $OriginalSmallThumbnailName = Str::random(10).$SmallThumbnail->getClientOriginalName();
            $SmallThumbnail->storeAs('public/thumbnail', $OriginalSmallThumbnailName);
            $data['small_thumbnail'] = $OriginalSmallThumbnailName;
            //delete old image

            Storage::delete('/public/thumbnail/'.$movie->small_thumbnail);


        }
        if($request->large_thumbnail)
        {
            $LargeThumbnail = $request->large_thumbnail;
            $OriginalLargeThumbnailName = Str::random(10).$LargeThumbnail->getClientOriginalName();
            $LargeThumbnail->storeAs('public/thumbnail', $OriginalLargeThumbnailName);
            $data['large_thumbnail'] = $OriginalLargeThumbnailName;
            Storage::delete('/public/thumbnail/'.$movie->large_thumbnail);
        }
        $movie->update($data);
        return redirect()->route('AdminMovie');

    }
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        return redirect()->route('AdminMovie');

    }
}
