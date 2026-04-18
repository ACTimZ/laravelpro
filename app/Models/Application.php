<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'user_id',
        'course_name',
        'date',
        'payment',
        'status',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
