@extends('layouts.app')

@section('content')
<br/><br/><br/><br/>
<div class="container">
    <h1 class="text-center mb-4 display-4 text-primar" style="font-size:30px;color:#607d8b;">
        <i class="fa fa-user-shield me-2"></i>Tableau de bord Administrateur
    </h1>

    <p class="text-center text-muted mb-5">
        Salut <strong>{{ auth()->user()->username }}</strong>, gérez les fonctionnalités clés de la plateforme avec simplicité et efficacité.
    </p>
    <br/><br/>

    <div class="row g-4" style="margin-top: -70px;">
        @php
            $cards = [
                ['icon' => 'fa-users', 'title' => 'Gestion des Utilisateurs', 'description' => 'Ajoutez, modifiez ou supprimez les utilisateurs de la plateforme.', 'link' => '#', 'button' => 'Gérer les Utilisateurs'],
                ['icon' => 'fa-database', 'title' => 'Backups', 'description' => 'Planifier des sauvegardes.', 'link' => '#', 'button' => 'Gérer les sauvegardes'],
                ['icon' => 'fa-cogs', 'title' => 'Paramètres de la Plateforme', 'description' => 'Configurez les paramètres généraux de la plateforme.', 'link' => '#', 'button' => 'Configurer'],
                ['icon' => 'fa-chart-bar', 'title' => 'Statistiques Globales', 'description' => 'Analysez les données et performances de la plateforme.', 'link' => '#', 'button' => 'Voir les Statistiques'],
                ['icon' => 'fa-file-alt', 'title' => 'Gestion des Logs', 'description' => 'Consultez et suivez les activités des utilisateurs.', 'link' => '#', 'button' => 'Voir les Logs'],
                ['icon' => 'fa-life-ring', 'title' => 'Assistance et Support', 'description' => 'Accédez à l’assistance pour résoudre les problèmes techniques.', 'link' => '#', 'button' => 'Obtenir de l’Aide'],
            ];
        @endphp

        @foreach ($cards as $card)
        <div class="col-md-3">
            <a href="" style="text-decoration: none;">
            <div class="card border-0 shadow-lg h-100 bg-light">
                <div class="card-body text-center">
                    <div class="icon-container mb-3">
                        <i class="fa {{ $card['icon'] }} me-2" style="font-size: 2.5rem; color:#546a9a;"></i>
                    </div>
                    <h5 class="card-title fw-bold text-dar" style="color:#08193e;font-size:17px;">{{ $card['title'] }}</h5>
                    <p class="card-text text-muted" style="font-size: 15px;">{{ $card['description'] }}</p>

                </div>
            </div>
        </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
