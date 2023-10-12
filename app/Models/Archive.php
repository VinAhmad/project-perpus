<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'archive_number', 'book_id'];

    public function book(){
        return $this->belongsTo('App\Models\Book');
    }
}
