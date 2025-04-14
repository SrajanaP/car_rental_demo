<?php

    $conn=mysqli_connect("localhost","root","s0019","rental_system");
    if(!$conn){
        die("not connected");
    }

   $sql="select* from cardetails";
   $result=mysqli_query($conn,$sql);

  
    



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin view</title>
    <link href="adminveiw.css" type="text/css" rel="stylesheet"></link>
    
</head>
<body>
    <div class="nav">
        <a href="vehicle1.php">HOME</a>
        <a href="#">Admin</a>
        <a href="addcar1.php">Add</a>
        <a href="#about">about</a>
    </div>
    
    <div class="vehiclecard">

    <?php
    while($row=mysqli_fetch_assoc($result)){
    
    ?>

    <!-- <div class="card"> -->
       <form action="carinfo.php" method="POST" class="card">
        <div class="innercard1">
            <img src="uploadimages/<?php echo $row['carimg']  ?>" alt="">
        </div>
           
        <div class="innercard2">
            <p class="carname"><span class="start"><?php echo $row['carmodel'] ?></span><span class="end">$<?php echo $row['price']?>/day</span></p>
            <p class="carname">Year : <?php echo $row['myear']?> </p>
            <p class="carname">Fuel type : <?php echo $row['fueltype']?> </p>
            <p class="carname">Location : <?php echo $row['location1']?>
            <input type="text" value="<?php echo $row['carid']?>" name="caridval" style="display:none;">
            <button name="btn"  id="<?php echo $row['carid']?>"  >view</button></p>
        </div>
        
       
        </form>
   
    <?php
      }

    ?>


    </div>

   
    

    
    
        
      
   
</body>
</html>