<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiment extends Model
{
    /** @use HasFactory<\Database\Factories\ExperimentFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category',
        'image_path',
        'images',
        'link',
        'order',
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
