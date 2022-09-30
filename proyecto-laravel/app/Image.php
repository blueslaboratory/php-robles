<?php

// 359. Configurar entidades y relaciones

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // Le ponemos un nombre a la tabla diferente
    protected $table = 'images';
    
    // Relacion One to Many / de uno a muchos
    // me consigue el array de objetos de los comentarios
    public function comments(){
        return $this->hasMany('App\Comment')->orderBy('id', 'desc');
    }
    
    // Relacion One to Many 
    // sacar los likes que tiene 1 imagen
    public function likes(){
        return $this->hasMany('App\Like');
    }
    
    // Relacion Many to One
    // saca el objeto usuario cuyo user_id sea igual en User
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
