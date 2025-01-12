<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentreDeSante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'telephone',
        'ville',
        'quartier',
    ];

    public function medecins()
    {
        return $this->hasMany(MedecinCentreDeSante::class, 'centre_de_sante_id');
    }
}
