<?php

include 'dbcon.php';

if(isset($_POST['submit'])){

	$sql = "SELECT * FROM `pallet_transaction` WHERE pallet_id = '".($_POST['palletId'])."'";

	$results = $conn->query($sql);
        //echo $results;
        if($results->num_rows > 0){
         echo "<table border='1'>

		<tr><th>Pallet Description</th><th>Expiry Date</th><th>Stock Code</th><th>Qty</th><th>Flavour</th><th>Size</th></tr>";
          while ($row = $results->fetch_assoc()) {
            //echo $row["pallet_description"] . " " . $row["expiry_date"] . " " . $row["stock_code"] . " " . $row["qty"] . " " . $row["flavour"] . " " . $row["size"];

             echo "<tr><td>" . $row['pallet_description'] . "</td><td>" . $row['expiry_date'] . "</td><td>" . $row['stock_code'] . "</td><td>" . $row['qty'] . "</td><td>" . $row['flavour'] . "</td><td>" . $row['size'] . "</td></tr>";

  }
?>

<form action='report.php' method='post'>
	<label for="palletId">Enter Pallet ID:</label>
    <input type = "text" id="palletId" name="palletId">
	
	<input type="submit" name="submit" value="Submit">
</form></select><br>

<?php
echo "</table>";
        }

   }     

?>