<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{

    //Metodo para mostrar la pagina principal.
    public function index(){

        //Ordenar los cursos por id de manera descedente
        $cursos = Curso::orderBy('id', 'desc')->paginate();

        //Pasarle la variable que tiene nuestros cursos ($cursos) a la vista 
        return view('cursos.index', compact('cursos'));
    }

    //Metodo para mostrar el formulario para crear curso.
    public function create(){
        return view('cursos.create');
    }

    //Crear el metodo store, recibir los datos desde el formulario
    public function store(Request $request){

        //Validacion que verifique que los datos enviados desde la vista crear curso
        //traigan datos consigo, solo si supera la validacion continua con el codigo
        //caso contrario que retorne de nuevo al formulario inicial

        $request->validate([
            //Reglas de validacion que deseamos
            //Verificar que los campos deseados deben tener datos requeridos (required)
            //Este campo debe ser requerido
            'name' => 'required|max:10',
            'descripcion' => 'required|min:|10',
            'categoria' => 'required'

            //Si las 3 reglas cumplen lo requerido entonces deja seguir el programa
        ]);



        //Mostrar lo que hay en el objeto
        //return $request->all();

        //En una variable llamada curso es una instancia de la clase curso
        $curso = new Curso();

        //El nombre de este curso sea igual a lo que se ha enviado
        //por el formulario
        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;

        //Retorna el objeto
        //return $curso;

        //Salvar el objeto obtenido
        $curso->save();

        //Redireccione a la pagina del curso según el id del objeto curso
        return redirect()->route('cursos.show',$curso->id);

    }

    //Metodo para mostrar un elemento en particular.
    public function show(Curso $curso){

        //Recuperar un registro por su ID
        //$curso = Curso::find($id);

        //Otra manera de tomar la variable desde la url con lo que obtenemos
        // ['curso' => $curso]
        // compact('curso');  ==  ['curso' => $curso]

        return view('cursos.show', compact('curso'));
    }

    //Metodo para editar curso recibiendo el id desde la URL
    public function edit(Curso $curso){
        //Retorne una vista
        return view('cursos.edit', compact('curso'));

        //Otra forma de traer los objetos desde la BD por ID
        //$curso = Curso::find($id);
        //return $curso;
    }

    //Metodo para enviar informacion actualizada
    public function update(Request $request, Curso $curso){

        $request->validate([
            //Reglas de validacion que deseamos
            //Verificar que los campos deseados deben tener datos requeridos (required)
            //Este campo debe ser requerido
            'name' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required'

            //Si las 3 reglas cumplen lo requerido entonces deja seguir el programa
        ]);

        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;

        $curso->save();

        return redirect()->route('cursos.show',$curso);
    }
}
