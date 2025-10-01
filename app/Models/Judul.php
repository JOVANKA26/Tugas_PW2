<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Judul extends Model
{
    protected $fillable = ['nama', 'kode'];
    public function prodi(){
        return $this->hasMany(Genre::class);
    }
}
