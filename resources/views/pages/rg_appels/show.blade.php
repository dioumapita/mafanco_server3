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
 <a href="{{ route('rg_appel.index') }}" class="btn btn-primary"><i class="fa fa-reply"></i> Retour</a>
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
                        <b>N° :</b> {{ $appel->num }}
                    </li>
                    <li class="list-group-item">
                        <b>Date appel :</b> {{ $appel->date_appel->format('d/m/Y') }}
                    </li>
                    <li class="list-group-item">
                        <b>Appelant:</b> {{ $appel->appelant }}
                    </li>
                    <li class="list-group-item">
                        <b>Defendeur:</b> {{ $appel->defendeur }}
                    </li>
                    <li class="list-group-item">
                        <b>Etat:</b> {{ $appel->etat }}
                    </li>
                    <li class="list-group-item">
                        <b>Date Transmission:</b>
                        @if($appel->date_transmition != null)
                            {{ $appel->date_transmition->format('d/m/Y') }}
                        @else

                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
<!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div>
                    <div class="card">
                        <div class="card-head card-topline-aqua">
                            <header>Détail d'un appel </header>
                        </div>
                        <div class="white-box">
                            {{-- <a href="{{ route('dossier_affaire_civil.edit',$dossier->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Modifier</a> --}}
                            @if($appel->etat == 'Non Transmit')
                                <button class="btn btn-primary" data-toggle="modal" data-target="#send_appel">Transmettre l'appel
                                    <i class="fa fa-paper-plane"></i>
                                </button>
                                <!-- debut modal -->
                                    <div class="modal fade" data-backdrop="static" id="send_appel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div  class="modal-header btn btn-danger text-center text-white">
                                                    <h4 class="modal-title white-text w-100 font-weight-bold py-2">Transmettre l'appel</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true" class="white-text">&times;</span>
                                                    </button>
                                                </div>
                                                <!-- start modal body -->
                                                    <div class="modal-body">
                                                            <form action="{{ route('send_appel',$appel->id) }}" method="post" enctype="multipart/form-data">
                                                                {{ csrf_field() }}
                                                                {{  method_field('PUT') }}
                                                                <br>
                                                                <div class="form-group">
                                                                    <label for="date_transmition">Date Transmission *</label>
                                                                    <input type="date"
                                                                        class="form-control" name="date_transmition" id="date_transmition" value="{{ old('date_transmition') }}"  required>
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
                                @else
                                    <a href="#myModaldelete" data-toggle="modal" onclick="revokeData({{ $appel->id }})"
                                        class="btn btn-primary">
                                         Annuler la transmission <i class="fa fa-close"></i>
                                    </a>
                                    <div id="myModaldelete" class="mt-5 modal fade" data-backdrop="static">
                                        <div class="mt-5 modal-dialog modal-confirm">
                                            <div class="modal-content">
                                                <div class="modal-header flex-column">
                                                    <div class="icon-box">
                                                        <i class="material-icons">&#xE5CD;</i>
                                                    </div>
                                                    <h4 class="modal-title w-100">Êtes-vous certain?</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>
                                                        Vous pouvez annuler al transmission
                                                    </p>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                    <form action="{{ route('revok_appel',$appel->id) }}" method="post" id="updateform">
                                                        {{ csrf_field() }}
                                                        {{ method_field('PUT') }}
                                                        <button  type="button" onclick = "formSubmitRevok()" class="btn btn-danger" data-dismiss="modal">
                                                            Oui Annuler
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <a href="#myModaldelete" data-toggle="modal" onclick="deleteData({{ $appel->id }})"
                                    class="btn btn-danger">
                                    <i class="fa fa-trash"></i> Supprimer l'appel
                                </a>
                                <div id="myModaldelete" class="mt-5 modal fade" data-backdrop="static">
                                    <div class="mt-5 modal-dialog modal-confirm">
                                        <div class="modal-content">
                                            <div class="modal-header flex-column">
                                                <div class="icon-box">
                                                    <i class="material-icons">&#xE5CD;</i>
                                                </div>
                                                <h4 class="modal-title w-100">Êtes-vous certain?</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    Vous pouvez restaurer vos données supprimer au niveau de la corbeille
                                                </p>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                <form action="{{ route('rg_appel.destroy',$appel->id) }}" method="post" id="deleteform">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button  type="button" onclick = "formSubmit()" class="btn btn-danger" data-dismiss="modal">
                                                        Oui Supprimer
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- fin modal -->
                            <br><br>
                            @if($appel->docAppels->count() > 0)
                                <iframe  src="/uploads/{{ $appel->docAppels->first()->chemin_doc }}" width="600" height="700" alt="pdf">
                                </iframe>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>

<script type="text/javascript">
    function deleteData(id)
        {
            var id = id;
            var url = '{{ route("rg_appel.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteform").attr('action', url);
        }
    function formSubmit()
        {
            // alert("bonjour");
            $("#deleteform").submit();
        }

    function revokeData(id)
        {
            var id = id;
            var url = '{{ route("revok_appel", ":id") }}';
            url = url.replace(':id', id);
            $("#updateform").attr('action', url);
        }
    function formSubmitRevok()
        {
            // alert("bonjour");
            $("#updateform").submit();
        }
</script>
@endsection

