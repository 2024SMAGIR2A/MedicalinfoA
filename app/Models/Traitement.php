<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traitement extends Model
{
    use HasFactory;

    protected $fillable = [
        'consultation_id',
        'statut',
        'administre_by',
        'duree',
        'datePrescription',
        'description',
    ];

    /**
     * Relation avec la consultation.
     */
    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }

    /**
     * Relation pour obtenir la personne qui a administré le traitement.
     */
    public function administrateur()
    {
        return $this->belongsTo(Personne::class, 'administre_by');
    }


    /**
     * Relation pour accéder aux lignes de traitement.
     */
    public function lignes()
    {
        return $this->hasMany(LigneDeTraitement::class);
    }


}
