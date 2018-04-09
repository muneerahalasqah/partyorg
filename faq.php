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

    <title>Besher - بِشر</title>
      
      <!-----logo--------->
     <link rel="shortcut icon"
           href="img/logo21.png"width="16" height="16"
           />
      
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
      
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      
        <div class="container">
          <!-- Login Modal & Button -->
       <?php
        if (isset($_SESSION['cid'])){
            $cid = $_SESSION['cid'];
            require 'connect.php';
            $result=mysqli_query($db,"SELECT fname FROM customer WHERE customer_id=$cid");
            $row=mysqli_fetch_row($result);
            $fname=$row[0];
            ?>
            <div class="dropdown">
            <button class="dropbtn" type="button"><i class="fa fa-chevron-circle-down"></i> <?php echo $fname;?></button>
            <div class="dropdown-content">
                <a href="account.php"><i class="fa fa-user"></i> Account</a>
                <a href="#" id="myBtn"><i class="fa fa-bars"></i> Party Plan</a>
                    <!-- The Modal -->
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
                                  <th style="color:red;">Delete</th>
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
                            <button class="loginb" type="submit"  onclick="window.location.href='plan.php'">Commit</button>
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
            <?php
        }
        
            ?>


      <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src ="img/Logo33.png"width="80" height="40"/></a>
          <button class="navbar-toggler navbar-toggler-left" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto text-left">
                <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php#about">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php#portfolio">Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php#contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#faq">FAQ</a>
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
        <img src="img/Logo33.png" alt="log" width="30%">
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

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-heading text-uppercase">Party Organizer</div>
            <div class="intro-lead-in">A way to help you organize your special occasion </div>
        </div>
      </div>
    </header>

<!-- FAQ -->
<section class="bg-light" id="faq">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Frequently Asked Questions</h2>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
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

  </body>

</html>