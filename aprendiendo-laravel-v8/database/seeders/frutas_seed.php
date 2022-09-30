<?php

// Video: 345
// F:\wamp64-2\www\master-php\aprendiendo-laravel-v8>php artisan make:seed frutas_seed

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB; // En Laravel 8 hay que declarar la DB o dara error

class frutas_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<=20; $i++){
            DB::table('frutas')->insert(array(
                'nombre' => 'Cereza ' .$i,
                'descripcion' =>  'Descripcion de la fruta ' .$i,
                'precio' => $i,
                'fecha' => date('Y-m-d')
            ));
        }
        
        $this->command->info('La tabla de frutas ha sido rellenada');
    }
}
