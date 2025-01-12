<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medecin extends Personne
{
    protected $fillable = ['specialite'];

    public function personne()
    {
        return $this->belongsTo(Personne::class);
    }

    // Dans le modèle Medecin
public static function getNomById($id)
{
    $medecin = self::find($id);  // Recherche du médecin par son ID
    return $medecin ? $medecin->nom : null;  // Retourne le nom ou null si aucun médecin n'est trouvé
}

}
