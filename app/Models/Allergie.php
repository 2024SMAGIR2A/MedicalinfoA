<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allergie extends Model
{
    use HasFactory;

    protected $fillable = ['name','niveauSeverite'];

    /**
     * Relation avec les patients via la table pivot `patient_allergies`.
     */
    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'patient_allergies')
            ->withTimestamps()
            ->withPivot('date_declaration', 'declare_par');
    }


}
