<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'author', 'year', 'publisher', 'type_id'];

    public function type(){
        return $this->belongsTo('App\Models\Type');
    }

    public function archive(){
        return $this->hasOne('App\Models\Archive');
    }

    public function visitor(){
        return $this->belongsToMany('App\Models\Visitor')
        ->withPivot('description', 'created_at');
    }

}
