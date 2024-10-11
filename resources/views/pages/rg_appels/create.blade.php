{{-- on herite du chemin du theme actif --}}
@extends('layouts.themes._light_theme')
    @section('content')
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Ajout d'un appel</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                            href="{{ route('home') }}">Accueil</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="#">Appel</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Ajout d'un appel</li>
                </ol>
            </div>
        </div>
        <a href="{{ route('rg_appel.index') }}" class="btn btn-primary"><i class="fa fa-reply"></i> Retour </a>
        <br><br>
        <div class="row">
            <div class="col-sm-12 col-12 col-md-12 col-lg-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Ajout d'un appel</header>
                    </div>
                    <div class="card-body ">
                        <form id="example-advanced-form" method="POST" action="{{ route('rg_appel.store') }}" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="status" value="0">
                            <h3>Etape 1/3</h3>
                            <fieldset>
                                <div class="col-lg-12 p-t-20">
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">N°
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <input type="text" name="num" placeholder="Veuillez saisir le numéro"
                                                        class="form-control input-height" value="{{ old('num') }}" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Date appel
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <input type="date" name="date_appel" placeholder="Veuillez saisir la date"
                                                        class="form-control input-height" value="{{ old('date_appel') }}" required />
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </fieldset>
                            <h3>Etape 2/3</h3>
                            <fieldset>
                                <div class="col-lg-12 p-t-20">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Appelant
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <textarea class="form-control" name="appelant" id="appelant" cols="30" rows="3" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Contact
                                             <span class="required"></span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </span>
                                                <input type="number" class="form-control input-height"
                                                    name="contact_1" placeholder="Veuillez saisir le contact" value="{{ old('contact_1') }}">
                                            </div>
                                        </div>
                                    </div>
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
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Contact
                                             <span class="required"></span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </span>
                                                <input type="number" class="form-control input-height"
                                                    name="contact_2" placeholder="Veuillez saisir le contact" value="{{ old('contact_2') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <h3>Etape 3/3</h3>
                            <fieldset>
                                <div class="col-lg-12 p-t-20">
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Juge
                                                <span class="required"></span>
                                            </label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <input type="text" class="form-control input-height"
                                                        name="juge" placeholder="Veuillez entrer ou sélectionner votre juge." list="juges" value="{{ old('juge') }}" required>
                                                        <datalist id="juges">
                                                            <option value="Mamadou KABA">Mamadou KABA</option>
                                                            <option value="Ousmane SIMAKAN">Ousmane SIMAKAN</option>
                                                            <option value="Hawa MILLIMOUNO">Hawa MILLIMOUNO</option>
                                                            <option value="Mohamed KEITA">Mohamed KEITA</option>
                                                            <option value="Hadja Sayon TRAORE">Hadja Sayon TRAORE</option>
                                                            <option value="Damba OULARE">Damba OULARE</option>
                                                            <option value="Sacko CONDE">Sacko CONDE</option>
                                                            <option value="Cathérine TOUNKARA">Cathérine TOUNKARA</option>
                                                            <option value="Aboubacar KOUROUMA">Aboubacar KOUROUMA</option>
                                                        </datalist>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Etat
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <select class="form-control input-height" name="etat" required>
                                                        <option value="">Selectionner...</option>
                                                        <option value="Transmit">Transmit</option>
                                                        <option value="Non Transmit">Non Transmit</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Date Transmition
                                                <span class="required"></span>
                                            </label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <input type="date" name="date_transmition" placeholder="Veuillez saisir la date"
                                                        class="form-control input-height" value="{{ old('date_transmition') }}"/>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </fieldset>
                            <h3>Etape 3/3</h3>
                            <fieldset>
                                <div class="col-lg-12 p-t-20">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Joindre un document
                                            <span class="required"></span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <input type="file" name="doc_appel" placeholder="Veuillez joindre un document"
                                                    class="form-control input-height" value="{{ old('doc_appel') }}"/>
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

