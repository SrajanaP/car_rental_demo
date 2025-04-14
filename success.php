
<?php
$conn=mysqli_connect("localhost","root","s0019","rental_system");
if(!$conn){
    die("not connected");
}
   if(isset($_GET['delete'])){
    $idval=$_GET['temp'];
  // echo $idval;
   $sql="delete from  cardetails where carid=$idval";
   mysqli_query($conn,$sql);
   header('Location:adminview.php');
   exit;
   }
   
   
   


?>
<?php
if(isset($_GET['edit'])){
    $idval=$_GET['temp'];
    $res=mysqli_query($conn,"select * from cardetails where carid=$idval");



?> 
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
    
    <form action="update.php" method="POST" enctype="multipart/form-data" style=" width:750px;height:890px;border: 1px solid black;" >
        <h2>ADD CAR </h2>
        <p>Enter car image :</p>
        <input type="file" name="carimgs"  required>
        <p>Enter car model :</p>
        <input type="text" name="carmodel"  required>
        <p>Enter car manufactured year :</p>
        <input type="text" name="caryear" equired>

        <p>Enter the price per day :</p>
        <input type="number" name="carprice"   required>
        <p>Enter fuel type :</p>
        <input type="text" name="carfuel"   required>
        <p>Enter the location :</p>
        <input type="text" name="carlocation"  required>
        <p>Write description about car :</p>
        <textarea name="cardesc" rows="6" cols="51"    required ></textarea>
        <input type="text" value="<?php echo $idval ?>" name="temp1" style="display:none;">
      
<br>

        <div class="buttons" >
        <input type="submit" name="addbtn" value="add" class="addbtn" >
<!-- <input type="button" name="cancelbtn" value="cancel" class="addbtn"> -->

        </div>
        

    </form>
</body>
</html>
<?php






}


?>



