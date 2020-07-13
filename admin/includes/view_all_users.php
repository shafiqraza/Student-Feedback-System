<div class="container-fluid">
  <div class="">
    <table class="table table-hover table-bordered mt-5 ">
      <thead>
        <tr>
          <th>Id</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>username</th>
          <th>Password</th>
          <th>Role</th>
          <th>Batch</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>

      <tbody>

        <?php
    $query = "SELECT * FROM users";
    $send_query = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($send_query)) {

      $user_id = $row['user_id'];
      $user_firstname = $row['user_firstname'];
      $user_lastname = $row['user_lastname'];
      $user_email = $row['user_email'];
      $username = $row['username'];
      $user_password = $row['user_password'];
      $user_role = $row['user_role'];
      $user_batch = $row['user_batch'];

      echo "<tr>";
      echo " <td>$user_id</td>";
      echo " <td>$user_firstname</td>";
      echo " <td>$user_lastname</td>";
      echo " <td>$user_email</td>";
      echo " <td>$username</td>";
      echo " <td>$user_password</td>";
      echo " <td>$user_role</td>";


      $batch_query = "SELECT * FROM batch WHERE batch_id = $user_batch";
      $send_batch_query = mysqli_query($connection,$batch_query);
      while ($row = mysqli_fetch_assoc($send_batch_query)) {
        $batch_id = $row['batch_id'];
        $batch_name = $row['batch_name'];
        echo " <td>$batch_name</td>";
      }




      echo " <td><a href='users.php?source=edit_user&user_id=$user_id'>Edit</a></td>";
      echo " <td><a href='users.php?source=view_users&user_id=$user_id'>Delete</a></td>";


      echo "</tr>";
    }

         ?>

         <a href=''></a>
      </tbody>
    </table>
  </div>
</div>


<?php
if (isset($_GET['user_id'])) {
  $user_id = $_GET['user_id'];
  $delete_query = "DELETE FROM users WHERE user_id = $user_id";
  $send_delete_query = mysqli_query($connection,$delete_query);
  header("Location: ./users.php?source=view_users");
}


 ?>
