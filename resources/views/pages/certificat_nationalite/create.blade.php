{{-- on herite du chemin du theme actif --}}
@extends('layouts.themes._light_theme')
    @section('content')
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Certificat de nationalité</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                            href="{{ route('home') }}">Accueil</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="#">Certificat</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Certificat de nationalité</li>
                </ol>
            </div>
        </div>
        <a href="{{ route('home') }}" class="btn btn-primary"><i class="fa fa-reply"></i> Retour </a>
        <br><br>
        <div class="row">
            <div class="col-sm-12 col-12 col-md-12 col-lg-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Certificat De Nationalité</header>
                    </div>
                    <div class="card-body ">
                        <form id="example-advanced-form" method="POST" action="{{ route('certificat_nationalite.store') }}" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{-- l'année d'inscription --}}
                             {{-- <input type="hidden" name="annee_id" value="{{ $id_annee }}"> --}}
                             <input type="hidden" name="status" value="0">
                            <h3>Etape 1/3</h3>
                            <fieldset>
                                <div class="col-lg-12 p-t-20">
                                    <!-- Start nom de l'élève -->
                                        {{-- <div class="form-group row">
                                            <label class="control-label col-md-3">N°
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <input type="integer" name="num"  placeholder="Veuillez saisir le numéro"
                                                        class="form-control input-height" value="{{ old('num') }}" required />
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Date de la demande
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <input type="date" name="date_demande"  placeholder="Veuillez saisir la date"
                                                        class="form-control input-height" value="{{ old('date_demande') }}" required />
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
                                    <div id="first_copie">
                                        <div class="info_copie">
                                            <div  id="copie_originale" class="form-group row">
                                                <label class="control-label col-md-3">Copie
                                                    <span class="required"></span>
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control input-height"
                                                            name="copie[]" placeholder="Veuillez entrer ou sélectionner une copie." list="copies" value="{{ old('copie') }}" required>
                                                            <datalist id="copies">
                                                                <option value="de l'acte de naissance">de l'acte de naissance</option>
                                                                <option value="de la pièce d'identité">de la pièce d'identité</option>
                                                                <option value="du passeport">du passeport</option>
                                                                <option value="du jugement suppletif">du jugement suppletif</option>
                                                            </datalist>
                                                    </div>
                                                </div>
                                            </div>
                                            <div   class="form-group row">
                                                <label class="control-label col-md-3">Numéro de la copie
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="input-group">
                                                        <input type="text" name="num_copie[]"  placeholder="Veuillez saisir le numéro de la copie"
                                                            class="form-control input-height" value="{{ old('num_copie') }}" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Date de la copie
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="input-group">
                                                        <input type="date" name="date_copie[]"  placeholder="Veuillez saisir la date de la copie"
                                                            class="form-control input-height" value="{{ old('date_copie') }}" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End nom de l'élève -->
                                    <div id="more_copie">

                                    </div>
                                    <button type="button" class="btn btn-primary" onclick="addCopie()"><i class="fa fa-plus"></i> Ajouter une copie </button>
                                    <button type="button" class="btn btn-danger" onclick="removeCopie()"><i class="fa fa-close"></i> Supprimer une copie </button>
                                </div>
                            </fieldset>
                            <h3>Etape 2/3</h3>
                            <fieldset>
                                <div class="col-lg-12 p-t-20">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Prénom et Nom
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <input type="text" name="prenom_nom" minlength="2" placeholder="Veuillez saisir le prénom et nom"
                                                    class="form-control input-height" value="{{ old('prenom_nom') }}" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Date de naissance
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <input type="date" name="date_naiss"  placeholder="Veuillez saisir la date de naissance"
                                                    class="form-control input-height" value="{{ old('date_naiss') }}" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Lieu
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <input type="text" name="lieu"  placeholder="Veuillez saisir le lieu de naissance"
                                                    class="form-control input-height" value="{{ old('lieu') }}" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Père
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <input type="text" name="pere"  placeholder="Veuillez saisir le nom du père"
                                                    class="form-control input-height" value="{{ old('pere') }}" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Mère
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <input type="text" name="mere"  placeholder="Veuillez saisir le nom de la mère"
                                                    class="form-control input-height" value="{{ old('mere') }}" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3"> Domicile
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <input type="text" name="domicile"  placeholder="Veuillez saisir le domicile"
                                                    class="form-control input-height" value="{{ old('domicile') }}" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <h3>Etape 3/3</h3>
                            <fieldset>
                                <div class="col-lg-12 p-t-20">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Profession
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <input type="text" name="profession"  placeholder="Veuillez saisir la profession"
                                                    class="form-control input-height" value="{{ old('profession') }}" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3"> Article
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <input type="text" name="article"  placeholder="Veuillez saisir l'article"
                                                    class="form-control input-height" value="{{ old('article') }}" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Signateur
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <select class="form-control input-height" name="signateur" required>
                                                    <option value="">Selectionner...</option>
                                                    @foreach ($all_signateurs as $signateur)
                                                      <option value="{{ $signateur->nom_signateur }}">{{ $signateur->nom_signateur }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3"> Fonction
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <select class="form-control input-height" name="fonction" required>
                                                    <option value="">Selectionner...</option>
                                                    <option value="Chef du Greffe">Chef du Greffe</option>
                                                    <option value="Greffier">Greffier</option>
                                                    <option value="President">President</option>
                                                    <option value="Presidente">Presidente</option>
                                                    <option value="JUGE">JUGE</option>
                                                    <option value="President de section">Président de section</option>
                                                    <option value="Presidente de section">Présidente de section</option>
                                                    <option value="President de section civile">Président de section civile</option>
                                                    <option value="Presidente de section civile">Présidente de section civile</option>
                                                    <option value="President de section correctionnelle">Président de section correctionnelle</option>
                                                    <option value="Presidente de section correctionnelle">Présidente de section correctionnelle</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3"> Status
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <select class="form-control input-height" name="type" required>
                                                    <option value="">Selectionner...</option>
                                                    <option value="Officiel">Officiel</option>
                                                    <option value="Interim">Interim</option>
                                                </select>
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
    function addCopie()
    {
        // alert("bonjour");
        $('#first_copie .info_copie').clone().find('input').val('').end().appendTo('#more_copie');
    }
    function removeCopie()
    {
        $('#more_copie .info_copie').last().remove();
    }
</script>

