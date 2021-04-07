  
angular.module("listaTelefonica", []);

angular.module("listaTelefonica").controller("listaTelefonicaCtrl", function($scope, $http){
    
    $scope.contatos = [];
    
    $scope.umcontato = [];
    
    $scope.listarContatos = function(){
        $http.get("controller/ctrlBuscar.php").then(function(data){
            $scope.contatos = data.data;
        });
    }

    $scope.listarUmContato = function(contato){
        $http.post("controller/ctrlBuscarUm.php", contato._id).then(function(data){
            $scope.contatoEspecifico = data.data[0];
        });
    }

    $scope.adicionarContato = function(contato){
        $http.post('controller/ctrlAdicionar.php', contato).then(function(data){
            delete $scope.contato;
            $scope.listarContatos();
        });
        
    }

    $scope.editarContato = function(contato){
        console.log(contato);
        $http.post('controller/ctrlEditar.php', contato).then(function(data){
            delete $scope.contatoEspecifico;
            $scope.listarUmContato(contato);
            $scope.listarContatos();
        });
        
    }

    $scope.apagarContatos = function(contato){
        $http.post('controller/ctrlDeletar.php', contato._id).then(function(data){
            delete $scope.contato;
            $scope.listarContatos();
        });
    }

    $scope.ordenarPor = function(campo){
        $scope.ordenacao = campo;
        $scope.direcao = !$scope.direcao;
    }

});