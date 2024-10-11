@extends('layouts.themes._light_theme')
@section('content')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Détail d'une instruction</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="{{ route('home') }}">Accueil</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li><a class="parent-item" href="#">Instruction</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Détail d'une instruction</li>
        </ol>
    </div>
</div>
 <a href="{{ route('rg_instruction.index') }}" class="btn btn-primary"><i class="fa fa-reply"></i> Retour</a>
<div id="media_screen" class="row">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
    <div class="profile-sidebar">
        <div class="card">
            <div class="card-head card-topline-aqua">
                <header>Informations de l'instruction</header>
            </div>
            <div class="card-body no-padding height-9">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>N° RP :</b> {{ $instruction->num_rp }}
                    </li>
                    <li class="list-group-item">
                        <b>N° RI :</b> {{ $instruction->num_ri }}
                    </li>
                </ul>
                <br>
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
                                    <h4 class="modal-title white-text w-100 font-weight-bold py-2">Modification des numéros</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="white-text">&times;</span>
                                    </button>
                                </div>
                                <!-- start modal body -->
                                    <div class="modal-body">
                                            <form action="{{ route('rg_instruction.update',$instruction->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}
                                                <div class="form-group">
                                                    <label for="num_rp">N° RP *</label>
                                                    <input type="number"
                                                        class="form-control" name="num_rp" id="num_rp" value="{{ $instruction->num_rp }}"  required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="num_rp">N° RI *</label>
                                                    <input type="number"
                                                        class="form-control" name="num_ri" id="num_ri" value="{{ $instruction->num_ri }}"  required>
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
                            <header>Détail</header>
                        </div>
                        <div class="white-box">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#orientation">Importer un document
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
                                                        <form action="{{ route('doc_instruction.store') }}" method="post" enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="rg_instructions_id" value="{{ $instruction->id }}">
                                                            <br>
                                                            <div class="form-group">
                                                                <input type="file"
                                                                    class="form-control" name="doc_instruction" id="doc_instruction" value="{{ old('doc_instruction') }}"  required>
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
                            <a href="#myModaldelete" data-toggle="modal" onclick="deleteData({{ $instruction->id }})"
                                class="btn btn-danger">
                                <i class="fa fa-trash"></i> Supprimer l'instruction
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
                                            <form action="{{ route('rg_instruction.destroy',$instruction->id) }}" method="post" id="deleteform">
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
                            <br><br>
                            <div>
                                <h4 class="text-center">
                                   <u>Inculpés</u>
                                </h4>
                                <button class="btn deepPink-bgcolor  btn-outline" data-toggle="modal" data-target="#new_inculpe">Ajouter un inculpe
                                    <i class="fa fa-plus"></i>
                                </button>
                                <!-- debut modal -->
                                    <div class="modal fade" data-backdrop="static" id="new_inculpe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div  class="modal-header btn btn-danger text-center text-white">
                                                    <h4 class="modal-title white-text w-100 font-weight-bold py-2">Nouveau inculpe</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true" class="white-text">&times;</span>
                                                    </button>
                                                </div>
                                                <!-- start modal body -->
                                                    <div class="modal-body">
                                                            <form action="{{ route('inculpe.store') }}" method="post">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="rg_instructions_id" value="{{ $instruction->id }}">
                                                                <div class="form-group">
                                                                    <label for="prenom_nom">Prénom et nom *</label>
                                                                    <input type="text"
                                                                        class="form-control" name="prenom_nom" id="prenom_nom" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="date_naiss">Date naiss *</label>
                                                                    <input type="date"
                                                                        class="form-control" name="date_naiss" id="date_naiss">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="lieu_naiss">Lieu naiss *</label>
                                                                    <input type="text"
                                                                        class="form-control" name="lieu_naiss" id="lieu_naiss">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="pere">Père *</label>
                                                                    <input type="text"
                                                                        class="form-control" name="pere" id="pere">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="pere">Mère *</label>
                                                                    <input type="text"
                                                                        class="form-control" name="mere" id="mere">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="pere">Domicile *</label>
                                                                    <input type="text"
                                                                        class="form-control" name="domicile" id="domicile">
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
                                    <div class="table-scrollable">
                                        <table
                                            class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                                id="elevesf">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">N° </th>
                                                    <th class="text-center">Prénom et nom</th>
                                                    <th class="text-center">Date</th>
                                                    <th class="text-center">Lieu</th>
                                                    <th class="text-center">Père</th>
                                                    <th class="text-center">Mère</th>
                                                    <th class="text-center">Domicile</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $n1 = 1;
                                                @endphp
                                                @foreach ($instruction->inculpes as $inculpe)
                                                    <tr>
                                                        <td>{{ $n1++ }}</td>
                                                        <td>{{ $inculpe->prenom_nom }}</td>
                                                        <td>
                                                            @if($inculpe->date_naiss != null)
                                                                {{ $inculpe->date_naiss->format('d/m/Y') }}
                                                            @else

                                                            @endif
                                                        </td>
                                                        <td>{{ $inculpe->lieu_naiss }}</td>
                                                        <td>{{ $inculpe->pere }}</td>
                                                        <td>{{ $inculpe->mere }}</td>
                                                        <td>{{ $inculpe->domicile }}</td>
                                                        <td style="width: 16px">
                                                            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#update_inculpe{{ $inculpe->id }}">Modifier
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <a href="#ModalDeleteInculpe" data-toggle="modal" onclick="deleteDataInculpe({{ $inculpe->id }})"
                                                                class="btn btn-danger btn-block">
                                                                <i class="fa fa-trash"></i> Supprimer
                                                            </a>
                                                            <div id="ModalDeleteInculpe" class="mt-5 modal fade" data-backdrop="static">
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
                                                                            <form action="{{ route('inculpe.destroy',$inculpe->id) }}" method="post" id="deleteinculpe">
                                                                                {{ csrf_field() }}
                                                                                {{ method_field('DELETE') }}
                                                                                <button  type="button" onclick = "formSubmitInculpe()" class="btn btn-danger" data-dismiss="modal">
                                                                                    Oui Supprimer
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- debut modal -->
                                                                <div class="modal fade" data-backdrop="static" id="update_inculpe{{ $inculpe->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                                                                                        <form action="{{ route('inculpe.update',$inculpe->id) }}" method="post">
                                                                                            {{ csrf_field() }}
                                                                                            {{ method_field('PUT') }}
                                                                                            <div class="form-group">
                                                                                                <label for="prenom_nom">Prénom et nom *</label>
                                                                                                <input type="text"
                                                                                                    class="form-control" name="prenom_nom" id="prenom_nom" value="{{ $inculpe->prenom_nom }}"  required>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="date_naiss">Date naiss *</label>
                                                                                                <input type="date"
                                                                                                    class="form-control" name="date_naiss" id="date_naiss" value="{{old('date_naiss', isset($inculpe->date_naiss) ? $inculpe->date_naiss->format('Y-m-d') : ' ')}}"  required>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="lieu_naiss">Lieu naiss *</label>
                                                                                                <input type="text"
                                                                                                    class="form-control" name="lieu_naiss" id="lieu_naiss" value="{{ $inculpe->lieu_naiss }}"  required>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="pere">Père *</label>
                                                                                                <input type="text"
                                                                                                    class="form-control" name="pere" id="pere" value="{{ $inculpe->pere }}"  required>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="pere">Mère *</label>
                                                                                                <input type="text"
                                                                                                    class="form-control" name="mere" id="mere" value="{{ $inculpe->mere }}"  required>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="pere">Domicile *</label>
                                                                                                <input type="text"
                                                                                                    class="form-control" name="domicile" id="mere" value="{{ $inculpe->domicile }}"  required>
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
                                    <h4 class="text-center">
                                        <u>Faits</u>
                                     </h4>
                                    <button class="btn deepPink-bgcolor  btn-outline" data-toggle="modal" data-target="#new_fait">Ajouter un fait
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <!-- debut modal -->
                                        <div class="modal fade" data-backdrop="static" id="new_fait" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div  class="modal-header btn btn-danger text-center text-white">
                                                        <h4 class="modal-title white-text w-100 font-weight-bold py-2">Nouveau fait</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true" class="white-text">&times;</span>
                                                        </button>
                                                    </div>
                                                    <!-- start modal body -->
                                                        <div class="modal-body">
                                                                <form action="{{ route('fait_inculpe.store') }}" method="post">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="rg_instructions_id" value="{{ $instruction->id }}">
                                                                    <div class="form-group">
                                                                        <label for="date_faits">Date *</label>
                                                                        <input type="date"
                                                                            class="form-control" name="date_faits" id="date_faits"  required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nature_faits">Nature des faits *</label>
                                                                        <textarea class="form-control" name="nature_faits" id="nature_faits" cols="30" rows="3"></textarea>
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
                                    <div class="table-scrollable">
                                        <table
                                            class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                                id="elevesf">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">N° </th>
                                                    <th class="text-center">Date du fait</th>
                                                    <th class="text-center">Nature du fait</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $n2 = 1;
                                                @endphp
                                                @foreach ($instruction->fait_inculpes as $fait)
                                                    <tr>
                                                        <td>{{ $n2++ }}</td>
                                                        <td class="text-center">
                                                            @if($fait->date_faits != null)
                                                                {{ $fait->date_faits->format('d/m/Y') }}
                                                            @else

                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $fait->nature_faits }}
                                                        </td>
                                                        <td style="width: 16px">
                                                            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#update_fait{{ $fait->id }}">Modifier
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <a href="#ModalDeleteFait" data-toggle="modal" onclick="deleteDataFait({{ $fait->id }})"
                                                                class="btn btn-danger btn-block">
                                                                <i class="fa fa-trash"></i> Supprimer
                                                            </a>
                                                            <div id="ModalDeleteFait" class="mt-5 modal fade" data-backdrop="static">
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
                                                                            <form action="{{ route('fait_inculpe.destroy',$fait->id) }}" method="post" id="deletefait">
                                                                                {{ csrf_field() }}
                                                                                {{ method_field('DELETE') }}
                                                                                <button  type="button" onclick = "formSubmitFait()" class="btn btn-danger" data-dismiss="modal">
                                                                                    Oui Supprimer
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- debut modal -->
                                                                <div class="modal fade" data-backdrop="static" id="update_fait{{ $fait->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                                                                                        <form action="{{ route('fait_inculpe.update',$fait->id) }}" method="post">
                                                                                            {{ csrf_field() }}
                                                                                            {{ method_field('PUT') }}
                                                                                            <div class="form-group">
                                                                                                <label for="date_faits">Date *</label>
                                                                                                <input type="date"
                                                                                                    class="form-control" name="date_faits" id="date_faits" value="{{ $fait->date_faits->format('Y-m-d') }}"  required>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="nature_faits">Nature des faits *</label>
                                                                                                <textarea class="form-control" name="nature_faits" id="nature_faits" cols="30" rows="3">{{ $fait->nature_faits }}</textarea>
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
                                    <h4 class="text-center">
                                        <u>Actes</u>
                                    </h4>
                                    <button class="btn deepPink-bgcolor  btn-outline" data-toggle="modal" data-target="#new_acte">Ajouter un acte
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <!-- debut modal -->
                                        <div class="modal fade" data-backdrop="static" id="new_acte" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div  class="modal-header btn btn-danger text-center text-white">
                                                        <h4 class="modal-title white-text w-100 font-weight-bold py-2">Nouveau acte</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true" class="white-text">&times;</span>
                                                        </button>
                                                    </div>
                                                    <!-- start modal body -->
                                                        <div class="modal-body">
                                                                <form action="{{ route('acte_inculpe.store') }}" method="post">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="rg_instructions_id" value="{{ $instruction->id }}">
                                                                    <div class="form-group">
                                                                        <label for="date_faits">Date *</label>
                                                                        <input type="date"
                                                                            class="form-control" name="date_actes" id="date_actes"   required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nature_faits">Nature des actes *</label>
                                                                        <textarea class="form-control" name="nature_actes" id="nature_actes" cols="30" rows="3"></textarea>
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
                                    <div class="table-scrollable">
                                        <table
                                            class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                                id="elevesf">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">N° </th>
                                                    <th class="text-center">Date de l'acte</th>
                                                    <th class="text-center">Nature de l'acte</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $n3 = 1;
                                                @endphp
                                                @foreach ($instruction->actes_inculpes as $acte)
                                                    <tr>
                                                        <td>{{ $n3++ }}</td>
                                                        <td class="text-center">
                                                            @if($acte->date_actes != null)
                                                                {{ $acte->date_actes->format('d/m/Y') }}
                                                            @else

                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $acte->nature_actes }}
                                                        </td>
                                                        <td style="width: 16px"
                                                        >
                                                            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#update_acte{{ $acte->id }}">Modifier
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <a href="#ModalDeleteActe" data-toggle="modal" onclick="deleteDataActe({{ $acte->id }})"
                                                                class="btn btn-danger btn-block">
                                                                <i class="fa fa-trash"></i> Supprimer
                                                            </a>
                                                            <div id="ModalDeleteActe" class="mt-5 modal fade" data-backdrop="static">
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
                                                                            <form action="{{ route('acte_inculpe.destroy',$acte->id) }}" method="post" id="deleteacte">
                                                                                {{ csrf_field() }}
                                                                                {{ method_field('DELETE') }}
                                                                                <button  type="button" onclick = "formSubmitActe()" class="btn btn-danger" data-dismiss="modal">
                                                                                    Oui Supprimer
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- debut modal -->
                                                                <div class="modal fade" data-backdrop="static" id="update_acte{{ $acte->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                                                                                        <form action="{{ route('acte_inculpe.update',$acte->id) }}" method="post">
                                                                                            {{ csrf_field() }}
                                                                                            {{ method_field('PUT') }}
                                                                                            <div class="form-group">
                                                                                                <label for="date_faits">Date *</label>
                                                                                                <input type="date"
                                                                                                    class="form-control" name="date_actes" id="date_actes" value="{{ $acte->date_actes->format('Y-m-d') }}"  required>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="nature_faits">Nature des actes *</label>
                                                                                                <textarea class="form-control" name="nature_actes" id="nature_actes" cols="30" rows="3">{{ $acte->nature_actes }}</textarea>
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
                            @if($instruction->docrgInstructions->count() > 0 )
                                <h4 class="text-center">
                                    <u>Document</u>
                                </h4>
                                <iframe  src="/uploads/{{ $instruction->docrgInstructions->first()->chemin_doc }}" width="600" height="700" alt="pdf">
                                </iframe>
                            @else

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>
@endsection
<script type="text/javascript">
    function deleteData(id)
        {
            var id = id;
            var url = '{{ route("rg_instruction.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteform").attr('action', url);
        }
    function formSubmit()
        {
            // alert("bonjour");
            $("#deleteform").submit();
        }

    function deleteDataInculpe(id)
        {

            var id = id;
            var url = '{{ route("inculpe.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteinculpe").attr('action', url);
        }
    function formSubmitInculpe()
        {
            // alert("bonjour");
            $("#deleteinculpe").submit();
        }

    function deleteDataFait(id)
        {

            var id = id;
            var url = '{{ route("fait_inculpe.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deletefait").attr('action', url);
        }
    function formSubmitFait()
        {
            // alert("bonjour");
            $("#deletefait").submit();
        }

    function deleteDataActe(id)
        {

            var id = id;
            var url = '{{ route("acte_inculpe.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteacte").attr('action', url);
        }
    function formSubmitActe()
        {
            // alert("bonjour");
            $("#deleteacte").submit();
        }
</script>
