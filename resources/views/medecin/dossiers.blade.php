@extends('layouts.app')





@section('content')

    <!-- En-tête de contenu -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-folder"></i>
        </div>
        <div class="header-title">
            <form action="#" method="get"
                class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn"><i
                                class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
            <h1>Dossiers Médicaux</h1>
            <small>Liste complète</small>
            <ol class="breadcrumb hidden-xs">
                <li><a href=""><i class="pe-7s-home"></i> </a></li>
                <li class="active">Dossiers médicaux</li>
            </ol>
        </div>
    </section>
    <!-- Contenu principal -->

    <!-- Contrôle pour les Medecins -->


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                    <!--div class="btn-group">
                        <a class="btn btn-success" href="forms_basic.html"> <i class="fa fa-plus"></i> Ajoute Nouveau Dossier
                        </a>
                    </div-->
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="panel-header">
                            <div class="col-sm-4 col-xs-12">
                                <div class="dataTables_length">
                                    <label>Display
                                        <select name="example_length">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> records per page</label>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="dataTables_length">
                                    <a class="btn btn-default buttons-copy btn-sm" tabindex="0">
                                        <span>Copy</span></a>
                                    <a class="btn btn-default buttons-csv buttons-html5 btn-sm"
                                        tabindex="0"><span>CSV</span></a>
                                    <a class="btn btn-default buttons-excel buttons-html5 btn-sm"
                                        tabindex="0"><span>Excel</span></a>
                                    <a class="btn btn-default buttons-pdf buttons-html5 btn-sm"
                                        tabindex="0"><span>PDF</span></a>
                                    <a class="btn btn-default buttons-print btn-sm"
                                        tabindex="0"><span>Print</span></a>

                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="dataTables_length">
                                    <div class="input-group custom-search-form">
                                        <input type="search" class="form-control" placeholder="search..">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID PATIENT</th>
                                    <th>MATRICULE PATIENT</th>
                                    <th>EXAMENS</th>
                                    <th>ALLERGIES</th>
                                    <th>CONSULTATIONS</th>
                                    <th>TRAITEMENTS</th>
                                    <th> </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patients as $patient)

                                <tr>
                                    <td>{{ $patient->id }}</td>

                                    <td>{{ $patient->matricule }}</td>

                                    <td>
                                        <a class="btn btn-success" href="forms_basic.html"> <i class="fa fa-eye"></i>
                                            voir
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-success btn-view-allergies" data-id="{{ $patient->id }}" data-toggle="modal" data-target="#alergies">
                                            <i class="fa fa-eye"></i> Allergies
                                        </a>
                                    </td>


                                    <td>
                                        <a class="btn btn-success btn-view-consultations" data-toggle="modal" data-target="#modalConsultations" data-id="{{ $patient->id }}">
                                            <i class="fa fa-eye"></i> Historique
                                        </a>
                                    </td>

                                    <td>
                                        <a class="btn btn-success btn-view-traitements" data-toggle="modal" data-target="#modalTraitements" data-id="{{ $patient->id }}">
                                            <i class="fa fa-eye"></i> Traitements
                                        </a>
                                    </td>

                                    <td>
                                        <a class="btn btn-success"> <i class="fa fa-file-pdf-o"></i>
                                            DOSSIER EN PDF
                                        </a>
                                    </td>

                                </tr>

                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    <div class="page-nation text-right">
                        {{ $patients->links('vendor.pagination.default') }}
                    </div>



                </div>
            </div>

        </div>

    </div>
</section> <!-- /.content -->


<div id="alergies" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Détails Allergies</h4>
            </div>
            <div class="modal-body">
                <h5 id="patient-info" style="font-size: 22px;"></h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="allergies-table">
                        <thead>
                            <tr>
                                <th>Nom de l'allergie</th>
                                <th>Niveau de Sévérité</th>
                                <th>Date de Déclaration</th>
                                <th>Déclarée Par</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Les allergies seront chargées ici -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>








@endsection


