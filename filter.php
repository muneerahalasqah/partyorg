<?php
require('connect.php');

if(isset($_POST['submit'])){
    $cid=$_POST['category'];
    $lid=$_POST['location'];
    $price=$_POST['price'];
    if(isset($cid)){
        if(!empty($lid)){
            if(isset($price))
                header("location:cards.php?cid=$cid&lid=$lid&p=$price");
            else
                header("location:cards.php?cid=$cid&lid=$lid");
        } else if(isset($price)){
            if(!empty($lid))
                header("location:cards.php?cid=$cid&lid=$lid&p=$price");
            else
                header("location:cards.php?cid=$cid&p=$price");
        } else {
          header("location:cards.php?cid=$cid");            
        }
  
        }
        
    }
?>