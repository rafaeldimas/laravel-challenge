<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'start',
        'end',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
