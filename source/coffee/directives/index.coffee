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