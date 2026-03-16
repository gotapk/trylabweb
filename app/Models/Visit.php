<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    /** @use HasFactory<\Database\Factories\VisitFactory> */
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'user_agent',
        'device_type',
        'platform',
        'browser',
        'country',
        'city',
        'duration',
        'page_visited',
        'session_id',
    ];
}
