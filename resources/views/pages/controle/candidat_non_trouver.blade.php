@extends('layouts.themes._light_theme')
@section('content')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Liste des candidats non retrouvée</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="#"></a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Liste des candidats non retrouvée</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-red">
            <div class="card-head">
                <header>Liste des candidats non retrouvée effectif: {{ $all_candidats->count() }}</header>
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
                        <a href="{{ route('controle.index') }}" class="btn btn-info"><i class="fa fa-reply"></i>
                            Retour
                        </a>
                        <a href="{{ route('candidat_trouver') }}" class="btn btn-danger">Liste des candidats retrouvée <i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="table-scrollable">
                    <table
                        class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                            id="eleves">
                        <thead>
                            <tr>
                                <th>Profil</th>
                                <th>Nom candidat</th>
                                <th>Date</th>
                                <th>Lieu</th>
                                <th>Père</th>
                                <th>Mère</th>
                                <th>DPE</th>
                                <th>Session</th>
                                <th>Pv</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_candidats as $candidat)
                                <tr class="odd gradeX">
                                    <td>{{ $candidat->profil }}</td>
                                    <td>{{ $candidat->nom_candidat }}</td>
                                    <td>{{ $candidat->date_naiss }}</td>
                                    <td>{{ $candidat->lieu }}</td>
                                    <td>{{ $candidat->pere }}</td>
                                    <td>{{ $candidat->mere }}</td>
                                    <td>{{ $candidat->dpe }}</td>
                                    <td>{{ $candidat->session }}</td>
                                    <td>{{ $candidat->pv }}</td>
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
