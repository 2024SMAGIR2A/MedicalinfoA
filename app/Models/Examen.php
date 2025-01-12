<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;

    protected $fillable = ['type_examen_id', 'consultation_id', 'resultats', 'remarques'];

    public function typeExamen()
    {
        return $this->belongsTo(TypeExamen::class);
    }

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
}
