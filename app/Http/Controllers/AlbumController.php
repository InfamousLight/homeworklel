<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Album;

class AlbumController extends Controller
{
    public function index(Request $request)
    {
        $column = $request->input('column');
        $sort = $request->input('order');

        if($column && $sort) {
            $albums = Album::with('Band')->orderBy($column, $sort)->get();
        }
        else {
            $albums = Album::with('Band')->get();
        }

        return view('album')->with('albums', $albums)->with('column', $column)->with('sort', $sort);
    }

    public function create(Request $request)
    {
        $album = new Album;
        $album->band_id = $request->input('band-id');
        $album->name = $request->input('album-name');
        $album->recorded_date = $request->input('recorded-date');
        $album->release_date = $request->input('release-date');
        $album->number_of_tracks = $request->input('number-of-tracks');
        $album->label = $request->input('label');
        $album->producer = $request->input('producer');
        $album->genre = $request->input('genre');
        $album->save();

        return $this->index($request);
    }

    public function createView()
    {
        $bands = DB::table('Band')->select('id', 'name')->get();
        return view('create-album')->with('bands', $bands);
    }

    public function editView($albumId)
    {
        $album = DB::table('Album')->select()->where('id', '=', $albumId)->first();
        $belongsToBand = Album::find($albumId)->band()->first();
        $bands = DB::table('Band')->select('id', 'name')->get();

        return view('edit-album')->with('album', $album)->with('belongsToBand', $belongsToBand)->with('bands', $bands);
    }

    public function edit(Request $request)
    {
        $albumId = $request->input('albumId');
        DB::table('Album')->where('id', '=', $albumId)
            ->update([
                'band_id' => $request->input('band-id'),
                'name' =>  $request->input('album-name'),
                'recorded_date' => $request->input('recorded-date'),
                'release_date' => $request->input('release-date'),
                'number_of_tracks' => $request->input('number-of-tracks'),
                'label' =>  $request->input('label'),
                'producer' =>  $request->input('producer'),
                'genre' =>  $request->input('genre'),
            ]);
        return $this->index($request);
    }

    public function delete(Request $request)
    {
        $albumId = $request->input('albumId');
        DB::table('Album')->where('id', '=', $albumId)->delete();

        return $albumId;
    }
}
