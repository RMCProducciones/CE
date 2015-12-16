
var app = angular.module('aplicationCE', ['ngRoute','ngResource', 'mwl.confirm', 'uiSwitch'])
.config(
	function($interpolateProvider){
    	$interpolateProvider.startSymbol('[[').endSymbol(']]');
    },
	function($locationProvider){
    	$locationProvider.html5Mode(true).hashPrefix('!');
    }
)
;
