<?php
    $connection=mysqli_connect('localhost','root','s0019','rental_system');
    
    if(isset($_POST['addbtn'])){ 
        $carids=$_POST['temp1'];
    $carmodel=$_POST['carmodel'];
     $carprice=$_POST['carprice'];
     $carfuel=$_POST['carfuel'];
     $carlocation=$_POST['carlocation'];
     $cardesc=$_POST['cardesc'];
     $caryear=$_POST['caryear'];
     $filename= $_FILES['carimgs']['name'];
    $tempname= $_FILES['carimgs']['tmp_name'];
    $folder='uploadimages/';
    move_uploaded_file($tempname,$folder.$filename);

    $qry="update cardetails set carmodel= '$carmodel', price='$carprice',fueltype='$carfuel',descriptions='$cardesc',carimg='$filename',location1='$carlocation',myear='$caryear' where carid='$carids'";
    mysqli_query($connection,$qry);
    header('Location:adminview.php');

    }

    


?>