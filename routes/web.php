<?php
use Illuminate\Support\Facades\Auth; // Ajouter cette ligne
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssistantController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TraitementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Page d'accueil
Route::get('/', function () {
    return redirect()->route('login');
});

// Routes d'authentification (gérées automatiquement par Auth::routes()) (gere les routes login, register...)
Auth::routes();



// Redirection après connexion (par défaut)
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Routes protégées pour les tableaux de bord
Route::middleware(['auth'])->group(function () {

    // Routes protégées pour les tableaux de bord

    //  le middleware verifie si le type de user Administrateur avant de lui permettre d'acceder a la route /admin/dashboard sinon erreur 403
    Route::middleware(['auth','type:Administrateur'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });

    //  le middleware verifie si le type de user AssistanteMedicale avant de lui permettre d'acceder a la route /assistant/dashboard sinon erreur 403
    Route::middleware(['auth','type:AssistanteMedicale'])->group(function () {
        Route::get('/assistant/dashboard', [AssistantController::class, 'dashboard'])->name('assistant.dashboard');
    });


    //  le middleware verifie si le type de user est Medecin avant de lui permettre d'acceder a la route /medecin/dashboard sinon erreur 403
    Route::middleware(['auth', 'type:Medecin'])->group(function () {
        Route::get('/medecin/dashboard', [MedecinController::class, 'dashboard'])->name('medecin.dashboard');
        Route::get('/medecin/dossiers', [MedecinController::class, 'viewDossiers'])->name('medecin.dossiers'); // Nouvelle route

        Route::get('/patients/{id}/allergies', [MedecinController::class, 'getPatientAllergies'])->name('patients.allergies');
        Route::get('/patients/{patientId}/traitements', [PatientController::class, 'getTraitements']);
        Route::get('/traitements/{traitementId}/lignes', [TraitementController::class, 'getLignesTraitement']);
     
        // ingrid
        Route::get('/patients/{id}/consultations', [PatientController::class, 'getConsultations']);
        
    });

    //  le middleware verifie si le type de user est Patient avant de lui permettre d'acceder a la route /patient/dashboard sinon erreur 403
    Route::middleware(['auth', 'type:Patient'])->group(function () {
        Route::get('/patient/dashboard', [PatientController::class, 'dashboard'])->name('patient.dashboard');
    });


});



