'use strict';

angular.module('gifAggro', ['ui.router', 'ui-notification'])
    .constant('_', window._)

    .run(function ($rootScope) {
        $rootScope._ = window._;
    });