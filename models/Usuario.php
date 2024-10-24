<?php
namespace Model;

class Usuario extends ActiveRecord {
    //Base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id','nombre','admin','contraseña', 'email'];

    public $id;
    public $nombre;
    public $admin;
    public $contraseña;
    public $email;
    public $token;

    public function __construct($args=[]) {
        $this->id = $args['id'] ?? NULL;
        $this->nombre = $args['nombre'] ?? '';
        $this->admin = $args['admin'] ?? 0;
        $this->contraseña = $args['contraseña'] ?? '';
        $this->email = $args['email'] ?? NULL;
        $this->token = $args['token'] ?? NULL;
    }

    public function validarLogin() {
        if (!$this->contraseña) {
            self::$alertas['error'][]= 'El campo contraseña es obligatorio';
        }
        return self::$alertas;
    }


    public function comprobarPassword($contraseña) {
        $resultado = password_verify($contraseña, $this->contraseña);
        
        if (!$resultado) {
            return false;
        } else {
            return true;
        }
    }

    
}


?>