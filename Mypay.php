<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment details</title>
</head>
<body>
<?php

$con=mysqli_connect("localhost","root","s0019","rental_system");
if(!$con){
    die("not connected");
}
session_start();
$useremail=$_SESSION["email"];
//echo $useremail;
$qry="select * from payment where useremail='$useremail'";
$res=mysqli_query($con,$qry);
echo "<br><br><br><center><table border='1' cellspacing='1' cellpadding='8'>";
echo "<tr ><th>CAR ID</th><th>USER EMAIL</th><th>FROM DATE</th><th>TO DATE</th><th>TOTAL PRICE</th><th>TRANSCATION ID</th><th>PAID ON</th><th>AMOUNT PAID</th><th>REAMAING AMOUNT</th><th>STATUS</th></tr>";
while($row=mysqli_fetch_assoc($res)){
    
        echo "<tr >";
        
        echo "<td>CARBO$row[carid]</td>";
        echo "<td>$row[useremail]</td>";
        echo "<td>$row[from_d]</td>";
        echo "<td>$row[to_d]</td>";
        echo "<td>$row[t_price]</td>";
        echo "<td>$row[transcation_id]</td>";
        echo "<td>$row[paid_on]</td>";
        echo "<td>$row[ad_amt]</td>";
        echo "<td>$row[r_amt]</td>";
        echo "<td>$row[p_status]</td>";
        
        
        
       
       
        echo "</tr>";
   }



   

echo "</center></table>";



if(isset($_GET['approve'])){
    $carid=$_GET['carid'];
    $from_d=date('y-m-d',strtotime($_GET['from_d']));
    $to_d=date('y-m-d',strtotime($_GET['to_d']));
    $up="update  book set b_status='approved' where carid='$carid' and from_d='$from_d' and to_d='$to_d' ";

    mysqli_query($con,$up);



}


?>


</body>
</html>