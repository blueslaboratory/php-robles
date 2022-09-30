<?php
// Video 235
// http://localhost/master-php/aprendiendo-php-poo/12-autoload/

require_once 'autoload.php';

/*
- Te ahorras todos los required con el autoload.php
require_once 'clases/usuario.php';
require_once 'clases/categoria.php';
require_once 'clases/entrada.php';
*/

/*

$usuario = new Usuario();
echo $usuario->nombre;
echo "<br/>";
echo $usuario->email;

$categoria = new Categoria();
echo "<br/>".$categoria->nombre;

*/

// ESPACIOS DE NOMBRES Y PAQUETES

use MisClases\Usuario; // te ahorra el: $this->usuario = new MisClases\Usuario();
use MisClases\Categoria;
use MisClases\Entrada;
// use PanelAdministrador\Usuario; //esto no se puede, hay que renombrar
use PanelAdministrador\Usuario as UsuarioAdmin;

// use MisClases\Usuario, MisClases\Categoria, MisClases\Entrada;

class Principal{
    public $usuario;
    public $categoria;
    public $entrada;
    
    public function __construct(){
        // Esto solo me lo deja hacer si comento el namespace de usuario.php
        // $this->usuario = new Usuario();
        
        // Con el namespace conviene hacer una carpeta con el mismo nombre que 
        // el del namespace
        $this->usuario = new Usuario();
        $this->categoria = new Categoria();
        $this->entrada = new Entrada();        
    }
    
    // Click derecho: insert code para los getters y los setters
    // GETTERS
    function getUsuario() {
        return $this->usuario;
    }
    function getCategoria() {
        return $this->categoria;
    }
    function getEntrada() {
        return $this->entrada;
    }

    // SETTERS
    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }
    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }
    function setEntrada($entrada) {
        $this->entrada = $entrada;
    }
    
    function informacion(){
        echo __CLASS__ ."<br/>";
        echo __METHOD__ ."<br/>";
        echo __FILE__ ."<br/>";
        echo __NAMESPACE__ ."<br/>";
    }

}

// Objeto principal
$principal = new Principal();
echo "--------- Informacion --------- </br>";
$principal->informacion();
echo "--------- Final de informacion ---------";

var_dump($principal->usuario);
var_dump(get_class_methods($principal));
$metodos = get_class_methods($principal);
echo "</br> ---------  0  --------- </br>";

// Objeto de otro paquete (namespace)
// $usuario = new PanelAdministrador\Usuario();
$usuario = new UsuarioAdmin();
var_dump($usuario);
$usuario->informacion();

echo "</br> ---------  1  --------- </br>";
$busqueda = array_search('setApellidos', $metodos);
var_dump($busqueda); // devuelve si el metodo existe y la posicion
$busqueda = array_search('setUsuario', $metodos);
var_dump($busqueda); // devuelve si el metodo existe y la posicion

echo "</br> ---------  2  --------- </br>";
// Comprobar si existe una clase
$clase = @class_exists('MisClases\Usuario');
// $clase = class_exists('PanelAdministrador\Usuario');
// El arroba me esconde los warnings

if($clase){
    echo "<h1>La clase SI existe </h1>";
}else{
    echo "<h1>La clase NO existe </h1>";
}