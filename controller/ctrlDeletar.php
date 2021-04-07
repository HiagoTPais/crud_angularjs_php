<?php

require '../model/contatos.class.php';
$contatos = new Contatos;

$dado = json_decode(file_get_contents("php://input"));

$id = $dado->{'$oid'};

$contatos->deletar($id);

?>