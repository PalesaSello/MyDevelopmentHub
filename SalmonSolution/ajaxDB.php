
<?php
include 'dbcon.php';

if(!empty($_POST["Flavour"]) && empty($_POST["Size"])){
	//Fetch Size based on chosen flavour
	$sql = "SELECT DISTINCT Size FROM `stock_items` WHERE Flavour = '".$_POST['Flavour']."'";
	$results = $conn->query($sql);
	//Generate size dropdown list
    if($results->num_rows > 0){ 
    	echo '<option value="">Select a size</option>';
    	while ($row = $results->fetch_assoc()){
        echo '<option value ="'.$row['Size']. '">'.$row['Size'].'</option>';
    	}
	}
}elseif(!empty($_POST['Size']) && !empty($_POST["Flavour"])) {
	//Fetch Stock Code based on chosen flavour and Size
	$sql = "SELECT DISTINCT Code FROM `stock_items` WHERE Size = '".$_POST['Size']."' &&  Flavour = '".$_POST['Flavour']."'";
	echo $sql;
	$results = $conn->query($sql);
	//Generate stock code dropdown list
    if($results->num_rows > 0){ 
    	echo '<option value="">Select a Stock Code</option>';
    	while ($row = $results->fetch_assoc()){
        echo '<option value ="'.$row['Code']. '">'.$row['Code'].'</option>';
    	}
	}else{
	echo '<option value="">Stock Code not available</option>';
	} 	
}elseif (!empty($_POST['Stock_code'])) {
	//Fetch pallet_qty based on chosen stock code
	$sql = "SELECT DISTINCT pallet_qty FROM `stock_items` WHERE Code = '".$_POST['Stock_code']."'";
	$results = $conn->query($sql);
	//Generate a dropdown list
    if($results->num_rows > 0){ 
    	echo '<option value="">Select a pallet_qty</option>';
    	while ($row = $results->fetch_assoc()){
        echo '<option value ="'.$row['pallet_qty']. '">'.$row['pallet_qty'].'</option>';
   		}
	}else{
	echo '<option value="">Stock Code not available</option>';
	} 	
}
?>