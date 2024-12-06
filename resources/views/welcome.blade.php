@extends('layouts.appoffline')

@section('content')
<!-- Content Wrapper -->
<div class="auth-background">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-8">
                <div class="text-center">
                    <!-- Logo ou Icône de bienvenue -->
                    <div class="mb-4">
                        <i class="fas fa-heartbeat fa-7x text-primary"></i> <!-- Icône santé -->
                    </div>

                    <h1 class="display-4">Bienvenue sur <span class="text-primary">Medical Info</span></h1>
                    <p class="lead">
                        Gérez efficacement vos informations médicales avec Medical Info. Une solution fiable pour médecins, patients et administrateurs.
                    </p>

                    <div class="mt-4">
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4" style="background: #08193e; border: 0px solid #08193e;">Connexion</a>
                        <a href="#" class="btn btn-secondary btn-lg px-4" style="background: #607d8b; border: 0px solid #607d8b;">Service client</a>
                    </div>

                    <div class="mt-4">
                        <p class="text-muted">Si vous avez besoin d'aide, n'hésitez pas à contacter notre service client.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->

@endsection
