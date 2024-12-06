<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medecin extends Personne
{
    protected $fillable = ['specialite'];

    public function personne()
    {
        return $this->belongsTo(Personne::class);
    }
}
