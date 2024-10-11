@component('mail::message')


@component('mail::panel')
  Dossier: N° RG {{ $num }} <br>
  Affaire: {{ $demandeur .' / '. $defendeur }} <br>
  Objet: {{ $objet }} <br>
 <br>

Pour en savoir plus, consultez les fichiers ci-joints.
@endcomponent

{{ config('app.name') }}
@endcomponent
