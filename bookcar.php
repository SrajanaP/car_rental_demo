<?php
     session_start();
     $useremail=$_SESSION["email"];
     
    //  echo $useremail;
    $username="";
    $img="";
    $carid="CAROB";
    $model="";
    $year="";
    $price;
    $fueltype="";
    $loc1="";
    $cardes="";
    $to_d=$_POST['toval'];
    $from_d=$_POST['fromval'];
    $from_date=new  DateTime($from_d);
    $to_date=new  DateTime($to_d);
    $interval=$from_date->diff($to_date);
    $days=($interval->days)+1;
    $total_price;
    $_SESSION['from_d']=$from_d;
    $_SESSION['to_d']=$to_d;
    $_SESSION['tdays']=$days;
    // echo $interval->days;
    // echo $from_d;
    $caridval=$_POST['caridval'];
    $conn=mysqli_connect("localhost","root","s0019","rental_system");
    if(!$conn){
        die("not connected");
    }

   $sql="select* from cardetails where carid=$caridval";
   $result=mysqli_query($conn,$sql);

   while($row=mysqli_fetch_assoc($result)){
    $img=$row['carimg'];
    $carid=$carid.$row['carid'];
    $model=$row['carmodel'];
    $year=$row['myear'];
    $price=$row['price'];
    $fueltype=$row['fueltype'];
    $loc1=$row['location1'];
    $cardes=$row['descriptions'];
    $total_price=$row['price']*$days;
   }
  
 $_SESSION['t_price']=$total_price;
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>car details</title>
    <link rel="stylesheet" href="bookcar1.css"></link>
</head>
<body>
    <a href="userview.php">back</a>
    <form method="POST" action="advancepay.php">
   <!-- <form method="GET" action="bookingstore.php"> -->
        <div class="singlecar">
        <div class="innerinfo1">
            <div class="imgdiv">
                <img src="uploadimages/<?php echo $img?>" alt="<?php $img?>">
            </div>
            <div class="carde">
    
            <p ><?php echo "<b>Car ID : ".$carid."</b>"   ?></p>
            <p><?php echo "<b>Car model : ".$model."</b>"   ?></p>
            <p><?php echo "<b>Manufactured year : ".$year."</b>"   ?></p>
            <p><?php echo "<b>Price per day: ".$price." Rs</b>"   ?></p>
            <p><?php echo "<b>Fuel type : ".$fueltype."</b>"   ?></p>
            <p><?php echo "<b>Location : ".$loc1."</b>"   ?></p>
             <p><?php echo "<b>From Date : ".$GLOBALS['from_d']."&nbsp;&nbsp;&nbsp;"."To Date : ".$GLOBALS['to_d']   ?></p>
             
           
            </div>
        </div>
        <div class="innerinfo2">
           <p><?php echo "<b>Description : ".$cardes."</b>"   ?></p>
           <p><?php echo "<b>Total days : ".$days."</b>"   ?></p>
           <p><?php echo "<b>Total price : ".$total_price."</b>"   ?></p>
           <input type="text" value="<?php echo $caridval ?>" name="temp" style="display:none;">
           

           <input type="submit" value="book" name="book">
           <!-- <input type="submit" value="edit1" name="edit"> -->
             <!-- <input type="text" value="" name="fromtemp" style="display:none;">
           <input type="text" value="" name="totemp" style="display:none;"> 
           <input type="text" value="" name="totaltemp" style="display:none;">-->
        </div>

        </div>

    </form>    


</body>
</html>

