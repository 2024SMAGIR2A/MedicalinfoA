<div class="content-wrapper">
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

    <!-- Contrôle pour les administrateurs -->
    @if(Auth::user()->type == 'Administrateur')
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                <div class="panel panel-bd cardbox">
                    <div class="panel-body">
                        <div class="statistic-box">
                            <h2><span class="count-number">15</span>
                            </h2>
                        </div>
                        <div class="items pull-left">
                            <i class="fa fa-users fa-2x"></i>
                            <h4>Médecins </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                <div class="panel panel-bd cardbox">
                    <div class="panel-body">
                        <div class="statistic-box">
                            <h2><span class="count-number">19</span>
                            </h2>
                        </div>
                        <div class="items pull-left">
                            <i class="fa fa-users fa-2x"></i>
                            <h4>Patients </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                <div class="panel panel-bd cardbox">
                    <div class="panel-body">
                        <div class="statistic-box">
                            <h2><span class="count-number">05</span>
                            </h2>
                        </div>
                        <div class="items pull-left">
                            <i class="fa fa-user-circle fa-2x"></i>
                            <h4>Représentant</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                <div class="panel panel-bd cardbox">
                    <div class="panel-body">
                        <div class="statistic-box">
                            <h2><span class="count-number">9</span>
                            </h2>
                        </div>
                        <div class="items pull-left">
                            <i class="fa fa-users fa-2x"></i>
                            <h4>Infirmiers </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                <div class="panel panel-bd cardbox">
                    <div class="panel-body">
                        <div class="statistic-box">
                            <h2><span class="count-number">6</span>
                            </h2>
                        </div>
                        <div class="items pull-left">
                            <i class="fa fa-user-circle fa-2x"></i>
                            <h4>Pharmacien</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                <div class="panel panel-bd cardbox">
                    <div class="panel-body">
                        <div class="statistic-box">
                            <h2><span class="count-number">3</span>
                            </h2>
                        </div>
                        <div class="items pull-left">
                            <i class="fa fa-users fa-2x"></i>
                            <h4>Laborantins</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                <div class="panel panel-bd cardbox">
                    <div class="panel-body">
                        <div class="statistic-box">
                            <h2><span class="count-number">4</span>
                            </h2>
                        </div>
                        <div class="items pull-left">
                            <i class="fa fa-users fa-2x"></i>
                            <h4>Comptable</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                <div class="panel panel-bd cardbox">
                    <div class="panel-body">
                        <div class="statistic-box">
                            <h2><span class="count-number">7</span>
                            </h2>
                        </div>
                        <div class="items pull-left">
                            <i class="fa fa-users fa-2x"></i>
                            <h4>Réceptionniste</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <!-- Contrôle pour les Medecins -->
@if(Auth::user()->type == 'Medecin')
<div class="row">
    <!-- Médecins : Consultations -->
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
        <div class="panel panel-bd cardbox">
            <div class="panel-body">
                <div class="statistic-box">
                    <h2><span class="count-number">120</span></h2>
                </div>
                <div class="items pull-left">
                    <i class="fa fa-stethoscope fa-2x"></i>
                    <h4>Consultations</h4>
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


<!-- Contrôle pour les assistantes médicales -->
@if(Auth::user()->type == 'AssistanteMedicale')
    <div class="row">
        <!-- Assistantes Médicales : Rendez-vous -->
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
            <div class="panel panel-bd cardbox">
                <div class="panel-body">
                    <div class="statistic-box">
                        <h2><span class="count-number">30</span></h2>
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


<!-- Contrôle pour les patients -->
@if(Auth::user()->type == 'Patient')
    <div class="row">
        <!-- Consultations pour les patients -->
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
            <div class="panel panel-bd cardbox">
                <div class="panel-body">
                    <div class="statistic-box">
                        <h2><span class="count-number">45</span></h2>
                    </div>
                    <div class="items pull-left">
                        <i class="fa fa-stethoscope fa-2x"></i>
                        <h4>Consultations</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bilans pour les patients -->
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
            <div class="panel panel-bd cardbox">
                <div class="panel-body">
                    <div class="statistic-box">
                        <h2><span class="count-number">10</span></h2>
                    </div>
                    <div class="items pull-left">
                        <i class="fa fa-file-medical fa-2x"></i>
                        <h4>Bilan</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rendez-vous pour les patients -->
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
            <div class="panel panel-bd cardbox">
                <div class="panel-body">
                    <div class="statistic-box">
                        <h2><span class="count-number">8</span></h2>
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
</div>
