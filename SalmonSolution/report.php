<!DOCTYPE html>
<html>

<head>
  <h2 style="color:#00008B;">Salmon apps: Pallet ID information</h2>
  <h4><a href="./">Home</a></h4>
</head>
<body>

<form action='report.php' method='post'> 

<?php

include 'dbcon.php';
  echo "<table border='1'>
    <tr><td><label for=\"palletId\">Enter Pallet ID:</label></td><td><input type = \"text\" id=\"palletId\" name=\"palletId\"></td><input type=\"submit\" name=\"submit\" value=\"Submit\" style=\"color: transparent; background-color: transparent; border-color: transparent; cursor: default;\"><td></td><td></td><td></td><td></td></tr>
    <tr><th>Pallet Description</th><th>Expiry Date</th><th>Stock Code</th><th>Qty</th><th>Flavour</th><th>Size</th></tr>";
if(isset($_POST['submit'])){

  $sql = "SELECT * FROM `pallet_transaction` WHERE pallet_id = '".($_POST['palletId'])."'";
 // echo $sql;
  $results = $conn->query($sql);
        //echo $results;
        if($results->num_rows > 0){

          while ($row = $results->fetch_assoc()) {

             echo "<tr><td>" . $row['pallet_description'] . "</td><td>" . $row['expiry_date'] . "</td><td>" . $row['stock_code'] . "</td><td>" . $row['qty'] . "</td><td>" . $row['flavour'] . "</td><td>" . $row['size'] . "</td></tr>";

  }
?>

<?php
echo "</table></form>";
        }

   }     

?>

</body>
</html>  

