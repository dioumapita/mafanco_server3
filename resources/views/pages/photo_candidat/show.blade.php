@extends('layouts.themes._light_theme')
@section('content')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Prendre la photo d'un candidat</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="#">@lang('liste_eleve.Accueil')</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Candidat</li>
        </ol>
    </div>
</div>
<a href="{{ route('photo_par_ecole',$candidat->ecole) }}" class="btn btn-info">Retour</a>
<br><br>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
        <div class="profile-sidebar">
            <div class="card card-topline-aqua">
                <div class="card-body no-padding height-9">
                    <div class="row">
                        <div class="mx-auto">
                            @if(file_exists(public_path().'/images/Dubreka/bepc/'.$candidat->n_photo.'.jpg'))
                                <img  src="/images/Dubreka/bepc_{{ $candidat->ecole.'/'.$candidat->n_photo.'.jpg' }}" alt="photo_eleve" height="500" width="330">
                            @else

                            @endif
                            <br>
                            <i class="mx-auto">N° photo {{ $candidat->n_photo }}</i>
                            <br><br>
                            <b>Information du candidat</b><br>
                            <b>Prénom et Nom: {{ $candidat->prenom_et_nom }}</b><br>
                            <b>Sexe: {{ $candidat->sexe }}</b><br>
                            <b>Date: {{ $candidat->date_naiss }}</b><br>
                            <b>Lieu: {{ $candidat->lieu }}</b><br>
                            <b>Père: {{ $candidat->pere }}</b><br>
                            <b>Mère: {{ $candidat->mere }}</b><br>
                            <b>Session: {{ $candidat->ses_bepc }}</b><br>
                            <b>Pv: {{ $candidat->pv_bepc }}</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN PROFILE CONTENT -->
        <div class="profile-content">
            <div class="row">
                <div class="card">
                    <div class="card-topline-aqua">
                        <header></header>
                    </div>
                    <div class="white-box">
                        <!-- Nav tabs -->
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active fontawesome-demo" id="tab1">
                                <div id="biography">
                                    <div class="row container">
                                        {{-- <form action="{{ route('store_photo_candidat') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="n_photo" value="{{ $candidat->n_photo }}">
                                            <!-- start file webcam.min.js -->
                                            <script src="/assets/asset_principal/js/webcam.min.js"></script>
                                            <!-- end file webcam.min.js -->
                                            <!-- start webcam js -->
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-6">
                                                            <div class="pull-right">
                                                                <div  id="my_camera"></div>
                                                                    <br>
                                                                    <input class="btn btn-primary btn-block" type="button" value="@lang('create.PrendLaPhone')" onClick="take_snapshot()">
                                                                    <input type="hidden" name="photo_candidat" class="image-tag">
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-6">
                                                                <div id="results">Your captured image will appear here...</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Configure a few settings and attach camera -->
                                                <script language="JavaScript">
                                                    Webcam.set({
                                                        width: 640,
                                                        height: 480,
                                                        image_format: 'jpeg',
                                                        jpeg_quality: 90
                                                    });

                                                    Webcam.attach( '#my_camera' );

                                                    function take_snapshot() {
                                                        Webcam.snap( function(data_uri) {
                                                            $(".image-tag").val(data_uri);
                                                            document.getElementById('results').innerHTML = '<img  src="'+data_uri+'"/>';
                                                        } );
                                                    }
                                                </script>
                                            <!-- end webcam js -->
                                            <br>

                                            <button type="submit" class="btn btn-danger btn-block">Enregister la photo</button>
                                        </form> --}}
                                        <form action="{{ route('store_photo_candidat') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="n_photo" value="{{ $candidat->n_photo }}">
                                            <input type="hidden" name="ecole" value="{{ $candidat->ecole }}">
                                            <input type="file" name="photo_candidat" id="photo_candidat">
                                            <input type="submit" value="valider">
                                        </form>
                                    </div>
                                    <span class="espace"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>
@endsection
