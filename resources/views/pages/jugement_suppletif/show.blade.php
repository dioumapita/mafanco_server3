@extends('layouts.themes._light_theme')
@section('content')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Détail d'un jugement suppletif</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="{{ route('home') }}">Accueil</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li><a class="parent-item" href="#">jugement</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Détail d'un jugement suppletif</li>
        </ol>
    </div>
</div>
<a href="{{ route('jugement_suppletif.index') }}" class="btn btn-info"><i class="fa fa-reply"></i> Retour</a>
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
                        <b>N°: {{ $jugement->num }} </b>
                    </li>
                    <li class="list-group-item">
                        <b>Que:  {{ $jugement->concerne }}</b>
                    </li>
                    <li class="list-group-item">
                        <b>Né(e): {{ $jugement->date_naiss->format('d/m/Y') }}</b>
                    </li>
                    <li class="list-group-item">
                        <b>A: {{ $jugement->lieu_naiss }} </b>
                    </li>
                </ul>
            </div>
        </div>
    </div><br>
<!-- END BEGIN PROFILE SIDEBAR -->

        <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div>
                    <div class="card">
                        <div class="card-head card-topline-aqua">
                            <header>Détail du jugement suppletif de {{ $jugement->concerne }}</header>
                        </div>
                        <div class="white-box">
                            <a id="media_screen"  href="#" onclick="printDiv('imprime')" class="btn btn-primary btn-lg"><i class="fa fa-print"></i> Imprimer le jugement</a>
                            <a href="#myModaldelete" data-toggle="modal" onclick="deleteData({{ $jugement->id }})"
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
                                            <form action="{{ route('jugement_suppletif.destroy',$jugement->id) }}" method="post" id="deleteform">
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
                                <br>
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
                                            #bordure_table_c
                                            {
                                                line-height: normal !important;
                                                border: 2px solid black !important;
                                                font-size:medium !important;
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
                                                                    Cour d'appel de Conakry <br>
                                                                    Tribunal de Première Instance de Dixinn
                                                                    <br><br>
                                                                    Jugement N°
                                                                    @if($jugement->status == 0)
                                                                      {{ $jugement->num }}
                                                                    @else
                                                                      {{ $jugement->num_anti }}
                                                                    @endif
                                                                     du {{ $jugement->date_audience->isoFormat('DD').'/'.$jugement->date_audience->isoFormat('MM').'/'.$jugement->date_audience->format('Y') }}
                                                                </h4>
                                                            </address>
                                                        </div>
                                                        <div class="pull-right text-right">
                                                            <address>
                                                                <h4 class="font-bold addr-font-h4">
                                                                    <u class="souligner">REPUBLIQUE DE GUINEE</u>&emsp;&ensp;
                                                                 <br>
                                                                   <p>
                                                                        <u class="rouges">TRAVAIL</u>-<u class="jaunes">JUSTICE</u>-<u class="verts">SOLIDARITE</u>
                                                                        &emsp;&ensp;&emsp;
                                                                    </p>
                                                                </h4>
                                                            </address>
                                                        </div>
                                                        <div class="center">
                                                            @if($jugement->type == 'expedition')
                                                                <img src="/qrcodes/jugement_suppletif/{{ $jugement->id.'.png' }}" width="100px" height="100px" alt="">
                                                                <img src="/images/icon_svg/balance.jpg" width="100px" height="100px" alt="" srcset="">
                                                            @else
                                                                <img src="/images/icon_svg/balance.jpg" width="100px" height="100px" alt="" srcset="">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row col-md-12 col-sm-12 col-lg-12">
                                                        <div class="mx-auto col-md-12 col-sm-12 col-lg-12">
                                                            <div class="contoure">
                                                                <div class="text-center">
                                                                    <h4 class="text-center font-bold addr-font-h4">
                                                                        JUGEMENT SUPPLETIF TENANT LIEU D'ACTE DE NAISSANCE
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p id="style_js">
                                                            <br>
                                                            <b>Concernant:</b> {{ $jugement->concerne }}
                                                            @if($jugement->sexe == 'Masculin')
                                                                né
                                                            @else
                                                                née
                                                            @endif
                                                            le {{ $jugement->date_naiss->isoFormat('DD MMMM Y') }} à {{ $jugement->lieu_naiss }}. <br>
                                                            Le Tribunal de Première Instance de Dixinn, statuant en chambre de conseil, en matière civile, sur
                                                            requête et en premier ressort, en son audience du
                                                            @if($jugement->date_audience->isoFormat('DD') == '01')
                                                                premier
                                                            @else
                                                             {{ $convertisseur->format($jugement->date_audience->isoFormat('DD')) }}
                                                            @endif
                                                              {{ $jugement->date_audience->isoFormat('MMMM') }} {{ $convertisseur->format($jugement->date_audience->format('Y')) }}, à laquelle siégeait
                                                            @if($jugement->fonction_president == 'President')
                                                                <b>{{ $jugement->president }} Président @if($jugement->type_president == 'Interim') par intérim @endif du Tribunal de Première Instance de Dixinn,Conakry, </b>
                                                            @elseif($jugement->fonction_president == 'Presidente')
                                                                <b>{{ $jugement->president }} Présidente @if($jugement->type_president == 'Interim') par intérim @endif du Tribunal de Première Instance de Dixinn,Conakry, </b>
                                                            @elseif($jugement->fonction_president == 'JUGE' and $info_president->sexe == 'M')
                                                                <b>{{ $jugement->president }} Juge Président  @if($jugement->type_president == 'Interim') par intérim @endif de la Section Civile et Administrative au Tribunal de Première Instance de Dixinn,Conakry, </b>
                                                            @elseif($jugement->fonction_president == 'JUGE' and $info_president->sexe == 'F')
                                                                <b>{{ $jugement->president }} Juge Présidente  @if($jugement->type_president == 'Interim') par intérim @endif de la Section Civile et Administrative au Tribunal de Première Instance de Dixinn,Conakry, </b>
                                                            @elseif($jugement->fonction_president == 'President de section' and $info_president->sexe == 'M')
                                                                <b>{{ $jugement->president }}  Président de Section @if($jugement->type_president == 'Interim') par intérim @endif au Tribunal de Première Instance de Dixinn,Conakry, </b>
                                                            @elseif($jugement->fonction_president == 'President de section' and $info_president->sexe == 'F')
                                                                <b>{{ $jugement->president }}  Présidente de Section @if($jugement->type_president == 'Interim') par intérim @endif au Tribunal de Première Instance de Dixinn,Conakry, </b>
                                                            @elseif($jugement->fonction_president == 'President de section civile' and $info_president->sexe == 'M')
                                                                <b>{{ $jugement->president }}  President de section civile @if($jugement->type_president == 'Interim') par intérim @endif au Tribunal de Première Instance de Dixinn,Conakry, </b>
                                                            @elseif($jugement->fonction_president == 'Presidente de section civile' and $info_president->sexe == 'F')
                                                                <b>{{ $jugement->president }} Presidente de section civile @if($jugement->type_president == 'Interim') par intérim @endif au Tribunal de Première Instance de Dixinn,Conakry, </b>
                                                            @elseif($jugement->fonction_president == 'President de section correctionnelle' and $info_president->sexe == 'M')
                                                                <b>{{ $jugement->president }} President de section correctionnelle @if($jugement->type_president == 'Interim') par intérim @endif au Tribunal de Première Instance de Dixinn,Conakry, </b>
                                                            @elseif($jugement->fonction_president == 'Presidente de section correctionnelle' and $info_president->sexe == 'F')
                                                                <b>{{ $jugement->president }} Presidente de section correctionnelle @if($jugement->type_president == 'Interim') par intérim @endif au Tribunal de Première Instance de Dixinn,Conakry, </b>
                                                            @else

                                                            @endif
                                                            avec l'assistance
                                                            @if($jugement->fonction_greffe == 'Chef du Greffe' and $info_greffier->sexe == 'M')
                                                                <b>de {{ $jugement->greffier }}, Chef du Greffe, @if($jugement->type_greffe == 'Interim') par intérim @endif</b>
                                                            @elseif($jugement->fonction_greffe == 'Chef du Greffe' and $info_greffier->sexe == 'F')
                                                                <b>de {{ $jugement->greffier }}, Cheffe du Greffe, @if($jugement->type_greffe == 'Interim') par intérim @endif</b>
                                                            @elseif($jugement->fonction_greffe== 'Greffier' and $info_greffier->sexe == 'M')
                                                                <b>de {{ $jugement->greffier }}, greffier, @if($jugement->type_greffe == 'Interim') par intérim @endif</b>
                                                            @elseif($jugement->fonction_greffe == 'Greffier' and $info_greffier->sexe == 'F')
                                                                <b>de {{ $jugement->greffier }}, greffière, @if($jugement->type_greffe == 'Interim') par intérim @endif</b>
                                                            @else

                                                            @endif
                                                            en présence de <b>{{ $jugement->en_presence }}</b>, a rendu le jugement dont la teneur
                                                            suit:
                                                            <p id="tribunal">Tribunal</p>
                                                            <p id="style_js_1">
                                                                Vu les pièces du dossier; <br>
                                                                Vu la requête en date du {{ $jugement->date_requete->isoFormat('DD MMMM Y') }} enregistrée sous le numéro {{ $jugement->num_requette }} présentée par {{ $jugement->requerant }}
                                                                @if($jugement->profession_requerant != null)
                                                                    , {{ $jugement->profession_requerant }}
                                                                @endif
                                                                @if($jugement->quartier_requerant != null)
                                                                    ,
                                                                    @if($jugement->sexe_requerant =='Masculin')
                                                                        domicilié
                                                                    @else
                                                                        domiciliée
                                                                    @endif
                                                                      à {{ $jugement->quartier_requerant }};
                                                                @endif

                                                                <br>
                                                                Entendu
                                                                @if($jugement->sexe_requerant =='Masculin')
                                                                    le requérant
                                                                @else
                                                                    la requérante
                                                                @endif
                                                                en sa demande; <br>
                                                                Entendu les témoins en leurs dépositions et le Ministère Public en ses observations;<br>
                                                                Après en avoir délibéré; <br>
                                                                Attendu que
                                                                @if($jugement->sexe_requerant =='Masculin')
                                                                    le requérant
                                                                @else
                                                                    la requérante
                                                                @endif
                                                                demande au tribunal de rendre un jugement supplétif
                                                                @if(preg_match("#$jugement->concerne#isU",$jugement->requerant))
                                                                    pour lui tenir lieu  d'acte  de naissance;
                                                                @else
                                                                     pour tenir lieu  d'acte  de naissance  à {{ $jugement->concerne }};
                                                                @endif
                                                                <br>
                                                                Attendu qu'il ressort de l'examen des pièces versées au dossier et de l'enquête à laquelle il a été procédé notamment <br>
                                                                l'audition des deux témoins majeurs: <br>
                                                                &nbsp;&nbsp; <b>1-</b>
                                                                <div id="temoins">
                                                                    {{ $jugement->premier_temoin }}
                                                                    @if($jugement->date_naiss_premier_temoin != null)
                                                                        @if($jugement->sexe_premier_temoin == 'Masculin')
                                                                            né
                                                                        @else
                                                                            née
                                                                        @endif
                                                                        le {{ $jugement->date_naiss_premier_temoin->isoFormat('DD MMMM Y') }}
                                                                    @endif
                                                                    @if($jugement->lieu_naiss_premier_temoin != null)
                                                                        à {{ $jugement->lieu_naiss_premier_temoin }}
                                                                    @endif
                                                                    @if($jugement->profession_premier_temoin != null)
                                                                        , {{ $jugement->profession_premier_temoin }}
                                                                    @endif
                                                                    @if($jugement->domicile_premier_temoin != null)
                                                                        ,
                                                                        @if($jugement->sexe_premier_temoin == 'Masculin')
                                                                            domicilié
                                                                        @else
                                                                            domiciliée
                                                                        @endif
                                                                          à {{$jugement->domicile_premier_temoin  }}
                                                                    @else

                                                                    @endif
                                                                        ;
                                                                </div>
                                                                &nbsp;&nbsp; <b>2-</b>
                                                                <div id="temoins2">
                                                                    @if($jugement->deuxieme_temoin != null)
                                                                        {{ $jugement->deuxieme_temoin }}
                                                                    @endif
                                                                    @if($jugement->date_naiss_deuxieme_temoin != null)
                                                                        ,
                                                                        @if($jugement->sexe_deuxieme_temoin == 'Masculin')
                                                                            né
                                                                        @else
                                                                            née
                                                                        @endif
                                                                        le {{ $jugement->date_naiss_deuxieme_temoin->isoFormat('DD MMMM Y') }}
                                                                    @endif
                                                                    @if($jugement->lieu_naiss_deuxieme_temoin != null)
                                                                         à {{ $jugement->lieu_naiss_deuxieme_temoin }}
                                                                    @endif
                                                                    @if($jugement->profession_deuxieme_temoin != null)
                                                                        , {{ $jugement->profession_deuxieme_temoin }}
                                                                    @endif
                                                                    @if($jugement->domicile_deuxieme_temoin != null)
                                                                        ,
                                                                        @if($jugement->sexe_deuxieme_temoin == 'Masculin')
                                                                            domicilié
                                                                        @else
                                                                            domiciliée
                                                                        @endif
                                                                          à {{ $jugement->domicile_deuxieme_temoin }}
                                                                    @else

                                                                    @endif
                                                                    ;
                                                                </div>
                                                                <p id="style_js">
                                                                    Il résulte que {{ $jugement->concerne }} est effectivement
                                                                    @if($jugement->sexe == 'Masculin')
                                                                     né
                                                                    @else
                                                                     née
                                                                    @endif
                                                                      le {{ $jugement->date_naiss->isoFormat('DD MMMM Y') }} à {{ $jugement->lieu_naiss }};
                                                                    <br>
                                                                    Qu'en conséquence, il convient de constater le bien fondé de la demande et y faire droit.
                                                                </p>
                                                            </p>
                                                            <p id="motif">PAR CES MOTIFS</p>
                                                            <p id="style_js_2">
                                                                Statuant en chambre de conseil , en matière civile, sur requête et en premier ressort; <br>
                                                                Après en avoir délibéré; <br>
                                                                Juge et dit que: {{ $jugement->concerne }} est
                                                                @if($jugement->sexe == 'Masculin')
                                                                     né
                                                                @else
                                                                     née
                                                                @endif
                                                                 le {{ $jugement->date_naiss->isoFormat('DD MMMM Y') }} à {{ $jugement->lieu_naiss }}
                                                                de: <br>
                                                                <b>Père:</b>
                                                                 {{ $jugement->pere }}
                                                                    @if($jugement->date_naiss_pere != '')
                                                                        ,né le {{ $jugement->date_naiss_pere->isoFormat('DD MMMM Y') }}
                                                                    @endif
                                                                    @if($jugement->lieu_naiss_pere != '')
                                                                         à {{ $jugement->lieu_naiss_pere }}
                                                                    @endif
                                                                    @if($jugement->profession_pere != '')
                                                                        ,{{ $jugement->profession_pere }}
                                                                    @endif
                                                                    @if($jugement->domicile_pere != '')
                                                                        ,domicilié(e) à {{ $jugement->domicile_pere }}
                                                                    @else

                                                                    @endif
                                                                        ;
                                                                    <br>
                                                                <b>Mère:</b>
                                                                {{ $jugement->mere }}
                                                                    @if($jugement->date_naiss_mere != '')
                                                                        , née le {{ $jugement->date_naiss_mere->isoFormat('DD MMMM Y') }}
                                                                    @endif
                                                                    @if($jugement->lieu_naiss_mere != '')
                                                                        à {{ $jugement->lieu_naiss_mere }}
                                                                    @endif
                                                                    @if($jugement->profession_mere != '')
                                                                        , {{ $jugement->profession_mere }}
                                                                    @endif
                                                                    @if($jugement->domicile_mere != '')
                                                                        , domicilié(e) à {{ $jugement->domicile_mere }}
                                                                    @else

                                                                    @endif
                                                                        ;
                                                                    <br>
                                                                    @if($jugement->rang_naiss != null)
                                                                        <b>Rang de naissance:</b>
                                                                            @if($jugement->rang_naiss == '1')
                                                                                {{ $jugement->rang_naiss.'er geste ;' }}
                                                                            @else
                                                                                {{ $jugement->rang_naiss.'ème geste ;' }}
                                                                            @endif
                                                                    @else

                                                                    @endif
                                                                  <br>
                                                                Dit que ce jugement lui tiendra lieu d'acte de naissance et sera transcrit en marge des registres de l'état civil de la commune de {{ $jugement->etat_civil }},
                                                                @if($jugement->lieu_transcrit =='d\'acte de naissance')
                                                                     lieu de naissance
                                                                @else
                                                                    lieu de résidence
                                                                @endif
                                                                , pour l'année en cours. <br>
                                                                Dépens à la charge
                                                                @if($jugement->sexe_requerant =='Masculin')
                                                                    du Requérant;
                                                                @else
                                                                    de la Requérante;
                                                                @endif
                                                                <br>
                                                                Le tout en application des dispositions des articles 184 ,201 et 204 du code civil et 54,63,94,99,740 du code de
                                                                procédure civile, économique et administrative. <br>
                                                                Ainsi fait jugé et prononcé en chambre de conseil par le Tribunal de ce siège le jour, mois et an que dessus. <br>
                                                                <div class="text-center">
                                                                    @if($jugement->type == 'expedition')
                                                                        <p id="on_signer">
                                                                            <b>
                                                                                {{-- Et ont signé --}}
                                                                                {{-- @if($jugement->fonction_president == 'President')
                                                                                    <b> le Président @if($jugement->type_president == 'Interim') par intérim @endif  </b>
                                                                                @elseif($jugement->fonction_president == 'Presidente')
                                                                                    <b> la Présidente @if($jugement->type_president == 'Interim') par intérim @endif </b>
                                                                                @elseif($jugement->fonction_president == 'JUGE' and $info_president->sexe == 'M')
                                                                                    <b>le Juge Président  @if($jugement->type_president == 'Interim') par intérim @endif </b>
                                                                                @elseif($jugement->fonction_president == 'JUGE' and $info_president->sexe == 'F')
                                                                                    <b> la Juge Présidente  @if($jugement->type_president == 'Interim') par intérim @endif </b>
                                                                                @elseif($jugement->fonction_president == 'President de section' and $info_president->sexe == 'M')
                                                                                    <b> le Président de Section @if($jugement->type_president == 'Interim') par intérim @endif </b>
                                                                                @elseif($jugement->fonction_president == 'President de section' and $info_president->sexe == 'F')
                                                                                    <b> la Présidente de Section @if($jugement->type_president == 'Interim') par intérim @endif </b>
                                                                                @elseif($jugement->fonction_president == 'President de section civile' and $info_president->sexe == 'M')
                                                                                    <b> le President de section civile @if($jugement->type_president == 'Interim') par intérim @endif  </b>
                                                                                @elseif($jugement->fonction_president == 'Presidente de section civile' and $info_president->sexe == 'F')
                                                                                    <b>la Presidente de section civile @if($jugement->type_president == 'Interim') par intérim @endif </b>
                                                                                @elseif($jugement->fonction_president == 'President de section correctionnelle' and $info_president->sexe == 'M')
                                                                                    <b> le President de section correctionnelle @if($jugement->type_president == 'Interim') par intérim @endif  </b>
                                                                                @elseif($jugement->fonction_president == 'Presidente de section correctionnelle' and $info_president->sexe == 'F')
                                                                                    <b> la Presidente de section correctionnelle @if($jugement->type_president == 'Interim') par intérim @endif </b>
                                                                                @else

                                                                                @endif
                                                                                et
                                                                                @if($jugement->fonction_greffe == 'Chef du Greffe' and $info_greffier->sexe == 'M')
                                                                                    le chef du Greffe @if($jugement->type_greffe == 'Interim') par intérim @endif
                                                                                @elseif($jugement->fonction_greffe == 'Chef du Greffe' and $info_greffier->sexe == 'F')
                                                                                    la cheffe du Greffe @if($jugement->type_greffe == 'Interim') par intérim @endif
                                                                                @elseif($jugement->fonction_greffe == 'Greffier' and $info_greffier->sexe == 'M')
                                                                                    le Greffier @if($jugement->type_greffe == 'Interim') par intérim @endif
                                                                                @elseif($jugement->fonction_greffe == 'Greffier' and $info_greffier->sexe == 'F')
                                                                                    la Greffière @if($jugement->type_greffe == 'Interim') par intérim @endif
                                                                                @else

                                                                                @endif --}}
                                                                                <br> Suivent les signatures <br> Pour copie certifiée conforme. <br>
                                                                                Conakry, le {{ date('d/m/Y') }} <br>
                                                                                Le chef du Greffe <br><br><br><br><br><br>
                                                                                @if($jugement->fonction_greffe == 'Chef du Greffe' and $info_greffier->sexe == 'M')
                                                                                    le chef du Greffe @if($jugement->type_greffe == 'Interim') par intérim @endif {{ $jugement->greffier }}
                                                                                @elseif($jugement->fonction_greffe == 'Chef du Greffe' and $info_greffier->sexe == 'F')
                                                                                    la cheffe du Greffe @if($jugement->type_greffe == 'Interim') par intérim @endif {{ $jugement->greffier }}
                                                                                @elseif($jugement->fonction_greffe == 'Greffier' and $info_greffier->sexe == 'M')
                                                                                    le Greffier @if($jugement->type_greffe == 'Interim') par intérim @endif {{ $jugement->greffier }}
                                                                                @elseif($jugement->fonction_greffe == 'Greffier' and $info_greffier->sexe == 'F')
                                                                                    la Greffière @if($jugement->type_greffe == 'Interim') par intérim @endif {{ $jugement->greffier }}
                                                                                @else

                                                                                @endif

                                                                            </>
                                                                        </p>
                                                                    @else
                                                                        <p id="on_signer">
                                                                            <b>
                                                                                Et ont signé
                                                                                @if($jugement->fonction_president == 'President')
                                                                                    <b> le Président @if($jugement->type_president == 'Interim') par intérim @endif  </b>
                                                                                @elseif($jugement->fonction_president == 'Presidente')
                                                                                    <b> la Présidente @if($jugement->type_president == 'Interim') par intérim @endif </b>
                                                                                @elseif($jugement->fonction_president == 'JUGE' and $info_president->sexe == 'M')
                                                                                    <b> le Juge Président  @if($jugement->type_president == 'Interim') par intérim @endif </b>
                                                                                @elseif($jugement->fonction_president == 'JUGE' and $info_president->sexe == 'F')
                                                                                    <b>la Juge Présidente  @if($jugement->type_president == 'Interim') par intérim @endif </b>
                                                                                @elseif($jugement->fonction_president == 'President de section' and $info_president->sexe == 'M')
                                                                                    <b>le Président de Section @if($jugement->type_president == 'Interim') par intérim @endif </b>
                                                                                @elseif($jugement->fonction_president == 'President de section' and $info_president->sexe == 'F')
                                                                                    <b>la Présidente de Section @if($jugement->type_president == 'Interim') par intérim @endif </b>
                                                                                @elseif($jugement->fonction_president == 'President de section civile' and $info_president->sexe == 'M')
                                                                                    <b>le President de section civile @if($jugement->type_president == 'Interim') par intérim @endif  </b>
                                                                                @elseif($jugement->fonction_president == 'Presidente de section civile' and $info_president->sexe == 'F')
                                                                                    <b> la Presidente de section civile @if($jugement->type_president == 'Interim') par intérim @endif </b>
                                                                                @elseif($jugement->fonction_president == 'President de section correctionnelle' and $info_president->sexe == 'M')
                                                                                    <b> le President de section correctionnelle @if($jugement->type_president == 'Interim') par intérim @endif  </b>
                                                                                @elseif($jugement->fonction_president == 'Presidente de section correctionnelle' and $info_president->sexe == 'F')
                                                                                    <b> la Presidente de section correctionnelle @if($jugement->type_president == 'Interim') par intérim @endif </b>
                                                                                @else

                                                                                @endif
                                                                                et
                                                                                @if($jugement->fonction_greffe == 'Chef du Greffe' and $info_greffier->sexe == 'M')
                                                                                    le chef du Greffe @if($jugement->type_greffe == 'Interim') par intérim @endif {{ $jugement->greffier }}
                                                                                @elseif($jugement->fonction_greffe == 'Chef du Greffe' and $info_greffier->sexe == 'F')
                                                                                    la cheffe du Greffe @if($jugement->type_greffe == 'Interim') par intérim @endif {{ $jugement->greffier }}
                                                                                @elseif($jugement->fonction_greffe == 'Greffier' and $info_greffier->sexe == 'M')
                                                                                    le Greffier @if($jugement->type_greffe == 'Interim') par intérim @endif {{ $jugement->greffier }}
                                                                                @elseif($jugement->fonction_greffe == 'Greffier' and $info_greffier->sexe == 'F')
                                                                                    la Greffière @if($jugement->type_greffe == 'Interim') par intérim @endif {{ $jugement->greffier }}
                                                                                @else

                                                                                @endif

                                                                            </b>
                                                                        </p>
                                                                    @endif
                                                                </div>
                                                            </p>
                                                        </p>
                                                        @if($jugement->type == 'expedition')
                                                            {{-- <div class="pull-right">
                                                                <h4 class="font-bold addr-font-h4">
                                                                <br><br><br>
                                                                    {{ $jugement->greffier }}
                                                                </h4>
                                                            </div> --}}
                                                        @else
                                                            <div class="container">
                                                                <div class="pull-left">
                                                                    <h4 class="font-bold addr-font-h4">
                                                                        <br><br><br>
                                                                        &emsp;&emsp;&emsp; &nbsp; {{ $jugement->president }}
                                                                    </h4>
                                                                </div>
                                                                <div class="pull-right">
                                                                    <h4 class="font-bold addr-font-h4">
                                                                    <br><br><br>
                                                                        {{ $jugement->greffier }}
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                            <br><br>
                                                            <div class="center">
                                                                <img src="/qrcodes/jugement_suppletif/{{ $jugement->id.'.png' }}" width="100px" height="100px" alt="">
                                                            </div>
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
        <!-- END PROFILE CONTENT -->
    </div>
</div>
@endsection
<script>
    function deleteData(id)
         {
             var id = id;
             var url = '{{ route("jugement_suppletif.destroy", ":id") }}';
             url = url.replace(':id', id);
             $("#deleteform").attr('action', url);
         }
    function formSubmit()
    {
        // alert("bonjour");
        $("#deleteform").submit();
    }
</script>
