<aside class="main-sidebar">
    <!-- barre latérale -->
    <div class="sidebar">
        <!-- Panneau utilisateur de la barre latérale -->
        <div class="user-panel">
            <div class="image pull-left">
            </div>
            <div class="info">
                <h4>Bienvenue</h4>
                <p>{{ Auth::user()->nom ?? 'Utilisateur' }}</p>
                <br>
                <p>
                    <label class="badge" style="background: white;color:black;">
                        <b>{{ Auth::user()->type }}</b>
                    </label>
                </p>
            </div>


        </div>

        <!-- Menu de la barre latérale -->
        <!-- Menu Administrateur -->
        @if(Auth::user()->type == 'Administrateur')
        <ul class="sidebar-menu">
            <li class="active">
                <a href=""><i class="fa fa-tachometer"></i><span>Tableau de bord</span></a>
            </li>

            <!-- Médecin -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-md"></i><span>Médecin</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="">Ajouter un médecin</a></li>
                    <li><a href="">Liste des médecins</a></li>
                </ul>
            </li>

            <!-- Patient -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i><span>Patient</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="">Ajouter un patient</a></li>
                    <li><a href="">Liste des patients</a></li>
                </ul>
            </li>

            <!-- Département -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-sitemap"></i><span>Département</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="">Ajouter un département</a></li>
                    <li><a href="">Liste des départements</a></li>
                </ul>
            </li>

            <!-- Emploi du temps -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar"></i> <span>Emploi du temps</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="">Ajouter un emploi du temps</a></li>
                    <li><a href="">Liste des emplois du temps</a></li>
                </ul>
            </li>

            <!-- Rendez-vous -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar-check-o"></i><span>Rendez-vous</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="">Ajouter un rendez-vous</a></li>
                    <li><a href="">Liste des rendez-vous</a></li>
                </ul>
            </li>

            <!-- Paiement -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-credit-card-alt"></i><span>Paiement</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="">Ajouter un paiement</a></li>
                    <li><a href="">Liste des paiements</a></li>
                </ul>
            </li>

            <!-- Rapport -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text"></i><span>Rapport</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="">Rapport par patient</a></li>
                    <li><a href="">Rapport par médecin</a></li>
                    <li><a href="">Rapport total</a></li>
                </ul>
            </li>

            <!-- Ressources humaines -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i><span>Ressources humaines</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="">Ajouter un employé</a></li>
                    <li><a href="">Liste des employés</a></li>
                    <li><a href="">Ajouter une infirmière</a></li>
                    <li><a href="">Liste des infirmières</a></li>
                    <li><a href="">Ajouter un pharmacien</a></li>
                    <li><a href="">Liste des pharmaciens</a></li>
                    <li><a href="">Ajouter un représentant</a></li>
                    <li><a href="">Liste des représentants</a></li>
                </ul>
            </li>

            <!-- Avis -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-comment-o"></i><span>Avis</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="">Ajouter un avis</a></li>
                    <li><a href="">Liste des avis</a></li>
                </ul>
            </li>

            <!-- Mail -->
            <li>
                <a href="">
                    <i class="fa fa-envelope"></i><span> Mail</span>
                </a>
            </li>

        </ul>
    @endif



        <!-- Menu Médecin -->
        @if(Auth::user()->type == 'Medecin')
        <ul class="sidebar-menu">
            <li class="active">
                <a href=""><i class="fa fa-hospital-o"></i><span>Tableau de bord</span></a>
            </li>

            <!-- Centre de Santé -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-hospital-o"></i><span>Centre de Santé</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <!-- Sous-menus à ajouter ici si nécessaire -->
                </ul>
            </li>

            <!-- Consultations -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-stethoscope"></i><span>Consultations</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <!-- Sous-menus à ajouter ici si nécessaire -->
                </ul>
            </li>

            <!-- Traitements -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-medkit"></i><span>Traitements</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <!-- Sous-menus à ajouter ici si nécessaire -->
                </ul>
            </li>

            <!-- Patient -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i><span>Patient</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="">Mes patients</a></li>
                    <!-- Sous-menus à ajouter ici si nécessaire -->
                </ul>
            </li>

            <!-- Emploi du temps -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar"></i><span>Emploi du temps</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="">Ajouter un emploi du temps</a></li>
                    <li><a href="">Mon emploi du temps</a></li>
                </ul>
            </li>

            <!-- Rendez-vous -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar-check-o"></i><span>Rendez-vous</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="">Mes rendez-vous</a></li>
                </ul>
            </li>

            <!-- Mail -->
            <li>
                <a href="">
                    <i class="fa fa-envelope"></i><span>Mail</span>
                </a>
            </li>

        </ul>
    @endif



        <!-- Menu Patient -->
        @if(Auth::user()->type == 'Patient')
        <ul class="sidebar-menu">
            <li class="active">
                <a href=""><i class="fa fa-tachometer"></i><span>Tableau de bord</span></a>
            </li>

            <!-- Mes Bilans de Santé -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-heartbeat"></i><span>Mes Bilans de Santé</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <!-- Sous-menus à ajouter ici si nécessaire -->
                </ul>
            </li>

            <!-- Mes Consultations -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-stethoscope"></i><span>Mes Consultations</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <!-- Sous-menus à ajouter ici si nécessaire -->
                </ul>
            </li>

            <!-- Allergies -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bell"></i><span>Allergies</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <!-- Sous-menus à ajouter ici si nécessaire -->
                </ul>
            </li>

            <!-- Mes Traitements -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-medkit"></i><span>Mes Traitements</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="">Consulter les traitements</a></li>
                    <!-- Ajoutez d'autres sous-menus ici si nécessaire -->
                </ul>
            </li>

            <!-- Mon Dossier Médical -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i><span>Mon Dossier Médical</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="">Consulter mon dossier médical</a></li>
                    <!-- Ajoutez d'autres sous-menus ici si nécessaire -->
                </ul>
            </li>

            <!-- Rendez-vous -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar-check-o"></i><span>Rendez-vous</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="">Mes rendez-vous</a></li>
                    <!-- Ajoutez d'autres sous-menus ici si nécessaire -->
                </ul>
            </li>

            <!-- Mail -->
            <li>
                <a href="">
                    <i class="fa fa-envelope"></i><span>Mail</span>
                </a>
            </li>

        </ul>
    @endif


        <!-- Menu Assistante Médicale -->
        @if(Auth::user()->type == 'AssistanteMedicale')
    <ul class="sidebar-menu">
        <li class="active">
            <a href=""><i class="fa fa-tachometer"></i><span>Tableau de bord</span></a>
        </li>

        <!-- Gestion des Rendez-vous -->
        <li class="treeview">
            <a href="#">
                <i class="fa fa-calendar-check-o"></i><span>Gérer Rendez-vous</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="">Consulter les rendez-vous</a></li>
                <li><a href="">Ajouter un rendez-vous</a></li>
                <li><a href="">Annuler un rendez-vous</a></li>
            </ul>
        </li>

        <!-- Emploi du temps -->
        <li class="treeview">
            <a href="#">
                <i class="fa fa-calendar"></i><span>Emploi du temps</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="">Consulter</a></li>
                <li><a href="">Modifier</a></li>
            </ul>
        </li>

        <!-- Paiement -->
        <li class="treeview">
            <a href="#">
                <i class="fa fa-credit-card"></i><span>Paiement</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="">Ajouter un paiement</a></li>
                <li><a href="">Liste des paiements</a></li>
            </ul>
        </li>

        <!-- Rapports -->
        <li class="treeview">
            <a href="#">
                <i class="fa fa-bar-chart"></i><span>Rapport</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="">Rapport par patient</a></li>
                <li><a href="">Rapport par médecin</a></li>
                <li><a href="">Rapport global</a></li>
            </ul>
        </li>

        <!-- Mail -->
        <li>
            <a href="">
                <i class="fa fa-envelope"></i><span>Mail</span>
            </a>
        </li>
    </ul>
@endif


    </div>
</aside>
