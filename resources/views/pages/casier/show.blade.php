@extends('layouts.themes._light_theme')
@section('content')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Détail d'un casier judiciaire</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="{{ route('home') }}">Accueil</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li><a class="parent-item" href="#">Casier</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Détail d'un casier judiciaire</li>
        </ol>
    </div>
</div>
<a href="{{ route('casier_judiciare.index') }}" class="btn btn-info"><i class="fa fa-reply"></i> Retour</a>
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
                        <b>N°:  </b>
                    </li>
                    <li class="list-group-item">
                        <b>Concerne:  {{ $casier->concerne }}</b>
                    </li>
                    <li class="list-group-item">
                        <b>Né(e): {{ $casier->date_naiss->format('d/m/Y') }}</b>
                    </li>
                    <li class="list-group-item">
                        <b>A: {{ $casier->lieu }} </b>
                    </li>
                    <form action="{{ route('renouvellement_casier') }}" method="post">
                        @csrf
                        <input type="hidden" name="concerne" value="{{ $casier->concerne }}">
                        <input type="hidden" name="pere" value="{{ $casier->pere }}">
                        <input type="hidden" name="mere" value="{{ $casier->mere }}">
                        <input type="hidden" name="date_naiss" value="{{ $casier->date_naiss }}">
                        <input type="hidden" name="lieu" value="{{ $casier->lieu }}">
                        <input type="hidden" name="domicile" value="{{ $casier->domicile }}">
                        <input type="hidden" name="etat_civil" value="{{ $casier->etat_civil }}">
                        <input type="hidden" name="profession" value="{{ $casier->profession }}">
                        <input type="hidden" name="nationalite" value="{{ $casier->nationalite }}">
                        <input type="hidden" name="copie" value="{{ $casier->copie }}">
                        <input type="hidden" name="num_copie" value="{{ $casier->num_copie }}">
                        <input type="hidden" name="date_copie" value="{{ $casier->date_copie }}">
                        <button type="submit" class="btn btn-primary btn-lg">Renouveler <i class="fa fa-recycle"></i></button>
                    </form>
                </ul>
            </div>
        </div>
    </div>
<!-- END BEGIN PROFILE SIDEBAR -->

        <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div>
                    <div class="card">
                        <div class="card-head card-topline-aqua">
                            <header>Détail du casier judiciaire de {{ $casier->concerne }}</header>
                        </div>
                        <div class="white-box">
                            <a id="media_screen"  href="#" onclick="printDiv('imprime')" class="btn btn-primary btn-lg"><i class="fa fa-print"></i> Imprimer le casier</a>
                            <a href="#myModaldelete" data-toggle="modal" onclick="deleteData({{ $casier->id }})"
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
                                                <form action="{{ route('casier_judiciare.destroy',$casier->id) }}" method="post" id="deleteform">
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
                                                font-size: small;
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
                                                font-size:small !important;
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
                                                                <img src="/images/icon_svg/balance2.jpg" width="100" height="100" alt="" srcset="">
                                                            </address>
                                                        </div>
                                                        <div class="pull-right text-right">
                                                            <address>
                                                                <img src="/images/icon_svg/balance2.jpg" width="100" height="100" alt="" srcset="">
                                                            </address>
                                                        </div>
                                                        <div class="center">
                                                            <p id="republique">
                                                                REPUBLIQUE DE GUINEE
                                                            </p>
                                                            <p><u class="rouges">TRAVAIL</u>-<u class="jaunes">JUSTICE</u>-<u class="verts">SOLIDARITE</u></p>
                                                        </div>
                                                    </div>
                                                    <hr id="ligne">
                                                    <div class="pull-left">
                                                        <address>
                                                            <h4 class="font-bold addr-font-h4">
                                                                COUR D'APPEL DE <br> &emsp; CONAKRY
                                                                <br> <b class="text-center">&emsp; ---------------- </b> <br>
                                                                &emsp; TRIBUNAL DE <br>
                                                                PREMIERE INSTANCE <br>
                                                                &emsp; DE MAFANCO <br>
                                                            </h4>
                                                        </address>
                                                    </div>
                                                    <p id="title_casier">
                                                            BULLETIN N° 3 <br>
                                                            (ARTICLE 1216 DU CODE DE PROCÉDURE PÉNALE) <br>
                                                            EXTRAIT DU CASIER JUDICIAIRE N° 
                                                    </p>
                                                    <div id="introduction">
                                                        Concernant la personne nommée: {{ $casier->concerne }} <br>
                                                         de {{ $casier->pere }} et De {{ $casier->mere }} <br>
                                                        Né(e) le: {{ $casier->date_naiss->format('d/m/Y') }}  <br>
                                                        à {{ $casier->lieu }} <br>
                                                        Domicile: {{ $casier->domicile }} <br>
                                                        Etat civil de famille: {{ $casier->etat_civil }} <br>
                                                        Profession:  {{ $casier->profession }}<br>
                                                        Nationalité: {{ $casier->nationalite }}
                                                    </div>
                                                </div>

                                                <table id="table_casier" class="table table-bordered">
                                                    <thead id="bordure_table">
                                                        <tr id="bordure_table">
                                                            <th  id="bordure_table_c"><div class="text-center">N°</div></th>
                                                            <th id="bordure_table_c"><div class="text-center">Date de <br> condamnation</div></th>
                                                            <th  id="bordure_table_c"><div class="text-center">Cours ou <br> tribunaux</div></th>
                                                            <th  id="bordure_table_c"><div class="text-center">Nature des <br> crimes ou <br> délits</div></th>
                                                            <th  id="bordure_table_c"><div class="text-center">Date des <br> crimes ou <br> délits</div></th>
                                                            <th  id="bordure_table_c"><div class="text-center">Nature et <br> durée des <br> crimes</div></th>
                                                            <th   id="bordure_table_c"><div class="text-center">Observations</div></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody  id="bordure_table">
                                                        <tr>
                                                            <td id="bordure_table2">1</td>
                                                            <td id="bordure_table2"></td>
                                                            <td id="bordure_table2"></td>
                                                            <td id="bordure_table2"></td>
                                                            <td id="bordure_table2"></td>
                                                            <td id="bordure_table2"><div id="neant">T</div></td>
                                                            <td  rowspan="5"  id="bordure_table2">
                                                                <div id="observation">
                                                                    Etabli suivant la copie <br>
                                                                    {{ $casier->copie }} <br>
                                                                    N° {{ $casier->num_copie }} <br>
                                                                    @if($casier->date_copie != null)
                                                                        en date du {{ $casier->date_copie->format('d/m/Y') }}
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td id="bordure_table2">1</td>
                                                            <td id="bordure_table2"></td>
                                                            <td id="bordure_table2"></td>
                                                            <td id="bordure_table2"></td>
                                                            <td id="bordure_table2"><div id="neant">N</div></td>
                                                            <td id="bordure_table2"></td>
                                                            {{-- <td  id="bordure_table2"></td> --}}
                                                        </tr>
                                                        <tr>
                                                            <td id="bordure_table2">2</td>
                                                            <td id="bordure_table2"></td>
                                                            <td id="bordure_table2"></td>
                                                            <td id="bordure_table2"><div id="neant">A</div></td>
                                                            <td id="bordure_table2"></td>
                                                            {{-- <td id="bordure_table2"></td> --}}
                                                        </tr>
                                                        <tr>
                                                            <td id="bordure_table2">3</td>
                                                            <td id="bordure_table2"></td>
                                                            <td id="bordure_table2"><div id="neant">E</div></td>
                                                            <td id="bordure_table2"></td>
                                                            <td id="bordure_table2"></td>
                                                            <td id="bordure_table2"></td>
                                                            {{-- <td id="bordure_table2"></td> --}}
                                                        </tr>
                                                        <tr>
                                                            <td id="bordure_table2">4</td>
                                                            <td id="bordure_table2"><div id="neant">N</div></td>
                                                            <td id="bordure_table2"></td>
                                                            <td id="bordure_table2"></td>
                                                            <td id="bordure_table2"></td>
                                                            <td id="bordure_table2"></td>
                                                            {{-- <td id="bordure_table2"></td> --}}
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="container">
                                                    <div id="a_gauche" class="pull-left">
                                                        <h4 class="font-bold addr-font-h4">
                                                            Rédaction, recherché, etc <br>
                                                            Enregistrement, répertoire <br><br>
                                                            vu au Parquet
                                                        </h4>
                                                    </div>
                                                    <div class="pull-right">
                                                        <h4 class="font-bold addr-font-h4">
                                                            Pour extrait conforme <br>
                                                            Conakry le ,   {{ $casier->created_at->format('d/m/Y') }} <br><br>
                                                            Le chef du Greffe <br><br>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="container">
                                                    <div class="center">
                                                        @if($casier->created_at->format('Y') == '2023')
                                                            <img src="/qrcodes/2023/casier_judiciaire/{{ $casier->num_casier.'.png' }}" width="150px" height="150px" alt="">
                                                        @else
                                                            <img src="/qrcodes/casier_judiciaire/{{ $casier->id.'.png' }}" width="150px" height="150px" alt="">
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
             var url = '{{ route("casier_judiciare.destroy", ":id") }}';
             url = url.replace(':id', id);
             $("#deleteform").attr('action', url);
         }
    function formSubmit()
    {
        // alert("bonjour");
        $("#deleteform").submit();
    }
</script>
