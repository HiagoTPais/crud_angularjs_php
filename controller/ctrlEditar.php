<?php

require '../model/contatos.class.php';
$contatos = new Contatos;

$contato = json_decode(file_get_contents("php://input"));

$id = $contato->_id->{'$oid'};
$nome = addslashes($contato->nome);
$telefone = addslashes($contato->telefone);
$email = addslashes($contato->email);

$contatos->editar($nome, $telefone, $email, $id);

?>