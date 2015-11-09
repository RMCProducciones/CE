
$('[data-toggle=confirmation]').confirmation();

var app = angular.module('myApp', []);

app.controller('myCtrl', function($scope) {
	$scope.count = -1;
});
			