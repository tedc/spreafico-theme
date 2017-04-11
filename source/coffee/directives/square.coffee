module.exports = ->
	square =
		link : (scope, element, attrs)->
			sides = ['top', 'right', 'bottom', 'left']
			name = scope.$eval attrs.ngSquare
			div = document.createElement 'div'
			div.className = "square square--#{name.kind}"
			for i in sides
				line = document.createElement 'div'
				line.className = "square__line square__line--#{i}"
				div.append line
			element.prepend div if name.kind isnt 'figure'
			if name.kind is 'slider' or name.kind is 'blocks' or name.kind is 'figure'
				square = document.createElement 'div'
				square.className = 'square square--filled'
				element.prepend square
			tl = new TimelineMax
				paused : on
			if name.kind isnt 'figure'			
				for s in sides
					size = if s isnt 'top' and s isnt 'bottom' then 'height' else 'width'
					tl
						.fromTo  element[0].querySelector(".square__line--#{s}"), .25,
							{
								"#{size}" : "0%"
							}
							{
								"#{size}" : "100%"
							}
				new ScrollMagic.Scene
						triggerElement : element[0]
					.setTween tl.play()
					.addTo controller
			return if name.kind isnt 'slider' and name.kind isnt 'figure'
			new ScrollMagic.Scene
					triggerElement : element[0]
					triggerHook : 1
					offset : -80
					duration : '250%'
				.setTween TweenMax.fromTo square, 1, {y : 80}, {y : -80}
				.addTo controller
			return