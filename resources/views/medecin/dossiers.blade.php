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


<script>

    // Fonction pour formater la date
    function formatDate(dateString) {
        const date = new Date(dateString);
        const day = ("0" + date.getDate()).slice(-2);  // Ajoute un 0 devant pour les jours < 10
        const month = ("0" + (date.getMonth() + 1)).slice(-2);  // Mois commence à 0
        const year = date.getFullYear();
        return `${day}/${month}/${year}`;
    }
    
    function calculateDateDifference(date1, date2) {
        // Convertir les dates du format DD/MM/YYYY en objets Date
        const [day1, month1, year1] = date1.split('/').map(Number);
        const [day2, month2, year2] = date2.split('/').map(Number);
    
        const dateObj1 = new Date(year1, month1 - 1, day1); // Mois commence à 0
        const dateObj2 = new Date(year2, month2 - 1, day2);
    
        // Calculer la différence en millisecondes
        const diffInMs = dateObj1 - dateObj2;
    
        // Convertir en jours
        const diffInDays = Math.ceil(diffInMs / (1000 * 60 * 60 * 24));
        return diffInDays;
    }
    
    
    $(document).ready(function () {
    
        //AJAX POUR CHARGER LES ALLERGIES
        console.log('erfref');
        $('.btn-view-allergies').on('click', function () {
            const patientId = $(this).data('id');
    
            // Réinitialiser la modale
            $('#patient-info').text('');
            $('#allergies-table tbody').html('<tr><td colspan="7">Chargement...</td></tr>');
    
            // Faire une requête AJAX pour obtenir les allergies
            $.ajax({
                url: `/patients/${patientId}/allergies`,
                method: 'GET',
                success: function (response) {
                    // Mettre à jour les informations du patient
                    $('#patient-info').text(
                        `Patient : ${response.patient.nom} ${response.patient.prenom} (Matricule : ${response.patient.matricule})`
                    );
    
                    // Afficher les allergies
                    console.log(response);
                    if (response.allergies.length > 0) {
                        let rows = '';
                        response.allergies.forEach(allergie => {
                            rows += `
                                <tr>
                                    <td>${allergie.name}</td>
                                    <td>
        <span class="label"
              style="background-color:
                ${allergie.niveauSeverite === 'Léger' ? 'green' :
                (allergie.niveauSeverite === 'Modéré' ? 'orange' :
                (allergie.niveauSeverite === 'Sévere' ? 'red' : 'gray'))}">
            ${allergie.niveauSeverite}
        </span>
    </td>
    
                                    <td><i class="fa fa-clock-o"></i> ${allergie.pivot.date_declaration ? formatDate(allergie.pivot.date_declaration) : 'Non spécifiée'}</td>
                                    <td><i class="fa fa-user-md"></i> DR ${allergie.medecin_nom || 'Non spécifié'}</td>
                                </tr>
                            `;
                        });
                        $('#allergies-table tbody').html(rows);
                    } else {
                        $('#allergies-table tbody').html('<tr><td colspan="4">Aucune allergie trouvée.</td></tr>');
                    }
                },
                error: function () {
                    $('#allergies-table tbody').html('<tr><td colspan="7">Erreur lors du chargement des données.</td></tr>');
                }
            });
        });
    
    
        //AJAX POUR CHARGER LES TRAITEMENTS
        $('.btn-view-traitements').on('click', function () {
            const patientId = $(this).data('id');
    
            // Réinitialiser la modale
            $('#patient-info-traitement').text('');
            $('#traitements-table tbody').html('<tr><td colspan="7">Chargement...</td></tr>');
    
            // Faire une requête AJAX pour obtenir les traitements
            $.ajax({
                url: `/patients/${patientId}/traitements`,
                method: 'GET',
                success: function (response) {
                    // Mettre à jour les informations du patient
                    console.log(response);
                    $('#patient-info-traitement').text(
                        `Patient : ${response.patient.nom} ${response.patient.prenom} (Matricule : ${response.patient.matricule})`
                    );
    
                    // Afficher les traitements
                    if (response.traitements.length > 0) {
                        let rows = '';
                        response.traitements.forEach(traitement => {
                            rows += `
                                <tr>
                                    <td>${traitement.description}</td>
                                    <td style="font-weight:bolder;font-size:15px;color:;">${traitement.duree} jours </td>
                                    <td>${formatDate(traitement.datePrescription)}</td>
                                    <td>
        <span class="label"
              style="background-color:
                ${traitement.statut === 'Terminé' ? 'green' :
                (traitement.statut === 'En cours' ? 'orange' : 'gray')}">
            ${traitement.statut === 'En cours' ?
                '<i class="fa fa-spinner fa-spin"></i> En cours' :
                (traitement.statut === 'Terminé' ? 'Terminé' : 'Non spécifié')}
        </span>
    </td>
    <td>
    <a class="btn btn-success" id="btn-view-ligne" data-toggle="modal" data-target="#modal-lignes" data-id="${traitement.id}">
        <i class="fa fa-eye"></i> Détails Traitement
    </a>
    
    </td>
    
    
    
                                </tr>
                            `;
                        });
                        $('#traitements-table tbody').html(rows);
                    } else {
                        $('#traitements-table tbody').html('<tr><td colspan="4">Aucun traitement administré pour le moment.</td></tr>');
                    }
                },
                error: function () {
                    $('#traitements-table tbody').html('<tr><td colspan="4">Erreur lors du chargement des données.</td></tr>');
                }
            });
        });
    
    
        //AJAX POUR CHARGER LES CONSULTATIONS
        $('.btn-view-consultations').on('click', function () {
            const patientId = $(this).data('id');
    
            // Réinitialiser la modale
            $('#patient-info-consultation').text('');
            $('#consultations-table tbody').html('<tr><td colspan="7">Chargement...</td></tr>');
    
            // Faire une requête AJAX pour obtenir les consultations
            $.ajax({
                url: `/patients/${patientId}/consultations`,
                method: 'GET',
                success: function (response) {
                    // Mettre à jour les informations du patient
                    $('#patient-info-consultation').text(
                        `Patient : ${response.patient.nom} ${response.patient.prenom} (Matricule : ${response.patient.matricule})`
                    );
    
                    // Afficher les consultations
                    if (response.consultations.length > 0) {
                        let rows = '';
                        response.consultations.forEach(consultation => {
                            const dateConsul = consultation.dateConsul;
                            const currentDate = formatDate(new Date()); // Date système formatée
                            const daysDifference = calculateDateDifference(currentDate, dateConsul);
    
    
                                                // Déterminer le statut 2 basé sur la comparaison des dates
                        const statut2 = daysDifference > 0
                            ? '<span class="label label-success" style="background:gray;border:none;"><i class="fa fa-check"></i> déjà effectuée</span>'
                            : '<span class="label label-danger"><i class="fa fa-clock-o"></i> pas encore effectuée</span>';
    
                            rows += `
                                <tr>
                                    <td><i class="fa fa-clock-o"></i>${consultation.dateConsul}</td>
                                    <td>${consultation.motif}</td>
                                    <td>${consultation.diagnostic}</td>
                                    <td>${consultation.notesMedecin}</td>
    <td>
        <span class="label ${consultation.status === 'E' ? 'label-warning' : 'label-success'}">
            ${consultation.status === 'E'
                ? '<i class="fa fa-spinner fa-spin"></i> En attente'
                : '<i class="fa fa-check"></i> Validé'}
        </span>
    </td>
    
    
                                    <td> <i class="fa fa-user-md"></i> DR ${consultation.medecin_prenom} ${consultation.medecin_nom}</td>
                                    <td>${statut2}</td>
    
    
    
                                </tr>
                            `;
                        });
                        $('#consultations-table tbody').html(rows);
                    } else {
                        $('#consultations-table tbody').html('<tr><td colspan="7">Aucune consultation trouvée.</td></tr>');
                    }
                },
                error: function () {
                    $('#consultations-table tbody').html('<tr><td colspan="7">Erreur lors du chargement des données.</td></tr>');
                }
            });
        });
    
    
    
    //ligne traitement
     // Gestion des lignes de traitement
     $(document).on('click', '#btn-view-ligne', function () {
            const traitementId = $(this).data('id');
    
            // Affichage d'un message de chargement
            $('#lignes-table tbody').html('<tr><td colspan="4">Chargement des lignes...</td></tr>');
    
            // Requête AJAX pour les lignes de traitement
            $.ajax({
                url: `/traitements/${traitementId}/lignes`,
                method: 'GET',
                success: function (response) {
                    if (response.lignes.length > 0) {
                        let rows = '';
                        response.lignes.forEach(ligne => {
                            rows += `
                                <tr>
                                    <td>${ligne.medicament}</td>
                                    <td>${ligne.dosage}</td>
                                    <td>${ligne.frequence}</td>
                                    <td>${ligne.instructions}</td>
                                </tr>
                            `;
                        });
                        $('#lignes-table tbody').html(rows);
                    } else {
                        $('#lignes-table tbody').html('<tr><td colspan="4">Aucune ligne trouvée.</td></tr>');
                    }
    
                    // Affichage de la modale
                    $('#modal-lignes').modal('show');
                },
                error: function () {
                    $('#lignes-table tbody').html('<tr><td colspan="4">Erreur lors du chargement des lignes.</td></tr>');
                }
            });
            });
    
    
    
    });
    
    
    
    
    
    </script>

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



<!-- Modal pour les traitements -->
<div id="modalTraitements" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title" id="patient-info-traitement" style="font-size: 24px;">Détails des Traitements</h4>
            </div>
            <div class="modal-body">
                <!--h5 id="" style="font-size: 22px;"></h5-->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="traitements-table">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Durée</th>
                                <th>Date de prescription</th>
                                <th>Statut</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Les traitements seront chargés ici -->
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

<div id="modal-lignes" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title" id="patient-info-ligne"></h3>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="lignes-table">
                        <thead>
                            <tr>
                                <th>MÉDICAMENT</th>
                                <th>DOSE</th>
                                <th>FRÉQUENCE</th>
                                <th>INSTRUCTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Les lignes de traitement seront chargées ici -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="close-modal" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>


<div id="modalConsultations" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                 <h3 class="modal-title" id="patient-info-consultation"></h3>
            </div>
            <div class="modal-body">
                <!--h5 id="patient-info-consultation" style="font-size: 22px;"></h5-->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="consultations-table">
                        <thead>
                            <tr>
                                <th>LE</th>
                                <th>MOTIF</th>
                                <th>DIAGNOSTIC</th>
                                <th>NOTES MEDECIN</th>
                                <th>STATUT RDV</th>
                                <th>MEDECIN</th>
                                <th>STATUT CONSULTATION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Les consultations seront chargées ici -->
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


