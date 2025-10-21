<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'duration',
        'fees',
        'modules',
        'contents',
        'image'
    ];

    protected $casts = [
        'duration' => 'integer',
        'fees' => 'decimal:2',
        'modules' => 'integer',
    ];
}