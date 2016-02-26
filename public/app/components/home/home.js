'use strict';

angular.module('gifAggro')
    .controller('HomeCtrl', HomeCtrl);

function HomeCtrl() {

    var vm = this;
    vm.title = 'Temp Application';

    vm.me = {
        'name': 'Loading...',
        'age': 'Loading...'
    };
}