@extends('layouts.themes._light_theme')
@section('content')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Liste des dossiers affaire civile</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="#"></a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Liste des dossiers affaire civile</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-red">
            <div class="card-head">
                <header>Liste des dossiers: Affaire Civile</header>
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
                        <a href="{{ route('dossier_affaire_civil.create') }}" class="btn btn-danger">Crée un dossier <i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="table-scrollable">
                    <table
                        class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                            id="eleves">
                        <thead>
                            <tr>
                                <th class="text-center">N° RG</th>
                                <th class="text-center">Objet</th>
                                <th class="text-center">Demandeur</th>
                                <th class="text-center">Defendeur</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_dossiers as $dossier)
                                <tr>
                                    <td class="text-center">{{ $dossier->num_rg }}</td>
                                    <td class="text-center">{{ $dossier->objet }}</td>
                                    <td class="text-center">{{ $dossier->demandeur }}</td>
                                    <td class="text-center">{{ $dossier->defendeur }}</td>
                                    <td>
                                        <a href="{{ route('dossier_affaire_civil.show',$dossier) }}" class="btn btn-info">Ouvrir le dossier<i class="fa fa-eye"></i></a>
                                        @if($dossier->orientationDossiers->where('status',1)->count() < 1)
                                            <button class="btn deepPink-bgcolor  btn-outline" data-toggle="modal" data-target="#orientation{{ $dossier->id }}">Orienter le dossier
                                                <i class="fa fa-plus"></i>
                                            </button>
                                            <!-- debut modal -->
                                                <div class="modal fade" data-backdrop="static" id="orientation{{ $dossier->id  }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div  class="modal-header btn btn-danger text-center text-white">
                                                                <h4 class="modal-title white-text w-100 font-weight-bold py-2">Orientation d'un dossier</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true" class="white-text">&times;</span>
                                                                </button>
                                                            </div>
                                                            <!-- start modal body -->
                                                                <div class="modal-body">
                                                                        <form action="{{ route('orientation_dossier.store') }}" method="post">
                                                                            {{ csrf_field() }}                                                                        <input type="hidden" name="dossier_affaire_civils_id" value="{{ $dossier->id }}">
                                                                            <div class="form-group">
                                                                                <label for="">Où souhaitez-vous orientez ce dossier *</label>
                                                                                <input type="text"
                                                                                    class="form-control" name="lieu_orientation" id="lieu_orientation" value="{{ old('date_orientation') }}"  required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="date_paiement">Date *</label>
                                                                                <input type="date"
                                                                                    class="form-control" name="date_orientation" id="date_orientation" value="{{ old('date_orientation') }}"  required>
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
                                        @else
                                            <a href="#myModaldelete" data-toggle="modal" onclick="deleteData({{ $dossier->id }})"
                                                class="btn btn-primary">
                                                <i class="fa fa-trash"></i> Retirer le dossier
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
                                                                <h4 class="modal-title w-100">De vouloir retirer ce dossier avec</h4> <br>  {{ $dossier->orientationDossiers()->where('status',1)->first()->lieu_orientation }}
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer justify-content-center">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                            <form action="{{ route('remove_orientation',$dossier->id) }}" method="post" id="deleteform">
                                                                {{ csrf_field() }}
                                                                <button  type="button" onclick = "formSubmit()" class="btn btn-danger" data-dismiss="modal">
                                                                    Oui Retirer
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
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
             var url = '{{ route("remove_orientation", ":id") }}';
             url = url.replace(':id', id);
             $("#deleteform").attr('action', url);
         }
    function formSubmit()
    {
        $("#deleteform").submit();
    }
</script>

