<?php
namespace App\Kipedreiro\Models;
use PDO;
class usuario{
    private $id_usuario;
    private $nome_usuario;
    private $email_usuario;
    private $senha_usuario;
    private $tipo_usuario;
    private $status_usuario;
    private $criado_em;
    private $atualizado_em;
    private $excluido_em;
    // O construtor inicializa a classe e/ou atributos
    public function __construct($db){
        $this->db = $db;
    }
    //método de buscar todos os usuarios
    function buscarUsuarios(){
        $sql = 'SELECT * FROM tbl_usuario WHERE excluido_em IS NULL';
        $statement = $this->db->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    //método de buscar todos os usuários por email
    function buscarUsuariosPorEmail($email){
        $sql = 'SELECT * FROM tbl_usuario where email_usuario = :email AND excluido_em IS NULL';
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    //método de inserir usuário
    function inserirUsuario($nome, $email, $senha, $tipo, $status){
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO tbl_usuario (nome_usuario, email_usuario, senha_usuario, tipo_usuario, status_usuario) VALUES (:nome, :email, :senha, :tipo, :status)';
        $statement->bindParam(' :nome', $nome);
        $statement->bindParam(' :email', $email);
        $statement->bindParam(' :senha', $senha);
        $statement->bindParam(' :tipo', $tipo);
        $statement->bindParam(' :status', $status);
        if($statement->execute()){
            return $this->db->lastInsertId();
        }else{
            return false;
        }
    }
    //método de atualizar o usuário
    function atualizarUsuario($id, $nome, $email, $senha, $tipo, $status){
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $dataAtual = date('Y-m-d H:i:s');
        $sql = 'UPDATE tbl_usuario SET nome_usuario = :nome,
         email_usuario = :email, 
         senha_usuario = :senha, 
         tipo_usuario = :tipo, 
         status_usuario = :status, 
         atualizado_em = :atual 
         WHERE id_usuario = :id';
        $statement->bindParam(' :id', $id);
        $statement->bindParam(' :nome', $nome);
        $statement->bindParam(' :email', $email);
        $statement->bindParam(' :senha', $senha);
        $statement->bindParam(' :tipo', $tipo);
        $statement->bindParam(' :status', $status);
        $statement->bindParam(' :atual', $dataAtual);
        if($statement->execute()){
            return true;
        }else{
            return false;
        }
    }
    //método de deletar o usuário
    function excluirUsuario($id){
        $dataAtual = date('Y-m-d H:i:s');
        $sql = "UPDATE tbl_usuario SET excluido_em = :atual WHERE id_usuario = :id";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':atual', $dataAtual);
        if($statement->execute()){
            return true;
        }else{
            return false;
        }
    }
}