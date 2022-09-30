<?php

// http://localhost/master-php/proyecto-php-poo/?controller=producto&action=index
// http://localhost/master-php/proyecto-php-poo/producto/index

require_once 'models/producto.php';

class productoController{
    public function index() {
        $producto = new Producto();
        $productos = $producto->getRandom(6);
        
        // var_dump($productos->fetch_object());
        // var_dump($productos->num_rows);
        // echo "Controlador Productos, Accion index";       
        // Renderizar vista
        require_once 'views/producto/destacados.php';
    }
    
    public function ver(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            
            $producto = new Producto();
            $producto->setId($id);
            
            $product = $producto->getOne();
        }
        
        require_once 'views/producto/ver.php';
    }
    
    public function gestion(){
        Utils::isAdmin();
        
        $producto = new Producto();
        $productos = $producto->getAll();
        
        require_once 'views/producto/gestion.php';
    }
    
    public function crear() {
        Utils::isAdmin();
        require_once 'views/producto/crear.php';       
    }
    
    public function save(){
        Utils::isAdmin();
        if(isset($_POST)){
            // var_dump($_POST);
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            // $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
            
            if($nombre && $descripcion &&$precio && $stock && $categoria){
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoria_id($categoria);
                
                // Guardar la imagen
                if(isset($_FILES['imagen'])){
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];
                    // https://developer.mozilla.org/es/docs/Web/HTTP/Basics_of_HTTP/MIME_types/Common_types

                    // Debugueando
                    // var_dump($file);
                    // die();

                    if($mimetype == "image/jpg" || 
                       $mimetype == 'image/jpeg' ||
                       $mimetype == 'image/png' ||
                       $mimetype == 'image/git'){

                       if(!is_dir('uploads/images')){
                           mkdir('uploads/images', 0777, true); 
                           // parametro true: para directorios recursivos
                       }

                       $producto->setImagen($filename);
                       move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);

                    }
                }
                
                // Esto diferencia si va para la edicion o va para el guardado:
                if(isset($_GET['id'])){                    
                    $id = $_GET['id'];
                    $producto->setId($id);
                    
                    $save = $producto->edit();
                    
                }else{
                    $save = $producto->save();
                }
                
                if($save){
                    $_SESSION['producto'] = "complete";
                }else{
                    $_SESSION['producto'] = "failed";
                }
            }else{
                $_SESSION['producto'] = "failed";
            }
            
        }else{
            $_SESSION['producto'] = "failed";
        }
        
        header('Location:'.base_url.'producto/gestion');
        
    }
    
    public function editar(){
        // var_dump($_GET);
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;
            
            $producto = new Producto();
            $producto->setId($id);
            
            $pro = $producto->getOne();
            
            require_once 'views/producto/crear.php';
        }else{
            header('Location:'.base_url.'producto/gestion');
        }
    }

    public function eliminar(){
        //var_dump($_GET);
        Utils::isAdmin();
        
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            
            $delete = $producto->delete();
            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }
        
        header('Location:'.base_url.'producto/gestion');
    }
}