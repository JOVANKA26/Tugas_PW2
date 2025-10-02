<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Judul extends Model
{
    protected $fillable = ['nama', 'kode', 'genre_id' ];
    public function genre(){
        return $this->belongsTo(Genre::class);
    }
}