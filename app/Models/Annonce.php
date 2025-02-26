<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'localisation',
        'equipements',
        'disponibilites',
        'proprietaire_id',
        'image_url',
        'prix'
    ];

    public function proprietaire()
    {
        return $this->belongsTo(related: Proprietaire::class);
    }

    public function touristesFavoris()
    {
        return $this->belongsToMany(User::class, 'favoris', 'annonce_id', 'touriste_id');
    }
}
