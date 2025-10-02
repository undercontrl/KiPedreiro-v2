<?php
session_start();

var_dump($_SESSION);

$_SESSION ["pessoa"] = [
    "nome" => "Malu",
];

var_dump($_SESSION);

$_SESSION ["pessoa"] = ['idade' => 24];

var_dump($_SESSION["pessoa"]["idade"]);