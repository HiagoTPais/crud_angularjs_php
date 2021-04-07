<?php

require '../model/contatos.class.php';
$contatos = new Contatos;

$contato = json_decode(file_get_contents("php://input"));

$nome = addslashes($contato->nome);
$telefone = addslashes($contato->telefone);
$email = addslashes($contato->email);

$contatos->adicionar($nome, $telefone, $email);


?>