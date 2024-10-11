@extends('layouts.themes._light_theme')
@section('content')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Détail d'une plainte</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="{{ route('home') }}">Accueil</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li><a class="parent-item" href="#">Plainte</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Détail d'une plainte</li>
        </ol>
    </div>
</div>
 <a href="{{ route('rg_plainte.index') }}" class="btn btn-primary"><i class="fa fa-reply"></i> Retour</a>
<div id="media_screen" class="row">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
    <div class="profile-sidebar">
        <div class="card">
            <div class="card-head card-topline-aqua">
                <header>Informations d'une plainte</header>
            </div>
            <div class="card-body no-padding height-9">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>N° :</b> {{ $plainte->num }}
                    </li>
                    <li class="list-group-item">
                        <b>Date :</b> {{ $plainte->date_plainte->format('d/m/Y') }}
                    </li>
                    <li class="list-group-item">
                        <b>Origine:</b> {{ $plainte->origine }}
                    </li>
                    <li class="list-group-item">
                        <b>Infraction:</b> {{ $plainte->infraction }}
                    </li>
                    <li class="list-group-item">
                        <b>Partie civile:</b> {{ $plainte->partie_civil }}
                    </li>
                    <li class="list-group-item">
                        <b>Orientation:</b> {{$plainte->orientation}}
                    </li>
                </ul>
                <br>
                <div class="text-center">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#update">Modifier
                        <i class="fa fa-edit"></i>
                    </button>
                </div>
                <!-- debut modal -->
                    <div class="modal fade" data-backdrop="static" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div  class="modal-header btn btn-danger text-center text-white">
                                    <h4 class="modal-title white-text w-100 font-weight-bold py-2">Modification d'une plainte</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="white-text">&times;</span>
                                    </button>
                                </div>
                                <!-- start modal body -->
                                    <div class="modal-body">
                                            <form action="{{ route('rg_plainte.update',$plainte->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}
                                                <div class="form-group">
                                                    <label for="num">Numéro *</label>
                                                    <input type="number"
                                                        class="form-control" name="num" id="num" value="{{ $plainte->num }}"  required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="date_ajout">Date *</label>
                                                    <input type="date"
                                                        class="form-control" name="date_plainte" id="date_plainte" value="{{ $plainte->date_plainte->format('Y-m-d') }}"  required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="origine">Origine *</label>
                                                    <input type="text"
                                                        class="form-control" name="origine" id="origine" value="{{ $plainte->origine }}"  required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="infraction">Infraction *</label>
                                                    <textarea class="form-control" name="infraction" id="infraction" cols="30" rows="4" required>{{ $plainte->infraction }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="partie_civil">Partie Civile</label>
                                                    <textarea class="form-control" name="partie_civil" id="infraction" cols="30" rows="4">{{ $plainte->partie_civil }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="affaire">Observation</label>
                                                    <select class="form-control input-height" name="orientation">
                                                        <option value="">Selectionner...</option>
                                                        <option value="CD">CD</option>
                                                        <option value="FD">FD</option>
                                                        <option value="CSS">CSS</option>
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
    </div>
<!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div>
                    <div class="card">
                        <div class="card-head card-topline-aqua">
                            <header>Détail d'une plainte </header>
                        </div>
                        <div class="white-box">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#orientation">Importer un document
                                <i class="fa fa-plus"></i>
                            </button>
                            <!-- debut modal -->
                                <div class="modal fade" data-backdrop="static" id="orientation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div  class="modal-header btn btn-danger text-center text-white">
                                                <h4 class="modal-title white-text w-100 font-weight-bold py-2">Importer un document</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="white-text">&times;</span>
                                                </button>
                                            </div>
                                            <!-- start modal body -->
                                                <div class="modal-body">
                                                        <form action="{{ route('doc_plainte.store') }}" method="post" enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="rg_plaintes_id" value="{{ $plainte->id }}">
                                                            <br>
                                                            <div class="form-group">
                                                                <input type="file"
                                                                    class="form-control" name="doc_plainte" id="doc_plainte" value="{{ old('doc_plainte') }}"  required>
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
                            {{-- <a href="{{ route('dossier_affaire_civil.edit',$dossier->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Modifier</a> --}}
                            <!-- fin modal -->
                            <a href="#myModaldelete" data-toggle="modal" onclick="deleteData({{ $plainte->id }})"
                                class="btn btn-danger">
                                <i class="fa fa-trash"></i> Supprimer la plainte
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
                                            <form action="{{ route('rg_plainte.destroy',$plainte->id) }}" method="post" id="deleteform">
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
                            <br><br>
                            <div>
                                <h4 class="text-center">
                                   <u>Liste des Accuse(s) / Prévenu(s)</u>
                                </h4>
                                    <div class="table-scrollable">
                                        <table
                                            class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                                id="eleves">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">N° </th>
                                                    <th class="text-center">Prénom et nom</th>
                                                    <th class="text-center">Date</th>
                                                    <th class="text-center">Lieu</th>
                                                    <th class="text-center">Père</th>
                                                    <th class="text-center">Mère</th>
                                                    <th class="text-center">Domicile</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($plainte->accuses as $accuse)
                                                    <tr>
                                                        <td></td>
                                                        <td>{{ $accuse->prenom_nom }}</td>
                                                        <td>
                                                            @if($accuse->date_naiss != null)
                                                                {{ $accuse->date_naiss->format('d/m/Y') }}
                                                            @else

                                                            @endif
                                                        </td>
                                                        <td>{{ $accuse->lieu_naiss }}</td>
                                                        <td>{{ $accuse->pere }}</td>
                                                        <td>{{ $accuse->mere }}</td>
                                                        <td>{{ $accuse->domicile }}</td>
                                                        <td></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                            @if($plainte->docPlaintes->count() > 0 )
                                <h4 class="text-center">
                                    <u>Document</u>
                                </h4>
                                <iframe  src="/uploads/{{ $plainte->docPlaintes->first()->chemin_doc }}" width="600" height="700" alt="pdf">
                                </iframe>
                            @else

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>
@endsection
<script type="text/javascript">
    function deleteData(id)
        {
            var id = id;
            var url = '{{ route("rg_plainte.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteform").attr('action', url);
        }
    function formSubmit()
        {
            // alert("bonjour");
            $("#deleteform").submit();
        }
</script>
