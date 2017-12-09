<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $table = 'books';
    protected $fillable = [
        'book_name', 'author', 'shelf_id', 'availability'
    ];

    public function loans(){
        return $this->hasMany('App\loan');
    }

    public function shelves(){
        return $this->belongsTo('App\shelves');
    }
}
