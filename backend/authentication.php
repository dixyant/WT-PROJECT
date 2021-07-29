<?php      
    require_once "connection.php";
    $username = $_POST['user'];  
    $Password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($Password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $Password);  
      
        $sql = "SELECT* FROM logins WHERE username = '$username' and pass= '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            session_start();
            $_SESSION["verified"]=TRUE;
            header("Location:../fonts/upload_form.php");
           
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }  
   
?> 