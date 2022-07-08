<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'locale',
        'date',
        'user_id'
    ];

    protected $casts = [
        'date' => 'date'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
