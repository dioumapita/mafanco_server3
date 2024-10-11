@extends('layouts.themes._light_theme')
@section('content')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Liste des appels</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="#"></a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Liste des appels</li>
        </ol>
    </div>
</div>
@livewire('liste-appel')
@endsection
