<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Favori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function adminDashboard()
    {
        $Annonce = Annonce::with('proprietaire')->simplePaginate(4);
        $NbrTotalAnnonce = Annonce::count();
        $NbrUsers = User::count();
        $NbrFavorites = Favori::count();

        return view('dashboard', [
            'Annonces' => $Annonce,
            'NbrTotalAnnonce' => $NbrTotalAnnonce,
            'NbrUsers' => $NbrUsers,
            'NbrFavorites' => $NbrFavorites
        ]);
    }

    public function proprietaireDashboard()
    {
        $userId = Auth::user()->id;
        $ProprietaireAnnounces = Annonce::where('proprietaire_id', $userId)->simplePaginate(4);

        return view('proprietaire_dashboard', [
            'Annonces' => $ProprietaireAnnounces
        ]);
    }

    public function touristeDashboard()
    {
        $announceFavorites = Annonce::with('touristesFavoris')->whereHas('touristesFavoris', function ($query) {
            $query->where('touriste_id', Auth::user()->id);
        })->simplePaginate(4);
        return view('touriste_dashboard', [
            'Annonces' => $announceFavorites
        ]);
    }
}
