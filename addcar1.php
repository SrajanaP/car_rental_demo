


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="addcar1.css" type="text/css"  rel="stylesheet"></link>
</head>
<body>
<div class="nav">
        <a href="vehicle1.php">HOME</a>
        <a href="adminview.php">Admin</a>
        <a href="addcar1.php">Add</a>
        <a href="#about">about</a>
    </div>
    
    <form method="POST" enctype="multipart/form-data" style=" width:750px;height:890px;border: 1px solid black;" >
        <h2>ADD CAR </h2>
        <p>Enter car image :</p>
        <input type="file" name="carimgs"  required>
        <p>Enter car model :</p>
        <input type="text" name="carmodel"  required>
        <p>Enter car manufactured year :</p>
        <input type="text" name="caryear"  required>

        <p>Enter the price per day :</p>
        <input type="number" name="carprice"  required>
        <p>Enter fuel type :</p>
        <input type="text" name="carfuel"  required>
        <p>Enter the location :</p>
        <input type="text" name="carlocation" required>
        <p>Write description about car :</p>
        <textarea name="cardesc" rows="6" cols="51" required></textarea>
      
<br>

        <div class="buttons" >
        <input type="submit" name="addbtn" value="add" class="addbtn" >
<input type="button" name="cancelbtn" value="cancel" class="addbtn">

        </div>
        

    </form>
</body>
</html>

<?php

$connection=mysqli_connect('localhost','root','s0019','rental_system');
if(isset($_POST['addbtn'])){
   
    
$carmodel=$_POST['carmodel'];
 $carprice=$_POST['carprice'];
 $carfuel=$_POST['carfuel'];
 $carlocation=$_POST['carlocation'];
 $cardesc=$_POST['cardesc'];
 $caryear=$_POST['caryear'];
 $filename= $_FILES['carimgs']['name'];
$tempname= $_FILES['carimgs']['tmp_name'];

  // echo $filename;
   // echo $tempname;

     $folder='uploadimages/';
    move_uploaded_file($tempname,$folder.$filename);

   // $sql1="INSERT INTO cardetails(carmodel,price,fueltype,descriptions,carimg,location1) VALUES('$carmodel','$carprice','$carfuel','$cardesc','$filename','$carlocation')";

   mysqli_query($connection,"INSERT INTO cardetails(carmodel,price,fueltype,descriptions,carimg,location1,myear) VALUES('$carmodel','$carprice','$carfuel','$cardesc','$filename','$carlocation','$caryear')");
   
  header('Location:'.$_SERVER['PHP_SELF']);
   
    
}



    
?>