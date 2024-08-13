<style>
.dropbtn {
  background-color: white;
  color: black;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: white;}

.dropdown:hover .dropdown-content {display: block;}

</style>
 <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand"><b><img src="img/logo.png" alt="Standley's logo" width="200" height="40"></b></a>
          <div class="nav-collapse collapse">
            <ul class="nav pull-right">
          
            <li><a> <i class="icon-calendar icon-large"></i>
								<?php
								$today = date('y:m:d');
								$new = date('l, F d, Y', strtotime($today));
								echo $new;
								?>
				</a></li>
               <li><div class="dropdown">
                <button class="dropbtn">Current Active: 🟢<strong> <?php echo $_SESSION['SESS_FIRST_NAME'];?></button>
                        <div class="dropdown-content">
			            <a href="edit-profileview.php?id=<?php echo $_SESSION['SESS_MEMBER_ID'];?>"><i class="icon-edit"></i> Edit Profile</a>
        <a href="../index.php"><i class="icon-off"></i> Log Out</a>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
    
	