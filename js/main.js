$(document).ready(function(){
  // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
  var a = $("#profile-pic-div").width();

  $('.modal-trigger').leanModal();
  $("#profile-pic").css("margin-left", ((a-300)/2));
  $('.parallax').parallax();
  $('select').material_select();

  $('.slider').slider({full_width: true});
  $(".button-collapse").sideNav();

  $("#profile-info-edit").hover(
    function() {
      $("#profile-info").css({"transition":"box-shadow .25s","box-shadow":"0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)"});
    }, function() {
      $("#profile-info").css({"transition":"box-shadow .25s","box-shadow":"none"});
    }
  );

  $("#coverimage-edit").hover(
    function() {
      $(this).css({"transition":"font-size .25s", "font-size": 20});
    }, function() {
      $(this).css({"transition":"font-size .25s", "font-size": 24});
    }
  );

  $('.datepicker').pickadate({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 180 // Creates a dropdown of 15 years to control year
  });

  $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: true, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
    }
  );
  
});

$(window).resize(function(event) {
  var a = $("#profile-pic-div").width();
  $("#profile-pic").css("margin-left", ((a-300)/2));
});
