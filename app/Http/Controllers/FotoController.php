<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Foto;
use App\Models\Like;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class FotoController extends Controller
{
    public function index()
    {

        $albums = Album::where('userId', auth()->id())->get();
        return view('dashboard.foto', compact('albums'));
    }

    public function post(Request $request)
    {
        $validateData = $request->validate([
            'judulFoto' => 'required',
            'deskripsiFoto' => 'required',
            'albumId' => 'required|exists:album,id',
            'userId' => 'required|exists:users,id',
        ]);

        $foto = $request->file('lokasiFile')->store('public/foto');
        $fotoUrl = URL::to('/').Storage::url($foto);


        $foto = new Foto([
            'judulFoto' => $validateData['judulFoto'],
            'deskripsiFoto' => $validateData['deskripsiFoto'],
            'lokasiFile' => $fotoUrl,
            'tanggalUnggah' => Carbon::now()->format('Y-m-d'),
            'albumId' => $validateData['albumId'],
            'userId' => $validateData['userId'],
        ]);

        $foto->save();

        return redirect('/dashboard');
    }

    public function like($id)
    {
        $foto = Foto::find($id);
        $userId = auth()->id();

        $existinglike = Like::where('userId', $userId)->where('fotoId', $foto->id)->first();

        if ($existinglike) {
            $existinglike->delete();
        }else{
            $likes = new Like([
                'userId' => $userId,
                'fotoId' => $foto->id,
                'like' => auth()->user()->name,
            ]);
            $likes->save();
        }

        return redirect()->back();

    }


    public function destroy($id)
    {
        $foto = Foto::find($id);
        Storage::delete($foto->lokasiFile);
        $foto->delete();
        return redirect('/dashboard');
    }
}
