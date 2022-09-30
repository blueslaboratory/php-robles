<?php

class Configuracion{
    
    public static $color;
    public static $newsletter;
    public static $entorno;
    
    
    // Click raton boton derecho: insert code
    // Getters
    public static function getColor() {
        return self::$color;
        // self es equivalente a this cuando la propiedad es estatica
    }
    public static function getNewsletter() {
        return self::$newsletter;
    }
    public static function getEntorno() {
        return self::$entorno;
    }

    
    // Setters
    public static function setColor($color): void {
        self::$color = $color;
    }
    public static function setNewsletter($newsletter): void {
        self::$newsletter = $newsletter;
    }
    public static function setEntorno($entorno): void {
        self::$entorno = $entorno;
    }


}