<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// https://platzi.com/clases/2186-laravel-testing/34783-validacion/
class ProfileController extends Controller
{
    public function upload(Request $request)
    {
    	$request->validate([
            'photo' => 'required'
        ]); //VALIDA
        
        $request->file('photo')->store('profiles'); //GUARDA

        return redirect('profile'); //REDIRECCIONA
    }
}
