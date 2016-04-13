fetch.controller('dbCtrl', ['$scope', '$http', function ($scope, $http) {

            $http.get("../../data/profiledatajson.php").success(function(data) {
            	$scope.uploadSuccess = false;
                $scope.data = data;
                  $scope.master = {
                                    first_name: data[0].first_name,
                                    last_name: data[0].last_name,
                                    profilepicpath: data[0].profilepicpath,
                                    profilepic: data[0].profilepic,
                                    profilepicsave: data[0].profilepicsave,
                                    profilepicdefault: data[0].profilepicdefault,
                                    coverpicpath: data[0].coverpicpath,
                                    coverpic: data[0].coverpic,
                                    coverpicsave: data[0].coverpicsave,
                                    coverpicdefault: data[0].coverpicdefault,
                                    gender: data[0].gender,
                                    birthday: Number(data[0].birthday),
                                    birthmonth: Number(data[0].birthmonth),
                                    birthyear: Number(data[0].birthyear),
                                    age: '',
                                    city: data[0].city,
                                    state: data[0].state,
                                    aboutme: data[0].aboutme
                                  };

                $scope.master.age = calculate_age($scope.master.birthmonth,$scope.master.birthday,$scope.master.birthyear);

                $scope.update = function(user) {
                   $scope.master = angular.copy(user);
                   

                   
                   $scope.master.age = calculate_age($scope.master.birthmonth,$scope.master.birthday,$scope.master.birthyear);
                   var data = {
                                'fnamekey': $scope.master.first_name, 
                                'lnamekey': $scope.master.last_name,
                                'genkey': $scope.master.gender,
                                'bdaykey': $scope.master.birthday,
                                'bmonthkey': $scope.master.birthmonth,
                                'byearkey': $scope.master.birthyear,
                                'agekey': $scope.master.age,
                                'citykey': $scope.master.city,
                                'statekey': $scope.master.state,
                                'aboutkey': $scope.master.aboutme
                              };
                   $http.post('../../data/pchanged.php', data).success(function(data, status, headers, config) {
                        //console.log(status + ' - ' + data);
                    }).error(function(data, status, headers, config) {
                        console.log('error');
                    });

                   $('#profilemodalp').closeModal();
                };


                $scope.updatePPic = function(user) {
                   var formData = new FormData($('#uploadProfilePic')[0]);
                   $.ajax({  
                            url: "../../data/ppicchanged.php",  
                            type: 'POST',   
                            data: formData,
                            processData: false,
                            contentType: false }).done(function (msg) { alert("Data Saved: " + msg);});   
                    $scope.user.profilepicsave = $scope.master.profilepic;
                    $scope.master = angular.copy(user);
                };

                $scope.updateCPic = function(user) {
                   var formDataC = new FormData($('#uploadCoverPic')[0]);
                   $.ajax({  
                            url: "../../data/cpicchanged.php",  
                            type: 'POST',   
                            data: formDataC,
                            processData: false,
                            contentType: false }).done(function (msg) { alert("Data Saved: " + msg);});   
                    $scope.user.coverpicsave = $scope.master.coverpic;
                    $scope.master = angular.copy(user);
                    $('#covermodal').closeModal();
                };



                $scope.reset = function() {
                    $scope.user = angular.copy($scope.master);

                };

                $scope.reset();

             })
                .error(function() {
                    $scope.data = "error in fetching data";
                });    


            function calculate_age(birth_month,birth_day,birth_year)
        	{
                birth_month = Number(birth_month);
                birth_day = Number(birth_day);
                birth_year = Number(birth_year);
                today_date = new Date();
                today_year = today_date.getFullYear();
                today_month = today_date.getMonth();
                today_day = today_date.getDate();
                age = today_year - birth_year;

            if ( today_month < (birth_month - 1))
            {
                age--;
            }
            if (((birth_month - 1) == today_month) && (today_day < birth_day))
            {
                age--;
            }
            return age;
        }

        $scope.days = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31];
        $scope.months = [1,2,3,4,5,6,7,8,9,10,11,12];
        $scope.years = [1900,1901,1902,1903,1904,1905,1906,1907,1908,1909,1910,1911,1912,1913,1914,1915,1916,1917,1918,1919,1920,1921,1922,1923,1924,1925,1926,1927,1928,1929,1930,1931,1932,1933,1934,1935,1936,1937,1938,1939,1940,1941,1942,1943,1944,1945,1946,1947,1948,1949,1950,1951,1952,1953,1954,1955,1956,1957,1958,1959,1960,1961,1962,1963,1964,1965,1966,1967,1968,1969,1970,1971,1972,1973,1974,1975,1976,1977,1978,1979,1980,1981,1982,1983,1984,1985,1986,1987,1988,1989,1990,1991,1992,1993,1994,1995,1996,1997,1998,1999,2000,2001,2002,2003,2004,2005,2006,2007,2008,2009,2010,2011,2012,2013,2014,2015,2016];
        
        
        $scope.grabpic = function() {
        $http.get("../../data/profiledatajson.php").success(function(datap) {
                $scope.data = data;
                return $scope.master.profilepicsave = {profilepicsave: data[0].profilepicsave};
            })
                .error(function() {
                    $scope.data = "error in fetching data";
                }); 
        }

}]);



