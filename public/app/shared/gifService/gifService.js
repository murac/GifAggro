angular
    .module('gifAggro')
    .factory('gifService', gifService);

gifService.$inject = ['$http', '$log'];

function gifService($http, $log) {
    return {
        createNew: createNew,
        getAll: getAll
    };

    function getAll() {
        return $http.get('http://www.murac.com/public/api.php?a=all')
            .then(getAllComplete)
            .catch(getAllFailed);

        function getAllComplete(response) {
            $log.debug(response.data);
            return response.data;
        }

        function getAllFailed(error) {
            $log.debug('XHR Failed for getAll.' + error.data);
        }
    }

    function createNew(doc) {
        return $http.post('http://www.murac.com/public/api.php?a=new', doc)
            .then(createNewComplete)
            .catch(createNewFailed);

        function createNewComplete(response) {
            return response.data;
        }

        function createNewFailed(error){
            $log.debug('XHR Failed for createNew.' + error.data);
        }
    }
}