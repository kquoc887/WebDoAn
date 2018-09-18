<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    //
    protected $table = 'schedule';

    public function nphim()
    {
        return $this->belongsTo('App\movie', 'MAPHIM', 'MAPHIM');
    }

    public function rap()
    {
        return $this->belongsTo('App\rap', 'MARAP', 'MARAP');
    }

}
