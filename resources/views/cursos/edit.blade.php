@extends('layouts.plantilla')

@section('title', 'Cursos edit')
    
@section('content')

    <h1>En esta pagina podrás editar un curso</h1>

    <form action="{{route('cursos.update',$curso)}}" method="POST">

        <!--Medida de seguridad en laravel INPUT OCULTO -->
        @csrf

        <!--Pasarle un directiva methos a laravel para el PUT -->
        @method('put')

        <label>
            Nombre:
            <br>
            <input type="text" name="name" value="{{$curso->name}}">
        </label>

        <br>
        <label>
            Descripcion:
            <br>
            <textarea name="descripcion" rows="5">{{$curso->descripcion}}</textarea>
        </label>

        <br>
        <label>
            Categoria:
            <br>
            <input type="text" name="categoria" value="{{$curso->categoria}}">
        </label>

        <br>
        <button type="submit">Actualizar formulario</button>

    </form>

@endsection
