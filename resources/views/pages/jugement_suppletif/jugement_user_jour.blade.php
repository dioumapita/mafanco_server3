@extends('layouts.themes._light_theme')
@section('content')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Jugement suppletif par jour</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="#"></a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Jugement suppletif par jour</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-red">
            <div class="card-head">
                <header>
                    Jugement suppletif @if($status == 0) normal  @else urgent @endif du {{ $date }} <br><br>
                    Nbre de jugement: {{ $total_jugements->count() }}
                </header>
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
                        <button class="btn btn-primary" data-toggle="modal" data-target="#par_jour">Afficher par jour
                            <i class="fa fa-list"></i>
                        </button>
                        <!-- debut modal -->
                            <div class="modal fade" data-backdrop="static" id="par_jour" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div  class="modal-header btn btn-danger text-center text-white">
                                            <h4 class="modal-title white-text w-100 font-weight-bold py-2">Choisir une date</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" class="white-text">&times;</span>
                                            </button>
                                        </div>
                                        <!-- start modal body -->
                                            <div class="modal-body">
                                                    <form action="{{ route('show_jugement_user_jour') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <label for="date_ajout">Date *</label>
                                                            <input type="date"
                                                                class="form-control" name="date_choisie" id="date_choisie" value="{{ old('date_choisie') }}"  required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="status">Status *</label>
                                                            <select class="form-control" name="status" id="status" required>
                                                                <option value="">Selectionnez un status</option>
                                                                <option value="0">Normal</option>
                                                                <option value="1">Urgent</option>
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
                        <button id="addRow1" data-toggle="modal" data-target="#mois" class="btn btn-primary">
                            <i class="fa fa-list"></i> Afficher Par Mois
                        </button>
                        <!-- debut modal -->
                        <div class="modal fade" data-backdrop="static" id="mois" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div  class="modal-header btn btn-danger text-center text-white">
                                        <h4 class="modal-title white-text w-100 font-weight-bold py-2">Afficher les casiers par mois</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="white-text">&times;</span>
                                        </button>
                                    </div>
                                    <!-- start modal body -->
                                        <div class="modal-body">
                                            <form action="{{ route('show_jugement_user_mois') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="mois">Selectionner le mois</label>
                                                    <select  class="form-control" name="mois" id="mois" required>
                                                    <option value=""></option>
                                                        <option value="1">Janvier</option>
                                                        <option value="2">Fevrier</option>
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
                                                {{-- <div class="form-group">
                                                    <label for="status">Status *</label>
                                                    <select class="form-control" name="status" id="status" required>
                                                        <option value="">Selectionnez un status</option>
                                                        <option value="0">Normal</option>
                                                        <option value="1">Urgent</option>
                                                    </select>
                                                </div> --}}
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-primary">Valider <i class="fa fa-check"></i></button>
                                                    <button class="btn btn-dark" data-dismiss="modal">Annuler <i class="fa fa-times"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    <!-- end modal body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-scrollable">
                    <table
                        class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                            id="eleves">
                        <thead>
                            <tr>
                                <th class="text-center">N° </th>
                                <th class="text-center">Utilisateur</th>
                                <th class="text-center">Nombre de jugement</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_jugement_suppletifs as $jugement)
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td class="text-center">{{ $jugement->user->prenom.' '.$jugement->user->nom }}</td>
                                    <td class="text-center">{{ $jugement->total }}</td>
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


