<?php
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
|   CREA INSTANCIAS DE UN MODELO ESPECIFICO Y LOS SUBE A LA BASE DE DATOS
|   ESTOS CAMPOS DEBENE STAR EN 
*/
// fAKER GENERADOR DE REGISTROS ALEATORIOS DE BASES DE DATOS
$factory->define(App\Author::class, function (Faker\Generator $faker) {
    return [
        'gender' => $gender = $faker->randomElement(['male', 'female']), //GENERADOR ENTRE MALE Y FEMALE
        'name' => $faker->name($gender), //CREA NOMBRE A TRAVEZ DEL GENERO
        'country' => $faker->country, 
        'title' => $this->faker->sentence(), //horacion falsa
        'body' => $this->faker->text(2200), //gran texto
        'name' => $this->faker->name(),
        'email' => $this->faker->unique()->safeEmail(),
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        ];
    });

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}