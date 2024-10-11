@extends('layouts.themes._light_theme')
@section('content')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Importion des candidats avec n° photo</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="#"></a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Importation candidats</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-red">
            <div class="card-head">
                <header>Importation des candidats avec n° photo</header>
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
                        <a href="{{ route('home') }}" class="btn btn-info"><i class="fa fa-reply"></i> Retour </a>
                        <button class="btn deepPink-bgcolor  btn-outline" data-toggle="modal" data-target="#file_excel">
                            Importer la liste des candidats avec n° photo
                            <i class="fa fa-plus"></i>
                        </button>
                        <!-- debut modal -->
                            <div class="modal fade" data-backdrop="static" id="file_excel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div  class="modal-header btn btn-danger text-center text-white">
                                            <h4 class="modal-title white-text w-100 font-weight-bold py-2">Importer le fichier</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" class="white-text">&times;</span>
                                            </button>
                                        </div>
                                        <!-- start modal body -->
                                            <div class="modal-body">
                                                    <form action="{{ route('photo_candidat.store') }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <input type="file" name="liste_candidat" class="form-control" id="liste_candidat" required>
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
                        <button class="btn deepPink-bgcolor  btn-outline" data-toggle="modal" data-target="#liste_ecole">
                            Afficher les candidats par écoles
                            <i class="fa fa-eye"></i>
                        </button>
                        <!-- debut modal -->
                            <div class="modal fade" data-backdrop="static" id="liste_ecole" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div  class="modal-header btn btn-danger text-center text-white">
                                            <h4 class="modal-title white-text w-100 font-weight-bold py-2">Choisir une ecole</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" class="white-text">&times;</span>
                                            </button>
                                        </div>
                                        <!-- start modal body -->
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Selectionner</label>
                                                        <select onchange="window.location.href = this.value" class="form-control" name="ecole_id" id="ecole_id" required>
                                                         <option value=""></option>
                                                            @foreach ($all_ecoles as $key => $ecole)
                                                                <option value="{{ route('photo_par_ecole',$ecole->ecole) }}">{{ $ecole->ecole}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    {{-- <button type="submit">valider</button> --}}
                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <button class="btn btn-primary" data-dismiss="modal">Annuler <i class="fa fa-times"></i></button>
                                                    </div>
                                            </div>
                                        <!-- end modal body -->
                                    </div>
                                </div>
                            </div>
                        <!-- fin modal -->
                        <a href="{{ route('remove_photo_candidat') }}" class="btn btn-danger">Annuler l'importation <i class="fa fa-trash"></i></a>
                    </div>
                </div>
                <div class="table-scrollable">
                    <table
                        class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                            id="eleves">
                        <thead>
                            <tr>
                                <th>Centre</th>
                                <th>Ecole</th>
                                <th>N° photo</th>
                                <th>Nom candidat</th>
                                <th>Date</th>
                                <th>Lieu</th>
                                <th>Père</th>
                                <th>Mère</th>
                                <th>Session</th>
                                <th>Pv</th>
                                <th>Nat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_candidats as $candidat)
                                <tr>
                                    <td>{{ $candidat->centre}}</td>
                                    <td>{{ $candidat->ecole }}</td>
                                    <td>{{ $candidat->n_photo }}</td>
                                    <td>{{ $candidat->prenom_et_nom }}</td>
                                    <td>{{ $candidat->date_naiss }}</td>
                                    <td>{{ $candidat->lieu }}</td>
                                    <td>{{ $candidat->pere }}</td>
                                    <td>{{ $candidat->mere }}</td>
                                    <td>{{ $candidat->ses_bepc }}</td>
                                    <td>{{ $candidat->pv_bepc }}</td>
                                    <td>{{ $candidat->nat }}</td>
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
