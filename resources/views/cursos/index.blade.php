@extends('layouts.plantilla')

@section('title', 'Cursos')
    
@section('content')
    <h1>Bienvenido a la página principal de cursos</h1>

    <a href="{{route('cursos.create')}}">Crear curso</a>

    <ul>
        <!--
        El primer parametro debe contener nuestra coleccion ($cursos)
        El segundo parametro debe contener el nombre de la variable en la que queremos que se almacene
        temporalmente cada registro
        -->
        @foreach ($cursos as $curso)

            <!-- Encerrando la variable entre llaves dobles blade
            entiende que es una variable PHP
            
            Para imprimir solo el nombre dentro del LI
             <li>'$curso->name'</li>
            -->
            <li>
                <a href="{{route('cursos.show', $curso->id)}}">{{$curso->name}}</a>
                {{--Para pasarle el parametro $curso a la vista show debemos pasarle una cadena--}}
            </li>
        @endforeach
    </ul>


    <!-- Paginar la vista -->
    {{$cursos->links()}}
@endsection
