@extends('layouts.themes._light_theme')
@section('content')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Liste des dossiers flagrant delit</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="#"></a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Liste des dossiers flagrant delit</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-red">
            <div class="card-head">
                <header>Liste des dossiers: Flagrant Delit</header>
                <div class="tools">
                    <a class="fa fa-repeat btn-color box-refresh"
                        href="javascript:;"></a>
                    <a class="t-collapse btn-color fa fa-chevron-down"
                        href="javascript:;"></a>
                    <a class="t-close btn-color fa fa-times"
                        href="javascript:;"></a>
                </div>
            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <a href="{{ route('home') }}" class="btn btn-info"><i class="fa fa-reply"></i>
                            Retour
                        </a>
                        <a href="{{ route('dossier_flagrant_delit.create') }}" class="btn btn-danger">Crée un dossier <i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="table-scrollable">
                    <table
                        class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                            id="eleves">
                        <thead>
                            <tr>
                                <th class="text-center">N° RP</th>
                                <th class="text-center">Prévention</th>
                                <th class="text-center">Plaignant / Victime</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_dossiers as $dossier)
                                <tr>
                                    <td class="text-center">{{ $dossier->num_rp }}</td>
                                    <td class="text-center">{{ $dossier->prevention  }}</td>
                                    <td class="text-center">{{ $dossier->plaignant }}</td>
                                    <td class="text-center">{{ $dossier->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="#" class="btn btn-info">Ouvrir <i class="fa fa-eye"></i></a>
                                        <a href="#" class="btn btn-primary">Modifier <i class="fa fa-edit"></i></a>
                                        <a href="#myModaldelete" data-toggle="modal" onclick="deleteData({{ $dossier->id }})"
                                            class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Supprimer
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
                                                        <form action="{{ route('dossier_flagrant_delit.destroy',$dossier->id) }}" method="post" id="deleteform">
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
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- script utiliser pour la suppression d'un camion--}}
<script>
    function deleteData(id)
         {
             var id = id;
             var url = '{{ route("dossier_flagrant_delit.destroy", ":id") }}';
             url = url.replace(':id', id);
             $("#deleteform").attr('action', url);
         }
    function formSubmit()
    {
        // alert("bonjour");
        $("#deleteform").submit();
    }
</script>
