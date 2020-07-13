<?php session_start(); ?>
<?php include("includes/db.php"); ?>
<?php

if (!isset($_SESSION['username'])) {
  header("location: index.php");
}


   ?>


<?php  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <link rel="stylesheet" href="css/styles.css">
    <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <title></title>

    <style>
    .avatar {
      vertical-align: middle;
      width: 50px;
      height: 50px;
      border-radius: 50%;
    }
</style>


  </head>
  <body>

<!------ Include the above in your HEAD tag ---------->

<!--
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->
<?php include("includes/nav.php"); ?>
<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="http://keenthemes.com/preview/metronic/theme/assets/admin/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
          <img src="images/male_avatar.png" alt="pic" class="avatar">
					<div class="profile-usertitle-name">
						<?php echo $_SESSION['username']; ?>
					</div>
					<div class="profile-usertitle-job">
						<?php echo $_SESSION['user_role']; ?>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div>

				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">

				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">


              <?php
              if (isset($_POST['submit'])) {
                 $old_pass = mysqli_real_escape_string($connection, $_POST['old_password']);
                 $new_pass = mysqli_real_escape_string($connection,$_POST['new_password']);
                 $confirm_new_pass = mysqli_real_escape_string($connection,$_POST['confirm_new_password']);

                 if ($old_pass == $_SESSION['password']) {
                    if($new_pass == $confirm_new_pass){
                      $user_id = $_SESSION['user_id'];
                      $hash_password = password_hash($confirm_new_pass,PASSWORD_BCRYPT,['option' => 12]);
                      $sql = "UPDATE users SET user_password = '$hash_password' WHERE user_id = $user_id";
                      $send = mysqli_query($connection,$sql);
                      if (!$send) {
                        die("QUERY FAILED " . mysqli_error($connection));
                      }
                      $msg = "<div class='container mt-5'>
                    <div class='row justify-content-center'>
                        <div class='col-md-6'>
                      <div class='alert alert-success alert-dismissible fade show'>
                      <button type='button' class='close' data-dismiss='alert'>&times;</button>
                       Your Password Changed  <strong>Succesfully !</strong>
                    </div>
                     </div>
                    </div>
                  </div>";
                    }else {
                      $msg = "<div class='container mt-5'>
                      <div class='row justify-content-center'>
                        <div class='col-md-6'>
                      <div class='alert alert-danger alert-dismissible fade show'>
                      <button type='button' class='close' data-dismiss='alert'>&times;</button>
                      Passwords  <strong>NOT Matched !</strong>
                      </div>
                      </div>
                      </div>
                      </div>";
                    }
                 }else{
                   $msg = "<div class='container mt-5'>
                   <div class='row justify-content-center'>
                     <div class='col-md-6'>
                   <div class='alert alert-danger alert-dismissible fade show'>
                   <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    Old Password is <strong>Incorrect !</strong>
                   </div>
                   </div>
                   </div>
                   </div>";
                 }
              }

               ?>
			   <form class="form" action="" method="post">
           <div class="row justify-content-center">


             <?php if (isset($msg)) {
              echo $msg;
            }

             ?>


             <div class="col-md-6">
               <label for="old_password">Old Password:</label>
               <input type="password" name="old_password" value="" class="form-control">
             </div>
           </div>
           <div class="row justify-content-center mt-5">
             <div class="col-md-6">
               <label for="new_password">New Password:</label>
               <input type="password" name="new_password" value="" class="form-control">
             </div>
           </div>
           <div class="row justify-content-center mt-5">
             <div class="col-md-6">
               <label for="confirm_new_password">Confirm Nnew Password:</label>
               <input type="password" name="confirm_new_password" value="" class="form-control">
             </div>
           </div>
           <div class="row justify-content-center mt-5">
             <input type="submit" name="submit" value="Save Changes" class="btn btn-primary">
           </div>

         </form>
            </div>
		</div>
	</div>
</div>

<br>
<br>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
