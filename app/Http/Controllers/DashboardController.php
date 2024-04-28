<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Foto;
use App\Models\Like;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $albums = Album::where('userId', auth()->user()->id)->get();
        $fotos = Foto::where('userId', auth()->id())->get();
        $likeCounts = [];

        foreach ($fotos as $foto) {
            $likeCounts[$foto->id] = Like::where('userId', auth()->id())->where('fotoId', $foto->id)->count();
        }

        return view('dashboard.dashboard', compact('albums', 'fotos','likeCounts'));
    }
}
