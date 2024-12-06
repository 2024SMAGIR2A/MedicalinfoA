@extends('layouts.app')

@section('content')
<br/><br/>
<div class="container mt-5">
    <h1 class="text-center mb-4 display-4" style="font-size:30px;color:#546a9a;;">
        <i class="fa fa-user-md me-2"></i>Tableau de bord Médécin
    </h1>
    <p class="text-center text-muted mb-5">
        Bienvenue dans votre espace personnel. Gérez vos rendez-vous, consultez vos résultats d'analyses, et mettez à jour vos informations.
    </p>

    <div class="row g-4">
        <!-- Bloc Prise de Rendez-vous -->
        <div class="col-md-3">
            <a href="" style="text-decoration: none;">
            <div class="card border-0 shadow-lg rounded-lg h-100">
                <div class="card-body text-center">
                    <div class="icon-container mb-4">
                        <i class="fas fa-calendar-check" style="font-size: 2.5rem; color: #546a9a;;"></i>
                    </div>
                    <h5 class="card-title fw-bold mb-3" style="font-size:17px;color:#08193e;">Prise de Rendez-vous</h5>
                    <p class="card-text text-muted mb-3" style="font-size: 15px;">Réservez un rendez-vous avec votre médecin ou un spécialiste de la plateforme.</p>
                </div>
            </div>
            </a>
        </div>

        <!-- Bloc Accès aux Résultats d'Analyses -->
        <div class="col-md-3">
            <a href="" style="text-decoration: none;">
            <div class="card border-0 shadow-lg rounded-lg h-100">
                <div class="card-body text-center">
                    <div class="icon-container mb-4">
                        <i class="fas fa-file-medical-alt" style="font-size: 2.5rem; color: #546a9a;;"></i>
                    </div>
                    <h5 class="card-title fw-bold mb-3" style="font-size:17px;color:#08193e;">Résultats d'Analyses</h5>
                    <p class="card-text text-muted mb-3" style="font-size: 15px;">Consultez vos résultats d'analyses médicales et suivez l'évolution de votre santé.</p>
                </div>
            </div>
            </a>
        </div>

        <!-- Bloc Mise à Jour du Profil -->
        <div class="col-md-3">
            <a href="" style="text-decoration: none;">
                <div class="card border-0 shadow-lg rounded-lg h-100">
                    <div class="card-body text-center">
                        <div class="icon-container mb-4">
                            <i class="fas fa-user-edit" style="font-size: 2.5rem; color :#546a9a;;"></i>
                        </div>
                        <h5 class="card-title fw-bold mb-3" style="font-size:17px;color:#08193e;">Mettre à Jour mon Profil</h5>
                        <p class="card-text text-muted mb-3" style="font-size: 15px;">Mettez à jour vos informations personnelles et vos préférences.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .hover-btn:hover {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }
</style>
@endsection
