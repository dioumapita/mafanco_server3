@extends('layouts.themes._light_theme')
@section('content')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Gestion des signateurs</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="#"></a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Gestion des signateurs</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-red">
            <div class="card-head">
                <header>Gestion des signateurs</header>
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
                        <button class="btn deepPink-bgcolor  btn-outline" data-toggle="modal" data-target="#new_scelle">Ajout
                            <i class="fa fa-plus"></i>
                        </button>
                        <!-- debut modal -->
                            <div class="modal fade" data-backdrop="static" id="new_scelle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div  class="modal-header btn btn-danger text-center text-white">
                                            <h4 class="modal-title white-text w-100 font-weight-bold py-2">Nouveau</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" class="white-text">&times;</span>
                                            </button>
                                        </div>
                                        <!-- start modal body -->
                                            <div class="modal-body">
                                                    <form action="{{ route('gestion_signateur.store') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <label for="nom_signateur">Nom du signateur</label>
                                                            <input type="text"
                                                                class="form-control" name="nom_signateur" id="nom_signateur" value="{{ old('nom_signateur') }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="sexe">Sexe</label>
                                                            <select name="sexe" id="sexe" class="form-control" required>
                                                                <option value="">Selectionnez</option>
                                                                <option value="M">M</option>
                                                                <option value="F">F</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="fonction">Fonction</label>
                                                            <select name="fonction" id="fonction" class="form-control" required>
                                                                <option value="">Selectionnez</option>
                                                                <option value="Chef du Greffe">Chef du Greffe</option>
                                                                <option value="Greffier">Greffier</option>
                                                                <option value="President">President</option>
                                                                <option value="Presidente">Presidente</option>
                                                                <option value="JUGE">JUGE</option>
                                                                <option value="President de section">Président de section</option>
                                                                <option value="Presidente de section">Présidente de section</option>
                                                                <option value="President de section civile">Président de section civile</option>
                                                                <option value="Presidente de section civile">Présidente de section civile</option>
                                                                <option value="President de section correctionnelle">Président de section correctionnelle</option>
                                                                <option value="Presidente de section correctionnelle">Présidente de section correctionnelle</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="status">Status</label>
                                                            <select name="status" id="status" class="form-control" required>
                                                                <option value="">Selectionnez</option>
                                                                <option value="Officiel">Officiel</option>
                                                                <option value="Interim">Interim</option>
                                                            </select>
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
                <div class="table-scrollable">
                    <table
                        class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                            id="eleves">
                        <thead>
                            <tr>
                                <th class="text-center">N° </th>
                                <th class="text-center">Signateur</th>
                                <th class="text-center">Sexe</th>
                                <th class="text-center">Fonction</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_signateurs as $signateur)
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td class="text-center">{{ $signateur->nom_signateur }}</td>
                                    <td class="text-center">{{ $signateur->sexe }}</td>
                                    <td class="text-center">{{ $signateur->fonction }}</td>
                                    <td class="text-center">{{ $signateur->status }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#edit_scelle{{ $signateur->id }}">Modifier
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <a href="#myModaldelete" data-toggle="modal" onclick="deleteData({{ $signateur->id }})"
                                            class="btn btn-danger btn-block">
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
                                                        <form action="{{ route('gestion_signateur.destroy',$signateur->id) }}" method="post" id="deleteform">
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
                                        <!-- debut modal -->
                                            <div class="modal fade" data-backdrop="static" id="edit_scelle{{ $signateur->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div  class="modal-header btn btn-danger text-center text-white">
                                                            <h4 class="modal-title white-text w-100 font-weight-bold py-2">Modification</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true" class="white-text">&times;</span>
                                                            </button>
                                                        </div>
                                                        <!-- start modal body -->
                                                            <div class="modal-body">
                                                                    <form action="{{ route('gestion_signateur.update',$signateur->id) }}" method="post">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field('PUT') }}
                                                                        <div class="form-group">
                                                                            <label for="nom_signateur">Nom signateur</label>
                                                                            <input type="text"
                                                                                class="form-control" name="nom_signateur" id="nom_signateur" value="{{ $signateur->nom_signateur }}" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="sexe">Sexe</label>
                                                                            <select name="sexe" id="sexe" class="form-control" required>
                                                                                <option value="">Selectionnez</option>
                                                                                <option value="M" @if($signateur->sexe == 'M') selected @endif>M</option>
                                                                                <option value="F" @if($signateur->sexe == 'F') selected @endif>F</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="fonction">Fonction</label>
                                                                            <select name="fonction" id="fonction" class="form-control" required>
                                                                                <option value="">Selectionnez</option>
                                                                                <option value="Chef du Greffe">Chef du Greffe</option>
                                                                                <option value="Greffier">Greffier</option>
                                                                                <option value="President">President</option>
                                                                                <option value="Presidente">Presidente</option>
                                                                                <option value="JUGE">JUGE</option>
                                                                                <option value="President de section">Président de section</option>
                                                                                <option value="Presidente de section">Présidente de section</option>
                                                                                <option value="President de section civile">Président de section civile</option>
                                                                                <option value="Presidente de section civile">Présidente de section civile</option>
                                                                                <option value="President de section correctionnelle">Président de section correctionnelle</option>
                                                                                <option value="Presidente de section correctionnelle">Présidente de section correctionnelle</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="status">Status</label>
                                                                            <select name="status" id="status" class="form-control" required>
                                                                                <option value="">Selectionnez</option>
                                                                                <option value="Officiel">Officiel</option>
                                                                                <option value="Interim">Interim</option>
                                                                            </select>
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
<script type="text/javascript">
    function deleteData(id)
        {
            var id = id;
            var url = '{{ route("gestion_signateur.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteform").attr('action', url);
        }
    function formSubmit()
    {
        // alert("bonjour");
        $("#deleteform").submit();
    }
</script>
