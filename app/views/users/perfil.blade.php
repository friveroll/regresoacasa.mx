@extends('layouts.master')

@section('titulo')
  @foreach($perfiles as $item)
    {{ $item->first_name . " " . $item->last_name }} | Regreso a casa
  @endforeach
@stop

@section('contenido')

 @foreach($perfiles as $item)
    <ul>
      <li> Nombre: {{ $item->first_name . " " . $item->last_name }}</li>
      <li> Usuario: @{{ $item->username }}</li>
      <li> Correo: {{ $item->email }}</li>
      <li> Pa&iacute;s: <img src="/assets/img/banderas/{{Str::lower($item->profile->country_id)}}.png">
          {{{ $pais->paisById($item->profile->country_id) }}}
      </li>
      <li> Estado de vida: {{ $estado_de_vida[$item->profile->estado_de_vida_id] }}</li>
    </ul>
    <?php
      $date_created = new ExpressiveDate($item->created_at);
      echo '<p><em>'.'Miembro desde: ' . $date_created->getRelativeDate() . '</em></p>';
    ?>
 @endforeach

@stop

