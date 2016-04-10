var fetch = angular.module('fetch', []);

fetch.directive('errSrc', function() {
  return {
    link: function(scope, element, attrs) {
      element.bind('error', function() {
        if (attrs.src != attrs.errSrc) {
          attrs.$set('src', attrs.errSrc);
        }
      });
    }
  }
});

fetch.directive('derrSrc', function() {
  return {
    link: function(scope, element, attrs) {
      element.bind('error', function() {
        if (attrs.errSrc != attrs.derrSrc) {
          attrs.$set('errSrc', attrs.derrSrc);
        }
      });
    }
  }
});