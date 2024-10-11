@extends('layouts.themes._light_theme')
@section('content')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Détail d'une nationalité</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="{{ route('home') }}">Accueil</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li><a class="parent-item" href="#">Nationalité</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Détail d'une nationalité</li>
        </ol>
    </div>
</div>
 <a href="{{ route('gest_nationalite.index') }}" class="btn btn-primary"><i class="fa fa-reply"></i> Retour</a>
<div id="media_screen" class="row">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
    <div class="profile-sidebar">
        <div class="card">
            <div class="card-head card-topline-aqua">
                <header> Informations de la nationalité</header>
            </div>
            <div class="card-body no-padding height-9">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>N° :</b> {{ $nationalite->numero }}
                    </li>
                    <li class="list-group-item">
                        <b>Nom :</b> {{ $nationalite->nom }}
                    </li>
                    <li class="list-group-item">
                        <b>Date Naiss:</b> {{ $nationalite->date_naissance }}
                    </li>
                    <li class="list-group-item">
                        <b>Lieu Naiss:</b> {{ $nationalite->lieu_naissance }}
                    </li>
                    <li class="list-group-item">
                        <b>Filiation:</b> {{ $nationalite->filiation }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
<!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div>
                    <div class="card">
                        <div class="card-head card-topline-aqua">
                            <header>Document </header>
                        </div>
                        <div class="white-box">
                            <!-- fin modal -->
                            <br><br>
                            {{-- @if($appel->docAppels->count() > 0) --}}
                                <iframe  src="/uploads/gest/nationalites/{{ $nationalite->id.'.pdf' }}" width="600" height="700" alt="pdf">
                                </iframe>
                        </div>
                    </div>
                </div>
            </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>
@endsection

