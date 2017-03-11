<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    protected $table = 'Band';

    public $timestamps = false;

    protected $fillable = array(
        'id',
        'name',
        'website',
        'start_date',
        'still_active'
    );

    public function album()
    {
        return $this->hasMany('App\Album', 'band_id');
    }
}
