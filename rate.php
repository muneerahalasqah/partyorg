<?php
require_once 'connect.php';

if(isset($_GET['vid'], $_GET['rate'])){
    $vid= (int)$_GET['vid'];
    $rate= (int)$_GET['rate'];
    
    if(in_array($rate,[1,2,3,4,5])){
        
        $exist = $db->query("SELECT vendor_id FROM vendor WHERE vendor_id=$vid")->num_rows ? true: false;
        
        if($exist){
            $db->query("INSERT INTO rating(v_id,rate) VALUES($vid,$rate)");
        }
        
    }
        ?>
<html>
    <head>
    <script src="js/sweetalert2.js"></script>
    <link rel="stylesheet" href="css/sweetalert2.css">
    <script
      src="https://code.jquery.com/jquery-2.2.4.js"
      integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
      crossorigin="anonymous"></script>
    </head>
    <body><script>
    swal({title:"Thanks!",text:"Your reviews make us take better descisions", type: "success",showConfirmButton: false,
  timer: 2500}).then(function(){window.location.href = "account.php";});
    </script></body></html>
<?php

}
?>