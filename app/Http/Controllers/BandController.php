<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BandController extends Controller
{
    public function index(Request $request)
    {
        $column = $request->input('column');
        $sort = $request->input('order');

        if($column && $sort) {
            $bands = DB::table('Band')->select()->orderBy($column, $sort)->get();
        }
        else {
            $bands = DB::table('Band')->select()->get();
        }

        return view('band')->with('bands', $bands)->with('column', $column)->with('sort', $sort);
    }

    public function editView($bandId)
    {
        $band = DB::table('Band')->select()->where('id', '=', $bandId)->first();
        return view('edit-band')->with('band', $band);
    }

    public function create(Request $request)
    {
        DB::table('Band')->insert([
            'name' =>  $request->input('band-name'),
            'website' => $request->input('website'),
            'start_date' => $request->input('start-date'),
            'still_active' => $request->input('active'),
        ]);

        return $this->index();
    }

    public function edit(Request $request)
    {
        $bandId = $request->input('bandId');
        DB::table('Band')->where('id', '=', $bandId)
            ->update([
                'name' => $request->input('band-name'),
                'website' => $request->input('website'),
                'start_date' => $request->input('start-date'),
                'still_active' => $request->input('active'),
            ]);
        return $this->index();
    }

    public function delete(Request $request)
    {
        $bandId = $request->input('bandId');
        DB::table('Album')->where('band_id', '=', $bandId)->delete();
        DB::table('Band')->where('id', '=', $bandId)->delete();

        return $bandId;
    }
}
