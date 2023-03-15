<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
//SON TEST DE URLS Y ARCHIVOS EN EL STORE
//PARA ACTIVARLO EN TERMINAL: php artisan test
//PARA ACTIVARLO EN TERMINAL ESPECIFICO: php artisan test --filet testValidateEmail
class ExampleTest extends TestCase
{
// ================================================================================================================================================
// URLS
// ================================================================================================================================================
public function testHome() {
    $response = $this->get('/'); //si accedemos bien a la raiz 200
    $response->assertStatus(200); 
}
public function testAbout() {
    $response = $this->get('about'); //trata de acceder a about
    $response->assertStatus(200);
}
// ================================================================================================================================================
// CARGA DE ARCHIVOS   https://platzi.com/clases/2186-laravel-testing/34780-carga-de-archivos/
// ================================================================================================================================================
public function testUpload() 
{
    Storage::fake('local'); //configuracion falsa
    $response = $this->post('profile', [
        'photo' => $photo = UploadedFile::fake()->image('photo.png')
    ]); //cuando entras a la ruta profile y subis una foto, LLAMA AL CONTROLADOR
    Storage::disk('local')->assertExists("profiles/{$photo->hashName()}"); //revizando si existe el archivo
    $response->assertRedirect('profile'); //si funciona todo bien, redirecciona
}
}
