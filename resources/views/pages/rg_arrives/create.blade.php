{{-- on herite du chemin du theme actif --}}
@extends('layouts.themes._light_theme')
    @section('content')
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Ajout d'un arrivé</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                            href="{{ route('home') }}">Accueil</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="#">RG Arrivé</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Ajout d'un arrivé</li>
                </ol>
            </div>
        </div>
        <a href="{{ route('rg_arrive.index') }}" class="btn btn-primary"><i class="fa fa-reply"></i> Retour </a>
        <br><br>
        <div class="row">
            <div class="col-sm-12 col-12 col-md-12 col-lg-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Ajout d'un arrivé</header>
                    </div>
                    <div class="card-body ">
                        <form id="example-advanced-form" method="POST" action="{{ route('rg_arrive.store') }}" class="form-horizontal" enctype="multipart/form-data">
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
                                            <label class="control-label col-md-3">Date
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <input type="date" name="date_ajout" placeholder="Veuillez saisir la date"
                                                        class="form-control input-height" value="{{ old('date_ajout') }}" required />
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </fieldset>
                            <h3>Etape 2/3</h3>
                            <fieldset>
                                <div class="col-lg-12 p-t-20">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Origine
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <textarea class="form-control" name="origine" id="origine" cols="30" rows="3" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Objet
                                             <span class="required">*</span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <input type="text" class="form-control input-height"
                                                    name="objet" placeholder="Veuillez saisir l'objet" value="{{ old('objet') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Description
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <textarea class="form-control" name="description" cols="30" rows="3" required></textarea>
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
                                                <input type="file" name="doc_arrive" placeholder="Veuillez joindre un document"
                                                    class="form-control input-height" value="{{ old('doc_arrive') }}"/>
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

