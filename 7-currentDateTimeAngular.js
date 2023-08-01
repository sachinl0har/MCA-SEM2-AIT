// app.js
angular.module('myApp', [])
.controller('DateTimeController', function($scope, $interval) {
    // Function to get the current date and time
    function getCurrentDateTime() {
        var currentDate = new Date();
        $scope.currentDateTime = currentDate.toUTCString();
    }

    // Update the date and time every second
    $interval(getCurrentDateTime, 1000);

    // Initial call to get the current date and time
    getCurrentDateTime();
});
