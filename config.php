<?php

$con = new mysqli('localhost','root','','fruits');
if($con -> connect_error){
    die('CONNECTION ERROR REASON : '.$con->connect_error);
}

?>