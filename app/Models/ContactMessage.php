<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    /** @use HasFactory<\Database\Factories\ContactMessageFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'form_type',
        'services',
        'attachment_path',
        'diag_web',
        'diag_brand',
        'diag_media',
        'diag_startup',
        'status',
    ];

    protected $casts = [
        'services' => 'array',
    ];
}
