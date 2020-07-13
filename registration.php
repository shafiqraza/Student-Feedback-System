<?php include('includes/header.php'); ?>


<?php

if(isset($_POST['submit'])){
    $firsname = $_POST['user_firstname'];
    $lastname = $_POST['user_lastname'];
    $email = $_POST['user_email'];
    $username = $_POST['user_username'];
    $password = $_POST['user_password'];
    $batch = $_POST['user_batch'];


    $options = [
    'cost' => 12,
    ];
    $hash_password =  password_hash($password, PASSWORD_BCRYPT, $options);


    $query = "INSERT INTO users(user_firstname, user_lastname, user_email, username, user_password, user_role, user_batch) VALUES('$firsname','$lastname','$email','$username','$hash_password','student','$batch')";

    $send_query = mysqli_query($connection,$query);

    if(!$send_query){
        die("QUERY FALIED " . mysqli_error($connection));
    }
    header("Location: login.php");

}

?>

<div class="container-fluid">

    <div class="container">
        <h1 class="text-center mt-5">Registraion</h1>
        <form action="" method="post">
            <div class="row justify-content-center mt-5 mb-3">
                <div class="col-md-6 ">
                    <div class="form-group">
                       <label for="center_name">First Name:</label>
                        <input type="text"  name="user_firstname" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="form-group">
                       <label for="subject">Last Name:</label>
                        <input type="text" name="user_lastname"  id="" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-5 mb-3">
                <div class="col-md-6 ">
                    <div class="form-group">
                       <label for="center_name">Email:</label>
                        <input type="email" name="user_email" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="form-group">
                       <label for="center_name">Batch:</label>
                        <select type="text" name="user_batch" id="" class="form-control">
                          <?php

                          $sql = "SELECT * FROM batch";
                          $send = mysqli_query($connection,$sql);
                          while ($row = mysqli_fetch_assoc($send)) {
                            $batch_id = $row['batch_id'];
                            $batch_name = $row['batch_name'];
                            echo "<option value='$batch_id'>$batch_name</option>";
                          }

                           ?>

                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
               <div class="col-md-6 ">
                    <div class="form-group">
                       <label for="center_name">username:</label>
                        <input type="text" name="user_username" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="form-group">
                       <label for="subject">Password:</label>
                        <input type="password" name="user_password" id="" class="form-control">
                    </div>
                </div>

            </div>





            <input type="submit" name="submit" class="btn btn-lg btn-primary mb-5" value="Signup">
          </form>
    </div>
</div>


<?php include('includes/footer.php'); ?>
