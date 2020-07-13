
<!-- DISPLAYING DATA FROM DB -->
<?php
// if (isset($_GET['user_id'])) {
//   $the_user_id = $_GET['user_id'];
//
//   $query = "SELECT * FROM users WHERE user_id = $the_user_id";
//   $edit_query_send = mysqli_query($connection,$query);
//   while ($row = mysqli_fetch_assoc($edit_query_send)) {
//
//     $user_id = $row['user_id'];
//     $user_firstname = $row['user_firstname'];
//     $user_lastname = $row['user_lastname'];
//     $user_email = $row['user_email'];
//     $username = $row['username'];
//     $user_password = $row['user_password'];
//     $user_role = $row['user_role'];
//     $user_batch = $row['user_batch'];
//   }
// }
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

  $hash_password = password_hash($password,PASSWORD_BCRYPT,['option' => 12]);


  $add_query = "INSERT INTO users(user_firstname, user_lastname,user_email,username,user_password,user_role,user_batch) VALUES('$firstname','$lastname','$email','$username','$hash_password','$role','$batch')";
  $send_add_query = mysqli_query($connection,$add_query);

  if(!$send_add_query){
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
                  <input type="text" name="firstname" class="form-control" >
               </div>
           </div>
           <div class="col-md-6 ">
               <div class="form-group">
                   <label for="lastname">Last Name</label>
                   <input type="text" name="lastname" class="form-control">
               </div>
           </div>
       </div>
       <div class="row justify-content-center mt-5 mb-3">
           <div class="col-md-6 ">
               <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="text" name="email" class="form-control">
               </div>
           </div>
           <div class="col-md-6 ">
               <div class="form-group">
                   <label for="username">Username</label>
                   <input type="text" name="username" class="form-control" >
               </div>
           </div>
       </div>
       <div class="row justify-content-center mt-5 mb-3">
           <div class="col-md-6 ">
               <div class="form-group">
                  <label for="batch">batch:</label>
                  <select class="form-control" name="batch">

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
                  <input type="password" name="password" class="form-control" >
               </div>
           </div>

       </div>
       <div class="row justify-content-center mt-5 mb-3">
         <input type="submit" name="submit" value="Add User" class="btn btn-primary btn-lg">
       </div>
     </form>
   </div>

 </div>
