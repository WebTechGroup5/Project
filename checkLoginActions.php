<?php


include("./checkLogin.php");
 

//get username and passord from post
$username=$_POST['username'];
$password=$_POST['password'];	

$loginObj= new login();
//if a valid array is returned, then login is successful. if boolean false, login has failed
$loginObj->check_login($username,$password);

$row = $loginObj->fetch();
if($row){
        //if successful load profile into session

        session_start();
        $_SESSION["username"]=$row["username"];
        $_SESSION["user_id"]=$row["user_id"];
        $_SESSION["usertype"]=$row["usertype"];
        print_r($_SESSION);
        echo "redirecting... <a href='welcome.php' >click here</a> if home page does not open in 20 seconds"; 
        
        header("location:welcome.php");
}else{
        //if login fails, redirect to login page with error flag
        header("location:index.php?err=1");
}



?>
