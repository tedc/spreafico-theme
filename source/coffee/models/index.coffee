sprfc = angular.module 'sprfc'
sprfc
	.run ->
		FastClick.attach document.body
		return
	.run ["$templateCache", require './templates.min']