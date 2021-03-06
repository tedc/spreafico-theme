window.controller = new ScrollMagic.Controller()
angular = require 'angular'
require 'angular-resource'
require 'angular-sanitize'
require 'angular-touch'
require '../../node_modules/angular-lazy-img/dist/angular-lazy-img'

sprfc = angular.module 'sprfc', ['ngTouch', 'ngSanitize', 'ngResource', 'angularLazyImg']
require './directives/index.coffee'
require './models/index.coffee'
require './resources/index.coffee'

setTimeout ->
	FastClick.attach document.body
	return
, 20