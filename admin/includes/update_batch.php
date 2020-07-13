<?php
if(isset($_GET['batch_id'])) {
  $batch_id = $_GET['batch_id'];

  $sql = "SELECT * FROM batch WHERE batch_id =  $batch_id";
  $send = mysqli_query($connection,$sql);
  $row = mysqli_fetch_assoc($send);
  $batch_name = $row['batch_name'];

}

if (isset($_POST['edit_batch'])) {
  $edit_batch_name = $_POST['edit_batch_name'];
  $edit_sql = "UPDATE batch SET batch_name = '$edit_batch_name' WHERE batch_id = $batch_id";
  $send_edit_sql = mysqli_query($connection,$edit_sql);

  header("Location: batch.php?source=view_batch");
}

 ?>
<form class="" action="" method="post">
  <label for="batch_name">Edit Batch Name:</label>
  <input type="text" name="edit_batch_name" placeholder="" class="form-control" value="<?php echo $batch_name; ?>">
  <input type="submit" name="edit_batch" value="Add Batch" class="btn btn-primary mt-3">
</form>
