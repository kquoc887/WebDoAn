<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $table="category";
    public $timestamps=true;
    protected $primaryKey="MALOAIPHIM";
    public function phim()
    {
        return $this->hasMany('App\movie','FK_MALOAIPHIM','MALOAIPHIM');
    }

}
