
<!-- DISPLAYING DATA FROM DB -->
<?php
if (isset($_GET['user_id'])) {
  $the_user_id = $_GET['user_id'];

  $query = "SELECT * FROM users WHERE user_id = $the_user_id";
  $edit_query_send = mysqli_query($connection,$query);
  while ($row = mysqli_fetch_assoc($edit_query_send)) {

    $user_id = $row['user_id'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_role = $row['user_role'];
    $user_batch = $row['user_batch'];
  }
}
 ?>


<!-- UPDATING DB FROM FORM BELOW: -->
<?php
if (isset($_POST['submit'])) {
  echo $firstname = $_POST['firstname'];
  echo $lastname = $_POST['lastname'];
  echo $email = $_POST['email'];
  echo $username = $_POST['username'];
  echo $batch = $_POST['batch'];
  echo $role = $_POST['role'];
  echo $password = $_POST['password'];

  $hash_pass = password_hash($password,PASSWORD_BCRYPT,['option' => 12]);

  $update_query = "UPDATE users SET user_firstname = '$firstname', user_lastname = '$lastname', user_email = '$email', username = '$username', user_password = '$hash_pass',user_role = '$role',user_batch = '$batch' WHERE user_id = $user_id";
  $send_update_query = mysqli_query($connection,$update_query);

  if(!$send_update_query){
    die("QUERY FAILED " . mysqli_error($connection));
  }

  header("Location: ./users.php?source=view_users");
}


 ?>
 <div class="container-fluid">
   <div class="container">
     <form class="" action="" method="post">
       <div class="row justify-content-center mt-5 mb-3">
           <div class="col-md-6 ">
               <div class="form-group">
                  <label for="firstname">First Name:</label>
                  <input type="text" name="firstname" class="form-control" value="<?php echo $user_firstname; ?>">
               </div>
           </div>
           <div class="col-md-6 ">
               <div class="form-group">
                   <label for="lastname">Last Name</label>
                   <input type="text" name="lastname" class="form-control" value="<?php echo $user_lastname; ?>">
               </div>
           </div>
       </div>
       <div class="row justify-content-center mt-5 mb-3">
           <div class="col-md-6 ">
               <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="text" name="email" class="form-control" value="<?php echo $user_email; ?>">
               </div>
           </div>
           <div class="col-md-6 ">
               <div class="form-group">
                   <label for="username">Username</label>
                   <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
               </div>
           </div>
       </div>
       <div class="row justify-content-center mt-5 mb-3">
           <div class="col-md-6 ">
               <div class="form-group">
                  <label for="batch">batch:</label>
                  <select class="form-control" name="batch">
                    <?php

                    $query = "SELECT * FROM batch WHERE batch_id = $user_batch";
                    $send = mysqli_query($connection,$query);
                    while ($row = mysqli_fetch_assoc($send)) {
                      $batch_id = $row['batch_id'];
                      $batch_name = $row['batch_name'];
                      echo "<option value='$batch_id'>$batch_name</option>";
                    }

                     ?>


                     <?php

                     $query = "SELECT * FROM batch";
                     $send = mysqli_query($connection,$query);
                     while ($row = mysqli_fetch_assoc($send)) {
                       $batch_id = $row['batch_id'];
                       $batch_name = $row['batch_name'];
                       echo "<option value='$batch_id'>$batch_name</option>";
                     }

                     ?>

                  </select>
               </div>
           </div>


           <div class="col-md-6 ">
               <div class="form-group">
                  <label for="password">Role:</label>
                  <select class="form-control" name="role">
                    <option value="<?php echo $user_role ?>"><?php echo $user_role; ?></option>
                    <?php

                    if ($user_role == 'student') {
                      echo "<option value='faculty'>faculty</option>";
                      echo "<option value='admin'>admin</option>";
                    }elseif ($user_role == 'faculty') {
                      echo "<option value='student'>student</option>";
                      echo "<option value='admin'>admin</option>";
                    }else{
                      echo "<option value='student'>student</option>";
                      echo "<option value='faculty'>faculty</option>";
                      echo "<option value='admin'>admin</option>";
                    }

                     ?>
                  </select>
               </div>
           </div>

       </div>
       <div class="row  mt-5 mb-3">
           <div class="col-md-6 ">
               <div class="form-group">
                  <label for="email">Password:</label>
                  <?php
                   $pass = $_SESSION['password'];
                   ?>
                  <input type="password" name="password" class="form-control" value="<?php echo $pass; ?>">
               </div>
           </div>

       </div>
       <div class="row justify-content-center mt-5 mb-3">
         <input type="submit" name="submit" value="Update User" class="btn btn-primary btn-lg">
       </div>
     </form>
   </div>

 </div>
