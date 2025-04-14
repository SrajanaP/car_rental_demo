<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="addcarcss.css" type="text/css"  rel="stylesheet"></link>
</head>
<body>
<div class="nav">
        <a href="#">HOME</a>
        <a href="#">Admin</a>
        <a href="addcar.php">Add</a>
        <a href="#about">about</a>
    </div>
    
    <form action="" method="POST" style=" width:750px;height:850px;border: 1px solid black;">
        <h2>ADD CAR </h2>
        <p>Enter car image :</p>
        <input type="file" name="carimg" id="" required>
        <p>Enter car model :</p>
        <input type="text" name="carmodel" id="" required>
        <p>Enter the price per day :</p>
        <input type="number" name="carprice" id="" required>
        <p>Enter fuel type :</p>
        <input type="text" name="carfuel" id="" required>
        <p>Enter the location :</p>
        <input type="text" name="carlocation" id="" required>
        <p>Write description about car :</p>
        <textarea name="cardesc" id="" rows="6" cols="51" required></textarea>
      
<br>
        <div class="buttons" >
        <input type="submit" name="submit" value="add" class="addbtn" >
        <input type="button" name="cancelbtn" value="cancel" class="addbtn">

        </div>
        

    </form>
</body>
</html>