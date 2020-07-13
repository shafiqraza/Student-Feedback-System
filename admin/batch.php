<?php include('includes/admin_header.php'); ?>


<?php
if (isset($_POST['add_batch'])) {
    $batch_name = $_POST['batch_name'];
    $sql = "INSERT INTO batch(batch_name) VALUES('$batch_name')";
    $send = mysqli_query($connection,$sql);
}


 ?>


<div class="container">
  <div class="row mt-5">
    <div class="col-md-6">
      <form class="" action="" method="post">
        <label for="center_name">Batch Name:</label>
        <input type="text" name="batch_name" placeholder="" class="form-control">
        <input type="submit" name="add_batch" value="Add Batch" class="btn btn-primary mt-3">
      </form>
    </div>
    <div class="col-md-6">
      <table class="table table-bordered table-hovered ">
        <thead>
          <tr>
            <th>Batch ID</th>
            <th>Batch Name</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $sql = "SELECT * FROM batch";
          $send = mysqli_query($connection,$sql);
          while ($row = mysqli_fetch_assoc($send)) {
            $batch_id = $row['batch_id'];
            $batch_name = $row['batch_name'];
            echo "<tr>";

            echo "<td>$batch_id</td>";
            echo "<td>$batch_name</td>";
            echo "<td><a href='batch.php?source=view_batch&batch_id=$batch_id'>Edit</a></td>";
            echo "<td><a href='batch.php?source=view_batch&delete_id=$batch_id'>Delete</a></td>";


            echo "</tr>";
          }


           ?>
        </tbody>
      </table>

    </div>
  </div>
  <div class="row">
    <div class="col-md-6">

    <?php


    if(isset($_GET['batch_id'])) {
      $batch_id = $_GET['batch_id'];
      include('includes/update_batch.php');
    }


 ?>

 <?php
 if (isset($_GET['delete_id'])) {
   $id = $_GET['delete_id'];
   $delete_query = "DELETE FROM batch WHERE batch_id = $id";
   $send_delete_query = mysqli_query($connection,$delete_query);
   header("Location: batch.php");
 }

  ?>
    </div>
  </div>
</div>




<?php include('includes/admin_footer.php'); ?>
