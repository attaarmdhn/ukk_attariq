<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'like';
    protected $primaryKey = 'id';
    protected $fillable = [
        'fotoId',
        'userId',
        'like',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }


    public function foto()
    {
        return $this->belongsTo(Foto::class, 'fotoId');
    }
}
