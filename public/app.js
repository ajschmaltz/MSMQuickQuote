var mm = angular.module('mm', ['angular.filter']);
mm.config(['$interpolateProvider', function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
}]);
mm.filter("as", ['$parse', function($parse) {
    return function(value, context, path) {
        return $parse(path).assign(context, value);
    };
}]);
mm.controller('beltCtrl', ['$http', '$scope', function($http, $scope){
    $http.get('belts.json')
        .success(function(data){
            $scope.belts = data;
        });
}]);
mm.controller('matchCtrl', ['$http', '$scope', function($http, $scope){
    $scope.search = {};
    $scope.Sale = {};
    $scope.Width = {};
    $scope.setPreset = function(preset){
      switch(preset) {
          case 'Walk Behind':
              $scope.search.Style = "Walk Behind";
              $scope.search.Use = "Residential";
              $scope.Sale.min = "";
              $scope.Sale.max = "";
              $scope.Width.min = "";
              $scope.Width.max = "";
              break;
          case 'Walk Behind - Eco':
              $scope.search.Style = "Walk Behind";
              $scope.search.Use = "Residential";
              $scope.Sale.min = 0;
              $scope.Sale.max = 500;
              $scope.Width.min = "";
              $scope.Width.max = "";
              break;
          case 'Walk Behind - Premium':
              $scope.search.Style = "Walk Behind";
              $scope.search.Use = "Residential";
              $scope.Sale.min = 500;
              $scope.Sale.max = 1200;
              $scope.Width.min = "";
              $scope.Width.max = "";
              break;
          case 'Zero Turn':
              $scope.search.Style = "Zero Turn Rider";
              $scope.search.Use = "Residential";
              $scope.Sale.min = "";
              $scope.Sale.max = "";
              $scope.Width.min = "";
              $scope.Width.max = "";
              break;
          case 'Zero Turn - Eco':
              $scope.search.Style = "Zero Turn Rider";
              $scope.search.Use = "Residential";
              $scope.Sale.min = 2000;
              $scope.Sale.max = 3000;
              $scope.Width.min = "";
              $scope.Width.max = "";
              break;
          case 'Zero Turn - Premium':
              $scope.search.Style = "Zero Turn Rider";
              $scope.search.Use = "Residential";
              $scope.Sale.min = 3000;
              $scope.Sale.max = 5000;
              $scope.Width.min = "";
              $scope.Width.max = "";
              break;
          case 'Mid Duty':
              $scope.search.Style = "";
              $scope.search.Use = "Mid Duty";
              $scope.Sale.min = "";
              $scope.Sale.max = "";
              $scope.Width.min = "";
              $scope.Width.max = "";
              break;
          case 'Mid Duty - Eco':
              $scope.search.Style = "";
              $scope.search.Use = "Mid Duty";
              $scope.Sale.min = "3000";
              $scope.Sale.max = "5400";
              $scope.Width.min = "";
              $scope.Width.max = "";
              break;
          case 'Mid Duty - Premium':
              $scope.search.Style = "";
              $scope.search.Use = "Mid Duty";
              $scope.Sale.min = "5400";
              $scope.Sale.max = "6000";
              $scope.Width.min = "";
              $scope.Width.max = "";
              break;
          case 'Small Spaces':
              $scope.search.Style = "";
              $scope.search.Use = "Commercial";
              $scope.Sale.min = "";
              $scope.Sale.max = "";
              $scope.Width.min = 30;
              $scope.Width.max = 44;
              break;
          case 'Rider - Eco':
              $scope.search.Style = "Zero Turn Rider";
              $scope.search.Use = "Commercial";
              $scope.Sale.min = "5000";
              $scope.Sale.max = "8500";
              $scope.Width.min = "";
              $scope.Width.max = "";
              break;
          case 'Rider - Premium':
              $scope.search.Style = "Zero Turn Rider";
              $scope.search.Use = "Commercial";
              $scope.Sale.min = "9000";
              $scope.Sale.max = "15000";
              $scope.Width.min = "";
              $scope.Width.max = "";
              break;
          case 'Stander':
              $scope.search.Style = "Zero Turn Stander";
              $scope.search.Use = "Commercial";
              $scope.Sale.min = "";
              $scope.Sale.max = "";
              $scope.Width.min = "";
              $scope.Width.max = "";
              break;
      }
    };
    $http.get('mowers.json')
        .success(function(data){
            $scope.mowers = data;
        });
    $scope.printQuote = function(){
        console.log($scope.filteredMowers);
    };
}]);
mm.filter('rangeFilter', function() {
    return function( items, rangeInfo ) {
        var filtered = [];
        var min = parseInt(rangeInfo.min);
        var max = parseInt(rangeInfo.max);
        if(!isNaN(min) && !isNaN(max)) {
            angular.forEach(items, function(item) {
                if( item[rangeInfo.property]>= min && item[rangeInfo.property] <= max ) {
                    filtered.push(item);
                }
            });
            return filtered;
        }else{
            return items;
        }
    };
});