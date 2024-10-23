<!-- start sidebar menu -->
			<div class="sidebar-container">
				<div class="sidemenu-container navbar-collapse collapse fixed-menu">
					<div id="remove-scroll" class="left-sidemenu">
						<ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false"
							data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
							<li class="sidebar-toggler-wrapper hide">
								<div class="sidebar-toggler">
									<span></span>
								</div>
							</li>
							<li class="sidebar-user-panel">
								<div class="user-panel">
								</div>
							</li>
							<li class="nav-item">
								<a href="{{ route('home') }}" class="nav-link nav-toggle"> <i class="material-icons">dashboard</i>
									<span class="title">Menu principal</span>
								</a>
							</li>
                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle"> <i class="material-icons">card_membership</i>
                                    <span class="title">Bannette</span> <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{ route('appel.index') }}" class="nav-link "> <span class="title">
                                                Appel</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('heredite.index') }}" class="nav-link "> <span class="title">
                                            Heredité </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('ordonnance.index') }}" class="nav-link "> <span class="title">
                                                Ordonnance</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('plumitif_civil.index') }}" class="nav-link "> <span class="title">
                                                Plumitif civil
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('plumitif_correctionnel.index') }}" class="nav-link "> <span class="title">
                                                Plumitif correctionnel
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('requette.index') }}" class="nav-link "> <span class="title">
                                                Requette
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('indexation_nationalite') }}" class="nav-link "> <span class="title">
                                                Nationalité
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('indexation_jugement') }}" class="nav-link "> <span class="title">
                                                Jugement Suppletif
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @can('Statistique Casier')
                                <li class="nav-item">
                                    <a href="{{ route('default_casier_user_jour') }}" class="nav-link nav-toggle"> <i class="material-icons">map</i>
                                        <span class="title">Statistique Casier</span>
                                    </a>
                                </li>
                            @endcan
                            @can('Statistique Jugement')
                                <li class="nav-item">
                                    <a href="{{ route('default_casier_user_jour') }}" class="nav-link nav-toggle"> <i class="material-icons">map</i>
                                        <span class="title">Statistique Casier</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('default_jugement_user_jour') }}" class="nav-link nav-toggle"> <i class="material-icons">assignment</i>
                                        <span class="title">Statistique jugement</span>
                                    </a>
                                </li>
                            @endcan
                            @can('Statistique Nationalite')
                                <li class="nav-item">
                                    <a href="{{ route('default_certificat_nationalite_user_jour') }}" class="nav-link nav-toggle"> <i class="material-icons">assignment</i>
                                        <span class="title">Statistique nationalité</span>
                                    </a>
                                </li>
                            @endcan
                            @role('Administrateur')
                                <!-- <li class="nav-item">
                                    <a href="#" class="nav-link nav-toggle"> <i class="material-icons">card_membership</i>
                                        <span class="title">Multi-Gest</span> <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item">
                                            <a href="{{ route('gest_appel.index') }}" class="nav-link "> <span class="title">
                                                    Appel</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('gest_jugement_suppletif.index') }}" class="nav-link "> <span class="title">
                                                Jugement suppletif </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('gest_nationalite.index') }}" class="nav-link "> <span
                                                    class="title">Nationalite</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('gest_ordonnance.index') }}" class="nav-link "> <span class="title">
                                                    Ordonnance</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('gest_plumitif_civil.index') }}" class="nav-link "> <span class="title">
                                                    Plumitif civil
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('gest_plumitif_correctionnel.index') }}" class="nav-link "> <span class="title">
                                                    Plumitif correctionnel
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('gest_requette.index') }}" class="nav-link "> <span class="title">
                                                    Requette
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('gest_heredite.index') }}" class="nav-link "> <span class="title">
                                                    Héredité
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li> -->
                                <li class="nav-item">
                                    <a href="#" class="nav-link nav-toggle"> <i class="material-icons">work</i>
                                        <span class="title">Armoire</span> <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item">
                                            <a href="{{ route('liste_appel') }}" class="nav-link "> <span class="title">
                                                    Appel</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('liste_heredite') }}" class="nav-link "> <span class="title">
                                                Heredité </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('liste_ordonnance') }}" class="nav-link "> <span class="title">
                                                    Ordonnance</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('liste_plumitif_civil') }}" class="nav-link "> <span class="title">
                                                    Plumitif civil
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('liste_plumitif_correctionnel') }}" class="nav-link "> <span class="title">
                                                    Plumitif correctionnel
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('liste_requette') }}" class="nav-link "> <span class="title">
                                                    Requette
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- Start Compte -->
                                <li class="nav-item">
                                    <a href="{{ route('compte_user.index') }}" class="nav-link nav-toggle"> <i class="material-icons">supervisor_account</i>
                                        <span class="title">Gestion des comptes</span>
                                    </a>
                                </li>
                                <!-- Start Permission -->
                                <li class="nav-item">
                                    <a href="{{ route('privilege.index') }}" class="nav-link nav-toggle"> <i class="material-icons">supervisor_account</i>
                                        <span class="title">Gestion des autorisations</span>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="{{ route('periode_antidate.index') }}" class="nav-link nav-toggle"> <i class="material-icons">assignment</i>
                                        <span class="title">Gestion des période</span>
                                    </a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="{{ route('default_casier_user_jour') }}" class="nav-link nav-toggle"> <i class="material-icons">map</i>
                                        <span class="title">Statistique Casier</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('default_jugement_user_jour') }}" class="nav-link nav-toggle"> <i class="material-icons">assignment</i>
                                        <span class="title">Statistique jugement</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('default_certificat_nationalite_user_jour') }}" class="nav-link nav-toggle"> <i class="material-icons">assignment</i>
                                        <span class="title">Statistique nationalité</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('gestion_statistique.index') }}" class="nav-link nav-toggle"> <i class="material-icons">assignment</i>
                                        <span class="title">Gestion des statistiques</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('gestion_signateur.index') }}" class="nav-link nav-toggle"> <i class="material-icons">assignment</i>
                                        <span class="title">Gestion des signateurs</span>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="{{ route('periode_normal.index') }}" class="nav-link nav-toggle"> <i class="material-icons">assignment</i>
                                        <span class="title">Periodes normales</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('import_sql') }}" class="nav-link nav-toggle"> <i class="material-icons">assignment</i>
                                        <span class="title">Import/export</span>
                                    </a>
                                </li> -->
                                <!-- <li class="nav-item">
                                    <a href="{{ route('check_num_jugement') }}" class="nav-link nav-toggle"> <i class="material-icons">assignment</i>
                                        <span class="title">Numéro non utiliser</span>
                                    </a>
                                </li> -->
                                <!-- <li class="nav-item">
                                    <a href="{{ route('duplique_num_jugement') }}" class="nav-link nav-toggle"> <i class="material-icons">assignment</i>
                                        <span class="title">Doublons numéro</span>
                                    </a>
                                </li> -->
                                <!-- <li class="nav-item">
                                    <a href="{{ route('duplique_num_jugement_anti') }}" class="nav-link nav-toggle"> <i class="material-icons">assignment</i>
                                        <span class="title">Doublons numéro anti</span>
                                    </a>
                                </li> -->
                            @endrole
                            <li class="nav-item">
                                <a href="{{ route('form_change_password') }}" class="nav-link nav-toggle"> <i class="material-icons">lock</i>
                                    <span class="title">Changer le mot de passe</span>
                                </a>
                            </li>
						</ul>
					</div>
				</div>
			</div>
<!-- end sidebar menu -->
<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">

