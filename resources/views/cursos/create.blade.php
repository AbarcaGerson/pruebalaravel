@extends('layouts.plantilla')

@section('title', 'Cursos create')
    
@section('content')

    <h1>En esta pagina podrás crear un curso</h1>

    <form action="{{route('cursos.store')}}" method="POST">

        <!--Medida de seguridad en laravel INPUT OCULTO -->
        @csrf

        <label>
            Nombre:
            <br>
            <input type="text" name="name">
        </label>

        <!--Directiva de blade/funciona de manera similar a un IF-->
        <!--Si ha habido algun error de validacion en el campo name-->
        @error('name')
            <!--Para imprimir el mensaje de error-->
            <br>
                <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <label>
            Descripcion:
            <br>
            <textarea name="descripcion" rows="5"></textarea>
        </label>

        @error('descripcion')
            <!--Para imprimir el mensaje de error-->
            <br>
                <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <label>
            Categoria:
            <br>
            <input type="text" name="categoria">
        </label>

        @error('categoria')
            <!--Para imprimir el mensaje de error-->
            <br>
                <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <button type="submit">Enviar formulario</button>

    </form>

@endsection

