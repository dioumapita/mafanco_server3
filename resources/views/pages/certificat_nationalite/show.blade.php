@extends('layouts.themes._light_theme')
@section('content')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Détail d'un certificat de nationalité</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="{{ route('home') }}">Accueil</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li><a class="parent-item" href="#">Certificat</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Détail d'un certificat de nationalité</li>
        </ol>
    </div>
</div>
<a href="{{ route('certificat_nationalite.index') }}" class="btn btn-primary"><i class="fa fa-reply"></i> Retour</a>
<div id="media_screen" class="row">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
    <div class="profile-sidebar">
        <div class="card">
            <div class="card-head card-topline-aqua">
                <header> Informations</header>
            </div>
            <div class="card-body no-padding height-9">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>N°: {{ $certificat->num }} </b>
                    </li>
                    <li class="list-group-item">
                        <b>Que:  {{ $certificat->prenom_nom }}</b>
                    </li>
                    <li class="list-group-item">
                        <b>Né(e): {{ $certificat->date_naiss->format('d/m/Y') }}</b>
                    </li>
                    <li class="list-group-item">
                        <b>A: {{ $certificat->lieu }} </b>
                    </li>
                </ul>
                <br>
                <div class="text-center">
                    <a href="{{ route('certificat_nationalite.edit',$certificat->id) }}" class="btn btn-primary">Modifier <i class="fa fa-edit"></i></a>
                </div>
            </div>
        </div>
    </div>
<!-- END BEGIN PROFILE SIDEBAR -->

        <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div>
                    <div class="card">
                        <div class="card-head card-topline-aqua">
                            <header>Détail du certificat de nationalité de {{ $certificat->prenom_nom }}</header>
                        </div>
                        <div class="white-box">
                            <a id="media_screen"  href="#" onclick="printDiv('imprime')" class="btn btn-primary btn-lg"><i class="fa fa-print"></i> Imprimer le certificat</a>
                            <a href="#myModaldelete" data-toggle="modal" onclick="deleteData({{ $certificat->id }})"
                                class="btn btn-danger btn-lg">
                                <i class="fa fa-trash"></i> Supprimer
                            </a>
                            <div id="myModaldelete" class="mt-5 modal fade" data-backdrop="static">
                                <div class="mt-5 modal-dialog modal-confirm">
                                    <div class="modal-content">
                                        <div class="modal-header flex-column">
                                            <div class="icon-box">
                                                <i class="material-icons">&#xE5CD;</i>
                                            </div>
                                            <h4 class="modal-title w-100">Êtes-vous certain?</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                                Vous pouvez restaurer vos données supprimer au niveau de la corbeille
                                            </p>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                            <form action="{{ route('certificat_nationalite.destroy',$certificat->id) }}" method="post" id="deleteform">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button  type="button" onclick = "formSubmit()" class="btn btn-danger" data-dismiss="modal">
                                                    Oui Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <h4 class="text-center">
                                    <u><b>COPIE</b></u>
                                </h4>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#add_copie">Ajouter une copie
                                    <i class="fa fa-plus"></i>
                                </button>
                                <!-- debut modal -->
                                    <div class="modal fade" data-backdrop="static" id="add_copie" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div  class="modal-header btn btn-danger text-center text-white">
                                                    <h4 class="modal-title white-text w-100 font-weight-bold py-2">Ajouter une copie</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true" class="white-text">&times;</span>
                                                    </button>
                                                </div>
                                                <!-- start modal body -->
                                                    <div class="modal-body">
                                                            <form action="{{ route('doc_certificat.store') }}" method="post">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="nationnalite_id" value="{{ $certificat->id }}">
                                                                <div class="form-group">
                                                                    <label for="date_faits">Copie</label>
                                                                        <input type="text" class="form-control input-height"
                                                                            name="copie" placeholder="Veuillez entrer ou sélectionner une copie." list="copies" required>
                                                                            <datalist id="copies">
                                                                                <option value="de l'acte de naissance">de l'acte de naissance</option>
                                                                                <option value="de la pièce d'identité">de la pièce d'identité</option>
                                                                                <option value="du passeport">du passeport</option>
                                                                                <option value="du jugement suppletif">du jugement suppletif</option>
                                                                            </datalist>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="num_copie">Numéro</label>
                                                                    <input type="text"
                                                                        class="form-control" name="num_copie" id="num_copie">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="num_copie">Date</label>
                                                                    <input type="date"
                                                                        class="form-control" name="date_copie" id="date_copie"   required>
                                                                </div>
                                                                <div class="modal-footer d-flex justify-content-center">
                                                                    <button type="submit" class="btn btn-primary">Valider<i class="fa fa-check"> </i></button>
                                                                    <button class="btn btn-danger" data-dismiss="modal">Annuler <i class="fa fa-times"></i></button>
                                                                </div>
                                                            </form>
                                                    </div>
                                                <!-- end modal body -->
                                            </div>
                                        </div>
                                    </div>
                                <!-- fin modal -->
                                <div class="table-scrollable">
                                    <table
                                        class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                            id="eleves">
                                        <thead>
                                            <tr>
                                                <th class="text-center">N° Copie</th>
                                                <th class="text-center">Copie</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($certificat->docCertificats as $doc)
                                                <tr>
                                                    <td class="text-center">{{ $doc->num_copie }}</td>
                                                    <td class="text-center">{{ $doc->copie }}</td>
                                                    <td class="text-center">{{ $doc->date_copie->format('d/m/Y') }}</td>
                                                    <td style="width:16">
                                                        <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#update_copie{{ $doc->id }}">Modifier
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <a href="#ModalDeleteCopy" data-toggle="modal" onclick="deleteDataFait({{ $doc->id }})"
                                                            class="btn btn-danger btn-block">
                                                            <i class="fa fa-trash"></i> Supprimer
                                                        </a>
                                                        <div id="ModalDeleteCopy" class="mt-5 modal fade" data-backdrop="static">
                                                            <div class="mt-5 modal-dialog modal-confirm">
                                                                <div class="modal-content">
                                                                    <div class="modal-header flex-column">
                                                                        <div class="icon-box">
                                                                            <i class="material-icons">&#xE5CD;</i>
                                                                        </div>
                                                                        <h4 class="modal-title w-100">Êtes-vous certain?</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>
                                                                            Vous pouvez restaurer vos données supprimer au niveau de la corbeille
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer justify-content-center">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                        <form action="{{ route('doc_certificat.destroy',$doc->id) }}" method="post" id="deletecopie">
                                                                            {{ csrf_field() }}
                                                                            {{ method_field('DELETE') }}
                                                                            <button  type="button" onclick = "formSubmitCopy()" class="btn btn-danger" data-dismiss="modal">
                                                                                Oui Supprimer
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- debut modal -->
                                                            <div class="modal fade" data-backdrop="static" id="update_copie{{ $doc->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div  class="modal-header btn btn-danger text-center text-white">
                                                                            <h4 class="modal-title white-text w-100 font-weight-bold py-2">Modification</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true" class="white-text">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <!-- start modal body -->
                                                                            <div class="modal-body">
                                                                                    <form action="{{ route('doc_certificat.update',$doc->id) }}" method="post">
                                                                                        {{ csrf_field() }}
                                                                                        {{ method_field('PUT') }}
                                                                                        <div class="form-group">
                                                                                            <label for="date_faits">Copie</label>
                                                                                                <input type="text" class="form-control input-height"
                                                                                                    name="copie" placeholder="Veuillez entrer ou sélectionner une copie." list="copies" value="{{ $doc->copie }}" required>
                                                                                                    <datalist id="copies">
                                                                                                        <option value="de l'acte de naissance">de l'acte de naissance</option>
                                                                                                        <option value="de la pièce d'identité">de la pièce d'identité</option>
                                                                                                        <option value="du passeport">du passeport</option>
                                                                                                        <option value="du jugement suppletif">du jugement suppletif</option>
                                                                                                    </datalist>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="num_copie">Numéro</label>
                                                                                            <input type="text"
                                                                                                class="form-control" name="num_copie" id="num_copie" value="{{ $doc->num_copie }}">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="num_copie">Date</label>
                                                                                            <input type="date"
                                                                                                class="form-control" name="date_copie" id="date_copie" value="{{ $doc->date_copie->format('Y-m-d') }}"  required>
                                                                                        </div>
                                                                                        <div class="modal-footer d-flex justify-content-center">
                                                                                            <button type="submit" class="btn btn-primary">Valider<i class="fa fa-check"> </i></button>
                                                                                            <button class="btn btn-danger" data-dismiss="modal">Annuler <i class="fa fa-times"></i></button>
                                                                                        </div>
                                                                                    </form>
                                                                            </div>
                                                                        <!-- end modal body -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <!-- fin modal -->
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <br><br>
                                <div id="imprime" class="row">
                                    {{-- utiliser pour l'impression (rendu css) --}}
                                    <style>
                                        @media print{
                                            /* @page {size: landscape} */
                                            .font-bold {
                                                font-weight: bold;
                                            }

                                            .rouge{
                                                color: rgb(255, 0, 0) !important;
                                                font-style: italic !important;
                                            }
                                            .jaune{
                                                color: yellow !important;
                                                font-style: italic !important;
                                            }
                                            .vert{
                                                color: rgb(6, 168, 6) !important;
                                                font-style: italic !important;
                                            }
                                            #bordure_table{
                                                border: 2px solid black !important;
                                                font-size: 20px;
                                            }
                                            #bordure_tables{
                                                width: 50px;
                                                border: 2px solid black !important;
                                                font-size: medium;
                                                word-break: normal;
                                            }
                                            .cercle{
                                                        border: 5px solid;
                                                        border-radius: 20px;
                                                        padding: 0px;
                                                        margin-right: -33px;
                                                    }
                                            .align-top{
                                                        text-align: center;
                                                        margin-top: -68px;
                                                    }
                                            #harounaya{
                                                font-weight: bolder;
                                            }
                                            #paragraphe
                                            {
                                                font-size: medium;
                                            }
                                        }
                                    </style>
                                    <div id="invisible-screens" class="col-md-12">
                                        <div class="white-box">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="col-md-12">
                                                        <div class="pull-left">
                                                            <address>
                                                                <h4 class="font-bold addr-font-h4">
                                                                    COUR D'APPEL DE <br> &emsp; CONAKRY
                                                                    <br> <b class="text-center">&emsp; ---------------- </b> <br>
                                                                    &emsp; TRIBUNAL DE <br>
                                                                    PREMIERE INSTANCE <br>
                                                                    &emsp; DE DIXINN <br>
                                                                    <b class="text-center">&emsp; ---------------- </b> <br>
                                                                    @if($certificat->fonction == 'President')
                                                                        &emsp;CABINET DU <br>
                                                                        &emsp;PRESIDENT <br>
                                                                        @if($certificat->type == 'Interim')
                                                                            &emsp;PAR INTERIM <br>
                                                                        @endif
                                                                    @elseif($certificat->fonction == 'Presidente')
                                                                        &emsp;CABINET DE LA <br>
                                                                        &emsp;PRESIDENTE  <br>
                                                                        @if($certificat->type == 'Interim')
                                                                            &emsp;PAR INTERIM <br>
                                                                        @endif
                                                                    @elseif($certificat->fonction == 'JUGE' and $certificat->sexe == 'M')
                                                                        &emsp;CABINET DU<br>
                                                                        &emsp;JUGE-PRESIDENT <br>
                                                                        @if($certificat->type == 'Interim')
                                                                            &emsp;PAR INTERIM <br>
                                                                        @endif
                                                                    @elseif($certificat->fonction == 'JUGE' and $certificat->sexe == 'F')
                                                                        &emsp;CABINET DE LA<br>
                                                                        &emsp;JUGE-PRESIDENTE <br>
                                                                        @if($certificat->type == 'Interim')
                                                                            &emsp;PAR INTERIM <br>
                                                                        @endif
                                                                    @elseif($certificat->fonction == 'President de section' and $certificat->sexe == 'M')
                                                                        CABINET DE M.LE <br>
                                                                        PRESIDENT DE <br>
                                                                        SECTION <br>
                                                                        @if($certificat->type == 'Interim')
                                                                            &emsp;PAR INTERIM <br>
                                                                        @endif
                                                                    @elseif($certificat->fonction == 'Presidente de section' and $certificat->sexe == 'F')
                                                                        CABINET DE Mme .LA <br>
                                                                        PRESIDENTE DE <br>
                                                                        SECTION <br>
                                                                        @if($certificat->type == 'Interim')
                                                                            &emsp;PAR INTERIM <br>
                                                                        @endif
                                                                    @elseif($certificat->fonction == 'President de section civile' and $certificat->sexe == 'M')
                                                                        CABINET DE M.LE <br>
                                                                        PRESIDENT DE LA <br>
                                                                        PREMIERE SECTION <br>
                                                                        &emsp; CIVILE ET <br>
                                                                        ADMINISTRATIVE <br>
                                                                        @if($certificat->type == 'Interim')
                                                                            &emsp;PAR INTERIM <br>
                                                                        @endif
                                                                    @elseif($certificat->fonction == 'Presidente de section civile' and $certificat->sexe == 'F')
                                                                        CABINET DE Mme.LA <br>
                                                                        PRESIDENTE DE LA <br>
                                                                        PREMIERE SECTION <br>
                                                                        &emsp; CIVILE ET <br>
                                                                        ADMINISTRATIVE <br>
                                                                        @if($certificat->type == 'Interim')
                                                                            &emsp;PAR INTERIM <br>
                                                                        @endif
                                                                    @elseif($certificat->fonction == 'President de section correctionnelle' and $certificat->sexe == 'M')
                                                                        CABINET DE M.LE <br>
                                                                        PRESIDENT DE LA <br>
                                                                        PREMIERE SECTION <br>
                                                                        &emsp; CORRECTIONNELLE <br>
                                                                        @if($certificat->type == 'Interim')
                                                                            &emsp;PAR INTERIM <br>
                                                                        @endif
                                                                    @elseif($certificat->fonction == 'Presidente de section correctionnelle' and $certificat->sexe == 'F')
                                                                        CABINET DE Mme.LA <br>
                                                                        PRESIDENTE DE LA <br>
                                                                        PREMIERE SECTION <br>
                                                                        &emsp; CORRECTIONNELLE <br>
                                                                        @if($certificat->type == 'Interim')
                                                                            &emsp;PAR INTERIM <br>
                                                                        @endif
                                                                    @else

                                                                    @endif
                                                                    <b class="text-center">&emsp; ---------------- </b> <br><br>
                                                                    &emsp; N° {{ $certificat->num }} / 2024
                                                                </h4>

                                                            </address>
                                                        </div>
                                                        <div class="center">
                                                            <p id="republique">
                                                                REPUBLIQUE DE GUINEE
                                                            </p>
                                                            <p><u class="rouges">TRAVAIL</u>-<u class="jaunes">JUSTICE</u>-<u class="verts">SOLIDARITE</u></p>
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div id="introduction">
                                                        <p class="text-center" id="certificat">CERTIFICAT DE NATIONALITE</p>
                                                        <br>
                                                        <p id="p1">
                                                            @if($certificat->fonction == 'President' and $certificat->type == 'Officiel')
                                                                Le Président @if($certificat->type == 'Interim') par intérim @endif du Tribunal de Première Instance de Dixinn,Conakry;
                                                            @elseif($certificat->fonction == 'Presidente')
                                                                La Présidente @if($certificat->type == 'Interim') par intérim @endif du Tribunal de Première Instance de Dixinn,Conakry;
                                                            @elseif($certificat->fonction == 'JUGE' and $certificat->sexe == 'M')
                                                                Le Juge Président @if($certificat->type == 'Interim') par intérim @endif de la Section Civile et Administrative au
                                                                Tribunal de Première Instance de Dixinn,Conakry;
                                                            @elseif($certificat->fonction == 'JUGE' and $certificat->sexe == 'F')
                                                                La Juge Présidente @if($certificat->type == 'Interim') par intérim @endif de la Section Civile et Administrative au
                                                                Tribunal de Première Instance de Dixinn,Conakry;
                                                            @elseif($certificat->fonction == 'President de section' and $certificat->sexe == 'M')
                                                                Le Président de Section @if($certificat->type == 'Interim') par intérim @endif au
                                                                Tribunal de Première Instance de Dixinn,Conakry;
                                                            @elseif($certificat->fonction == 'Presidente de section' and $certificat->sexe == 'F')
                                                                La Présidente de Section @if($certificat->type == 'Interim') par intérim @endif au
                                                                Tribunal de Première Instance de Dixinn,Conakry;
                                                            @else

                                                            @endif
                                                        </p>
                                                        <br>
                                                        <p @if($certificat->docCertificats->count() >= 6) id="content" @else id="content_2" @endif>
                                                            @php
                                                                $n = 2;
                                                            @endphp
                                                             Certifie au vu des pièces suivantes: <br>
                                                            1-) Une demande manuscrite en date du {{ $certificat->date_demande->format('d/m/Y') }};<br>
                                                            @if($certificat->docCertificats->count() > 0)
                                                                @foreach ($certificat->docCertificats as $doc)
                                                                    {{ $n++ }}-) Une photocopie {{ $doc->copie }} n° {{ $doc->num_copie }} en date du {{ $doc->date_copie->format('d/m/Y') }}; <br>
                                                                @endforeach
                                                            @else
                                                                 2-) Une photocopie {{ $certificat->copie }} n°{{ $certificat->num_copie }} en date du {{ $certificat->date_copie->format('d/m/Y'); }} <br>
                                                            @endif
                                                            <br>
                                                            Que: <b>{{ $certificat->prenom_nom }}</b><br>
                                                            Né(e) le: <b>{{ $certificat->date_naiss->format('d/m/Y') }}</b><br>
                                                            A: <b>{{ $certificat->lieu }} </b><br>
                                                            De: <b>{{ $certificat->pere }}</b><br>
                                                            Et de: <b>{{ $certificat->mere }} </b><br>
                                                            Domicilié(e) au quartier : <b>{{ $certificat->domicile }};</b><br>
                                                            <b> Est guinéen(e) </b> en vertu des articles <b> {{ $certificat->article }},178,179</b> du code Civil Guinéen.
                                                        </p>
                                                        <div class="pull-left">
                                                            <br><br><br>
                                                            @if($certificat->created_at->format('Y') == '2023')
                                                                <img src="/qrcodes/2023/nationnalite/{{ $certificat->num.'.png' }}" width="150px" height="150px" alt="">
                                                            @else
                                                                <img src="/qrcodes/{{ $certificat->id.'.png' }}" width="150px" height="150px" alt="">
                                                            @endif
                                                        </div>
                                                        <div id="signatures" class="pull-right">
                                                            Fait à Conakry, le {{ $certificat->created_at->format('d/m/Y') }}<br><br>
                                                            &emsp; &emsp;
                                                            @if($certificat->fonction == 'President')
                                                                LE PRESIDENT @if($certificat->type == 'Interim') PAR INTERIM @endif
                                                            @elseif($certificat->fonction == 'Presidente')
                                                                LA PRESIDENTE  @if($certificat->type == 'Interim') PAR INTERIM @endif
                                                            @elseif($certificat->fonction == 'JUGE' and $certificat->sexe == 'M')
                                                                LE JUGE PRESIDENT @if($certificat->type == 'Interim') PAR INTERIM @endif
                                                            @elseif($certificat->fonction == 'JUGE' and $certificat->sexe == 'F')
                                                                LA JUGE PRESIDENTE @if($certificat->type == 'Interim') PAR INTERIM @endif
                                                            @elseif($certificat->fonction == 'President de section' and $certificat->status == 'Officiel')
                                                                LE PRESIDENT @if($certificat->type == 'Interim') PAR INTERIM @endif
                                                            @elseif($certificat->fonction == 'President de section' and $certificat->status == 'Interim')
                                                                LE PRESIDENT @if($certificat->type == 'Interim') PAR INTERIM @endif
                                                            @else

                                                            @endif
                                                            <br><br><br><br><br>
                                                            @if($certificat->sexe == 'F')
                                                            &emsp; &emsp; Mme. {{ $certificat->signateur }}
                                                            @else
                                                            &emsp; &emsp; M. {{ $certificat->signateur }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>
@endsection
<script>
    function deleteData(id)
         {
             var id = id;
             var url = '{{ route("certificat_nationalite.destroy", ":id") }}';
             url = url.replace(':id', id);
             $("#deleteform").attr('action', url);
         }
    function formSubmit()
    {
        // alert("bonjour");
        $("#deleteform").submit();
    }
    function deleteCopy(id)
         {
             var id = id;
             var url = '{{ route("doc_certificat.destroy", ":id") }}';
             url = url.replace(':id', id);
             $("#deletecopie").attr('action', url);
         }
    function formSubmitCopy()
    {
        // alert("bonjour");
        $("#deletecopie").submit();
    }
</script>
