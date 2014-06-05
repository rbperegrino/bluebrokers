angular.module('blueBrokers.controllers', [])

.controller('AppCtrl', [ '$scope', function($scope) {


}])

.controller('CategoriasCtrl', ['$scope', function($scope) {
    $scope.categorias = [
        { nome: 'Barcos', id: 1 },
        { nome: 'Jetski', id: 2 },
        { nome: 'Motos Vip', id: 3 },
        { nome: 'Veleiros/Catamarãs', id: 4 },
        { nome: 'Imóveis', id: 5 },
        { nome: 'Aeronaves', id: 6 },
        { nome: 'Ultra Steamer', id: 7 }
    ];


}])

.controller('CategoriaCtrl', ['$scope', '$stateParams',function($scope, $stateParams) {

        $scope.categoriaId = $stateParams.categoriaId;

        $scope.subcategorias = [
            { nome: 'Vela', id: 1, categoria: 'Barcos'}
        ];

        $scope.getPreviousTitle = function() {
            return '';
        };



    }])

    .controller('SubcategoriaCtrl', ['$scope','$stateParams', function($scope, $stateParams) {

        $scope.categoriaId = $stateParams.categoriaId;

        $scope.produtos = [
            { nome: 'Barco XYZ', id: 1, categoria: 'Barcos', subcategoria: 'Vela'}
        ];


        $scope.getPreviousTitle = function() {
            return '';
        };

    }])

.controller('ProdutoCtrl', ['$scope','$stateParams',function($scope, $stateParams) {

        $scope.subcategoriaId = $stateParams.subcategoriaId;

        $scope.produto =
        {
            nome: 'Barco XYZ',
            email: 'rbperegrino@globo.com',
            modelo: 'Teste',
            id: 1,
            categoria: 'Barcos',
            subcategoria: 'Vela',
            fotos: [
                'http://ionicframework.com/img/docs/delorean.jpg',
                'http://www.globo.com/imagem2.jpg',
                'http://www.globo.com/imagem3.jpg',
                'http://www.globo.com/imagem4.jpg'
            ],
            telefones: {
                claro : '71 88725470',
                oi : '71 88725470',
                tim : '71 88725470',
                vivo : '71 88725470'
            }
        }
        ;

        $scope.getPreviousTitle = function() {
            return '';
        };



    }])


.controller('AnuncioCtrl', ['$scope','$stateParams',function($scope) {



 }])
;
