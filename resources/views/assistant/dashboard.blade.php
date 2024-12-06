@extends('layouts.app')

@section('content')
<br/><br/>
<div class="container mt-5">
    <h1 class="text-center mb-4 display-4" style="font-size:30px;color:#4a5568;">
        <i class="fa fa-user-nurse me-2"></i>Tableau de bord Assistante Médicale
    </h1>
    <p class="text-center text-muted mb-5">
        Bienvenue dans votre espace de gestion. Gérez efficacement les rendez-vous et les informations des patients.
    </p>

    <div class="row g-4">
        @php
            $cards = [
                ['icon' => 'fas fa-calendar-check ', 'title' => 'Gestion des Rendez-vous', 'description' => 'Planifiez, modifiez ou annulez les rendez-vous des patients.', 'link' => '#', 'button' => 'Gérer les Rendez-vous'],
                ['icon' => 'fas fa-user-md', 'title' => 'Historique des Consultations', 'description' => 'Consultez les informations et les historiques médicaux des patients.', 'link' => '#', 'button' => 'Voir Historique'],
                ['icon' => 'fas fa-calendar-alt', 'title' => 'Organisation de l\'Agenda', 'description' => 'Gérez votre emploi du temps pour optimiser votre efficacité.', 'link' => '#', 'button' => 'Organiser l\'Agenda'],
            ];
        @endphp

        @foreach ($cards as $card)
        <div class="col-md-3">
            <a href="" style="text-decoration: none;">
            <div class="card border-0 shadow-lg h-100 bg-light">
                <div class="card-body text-center">
                    <div class="icon-container mb-3">
                        <i class="fa {{ $card['icon'] }}" style="font-size: 2.5rem; color:#546a9a;"></i>
                    </div>
                    <h5 class="card-title fw-bold text-dark" style="color:#08193e;font-size:17px;">{{ $card['title'] }}</h5>
                    <p class="card-text text-muted" style="font-size: 15px;">{{ $card['description'] }}</p>
                </div>
            </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
