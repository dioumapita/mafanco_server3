@extends('layouts.themes._light_theme')
@section('content')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Liste des appels</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="#"></a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Liste des appels</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-red">
            <div class="card-head">
                <header>Liste des appels</header>
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
                        <a href="{{ route('rg_appel.create') }}" class="btn btn-danger">Ajouter un appel <i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="table-scrollable">
                    <table
                        class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                            id="eleves">
                        <thead>
                            <tr>
                                <th class="text-center">N° </th>
                                <th class="text-center">Date appel</th>
                                <th class="text-center">Appelant</th>
                                <th class="text-center">Defendeur</th>
                                <th class="text-center">Etat</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_appels as $appel)
                                <tr>
                                    <td class="text-center">{{ $appel->num }}</td>
                                    <td class="text-center">{{ $appel->date_appel->format('d/m/Y') }}</td>
                                    <td class="text-center">{{ $appel->appelant }}</td>
                                    <td class="text-center">{{ $appel->defendeur }}</td>
                                    <td class="text-center">{{ $appel->etat }}</td>
                                    <td class="text-center">
                                        @if($appel->date_transmition != null)
                                            {{ $appel->date_transmition->format('d/m/Y') }}
                                        @else

                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('rg_appel.show',$appel->id) }}" class="btn btn-info btn-block">Afficher <i class="fa fa-eye"></i></a>
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
