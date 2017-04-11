module.exports = ($rootScope, $timeout)->
	parseDuration = (options, element)->
		if typeof options.duration is 'string' and options.duration.match(/^(\.|\d)*\d+vh$/)
			duration = options.duration.replace 'vh', '%'
		else
			if typeof options.duration is 'string' and options.duration.match(/^(\.|\d)*\d+%$/)
				value = parseFloat( options.duration ) / 100
				duration = element.offsetHeight * value
			else
				duration = parseFloat options.duration
		return duration
	scrollmagic =
		link : (scope, element, attrs)->
			config = scope.$eval attrs.ngSm
			if typeof config.duration isnt 'undefined'
				config.duration = parseDuration config, element[0]
			else
				config.duration = 0
			options = 
				triggerElement : config.triggerElement or element[0]
				triggerHook : config.triggerHook or 0.5
				duration : config.duration
				offset : config.offset or 0
			$rootScope.$on 'sceneDestroy', ->
                scene.destroy() if scene
                return
                
            scene.destroy() if scene
			scene = new ScrollMagic.Scene options
			if config.tween
				if Array.isArray config.tween
					tweenEl = config.tween[0].element or element[0]
					speed = config.tween[0].speed or .5
					tween = TweenMax.fromTo tweenEl, speed, config.tween[0], config.tween[1]
					scene.setTween tween
				else
					tweenEl = config.tween.element or element[0]
					speed = config.tween.speed or .5
					tween = TweenMax.to tweenEl, speed, config.tween
					scene.setTween tween
			if config.class
				config.class = {classes: config.class} if typeof config.class isnt 'object'
				classEl = config.class.element or element[0]
				scene.setClassToggle classEl, config.class.classes
			scene.addTo controller
			return


					


