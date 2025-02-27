<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends User
{
    use HasFactory;
    protected $table = 'admins';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'photo',
    ];
}
