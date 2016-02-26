'use strict';

angular.module('gifAggro')
    .controller('ListCtrl', ListCtrl);

ListCtrl.$inject = ['gifService', 'Notification'];

function ListCtrl(gifService, Notification) {

    var vm = this;
    vm.title = 'View all gifs';
    vm.gifList = [];

    activate();

    function activate() {
        return getGifs().then(function () {

        });
    }

    function getGifs() {
        return gifService.getAll().then(function(data){
            vm.gifList = data.rows;
            return vm.gifList;
        })
    }
}