<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class response_log extends Model
{
    protected $fillable = ['response'];

    protected $casts = [
        'response' => 'array',
    ];
}
