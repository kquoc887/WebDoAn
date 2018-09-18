<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
    //
    protected $table = "movie";
    public $timestamps = true;
    protected $primaryKey = "MAPHIM";

    public function loaiphim()
    {
        return $this->belongsTo('App\category', 'MALOAIPHIM', 'MALOAIPHIM');
    }

    public function lichchieu()
    {
        return $this->hasMany('App\schedule', 'MAPHIM', 'MAPHIM');
    }

}
