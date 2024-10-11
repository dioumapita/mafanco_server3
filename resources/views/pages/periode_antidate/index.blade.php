@extends('layouts.themes._light_theme')
@section('content')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Liste des Périodes</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="#"></a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Liste des périodes</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-red">
            <div class="card-head">
                <header>Liste des périodes</header>
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
                        <button class="btn deepPink-bgcolor  btn-outline" data-toggle="modal" data-target="#new_periode">Ajouter une période
                            <i class="fa fa-plus"></i>
                        </button>
                        <!-- debut modal -->
                            <div class="modal fade" data-backdrop="static" id="new_periode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div  class="modal-header btn btn-danger text-center text-white">
                                            <h4 class="modal-title white-text w-100 font-weight-bold py-2">Nouvelle période</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" class="white-text">&times;</span>
                                            </button>
                                        </div>
                                        <!-- start modal body -->
                                            <div class="modal-body">
                                                    <form action="{{ route('periode_antidate.store') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <label for="num_debut">Numéro Début *</label>
                                                            <input type="number"
                                                                class="form-control" name="num_debut" id="num_debut" value="{{ old('num_debut') }}"  required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="num_fin">Numéro Fin *</label>
                                                            <input type="number"
                                                                class="form-control" name="num_fin" id="num_fin" value="{{ old('num_fin') }}"  required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="mois">Selectionner le mois</label>
                                                            <select  class="form-control" name="mois" id="mois" required>
                                                                <option value=""></option>
                                                                <option value="Janvier">Janvier</option>
                                                                <option value="Février">Février</option>
                                                                <option value="Mars">Mars</option>
                                                                <option value="Avril">Avril</option>
                                                                <option value="Mai">Mai</option>
                                                                <option value="Juin">Juin</option>
                                                                <option value="Juillet">Juillet</option>
                                                                <option value="Août">Août</option>
                                                                <option value="Septembre">Septembre</option>
                                                                <option value="Octobre">Octobre</option>
                                                                <option value="Novembre">Novembre</option>
                                                                <option value="Décembre">Décembre</option>
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
                                <th class="text-center">N° Début</th>
                                <th class="text-center">N° Fin</th>
                                <th class="text-center">Mois</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_periodes as $periode)
                                <tr>
                                    <td class="text-center">{{ $periode->num_debut }}</td>
                                    <td class="text-center">{{ $periode->num_fin }}</td>
                                    <td class="text-center">{{ $periode->mois }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#edit_periode{{ $periode->id }}">Modifier
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <a href="#myModaldelete" data-toggle="modal" onclick="deleteData({{ $periode->id }})"
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
                                                        <form action="{{ route('periode_antidate.destroy',$periode->id) }}" method="post" id="deleteform">
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
                                            <div class="modal fade" data-backdrop="static" id="edit_periode{{ $periode->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div  class="modal-header btn btn-danger text-center text-white">
                                                            <h4 class="modal-title white-text w-100 font-weight-bold py-2">Modification d'une période</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true" class="white-text">&times;</span>
                                                            </button>
                                                        </div>
                                                        <!-- start modal body -->
                                                            <div class="modal-body">
                                                                    <form action="{{ route('periode_antidate.update',$periode->id) }}" method="post">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field('PUT') }}
                                                                        <div class="form-group">
                                                                            <label for="num_debut">Numéro Début *</label>
                                                                            <input type="number"
                                                                                class="form-control" name="num_debut" id="num_debut" value="{{ $periode->num_debut }}"  required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="num_fin">Numéro Fin *</label>
                                                                            <input type="number"
                                                                                class="form-control" name="num_fin" id="num_fin" value="{{ $periode->num_fin }}"  required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="mois">Selectionner le mois</label>
                                                                            <select  class="form-control" name="mois" id="mois" required>
                                                                                <option value=""></option>
                                                                                <option value="Janvier" @if($periode->mois == 'Janvier') selected @endif>Janvier</option>
                                                                                <option value="Février" @if($periode->mois == 'Février') selected @endif>Février</option>
                                                                                <option value="Mars" @if($periode->mois == 'Mars') selected @endif>Mars</option>
                                                                                <option value="Avril" @if($periode->mois == 'Avril') selected @endif>Avril</option>
                                                                                <option value="Mai" @if($periode->mois == 'Mai') selected @endif>Mai</option>
                                                                                <option value="Juin" @if($periode->mois == 'Juin') selected @endif>Juin</option>
                                                                                <option value="Juillet" @if($periode->mois == 'Juillet') selected @endif>Juillet</option>
                                                                                <option value="Août" @if($periode->mois == 'Août') selected @endif>Août</option>
                                                                                <option value="Septembre" @if($periode->mois == 'Septembre') selected @endif>Septembre</option>
                                                                                <option value="Octobre" @if($periode->mois == 'Octobre') selected @endif>Octobre</option>
                                                                                <option value="Novembre" @if($periode->mois == 'Novembre') selected @endif>Novembre</option>
                                                                                <option value="Décembre" @if($periode->mois == 'Décembre') selected @endif>Décembre</option>
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
            var url = '{{ route("periode_antidate.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteform").attr('action', url);
        }
    function formSubmit()
    {
        // alert("bonjour");
        $("#deleteform").submit();
    }
</script>
