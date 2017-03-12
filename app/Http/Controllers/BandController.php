<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BandController extends Controller
{
    public function index()
    {
        $bands = DB::table('Band')->select()->get();
        return view('band')->with('bands', $bands);
    }

    public function edit($bandId)
    {
        $band = DB::table('Band')->where('id', $bandId)->first();
        return view('edit-band')->with('band', $band);
    }
}
