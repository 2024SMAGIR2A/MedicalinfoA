<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Personne
{
    protected $fillable = ['groupe_sanguin', 'adresse'];

    public function personne()
    {
        return $this->belongsTo(Personne::class);
    }
}
