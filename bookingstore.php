<?php
$username="";




if(isset($_POST['paycon'])){
session_start();
$useremail=$_SESSION["email"];
$carid=$_SESSION['$carids'];
$from_date=$_SESSION["from_d"];
$to_date=$_SESSION["to_d"];
$ads_pay=$_SESSION["advance_p"];
$tra_id=$_POST['t_id'];
//$interval=$from_date->diff($to_date);
$days=$_SESSION['tdays'];
$total_price=$_SESSION['t_price'];
$price;
$rem_price=$total_price-$ads_pay;
// echo $useremail;
$con=mysqli_connect("localhost","root","s0019","rental_system");
    if(!$con){
        die("not connected");
    }

   $sql="select * from user_details where useremail='$useremail'";
   $result=mysqli_query($con,$sql);
if($res=mysqli_fetch_assoc($result)){
    $username=$res['username'];
    

}
$sql="select * from cardetails where carid=$carid";
$result=mysqli_query($con,$sql);
if($res=mysqli_fetch_assoc($result)){
    $price=$res['price'];
    

}
$sqlpay="insert into payment(carid,useremail,from_d,to_d,t_price,ad_amt,r_amt,transcation_id,p_status)values('$carid','$username','$from_date','$to_date','$total_price','$ads_pay','$rem_price','$tra_id','bal_due')";           
$payres=mysqli_query($con,$sqlpay);
$qry1="insert into book(carid,username,useremail,from_d,to_d,price,days,total_price,b_status,payment_id)values('$carid','$username','$useremail','$from_date','$to_date','$price','$days','$total_price','procesing','$tra_id')";
$res=mysqli_query($con,$qry1);
if($res and $payres){
   
    echo "<script>alert('Thank you for booking. you can see your bookings in MyBook option');</script>";
    echo "<script>window.location.href='userview.php';</script>";
}















}
elseif($_POST['cancel']){
    echo "<script>window.location.href='userview.php';</script>";
}











?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?php echo $username  ?></p>
</body>
</html>