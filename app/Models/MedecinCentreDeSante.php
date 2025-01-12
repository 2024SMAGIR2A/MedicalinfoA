<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedecinCentreDeSante extends Model
{
    use HasFactory;

    protected $table = 'medecin_centre_de_sante'; // Nom correct de la table

    protected $fillable = [
        'medecin_id',
        'centre_de_sante_id',
    ];

    public function medecin()
    {
        return $this->belongsTo(Medecin::class);
    }

    public function centreDeSante()
    {
        return $this->belongsTo(CentreDeSante::class);
    }

    public function emploiDuTemps()
    {
        return $this->hasMany(EmploiDuTemps::class, 'medecin_centre_id');
    }
}
