<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<body>
<div ng-app="myapp" ng-controller="mycontroller">
	<use ng-bind="use"></use>
	<input type="text" ng-model="test">
	<button ng-click="click_func()">Click</button>
	@{{test}}
</div>
<script>
	var app = angular.module('myapp',[]);
	app.controller('mycontroller',function($scope){
		$scope.use = 0;
		$scope.click_func = function() {
        	$scope.use++;
        	console.log($scope.test)
    	}
	});
</script>
</body>
</html>