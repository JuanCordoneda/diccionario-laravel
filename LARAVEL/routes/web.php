<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;
use Request;
0
//=======================================================================================
//FORMA OPTIMA DE TRABAJO
//=======================================================================================
Route::controller(AuthorController::class)->group(function () {
    Route::get('/authors', 'index')->name('autores');
    Route::post('/authors', 'store')->name('autores-post');
    Route::get('/authors/{author}', 'show')->name('autores-get');
    Route::put('/authors/{author}', 'update')->name('autores-put');
    Route::patch('/authors/{author}', 'update')->name('autores-patch');
    Route::delete('/authors/{author}', 'destroy')->name('autores-delete');
});
//=======================================================================================
//ACCIONES QUE DEBE REALIZAR EL CONTROLADOR
//=======================================================================================
Route::get('/', function () { //RUTA BASICA QUE DEVUELVE LA VISTA 'welcome'
    return view('welcome'); //retornar la vista
})->name('home'); //ruta

//RETORNAR REQUEST
Route::get('/', function (Request $request) { //RUTA BASICA QUE DEVUELVE LA VISTA 'welcome'
    return $request->all();
})->name('request');

// RETORNAR PARAMETROS
Route::get('/mostrar-fecha', function () {
    $titulo = "Estoy mostrando la fecha";
    return view('mostrar-fecha', array( //lo pasa como variable
        'titulo' => $titulo
    ));
})->name('retornar-param');

// condiciones para parámetros
Route::get('/pelicula/{titulo}/{year?}', function ($titulo = 'No hay peli seleccionada', $year = '2019') {
    return view('pelicula', array(
        'titulo' => $titulo    //SE PASA COMO PARAMETRO DE LA RUTA
    ));
})->where(array(    //se cumple la ruta si...
    'titulo' => '[a-zA-Z]+',  //condicion de mayuscukas y minusculas
    'year' => '[0-9]'       //solo alfanumerica
))->name('param-opcional');
// /pelicula/batman

// pasar parametros opcionales
Route::get('/pelicula/{titulo?}', function ($titulo = 'No hay peli seleccionada') {
    return view('pelicula', array(
        'titulo' => $titulo    //SE PASA COMO PARAMETRO DE LA RUTA
    ));
});


Route::get('/listado-peliculas', function () {
    $titulo = "Listado de peliculas";
    $listado = array('Batman', 'Spiderman', 'Gran Torino');
    return view('peliculas.listado')
        ->with('titulo', $titulo)   //manda variables comodamente al php
        ->with('listado', $listado);
});
//=======================================================================================
// GUARDAR ARCHIVOS  https://platzi.com/clases/2186-laravel-testing/34780-carga-de-archivos/
//=======================================================================================
Route::view('profile', 'profile');
Route::post('profile', [App\Http\Controllers\ProfileController::class, 'upload']); //VALIDAR Y GUARDAR