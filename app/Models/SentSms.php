<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SentSms extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicationId', 'sourceAddress', 'message', 'requestId', 'created_at'
    ];
}
