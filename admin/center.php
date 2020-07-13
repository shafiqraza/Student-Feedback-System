<?php include('includes/admin_header.php'); ?>

<?php
if (isset($_POST['add_center'])) {
    $center_name = $_POST['center_name'];
    $sql = "INSERT INTO center(center_name) VALUES('$center_name')";
    $send = mysqli_query($connection,$sql);
}


 ?>


<div class="container">
  <div class="row mt-5">
    <div class="col-md-6">
      <form class="" action="" method="post">
        <label for="center_name">Center Name:</label>
        <input type="text" name="center_name" placeholder="" class="form-control">
        <input type="submit" name="add_center" value="Add Center" class="btn btn-primary mt-3">
      </form>
    </div>
    <div class="col-md-6">
      <table class="table table-bordered table-hovered ">
        <thead>
          <tr>
            <th>Center ID</th>
            <th>Center Name</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $sql = "SELECT * FROM center";
          $send = mysqli_query($connection,$sql);
          while ($row = mysqli_fetch_assoc($send)) {
            $center_id = $row['center_id'];
            $center_name = $row['center_name'];
            echo "<tr>";

            echo "<td>$center_id</td>";
            echo "<td>$center_name</td>";
            echo "<td><a href='center.php?source=view_center&center_id=$center_id'>Edit</a></td>";
            echo "<td><a href='center.php?source=view_center&delete_id=$center_id'>Delete</a></td>";


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


    if(isset($_GET['center_id'])) {
      $center_id = $_GET['center_id'];
      include('includes/update_center.php');
    }
 ?>

 <?php
 if (isset($_GET['delete_id'])) {
   $id = $_GET['delete_id'];
   $delete_query = "DELETE FROM center WHERE center_id = $id";
   $send_delete_query = mysqli_query($connection,$delete_query);
   header("Location: center.php");
 }

  ?>
    </div>
  </div>
</div>
   <?php include('includes/admin_footer.php'); ?>
