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
        'name_en',
        'description',
        'description_en',
        'category',
        'category_en',
        'image_path',
        'images',
        'link',
        'order',
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
