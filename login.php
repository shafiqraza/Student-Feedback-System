<?php include('includes/header.php'); ?>
<?php

if(isset($_POST['submit'])){
     $username = $_POST['student_username'];
     $password = $_POST['student_password'];

    $select_user_query = "SELECT * FROM users WHERE username = '$username' ";
    $send_user_query = mysqli_query($connection,$select_user_query);

    while($row = mysqli_fetch_assoc($send_user_query)){
        $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_user_email = $row['user_email'];
        $db_user_password = $row['user_password'];
        $db_user_role = $row['user_role'];
        $db_user_batch = $row['user_batch'];
    }

    if(isset($db_username)){
        $dbUsername = $db_username;
    }else{
        $dbUsername = "";
    }

    if(password_verify($password,$db_user_password)){
        $_SESSION['user_id'] = $db_user_id;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['email'] = $db_user_email;
        $_SESSION['user_role'] = $db_user_role;
        $_SESSION['user_batch'] = $db_user_batch;

        if($_SESSION['user_role'] == 'admin'){
            header("Location: admin/index.php");
        }else{
            header("Location: profile.php");
        }

    }else{

        $error = "<div class='container mt-5'>
  <div class='row justify-content-center'>
      <div class='col-md-6'>
    <div class='alert alert-danger alert-dismissible fade show'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
     Username or Password <strong>Incorrect !</strong>
  </div>
   </div>
  </div>
</div>";
    }
}

?>



<div class="container-fluid">

    <div class="container">
        <h1 class="text-center mt-5">Login</h1>

        <?php if(isset($error)){ echo $error; } ?>
        <form action="" method="post">

            <div class="row justify-content-center mt-1 mb-3">
                <div class="col-md-6 ">
                    <div class="form-group">
                       <label for="center_name">username:</label>
                        <input type="text" name="student_username" id="" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-5 mb-3">
                <div class="col-md-6 ">
                    <div class="form-group">
                       <label for="subject">Password:</label>
                        <input type="password" name="student_password" id="" class="form-control">
                    </div>
                </div>
            </div>



            <div class="row justify-content-center mt-5 mb-3">
             <input type="submit" name="submit" class="btn btn-lg btn-primary mb-5" value="Login">
            </div>


          </form>
    </div>
</div>


<?php include('includes/footer.php'); ?>
