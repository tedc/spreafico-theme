window.controller = new ScrollMagic.Controller()
FastClick.attach document.body
angular = require 'angular'
require 'angular-resource'
require 'angular-sanitize'
require 'angular-touch'
require 'angular-lazy-img'

sprfc = angular.module 'sprfc', ['ngTouch', 'ngSanitize', 'ngResource', 'angularLazyImg']
require './directives/index.coffee'
require './models/index.coffee'
require './resources/index.coffee'
