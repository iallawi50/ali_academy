<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
            "user_id",
            "course_id",
            "payment_status",
            "status",
            "amount",
            "session_id",
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Course()
    {
        return $this->belongsTo(Course::class);
    }
}
