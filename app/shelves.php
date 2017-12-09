<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shelves extends Model
{
    public $table = 'shelves';
    protected $fillable = [
        'shelf_name'
    ];

    public function book(){
        return $this->hasMany('App\Book');
    }
}
