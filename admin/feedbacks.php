<?php include('includes/admin_header.php'); ?>



<div class="container-fluid">
  <div class="">
    <table class="table table-hover table-bordered mt-5 ">
      <thead>
        <tr>
          <th>Id</th>
          <th>Center</th>
          <th>Faculty</th>
          <th>Student</th>
          <th>Student Batch</th>
          <th>Puntuality</th>
          <th>Course Coverage</th>
          <th>Technical Support</th>
          <th>Clearing Doubt</th>
          <th>Book Utilization</th>
          <th>Report Via SMS</th>
          <th>Delete</th>
        </tr>
      </thead>

      <tbody>

        <?php
    $query = "SELECT * FROM feedback";
    $send_query = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($send_query)) {

      $feedback_id = $row['feedback_id'];
      $feedback_center_id = $row['feedback_center_id'];
      $feedback_faculty_id = $row['feedback_faculty_id'];
      $feedback_student_batch = $row['feedback_student_batch'];
      $feedback_student_username = $row['feedback_student_username'];
      $feedback_punctuality = $row['feedback_punctuality'];
      $feedback_course_coverage = $row['feedback_course_coverage'];
      $feedback_technical_support = $row['feedback_technical_support'];
      $feedback_clearing_doubt = $row['feedback_clearing_doubt'];
      $feedback_book_utilization = $row['feedback_book_utilization'];
      $feedback_report_via_sms = $row['feedback_report_via_sms'];

      echo "<tr>";

      echo " <td>$feedback_id</td>";

      $center_query = "SELECT * FROM center WHERE center_id = $feedback_center_id";
      $send_center_query = mysqli_query($connection,$center_query);
      while ($row = mysqli_fetch_assoc($send_center_query)) {
        $center_name = $row['center_name'];

        echo " <td>$center_name</td>";
      }

      $faculty_query = "SELECT * FROM users WHERE user_id = $feedback_faculty_id";
      $send_faculty_query = mysqli_query($connection,$faculty_query);
      while ($row = mysqli_fetch_assoc($send_faculty_query)) {
        $faculty_name = $row['user_email'];

        echo " <td>$faculty_name</td>";
      }



      echo " <td>$feedback_student_username</td>";



      $batch_query = "SELECT * FROM batch WHERE batch_id = $feedback_student_batch";
      $send_batch_query = mysqli_query($connection,$batch_query);
      while ($row = mysqli_fetch_assoc($send_batch_query)) {
        $batch_name = $row['batch_name'];

        echo " <td>$batch_name</td>";
      }




      echo " <td>$feedback_punctuality</td>";
      echo " <td>$feedback_course_coverage</td>";
      echo " <td>$feedback_technical_support</td>";
      echo " <td>$feedback_clearing_doubt</td>";
      echo " <td>$feedback_book_utilization</td>";
      echo " <td>$feedback_report_via_sms</td>";
      echo " <td><a href='feedbacks.php?id=$feedback_id'>Delete</a></td>";

      //
      // $batch_query = "SELECT * FROM batch WHERE batch_id = $user_batch";
      // $send_batch_query = mysqli_query($connection,$batch_query);
      // while ($row = mysqli_fetch_assoc($send_batch_query)) {
      //   $batch_id = $row['batch_id'];
      //   $batch_name = $row['batch_name'];
      //   echo " <td>$batch_name</td>";
      // }
      //
      //
      //
      //
      // echo " <td><a href='users.php?source=edit_user&user_id=$user_id'>Edit</a></td>";
      // echo " <td><a href='users.php?source=delete_user'>Delete</a></td>";


      echo "</tr>";
    }

         ?>

         <a href=''></a>
      </tbody>
    </table>
  </div>
</div>


<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $delete_query = "DELETE FROM feedback WHERE feedback_id = $id";
  $send_delete_query = mysqli_query($connection,$delete_query);
  header("Location: feedbacks.php");
}

 ?>

<?php include('includes/admin_footer.php'); ?>
