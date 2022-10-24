<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>

    <style type="text/css">

  #text{

    height: 25px;
    border-radius: 5px;
    padding: 4px;
    border: solid thin #aaa;
    width: 100%;
  }

  #button{

    padding: 10px;
    width: 100px;
    color: white;
    background-color: lightblue;
    border: none;
  }

  #box{
    
    background-color: white;
    margin:50px auto;
    width: 380px;
    padding: 20px;
    opacity: 0.75;
  }

  body  {
   background-image: url("milky.jpg");
   margin: 0;
  padding: 0;
  font-family: sans-serif;
  background: url(milky.jpg) no-repeat;
  background-size: cover;
  }

  </style>


    <h2 style="color:white;" align = "center"> Login </h2>
<div id="box">
    
    <form class="" action="" method="post" autocomplete="off">
      <label for="usernameemail">Username or Email : </label> <br><br>
      <input type="text" name="usernameemail" id = "usernameemail" required value=""> <br><br>
      <label for="password">Password : </label> <br><br>
      <input type="password" name="password" id = "password" required value=""> <br><br>
      <button type="submit" name="submit">Login</button> 
    </form>
    <br>
    <a href="registration.php">Registration</a>
  </body>
</html>
