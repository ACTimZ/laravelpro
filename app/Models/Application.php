<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'course_name',
        'user_id',
        'payment',
        'status',
        'date',
        'review',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
