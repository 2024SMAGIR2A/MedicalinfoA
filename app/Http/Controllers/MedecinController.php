<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Patient;
use App\Models\Personne;
use App\Models\Traitement;
use Illuminate\Http\Request;

class MedecinController extends Controller
{

    public function getPatientAllergies($id)
{
    // Récupérer le patient avec ses allergies
    $patient = Patient::with(['allergies'])->findOrFail($id);

    // Récupérer les allergies et ajouter le nom du médecin correspondant à chaque allergie
    $allergies = $patient->allergies->map(function ($allergie) {
        // Convertir declare_par en entier
        $declareParId = (int) $allergie->pivot->declare_par;

        // Chercher le médecin par son ID
        $medecin = Personne::find($declareParId);

        // Vérifier si le médecin existe avant d'accéder à ses propriétés
        $allergie->medecin_nom = $medecin ? $medecin->nom : 'Non spécifié'; // Nom du médecin ou 'Non spécifié' si aucun médecin

        return $allergie;
    });

    // Retourner les données en tant que vue partielle ou JSON pour la modale
    return response()->json([
        'patient' => [
            'nom' => $patient->personne->nom,
            'prenom' => $patient->personne->prenom,
            'matricule' => $patient->matricule,
        ],
        'allergies' => $allergies, // Inclure les allergies avec le nom du médecin
    ]);
}



// app/Http/Controllers/PatientController.php
/*
public function getTraitements($patientId)
{
    // Récupérer les traitements du patient via une jointure avec les consultations
    $patient = Patient::findOrFail($patientId);
    $traitements = Traitement::whereHas('consultation', function ($query) use ($patientId) {
        $query->where('patient_id', $patientId);
    })->get();

    // Retourner les données sous forme de réponse JSON
    return response()->json([
        'patient' => $patient,
        'traitements' => $traitements
    ]);
}

*/



    public function dashboard()
    {
        return view('medecin.dashboard');
    }

    public function viewDossiers(Request $request)
    {
        // Nombre d'enregistrements par page
        $perPage = $request->get('per_page', 10); // Par défaut 10

        // Récupérer le matricule recherché
        $search = $request->get('search');

        // Filtrer les patients si une recherche est effectuée
        $patients = Patient::with(['personne', 'allergies'])
            ->when($search, function ($query, $search) {
                return $query->where('matricule', 'LIKE', "%{$search}%");
            })
            ->paginate($perPage);

        return view('medecin.dossiers', compact('patients', 'search'));
    }







}
