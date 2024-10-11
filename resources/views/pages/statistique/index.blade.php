@extends('layouts.themes._light_theme')
@section('content')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Gestion des statistiques</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="#"></a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Gestion des statistiques</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-red">
            <div class="card-head">
                <header>Gestion des statistiques</header>
                <div class="tools">
                    <a class="fa fa-repeat btn-color box-refresh"
                        href="javascript:;"></a>
                    <a class="t-collapse btn-color fa fa-chevron-down"
                        href="javascript:;"></a>
                    <a class="t-close btn-color fa fa-times"
                        href="javascript:;"></a>
                </div>
            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <a href="{{ route('home') }}" class="btn btn-info"><i class="fa fa-reply"></i>
                            Retour
                        </a>
                        <button class="btn deepPink-bgcolor  btn-outline" data-toggle="modal" data-target="#new_scelle">Ajout
                            <i class="fa fa-plus"></i>
                        </button>
                        <!-- debut modal -->
                            <div class="modal fade" data-backdrop="static" id="new_scelle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div  class="modal-header btn btn-danger text-center text-white">
                                            <h4 class="modal-title white-text w-100 font-weight-bold py-2">Nouveau</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" class="white-text">&times;</span>
                                            </button>
                                        </div>
                                        <!-- start modal body -->
                                            <div class="modal-body">
                                                    <form action="{{ route('gestion_statistique.store') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <label for="libelle">Libelle*</label>
                                                            <select class="form-control" name="libelle" id="libelle" required>
                                                              <option value=""></option>
                                                              <option value="CASIER">CASIER</option>
                                                              <option value="NATIONALITE">NATIONALITE</option>
                                                              <option value="JUGEMENT">JUGEMENT</option>
                                                              <option value="ORDONNANCE">ORDONNANCE</option>
                                                              <option value="REQUETES">REQUETES</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="infraction">Nbre*</label>
                                                            <input type="number"
                                                                class="form-control" name="nbre" id="nbre" value="{{ old('nbre') }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="mois">Selectionner le mois</label>
                                                            <select  class="form-control" name="mois" id="mois" required>
                                                            <option value=""></option>
                                                                <option value="1">Janvier</option>
                                                                <option value="2">Février</option>
                                                                <option value="3">Mars</option>
                                                                <option value="4">Avril</option>
                                                                <option value="5">Mai</option>
                                                                <option value="6">Juin</option>
                                                                <option value="7">Juillet</option>
                                                                <option value="8">Août</option>
                                                                <option value="9">Septembre</option>
                                                                <option value="10">Octobre</option>
                                                                <option value="11">Novembre</option>
                                                                <option value="12">Décembre</option>
                                                            </select>
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
                    </div>
                </div>
                <div class="table-scrollable">
                    <table
                        class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                            id="eleves">
                        <thead>
                            <tr>
                                <th class="text-center">N° </th>
                                <th class="text-center">Libelle</th>
                                <th class="text-center">Nbre</th>
                                <th class="text-center">Mois</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_statistiques as $statistique)
                                <tr>
                                    <td class="text-center">{{ $n++ }}</td>
                                    <td class="text-center">{{ $statistique->libelle }}</td>
                                    <td class="text-center">{{ $statistique->nbre }}</td>
                                    <td class="text-center">
                                        @if($statistique->mois == 1)
                                            Janvier
                                        @elseif($statistique->mois == 2)
                                            Février
                                        @elseif($statistique->mois == 3)
                                            Mars
                                        @elseif($statistique->mois == 4)
                                            Avril
                                        @elseif($statistique->mois == 5)
                                            Mai
                                        @elseif($statistique->mois == 6)
                                            Juin
                                        @elseif($statistique->mois == 7)
                                            Juillet
                                        @elseif($statistique->mois == 8)
                                            Août
                                        @elseif($statistique->mois == 9)
                                            Septembre
                                        @elseif($statistique->mois == 10)
                                            Novembre
                                        @elseif($statistique->mois == 11)
                                            Décembre
                                        @elseif($statistique->mois == 12)

                                        @else

                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#edit_scelle{{ $statistique->id }}">Modifier
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <a href="#myModaldelete" data-toggle="modal" onclick="deleteData({{ $statistique->id }})"
                                            class="btn btn-danger btn-block">
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
                                                        <form action="{{ route('gestion_statistique.destroy',$statistique->id) }}" method="post" id="deleteform">
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
                                        <!-- debut modal -->
                                            <div class="modal fade" data-backdrop="static" id="edit_scelle{{ $statistique->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                                                                    <form action="{{ route('gestion_statistique.update',$statistique->id) }}" method="post">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field('PUT') }}
                                                                        <div class="form-group">
                                                                            <label for="libelle">Libelle*</label>
                                                                            <select class="form-control" name="libelle" id="libelle" required>
                                                                              <option value=""></option>
                                                                              <option value="CASIER" @if($statistique->libelle == 'CASIER') selected @endif>CASIER</option>
                                                                              <option value="NATIONALITE" @if($statistique->libelle == 'NATIONALITE') selected @endif>NATIONALITE</option>
                                                                              <option value="JUGEMENT" @if($statistique->libelle == 'JUGEMENT') selected @endif>JUGEMENT</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="infraction">Nbre*</label>
                                                                            <input type="number"
                                                                                class="form-control" name="nbre" id="nbre" value="{{ $statistique->nbre }}" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="mois">Selectionner le mois</label>
                                                                            <select  class="form-control" name="mois" id="mois" required>
                                                                            <option value=""></option>
                                                                                <option value="1" @if($statistique->mois == 'Janvier') selected @endif>Janvier</option>
                                                                                <option value="2" @if($statistique->mois == 'Février') selected @endif>Février</option>
                                                                                <option value="3"    @if($statistique->mois == 'Mars') selected @endif>Mars</option>
                                                                                <option value="4"   @if($statistique->mois == 'Avril') selected @endif>Avril</option>
                                                                                <option value="5"     @if($statistique->mois == 'Mai') selected @endif>Mai</option>
                                                                                <option value="6"    @if($statistique->mois == 'Juin') selected @endif>Juin</option>
                                                                                <option value="7" @if($statistique->mois == 'Juillet') selected @endif>Juillet</option>
                                                                                <option value="8"    @if($statistique->mois == 'Août') selected @endif>Août</option>
                                                                                <option value="9" @if($statistique->mois == 'Septembre') selected @endif>Septembre</option>
                                                                                <option value="10" @if($statistique->mois == 'Octobre') selected @endif>Octobre</option>
                                                                                <option value="11" @if($statistique->mois == 'Novembre') selected @endif>Novembre</option>
                                                                                <option value="12" @if($statistique->mois == 'Décembre') selected @endif>Décembre</option>
                                                                            </select>
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
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript">
    function deleteData(id)
        {
            var id = id;
            var url = '{{ route("gestion_statistique.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteform").attr('action', url);
        }
    function formSubmit()
    {
        // alert("bonjour");
        $("#deleteform").submit();
    }
</script>
