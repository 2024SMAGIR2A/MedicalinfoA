@extends('layouts.appoffline')

@section('content')
<!-- Content Wrapper -->
<div class="login-wrapper">

    <div class="container-center">
        <div class="panel panel-bd">
            <div class="panel-heading">
                <div class="view-header">
                    <div class="header-icon">
                        <i class="pe-7s-unlock"></i>
                    </div>
                    <div class="header-title">
                        <h3>MEDICAL INFO 1.0</h3>
                        <small><strong>Veuillez entrer vos identifiants pour vous connecter.</strong></small>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" id="loginForm" novalidate>
                    @csrf

                    <div class="form-group">
                        <label class="control-label" for="username">Identifiant</label>
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autofocus placeholder="exemple@gmail.com">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red;">{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="help-block small">Votre identifiant unique pour l'application</span>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="password">Mot de Passe</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="******">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red;">{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="help-block small">Votre mot de passe fort</span>
                    </div>

                    <div style="float: right;">
                        <button type="submit" class="btn btn-primary">Connexion</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->

@endsection
