// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
// 'starter.controllers' is found in controllers.js
angular.module('blueBrokers', ['ionic', 'blueBrokers.controllers'])

.run(function($ionicPlatform) {
  $ionicPlatform.ready(function() {
    // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
    // for form inputs)
    if(window.cordova && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
    }
    if(window.StatusBar) {
      // org.apache.cordova.statusbar required
      StatusBar.styleDefault();
    }
  });
})

.config(function($stateProvider, $urlRouterProvider) {
  $stateProvider

    .state('app', {
      url: "/app",
      abstract: true,
      templateUrl: "templates/menu.html",
      controller: 'AppCtrl'
    })

    .state('app.search', {
      url: "/search",
      views: {
        'menuContent' :{
          templateUrl: "templates/search.html"
        }
      }
    })

    .state('app.naoEncontrou', {
      url: "/naoEncontrou",
      views: {
        'menuContent' :{
          templateUrl: "templates/naoencontrei.html"
        }
      }
    })
    .state('app.categorias', {
      url: "/categorias",
      views: {
        'menuContent' :{
          templateUrl: "templates/categorias.html",
          controller: 'CategoriasCtrl'
        }
      }
    })

    .state('app.categoria', {
      url: "/categorias/:categoriaId",
      views: {
        'menuContent' :{
          templateUrl: "templates/categoria.html",
          controller: 'CategoriaCtrl'
        }
      }
    })

    .state('app.subcategorias', {
      url: "/subcategorias/:subcategoriaId",
      views: {
          'menuContent' :{
              templateUrl: "templates/subcategoria.html",
              controller: 'SubcategoriaCtrl'
          }
      }
    })

  .state('app.produto', {
      url: "/produto/:produtoId",
      views: {
          'menuContent' :{
              templateUrl: "templates/produto.html",
              controller: 'ProdutoCtrl'
          }
      }
  })

.state('app.novoAnuncio', {
  url: "/novoAnuncio",
  views: {
      'menuContent' :{
          templateUrl: "templates/anuncio.html",
          controller: 'AnuncioCtrl'
      }
  }
})

.state('app.novoAnuncio2', {
  url: "/novoAnuncio2",
  views: {
      'menuContent' :{
          templateUrl: "templates/anuncio2.html",
          controller: 'Anuncio2Ctrl'
      }
  }
})

.state('app.novoAnuncio3', {
  url: "/novoAnuncio3/:categoriaId",
  views: {
      'menuContent' :{
          templateUrl: "templates/anuncio3.html",
          controller: 'Anuncio3Ctrl'
      }
  }
})


  .state('app.novoAnuncio4', {
      url: "/novoAnuncio4/:categoriaId/:subcategoriaId",
      views: {
          'menuContent' :{
              templateUrl: "templates/anuncio4.html",
              controller: 'Anuncio4Ctrl'
          }
      }
  })

.state('app.quemSomos', {
  url: "/quemSomos",
  views: {
      'menuContent' :{
          templateUrl: "templates/quem_somos.html"
      }
  }
});
  // if none of the above states are matched, use this as the fallback
  $urlRouterProvider.otherwise('/app/categorias');
});

