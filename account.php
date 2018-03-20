<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Title & Logo -->
    <title>Besher - بِشر</title>
    <link rel="shortcut icon"
       href="img/logo21.png"width="16" height="16"/>
      
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">
   <link href="css/login-register.css" rel="stylesheet">
    <link href="css/modal.css" rel="stylesheet">
      
                <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Contact form JavaScript -->
        <script src="js/jqBootstrapValidation.js"></script>
        <script src="js/contact_me.js"></script>

        <!-- Custom scripts for this template -->
        <script src="js/agency.min.js"></script>
        <script src="js/print.js"></script>
      
  </head>

  <body id="page-top" style="background-color:#f1f1f1">

    <!-- Navigation -->
    <nav style="background-color:#5b6771;" class="navbar navbar-expand-lg navbar-dark fixed-top " id="mainNav" >
      
        <div class="container">
          <!-- Login Modal & Button -->
        <?php
        if (isset($_SESSION['cid'])){
            $cid = $_SESSION['cid'];
            require_once('connect.php');
            $result=mysqli_query($db,"SELECT fname FROM customer WHERE customer_id=$cid");
            $row=mysqli_fetch_row($result);
            $fname=$row[0];
            ?>
            <div class="dropdown">
            <button class="dropbtn" type="button"><i class="fa fa-chevron-circle-down"></i> <?php echo $fname;?></button>
            <div class="dropdown-content">
                <a href="account.php"><i class="fa fa-user"></i> Account</a>
                <a href="#plan"id="myBtn" data-toggle="modal"><i class="fa fa-bars"></i> Party Plan</a> 
                <div id="myModal" class="modal">

                      <!-- Modal content -->
                      <div class="modal-content">
                        <div class="modal-header">
                            <h2>Party Plan</h2>
                            <img src ="img/Logo33.png"width="80" height="40"/>
                        </div>
                        <div class="modal-body">
                          <table class="table">
                              <thead class="thead-default">
                                <tr>
                                  <th>Vendor Name</th>
                                  <th>Vendor Type</th>
                                  <th>Price</th>
                                  <th style="color=red;">Delete</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                 if(isset($_SESSION['plan']) && !empty($_SESSION['plan'])){
                                  $total=0;
                                  $whereIn = implode(',',$_SESSION['plan']);
                                  $vsql = "SELECT vendor.vendor_id,vendor.v_name,vendor.start_price,v_type.type_name FROM vendor LEFT JOIN v_type ON vendor.type_id=v_type.type_id WHERE vendor_id IN($whereIn)";
                                  $vquery = mysqli_query($db,$vsql);
                                  while($vrow=mysqli_fetch_row($vquery)){
                                     echo "<tr>";
                                     echo "<td>$vrow[1]</td>";
                                     echo "<td>$vrow[3]</td>";
                                     echo "<td>$vrow[2]</td>";
                                     echo "<td><a href='delplan.php?id=$vrow[0]'><i class='fa fa-trash'></i></a></td>";
                                     echo "</tr>";
                                     $total = $total+$vrow[2];
                                  }
                                  ?>
                                  <tr>
                                      <td colspan="3" style="text-align:right"><b>Total=</b></td>
                                      <td><?php echo $total;?> <b>S.R.</b></td>
                                  </tr>
                                  <?php
                                 } else {
                                     echo "<tr><td colspan='4'>No Vendors added yet ..</td></tr>";
                                 }
                                  ?>
                              </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="loginb regbtn" onclick="document.getElementById('myModal').style.display='none'">Close</button>
                            <button class="loginb" type="submit">Commit</button>
                        </div>
                      </div>

                    </div>    
                <a href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
            </div>
            </div>
            <?php            
            } else {
            ?>
            <button class="login-btn" type="button" onclick="document.getElementById('id01').style.display='block'">Login</button>
            <?php } ?>
            
            <!-- Logo to the left -->
      <a class="navbar-brand js-scroll-trigger" href="index.php"><img src ="img/Logo33.png"width="80" height="40"/></a>
            <!-- Navigation Mennu -->
          <button class="navbar-toggler navbar-toggler-left" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto text-left">
                <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="faq.html">FAQ</a>
              </li>
          </ul>
     
        </div>
      </div>
        <!-- The Modal -->
        <div id="id01" class="modal">
            
        <!-- Modal Content -->
            
        <form class="loginform modal-content animate" action="login.php" method="post">
         <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <div class="imgcontainer">
        <img src="img/Logo33.png" alt="log" width="30%" height="">
        </div>
        <div class="container">
        <label><b >E-mail</b></label>
        <input type="email" placeholder="Enter Email" name="email" required>
        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
        </div>
        <div class="container registerc" style="background-color:#f1f1f1">
        <button class="loginb" type="submit">Login</button>
        <label>Not A member?</label>
        <button type="button" class="loginb regbtn"  onclick= "window.location.href='register.php';" >Register Now!</button>
        </div>
        </form>
        </div>
   </nav>
        
        <section class="bg-light">
            <div class="container">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link active" href="#profile" role="tab" data-toggle="tab"><h6>Profile</h6></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#pass" role="tab" data-toggle="tab"><h6>Update Password</h6></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#histo" role="tab" data-toggle="tab"><h6>History</h6></a>
                    </li>
                </ul>

                <!-- Tab panes -->
            <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="profile">
                <?php
                if(isset($_SESSION['cid'])){
                    require_once('connect.php');
                    $cid = $_SESSION['cid'];
                    $result1 = mysqli_query($db,"SELECT fname,lname,password,email,location_id FROM customer WHERE customer_id=$cid");
                    $row1 = mysqli_fetch_row($result1);
                    $fname = $row1[0];
                    $lname = $row1[1];
                    $email = $row1[3];
                    $pass = $row1[2];
                    $location = $row1[4];
                    
                    echo "<form method='POST' action='update.php'>";
                    echo "<div class='form-group'>";
                    echo "<b>First Name: </b><input type='text' class='form-control' name='newfname' value='$fname'><br>";
                    echo "<b>Last Name: </b><input type='text' class='form-control' name='newlname' value='$lname'><br>";
                    echo "<b>Email: </b><input type='email' class='form-control' name='newemail' value='$email'><br>";
                    echo "<b>City: </b>";
                    $city = mysqli_query($db,"SELECT location_id,location_name FROM location");
                    echo "<select name='newloc' class='form-control'>";
                    while($row2 = mysqli_fetch_row($city)){
                        if($row2 == $location){
                            printf("<option value='%d' selected> %s </option>",$row2[0],$row2[1]);
                        } else {
                           printf("<option value='%d'> %s </option>",$row2[0],$row2[1]); 
                        }
                    }
                    echo "</select>";
                    echo "</div>";
                    echo "<button type='submit' name='update' class='btn btn-primary'>Update</button> &nbsp;";
                    echo "<button type='reset' class='btn btn-secondary'>Reset</button>";
                    echo "</form>";
                }
                ?>            
                </div>
                <div role="tabpanel" class="tab-pane fade" id="pass">
                    <?php
                    if($cid){
                        require_once('connect.php');
                        $cid = $_SESSION['cid'];
                        
                        echo "<form method='POST' action='update.php'>";
                        echo "<div class='form-group'>";
                        echo "<b>New Password: </b><input type='password' class='form-control' placeholder='Enter the new password' name='newpass'><br/>";
                        echo "<b>Re-enter Password: </b><input type='password' class='form-control' placeholder='Re-enter the new password' name='passconfirm'><br/>";
                        echo "<b>Old Password: </b><input type='password' class='form-control' name='oldpass' placeholder='Enter old password'><br/>";
                        echo "</div>";
                        echo "<button type='submit' name='uppass' class='btn btn-primary'>Update</button> &nbsp;";
                        echo "<button type='reset' class='btn btn-secondary'>Reset</button>";
                        echo "</form>";
                    }
                    ?>
                
                </div>
            <div role="tabpanel" class="tab-pane fade" id="histo">
                <?php
                $sql2="SELECT * FROM party_plan WHERE c_id=$cid";
                $query2=mysqli_query($db,$sql2);
                if(mysqli_fetch_assoc($query2)!==NULL){
                    $i=1;
                    echo "<div class='card-columns' style='padding:10pt;'>";
                    while($plan=mysqli_fetch_assoc($query2)){
                ?>
                <div class="card bg-white text-black text-center p-3">
                    <div class="card-body">
                    <h5 class="card-title">Party Plan #<?php echo $i++;?></h5>
                    <p class="card-text">
                    <?php
                        $pid=$plan['party_id'];
                        $ven=mysqli_query($db,"SELECT vendor.* FROM vendor LEFT JOIN contain ON vendor.vendor_id=contain.v_id WHERE contain.p_id=$pid");
                        while($v=mysqli_fetch_assoc($ven)){ echo $v['v_name'].", ";}
                        ?></p>
                        <p><b>Estimated Cost: </b><?php echo $plan['estimated_cost'];?> <b> S.R.</b></p>
                    <a href="#<?php echo $plan['party_id'];?>" class="btn btn-primary" data-toggle="modal">More</a>
                    </div>
                </div>
                <?php
                    }
                    echo "</div>";
                }else{
                    echo "<div class='alert alert-warning' role='alert'><strong>You haven't added party plans yet ..</strong></div>";
                }
                ?>
                </div>
                </div>
            </div>
            
            <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

            
            
        </section>

    <!-- Footer -->
    <footer  style="background-color:white">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; <b>Besher - بشر</b> Party Orgnizer 2018</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram"></i>
                </a>
              </li>
                <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-snapchat"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
      <?php
      $query2=mysqli_query($db,"SELECT * FROM party_plan WHERE c_id=$cid");
      while($plan1=mysqli_fetch_assoc($query2)){
      ?>
      <div class="portfolio-modal modal fade" id="<?php echo $plan1['party_id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Party Plan #<?php echo $plan1['party_id'];?></h2>
                  <div id="plan">
                      <div class="tevt-center"><img src="img/Logo33.png" alt="log" width="30%"></div>
                  <ul>
                  <?php
                 $pid=$plan1['party_id'];
                 $vsql1 = "SELECT vendor.* FROM vendor LEFT JOIN contain ON vendor.vendor_id=contain.v_id WHERE contain.p_id=$pid";
                  $vq=mysqli_query($db,$vsql1);
                  while($vrow1=mysqli_fetch_assoc($vq)){
                      echo "<div class='container bg-white'>";
                      echo "<div class='container'>";
                      echo "<h5>".$vrow1['v_name']."</li></h5>";
                      echo $vrow1['description'];
                      echo "<table style='margin-left:50px;width:50%'>";
                      echo "<tr><td class='text-left'><b>Starting Price: </b></td>";
                      echo "<td>".$vrow1['start_price']." <b>S.R.</b></td></tr>";
                      $vid=$vrow1['vendor_id'];
                      $type= mysqli_query($db,"SELECT v_type.type_name FROM v_type WHERE v_type.type_id IN (SELECT vendor.type_id FROM vendor WHERE vendor.vendor_id=$vid)");
                      $t=mysqli_fetch_assoc($type);
                      echo "<tr><td class='text-left'><b>Type: </b></td>";
                      echo "<td>".$t['type_name']."</td></tr>";
                      $loc= mysqli_query($db,"SELECT * FROM location WHERE location.location_id IN (SELECT vendor.location_id FROM vendor WHERE vendor.vendor_id=$vid)");
                      $l=mysqli_fetch_assoc($loc);
                      echo "<tr><td class='text-left'><b>City: </b></td>";
                      echo "<td>".$l['location_name']."</td></tr>";
                      echo "<tr><td class='text-left'><b>Phone: </b></td>";
                      echo "<td>".$vrow1['phone']."</td></tr>";
                      echo "<tr><td class='text-left'><b>Email: </b></td>";
                      echo "<td>".$vrow1['email']."</td></tr>";
                      echo "<tr><td class='text-left'><b>Instgram Account: </b></td>";
                      echo "<td>".$vrow1['instgram']."</td></tr>";
                      echo "<tr><td class='text-left'><b>Twitter Account: </b></td>";
                      echo "<td>".$vrow1['twitter']."</td></tr>";
                      echo "<tr><td class='text-left'><b>Google Maps: </b></td>";
                      echo "<td>".$vrow1['google_maps']."</td></tr>";
                      echo "</table>";
                      echo "<hr>";
                      echo "</div>";
                      echo "</div>";
                  }
                  ?>
                  </ul>
                  </div>
                  <button class="btn btn-primary regbtn" type="button" onClick="printContent('plan')"><i class="fa fa-print"></i> Print</button>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <?php } ?>
     
  </body>

</html>
