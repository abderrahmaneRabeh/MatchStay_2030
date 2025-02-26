<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\User;
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

        $isUserFavorite = User::find(Auth::user()->id)
            ->favoris()->where('annonce_id', $annonce->id)
            ->exists();

        return view('AnnounceDetails', [
            'annonce' => $annonce,
            'isUserFavorite' => $isUserFavorite
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

    public function update($id)
    {
        $annonce = Annonce::find($id);

        return view('ModifyAnnounces', [
            'annonce' => $annonce
        ]);
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        $titre = $request->input('titre');
        $description = $request->input('description');
        $localisation = $request->input('localisation');
        $equipements = $request->input('equipements');
        $disponibilites = $request->input('disponibilites');
        $image_url = $request->input('image_url');
        $prix = $request->input('prix');
        $user_id = Auth::user()->id;

        $annonce = Annonce::find($id);
        $annonce->titre = $titre;
        $annonce->description = $description;
        $annonce->localisation = $localisation;
        $annonce->equipements = $equipements;
        $annonce->disponibilites = $disponibilites;
        $annonce->image_url = $image_url;
        $annonce->prix = $prix;
        $annonce->proprietaire_id = $user_id;
        $annonce->save();

        return redirect()->route('Announces')->with('success', 'Annonce modifiée avec succès');
    }

    public function destroy($id)
    {
        $annonce = Annonce::find($id);
        $isDeleted = $annonce->delete();

        if (!$isDeleted) {
            return redirect()->route('Announces')->with('error', 'Une erreur s\'est produite lors de la suppression de l\'annonce');
        }

        return redirect()->route('Announces')->with('success', 'Annonce supprimée avec succès');
    }

    public function AddFavorite($id)
    {
        $userId = Auth::user()->id;
        $annonce = Annonce::find($id);

        $annonce->touristesFavoris()->attach($userId);
        return redirect()->back();
    }

    public function RemoveFavorite($id)
    {
        $userId = Auth::user()->id;
        $annonce = Annonce::find($id);

        $annonce->touristesFavoris()->detach($userId);
        return redirect()->back();
    }
}
