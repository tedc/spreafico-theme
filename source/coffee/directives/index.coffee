sprfc = angular.module 'sprfc'
sprfc
	.directive 'ngSquare', [require './square.coffee']
	.directive 'ngSlider', ["$templateCache", require './slider.coffee']
	.directive 'ngCarousel', ["$templateCache", require './carousel.coffee']
	.directive 'ngSm', ["$rootScope", "$timeout", require './sm.coffee']
	.directive 'ngFooter', ["$window", require './footer.coffee']
	.directive 'ngForm', [ require './form.coffee']
	.directive 'ngInstagram', [ require './instagram.coffee']
	.directive 'ngScroll', [ require './scroll.coffee']
	.directive 'ngMap', [ "$timeout", "loadGoogleMapAPI", "$compile", require './map.coffee']
	.directive 'ngBlocks', ["$timeout", require './blocks.coffee']
	.directive 'onFinishRender', ["$timeout", ($timeout)->
		endRepeat = 
			restrict : 'A'
			link : (scope, element, attr)->
				if scope.$last is true
					$timeout ->
						scope.$emit attr.onFinishRender
						return
				return
	]
	.directive 'fastRefresh', ['$timeout', ($timeout)->
		fr =
			link : (scope, element, attr)->
				element.on 'click', ->
					$timeout ->
						FastClick.attach document.body
						for i in document.querySelectorAll('[ng-scroll]')
							Ps.update i
						return
					, 600
					return
				return
		]