
var baseUrl = window.location.origin;

var app = angular.module('AdminProcessorApp', []);

app.config(['$interpolateProvider', function ($interpolateProvider) {
    $interpolateProvider.startSymbol('{[');
    $interpolateProvider.endSymbol(']}');
}]);


app.controller('AdminViewController', ['$scope', '$http', function($scope, $http) {
    $scope.applicants = [];

    $http({
        url: baseUrl + '/admin/applicants',
        method: 'GET'
    }).success(function (data) {
        $scope.applicants = data;
    });
}]);

app.controller('AdminSearchController', ['$scope', '$http', function($scope, $http) {
    $scope.applicants = [];

    $http({
        url: baseUrl + '/admin/passed-applicants',
        method: 'GET'
    }).success(function (data) {
        $scope.applicants = data;
    });
}]);


app.controller('ProcessorSearchController', ['$scope', '$http', function($scope, $http)
{
    $scope.applicants = [];

    $http({
        url: baseUrl + '/processor/paid-applicants',
        method: 'GET'
    }).success(function (data) {
        $scope.applicants = data;
    });
}]);

app.controller('ProcessorReservedController', ['$scope', '$http', function($scope, $http)
{
    $scope.applicants = [];

    $http({
        url: baseUrl + '/processor/reserved-applicants',
        method: 'GET'
    }).success(function (data) {
        $scope.applicants = data;
    });
}]);
