<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = DB::table('Album')->select()->get();
        return view('album')->with('albums', $albums);
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
