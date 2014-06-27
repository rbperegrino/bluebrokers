angular.module('blueBrokers')
    .factory('dataFactory', ['$http', function($http) {

        var urlBase = 'http://localhost:8080/bluebrokers/server/api/';
        var dataFactory = {};

        dataFactory.getCategorias = function () {
            return $http.get(urlBase + 'categoria');
        };

        dataFactory.getSubcategoria = function (id) {
            return $http.get(urlBase + '/subcategoria/' + id);
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
