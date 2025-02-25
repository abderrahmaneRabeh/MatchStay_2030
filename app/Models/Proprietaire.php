<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Proprietaire extends Authenticatable
{
    use HasFactory;

    protected $table = 'proprietaires';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'photo',
        'created_at',
        'updated_at',
    ];
}
