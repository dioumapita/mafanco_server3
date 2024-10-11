@extends('layouts.themes._light_theme')
@section('content')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Détail d'un appel</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="{{ route('home') }}">Accueil</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li><a class="parent-item" href="#">Appel</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Détail d'un appel</li>
        </ol>
    </div>
</div>
 <a href="{{ route('liste_appel') }}" class="btn btn-primary"><i class="fa fa-reply"></i> Retour</a>
<div id="media_screen" class="row">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
    <div class="profile-sidebar">
        <div class="card">
            <div class="card-head card-topline-aqua">
                <header> Informations d'un appel</header>
            </div>
            <div class="card-body no-padding height-9">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>N° :</b> {{ $appel->numero }}
                    </li>
                    <li class="list-group-item">
                        <b>Date appel :</b> {{ $appel->date_appel }}
                    </li>
                    <li class="list-group-item">
                        <b>Les parties:</b> {{ $appel->les_parties }}
                    </li>
                    <li class="list-group-item">
                        <b>Type:</b> {{ $appel->type }}
                    </li>
                    <li class="list-group-item">
                        <b>Date Transmission:</b> {{ $appel->date_transmission }}
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
                                    <h4 class="modal-title white-text w-100 font-weight-bold py-2">Modification d'un appel</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="white-text">&times;</span>
                                    </button>
                                </div>
                                <!-- start modal body -->
                                    <div class="modal-body">
                                            <form action="{{ route('appel.update',$appel->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}
                                                <div class="form-group">
                                                    <label for="numero">Numéro *</label>
                                                    <input type="number"
                                                        class="form-control" name="numero" id="numero" value="{{ $appel->numero }}"  required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="date_appel">Date appel*</label>
                                                    <input type="text"
                                                        class="form-control" name="date_appel" id="date_appel" value="{{ $appel->date_appel }}"  required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="les_parties">Les parties *</label>
                                                    <textarea class="form-control" name="les_parties" id="les_parties" cols="30" rows="4" required>{{ $appel->les_parties }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="type">Type</label>
                                                    <select class="form-control input-height" name="type" required>
                                                        <option value="">Selectionner...</option>
                                                        <option value="APPEL CIVIL" @if($appel->type == 'APPEL CIVIL') selected @endif>APPEL CIVIL</option>
                                                        <option value="APPEL CORRECTIONNEL" @if($appel->type == 'APPEL CORRECTIONNEL') selected @endif>APPEL CORRECTIONNEL</option>
                                                        <option value="TRANSMISSION" @if($appel->type == 'TRANSMISSION') selected @endif>TRANSMISSION</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="date_transmission">Date transmission*</label>
                                                    <input type="text"
                                                        class="form-control" name="date_transmission" id="date_transmission" value="{{ $appel->date_transmission }}">
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
                                <iframe  src="/uploads/documents/doc_appel/{{ $appel->id.'.pdf' }}" width="600" height="700" alt="pdf">
                                </iframe>
                        </div>
                    </div>
                </div>
            </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>
@endsection

