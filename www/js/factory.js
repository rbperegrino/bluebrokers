angular.module('blueBrokers')
    .factory('dataFactory', ['$http', function($http) {

        var urlBase = 'http://localhost/bluebrokerAPI/api/';
        var dataFactory = {};

        dataFactory.getCategorias = function () {
            return $http.get(urlBase + 'categoria');
        };

        dataFactory.getCustomer = function (id) {
            return $http.get(urlBase + '/' + id);
        };

        dataFactory.insertCustomer = function (cust) {
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
