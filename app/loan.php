<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loan extends Model
{
    public $table = 'loans';
    protected $fillable = [
        'user_id', 'book_id', 'due_date', 'returned_date'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function book(){
        return $this->belongsTo('App\Book');
    }
}
