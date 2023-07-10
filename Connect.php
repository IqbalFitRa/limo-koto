<?php

$con=new mysqli('localhost','root','','limo-koto');

if(!$con){
    echo "Connection Success";
}else {
    die(mysqli_error($con));
}
?>