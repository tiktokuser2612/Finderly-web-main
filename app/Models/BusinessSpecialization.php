<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessSpecialization extends Model
{
    use HasFactory;
    protected $fillable =[
        'business_id',
        'specialization_id',
    ];
}
