<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'start_date',
        'end_date',
        'topics',
        'image',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}