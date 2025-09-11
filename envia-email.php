<?php
include_once 'BACKEND/Database/database.php';
include_once 'BACKEND/usuario.php';
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
$ok = registrarUsuario($db, $nome, $email, $senha);
if($ok > 0){
    echo 'Usuário registrado com sucesso';
}else{
    echo 'Erro ao registrar usuário';
}