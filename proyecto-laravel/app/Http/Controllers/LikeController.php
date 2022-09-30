<?php

//389. Método Like
//390. Método dislike
//396. Listar likes

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;

class LikeController extends Controller
{
    // Solo te deja acceder con autentificacion
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        // Likes solo del usuario identificado:
        $user = \Auth::user();
        $likes = Like::where('user_id', $user->id)->orderBy('id', 'desc')
                                                  ->paginate(4);
        
        return view('like.index',[
            'likes' => $likes
        ]);
    }
    
    public function like($image_id){
        // Recoger datos del usuario y la imagen
        $user = \Auth::user();
        
        // Condicion para ver si existe el like y no duplicarlo
        $isset_like = Like::where('user_id', $user->id)
                            ->where('image_id', $image_id)
                            ->count();
                            
        /*
        var_dump($isset_like);
        die();
        */
        
        if($isset_like == 0){
            $like = new Like();
            $like->user_id = $user->id;
            $like->image_id = (int)$image_id;

            // Guardar
            $like->save();

            //var_dump($like);
            
            return response()->json([
                'like' => $like
            ]);
        }
        else{
            return response()->json([
                'message' => 'El like ya existe'
            ]);
            
        }
        
    }
    
    public function dislike($image_id){
        // Recoger datos del usuario y la imagen
        $user = \Auth::user();
        
        // Condicion para ver si existe el like y no duplicarlo
        $like = Like::where('user_id', $user->id)
                            ->where('image_id', $image_id)
                            ->first();
                            
        /*
        var_dump($isset_like);
        die();
        */
        
        if($like){
            
            // Eliminar like
            $like->delete();

            //var_dump($like);
            
            return response()->json([
                'like' => $like,
                'message' => 'Has dado dislike correctamente'
            ]);
        }
        else{
            return response()->json([
                'message' => 'El like no existe'
            ]);
            
        }
        
    }
    
    
    
}
