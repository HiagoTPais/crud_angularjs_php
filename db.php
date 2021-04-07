<?php

require 'libs/vendor/autoload.php';

$db = new MongoDB\Client;

$crud = $db->crud;

$resultado = $crud->createCollection('contatos');

$contatos = $crud->contatos;


$contatos->insertMany([
                    ['nome' => "Ana", 'telefone' => "98941654", 'email' => "ana@gmail.com"],
                    ['nome' => "Carlos", 'telefone' => "98412657", 'email' => "carlos@gmail.com"],
                    ['nome' => "Maria", 'telefone' => "99876521", 'email' => "maria@gmail.com"]
                    ]);

