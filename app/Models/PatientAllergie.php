<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAllergie extends Model
{
    use HasFactory;

    protected $table = 'patient_allergies';

    protected $fillable = [
        'patient_id',
        'allergie_id',
        'date_declaration',
        'declare_par',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function allergie()
    {
        return $this->belongsTo(Allergie::class);
    }

    public function declarant()
    {
        return $this->belongsTo(Personne::class, 'declare_par');
    }
}
