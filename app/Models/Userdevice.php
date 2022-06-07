<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userdevice extends Model
{
    use HasFactory;
    Protected $fillable =[
        'user_id',
        'device_id',
        'device_token',
        'device_type',
    ];
}
