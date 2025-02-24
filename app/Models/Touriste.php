<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Touriste extends Model
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
