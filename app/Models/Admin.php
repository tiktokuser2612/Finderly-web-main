<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

    class Admin extends Authenticatable
    {
        use Notifiable;

        protected $guard = 'admin';

        protected $fillable = [
            'first_name','last_name','email', 'password', 'image',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
   }

