<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentar';
    protected $primaryKey = 'id';
    protected $fillable = [
        'userId',
        'fotoId',
        'komentar',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }

    public function foto()
    {
        return $this->belongsTo(Foto::class,'fotoId', 'id');
    }
}
