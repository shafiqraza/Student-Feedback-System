

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">SFS Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Home</a>
      </li>

      <?php
//        if(isset($_SESSION['username'])){
//            echo "<li class='nav-item'><a class='nav-link' href='./profile.php'>Profile</a></li>";
//            echo "<li class='nav-item'><a class='nav-link' href='../logout.php'>Logout</a></li>";
//        }else{
//            echo "<li class='nav-item'>
//        <a class='nav-link' href='./login.php'>login</a>
//      </li>
//       <li class='nav-item'>
//        <a class='nav-link' href='./registration.php'>Registration</a>
//      </li>";
//        }
        ?>

        <li class='nav-item'>
            <a class='nav-link' href='./feedbacks.php'>Feedbacks</a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Users
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="./users.php?source=view_users">View All Users</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="./users.php?source=add_user">Add User</a>
            </div>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href="./batch.php?source=view_batch">Batch</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href="./center.php?source=view_center">Center</a>
        </li>
    </ul>
    <!-- <ul class="nav navbar-nav navbar-right">
          <li><a class='nav-link  ' href='./profile.php'><span class="glyphicon glyphicon-user"></span>Profile</a></li>
          <li><a class='nav-link' href='../logout.php'><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul> -->


    <ul class='nav navbar-nav navbar-right mr-5'>
    <li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
          <?php echo $_SESSION['username'];; ?>
        </a>
        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
          <a class='dropdown-item' href='../profile.php'><span class="glyphicon glyphicon-user"></span>Profile</a>
          <div class='dropdown-divider'></div>
          <a class='dropdown-item' href='../logout.php'><span class="glyphicon glyphicon-log-in"></span> Logout</a>
        </div>
    </li>
    </ul>


  </div>
</nav>
