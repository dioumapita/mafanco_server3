{{-- on herite du chemin du theme actif --}}
@extends('layouts.themes._light_theme')
    @section('content')
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Dossier Affaire Civil</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                            href="{{ route('home') }}">Accueil</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="#">Dossier</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Affaire Civil</li>
                </ol>
            </div>
        </div>
        <a href="{{ route('home') }}" class="btn btn-primary"><i class="fa fa-reply"></i> Retour </a>
        <br><br>
        <div class="row">
            <div class="col-sm-12 col-12 col-md-12 col-lg-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Création d'un dossier: Affaire Civil</header>
                    </div>
                    <div class="card-body ">
                        <form id="example-advanced-form" method="POST" action="{{ route('dossier_affaire_civil.store') }}" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{-- l'année d'inscription --}}
                             {{-- <input type="hidden" name="annee_id" value="{{ $id_annee }}"> --}}
                             <input type="hidden" name="status" value="0">
                            <h3>Etape 1/3</h3>
                            <fieldset>
                                <div class="col-lg-12 p-t-20">
                                    <!-- Start nom de l'élève -->
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">N° RG
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <input type="text" name="num_rg" minlength="2" placeholder="Veuillez saisir le numéro RG"
                                                        class="form-control input-height" value="{{ old('num_rg') }}" required />
                                                </div>
                                            </div>
                                        </div>
                                    <!-- End nom de l'élève -->
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Objet
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <input type="text" name="objet" minlength="2" placeholder="Veuillez saisir l'objet"
                                                        class="form-control input-height" value="{{ old('objet') }}" required />
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </fieldset>
                            <h3>Etape 2/3</h3>
                            <fieldset>
                                <div class="col-lg-12 p-t-20">
                                    <!-- Start numéro téléphone élève -->
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Demandeur
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <textarea class="form-control" name="demandeur" id="" cols="30" rows="3" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- End numéro téléphone élève -->
                                    <!--Start Quartier -->
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Conseil Demandeur
                                                 <span class="required"></span>
                                            </label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                    <input type="text" class="form-control input-height"
                                                        name="conseil_1" placeholder="Veuillez saisir le conseil du demandeur" value="{{ old('conseil_1') }}">
                                                </div>
                                            </div>
                                        </div>
                                    <!-- End Quartier -->
                                    <!--Start Quartier -->
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Contact Demandeur
                                             <span class="required"></span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </span>
                                                <input type="text" class="form-control input-height"
                                                    name="contact_1" placeholder="Veuillez saisir le contact du demandeur" value="{{ old('contact_1') }}">
                                            </div>
                                        </div>
                                    </div>
                                <!-- End Quartier -->
                                </div>
                            </fieldset>
                            <h3>Etape 3/3</h3>
                            <fieldset>
                                <div class="col-lg-12 p-t-20">
                                    <!-- Start numéro téléphone élève -->
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Defendeur
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <textarea class="form-control" name="defendeur" id="" cols="30" rows="3" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- End numéro téléphone élève -->
                                    <!--Start Quartier -->
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Conseil Defendeur
                                                 <span class="required"></span>
                                            </label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                    <input type="text" class="form-control input-height"
                                                        name="conseil_2" placeholder="Veuillez saisir le conseil du defendeur" value="{{ old('conseil_2') }}">
                                                </div>
                                            </div>
                                        </div>
                                    <!-- End Quartier -->
                                    <!--Start Quartier -->
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Contact Defendeur
                                             <span class="required"></span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </span>
                                                <input type="text" class="form-control input-height"
                                                    name="contact_2" placeholder="Veuillez saisir le contact du defendeur" value="{{ old('contact_2') }}">
                                            </div>
                                        </div>
                                    </div>
                                <!-- End Quartier -->
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

