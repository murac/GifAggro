'use strict';

angular.module('gifAggro')
    .controller('AddCtrl', AddCtrl);

AddCtrl.$inject = ['gifService', 'Notification'];

function AddCtrl(gifService, Notification) {

    var vm = this;
    vm.title = 'Add a gif';
    vm.doc = {};

    vm.submit = submit;

    function submit() {
        return gifService.createNew(vm.doc).then(function(data){
            Notification.success(data);
        });
    }


}