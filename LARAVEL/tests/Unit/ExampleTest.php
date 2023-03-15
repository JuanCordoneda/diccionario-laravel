<?php
use App\Helpers\Email;
use App\Models\User;
use App\Models\Post;
use App\Models\Tag;
use PHPUnit\Framework\TestCase;
//SON TEST DE FUNCIONES, VALIDACIONES Y BASES DE DATOS
//PARA ACTIVARLO EN TERMINAL: php artisan test
//PARA ACTIVARLO EN TERMINAL ESPECIFICO: php artisan test --filet testValidateEmail
class ExampleTest extends TestCase
{
    public function testBasicTest()
    {
        $var = true;
        $this->assertTrue($var); //si es true manda 200
    }
    // ================================================================================================================================================
    // METODOS  https://platzi.com/clases/2186-laravel-testing/34779-metodo-personalizado/
    // ================================================================================================================================================
    public function test_get_href() 
    {
        $post = new Post;
        $post->name = 'Proyecto en PHP';
        $this->assertEquals('blog/proyecto-en-php', $post->href()); //el resultado es igual al return de la funcion
    }
    // ================================================================================================================================================
    // BASES DE DATOS   https://platzi.com/clases/2186-laravel-testing/34784-database/
    // ================================================================================================================================================
    public function test_database() 
    {
        User::factory()->create([ //crea el registro
            'email'=>'i@admin.com'
        ]);
        $this->assertDatabaseHas('users', [  //valida si existe
            'email'=>'i@admin.com'
        ]);
        $this->assertDatabaseMissing('users', [ //valida si no existe
            'email'=>'noexist@admin.com'
        ]);
    }
    // ================================================================================================================================================
    // HELPERS (VALIDADORES)  https://platzi.com/clases/2186-laravel-testing/34776-el-resultado/
    // ================================================================================================================================================
    public function testValidateEmail() 
    {
        $result = Email::validate('i@admin.com'); //forma correcta de hacerlo
        $this->assertTrue($result); //valida si es true

        $result = Email::validate('i@@admin.com');
        $this->assertFalse($result); //valida si es falso
    }
    // ================================================================================================================================================
    // ACCESORES Y MUTADORES (GET - SET)  https://platzi.com/clases/2186-laravel-testing/34778-accessors-y-mutators/
    // ================================================================================================================================================
    public function test_set_name_in_lowercase()  //ACCESORES
    {
        $post = new Post;
        $post->name = 'Proyecto en PHP';
        $this->assertEquals('proyecto en php', $post->name);
    }
    public function test_get_slug()               //MUTADORES
    {
        $post = new Post;
        $post->name = 'Proyecto en PHP';
        $this->assertEquals('proyecto-en-php', $post->slug);
    }
    // ================================================================================================================================================
    // TESTEAR EL STORE (POST)  https://platzi.com/clases/2186-laravel-testing/34789-nuevo-registro/
    // ================================================================================================================================================
    public function testStore()
    {
    $this->post('tags', ['name'=>'PHP']); //POSTEA
    $this->assertRedirect('/'); //CHEKEA SI REDIRECCIONA
    $this ->assertDatabaseHas('tags', ['name'=>'PHP']); //CHEKEA QUE EXIST EN LA BD
    }
    // ================================================================================================================================================
    // TESTEAR EL DESTROY (DELETE)  https://platzi.com/clases/2186-laravel-testing/34790-eliminar-registro/
    // ================================================================================================================================================
    public function testDestroy() 
    {
        $tag = Tag::factory()->create(); //crea 
        $this->delete("tags/$tag->id"); //elimina
        $this->assertRedirect('/'); //CHEKEA SI REDIRECCION
        $this->assertDatabaseMissing('tags', ['name' => $tag->name]);  //CHEKEA QUE NO EXIST EN LA BD
    }
}
