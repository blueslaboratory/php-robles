<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // https://laravel.com/docs/8.x/migrations
        // Video: 343
        // Youtube: PHP artisan migrate error in Laravel 8, illuminate\Database\QueryException
        
        /*
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id'); // me permite pasar el campo autoincrementable
            $table->string('nombre', 255);
            $table->string('email', 255);
            $table->string('password', 255);
            $table->string('edad');
            $table->string('sueldo');
            $table->timestamps();
        });
        */
        
        // Video: 344
        DB::statement("
            CREATE TABLE usuarios(
            id  int(255) auto_increment not null,
            nombre varchar(255),
            email varchar(255),
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
        Schema::drop('usuarios');
    }
}
