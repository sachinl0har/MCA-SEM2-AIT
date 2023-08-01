// app.js
angular.module('calculatorApp', [])
.controller('CalculatorController', function($scope) {
    $scope.calculate = function() {
        switch ($scope.operator) {
            case '+':
                $scope.result = $scope.num1 + $scope.num2;
                break;
            case '-':
                $scope.result = $scope.num1 - $scope.num2;
                break;
            case '*':
                $scope.result = $scope.num1 * $scope.num2;
                break;
            case '/':
                $scope.result = $scope.num1 / $scope.num2;
                break;
            default:
                $scope.result = 'Invalid operator';
        }
    };
});
