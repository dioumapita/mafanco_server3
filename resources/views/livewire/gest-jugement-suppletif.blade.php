<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-topline-red">
                <div class="card-head">
                    <header>Jugement suppletif</header>
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
                        </div>
                    </div>
                    <div class="table-scrollable">
                            <input type="search" class="form-control" wire:model='searchNumero' placeholder="Numéro"> &nbsp;
                            <input type="search" class="form-control" wire:model='searchDateNaiss' placeholder="Date de naissance"> &nbsp;
                            <input type="search" class="form-control"  wire:model='searchNom' placeholder="Nom">
                        <br><br>
                        <table
                            class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                id="elevess">
                            <thead>
                                <tr>
                                    <th class="text-center">N° </th>
                                    <th class="text-center">Nom</th>
                                    <th class="text-center">Date Naiss</th>
                                    <th class="text-center">Lieu Naiss</th>
                                    <th class="text-center">Filliation</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_jugements as $jugement)
                                    <tr>
                                        <td class="text-center">{{ $jugement->numero }}</td>
                                        <td class="text-center">{{ $jugement->nom }}</td>
                                        <td class="text-center">{{ $jugement->date_naissance }}</td>
                                        <td class="text-center">{{ $jugement->lieu_naissance }}</td>
                                        <td class="text-center">{{ $jugement->filiation}}</td>
                                        <td>
                                            <a href="{{ route('gest_jugement_suppletif.show',$jugement->id) }}" class="btn btn-info btn-block">Afficher <i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pull-right">
                            {!! $all_jugements->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
