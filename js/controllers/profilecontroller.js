socialapp.controller('ProfileController', ['$scope', function($scope) {
  
  $scope.master = {
    first_name: 'Harrison',
    last_name: 'McGuire',
    profilepic: 'profilepics/me1.jpg',
    coverpic: 'coverimages/shyguy.jpg',
    gender: 'Male',
    day: 30,
    month: 6,
    year: 1987,
    age: '',
    city: 'Palm Desert',
    state: 'CA',
    aboutme: 'I like burritos and The Last of Us is my favorite game of all time'
  };

  $scope.days = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31];
  $scope.months = [1,2,3,4,5,6,7,8,9,10,11,12];
  // $scope.months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
  $scope.years = [1900,1901,1902,1903,1904,1905,1906,1907,1908,1909,1910,1911,1912,1913,1914,1915,1916,1917,1918,1919,1920,1921,1922,1923,1924,1925,1926,1927,1928,1929,1930,1931,1932,1933,1934,1935,1936,1937,1938,1939,1940,1941,1942,1943,1944,1945,1946,1947,1948,1949,1950,1951,1952,1953,1954,1955,1956,1957,1958,1959,1960,1961,1962,1963,1964,1965,1966,1967,1968,1969,1970,1971,1972,1973,1974,1975,1976,1977,1978,1979,1980,1981,1982,1983,1984,1985,1986,1987,1988,1989,1990,1991,1992,1993,1994,1995,1996,1997,1998,1999,2000,2001,2002,2003,2004,2005,2006,2007,2008,2009,2010,2011,2012,2013,2014,2015,2016];


  $scope.master.age = calculate_age($scope.master.month,$scope.master.day,$scope.master.year);

  $scope.update = function(user) {
    $scope.master = angular.copy(user);
    $scope.master.age = calculate_age($scope.master.month,$scope.master.day,$scope.master.year);
    $('#profilemodal').closeModal();
  };

  $scope.updatePPic = function(user) {
    $scope.master = angular.copy(user);
  };

  $scope.updateCPic = function(user) {
    $scope.master = angular.copy(user);
    $('#covermodal').closeModal();
  };

  $scope.reset = function() {
  $scope.user = angular.copy($scope.master);
 };

  $scope.reset();

        function calculate_age(birth_month,birth_day,birth_year)
        {
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


  $scope.friends = [
                      {
                        first_name: 'Harry',
                        last_name: 'McGuire',
                        profilepic: 'profilepics/me2.jpg',
                        coverpic: '',
                        gender: 'Male',
                        age: 28,
                        city: 'Palm Desert',
                        state: 'CA',
                        aboutme: ''
                      },
                      {
                        first_name: 'Joe',
                        last_name: 'McGuire',
                        profilepic: 'profilepics/me3.jpg',
                        coverpic: '',
                        gender: 'Male',
                        age: 28,
                        city: 'Palm Desert',
                        state: 'CA',
                        aboutme: ''
                      },
                      {
                        first_name: 'Victor',
                        last_name: 'McGuire',
                        profilepic: 'profilepics/me4.jpg',
                        coverpic: '',
                        gender: 'Male',
                        age: 28,
                        city: 'Palm Desert',
                        state: 'CA',
                        aboutme: ''
                      },
                      {
                        first_name: 'Ryan',
                        last_name: 'McGuire',
                        profilepic: 'profilepics/me1.jpg',
                        coverpic: '',
                        gender: 'Male',
                        age: 28,
                        city: 'Palm Desert',
                        state: 'CA',
                        aboutme: ''
                      },
                      {
                        first_name: 'Paul',
                        last_name: 'McGuire',
                        profilepic: 'profilepics/me1.jpg',
                        coverpic: '',
                        gender: 'Male',
                        age: 28,
                        city: 'Palm Desert',
                        state: 'CA',
                        aboutme: ''
                      },
                      {
                        first_name: 'James',
                        last_name: 'McGuire',
                        profilepic: 'profilepics/me2.jpg',
                        coverpic: '',
                        gender: 'Male',
                        age: 28,
                        city: 'Palm Desert',
                        state: 'CA',
                        aboutme: ''
                      },
                      {
                        first_name: 'Walter',
                        last_name: 'McGuire',
                        profilepic: 'profilepics/me4.jpg',
                        coverpic: '',
                        gender: 'Male',
                        age: 28,
                        city: 'Palm Desert',
                        state: 'CA',
                        aboutme: ''
                      },
                      {
                        first_name: 'Melissa',
                        last_name: 'McGuire',
                        profilepic: 'profilepics/me3.jpg',
                        coverpic: '',
                        gender: 'Male',
                        age: 28,
                        city: 'Palm Desert',
                        state: 'CA',
                        aboutme: ''
                      },
                      {
                        first_name: 'Jessica',
                        last_name: 'McGuire',
                        profilepic: 'profilepics/me1.jpg',
                        coverpic: '',
                        gender: 'Male',
                        age: 28,
                        city: 'Palm Desert',
                        state: 'CA',
                        aboutme: ''
                      }
                    ];

}]);
