<?php

require '../model/contatos.class.php';
$contatos = new Contatos;

$contatos = $contatos->buscar();

$output = $contatos->toArray();

echo json_encode($output);

?>