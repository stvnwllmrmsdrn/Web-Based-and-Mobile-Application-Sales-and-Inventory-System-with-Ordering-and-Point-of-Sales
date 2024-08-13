 <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="sales.php?id=cash&invoice="><b> <img src="img/logo.png" alt="Standley's logo" width="200" height="40"></b></a>
          <div class="nav-collapse collapse">
            <ul class="nav pull-right">
          
            <li><a> <i class="icon-calendar icon-large"></i>
								<?php
								$today = date('y:m:d');
								$new = date('l, F d, Y', strtotime($today));
								echo $new;
								?>
				</a></li>
              <li><a><i class="icon-user"></i> Current Active: 🟢<strong> <?php echo $_SESSION['SESS_LAST_NAME'];?></strong></a></li>
				</a></li>
        
               <li><a href="../index.php"><font color="red" class="btn btn-danger bt-lg active"><i class="icon-off icon-large"></i> LOGOUT</font></a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
    
	