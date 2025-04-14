<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBook</title>
    <link href="MyBook.css" type="text/css" rel="stylesheet"></link>
</head>
<body>

<div class="nav">
        <!-- <a href="vehicle1.php">HOME</a> -->
        <a href="MyBook.php">MyBook</a>
        <a href="userview.php">Back</a>
        
     
       &nbsp;  
    </div>

    <div class="vehiclecard">


<?php
    session_start();
    $useremail=$_SESSION["email"];
    //$tprice=$_SESSION['t_price'];

    
    $con=mysqli_connect("localhost","root","s0019","rental_system");
    if(!$con){
        die("not connected");
    }
    // echo $useremail;

    $qry=" select * from book where useremail='$useremail' ";
    
    $result=mysqli_query($con,$qry);

    while($row =$result->fetch_assoc()){
        $day=$row['days'];
        $cid=$row['carid'];
        $qry1="select * from cardetails where carid=$cid";
        
        $res=mysqli_query($con,$qry1);
       
        $r =$res->fetch_assoc();
        $cid="CAROB".$r['carid'];
        $total_price=$r['price']*$day; 

        $adv_pay=round($total_price*0.45);
        $r_amt=$total_price-$adv_pay;
        ?>

        
        <div class="card">
           
            <div class="innercard1">
            <img src="uploadimages/<?php echo $r['carimg']  ?>" alt="">
            </div>
           
            <div class="innercard2">
            <form action="" method="POST">
            <p class="carname"> <span class="start"><?php echo $r['carmodel'] ?></span><span class="end">$<?php echo $r['price']?>/day</span></p>
            <p class="carname"><span class="end">Car ID : <?php echo $cid ?></span><span class="end">Year : <?php echo $r['myear'] ?></span></p>
            <p class="carname"><span class="end">Location : <?php echo $r['location1']?></span>&nbsp;<span class="end"> Fuel Type :<?php echo $r['fueltype']?></span></p>
            <p class="carname"><span class="end">From date : <?php echo $row['from_d']?></span>&nbsp;<span class="end"> To date : <?php echo $row['to_d']?></span></p>
            <p class="carname"><span class="end">Total days : <?php echo $day?></span>&nbsp;<span class="end">Total amount : <?php echo $total_price?> </p>
            <p class="carname"><span class="end">Advance amount : <?php echo $adv_pay?></span>&nbsp;<span class="end">Remainig amount: <?php echo $r_amt?> </p>
            <p class="carname">Booking status : <?php echo $row['b_status']?> </p>
            <input type="text" value="<?php echo $row['to_d'] ?>" name="toval" style="display:none;">
            <input type="text" value="<?php echo $row['from_d'] ?>" name="fromval" style="display:none;">
            <?php if( $row['b_status']!="cancelled" ){ ?>
            <button name="btn"  id="<?php echo $row['carid']?>"  >Cancel</button></p> 
            <?php } ?>
            </form>
            
            </div>
            
           
       </div>
       
        <?php
   
         }
          
        ?> 
    </div>

<?php

if(isset($_POST['btn'])){
    $to_date=$_POST['toval'];
    $from_date=$_POST['fromval'];

    $upqry="update book set b_status='cancelled' where useremail='$useremail' and from_d='$from_date' and to_d='$to_date'";
    mysqli_query($con,$upqry);
}




?>
    

</body>
</html>