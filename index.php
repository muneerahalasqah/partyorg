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
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      
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
            <div class="dropdown-content">
                <a href="account.php"><i class="fa fa-user"></i> Account</a>
                <a href="#"><i class="fa fa-bars"></i> Party Plan</a>
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
        <input type="pass" placeholder="Enter Password" name="password" required>
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

    <!-- About -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">about</h2> <br><br>
            <h3 class="text-muted"></h3>
          </div>
        </div>
          <div class="row">
          
             <div class="col-lg-12">
            
             <ul class="timeline">
              
             <li>
                
             <div class="timeline-image">
                  
             <img class="rounded-circle img-fluid" src="img/about/team.gif" alt="">
                 </div>
                 
                 <div class="timeline-panel">
                  
<div class="timeline-heading">
                    
<h4>Who are we?</h4>
                    

                  
</div>
                  
<div class="timeline-body">
                    
<p class="text-muted">We are Nora, Muneerah, and Samiah, a team of Information Technology students who are studying at Qassim University.</p>
                  
</div>
                
</div>
              
</li>
              
<li class="timeline-inverted">
                
<div class="timeline-image">
                  
<img class="rounded-circle img-fluid" src="img/about/grad.gif" alt="">
                
</div>
                
<div class="timeline-panel">
                  
<div class="timeline-heading">
                    
<h4>Graduation</h4>
                    
               
</div>
                  
<div class="timeline-body">
                    
<p class="text-muted">This website is our graduation project. Aiming to push us to develop an application that involoves the skills we learned through out the years of our study embedded in it.
It is an opportunity to show our passion for creating such an application.
</p>
                  
</div>
                
</div>
              
</li>
              
<li>
                
<div class="timeline-image">
                  
<img class="rounded-circle img-fluid" src="img/about/logo11.gif" alt="">
                
</div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>Party Organizer</h4>
                    
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Party Orgnizer is a website that contains trusted party vendors from various caregories, in which it helps you to organise your happy occasion.
                    We choose our website name to be Besher/بِشر, which means happiness in Arabic.</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/about/goal.gif" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>The Goal</h4>
                    
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">We aim to provide a trusted platform containing party vendors in which it gains customer trust for such vendors.
                    We also aim to minimise the time and effort people spend when orgnizing a party.</p>
                  </div>
                </div>
              </li>
              <!--<li class="timeline-inverted">
                <div class="timeline-image">
                   <img class="rounded-circle img-fluid" src="img/sqr.jpg" alt="">
                </div>
              </li>-->
            </ul>
          </div>
        </div>
     
      </div>
    </section>

    <!-- Catgeory Grid -->
    <section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Categories</h2>
            <h3 class="section-subheading text-muted">Search various party vendors categories.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-search fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/category/grad.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Graduation</h4>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-search fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/category/wed.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Wedding</h4>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-search fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/category/baby.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Baby Welcoming </h4>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-search fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/category/engage.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Engagement</h4>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal5">
                <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-search fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/category/eid.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Eid Celebration</h4>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal6">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-search fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/category/family.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Family Gathering</h4>
            </div>
          </div>
        </div>
      </div>
    </section>
      
      
    <!-- party plan -->
    <section id="plan">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">A Party Plan</h2>
            <h3 class="text-muted">Our service provides you with the ability to put your party vendors in an orgnized format.
            <br>
              </h3>
              <br><br>
              <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#">Start Now!</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Contact Us</h2>
           <br>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form id="contactForm" name="sentMessage" novalidate>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="Your Name *" required data-validation-required-message="Please enter your name.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="Your Email *" required data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="Your Phone">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Your Message *" required data-validation-required-message="Please enter a message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
                </div>
              </div>
            </form>
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