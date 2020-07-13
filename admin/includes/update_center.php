<?php
if(isset($_GET['center_id'])) {
  $center_id = $_GET['center_id'];

  $sql = "SELECT * FROM center WHERE center_id =  $center_id";
  $send = mysqli_query($connection,$sql);
  $row = mysqli_fetch_assoc($send);
  $center_name = $row['center_name'];

}

if (isset($_POST['edit_center'])) {
  $edit_center_name = $_POST['edit_center_name'];
  $edit_sql = "UPDATE center SET center_name = '$edit_center_name' WHERE center_id = $center_id";
  $send_edit_sql = mysqli_query($connection,$edit_sql);

  header("Location: center.php?source=view_center");
}

 ?>
<form class="" action="" method="post">
  <label for="center_name">Edit Center Name:</label>
  <input type="text" name="edit_center_name" placeholder="" class="form-control" value="<?php echo $center_name; ?>">
  <input type="submit" name="edit_center" value="Add Center" class="btn btn-primary mt-3">
</form>
