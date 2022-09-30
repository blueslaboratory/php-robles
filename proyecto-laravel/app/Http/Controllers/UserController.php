<?php

//365. Formulario de configuración
//367. Validar el formulario de configuración
//369. Subir imagen de usuario
//370. Mostrar avatar
//372. Solo para usuarios identificados
//398. Perfil de usuario
//406. Página de gente
//407. Método del buscador


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\User;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function config(){
        return view('user.config');
    }
    
    public function update(Request $request){
        

        // Conseguir el usuario identificado
        $user = \Auth::user();
        $id = \Auth::user()->id;
        
        // Validacion del formulario
        $validate = $this->validate($request,[
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'nick' => 'required|string|max:255|unique:users,nick,'.$id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        ]);
        
        // Recoger datos del formulario
        $id = \Auth::user()->id;
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');
        
        // Asignar nuevos valores al objeto del usuario
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;
        
        /*
        var_dump($id);
        var_dump($name);
        var_dump($surname);
        
        die();
        */
        
        // Subir la imagen
        $image_path = $request->file('image_path');
        if($image_path){
            // Poner un nombre unico
            $image_path_name = time().$image_path->getClientOriginalName();
            
            // Guardar en la carpeta storage/app/users
            Storage::disk('users')->put($image_path_name, File::get($image_path));
            
            // Seteo el nombre de la imagen en el objeto
            $user->image = $image_path_name;
        }
        //var_dump($image_path);
        //die();
        
        // Ejecutar consulta y cambios en la base de datos
        $user->update();
        
        return redirect()->route('config')
                         ->with(['message'=>'Usuario actualizado correctamente']);
        
    }
    
    
    
    public function getImage($filename){
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200);
    }
        
        
    public function profile($id){
        $user = User::find($id);
        
        return view('user.profile',[
            'user' => $user,
        ]);
    }
    
    public function index($search = null){
        if(!empty($search)){
            $users = User::where('nick', 'LIKE', '%'.$search.'%')
                    ->orWhere('name', 'LIKE', '%'.$search.'%')
                    ->orWhere('surname', 'LIKE', '%'.$search.'%')
                    ->orderBy('id', 'desc')
                    ->paginate(4);
        }
        else{
            $users = User::orderBy('id', 'desc')->paginate(4);
        }

        return view('user.index',[
            'users' => $users
        ]);
    }
}