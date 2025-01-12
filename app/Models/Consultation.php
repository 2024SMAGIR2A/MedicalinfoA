<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'medecin_id',
        'diagnostic',
        'status',
        'motif',
        'notesMedecin',
        'dateConsul',
    ];

    /**
     * Relation avec le patient.
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Relation avec le médecin.
     */
    public function medecin()
    {
        return $this->belongsTo(Medecin::class);
    }

    /**
     * Relation avec la facture.
     * Une consultation peut avoir zéro ou une seule facture.
     */
    public function facture()
    {
        return $this->hasOne(Facture::class);
    }


}
