<?php

// 359. Configurar entidades y relaciones

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
     
    // Relacion Many to One
    // saca el objeto usuario cuyo user_id sea igual en User
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
    
    // Relacion Many to One
    public function image(){
        return $this->belongsTo('App\Image', 'image_id');
    }
}
