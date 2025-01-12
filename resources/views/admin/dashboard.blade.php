@extends('layouts.app')





@section('content')



    <!-- En-tête de contenu -->
    <section class="content-header">
        <form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Rechercher...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn"><i
                            class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <div class="header-icon">
            <i class="fa fa-tachometer"></i>
        </div>
        <div class="header-title">
            <h1> Tableau de bord</h1>
            <small> Fonctionnalités du tableau de bord</small>

        </div>
    </section>
    <!-- Contenu principal -->
    <section class="content">



    <!-- Contrôle pour les Administrateurs -->
@if(Auth::user()->type == 'Administrateur')
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
        <div class="panel panel-bd cardbox">
            <div class="panel-body">
                <div class="statistic-box">
                    <h2><span class="count-number">45</span></h2>
                </div>
                <div class="items pull-left">
                    <i class="fa fa-calendar-check fa-2x"></i>
                    <h4>Utilisateurs</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- Médecins : Consultations -->
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
        <div class="panel panel-bd cardbox">
            <div class="panel-body">
                <div class="statistic-box">
                    <h2><span class="count-number">120</span></h2>
                </div>
                <div class="items pull-left">
                    <i class="fa fa-stethoscope fa-2x"></i>
                    <h4>Medecins</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Médecins : Patients -->
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
        <div class="panel panel-bd cardbox">
            <div class="panel-body">
                <div class="statistic-box">
                    <h2><span class="count-number">300</span></h2>
                </div>
                <div class="items pull-left">
                    <i class="fa fa-users fa-2x"></i>
                    <h4>Patients</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
        <div class="panel panel-bd cardbox">
            <div class="panel-body">
                <div class="statistic-box">
                    <h2><span class="count-number">45</span></h2>
                </div>
                <div class="items pull-left">
                    <i class="fa fa-calendar-check fa-2x"></i>
                    <h4>Assistantes</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
        <div class="panel panel-bd cardbox">
            <div class="panel-body">
                <div class="statistic-box">
                    <h2><span class="count-number">45</span></h2>
                </div>
                <div class="items pull-left">
                    <i class="fa fa-calendar-check fa-2x"></i>
                    <h4>Admins</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- Médecins : Rendez-vous -->
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
        <div class="panel panel-bd cardbox">
            <div class="panel-body">
                <div class="statistic-box">
                    <h2><span class="count-number">45</span></h2>
                </div>
                <div class="items pull-left">
                    <i class="fa fa-calendar-check fa-2x"></i>
                    <h4>Rendez-vous</h4>
                </div>
            </div>
        </div>
    </div>

</div>
@endif





    </section>



@endsection
