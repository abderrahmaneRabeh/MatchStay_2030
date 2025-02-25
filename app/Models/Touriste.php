<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Touriste extends Authenticatable
{

    use HasFactory;

    protected $table = 'touristes';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'photo',
    ];
}
