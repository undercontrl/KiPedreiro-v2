<?php
namespace App\Kipedreiro\Controllers;

use App\Kipedreiro\Database\database;
use App\Kipedreiro\Models\usuario;

class usuarioController {
    public $usuario;                 
    public function __construct(){
        $this->db = Database::getInstance();
        $this->usuario = new usuario($this->db);
    }
    //  index
    public function index(){
        $resultado = $this->usuario->buscarUsuarios();
        return $resultado;
    }
    //  registrar
    
    //  login

    //  atualizar

    //  deletar

    //  chamada de API
}