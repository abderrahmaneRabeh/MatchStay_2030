<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class AnnounceController extends Controller
{
    public function index($pagination = 4)
    {
        $announces = Annonce::with('proprietaire')->paginate($pagination);

        return view('listAnnounces', [
            'Announces' => $announces
        ]);
    }
}
