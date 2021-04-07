<?php

require '../libs/vendor/autoload.php';

class Contatos  {
    public $cliente;
    public $crud;
    public $contatos;

    public function __construct(){
        $this->cliente = new MongoDB\Client('mongodb://127.0.0.1:27017');
        $this->crud = $this->cliente->crud;
        $this->contatos = $this->crud->contatos;
    }

    public function buscar(){
        $documentos = $this->contatos->find([]);
        return $documentos;
    }

    public function buscarUm($id){
        $documentos = $this->contatos->find(['_id' => new MongoDB\BSON\ObjectID($id)])->toArray();
        return $documentos;
    }

    public function adicionar($nome, $telefone, $email){
        $this->contatos->insertOne(['nome' => $nome, 'telefone' => $telefone, 'email' => $email]);
    }

    public function editar($nome, $telefone, $email, $id){
        $this->contatos->updateOne(
            ['_id' => new MongoDB\BSON\ObjectID($id)], 
            ['$set' => ['nome' => $nome, 'telefone' => $telefone, 'email' => $email]]
        );
    }

    public function deletar($id){
        $this->contatos->deleteOne(['_id' => new MongoDB\BSON\ObjectID($id)]);
    }
}

?>