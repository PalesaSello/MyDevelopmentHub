<!DOCTYPE html>
<html>

<head>
  <h1 style="color:#00008B;">Salmon apps: Capture Form</h1>
  <h4><a href="./">Home</a></h4>
  <style>
  body { 
    margin:10px;
    width:1024px;
    padding:10px;
  
    font-size:14px;
    font-family:Verdana;
  }
  
</style>

<!--jquery library -->
<script src="js/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $('#flavour').on('change', function(){
    var flavour = $(this).val();
    window.localStorage.setItem("flavour", flavour);
    if(flavour){
      $.ajax({
        type: 'POST',
        url: 'ajaxDB.php',
        data:'Flavour='+flavour,
        success:function(html){
          $('#size').html(html); 
        }
      });
     
    }else{
      $('#size').html('<option value="">Select a flavour first</option>');
    }
  });

  $('#size').on('change', function(){
    var size = $(this).val();
    window.localStorage.setItem("Size", size);
    var flavour = window.localStorage.getItem("flavour");
    if(size){
      $.ajax({
        type: 'POST',
        url: 'ajaxDB.php',
        data: 'Size='+size+'&Flavour='+flavour,
        success:function(html){
          $('#stock_code').html(html);
        }
      });
    }else{
      $('#stock_code').html('<option value="">Select a flavour and size first</option>');
    }
  });

  $('#stock_code').on('change', function(){
    var stock_code = $(this).val();
    if(stock_code){
      $.ajax({
        type: 'POST',
        url: 'ajaxDB.php',
        data: 'Stock_code='+stock_code,
        success:function(html){
          $('#pallet_qty').html(html);
        }
      });
    }else{
      $('#pallet_qty').html('<option value="">Select stock code first</option>');
    }
  });

}); 

</script>   
</head>
<body>

<?php

include 'dbcon.php';

if(isset($_POST['submit'])){

  $stock_code = $_POST['stock_code'];
  $qty = $_POST['pallet_qty'];
  $flavour = $_POST['flavour'];
  $size = $_POST['size'];
  $pallet = $_POST['pallets'];
  $layer_boards = $_POST['layerboards'];
  $username = $_POST['username'];
  
  $sql = "SELECT `id` FROM `pallet_transaction` order by `id` DESC limit 1";
  $query = mysqli_query($conn, $sql);
  $latestArray = $query->fetch_all(MYSQLI_ASSOC);

  $newID = (int)$latestArray[0]["id"] + 1;


  $sql = "INSERT INTO `pallet_transaction` (`pallet_id`, `pallet_description`, `expiry_date`, `stock_code`, `qty`, `flavour`, `size`, `layer_boards`, `pallet`, `date_created`, `username`) VALUES (concat(DATE_FORMAT(current_date, \"%Y%m\"),LPAD($newID, 4, 0)), concat(DATE_FORMAT(current_date, \"%b \"),LPAD($newID , 4, 0)), (CURRENT_DATE() + INTERVAL 90 DAY), '$stock_code', '$qty', '$flavour', '$size', '$layer_boards', '$pallet', DATE_FORMAT(current_date(),\"%Y-%c-%d\"), '$username')";
  
  if (mysqli_query($conn, $sql)) {
        echo '<script> alert("New record has been added successfully !");</script>';
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
}
?>
<!-- Starting the form -->
 <form action='index.php' method='post'>
      <label for="username">Username:</label>
      <input type = "text" id="username" name="username"><br><br>
      <label for="flavours">Flavour:</label>   
        <?php
        //// Fetch all the flavour data
        $sql = "SELECT DISTINCT Flavour FROM `stock_items`";
        $results = $conn->query($sql);
        ?>

        <!-- Flavour dropdown-->
        <select id="flavour" name="flavour">
        <option value="">Select a flavour</option>
        <?php
        if($results->num_rows > 0){
          while ($row = $results->fetch_assoc()) {
            echo '<option value ="'.$row['Flavour'].'">'.$row['Flavour'].'</option>';
        }
      }else{
        echo '<option value="">Favours not found</option>';
      }
     ?>
      </select><br><br>

      <!-- Size dropdown -->
      <label for="size">Size:</label>
      <select id="size" name="size">
        <option value="">Select a flavour first</option>
      </select><br><br>

      <!-- Stock Code dropdown -->
      <label for="stock_code">Stock Code:</label>
      <select id="stock_code" name="stock_code">
        <option value="">Select a flavour and size first</option>
      </select><br><br>

      <!-- Pallet Qty dropdown -->
      <label for="size">Pallet Qty:</label>
      <select id="pallet_qty" name="pallet_qty">
        <option value="">Select a flavour first</option>
      </select><br><br>

      <!-- Layer boards txtbox -->
      <label for="layerboards">Layer Boards:</label>
      <input type = "text" id="layerboards" name="layerboards"><br><br>


      <!-- Pallets dropdown -->
      <label for="size">Choose a pallets:</label>
      <select id="pallets" name="pallets">
        <option value="chep">Pallet</option>
        <option value="chep">Chep</option>
        <option value="wood">Wood</option>
        <option value="plastic">Plastic</option>
      </select><br><br>

      <input type="submit" name="submit" value="Submit">
    </form>

  </body>
  </html>  
 
