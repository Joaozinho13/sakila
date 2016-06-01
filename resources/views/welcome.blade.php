@extends('layouts.app')

@section('content')
    <ul class="list-group">
        <li class="list-group-item">  <a href="{{ url('/Country/country/') }}">Países</a></li>
        <li class="list-group-item">  <a href="{{ url('/City/city/') }}">Cadastro de Cidades</a></li>
        <li class="list-group-item">  <a href="{{ url('/Address/address/') }}">Endereços</a></li>
        <li class="list-group-item">  <a href="{{ url('/Category/category/') }}">Categorias</a></li>
        <li class="list-group-item">  <a href="{{ url('/Actor/actors/') }}">Atores</a></li>
        <li class="list-group-item">  <a href="{{ url('/Language/language/') }}">Idiomas</a></li>
        <li class="list-group-item">  <a href="{{ url('/Film/film/') }}">Filmes</a></li>
    </ul>
@endsection
