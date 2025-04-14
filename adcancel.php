
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unapproved booking</title>
    <link href="unapprove1.css" rel="stylesheet"  ></link>
    
</head>
<body>
    <div class="nav">
        <a href="adminchoice.php">Back</a>
        
    </div>
    <div class="vehiclecard">
    <?php

$con=mysqli_connect("localhost","root","s0019","rental_system");
if(!$con){
    die("not connected");
}

$qry="select * from book where b_status='cancelled'";
$res=mysqli_query($con,$qry);
echo "<br><br><br><center><table border='1' cellspacing='1' cellpadding='8'>";
echo "<tr ><th>CAR ID</th><th>USER NAME</th><th>USER EMAIL</th><th>FROM DATE</th><th>TO DATE</th><th>TOTAL PRICE</th><th>TRANSCATION ID</th><th>AMOUNT PAID</th><th>REAMAING AMOUNT</th></tr>";
while($row=mysqli_fetch_assoc($res)){
    $count=0;
    $carid=$row['carid'];
    $from_d=$row['from_d'];
    $to_d=$row['to_d'];
    $uemail=$row['useremail'];
    $userqry="select * from payment where useremail='$uemail' and from_d='$from_d' and to_d='$to_d' ";
    $rs=mysqli_query($con,$userqry);
    if($rs){
         $count++;
        $ad_pay=round($row['total_price']*0.45);
        $remain=$row['total_price']-$ad_pay;
        echo "<tr >";
       
        echo "<td>CARBO$row[carid]</td>";
        echo "<td>$row[username]</td>";
        echo "<td>$row[useremail]</td>";
        echo "<td>$row[from_d]</td>";
        echo "<td>$row[to_d]</td>";
        echo "<td>$row[total_price]</td>";
        echo "<td>$row[payment_id]</td>";
        echo "<td>$ad_pay</td>";
        echo "<td>$remain</td>";
        
        
       
       
       
        echo "</tr>";
   }



   
}
echo "</center></table>";






?>



</div>
</body>
</html>