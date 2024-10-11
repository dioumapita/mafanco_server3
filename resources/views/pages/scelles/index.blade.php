@extends('layouts.themes._light_theme')
@section('content')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Liste des scelles</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="#"></a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Liste des scelles</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-red">
            <div class="card-head">
                <header>Liste des scelles</header>
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
                        <button class="btn deepPink-bgcolor  btn-outline" data-toggle="modal" data-target="#new_scelle">Ajouter le scelle
                            <i class="fa fa-plus"></i>
                        </button>
                        <!-- debut modal -->
                            <div class="modal fade" data-backdrop="static" id="new_scelle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div  class="modal-header btn btn-danger text-center text-white">
                                            <h4 class="modal-title white-text w-100 font-weight-bold py-2">Nouveau Scelle</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" class="white-text">&times;</span>
                                            </button>
                                        </div>
                                        <!-- start modal body -->
                                            <div class="modal-body">
                                                    <form action="{{ route('scelle.store') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <label for="num">Numéro *</label>
                                                            <input type="number"
                                                                class="form-control" name="num" id="num" value="{{ old('num') }}"  required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="date_ajout">Date *</label>
                                                            <input type="date"
                                                                class="form-control" name="date_ajout" id="date_ajout" value="{{ old('date_ajout') }}"  required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="affaire">Affaire *</label>
                                                            <textarea class="form-control" name="affaire" id="affaire" cols="30" rows="3" required></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="designation">Désignation *</label>
                                                            <textarea class="form-control" name="designation" id="designation" cols="30" rows="3" required></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="infraction">Infraction</label>
                                                            <input type="text"
                                                                class="form-control" name="infraction" id="infraction" value="{{ old('infraction') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="affaire">Observation</label>
                                                            <input type="text"
                                                                class="form-control" name="obs" id="obs" value="{{ old('obs') }}">
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
                                <th class="text-center">Date</th>
                                <th class="text-center">Affaire</th>
                                <th class="text-center">Designation</th>
                                <th class="text-center">Infraction</th>
                                <th class="text-center">Obs</th>
                                <th class="text-center">Restitution</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_scelles as $scelle)
                                <tr>
                                    <td class="text-center">{{ $scelle->num }}</td>
                                    <td class="text-center">{{ $scelle->date_ajout->format('d/m/Y') }}</td>
                                    <td class="text-center">{{ $scelle->affaire }}</td>
                                    <td class="text-center">{{ $scelle->designation}}</td>
                                    <td class="text-center">{{ $scelle->infraction }}</td>
                                    <td class="text-center">{{ $scelle->obs }}</td>
                                    <td class="text-center">@if($scelle->date_sortie) {{ $scelle->date_sortie->format('d/m/Y') }} @endif</td>
                                    <td>
                                        <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#edit_scelle{{ $scelle->id }}">Modifier
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <a href="#myModaldelete" data-toggle="modal" onclick="deleteData({{ $scelle->id }})"
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
                                                        <form action="{{ route('scelle.destroy',$scelle->id) }}" method="post" id="deleteform">
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
                                            <div class="modal fade" data-backdrop="static" id="edit_scelle{{ $scelle->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div  class="modal-header btn btn-danger text-center text-white">
                                                            <h4 class="modal-title white-text w-100 font-weight-bold py-2">Modification d'un scelle</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true" class="white-text">&times;</span>
                                                            </button>
                                                        </div>
                                                        <!-- start modal body -->
                                                            <div class="modal-body">
                                                                    <form action="{{ route('scelle.update',$scelle->id) }}" method="post">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field('PUT') }}
                                                                        <div class="form-group">
                                                                            <label for="num">Numéro *</label>
                                                                            <input type="number"
                                                                                class="form-control" name="num" id="num" value="{{ $scelle->num }}"  required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="date_ajout">Date *</label>
                                                                            <input type="date"
                                                                                class="form-control" name="date_ajout" id="date_ajout"  value="{{ $scelle->date_ajout->format('Y-m-d') }}"  required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="affaire">Affaire *</label>
                                                                            <textarea name="affaire" id="affaire" cols="30" class="form-control" rows="2" required>{{ $scelle->affaire }}</textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="designation">Désignation *</label>
                                                                            <textarea class="form-control" name="designation" id="designation" cols="30" rows="2" required>{{ $scelle->designation }}</textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="infraction">Infraction</label>
                                                                            <input type="text"
                                                                                class="form-control" name="infraction" id="infraction" value="{{ $scelle->infraction }}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="affaire">Observation</label>
                                                                            <input type="text"
                                                                                class="form-control" name="obs" id="obs" value="{{ $scelle->obs }}">
                                                                        </div>
                                                                            <div class="form-group">
                                                                                <label for="date_ajout">Date de restitution</label>
                                                                                <input type="date"
                                                                                    class="form-control" name="date_sortie" id="date_sortie" @if($scelle->date_sortie) value="{{ $scelle->date_sortie->format('Y-m-d') }}" @endif>
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
            var url = '{{ route("scelle.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteform").attr('action', url);
        }
    function formSubmit()
    {
        // alert("bonjour");
        $("#deleteform").submit();
    }
</script>
