module.exports = ($templateCache) ->
	slider =
		scope: on
		template : $templateCache.get "#{assets}tpl/slider.tpl.html"
		controller : ["$scope", "$attrs", "$timeout", "$element", ($scope, $attrs, $timeout, $element)->
			$scope.range = (min, max, step)->
				step = step or 1
				input = []
				for i in [min..max] by step
					input.push i
				return input
			$scope.title = $attrs.sliderTitle
			$scope.show = $attrs.showLabel
			$scope.kind = if $attrs.sliderKind then $attrs.sliderKind else off
			id = "##{$attrs.id}"
			$scope.slider = new TimelineMax
				repeat : -1
			$scope.current = 0
			$scope.isPrev = off
			$scope.isNext = on
			$scope.slides = sliders[$attrs.id]
			$scope.loaded = []
			for i in [0..$scope.slides.length - 1]
				img = new Image()
				img.src = $scope.slides[i].url
				img = angular.element img
				img.on 'load', ->
					$timeout ->
						$scope.loaded[i] = on
						return
					, 0
					return
			console.log slides
			$scope.isLoaded = (i)->
				return $scope.loaded[i]
			$scope.slideTo = (c)->
				$scope.slider.pause on
				$scope.current = c
				$scope.isPrev = if $scope.current > 0 then on else off
				$scope.isNext = if $scope.current < $scope.slides.length - 1 then on else off
				$scope.slider.play on
				TweenMax.to ["#{id} .linee__cell--slide", "#{id} .full-slider__cell"], 1,
					x : "#{100 * $scope.current * -1}%"
					ease: .75
				return
			$scope.move = (cond)->
				return if $scope.current + 1 > $scope.slides.length - 1 and cond
				return if $scope.current - 1 < 0 and not cond
				value = if cond then $scope.current + 1 else $scope.current - 1
				$scope.slideTo value
				return
			return
	]