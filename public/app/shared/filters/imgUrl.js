angular.module('gifAggro')
    .filter('imgUrl', function ($sce) {
        return function(gif) {
            return $sce.trustAsResourceUrl("http://localhost:5984/gifs/"+gif.id+"/"+gif.value.filename);
        };
    });