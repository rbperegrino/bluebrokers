angular.module('blueBrokers')
    .factory('dataFactory', ['$http', function($http) {

        var urlBase = 'http://localhost/bluebrokers/server/api/';
        var dataFactory = {};

        dataFactory.getCategorias = function () {
            return $http.get(urlBase + 'categoria');
        };

        dataFactory.getSubcategorias = function (id) {
            return $http.get(urlBase + 'subcategoria/' + id);
        };

        dataFactory.getAnuncios = function (id) {
            return $http.get(urlBase + 'anuncios/' + id);
        };

        dataFactory.getAnuncio = function (id) {
            return $http.get(urlBase + 'anuncio/' + id);
        };

        dataFactory.setAnuncio = function (cust) {
            return $http.post(urlBase, cust);
        };

        dataFactory.updateCustomer = function (cust) {
            return $http.put(urlBase + '/' + cust.ID, cust)
        };

        dataFactory.deleteCustomer = function (id) {
            return $http.delete(urlBase + '/' + id);
        };

        dataFactory.getOrders = function (id) {
            return $http.get(urlBase + '/' + id + '/orders');
        };

        return dataFactory;
    }]);
