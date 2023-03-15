<?php

namespace App\Traits;

use Illuminate\Http\Response;

// esta se llama en el controller para generar msjes de errores
trait ApiResponser
{
    /**
     * PUEDEN SER UTILIZADOS EN DIFERENTES CLASES, MODELOS Y CONTROLADORES
     * CREA RESPUESTAS DE MANERA ESTANDARIZADA
     * @param  string|array $data
     * @param  int $code
     * @return Illuminate\Http\JsonResponse
     */

    //  RESPUESTAS DE EXITO
    public function successResponse($data, $code = Response::HTTP_OK)
    {
        // RTA JSON
        // 'data'=campo de json
        // $data= variable de informacion como param
        //$code= codigo de estado HTTP_OK = 200
        return response()->json(['data' => $data], $code);
    }

    /**
     * Build error responses
     * @param  string $message
     * @param  int $code
     * @return Illuminate\Http\JsonResponse
     */

    //  RESPUESTAS DE ERROR 
    public function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }
}
