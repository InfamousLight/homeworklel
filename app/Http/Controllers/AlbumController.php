<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AlbumController extends Controller
{
    public function index($column=null, $sort=null)
    {
        if($column && $sort) {
            $albums = DB::table('Album')->select()->orderBy($column, $sort)->get();
        }
        else {
            $albums = DB::table('Album')->select()->get();
        }

        return view('album')->with('albums', $albums)->with('column', $column)->with('sort', $sort);
    }

    public function create(Request $request)
    {
        DB::table('Album')->insert([
            'band_id' => $request->input('band-id'),
            'name' =>  $request->input('album-name'),
            'recorded_date' => $request->input('recorded-date'),
            'release_date' => $request->input('release-date'),
            'number_of_tracks' => $request->input('number-of-tracks'),
            'label' =>  $request->input('label'),
            'producer' =>  $request->input('producer'),
            'genre' =>  $request->input('genre'),
        ]);

        return $this->index();
    }

    public function createView()
    {
        $bands = DB::table('Band')->select('id', 'name')->get();
        return view('create-album')->with('bands', $bands);
    }

    public function edit($albumId)
    {
        $album = DB::table('Album')->where('id', $albumId)->first();
        return view('edit-album')->with('album', $album);
    }

    public function delete(Request $request)
    {
        $albumId = $request->input('albumId');
        DB::table('Album')->where('id', '=', $albumId)->delete();

        return $albumId;
    }
}
