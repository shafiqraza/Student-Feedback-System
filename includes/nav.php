

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Student Feedback System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./feedback.php">Your Feedback</a>
      </li>

      <?php
      if (isset($_SESSION['user_role'])) {
        if ($_SESSION['user_role'] == 'admin') {
          echo "<li class='nav-item'>
            <a class='nav-link' href='admin/index.php'>Admin</a>
          </li>";
        }
      }


        ?>


    </ul>
    <?php
    if(isset($_SESSION['username'])){
      $username = $_SESSION['username'];
      echo "<ul class='nav navbar-nav navbar-right mr-5'>
      <li class='nav-item dropdown'>
          <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
              $username
          </a>
          <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
            <a class='dropdown-item' href='./profile.php'><span class='glyphicon glyphicon-user'></span>Profile</a>
            <div class='dropdown-divider'></div>
            <a class='dropdown-item' href='./logout.php'><span class='glyphicon glyphicon-log-in'></span> Logout</a>
          </div>
      </li>
      </ul>";
    }else{
      echo "<ul class='nav navbar-nav navbar-right'>
            <li><a class='nav-link  ' href='./registration.php'><span class='glyphicon glyphicon-user'></span>Registration</a></li>
            <li><a class='nav-link' href='./login.php'><span class='glyphicon glyphicon-log-in'></span> login</a></li>
      </ul>";
    }
     ?>


  </div>
</nav>
