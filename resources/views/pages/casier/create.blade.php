{{-- on herite du chemin du theme actif --}}
@extends('layouts.themes._light_theme')
@section('content')
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Casier Judiciare</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                        href="{{ route('home') }}">Accueil</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li><a class="parent-item" href="#">Casier</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Casier Judiciare</li>
            </ol>
        </div>
    </div>
    <a href="{{ route('casier_judiciare.index') }}" class="btn btn-primary"><i class="fa fa-reply"></i> Retour </a>
    <br><br>
    <div class="row">
        <div class="col-sm-12 col-12 col-md-12 col-lg-12">
            <div class="card-box">
                <div class="card-head">
                    <header>Casier Judiciare</header>
                </div>
                <div class="card-body ">
                    <form id="example-advanced-form" method="POST" action="{{ route('casier_judiciare.store') }}" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{-- l'année d'inscription --}}
                            {{-- <input type="hidden" name="annee_id" value="{{ $id_annee }}"> --}}
                            <input type="hidden" name="status" value="0">
                        <h3>Etape 1/3</h3>
                        <fieldset>
                            <div class="col-lg-12 p-t-20">
                                <!-- Start nom de l'élève -->
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Concerne
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <input type="text" name="concerne" minlength="2" placeholder="Veuillez saisir le nom du concerne"
                                                    class="form-control input-height" value="{{ old('concerne') }}" required />
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
                                <!-- End nom de l'élève -->
                            </div>
                        </fieldset>
                        <h3>Etape 2/3</h3>
                        <fieldset>
                            <div class="col-lg-12 p-t-20">
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
                            <div class="form-group row">
                                <label class="control-label col-md-3">Etat Civil de famille
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <select class="form-control input-height" name="etat_civil" required>
                                            <option value="">Selectionner...</option>
                                            <option value="Marié(e)">Marié(e)</option>
                                            <option value="Célibataire">Célibataire</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 p-t-20">
                                <div class="form-group row">
                                    <label class="control-label col-md-3"> Profession
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="text" name="profession"  placeholder="Veuillez saisir la profession"
                                                class="form-control input-height" value="{{ old('profession') }}" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 p-t-20">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Nationalité
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="text" name="nationalite"  placeholder="Veuillez saisir la nationalite"
                                                class="form-control input-height" value="{{ old('nationalite') }}" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <h3>Etape 2/3</h3>
                        <fieldset>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Copie
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <select class="form-control input-height" name="copie" required>
                                            <option value="">Selectionner...</option>
                                            <option value="de l'acte de naissance">L'acte de Naissance</option>
                                            <option value="de la pièce d'identité">Pièce d'identité</option>
                                            <option value="du passeport">Passport</option>
                                            <option value="jugement supplétif">Jugement supplétif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Numéro de la copie
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <input type="text" name="num_copie"  placeholder="Veuillez saisir le numéro de la copie"
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
                                        <input type="date" name="date_copie"  placeholder="Veuillez saisir la date de la copie"
                                            class="form-control input-height" value="{{ old('date_copie') }}" required />
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

</script>

