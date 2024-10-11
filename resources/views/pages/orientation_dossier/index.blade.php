@extends('layouts.themes._light_theme')
@section('content')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Orientation des dossiers</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="#"></a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Orientation des dossiers</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-red">
            <div class="card-head">
                <header>Historique des Orientations des dossiers affaire civil</header>
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
                                <th class="text-center">N° RG </th>
                                <th class="text-center">Objet</th>
                                <th class="text-center">Demandeur</th>
                                <th class="text-center">Defendeur</th>
                                <th class="text-center">Lieu d'orientation</th>
                                <th class="text-center">Date orientation</th>
                                <th class="text-center">Etat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_orientations as $orientation)
                                <tr>
                                    <td class="text-center">{{ $orientation->dossieraffaireCivil->num_rg }}</td>
                                    <td class="text-center">{{ $orientation->dossieraffaireCivil->objet }}</td>
                                    <td class="text-center">{{ $orientation->dossieraffaireCivil->demandeur }}</td>
                                    <td class="text-center">{{ $orientation->dossieraffaireCivil->defendeur }}</td>
                                    <td class="text-center">{{ $orientation->lieu_orientation }}</td>
                                    <td class="text-center">{{ $orientation->date_orientation->format('d/m/Y') }}</td>
                                    <td class="text-center">
                                        @if($orientation->status == 0)
                                            Retiré
                                        @else
                                            Valide
                                        @endif
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
