
var app = angular.module('aplicationCE', ['ngRoute','ngResource', 'mwl.confirm', 'uiSwitch']).config(function($interpolateProvider){
    $interpolateProvider.startSymbol('[[').endSymbol(']]');
});

