<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ["title", "description", "thumbnail", "isPublish", "price"];


    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

}
