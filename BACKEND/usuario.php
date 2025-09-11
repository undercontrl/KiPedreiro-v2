<?php
include_once 'Database/database.php';
/* Executa uma instrução preparada passando um array de valores */
function buscaUsuario($db){
    $sql = 'SELECT nome_usuario, email_usuario
    FROM tbl_usuario
    WHERE id_usuario = :id';
    $statement = $db->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $statement->execute(['id' => 2]);
    return $resultado = $statement->fetchAll();
}
function registrarUsuario($db, $nome, $email, $senha){
    $sql = 'INSERT INTO tbl_usuario (nome_usuario, email_usuario, senha_usuario)
    VALUES (:nome, :email, :senha)';
    $statment = $db->prepare($sql);
    $statment->bindParam(':nome', $nome);
    $statment->bindParam(':email', $email);
    $statment->bindParam(':senha', $senha);
    return $statment->execute();
}
$ok = registrarUsuario($db, 'Ariane', 'Ariane@xxx.com', '5132053210');
echo $ok ? 'Usuário registrado com sucesso' : 'Erro ao registrar usuário';
// $resultado = buscaUsuario($db);
// var_dump($resultado);