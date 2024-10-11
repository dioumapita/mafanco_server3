{{-- on herite du chemin du theme actif --}}
@extends('layouts.themes._light_theme')
    @section('content')
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Ajouter une plainte</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                            href="{{ route('home') }}">Accueil</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="#">Plainte</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Ajouter une plainte</li>
                </ol>
            </div>
        </div>
        <a href="{{ route('rg_plainte.index') }}" class="btn btn-primary"><i class="fa fa-reply"></i> Retour </a>
        <br><br>
        <div class="row">
            <div class="col-sm-12 col-12 col-md-12 col-lg-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Ajouter une plainte</header>
                    </div>
                    <div class="card-body ">
                        <form id="example-advanced-form" method="POST" action="{{ route('rg_plainte.store') }}" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <h3>Etape 1/3</h3>
                            <fieldset>
                                <div class="col-lg-12 p-t-20">
                                    <!-- Start nom de l'élève -->
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">N°
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <input type="integer" name="num"  placeholder="Veuillez saisir le numéro"
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
                                                    <input type="date" name="date_plainte"  placeholder="Veuillez saisir la date"
                                                        class="form-control input-height" value="{{ old('date_plainte') }}" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Origine
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <input type="text" name="origine"  placeholder="Veuillez saisir la date"
                                                        class="form-control input-height" value="{{ old('origine') }}" required />
                                                </div>
                                            </div>
                                        </div>
                                    <!-- End nom de l'élève -->
                                </div>
                            </fieldset>
                            <h3>Etape 1/3</h3>
                            <fieldset>
                                <div class="col-lg-12 p-t-20">
                                    <!-- Start nom de l'élève -->
                                    <div id="first_accuse">
                                        <div class="info_accuse">
                                            <div  class="form-group row">
                                                <label class="control-label col-md-3">Prénom et nom
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="input-group">
                                                        <input type="text" name="prenom_nom[]" id="prenom_nom"  placeholder="Veuillez saisir le prénom et nom"
                                                            class="form-control input-height" value="{{ old('prenom_nom') }}" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div  class="form-group row">
                                                <label class="control-label col-md-3">Date de naissance
                                                    <span class="required"></span>
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="input-group">
                                                        <input type="date" name="date_naiss[]"  placeholder="Veuillez saisir la date de naissance"
                                                            class="form-control input-height" value="{{ old('date_naiss') }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div  class="form-group row">
                                                <label class="control-label col-md-3">Lieu de naissance
                                                    <span class="required"></span>
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="input-group">
                                                        <input type="text" name="lieu_naiss[]"  placeholder="Veuillez saisir le lieu de naissance"
                                                            class="form-control input-height" value="{{ old('lieu_naiss') }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div  class="form-group row">
                                                <label class="control-label col-md-3">Père
                                                    <span class="required"></span>
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="input-group">
                                                        <input type="text" name="pere[]"  placeholder="Veuillez saisir le nom du père"
                                                            class="form-control input-height" value="{{ old('pere') }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div  class="form-group row">
                                                <label class="control-label col-md-3">Mère
                                                    <span class="required"></span>
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="input-group">
                                                        <input type="text" name="mere[]"  placeholder="Veuillez saisir le nom de la mère"
                                                            class="form-control input-height" value="{{ old('mere') }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Domicile
                                                    <span class="required"></span>
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="input-group">
                                                        <input type="text" name="domicile[]"  placeholder="Veuillez saisir le domicile"
                                                            class="form-control input-height" value="{{ old('domicile') }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End nom de l'élève -->
                                    <div id="more_accuse">

                                    </div>
                                    <button type="button" class="btn btn-primary" onclick="addAccuse()"><i class="fa fa-plus"></i> Ajouter</button>
                                    <button type="button" class="btn btn-danger" onclick="removeAccuse()"><i class="fa fa-close"></i> Supprimer</button>
                                </div>
                            </fieldset>
                            <h3>Etape 2/3</h3>
                            <fieldset>
                                <div class="col-lg-12 p-t-20">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Infraction
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <textarea class="form-control" name="infraction" id="infraction" cols="30" rows="3" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Partie Civil
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <textarea class="form-control" name="partie_civil" id="partie_civil" cols="30" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <h3>Etape 3/3</h3>
                            <fieldset>
                                <div class="col-lg-12 p-t-20">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Orientation
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <select class="form-control input-height" name="orientation">
                                                    <option value="">Selectionner...</option>
                                                    <option value="CD">CD</option>
                                                    <option value="FD">FD</option>
                                                    <option value="CSS">CSS</option>
                                                    <option value="INFORMATION">INFORMATION</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Joindre un document
                                            <span class="required"></span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <input type="file" name="doc_plainte" placeholder="Veuillez joindre un document"
                                                    class="form-control input-height" value="{{ old('doc_plainte') }}" />
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
<script>
    function addAccuse()
    {

        $('#first_accuse .info_accuse').clone().find('input').val('').end().appendTo('#more_accuse');

    }
    function removeAccuse()
    {
        $('#more_accuse .info_accuse').last().remove();
    }

</script>
