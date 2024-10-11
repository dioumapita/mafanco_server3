@extends('layouts.themes._light_theme')
@section('content')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Jugement Suppletif</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="#"></a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Jugement Suppletif</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-red">
            <div class="card-head">
                <header>
                    Jugement avec numéro identique
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
                    </div>
                </div>
                <div class="table-scrollable">
                    <table
                        class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                            id="eleves">
                        <thead>
                            <tr>
                                <th class="text-center">N° </th>
                                <th class="text-center">N° requette</th>
                                <th class="text-center">Concerne</th>
                                <th class="text-center">Date de naissance</th>
                                <th class="text-center">Lieu</th>
                                <th class="text-center">Compte</th>
                                <th class="text-center">Création</th>
                                <th class="text-center">Modification</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jugements as $jugement)
                                <tr>
                                    <td class="text-center">
                                        @if($jugement->status == 0)
                                            {{ $jugement->num }}
                                        @else
                                            {{ $jugement->num_anti }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ $jugement->num_requette }}
                                    </td>
                                    <td class="text-center">{{ $jugement->concerne }}</td>
                                    <td class="text-center">{{ $jugement->date_naiss->format('d/m/Y') }}</td>
                                    <td class="text-center">{{ $jugement->lieu_naiss }}</td>
                                    <td>
                                        @if($jugement->user != null)
                                            {{ $jugement->user->prenom.' '.$jugement->user->nom }}
                                        @endif
                                    </td>
                                    <td>{{ $jugement->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $jugement->updated_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('jugement_suppletif.show',$jugement->id) }}" class="btn btn-info">Afficher <i class="fa fa-eye"></i></a>
                                        <a href="{{ route('jugement_suppletif.edit',$jugement->id) }}" class="btn btn-primary">Modifier <i class="fa fa-edit"></i></a>
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
<br>
@endsection
