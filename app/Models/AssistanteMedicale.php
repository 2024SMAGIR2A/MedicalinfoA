<?php

// app/Models/AssistanteMedicale.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssistanteMedicale extends Personne
{
    protected $fillable = ['personne_id'];

    public function personne()
    {
        return $this->belongsTo(Personne::class); // Relation avec le modèle Personne
    }
}
