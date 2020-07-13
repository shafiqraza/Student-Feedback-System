<?php include('includes/admin_header.php'); ?>



<?php

if(isset($_GET['source'])){
  $source = $_GET['source'];

  switch ($source) {
    case 'edit_user':
      include('includes/edit_user.php');
      break;
      case 'view_users':
        include('includes/view_all_users.php');
        break;
        case 'add_user':
          include('includes/add_user.php');
          break;
    default:
      //include('includes/view_all_users.php');
      break;
  }


}


 ?>

<?php include('includes/admin_footer.php'); ?>
