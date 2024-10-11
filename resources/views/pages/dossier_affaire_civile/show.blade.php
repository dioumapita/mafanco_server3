@extends('layouts.themes._light_theme')
@section('content')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Détail d'un dossier</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="{{ route('home') }}">Accueil</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li><a class="parent-item" href="#">Dossier</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Détail d'un dossier</li>
        </ol>
    </div>
</div>
 <a href="{{ route('dossier_affaire_civil.index') }}" class="btn btn-primary"><i class="fa fa-reply"></i> Retour</a>
<div id="media_screen" class="row">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
    <div class="profile-sidebar">
        <div class="card">
            <div class="card-head card-topline-aqua">
                <header> Informations du dossier</header>
            </div>
            <div class="card-body no-padding height-9">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>N° RG:</b> {{ $dossier->num_rg }}
                    </li>
                    <li class="list-group-item">
                        <b>Demandeur:</b> {{ $dossier->demandeur }}
                    </li>
                    <li class="list-group-item">
                        <b>Defendeur:</b> {{ $dossier->defendeur }}
                    </li>
                    <li class="list-group-item">
                        <b>Objet:</b> {{ $dossier->objet }}
                    </li>
                </ul>
            </div>
        </div>
        <div class="card">
            <div class="card-head card-topline-aqua">
                <header>Documents</header>
            </div>
            <div class="card-body no-padding height-9">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        {{-- @foreach ($dossier->documentaffaireCivils as $document)
                            <input type="button" value="Open PDF" onclick = "openPdf('/uploads/'.{{ $document->chemin_doc }})"/>
                        @endforeach
                        <b><a onclick="" href="/images/icon_svg/Brochure.pdf" target="_blank">p1</a> </b> <br>
                        <b><a href="/images/icon_svg/Brochure.pdf">p1</a> </b> <br>
                        <a href="#Foo" onclick="return runMyFunction();">Do it!</a>
                        <div class="profile-desc-item pull-right">Female</div> --}}
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
                            <header>Détail du certificat de nationalité de </header>
                        </div>
                        <div class="white-box">
                            {{-- <a href="{{ route('dossier_affaire_civil.edit',$dossier->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Modifier</a> --}}
                            <button class="btn btn-primary" data-toggle="modal" data-target="#orientation">Importer des documents
                                <i class="fa fa-plus"></i>
                            </button>
                            <!-- debut modal -->
                                <div class="modal fade" data-backdrop="static" id="orientation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div  class="modal-header btn btn-danger text-center text-white">
                                                <h4 class="modal-title white-text w-100 font-weight-bold py-2">Importer un document</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="white-text">&times;</span>
                                                </button>
                                            </div>
                                            <!-- start modal body -->
                                                <div class="modal-body">
                                                        <form action="{{ route('document_affaire_civil.store') }}" method="post" enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="dossier_affaire_civils_id" value="{{ $dossier->id }}">
                                                            <br>
                                                            <div class="form-group">
                                                                <input type="file"
                                                                    class="form-control" name="document" id="document" value="{{ old('document') }}"  required>
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
                                <a href="#myModaldelete" data-toggle="modal" onclick="deleteData({{ $dossier->id }})"
                                    class="btn btn-danger">
                                    <i class="fa fa-trash"></i> Supprimer le dossier
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
                                                <form action="{{ route('dossier_affaire_civil.destroy',$dossier->id) }}" method="post" id="deleteform">
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
                            @if($dossier->documentaffaireCivils->count() > 0)
                                <iframe  src="/uploads/{{ $dossier->documentaffaireCivils->first()->chemin_doc }}" width="600" height="500" alt="pdf">
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
        var url = '{{ route("dossier_affaire_civil.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteform").attr('action', url);
    }
function formSubmit()
{
    // alert("bonjour");
    $("#deleteform").submit();
}



function openPdf(id)
{
 var id = id;
var omyFrame = document.getElementById("myFrame");
omyFrame.style.display="block";
omyFrame.src = id;
}
</script>
@endsection

