sprfc = angular.module 'sprfc'
sprfc
	.controller 'sliderController', [ '$scope', '$attrs', "$timeout", "$element", require './slider.coffee' ]