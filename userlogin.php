<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <p>Enter your email:</p>
    <input type="text" name="mail" required>
    <p>Enter your password</p>
    <input type="text" name="pass" required>
<input type="submit" name="login" value="login">

</form>
</body>
</html>

<?php
    if(isset($_POST['login'])){
        $con=mysqli_connect("localhost","root","s0019","rental_system");
        if($con)
            echo "successfull";
    
        $umail=trim($_POST['mail']);
        $upass=trim($_POST['pass']);

        $qry="select * from user_details where useremail='$umail' and userpass='$upass'";
        $res=mysqli_query($con,$qry);
        $ec=mysqli_num_rows($res);
        
        if($ec==1){
            session_start();
            $_SESSION["email"]= $umail;
            $_SESSION["pass"]= $upass;
            header("Location:userview.php");
            exit;


        }
        else{
            echo "<script>alert('Invalid useremail and password'); window.location.href='userlogin.php';</script>";
          

        }




    }








?>