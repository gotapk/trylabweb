<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category',
        'image_path',
        'link',
        'order',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];
}
