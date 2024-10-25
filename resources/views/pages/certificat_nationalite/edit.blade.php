{{-- on herite du chemin du theme actif --}}
@extends('layouts.themes._light_theme')
    @section('content')
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Modification D'un Certificat de nationalité</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                            href="{{ route('home') }}">Accueil</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="#">Certificat</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Modification D'un Certificat de nationalité</li>
                </ol>
            </div>
        </div>
        <a href="{{ route('home') }}" class="btn btn-primary"><i class="fa fa-reply"></i> Retour </a>
        <br><br>
        <div class="row">
            <div class="col-sm-12 col-12 col-md-12 col-lg-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Modification D'un Certificat De Nationalité</header>
                    </div>
                    <div class="card-body ">
                        <form id="example-advanced-form" method="POST" action="{{ route('certificat_nationalite.update',$certificat->id) }}" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            {{-- l'année d'inscription --}}
                             {{-- <input type="hidden" name="annee_id" value="{{ $id_annee }}"> --}}
                             <input type="hidden" name="status" value="0">
                            <h3>Etape 1/2</h3>
                            <fieldset>
                                <div class="col-lg-12 p-t-20">
                                    <!-- Start nom de l'élève -->
                                        <!-- <div class="form-group row">
                                            <label class="control-label col-md-3">N°
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <input type="integer" name="num"  placeholder="Veuillez saisir le numéro"
                                                        class="form-control input-height" value="{{ $certificat->num }}" required />
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Date de la demande
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <input type="date" name="date_demande"  placeholder="Veuillez saisir la date"
                                                        class="form-control input-height" value="{{ $certificat->date_demande->format('Y-m-d')}}" required />
                                                </div>
                                            </div>
                                        </div>
                                    <!-- End nom de l'élève -->
                                </div>
                            </fieldset>
                            <h3>Etape 2/2</h3>
                            <fieldset>
                                <div class="col-lg-12 p-t-20">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Prénom et Nom
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <input type="text" name="prenom_nom" minlength="2" placeholder="Veuillez saisir le prénom et nom"
                                                    class="form-control input-height" value="{{ $certificat->prenom_nom }}" required />
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
                                                    class="form-control input-height" value="{{ $certificat->date_naiss->format('Y-m-d') }}" required />
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
                                                    class="form-control input-height" value="{{ $certificat->lieu }}" required />
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
                                                    class="form-control input-height" value="{{ $certificat->pere }}" required />
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
                                                    class="form-control input-height" value="{{ $certificat->mere }}" required />
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
                                                    class="form-control input-height" value="{{ $certificat->domicile }}" required />
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
                                                    class="form-control input-height" value="{{ $certificat->profession }}" required />
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
                                                    class="form-control input-height" value="{{ $certificat->article }}" required />
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
                                                        <option @if($certificat->signateur == $signateur->nom_signateur) selected @endif value="{{ $signateur->nom_signateur }}">{{ $signateur->nom_signateur }}</option>
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
                                                    <option value="Chef du Greffe" @if($certificat->fonction == 'Chef du Greffe') selected @endif>Chef du Greffe</option>
                                                    <option value="Greffier" @if($certificat->fonction == 'Greffier') selected @endif>Greffier</option>
                                                    <option value="President" @if($certificat->fonction == 'President') selected @endif>President</option>
                                                    <option value="Presidente" @if($certificat->fonction == 'Presidente') selected @endif>Presidente</option>
                                                    <option value="JUGE" @if($certificat->fonction == 'JUGE') selected @endif>JUGE</option>
                                                    <option value="President de section" @if($certificat->fonction == 'President de section') selected @endif>Président de section</option>
                                                    <option value="Presidente de section" @if($certificat->fonction == 'Presidente de section') selected @endif>Présidente de section</option>
                                                    <option value="President de section civile" @if($certificat->fonction == 'President de section civile') selected @endif>Président de section civile</option>
                                                    <option value="Presidente de section civile" @if($certificat->fonction == 'Presidente de section civile') selected @endif>Présidente de section civile</option>
                                                    <option value="President de section correctionnelle" @if($certificat->fonction == 'President de section correctionnelle') selected @endif>Président de section correctionnelle</option>
                                                    <option value="Presidente de section correctionnelle" @if($certificat->fonction == 'Presidente de section correctionnelle') selected @endif>Présidente de section correctionnelle</option>
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
                                                    <option value="Officiel" @if($certificat->type == 'Officiel') selected @endif>Officiel</option>
                                                    <option value="Interim" @if($certificat->type == 'Interim') selected @endif>Interim</option>
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

