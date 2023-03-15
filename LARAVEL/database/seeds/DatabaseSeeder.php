<?php

use App\Author;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * ACA SE LLAMA AL FACTORY,LLAMA 50 VECES AL MISMO.
     * CREATE LAS INCERTA EN LA BD. 
     * SE EJECUTA: php artisan db:seed
     *
     * @return void
     */
    public function run()
    {
        factory(Author::class, 50)->create();
        \App\Models\Audit::factory()->create(); //crea 1 registro
        \App\Models\Audit::factory()->create(50); //crea 50 registros
    }
}
