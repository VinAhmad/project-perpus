<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address','email', 'phone'];

    public function book(){
        return $this->belongsToMany('App\Models\Book')
        ->withPivot('description', 'created_at');
    }
}
