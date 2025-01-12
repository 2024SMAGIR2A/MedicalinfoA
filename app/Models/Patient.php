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

    public function personne2()
    {
        return $this->belongsTo(Personne::class, 'personne_id');
    }


    // Dans le modèle Patient
public function traitements()
{
    return $this->hasMany(Traitement::class, 'consultation_id');
}


    // App\Models\Patient.php

public function medecin()
{
    return $this->belongsTo(Medecin::class);
}

    public function allergies()
    {
        return $this->belongsToMany(Allergie::class, 'patient_allergies')
            ->withTimestamps()
            ->withPivot('date_declaration', 'declare_par');
    }
}
