<?php
   include('session.php');
?>

<!DOCTYPE html>
  <html>
    <head>
      <!--Include Files-->
      <?php include('headincludefiles.html'); ?>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    </head>

    <body style="background-color: #f5f8fa;" ng-app="fetch" ng-controller="dbCtrl" ng-cloak>
    <main>
      
      <!-- navbar -->
      <?php include('navbar.html'); ?>

    <div class="parallax-container" style="width: 100%; height: 200px; position: absolute; z-index: -100;">
      <div id="coverimage" class="parallax"><img ng-src="{{master.coverpicpath}}{{master.coverpic}}" err-src="{{master.coverpicpath}}{{master.coverpicsave}}" derr-src ="{{master.coverpicdefault}}"></div>
      <div class="grad" style="height: 50px; width: 100%; margin-top: 150px"></div>
    </div>

      <div class="container">
        <h1 class="emblem">{{ master.first_name | limitTo : 1 }}</h1>
          <div class="row">
              <div class="col s12 m3 profile-image-row">
                <div class="card small profile-card-small">
                  <div id="profile-pic-div" class="card-image profile-card-image">
                    <img id="profile-pic" ng-src="{{master.profilepicpath}}{{master.profilepic}}" err-src="{{master.profilepicpath}}{{master.profilepicsave}}" derr-src ="{{master.profilepicdefault}}">
                    <i class="card-title activator material-icons right waves-effect waves-light">photo_camera</i>
                  </div>

                  <div class="card-reveal reveal-style">
                    <span class="card-title"><i class="material-icons right">close</i></span>
                    <span class="card-title">Update Profile Picture</span>
                      <form id="uploadProfilePic" name="profilePicForm" method="post" enctype="multipart/form-data" novalidate>
                          <div class="file-field input-field">
                            <div class="btn light-blue darken-1 profile-upload-btn">
                              <span><i class="material-icons left profile-upload-btn-icon">photo</i></span>
                              <input type="file" name="fileToUpload" id="fileToUpload">
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate" type="text" placeholder="Upload Picture" ng-model="user.profilepic" required>
                            </div>
                          </div>
                          <button type="submit" ng-click="updatePPic(user)" ng-disabled="profilePicForm.$invalid" class="modal-action waves-effect waves-circle waves-light btn teal accent-3" style="width: 30px; border-radius: 50%; padding-left: 8px; margin-right: 30px;"><i class="material-icons left">done</i></button>
                        </form>
                  </div>
                </div>
              </div>
              <div class="col s12 m7">

                <div id="profile-info" class="pofile-format">

                  <h3 class="truncate profile-name">{{master.first_name + ' ' + master.last_name}}</h3>
                  <h5>{{master.gender}}</h5>
                  <h5>{{master.age}}</h5>
                  <h5>{{master.city}}, {{master.state}}</h5>
                  <h5>About Me</h5>
                  <h6>{{master.aboutme}}</h6>
                  <!-- Modal Trigger -->
                  <a id="profile-info-edit" href="#profilemodalp" class="waves-effect waves-circle waves-light btn right white modal-trigger profile-edit-format" style="padding: 0; width: 1.5em; height: 1.5em; line-height: 1.2em; bottom: 5px; right: 5px; position: absolute;"><i class="material-icons left" style="color: #039be5; margin-right: 0; margin-left: 2px; margin-top: 1px; font-size: 1rem;">mode_edit</i></a>
            
                </div>
    
              </div>

              <div class="col s12 m2">
              <a href="#covermodal" class="right modal-trigger"><i id="coverimage-edit" class="material-icons right" style="color: white; margin-top: 40px;">panorama</i></a>
              <div class="row margin-left-1em">
                <h4 class="chat-margin">Alerts</h4>
              </div>
                <div class="row not-row truncate" style="overflow-x: hidden;">
                  <i class="material-icons left not-bar">notifications</i>Notifications
                </div>  
                <div class="row not-row truncate" style="overflow-x: hidden;">
                  <i class="material-icons left not-bar">person_add</i>Add a Friend
                </div>  
                <div class="row not-row truncate" style="overflow-x: hidden;">
                  <i class="material-icons left not-bar">inbox</i>Inbox
                </div> 
                <div class="row not-row truncate" style="overflow-x: hidden;">
                  <i class="material-icons left not-bar">public</i>Public
                </div> 
              </div>

            </div>  


<!--        <div class="row">
        <form action="data/pchanged.php" method="post" class="col s12" name="newForm" novalidate>
          <div class="row">
            <div class="col s6">
              <h4>Name</h4>
              </div>
            </div>  
            <div class="row">
              <div class="input-field col s6">
                <i class="material-icons prefix">portrait</i>
                <input type="text" name="first_name" length="20" class="validate" ng-model="user.first_name" ng-minlength="1" ng-maxlength="20" required />
                <label class="active" for="first_name" data-error="needs to be less than 20 characters">First Name</label>
                <p class="required-field" ng-show="newForm.first_name.$error.required">required</p>
              </div>
              <div class="input-field col s6">
                <i class="material-icons prefix">account_box</i>
                <input type="text" name="last_name" length="20" class="validate" ng-model="user.last_name" ng-maxlength="20" required />
                <label class="active" for="last_name" data-error="needs to be less than 20 characters">Last Name</label>
                <p class="required-field" ng-show="newForm.last_name.$error.required">required</p>
              </div>
            </div> 

            <button ng-click="reset()" class="modal-action modal-close waves-effect waves-circle waves-light btn red accent-4" style="width: 30px; border-radius: 50%; padding-left: 8px; margin-right: 20px;"><i class="material-icons left">close</i></button>
            <button type="submit" name="submit" ng-click="update(user)" ng-disabled="newForm.$invalid" class="modal-action waves-effect waves-circle waves-light btn teal accent-3" style="width: 30px; border-radius: 50%; padding-left: 8px; margin-right: 30px;"><i class="material-icons left">done</i></button>

            </form>

        </div>   --> 

          <div>
              <h3>Friends</h3>
              <div class="row">
                <div class="col s12">
                  <div ng-repeat="friend in friends" class="chip">
                    <img ng-src="{{friend.profilepic}}" alt="Contact Person" style="width: 82px; height: 82px; border-radius: 20% 0 0 20%;">
                    <p style="float: left; color: white;">{{friend.first_name}}</p>
                  </div>
                </div>
              </div>    
          </div>
          
          <!-- modals -->
          <?php include('profilemodalp.html'); ?>
          <?php include('covermodal.html'); ?>

    </div><!-- end of body container -->

  </main>

      <!-- footer -->
      <?php include('footer.html'); ?>

      <!-- included scripts -->
      <?php include('includedscripts.html'); ?>

  </body>

</html>
