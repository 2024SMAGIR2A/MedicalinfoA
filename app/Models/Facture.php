<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [
        'consultation_id',
        'montant_total',
        'date_facture',
    ];

    /**
     * Relation avec la consultation.
     * Une facture est toujours liée à une seule consultation.
     */
    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
}
