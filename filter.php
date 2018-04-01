<?php
require('connect.php');

if(isset($_POST['submit'])){
    $cid=$_POST['category'];
    $lid=$_POST['location'];
    $price=$_POST['price'];
    $rate=$_POST['rate'];
    if(isset($cid)){
        if(!empty($lid)){
            if(isset($price)){
                if(!empty($rate))
                    header("location:cards.php?cid=$cid&lid=$lid&p=$price&r=$rate");
                else
                    header("location:cards.php?cid=$cid&lid=$lid&p=$price");
            } else {
                if(!empty($rate))
                    header("location:cards.php?cid=$cid&lid=$lid&r=$rate");
                else
                    header("location:cards.php?cid=$cid&lid=$lid");
            }
            
        } else if(isset($price)){
            if(!empty($lid)){
                if(!empty($rate))
                    header("location:cards.php?cid=$cid&lid=$lid&p=$price&r=$rate");
                else
                    header("location:cards.php?cid=$cid&lid=$lid&p=$price");   
                } else {
                if(!empty($rate))
                    header("location:cards.php?cid=$cid&p=$price&r=$rate");
                else
                    header("location:cards.php?cid=$cid&p=$price");
                }
    
            } else if(!empty($rate)){
                if(!empty($lid)){
                    if(isset($price))
                        header("location:cards.php?cid=$cid&lid=$lid&p=$price$r=$rate");
                    else
                        header("location:cards.php?cid=$cid&lid=$lid&r=$rate");
                } else {
                    if(isset($price))
                        header("location:cards.php?cid=$cid&p=$price&r=$rate");
                    else
                        header("location:cards.php?cid=$cid&r=$rate");
                }
            }
         else {
          header("location:cards.php?cid=$cid");            
        }
  
        }
        
    }
?>