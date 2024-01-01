<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table='books';
    function Author(){
        return $this->belongsTo(Author::class);
    }
    function Category(){
        return $this->belongsTo(Category::class);
    }
}
