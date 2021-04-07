<!DOCTYPE html>
<html  ng-app="listaTelefonica">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.css">
    <script src="libs/angular/angular.js"></script>
    <script src="assets/js/script.js"></script>
    <title>Crud</title>
</head>
<body ng-controller="listaTelefonicaCtrl" ng-init="listarContatos()">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">AngularJS CRUD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <br>
    <div class="container">
        <div class="float-left">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Adicionar</button>
        </div>
        <div class="float-right">
            <input type="text" class="form-control" ng-model="buscar" placeholder="Quem voce esta buscando?">
        </div>
        <br>
        <br>
        <table class="table table-striped">
            <tr>
                <th scope="col"><a ng-click="ordenarPor('nome')">Nome</a></th>
                <th scope="col"><a ng-click="ordenarPor('telefone')">Telefone</a></th>
                <th scope="col"><a ng-click="ordenarPor('email')">Email</a></th>
                <th scope="col">Ações</th>
            </tr>
            <tr ng-repeat="contato in contatos | filter: buscar | orderBy:ordenacao:direcao">
                <td>{{contato.nome}}</td>
                <td>{{contato.telefone}}</td>
                <td>{{contato.email}}</td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm" ng-click="listarUmContato(contato)" data-toggle="modal" data-target="#exampleModalEdit">Editar</button>
                    <button type="button" class="btn btn-danger btn-sm" ng-click="apagarContatos(contato)">Deletar</button>
                </td>
            </tr>
        </table>
    </div>

    <!-- Modal-Adicionar -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="contatoForm">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" ng-model="contato.nome" ng-required="true">
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control" name="telefone" ng-model="contato.telefone" ng-required="true" ng-pattern="/^\d{4}\d{4}$/">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" ng-model="contato.email" ng-required="true">
                        </div>
                    </form>
                    <div ng-show="contatoForm.telefone.$error.pattern" class="alert alert-danger">
                        O campo telefone deve ter 8 digitos.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Retornar</button>
                    <button type="submit" class="btn btn-primary" ng-click="adicionarContato(contato)" ng-disabled="contatoForm.$invalid">Enviar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal-Adicionar-End -->


    <!-- Modal-Editar -->
    <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="editarContatoForm">
                        <input type="hidden" name="id" ng-model="contatoEspecifico._id" value="{{contatoEspecifico._id}}">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" ng-model="contatoEspecifico.nome" value="{{contatoEspecifico.nome}}" ng-required="true">
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control" id="telefone" ng-model="contatoEspecifico.telefone" value="{{contatoEspecifico.telefone}}" ng-required="true" ng-pattern="/^\d{4}\d{4}$/">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" ng-model="contatoEspecifico.email" value="{{contatoEspecifico.email}}" ng-required="true">
                        </div>
                    </form>
                    <div ng-show="editarContatoForm.telefone.$error.pattern" class="alert alert-danger">
                        O campo telefone deve ter 8 digitos.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Retornar</button>
                    <button type="submit" class="btn btn-primary" ng-click="editarContato(contatoEspecifico)" ng-disabled="editarContatoForm.$invalid">Enviar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal-Editar-End -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>