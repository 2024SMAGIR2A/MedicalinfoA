<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;  // Ajouter ce trait

class Personne extends Authenticatable
{
    use HasFactory, HasRoles;  // Ajouter le trait HasRoles ici


    protected $fillable = ['nom', 'prenom', 'email', 'username', 'password', 'type'];

    protected $hidden = ['password', 'remember_token'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    // Relation avec Medecin (un à un)
    public function medecin()
    {
        return $this->hasOne(Medecin::class);
    }

    // Relation avec Patient (un à un)
    public function patient()
    {
        return $this->hasOne(Patient::class);
    }

    // Relation avec User (un à un)
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function administrateur()
    {
        return $this->hasOne(Administrateur::class);
    }


    public function assistantemedicale()
    {
        return $this->hasOne(AssistanteMedicale::class);
    }

}
