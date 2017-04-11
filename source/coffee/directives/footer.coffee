module.exports = ($window)->
	footer =
		link : (scope, element)->
			w = angular.element $window
			resize = ->
				TweenMax.set 'body',
					paddingBottom : "#{(element[0].offsetHeight / 16)}em"
				return
			resize()
			w.on 'resize', resize
			return