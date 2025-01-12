<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploiDuTemps extends Model
{
    use HasFactory;

    protected $fillable = [
        'medecin_centre_id',
        'date_consultation',
        'heure_debut',
        'heure_fin',
    ];

    public function medecinCentre()
    {
        return $this->belongsTo(MedecinCentreDeSante::class, 'medecin_centre_id');
    }
}
