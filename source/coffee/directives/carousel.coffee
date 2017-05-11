em = (val)->
    val/16

module.exports = ->
    carousel =
        scope : on
        templateUrl : "#{assets}tpl/carousel.tpl.html"
        controller : ["$scope", "$window", "$attrs", "$element", ($scope, $window, $attrs, $element)->
            w = angular.element $window
            $scope.isCurrent = 0
            $scope.num = if $attrs.perPage then parseInt $attrs.perPage else 3
            $scope.mv = 0
            $scope.max = $attrs.max
            $scope.size = 12 / $scope.num
            $scope.items = $scope.$eval $attrs.items
            $scope.move = (cond)->
                $scope.num = 1
                if Modernizr.mq "screen and (min-width: #{em(480)}em)"
                    $scope.num = 2
                if Modernizr.mq "screen and (min-width: #{em(850)}em)"
                    $scope.num = if $attrs.perPage then parseInt $attrs.perPage else 3 
                if cond
                    return if $scope.isCurrent is 0
                    $scope.mv -= 1
                else
                    return if $scope.max + 1 - $scope.isCurrent is $scope.num
                    return if $scope.num > $scope.max
                    $scope.mv += 1
                $scope.isCurrent = if cond then (if $scope.isCurrent - 1 <= 0 then 0 else $scope.isCurrent - 1) else (if $scope.isCurrent + 1 >= $scope.max then max else $scope.isCurrent + 1)
                x = if cond then 100 else -100
                items = $element[0].querySelectorAll '.carousel__item'
                TweenMax.to items, .5, { x : "+=#{x}%"}
                return
            w.bind 'resize', ->
                $scope.num = 1
                if Modernizr.mq "screen and (min-width: #{em(480)}em)"
                    $scope.num = 2
                if Modernizr.mq "screen and (min-width: #{em(850)}em)"
                    $scope.num = if $attrs.perPage then parseInt $attrs.perPage else 3
                return if $scope.mv is 0
                x = if $scope.mv > $scope.max - $scope.num then ($scope.max - $scope.num)*100 else $scope.mv*100
                TweenMax.set( $element[0].querySelectorAll('.carousel__item'), { x : "-#{x}%"})
                return
            return
        ]