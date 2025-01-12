<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneDeTraitement extends Model
{
    use HasFactory;

    protected $fillable = ['traitement_id', 'medicament', 'dosage','frequence','instructions'];

    public function traitement()
    {
        return $this->belongsTo(Traitement::class);
    }
}
