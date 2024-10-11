<div>
    <div id="media_screen" class="row">
        <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
        <div class="profile-sidebar">
            <div class="card">
                <div class="card-head card-topline-aqua">
                    <header>Appel non indexé: {{ $nbre_appel}}</header>
                </div>
                <div class="card-body no-padding height-9">
                    <ul class="list-group list-group-unbordered">
                        @foreach ($all_files as $file)
                            <li class="list-group-item">
                                <a wire:click.prevent="open_file('{{ $file->getFileName() }}')" href="#">{{ $file->getFileName() }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-head card-topline-aqua">
                    <header>Indexation</header>
                </div>
                <div class="card-body no-padding height-9">
                    <ul class="list-group list-group-unbordered">
                        <form wire:submit.prevent='indexer()'>
                            <input type="text" class="form-control" wire:model="numero" id="numero" placeholder="Numéro" required> <br>
                            <input type="text" class="form-control" wire:model="date_appel" id="date_appel" placeholder="Date appel" required> <br>
                            <textarea wire:model="les_parties" id="" cols="30" rows="3" class="form-control" placeholder="les parties" required></textarea> <br>
                            <select wire:model="type" id="type" class="form-control" required>
                                <option value="">Type</option>
                                <option value="APPEL CIVIL">APPEL CIVIL</option>
                                <option value="APPEL CORRECTIONNEL">APPEL CORRECTIONNEL</option>
                                <option value="TRANSMISSION">TRANSMISSION</option>
                            </select>
                            <br>
                            <input type="text" class="form-control" wire:model="date_transmission" placeholder="Date transmission"> <br>
                            <button type="submit" class="btn btn-danger btn-block">Valider</button>
                        </form>
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
                                <header>
                                    Document
                                </header>
                            </div>
                            <div class="white-box">
                                <!-- fin modal -->
                                <br><br>
                                @if($name_file)
                                    <iframe  src="/uploads/bannette/doc_appel/{{ $name_file }}" width="600" height="700" alt="pdf">
                                    </iframe>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>
</div>