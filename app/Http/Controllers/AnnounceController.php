<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnounceController extends Controller
{
    public function index(Request $request, $pagination = 4)
    {

        $search = strtolower($request->input('search'));

        if ($search) {
            $announces = Annonce::with('proprietaire')
                ->whereRaw("LOWER(titre) LIKE ?", ["%$search%"])
                ->orWhereRaw("LOWER(description) LIKE ?", ["%$search%"])
                ->orWhereRaw("LOWER(localisation) LIKE ?", ["%$search%"])
                ->paginate($pagination);

            return view('listAnnounces', [
                'Announces' => $announces
            ]);
        }

        $announces = Annonce::with('proprietaire')->paginate($pagination);

        return view('listAnnounces', [
            'Announces' => $announces
        ]);
    }

    public function details($id)
    {
        $annonce = Annonce::with('proprietaire')->find($id);

        return view('AnnounceDetails', [
            'annonce' => $annonce
        ]);
    }

    public function create()
    {
        return view('AddAnnounces');
    }

    public function store(Request $request)
    {
        $titre = $request->input('titre');
        $description = $request->input('description');
        $localisation = $request->input('localisation');
        $equipements = $request->input('equipements');
        $disponibilites = $request->input('disponibilites');
        $image_url = $request->input('image_url');
        $prix = $request->input('prix');
        $user_id = Auth::user()->id;

        $announce = Annonce::create([
            'titre' => $titre,
            'description' => $description,
            'localisation' => $localisation,
            'equipements' => $equipements,
            'disponibilites' => $disponibilites,
            'image_url' => $image_url,
            'prix' => $prix,
            'proprietaire_id' => $user_id
        ]);

        if ($announce) {
            return redirect()->route('Announces')->with('success', 'Annonce ajoutée avec succès');
        }

    }
}
