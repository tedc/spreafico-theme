em = (val)->
    val/16

module.exports = ->
    carousel =
        scope : on
        templateUrl : "#{assets}tpl/carousel.tpl.html"
        controller : ["$scope", "$window", "$attrs", "$element", "$timeout", ($scope, $window, $attrs, $element, $timeout)->
            w = angular.element $window
            $scope.isCurrent = 0
            container = $element[0].querySelector '.carousel__container'
            wrapper = container.querySelector '.carousel'
            $scope.num = if $attrs.perPage then parseInt $attrs.perPage else 3
            $scope.mv = 0
            $scope.max = $attrs.max
            $scope.size = 12 / $scope.num
            $scope.items = $scope.$eval $attrs.items
            width = if $scope.max > $scope.num then ( 100 / $scope.num ) * $scope.max else 100
            $scope.width = 100 / $scope.max
            TweenMax.set wrapper,
                width : "#{width}%"
            $timeout ->
                opts =
                    preventDefault: off
                    scrollX: on
                    scrollY: off
                    snap: '.carousel__item'
                $scope.carousel = new IScroll container, opts
                $scope.move = (cond)->
                    if cond then $scope.carousel.next() else $scope.carousel.prev() 
                    return
                $scope.$on 'ngRepeatFinished', ->
                    $scope.carousel.refresh()
                    console.log prova
                    return
                return
            , 0 
            w.bind 'resize', ->
                $scope.num = 1
                if Modernizr.mq "screen and (min-width: #{em(480)}em)"
                    $scope.num = 2
                if Modernizr.mq "screen and (min-width: #{em(850)}em)"
                    $scope.num = if $attrs.perPage then parseInt $attrs.perPage else 3
                width = if $scope.max > $scope.num then ( 100 / $scope.num ) * $scope.max else 100
                itemW = 100 / $scope.max
                TweenMax.set wrapper,
                    width : "#{width}%"
                TweenMax.set wrapper.querySelectorAll('.carousel__item'),
                    width : "#{itemW}%"
                $scope.carousel.refresh()
                return
            return
        ]