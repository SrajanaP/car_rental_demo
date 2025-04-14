<?php

    session_start();
    $from_d=$_SESSION['from_d'];
    $to_d=$_SESSION['to_d'];  
    $total_price=$_SESSION['t_price']; 
  
    $useremail=$_SESSION["email"];
    $adv_pay=round($total_price*0.45);
    $_SESSION['advance_p']=$adv_pay;
    if(isset($_POST['book'])){

        $_SESSION['$carids']=$_POST['temp'];

    }
   // echo $adv_pay;
    // echo $from_d." ".$to_d." ".$total_price." CARBO".$_SESSION['$carids']." ".$useremail;
        
        
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advance Payment</title>
</head>
<body>
    <form action="bookingstore.php" method="POST">
        <h2>Pay for booking car</h2>
        <p>pay for 125648@ibl</p>
        <p>Advance amount to be paid :</p>
        <input type="text" name="ad_pay" value="<?php echo $adv_pay ?>" disabled >
        <p>Enter transaction ID : </p>
       
        <input type="text" name="t_id" >
        <input type="submit" value="confirm" name="paycon">
        <input type="submit" value="cancel" name="cancel">
        

    </form>
</body>
</html>