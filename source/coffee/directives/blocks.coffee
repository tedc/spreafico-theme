module.exports = ($timeout)->
	blocks =
		scope : on
		link : (scope, element)->
			scope.current = 0
			max = element[0].querySelectorAll('.blocks__row').length - 1
			scope.slideTo = (v)->
				TweenMax.to element[0].querySelectorAll('.blocks__row'), .5,
					x : "-#{(100 * v)}%"
					ease : 0.75
					onComplete : ->
						$timeout ->
							scope.current = v
							return
						, 0
						return
				return
			scope.move = (cond)->
				if cond
					value = if scope.current + 1 <= max then scope.current + 1 else 0
				else
					value = if scope.current - 1 >= 0 then scope.current - 1 else max
				scope.slideTo value
				return
			return
