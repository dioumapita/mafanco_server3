{{-- on herite du chemin du theme actif --}}
@extends('layouts.themes._light_theme')
@section('content')
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Jugement suppletif urgent</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                        href="{{ route('home') }}">Accueil</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li><a class="parent-item" href="#">Jugment</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Jugement suppletif urgent</li>
            </ol>
        </div>
    </div>
    <a href="{{ route('jugement_suppletif.index') }}" class="btn btn-primary"><i class="fa fa-reply"></i> Retour </a>
    <br><br>
    <div class="row">
        <div class="col-sm-12 col-12 col-md-12 col-lg-12">
            <div class="card-box">
                <div class="card-head">
                    <header>Jugement suppletif urgent</header>
                </div>
                <div class="card-body ">
                    <form id="example-advanced-form" method="POST" action="{{ route('jugement_suppletif.store') }}" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{-- l'année d'inscription --}}
                            {{-- <input type="hidden" name="annee_id" value="{{ $id_annee }}"> --}}
                        <input type="hidden" name="status" value="1">
                        <h3>Etape 1/3</h3>
                        <fieldset>
                            <div class="col-lg-12 p-t-20">
                                <!-- Start nom de l'élève -->
                                    {{-- <div class="form-group row">
                                        <label class="control-label col-md-3">Numéro
                                            <span class="required"></span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <input type="text" name="num"  placeholder="Veuillez saisir le numéro"
                                                    class="form-control input-height" value="{{ old('num') }}" />
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Prénom et nom
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <input type="text" name="concerne"  placeholder="Veuillez saisir le concerne"
                                                    class="form-control input-height" value="{{ old('concerne') }}" required />
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
                                        <label class="control-label col-md-3">Lieu de naissance
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <input type="text" name="lieu_naiss"  placeholder="Veuillez saisir le lieu de naissance"
                                                    class="form-control input-height" value="{{ old('lieu_naiss') }}" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Sexe
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <select class="form-control input-height" name="sexe" required>
                                                    <option value="">Selectionner...</option>
                                                    <option value="Masculin">Masculin</option>
                                                    <option value="Feminin">Feminin</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Rang de naissance
                                            <span class="required"></span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <input type="number" name="rang_naiss"  placeholder="Veuillez saisir le rang de naissance"
                                                    class="form-control input-height" value="{{ old('rang_naiss') }}" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Lieu de transcription
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <select class="form-control input-height" name="lieu_transcrit" required>
                                                    <option value="">Selectionner...</option>
                                                    <option value="d'acte de naissance">Acte de naissance</option>
                                                    <option value="d'acte de résidence">Acte de résidence</option>
                                                </select>
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
                                    <label class="control-label col-md-3">Prénom et nom requérant(e)
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="text" name="requerant" minlength="2" placeholder="Veuillez saisir le nom prénom et nom"
                                                class="form-control input-height" value="{{ old('requerant') }}" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Sexe requérant(e)
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <select class="form-control input-height" name="sexe_requerant" required>
                                                <option value="">Selectionner...</option>
                                                <option value="Masculin">Masculin</option>
                                                <option value="Feminin">Feminin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Profession du requérant
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="text" name="profession_requerant"  placeholder="Veuillez saisir la profession"
                                                class="form-control input-height" value="{{ old('profession_requerant') }}" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Quartier du requérant
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="text" name="quartier_requerant"  placeholder="Veuillez saisir le quartier"
                                                class="form-control input-height" value="{{ old('quartier_requerant') }}" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Numéro de la requette
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="integer" name="num_requette"  placeholder="Veuillez saisir le numéro de la requêtte"
                                                class="form-control input-height" value="{{ old('num_requette') }}" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Date de la requête
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="date" name="date_requete"  placeholder="Veuillez saisir la date de la requête"
                                                class="form-control input-height" value="{{ old('date_requete') }}" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <h3>Etape 2/3</h3>
                        <fieldset>
                            <div class="col-lg-12 p-t-20">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Père
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="text" name="pere" minlength="2" placeholder="Veuillez saisir le nom du père"
                                                class="form-control input-height" value="{{ old('pere') }}" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Date de naissance du père
                                        <span class="required"> </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="date" name="date_naiss_pere"  placeholder="Veuillez saisir la date de naissance du père"
                                                class="form-control input-height" value="{{ old('date_naiss_pere') }}" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Lieu de naissance du père
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="text" name="lieu_naiss_pere"  placeholder="Veuillez saisir le lieu  de naissance du père"
                                                class="form-control input-height" value="{{ old('lieu_naiss_pere') }}" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Profession du père
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="text" name="profession_pere"  placeholder="Veuillez saisir la profession du père"
                                                class="form-control input-height" value="{{ old('profession_pere') }}" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Domicile du père
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="text" name="domicile_pere"  placeholder="Veuillez saisir le domicile du père"
                                                class="form-control input-height" value="{{ old('domicile_pere') }}" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <h3>Etape 3/3</h3>
                        <fieldset>
                            <div class="col-lg-12 p-t-20">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Mère
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="text" name="mere" minlength="2" placeholder="Veuillez saisir le nom de la mère"
                                                class="form-control input-height" value="{{ old('mere') }}" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Date de naissance de la mère
                                        <span class="required"></span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="date" name="date_naiss_mere"  placeholder="Veuillez saisir la date de naissance de la mère"
                                                class="form-control input-height" value="{{ old('date_naiss_mere') }}" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Lieu de naissance de la mère
                                        <span class="required"></span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="text" name="lieu_naiss_mere"  placeholder="Veuillez saisir le lieu  de naissance de la mère"
                                                class="form-control input-height" value="{{ old('lieu_naiss_mere') }}" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Profession de la mère
                                        <span class="required"></span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="text" name="profession_mere"  placeholder="Veuillez saisir la profession de la mère"
                                                class="form-control input-height" value="{{ old('profession_mere') }}" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Domicile de la mère
                                        <span class="required"></span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="text" name="domicile_mere"  placeholder="Veuillez saisir le domicile de la mère"
                                                class="form-control input-height" value="{{ old('domicile_pere') }}" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <h3>Etape 3/3</h3>
                        <fieldset>
                            <div class="col-lg-12 p-t-20">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Premier Témoin
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="text" name="premier_temoin" minlength="2" placeholder="Veuillez saisir le nom du premier temoin"
                                                class="form-control input-height" value="{{ old('premier_temoin') }}" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Date de naissance du premier témoin
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="date" name="date_naiss_premier_temoin"  placeholder="Veuillez saisir la date de naissance du premier témoin"
                                                class="form-control input-height" value="{{ old('date_naiss_premier_temoin') }}" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Lieu de naissance du premier témoin
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="text" name="lieu_naiss_premier_temoin"  placeholder="Veuillez saisir le lieu  de naissance du premier témoin"
                                                class="form-control input-height" value="{{ old('lieu_naiss_premier_temoin') }}" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Profession du premier témoin
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="text" name="profession_premier_temoin"  placeholder="Veuillez saisir la profession du premier témoin"
                                                class="form-control input-height" value="{{ old('profession_premier_temoin') }}" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Domicile du premier témoin
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="text" name="domicile_premier_temoin"  placeholder="Veuillez saisir le domicile du premier témoin"
                                                class="form-control input-height" value="{{ old('domicile_premier_temoin') }}" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Sexe du premier témoin
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <select class="form-control input-height" name="sexe_premier_temoin" required>
                                                <option value="">Selectionner...</option>
                                                <option value="Masculin">Masculin</option>
                                                <option value="Feminin">Feminin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <h3>Etape 3/3</h3>
                        <fieldset>
                            <div class="col-lg-12 p-t-20">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Deuxième Témoin
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="text" name="deuxieme_temoin" minlength="2" placeholder="Veuillez saisir le nom du deuxième temoin"
                                                class="form-control input-height" value="{{ old('deuxieme_temoin') }}" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Date de naissance du deuxième témoin
                                        <span class="required"></span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="date" name="date_naiss_deuxieme_temoin"  placeholder="Veuillez saisir la date de naissance du deuxieme témoin"
                                                class="form-control input-height" value="{{ old('date_naiss_deuxieme_temoin') }}" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Lieu de naissance du deuxième témoin
                                        <span class="required"></span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="text" name="lieu_naiss_deuxieme_temoin"  placeholder="Veuillez saisir le lieu  de naissance du deuxième témoin"
                                                class="form-control input-height" value="{{ old('lieu_naiss_deuxieme_temoin') }}" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Profession du deuxième témoin
                                        <span class="required"></span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="text" name="profession_deuxieme_temoin"  placeholder="Veuillez saisir la profession du deuxieme témoin"
                                                class="form-control input-height" value="{{ old('profession_deuxieme_temoin') }}" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Domicile du deuxième témoin
                                        <span class="required"></span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="text" name="domicile_deuxieme_temoin"  placeholder="Veuillez saisir le domicile du deuxième témoin"
                                                class="form-control input-height" value="{{ old('domicile_deuxieme_temoin') }}" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Sexe deuxieme témoin
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <select class="form-control input-height" name="sexe_deuxieme_temoin" required>
                                                <option value="">Selectionner...</option>
                                                <option value="Masculin">Masculin</option>
                                                <option value="Feminin">Feminin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <h3>Etape 3/3</h3>
                        <fieldset>
                            <div class="col-lg-12 p-t-20">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Date audience
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="date" name="date_audience"  placeholder="Veuillez saisir la date d'audience"
                                                class="form-control input-height" value="{{ old('date_audience') }}" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Etat civil
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="text" name="etat_civil"  placeholder="Veuillez saisir l'etat civil"
                                                class="form-control input-height" value="{{ old('etat_civil') }}" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Audience en présence de
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="text" name="en_presence"
                                                class="form-control input-height" value="{{ old('en_presence') }}" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Président
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <select class="form-control input-height" name="president" required>
                                                <option value="">Selectionner...</option>
                                                    @foreach ($all_signateurs as $signateur)
                                                        <option value="{{ $signateur->nom_signateur }}">{{ $signateur->nom_signateur }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Greffier
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <select class="form-control input-height" name="greffier" required>
                                                <option value="">Selectionner...</option>
                                                    @foreach ($all_signateurs as $signateur)
                                                      <option value="{{ $signateur->nom_signateur }}">{{ $signateur->nom_signateur }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Téléphone
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="tel" name="telephone"  placeholder="Veuillez saisir le numéro de téléphone"
                                                class="form-control input-height" value="{{ old('telephone') }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Rendez-vous
                                        <span class="required"></span>
                                    </label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="date" name="rendez_vous"  placeholder="Veuillez saisir la date"
                                                class="form-control input-height" value="{{ old('rendez_vous') }}"/>
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