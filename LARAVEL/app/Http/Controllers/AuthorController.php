<?php

namespace App\Http\Controllers;

use App\Author;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
// ESTO ES EN LUMEN
// EL CONTROLADOR ES PUENTE ENRE LA PETICION DEL USUARIO Y LA COSNTRUCCION Y ENVÍO DE RESPUESTA
//RELACIONA LA VISTA CON TODO LO DEMAS
// ESTAS SON LAS ACCIONES QUE USAN LAS RUTAS

class AuthorController extends Controller
{
    use ApiResponser; //generador de msjes de eror

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * retorna la lista de autores
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all(); //muestra todos los autores
        $authors = Author::first(); //trae el primer registro
        $authors = Author::find(25); //trae el registro 25
        $authors = Author::latest(); //Trae todos los registros de la base de datos, y los ordena de forma descendente
        $authors = Author::findOrFail(1); //Esto nos retornaría en la variable $project el registro cuyo id (project_id) sea igual 1, en caso de no encontrar el modelo Project, retornará un error que también quedará en la variable $project.
        $authors = Author::where('is_active', '=', 1)->firstOrFail();//En este ejemplo tendríamos una petición que traería el primer registro de proyectos cuyo campo is_active sea 1, si no encuentra el modelo, nos devuelve una excepción sin romperse.
        $authors = Author::where('age', '>', 200);
        DB::table('projects')->pluck('name'); //También tienes la opción de traer solo una columna de una tabla:

        $projects = Author::where('is_active', 0)
                ->orderBy('name', 'asc')
                ->take(2)
                ->get();
        return $this->successResponse($authors); //los devuelve en json
    }

    /**
     * Crea una instacia de un Author
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // reglas sobre cada uno de los campos
        $rules = [
            'name' => 'required|max:255',
            'gender' => 'required|max:255|in:male,female',
            'country' => 'required|max:255',
        ];

        $this->validate($request, $rules); //valida con las reglas, si no pasa tira un error

        $author = Author::create($request->all()); //crea la instancia y la inserta 

        return $this->successResponse($author, Response::HTTP_CREATED); //los devuelve en json y manda msje de exito
    }

    /**
     * Retorna un autor específico
     * @return Illuminate\Http\Response
     */
    public function show($author)
    {
        $author = Author::findOrFail($author); //lo busca y si no está tira error

        return $this->successResponse($author); //los devuelve en json
    }

    /**
     * Update detalles de un autor existente
     * @return Illuminate\Http\Response
     * pasar como param el autor
     */
    public function update(Request $request, $author)
    {
        $rules = [
            'name' => 'max:255',
            'gender' => 'max:255|in:male,female',
            'country' => 'max:255',
        ];

        $this->validate($request, $rules); //valida

        $author = Author::findOrFail($author); //busca

        $author->fill($request->all()); //carga el request en la variable

        if ($author->isClean()) { //si ese no valor cambio...
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY); //estado 422
        }

        $author->save(); //guarda los cambios

        return $this->successResponse($author); //msje de exito

    }

    /**
     * remueve un author existente
     * @return Illuminate\Http\Response
     */
    public function destroy($author)
    {
        $author = Author::findOrFail($author);

        $author->delete();

        return $this->successResponse($author);
    }

    // VALIDAR UN UPLOAD (VER EN PROFILECONTROLLER)
    // https://platzi.com/clases/2186-laravel-testing/34783-validacion/
    public function upload(Request $request)
    {
    	$request->validate([
            'photo' => 'required'
        ]);
        
        $request->file('photo')->store('profiles');

        return redirect('profile');
    }
}
