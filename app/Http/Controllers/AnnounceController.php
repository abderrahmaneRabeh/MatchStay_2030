<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

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
}
