<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-topline-red">
                <div class="card-head">
                    <header>Liste des instructions</header>
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
                        <input type="search" class="form-control" wire:model='searchNumero' placeholder="Rechercher"> &nbsp;
                        <br><br>
                        <table
                            class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                id="elevess">
                            <thead>
                                <tr>
                                    <th class="text-center">N° </th>
                                    <th class="text-center">Inculpe</th>
                                    <th class="text-center">Fait</th>
                                    <th class="text-center">Acte</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_instructions as $instruction)
                                    <tr>
                                        <td class="text-center">{{ $instruction->num_ri }}</td>
                                        <td class="text-center">
                                            @foreach ($instruction->inculpes as $inculpe)
                                                {{ $inculpe->prenom_nom.' ,' }}
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            @foreach ($instruction->fait_inculpes as $fait)
                                                {{ $fait->nature_faits }}
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            @foreach ($instruction->actes_inculpes as $acte)
                                                {{ $acte->nature_actes.' ,' }}
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('rg_instruction.show',$instruction->id) }}" class="btn btn-info btn-block">Afficher <i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pull-right">
                            {{-- {!! $all_appels->links() !!} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
