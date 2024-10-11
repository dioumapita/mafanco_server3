@extends('layouts.themes._light_theme')
@section('content')
<style>
    #icon
    {
      width: 100px;
      height: 80px;
    }
    </style>
    <!-- Start title -->
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Menu Principal</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;
                        <a class="parent-item" href="#">Accueil</a>&nbsp;
                            <i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Menu Principal</li>
                </ol>
            </div>
        </div>
    <!-- End title -->
<div class="row">
    <div class="col-lg-9">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-12">
                    <div class="panel">
                        <header class="panel-heading panel-heading-blue">
                           <span id="title_panel">Gestion orientation d'un dossier</span>
                        </header>
                        <div class="panel-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-xl-6 col-6">
                                        <a href="{{ route('dossier_affaire_civil.index') }}">
                                            <div id="bordure" class="card bg-light mb-3 border border-primary">
                                                <div id="card-body" class="card-body text-center">
                                                    <img id="icon" class="card-img-top img-fluid" src="/images/icon_svg/affaire_civil.png" border='0' align='middle'>
                                                    <h6 id="titre" class="text-center">Affaire Civile</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-xl-6 col-6">
                                        <a href="{{ route('dossier_flagrant_delit.index') }}">
                                            <div id="bordure" class="card bg-light mb-3 border border-primary">
                                                <div id="card-body" class="card-body text-center">
                                                    <img id="icon" class="card-img-top img-fluid" src="/images/icon_svg/flagrant_delit.png" border='0' align='middle'>
                                                    <h6 id="titre" class="text-center">Flagrant Delit</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-xl-6 col-6">
                                        <a href="#">
                                            <div id="bordure" class="card bg-light mb-3 border border-primary">
                                                <div id="card-body" class="card-body text-center">
                                                    <img id="icon" class="card-img-top img-fluid" src="/images/icon_svg/information2.png" border='0' align='middle'>
                                                    <h6 id="titre" class="text-center">Information</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-xl-6 col-6">
                                        <a href="{{ route('orientation_dossier.index') }}">
                                            <div id="bordure" class="card bg-light mb-3 border border-primary">
                                                <div id="card-body" class="card-body text-center">
                                                    <img id="icon" class="card-img-top img-fluid" src="/images/icon_svg/orientation.png" border='0' align='middle'>
                                                    <h6 id="titre" class="text-center">Orientation</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-12">
                    <div class="panel">
                        <header class="panel-heading panel-heading-blue">
                            <span id="title_panel">Gestion des Cabinets d'instructions </span>
                        </header>
                        <div class="panel-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6  col-xl-6 col-6">
                                        <a href="{{ route('rg_instruction.index') }}">
                                            <div id="bordure" class="card bg-light mb-3 border border-primary" style="max-width: 18rem;">
                                                <div id="card-body" class="card-body text-center">
                                                    <img id="icon" class="card-img-top img-fluid" src="/images/icon_svg/stock.svg" border='0' align='middle'>
                                                    <h6 id="titre">Cabinet N° 1</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-xl-6 col-6">
                                        <a href="{{ route('rg_instruction.index') }}">
                                            <div id="bordure" class="card bg-light mb-3 border border-primary" style="max-width: 18rem;">
                                                <div id="card-body" class="card-body text-center">
                                                    <img id="icon" class="card-img-top img-fluid" src="/images/icon_svg/parquet.svg" border='0' align='middle'>
                                                    <h6 id="titre">Cabinet N° 2</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-xl-6 col-6">
                                        <a href="{{ route('rg_instruction.index') }}">
                                            <div id="bordure" class="card bg-light mb-3 border border-primary" style="max-width: 18rem;">
                                                <div id="card-body" class="card-body text-center">
                                                    <img id="icon" class="card-img-top img-fluid" src="/images/icon_svg/icon.jpg" border='0' align='middle'>
                                                    <h6 id="titre">Cabinet N° 3</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-xl-6 col-6">
                                        <a href="{{ route('rg_instruction.index') }}">
                                            <div id="bordure" class="card bg-light mb-3 border border-primary" style="max-width: 18rem;">
                                                <div id="card-body" class="card-body text-center">
                                                    <img id="icon" class="card-img-top img-fluid" src="/images/icon_svg/icon2.jpg" border='0' align='middle'>
                                                    <h6 id="titre">Cabinet N° 4</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                    <div class="col-xl-6 col-md-6 col-12">
                        <div class="panel">
                            <header class="panel-heading panel-heading-blue">
                                <span id="title_panel"> Gestion des actes: Greffe et parquet </span>
                            </header>
                            <div class="panel-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-xl-6 col-6">
                                            <a href="#">
                                                <div id="bordure" class="card bg-light mb-3 border border-primary">
                                                    <div id="card-body" class="card-body text-center">
                                                        <img id="icon" class="card-img-top img-fluid" src="/images/icon_svg/sujet.png" border='0' align='middle'>
                                                        <h6 id="titre">Cabinet de greffe</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-xl-6 col-6">
                                            <a href="#">
                                                <div id="bordure" class="card bg-light mb-3 border border-primary">
                                                    <div id="card-body" class="card-body text-center">
                                                        <img id="icon" class="card-img-top img-fluid" src="/images/icon_svg/icon2.jpg" border='0' align='middle'>
                                                        <h6 id="titre">Cabinet du parquet</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-12">
                        <div class="panel">
                            <header class="panel-heading panel-heading-blue">
                                <span id="title_panel">Gestion des actes: Siège et Autres </span>
                            </header>
                            <div class="panel-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-xl-6 col-6">
                                            <a href="#">
                                                <div id="bordure" class="card bg-light mb-3 border border-primary">
                                                    <div id="card-body" class="card-body text-center">
                                                        <img id="icon" class="card-img-top img-fluid" src="/images/icon_svg/rapport_voyage.png" border='0' align='middle'>
                                                        <h6 id="titre">Siège</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-xl-6 col-6">
                                            <a href="#">
                                                <div id="bordure" class="card bg-light mb-3 border border-primary">
                                                    <div id="card-body" class="card-body text-center">
                                                        <img id="icon" class="card-img-top img-fluid" src="/images/icon_svg/juge4.png" border='0' align='middle'>
                                                        <h6 id="titre">Autres</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                    <div class="col-xl-6 col-md-6 col-12">
                        <div class="panel">
                            <header class="panel-heading panel-heading-blue">
                                <span id="title_panel"> Gestion des certificats: nationalité et jugement supletif </span>
                            </header>
                            <div class="panel-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-xl-6 col-6">
                                            <a href="{{ route('certificat_nationalite.index') }}">
                                                <div id="bordure" class="card bg-light mb-3 border border-primary">
                                                    <div id="card-body" class="card-body text-center">
                                                        <img id="icon" class="card-img-top img-fluid" src="/images/icon_svg/sujet.png" border='0' align='middle'>
                                                        <h6 id="titre">Nationalité</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-xl-6 col-6">
                                            <a href="{{ route('casier_judiciare.index') }}">
                                                <div id="bordure" class="card bg-light mb-3 border border-primary">
                                                    <div id="card-body" class="card-body text-center">
                                                        <img id="icon" class="card-img-top img-fluid" src="/images/icon_svg/icon2.jpg" border='0' align='middle'>
                                                        <h6 id="titre">Casier Judiciaire</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-12">
                        <div class="panel">
                            <header class="panel-heading panel-heading-blue">
                                <span id="title_panel"> Gestion des jugements et scelles</span>
                            </header>
                            <div class="panel-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-xl-6 col-6">
                                            <a href="{{ route('jugement_suppletif.index') }}">
                                                <div id="bordure" class="card bg-light mb-3 border border-primary">
                                                    <div id="card-body" class="card-body text-center">
                                                        <img id="icon" class="card-img-top img-fluid" src="/images/icon_svg/articles.png" border='0' align='middle'>
                                                        <h6 id="titre">Jugement</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-xl-6 col-6">
                                            <a href="{{ route('scelle.index') }}">
                                                <div id="bordure" class="card bg-light mb-3 border border-primary">
                                                    <div id="card-body" class="card-body text-center">
                                                        <img id="icon" class="card-img-top img-fluid" src="/images/icon_svg/article.png" border='0' align='middle'>
                                                        <h6 id="titre">Scelle</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                    <div class="col-xl-6 col-md-6 col-12">
                        <div class="panel">
                            <header class="panel-heading panel-heading-blue">
                                <span id="title_panel"> Gestion des registres: Appels et plaintes </span>
                            </header>
                            <div class="panel-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-xl-6 col-6">
                                            <a href="{{ route('rg_appel.index') }}">
                                                <div id="bordure" class="card bg-light mb-3 border border-primary">
                                                    <div id="card-body" class="card-body text-center">
                                                        <img id="icon" class="card-img-top img-fluid" src="/images/icon_svg/import.svg" border='0' align='middle'>
                                                        <h6 id="titre">Appel</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-xl-6 col-6">
                                            <a href="{{ route('rg_plainte.index') }}">
                                                <div id="bordure" class="card bg-light mb-3 border border-primary">
                                                    <div id="card-body" class="card-body text-center">
                                                        <img id="icon" class="card-img-top img-fluid" src="/images/icon_svg/rapport_carburant.jpeg" border='0' align='middle'>
                                                        <h6 id="titre">Plainte</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-xl-6 col-md-6 col-12">
                        <div class="panel">
                            <header class="panel-heading panel-heading-blue">
                                <span id="title_panel"> Gestion des jugements et scelles</span>
                            </header>
                            <div class="panel-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-xl-6 col-6">
                                            <a href="{{ route('jugement_suppletif.index') }}">
                                                <div id="bordure" class="card bg-light mb-3 border border-primary">
                                                    <div id="card-body" class="card-body text-center">
                                                        <img id="icon" class="card-img-top img-fluid" src="/images/icon_svg/articles.png" border='0' align='middle'>
                                                        <h6 id="titre">Jugement</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-xl-6 col-6">
                                            <a href="{{ route('scelle.index') }}">
                                                <div id="bordure" class="card bg-light mb-3 border border-primary">
                                                    <div id="card-body" class="card-body text-center">
                                                        <img id="icon" class="card-img-top img-fluid" src="/images/icon_svg/article.png" border='0' align='middle'>
                                                        <h6 id="titre">Scelle</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-md-12">
            <div class="row">
                    <div class="col-xl-6 col-md-6 col-12">
                        <div class="panel">
                            <header class="panel-heading panel-heading-blue">
                                <span id="title_panel"> Services de messagerie </span>
                            </header>
                            <div class="panel-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-xl-6 col-6">
                                            <a href="#">
                                                <div id="bordure" class="card bg-light mb-3 border border-primary">
                                                    <div id="card-body" class="card-body text-center">
                                                        <img id="icon" class="card-img-top img-fluid" src="/images/icon_svg/personnel.svg" border='0' align='middle'>
                                                        <h6 id="titre">Personnel</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-xl-6 col-6">
                                            <a href="#">
                                                <div id="bordure" class="card bg-light mb-3 border border-primary">
                                                    <div id="card-body" class="card-body text-center">
                                                        <img id="icon" class="card-img-top img-fluid" src="/images/icon_svg/personnel3.svg" border='0' align='middle'>
                                                        <h6 id="titre">Client</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div> --}}
    </div>
    <div class="col-lg-3">
        <div class="card">
            <header class="panel-heading panel-heading-blue">
                <span id="title_panel"> Informations </span>
            </header>
            <ul>
                <li>Certificat de nationalité: </li>
                <li>Casier Judiciaires: </li>
            </ul>
        </div>
    </div>
    </div>
@endsection
