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
    <link href="css/3-col-portfolio.css" rel="stylesheet"> 
      
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
 
      
      <!-----FilterContent--------->
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
      
      
      
  </head>

  <body id="page-top" style="background-color:#f1f1f1">
    <!-- Navigation -->
    <nav style="background-color:#5b6771;" class="navbar navbar-expand-lg navbar-dark  " id="mainNav" >
      
        <div class="container">
          <!-- Login Modal & Button -->
        <?php
        if (isset($_SESSION['cid'])){
            $cid = $_SESSION['cid'];
            $db=mysqli_connect('localhost','root','','partyorg');
            $result=mysqli_query($db,"SELECT fname FROM customer WHERE customer_id=$cid");
            $row=mysqli_fetch_row($result);
            $fname=$row[0];
            ?>
            <div class="dropdown">
            <button class="dropbtn" type="button"><i class="fa fa-chevron-circle-down"></i> <?php echo $fname;?></button>
            <div class="dropdown-content"  style=" z-index: 4;">
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
     
  
    <!----Filering--------->  
      
	<main class="cd-main-content">
		<div class="cd-tab-filter-wrapper">
			<div class="cd-tab-filter">
				<ul class="cd-filters">
					<li class="placeholder"> 
				 <!-- selected option on mobile -->
					</li> 
					 <?php
        $db=mysqli_connect('localhost', 'root', '','partyorg');
        $cid=$_GET['cid'];
        $result = mysqli_query($db,"SELECT type_id,type_name FROM v_type WHERE type_id IN (SELECT type_id FROM vendor where vendor.vendor_id IN (SELECT belong.vendor_id FROM belong WHERE belong.category_id=$cid))");
        echo "<select name='type' class='loginform' style='margin-top: 10px'>";                
        while ($myrow = mysqli_fetch_row($result)) {
        printf("<option value= '%d'> %s </option>",$myrow[0], $myrow[1]);
                }
        echo "</select>";
        ?>
				</ul> <!-- cd-filters -->
			</div> <!-- cd-tab-filter -->
		</div> <!-- cd-tab-filter-wrapper -->

		<section class="cd-gallery">
			<ul>
				 <div class="container">
      <!-- The vendors cards -->
      <?php
      $db=mysqli_connect('localhost','root','','partyorg');
      $vendors=mysqli_query($db,"SELECT vendor_id,v_name,description FROM vendor");
      echo "<div class='row' style='padding:10pt;'>";
      while($vrow=mysqli_fetch_row($vendors)){
        ?>
       <div class="col-lg-4 col-sm-6 portfolio-item">
       <div class="card text-center h-100">
        <div class="card-block">
        <h4 class="card-title"><?php echo $vrow[1];?></h4>
        <p class="card-text"><?php echo $vrow[2];?></p>
        <a href="addplan.php?id=<?php echo $vrow[0];?>" class="btn btn-primary">ADD</a> 
     </div>
      </div>
      </div>
      <?php  
      }
      echo "</div>";
      ?>
</div>
			</ul>
		</section> <!-- cd-gallery -->

		<div class="cd-filter">
			<form  name="searchForm" method="post" action="" >
<div class="container"  >
Category:<br><br>
       
    <?php
        $db=mysqli_connect('localhost', 'root', '','partyorg');
        $result = mysqli_query($db,"SELECT category_id,category_name FROM category");
        echo "<select name='category[]' class='loginform' >";
        while ($myrow = mysqli_fetch_row($result)) {
            if($myrow[0]==$_GET['cid']){
                printf("<option value= '%d' selected> %s </option>",$myrow[0], $myrow[1]);
            } else {
             printf("<option value= '%d'> %s </option>",$myrow[0], $myrow[1]);   
            }
                }
        echo "</select>";
        ?>
 <br><br>   
Location : <br><br>
        <?php
        $db=mysqli_connect('localhost', 'root', '','partyorg');
        $result = mysqli_query($db,"SELECT location_id,location_name FROM location");
        echo "<select name='location' class='loginform' style='width: 130px'>";                
        while ($myrow = mysqli_fetch_row($result)) {
        printf("<option value= '%d'> %s </option>",$myrow[0], $myrow[1]);
                }
        echo "</select>";
        ?>
    
    <br><br>
    
Rating :<br><br>

Budget : <br>
<div class="""slidecontainer">
  <input type="range" min="1000" max="5000" value="2500" class="slider" id="myRange">
  <p>Price: <span id="demo"></span></p>
</div>

<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>

            
<br>
    <button  class="btn btn-primary" name="" type="submit"value="" class="btnRegister">Search</button> &nbsp;
    <button type="reset" class="btn btn-secondary">Reset</button>
    </div>  
                      
</form>

			<a href="#0" class="cd-close">Close</a>
		</div> <!-- cd-filter -->

		<a href="#0" class="cd-filter-trigger">Filters</a>
	</main> <!-- cd-main-content -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/jquery.mixitup.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
      
      
      
 
    <!-- Footer -->
    <footer  style="background-color:white; ">
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
 
 
  </body>

</html>