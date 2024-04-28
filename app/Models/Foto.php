<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table = 'foto';
    protected $primaryKey = 'id';
    protected $fillable = [
        'judulFoto',
        'deskripsiFoto',
        'lokasiFile',
        'tanggalUnggah',
        'albumId',
        'userId',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function album()
    {
        return $this->belongsTo(Album::class, 'albumId');
    }

    public function komentar(){

        return $this->hasMany(Komentar::class, 'fotoId');
    }

    public function like()
    {
        return $this->hasMany(Like::class,'fotoId');
    }

}
