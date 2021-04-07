<?php

require '../model/contatos.class.php';
$contatos = new Contatos;

$dado = json_decode(file_get_contents("php://input"));

$contato = $contatos->buscarUm($dado->{'$oid'});

echo json_encode($contato);

?>