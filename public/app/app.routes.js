'use strict';

angular.module('gifAggro')

    .config(config);

function config($stateProvider, $urlRouterProvider) {
    $urlRouterProvider.otherwise('/');

    $stateProvider
        .state('home', {
            url: '/',
            //views: {
            //    '': { templateUrl: 'public/app/components/home/home.html'},
            //    'nav@home': { templateUrl: 'public/app/components/core/header/header.php' },
            //    //'body@home': { templateUrl: './templates/body.html'},
            //    'footer@home': { templateUrl: 'public/app/components/core/footer/footer.php' }
            //},
            templateUrl: 'public/app/components/home/home.html',
            controller: 'HomeCtrl',
            controllerAs: 'vm'
        })

        .state('home.list2', {
            url: '/list2',
            template: 'I could sure use a drink right now.',
            controller: function($scope) {
                $scope.dogs = ['Bernese', 'Husky', 'Goldendoodle'];
            }
        })

        .state('home.paragraph', {
            url: '/paragraph',
            template: 'I could sure use a mariguana right now.'
        })

        .state('list', {
            url: '/list',
            templateUrl: 'public/app/components/list/list.html',
            controller: 'ListCtrl',
            controllerAs: 'vm'
        })

        .state('add', {
            url: '/add',
            templateUrl: 'public/app/components/add/add.html',
            controller: 'AddCtrl',
            controllerAs: 'vm'
        })
}