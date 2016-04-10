    <html ng-app="fetch">
    <head>
    <title>AngularJS GET request with PHP</title>
      <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.24/angular.min.js"></script>
    </head>

    <body>
    <br>
      <div class="row" ng-cloak>
        <div class="container">
          <h1>Angular $http GET Ajax Call</h1>
          <div ng-controller="dbCtrl">

          <input type="text" ng-model="searchFilter" class="form-control">
           <h1>{{data}}</h1>
            <h1>{{first}}</h1>
            <h1>{{last}}</h1>
            <h1>{{gender}}</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>First</th>
                        <th>Last</th>
                        <th>Gender</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="info in data | filter:searchFilter">
                        <td>{{info.firstname}}</td>
                        <td>{{info.lastname}}</td>
                        <td>{{info.gender}}</td>
                    </tr>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </body>

      <script type="text/javascript" src="fetchapp.js"></script>
      <script type="text/javascript" src="fetchcontroller.js"></script>
<!--     <script>
        var fetch = angular.module('fetch', []);

        fetch.controller('dbCtrl', ['$scope', '$http', function ($scope, $http) {
            $http.get("jsontest.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
        }]);

    </script> -->

    </html>
