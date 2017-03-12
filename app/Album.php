<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'Album';

    public $timestamps = false;

    protected $fillable = array(
        'id',
        'band_id',
        'name',
        'website',
        'recorded_date',
        'release_date',
        'number_of_tracks',
        'label',
        'producer',
        'genre',
    );

    public function band()
    {
        return $this->belongsTo('App\Band');;
    }
}
