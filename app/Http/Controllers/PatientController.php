<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Consultation;
use App\Models\Patient;
use App\Models\Traitement;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function dashboard()
    {
        return view('patient.dashboard');
    }

    public function getTraitements($id)
    {
        // Charger le patient avec ses informations personnelles
        $patient = Patient::with('personne')->findOrFail($id);

        // Récupérer les traitements du patient
        $traitements = Traitement::whereHas('consultation', function ($query) use ($id) {
            $query->where('patient_id', $id)->where('statut', 'En cours') // Filtrer les traitements en cours
            ;
        })->get();

        // Retourner une réponse JSON incluant les informations de la personne
        return response()->json([
            'patient' => [
                'id' => $patient->id,
                'nom' => $patient->personne->nom,
                'prenom' => $patient->personne->prenom,
                'matricule' => $patient->matricule,
            ],
            'traitements' => $traitements
        ]);
    }

    public function getConsultations($id)
    {
        // récupérer détails patients
    $patient = Patient::with('personne')->findOrFail($id);

    // Récupérer les consultations passées avec le médecin associé
    $consultations = Consultation::with('medecin.personne')
        ->where('patient_id', $id)
        ->where('status', "V")
        ->whereDate('dateConsul', '<', now()) // Comparer la date de la consultation avec la date actuelle
        ->get();

    return response()->json([
        'patient' => [
            'id' => $patient->id,
            'nom' => $patient->personne->nom,
            'prenom' => $patient->personne->prenom,
            'matricule' => $patient->matricule,
        ],
        'consultations' => $consultations->map(function ($consultation) {
            return [
                'dateConsul' => Carbon::parse($consultation->dateConsul)->format('d/m/Y'), // Format jour/mois/année
                'motif' => $consultation->motif,
                'diagnostic' => $consultation->diagnostic,
                'notesMedecin' => $consultation->notesMedecin,
                'status' => $consultation->status,
                'medecin_nom' => $consultation->medecin->personne->nom ?? 'Non spécifié',
                'medecin_prenom' => $consultation->medecin->personne->prenom ?? 'Non spécifié',
            ];
        }),
    ]);
}



}
