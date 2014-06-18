angular.module('blueBrokers.controllers', [])

.controller('AppCtrl', [ '$scope', function($scope) {


}])

.controller('CategoriasCtrl', ['$scope', function($scope) {
    $scope.categorias = [
        { nome: 'Barcos', id: 1 },
        { nome: 'Jetski', id: 2 },
        { nome: 'Motos Vip', id: 3 },
        { nome: 'Veleiros', id: 4 },
        { nome: 'Imóveis', id: 5 },
        { nome: 'Aeronaves', id: 6 },
        { nome: 'Ultra Steamer', id: 7 }
    ];


}])

.controller('CategoriaCtrl', ['$scope', '$stateParams',function($scope, $stateParams) {

    $scope.categoriaId = $stateParams.categoriaId;

    $scope.subcategorias = [
        { nome: 'Marca A', id: 1, categoria: 'Barcos'},
        { nome: 'Marca B', id: 2, categoria: 'Barcos'},
        { nome: 'Marca C', id: 3, categoria: 'Barcos'}
    ];

    $scope.getPreviousTitle = function() {
        return '';
    };



}])

.controller('SubcategoriaCtrl', ['$scope','$stateParams', function($scope, $stateParams) {

    $scope.categoriaId = $stateParams.categoriaId;

    $scope.produtos = [
        { nome: 'Barco ABC', id: 1, categoria: 'Barcos', subcategoria: 'Marca A', localizacao: 'Salvador - BA', valor: 'R$ 000.000,00', destaque: true},
        { nome: 'Barco GHI', id: 1, categoria: 'Barcos', subcategoria: 'Marca A', localizacao: 'Salvador - BA', valor: 'R$ 000.000,00', destaque: true},
        { nome: 'Barco DEF', id: 1, categoria: 'Barcos', subcategoria: 'Marca A', localizacao: 'Salvador - BA'},
        { nome: 'Barco XYZ', id: 1, categoria: 'Barcos', subcategoria: 'Marca A', localizacao: 'Salvador - BA', valor: 'R$ 000.000,00'}
    ];


    $scope.getPreviousTitle = function() {
        return '';
    };

}])

.controller('ProdutoCtrl', ['$scope','$stateParams','$ionicModal',function($scope, $stateParams, $ionicModal) {

        $scope.subcategoriaId = $stateParams.subcategoriaId;

        $scope.produto =
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
            telefones: {
                claro : '71 88725470',
                oi : '71 88725470',
                tim : '71 88725470',
                vivo : '71 88725470'
            }
        }
        ;

        $ionicModal.fromTemplateUrl('modal.html', {
            scope: $scope,
            animation: 'slide-in-up'
        }).then(function(modal) {
            $scope.modal = modal;
        });
        $scope.openModal = function() {
            $scope.modal.show();
        };
        $scope.closeModal = function() {
            $scope.modal.hide();
        };
        //Cleanup the modal when we're done with it!
        $scope.$on('$destroy', function() {
            $scope.modal.remove();
        });
        // Execute action on hide modal
        $scope.$on('modal.hide', function() {
            // Execute action
        });
        // Execute action on remove modal
        $scope.$on('modal.removed', function() {
            // Execute action
        });

        $scope.getPreviousTitle = function() {
            return '';
        };





    }])


.controller('AnuncioCtrl', ['$scope',function($scope) {



}])

.controller('Anuncio2Ctrl', ['$scope','$stateParams',function($scope, $stateParams) {
        $scope.categorias = [
            { nome: 'Barcos', id: 1 },
            { nome: 'Jetski', id: 2 },
            { nome: 'Motos Vip', id: 3 },
            { nome: 'Veleiros', id: 4 },
            { nome: 'Imóveis', id: 5 },
            { nome: 'Aeronaves', id: 6 },
            { nome: 'Ultra Steamer', id: 7 }
        ];


 }])

.controller('Anuncio3Ctrl', ['$scope','$stateParams',function($scope, $stateParams) {

        $scope.categoriaId = $stateParams.categoriaId;

        $scope.subcategorias = [
            { nome: 'Marca A', id: 1, categoria: 'Barcos'},
            { nome: 'Marca B', id: 2, categoria: 'Barcos'},
            { nome: 'Marca C', id: 3, categoria: 'Barcos'}
        ];


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
