@extends('layouts.themes._light_theme')
@section('content')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Détail d'un héredite</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="{{ route('home') }}">Accueil</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li><a class="parent-item" href="#">Heredite</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Détail d'un héredite</li>
        </ol>
    </div>
</div>
 <a href="{{ route('liste_heredite') }}" class="btn btn-primary"><i class="fa fa-reply"></i> Retour</a>
<div id="media_screen" class="row">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
    <div class="profile-sidebar">
        <div class="card">
            <div class="card-head card-topline-aqua">
                <header> Informations d'un héredite</header>
            </div>
            <div class="card-body no-padding height-9">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>N° :</b> {{ $heredite->numero }}
                    </li>
                    <li class="list-group-item">
                        <b>Date:</b> {{ $heredite->date }}
                    </li>
                    <li class="list-group-item">
                        <b>Affaire:</b> {{ $heredite->affaire }}
                    </li>
                    <li class="list-group-item">
                        <b>Objet:</b> {{ $heredite->objet }}
                    </li>
                </ul>
                <div class="text-center">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#update">Modifier
                        <i class="fa fa-edit"></i>
                    </button>
                </div>
                <!-- debut modal -->
                    <div class="modal fade" data-backdrop="static" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div  class="modal-header btn btn-danger text-center text-white">
                                    <h4 class="modal-title white-text w-100 font-weight-bold py-2">Modification d'un heredité</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="white-text">&times;</span>
                                    </button>
                                </div>
                                <!-- start modal body -->
                                    <div class="modal-body">
                                            <form action="{{ route('heredite.update',$heredite->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}
                                                <div class="form-group">
                                                    <label for="numero">Numéro *</label>
                                                    <input type="number"
                                                        class="form-control" name="numero" id="numero" value="{{ $heredite->numero }}"  required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="date_heredite">Date heredité*</label>
                                                    <input type="text"
                                                        class="form-control" name="date_heredite" id="date_heredite" value="{{ $heredite->date }}"  required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="affaire">Affaire *</label>
                                                    <textarea class="form-control" name="affaire" id="affaire" cols="30" rows="4" required>{{ $heredite->affaire }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="objet">Objet*</label>
                                                    <input type="text"
                                                        class="form-control" name="objet" id="objet" value="{{ $heredite->objet }}">
                                                </div>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-primary">Valider<i class="fa fa-check"> </i></button>
                                                    <button class="btn btn-danger" data-dismiss="modal">Annuler <i class="fa fa-times"></i></button>
                                                </div>
                                            </form>
                                    </div>
                                <!-- end modal body -->
                            </div>
                        </div>
                    </div>
                <!-- fin modal -->
            </div>
        </div>
    </div>
<!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div>
                    <div class="card">
                        <div class="card-head card-topline-aqua">
                            <header>Document </header>
                        </div>
                        <div class="white-box">
                            <!-- fin modal -->
                            <br><br>
                            {{-- @if($appel->docAppels->count() > 0) --}}
                                <iframe  src="/uploads/documents/doc_heredite/{{ $heredite->id.'.pdf' }}" width="600" height="700" alt="pdf">
                                </iframe>
                        </div>
                    </div>
                </div>
            </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>
@endsection

