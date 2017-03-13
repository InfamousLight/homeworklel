<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Band;

class BandController extends Controller
{
    public function index(Request $request)
    {
        $column = $request->input('column');
        $sort = $request->input('order');

        if($column && $sort) {
            $bands = Band::with('Album')->orderBy($column, $sort)->get();
        }
        else {
            $bands = Band::with('Album')->get();
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
        $band = new Band;
        $band->name = $request->input('band-name');
        $band->website = $request->input('website');
        $band->start_date = $request->input('start-date');
        $band->still_active = $request->input('active');
        $band->save();

        return $this->index($request);
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
        return $this->index($request);
    }

    public function delete(Request $request)
    {
        $bandId = $request->input('bandId');
        DB::table('Album')->where('band_id', '=', $bandId)->delete();
        DB::table('Band')->where('id', '=', $bandId)->delete();

        return $bandId;
    }
}
