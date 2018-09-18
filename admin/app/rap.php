<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rap extends Model
{
    //
    protected $table = 'rap';

    public function schedule()
    {
        return $this->hasMany('App\schedule', 'FK_MARAP', 'MARAP');
    }
}
