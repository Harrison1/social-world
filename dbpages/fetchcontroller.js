fetch.controller('dbCtrl', ['$scope', '$http', function ($scope, $http) {
            $http.get("jsontest.php").success(function(data) {
            	$scope.data = data;
                $scope.first = data[0].firstname;
                $scope.last = data[0].lastname;
                $scope.gender = data[0].gender;
             })
                .error(function() {
                    $scope.data = "error in fetching data";
                });


            // $http.get("jsontestp.php").success(function(pinfo) {
            // 	$scope.pinfo = pinfo;
            //  })
            //     .error(function() {
            //         $scope.pinfo = "error in fetching data";
            //     });
// $scope.obj_with_correct_age = $filter("filter")(data, {age: age});

}]);