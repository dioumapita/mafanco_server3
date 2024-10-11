@extends('layouts.themes._light_theme')
@section('content')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Détail d'un arrivé</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="{{ route('home') }}">Accueil</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li><a class="parent-item" href="#">Arrivé</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Détail d'un arrivé</li>
        </ol>
    </div>
</div>
 <a href="{{ route('rg_arrive.index') }}" class="btn btn-primary"><i class="fa fa-reply"></i> Retour</a>
<div id="media_screen" class="row">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
    <div class="profile-sidebar">
        <div class="card">
            <div class="card-head card-topline-aqua">
                <header> Informations d'un arrivé</header>
            </div>
            <div class="card-body no-padding height-9">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>N° :</b> {{ $arrive->num }}
                    </li>
                    <li class="list-group-item">
                        <b>Date :</b> {{ $arrive->date_ajout->format('d/m/Y') }}
                    </li>
                    <li class="list-group-item">
                        <b>Origine:</b> {{ $arrive->origine }}
                    </li>
                    <li class="list-group-item">
                        <b>Objet:</b> {{ $arrive->objet }}
                    </li>
                    <li class="list-group-item">
                        <b>Description:</b> {{ $arrive->description }}
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
                            <header>Détail d'un arrivé </header>
                        </div>
                        <div class="white-box">
                            {{-- <a href="{{ route('dossier_affaire_civil.edit',$dossier->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Modifier</a> --}}
                                <a href="#myModaldelete" data-toggle="modal" onclick="deleteData({{ $arrive->id }})"
                                    class="btn btn-danger">
                                    <i class="fa fa-trash"></i> Supprimer l'arrivé
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
                                                <form action="{{ route('rg_arrive.destroy',$arrive->id) }}" method="post" id="deleteform">
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
                            @if($arrive->docrgArrives->count() > 0)
                                <iframe  src="/uploads/{{ $arrive->docrgArrives->first()->chemin_doc }}" width="600" height="700" alt="pdf">
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
            var url = '{{ route("rg_arrive.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteform").attr('action', url);
        }
    function formSubmit()
        {
            // alert("bonjour");
            $("#deleteform").submit();
        }
</script>
@endsection

