<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// 343. Migraciones
// 344. Migraciones con SQL

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Ha habido que agregar el dropIfExists, pero esto no se deberia de hacer en prod
        // Vale pues solo habia que borrar las tablas y un poco de magia de stackoverflow
        // Schema::dropIfExists('usuarios');
        /*
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 255);
            $table->string('email', 255);
            $table->string('password', 255);
            $table->integer('edad');
            $table->integer('sueldo');
            $table->timestamps();
        }); 
        */
        
        // Esto hace lo mismo que el codigo de arriba (le faltan un par de campos)
        DB:: statement("
            CREATE TABLE usuarios(
            id int(255) auto_increment not null,
            nombre varchar(255),
            email varchar (255),
            password varchar(255),
            PRIMARY KEY(id)
        );");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            Schema::dropIfExists('usuarios');
        });
    }
}
