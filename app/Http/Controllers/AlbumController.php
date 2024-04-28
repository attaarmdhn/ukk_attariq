<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Foto;
use App\Models\Like;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        return view('dashboard.album');
    }

    public function post(Request $request)
    {
        $validateData = $request->validate([
            'namaAlbum' => 'required',
            'deskripsi' => 'required',
            'userId' => 'required:exists:users,id',
        ]);

        $album = new Album([
            'namaAlbum' => $validateData['namaAlbum'],
            'deskripsi' => $validateData['deskripsi'],
            'userId' => $validateData['userId'],
        ]);

        $album->save();

        return redirect('/dashboard')->with('success','Berhasil Menambahkan Data');
    }


    public function sort($id)
    {
        $fotos = Foto::where('userId', auth()->id())->where('albumId', $id)->get();
        $albums = Album::where('userId', auth()->id())->get();

        $likeCounts = [];

        foreach ($fotos as $foto) {
            $likeCounts[$foto->id] = Like::where('userId', auth()->id())->where('fotoId', $foto->id)->count();
        }
        return view('dashboard.dashboard', compact('fotos', 'albums', 'likeCounts'));
    }
}
