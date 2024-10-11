@extends('layouts.themes._light_theme')
@section('content')
<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">Indexation jugement suppletif</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                    href="{{ route('home') }}">Accueil</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li><a class="parent-item" href="#">Jugement Suppletif</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Jugement Suppletif</li>
        </ol>
    </div>
</div>
 <a href="{{ route('home') }}" class="btn btn-primary"><i class="fa fa-reply"></i> Retour</a>
 @livewire('indexation-jugement')
@endsection
