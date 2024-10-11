@extends('layouts.themes._light_theme')
@section('content')
    <div id="media_screen" class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Détail D'un Dossier</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                        href="{{ route('home') }}">Accueil</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li><a class="parent-item" href="#">Dossier</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Détail D'un Dossier</li>
            </ol>
        </div>
    </div>
    <a href="{{ route('dossier.index') }}" class="btn btn-info"><i class="fa fa-reply"></i> Retour</a>
    <br><br>
    <div id="media_screen" class="row">
        <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->
                <div class="profile-sidebar">
                    <div class="card">
                        <div class="card-head card-topline-aqua">
                            <header>Informations Du Dossier</header>
                        </div>
                        <div class="card-body no-padding height-9">
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>N°: {{ $dossier->id }}</b>
                                </li>
                                <li class="list-group-item">
                                    <b>Dossier: {{ $dossier->nom_dossier }}</b>
                                </li>
                                <li class="list-group-item">
                                    <b>Propriétaire: {{ $dossier->proprietaire }}</b>
                                </li>
                                <li class="list-group-item">
                                    <b>Contact: {{ $dossier->contact }}</b>
                                </li>
                                <li class="list-group-item">
                                    <b>Date: {{ $dossier->date_ajout->format('d/m/Y') }}</b>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            <!-- END BEGIN PROFILE SIDEBAR -->
            <!-- BEGIN PROFILE CONTENT -->
                <div class="profile-content">
                    <div class="row">
                        <div class="card">
                            <div class="card-head card-topline-aqua">
                                <header><i class="text-center">Liste des documents du dossier &nbsp;&nbsp; Nbre: {{ $dossier->documents->count() }}</i></header>
                            </div>
                            <div class="white-box">
                                <div  class="container">
                                    <div class="row">
                                        <button class="btn deepPink-bgcolor  btn-outline" data-toggle="modal" data-target="#file_excel">
                                            Importer un document
                                            <i class="fa fa-plus"></i>
                                        </button>
                                        <!-- debut modal -->
                                            <div class="modal fade" data-backdrop="static" id="file_excel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div  class="modal-header btn btn-danger text-center text-white">
                                                            <h4 class="modal-title white-text w-100 font-weight-bold py-2">Importation d'un document</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true" class="white-text">&times;</span>
                                                            </button>
                                                        </div>
                                                        <!-- start modal body -->
                                                            <div class="modal-body">
                                                                    <form action="{{ route('document.store') }}" method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <input type="hidden" name="dossier_id" value="{{ $dossier->id }}">
                                                                        <div class="form-group">
                                                                            <label for="nom_doc">Nom du document</label>
                                                                            <input type="text" name="nom_doc" id="nom_doc" class="form-control" value="{{ old('nom_doc') }}" placeholder="Entrez le nom du document" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="file" name="chemin_doc" class="form-control" id="chemin_doc" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="date_ajout">Date</label>
                                                                            <input type="date" name="date_ajout" id="date_ajout" class="form-control" value="{{ old('date_ajout')}}" placeholder="Entrez la date" required>
                                                                        </div>
                                                                        <div class="modal-footer d-flex justify-content-center">
                                                                            <button type="submit" class="btn btn-primary">Valider</button>
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
                                    <div class="table-scrollable mt-5">
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">N°</th>
                                                    <th class="text-center">Document</th>
                                                    <th class="text-center">Date</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dossier->documents as $document)
                                                    <tr>
                                                        <td class="text-center">{{ $n++ }}</td>
                                                        <td class="text-center">{{ $document->nom_doc }}</td>
                                                        <td class="text-center">{{ $document->date_ajout->format('d/m/Y') }}</td>
                                                        <td>
                                                            <a href="#" class="btn btn-info">Afficher <i class=" fa fa-eye"></i></a>
                                                            <a href="#" class="btn btn-primary">Modifier <i class=" fa fa-edit"></i></a>
                                                            <a href="#" class="btn btn-danger">Supprimer <i class=" fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <h3>
                                    </h3>
                                <div id="detail">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>
@endsection

