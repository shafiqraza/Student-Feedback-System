<?php include('includes/header.php'); ?>
<?php

if(!isset($_SESSION['username'])){
    header("Location: login.php");
}
?>

<?php

if(isset($_POST['submit'])){
    $center_id = $_POST['center'];
    $faculty_id = $_POST['faculty_name'];
    $username = $_POST['username'];
    $batch_id = $_POST['batch_name'];
    $punctuality = $_POST['punctuality'];
    $course_coverage = $_POST['course_coverage'];
    $technical_support = $_POST['technical_support'];
    $clearing_doubt = $_POST['clearing_doubt'];
    $book_utilization = $_POST['book_utilization'];
    $report_via_sms = $_POST['report_via_sms'];


    if (!empty($center_id) && !empty($faculty_id) && !empty($username) && !empty($batch_id) && !empty($punctuality) && !empty($course_coverage) && !empty($technical_support)  && !empty($clearing_doubt) && !empty($book_utilization) && !empty($report_via_sms)) {
      $query = "INSERT INTO feedback(feedback_center_id, feedback_faculty_id, feedback_student_batch, feedback_student_username, feedback_punctuality, feedback_course_coverage, feedback_technical_support, feedback_clearing_doubt, feedback_book_utilization, `feedback_report_via_sms`) VALUES ($center_id,$faculty_id, $batch_id,'$username','$punctuality','$course_coverage','$technical_support','$clearing_doubt','$book_utilization','$report_via_sms') ";
      $send = mysqli_query($connection,$query);

      $msg = "<div class='container mt-5'>
    <div class='row justify-content-center'>
        <div class='col-md-6'>
      <div class='alert alert-success alert-dismissible fade show'>
      <button type='button' class='close' data-dismiss='alert'>&times;</button>
       Your feedback submitted succesfully <strong>Thank YOU !</strong>
    </div>
     </div>
    </div>
  </div>";
}else{
  $msg = "<div class='container mt-5'>
<div class='row justify-content-center'>
    <div class='col-md-6'>
  <div class='alert alert-danger alert-dismissible fade show'>
  <button type='button' class='close' data-dismiss='alert'>&times;</button>
   Feild cannot be <strong>Empty</strong>
</div>
 </div>
</div>
</div>";
}

}

?>

<div class="container-fluid">

    <div class="container">
       <?php if(isset($msg)){ echo $msg; } ?>
        <h1 class="text-center mt-5">Student Feedback Pannel</h1>

        <form action="" method="post">
            <div class="row justify-content-center mt-5 mb-3">
                <div class="col-md-6 ">
                    <div class="form-group">
                       <label for="">Center Name:</label>


                        <select name="center" id="" class="form-control">
                           <option value="">Select Option</option>
                            <?php

                            $query = "SELECT * FROM center";
                            $send = mysqli_query($connection,$query);
                            while($row = mysqli_fetch_assoc($send)){
                                $center_id = $row['center_id'];
                                $center_name = $row['center_name'];
                                echo "<option value='$center_id'>$center_name</option>";
                            }

                            ?>
                        </select>


                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="form-group">
                       <label for="center_name">Faculty Name:</label>
                        <select name="faculty_name" id="" class="form-control">
                            <option value="">Select Option</option>
                            <?php

                            $query = "SELECT * FROM users WHERE user_role = 'faculty' ";
                            $send = mysqli_query($connection,$query);
                            while($row = mysqli_fetch_assoc($send)){
                                $user_id = $row['user_id'];
                                $user_firstname = $row['user_firstname'];
                                echo "<option value='$user_id'>$user_firstname</option>";
                            }

                            ?>
                        </select>
                    </div>
                </div>

            </div>

            <div class="row justify-content-center mt-5 mb-3">
                <div class="col-md-6 ">
                    <div class="form-group">
                       <label for="subject">Student Username:</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $_SESSION['username']; ?>" >
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="form-group">
                       <label for="subject">Batch:</label>
                        <select name="batch_name" id="" class="form-control">

                            <?php
                            $batch_id = $_SESSION['user_batch'];
                            $query = "SELECT * FROM batch WHERE batch_id = $batch_id ";
                            $send = mysqli_query($connection,$query);
                            while($row = mysqli_fetch_assoc($send)){
                                $batch_id = $row['batch_id'];
                                $batch_name = $row['batch_name'];
                                echo "<option value='$batch_id'>$batch_name</option>";
                            }

                            ?>


                        </select>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-5 mb-3">
                <div class="col-md-6 ">
                    <div class="form-group">
                       <label for="center">1. (Punctuality) Do classes start and end on time?</label>
                        <select name="punctuality" id="" class="form-control">
                           <option value="">Select Option</option>
                            <option value="Every Class">Every Class</option>
                            <option value="Most of the Class">Most of the Class</option>
                            <option value="Rarely">Rarely</option>
                            <option value="Never">Never</option>
                        </select>

                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="form-group">
                        <label for="subject">2. (Course Coverage) For the chapters covered to date; has the faculty covered all topics?</label>
                        <select name="course_coverage" id="" class="form-control">
                           <option value="">Select Option</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-5 mb-3">
                <div class="col-md-6 ">
                    <div class="form-group">
                       <label for="center">3. (Technical Support) Does faculty guide you during your lab exercise?</label>
                        <select name="technical_support" id="" class="form-control">
                           <option value="">Select Option</option>
                            <option value="Excellent">Excellent</option>
                            <option value="Good">Good</option>
                            <option value="Average">Average</option>
                            <option value="Fair">Fair</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="form-group">
                        <label for="subject">4. (Clearing doubt) Does the faculty teaches concepts clearly and answers your questions to your satisfaction?</label>
                        <select name="clearing_doubt" id="" class="form-control">
                           <option value="">Select Option</option>
                            <option value="Excellent">Excellent</option>
                            <option value="Good">Good</option>
                            <option value="Average">Average</option>
                            <option value="Fair">Fair</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-5 mb-3">
                <div class="col-md-6 ">
                    <div class="form-group">
                       <label for="center">5. (Book Utilization) Are Books utilized during class?</label>
                        <select name="book_utilization" id="" class="form-control">
                           <option value="">Select Option</option>
                            <option value="Excellent">Excellent</option>
                            <option value="Good">Good</option>
                            <option value="Average">Average</option>
                            <option value="Fair">Fair</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="form-group">
                        <label for="subject">6. Student Appraisal Reports are delivered to you or your guardian via SMS monthly?</label>
                        <select name="report_via_sms" id="" class="form-control">
                           <option value="">Select Option</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
            </div>

            <input type="submit" class="btn btn-lg btn-primary mb-5" name="submit">
          </form>
    </div>
</div>


<?php include('includes/footer.php'); ?>
