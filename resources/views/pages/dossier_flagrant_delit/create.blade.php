{{-- on herite du chemin du theme actif --}}
@extends('layouts.themes._light_theme')
    @section('content')
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Dossier Flagrant Delit</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                            href="{{ route('home') }}">Accueil</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="#">Dossier</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Dossier Flagrant Delit</li>
                </ol>
            </div>
        </div>
        <a href="{{ route('home') }}" class="btn btn-primary"><i class="fa fa-reply"></i> Retour </a>
        <br><br>
        <div class="row">
            <div class="col-sm-12 col-12 col-md-12 col-lg-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Création d'un dossier: Flagrant Delit</header>
                    </div>
                    <div class="card-body ">
                        <form id="example-advanced-form" method="POST" action="{{ route('dossier_flagrant_delit.store') }}" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{-- l'année d'inscription --}}
                             {{-- <input type="hidden" name="annee_id" value="{{ $id_annee }}"> --}}
                             <input type="hidden" name="status" value="0">
                            <h3>Etape 1/3</h3>
                            <fieldset>
                                <div class="col-lg-12 p-t-20">
                                    <!-- Start nom de l'élève -->
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">N° RP
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <input type="text" name="num_rp" minlength="2" placeholder="Veuillez saisir le numéro RP"
                                                        class="form-control input-height" value="{{ old('num_rp') }}" required />
                                                </div>
                                            </div>
                                        </div>
                                    <!-- End nom de l'élève -->
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Procureur de la réplublique contre
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <textarea class="form-control" name="pr_contre" id="" cols="30" rows="4" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Detention
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <input type="text" name="detention" minlength="2" placeholder="Veuillez saisir la detention"
                                                        class="form-control input-height" value="{{ old('detention') }}" required />
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </fieldset>
                            <h3>Etape 2/3</h3>
                            <fieldset>
                                <div class="col-lg-12 p-t-20">
                                    <!--Start Quartier -->
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Conseil
                                                 <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                    <input type="text" class="form-control input-height"
                                                        name="conseil" placeholder="Veuillez saisir le conseil" value="{{ old('conseil') }}">
                                                </div>
                                            </div>
                                        </div>
                                    <!-- End Quartier -->
                                    <!--Start Quartier -->
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Contact
                                             <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </span>
                                                <input type="text" class="form-control input-height"
                                                    name="contact" placeholder="Veuillez saisir le contact" value="{{ old('contact') }}">
                                            </div>
                                        </div>
                                    </div>
                                <!-- End Quartier -->
                                </div>
                            </fieldset>
                            <h3>Etape 3/3</h3>
                            <fieldset>
                                <div class="col-lg-12 p-t-20">
                                    <!--Start Quartier -->
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Prévention
                                                 <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                    <input type="text" class="form-control input-height"
                                                        name="prevention" placeholder="Veuillez saisir la prévention" value="{{ old('prevention') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- End Quartier -->
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Plaignant ou victime
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                    <input type="text" class="form-control input-height"
                                                        name="plaignant" placeholder="Veuillez saisir le plaignant ou la victime" value="{{ old('plaignant') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

