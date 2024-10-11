{{-- on herite du chemin du theme actif --}}
@extends('layouts.themes._light_theme')
    @section('content')
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Ajouter une instruction</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                            href="{{ route('home') }}">Accueil</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="#">Instruction</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Ajouter une instruction</li>
                </ol>
            </div>
        </div>
        <a href="{{ route('rg_instruction.index') }}" class="btn btn-primary"><i class="fa fa-reply"></i> Retour </a>
        <br><br>
        <div class="row">
            <div class="col-sm-12 col-12 col-md-12 col-lg-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Ajouter une instruction</header>
                    </div>
                    <div class="card-body ">
                        <form id="example-advanced-form" method="POST" action="{{ route('rg_instruction.store') }}" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <h3>Numéro RP / RI</h3>
                            <fieldset>
                                <div class="col-lg-12 p-t-20">
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">N° RP
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <input type="integer" name="num_rp"  placeholder="Veuillez saisir le numéro rp"
                                                        class="form-control input-height" value="{{ old('num_rp') }}" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">N° RI
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <input type="integer" name="num_ri"  placeholder="Veuillez saisir le numéro ri"
                                                        class="form-control input-height" value="{{ old('num_ri') }}" required />
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </fieldset>
                            <h3>Inculpés</h3>
                            <fieldset>
                                <div class="col-lg-12 p-t-20">
                                    <div id="first_inculpe">
                                        <div class="info_inculpe">
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
                                    <div id="more_inculpe">

                                    </div>
                                    <button type="button" class="btn btn-primary" onclick="addInculpe()"><i class="fa fa-plus"></i> Ajouter</button>
                                    <button type="button" class="btn btn-danger" onclick="removeInculpe()"><i class="fa fa-close"></i> Supprimer</button>
                                </div>
                            </fieldset>
                            <h3>Faits</h3>
                            <fieldset>
                                <div class="col-lg-12 p-t-20">
                                    <div id="first_faits">
                                        <div class="info_faits">
                                            <div  class="form-group row">
                                                <label class="control-label col-md-3">Date
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="input-group">
                                                        <input type="date" name="date_faits[]" id="date_faites"  placeholder="Veuillez choisir la date"
                                                            class="form-control input-height" value="{{ old('date_faits') }}" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Nature des faits
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="input-group">
                                                        <textarea class="form-control" name="nature_faits[]" id="nature_faits[]" cols="30" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="more_faits">

                                    </div>
                                    <button type="button" class="btn btn-primary" onclick="addFaits()"><i class="fa fa-plus"></i> Ajouter</button>
                                    <button type="button" class="btn btn-danger" onclick="removeFaits()"><i class="fa fa-close"></i> Supprimer</button>
                                </div>
                            </fieldset>
                            <h3>Actes</h3>
                            <fieldset>
                                <div class="col-lg-12 p-t-20">
                                    <div id="first_actes">
                                        <div class="info_actes">
                                            <div  class="form-group row">
                                                <label class="control-label col-md-3">Date
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="input-group">
                                                        <input type="date" name="date_actes[]" id="date_actes"  placeholder="Veuillez choisir la date"
                                                            class="form-control input-height" value="{{ old('date_actes') }}" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Nature des actes
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="input-group">
                                                        <textarea class="form-control" name="nature_actes[]" id="nature_actes[]" cols="30" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="more_actes">

                                    </div>
                                    <button type="button" class="btn btn-primary" onclick="addActes()"><i class="fa fa-plus"></i> Ajouter</button>
                                    <button type="button" class="btn btn-danger" onclick="removeActes()"><i class="fa fa-close"></i> Supprimer</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
<script>
    function addInculpe()
    {

        $('#first_inculpe .info_inculpe').clone().find('input').val('').end().appendTo('#more_inculpe');

    }
    function removeInculpe()
    {
        $('#more_inculpe .info_inculpe').last().remove();
    }

    function addFaits()
    {

        $('#first_faits .info_faits').clone().find('input').val('').end().appendTo('#more_faits');

    }
    function removeFaits()
    {
        $('#more_faits .info_faits').last().remove();
    }

    function addActes()
    {

        $('#first_actes .info_actes').clone().find('input').val('').end().appendTo('#more_actes');

    }
    function removeActes()
    {
        $('#more_actes .info_actes').last().remove();
    }

</script>
