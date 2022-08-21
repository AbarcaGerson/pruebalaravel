@extends('layouts.plantilla')

@section('title', 'Curso ' . $curso->name)
    
@section('content')
    <!--Otra forma de mostrar la variable curso con dobles comillas y dentro la variable-->
    <!-- <h1>Bienvenido al curso {{$curso}} </h1> -->
    <h1>Bienvenido al curso <?php echo $curso->name; ?></h1>
    <a href="{{route('cursos.index')}}">Volver a cursos</a>
    <br>
    <a href="{{route('cursos.edit', $curso)}}">Editar curso</a>

    <p><strong>Categoria: </strong>{{$curso->categoria}}</p>
    <p>{{$curso->descripcion}}</p>
@endsection
