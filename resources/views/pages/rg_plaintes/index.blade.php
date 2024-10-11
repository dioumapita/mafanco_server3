@extends('layouts.themes._light_theme')
@section('content')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Liste des plaintes</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="#"></a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Liste des plaintes</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-red">
            <div class="card-head">
                <header>Liste des plaintes pour le mois </header>
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
                        <a href="{{ route('rg_plainte.create') }}" class="btn btn-danger">Ajouter une plainte <i class="fa fa-plus"></i></a>
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
                                <th class="text-center">Origine</th>
                                <th class="text-center">Infraction</th>
                                <th class="text-center">Orientation</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_plaintes as $plainte)
                                <tr>
                                    <td class="text-center">{{ $plainte->num }}</td>
                                    <td class="text-center">{{ $plainte->date_plainte->format('d/m/Y') }}</td>
                                    <td class="text-center">{{ $plainte->origine }}</td>
                                    <td class="text-center">{{ $plainte->infraction }}</td>
                                    <td class="text-center">{{ $plainte->orientation }}</td>
                                    <td>
                                        <a href="{{ route('rg_plainte.show',$plainte->id) }}" class="btn btn-info btn-block"> Afficher <i class="fa fa-eye"></i></a>
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

