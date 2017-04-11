mapInit = require '../core/map.coffee'
#marker = require '../../core/marker.coffee'
module.exports = ($timeout, loadGoogleMapAPI, $compile)->
    map =
        controller : ["$scope", "$rootScope", "$attrs", ($scope, $rootScope, $attrs)->  
            $scope.zoom = (cond)->
                if cond
                    $scope.map.setZoom $scope.map.getZoom() + 1
                else
                    $scope.map.setZoom $scope.map.getZoom() - 1 
                return
            $scope.mapData = map_data  
            map = document.getElementById $attrs.mapId
            loadGoogleMapAPI.then ->
                mapInit map, $scope.mapData, $scope, $compile
                return
            return
        ] 