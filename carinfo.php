<?php
    $img="";
    $carid="CAROB";
    $model="";
    $year="";
    $price;
    $fueltype="";
    $loc1="";
    $cardes="";

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
   }
  
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>car information</title>
    <link rel="stylesheet" href="carinfo1.css"></link>
</head>
<body>
    <form method="GET" action="success.php">
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
           
            </div>
        </div>
        <div class="innerinfo2">
           <p><?php echo "<b>Description : ".$cardes."</b>"   ?></p>
           <input type="text" value="<?php echo $caridval ?>" name="temp" style="display:none;">
           <input type="submit" value="delete1" name="delete">
           <input type="submit" value="edit1" name="edit">
        </div>






        </div>

    </form>
</body>
</html>


