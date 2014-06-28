angular.module('blueBrokers.controllers', [])

.controller('AppCtrl', [ '$scope', function($scope) {


}])

.controller('CategoriasCtrl', ['$scope', 'dataFactory', function($scope, dataFactory) {

    getCategorias();

    function getCategorias(){
        dataFactory.getCategorias().success(function(data){
            $scope.categorias = data;
        });
    }




}])

.controller('CategoriaCtrl', ['$scope', '$stateParams', 'dataFactory' ,function($scope, $stateParams, dataFactory) {

    $scope.categoriaId = $stateParams.categoriaId;

    getSubcategorias($stateParams.categoriaId);

    function getSubcategorias(categoriaId){
        dataFactory.getSubcategorias(categoriaId).success(function(data){
            $scope.subcategorias = data;

        });
    }


    $scope.getPreviousTitle = function() {
        return '';
    };



}])

.controller('SubcategoriaCtrl', ['$scope','$stateParams', 'dataFactory' , function($scope, $stateParams, dataFactory) {

    $scope.subcategoriaId = $stateParams.subcategoriaId;

    $scope.produtos = [
        { nome: 'Barco ABC', id: 1, categoria: 'Barcos', subcategoria: 'Marca A', localizacao: 'Salvador - BA', valor: 'R$ 000.000,00', destaque: true},
        { nome: 'Barco GHI', id: 1, categoria: 'Barcos', subcategoria: 'Marca A', localizacao: 'Salvador - BA', valor: 'R$ 000.000,00', destaque: true},
        { nome: 'Barco DEF', id: 1, categoria: 'Barcos', subcategoria: 'Marca A', localizacao: 'Salvador - BA'},
        { nome: 'Barco XYZ', id: 1, categoria: 'Barcos', subcategoria: 'Marca A', localizacao: 'Salvador - BA', valor: 'R$ 000.000,00'}
    ];

        getAnuncios($stateParams.subcategoriaId);

        function getAnuncios(categoriaId){
            dataFactory.getAnuncios(categoriaId).success(function(data){
                $scope.anuncios = data;

            });
        }


        $scope.getPreviousTitle = function() {
            return '';
        };


    $scope.getPreviousTitle = function() {
        return '';
    };

}])

.controller('ProdutoCtrl', ['$scope','$stateParams','dataFactory',function($scope, $stateParams, dataFactory) {

        $scope.subcategoriaId = $stateParams.subcategoriaId;

        getAnuncio($stateParams.produtoId);

        function getAnuncio(anuncioId){
            dataFactory.getAnuncio(anuncioId).success(function(data){
                $scope.produto = data;
                console.log(data);
            });
        }

        /*$scope.produto =
        {
            nome: 'Barco XYZ',
            email: 'rbperegrino@globo.com',
            localizacao: 'Salvador - BA',
            valor: 'R$ 000.000,00',
            modelo: 'Teste',
            id: 1,
            descricao:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed vehicula dui. Aliquam feugiat sapien ut adipiscing consequat. Duis pharetra elementum tellus, in pulvinar elit tempor a. Curabitur a lectus lectus. Cras ac nunc in dolor lacinia interdum porta sed odio. Aenean tempus dictum libero, vitae tempus magna bibendum in. Sed cursus molestie ligula, nec mollis mi tristique sit amet. Nullam ac feugiat tellus. Ut sit amet vestibulum ligula. Aliquam bibendum mollis orci nec porta. Interdum et malesuada fames ac ante ipsum primis in faucibus.',
            categoria: 'Barcos',
            subcategoria: 'Marca A',
            fotos: [
                'http://www.reidaverdade.net/wp-content/uploads/2011/01/iate.jpg',
                'http://www.reidaverdade.net/wp-content/uploads/2011/01/iate.jpg',
                'http://www.reidaverdade.net/wp-content/uploads/2011/01/iate.jpg',
                'http://www.reidaverdade.net/wp-content/uploads/2011/01/iate.jpg'
            ],
            telefone: '71 3245-3199',
        }
        ;*/


        $scope.getPreviousTitle = function() {
            return '';
        };





    }])


.controller('AnuncioCtrl', ['$scope',function($scope) {



}])

.controller('Anuncio2Ctrl', ['$scope','$stateParams', 'dataFactory' ,function($scope, $stateParams, dataFactory) {

        getCategorias();

        function getCategorias(){
            dataFactory.getCategorias().success(function(data){
                $scope.categorias = data;
            });
        }


 }])

.controller('Anuncio3Ctrl', ['$scope','$stateParams', 'dataFactory',function($scope, $stateParams, dataFactory) {

        $scope.categoriaId = $stateParams.categoriaId;

        getSubcategorias($stateParams.categoriaId);

        function getSubcategorias(categoriaId){
            dataFactory.getSubcategorias(categoriaId).success(function(data){
                $scope.subcategorias = data;

            });
        }


}])

.controller('Anuncio4Ctrl', ['$scope','$stateParams', '$http',function($scope, $stateParams, $http) {

    $scope.categoriaId = $stateParams.categoriaId;
    $scope.subcategoriaId = $stateParams.subcategoriaId;

   $scope.anuncio = {};

    $scope.titulos = {
        categoria : 'Barcos',
        subcategoria : 'Marca A'
        }

    $scope.enviaAnuncio = function(eValido) {
           // if(eValido){
                console.log(this.anuncio);
           // }
        }


}])

;
