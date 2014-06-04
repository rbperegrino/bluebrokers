angular.module('blueBrokers.controllers', [])

.controller('AppCtrl', function($scope) {


})

.controller('CategoriasCtrl', function($scope) {
    $scope.categorias = [
        { nome: 'Barcos', id: 1 },
        { nome: 'Lanchas', id: 2 },
        { nome: 'Veleiros', id: 3 },
        { nome: 'JetSki', id: 4 }

    ];


})

.controller('CategoriaCtrl', function($scope, $stateParams) {

    $scope.subcategoria = [
        { nome: 'Vela', id: 1, categoria: $stateParams.categoriaId}
    ];




})

.controller('AnuncioCtrl', function($scope, $stateParams) {



})
