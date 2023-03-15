<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
     * INDICA CUALES SON LOS ATRIBUTOS QUE SE PUEDEN ASIGNAR DE MANERA MASIVA
     * (SE PUEDEN ASIGNAR TODOS DE UNA SOLA VEZ CON create())
     * @var array
     */
    protected $fillable = [
        'name',
        'gender',
        'country',
    ];

        /**
     * ATRIBUTOS OCULTOS AL MOMENTO DE MOSTRARLOS EN NUESTRO SERVICIO
     * @var array
     */
    protected $hidden = [
        'name',
        'gender',
        'country',
    ];
}
