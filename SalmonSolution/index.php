<?php

include 'dbcon.php';

if(isset($_POST['submit'])){

  $stock_code = $_POST['code'];
  $qty = $_POST['pallet_qty'];
  $flavour = $_POST['flavour'];
  $size = $_POST['size'];
  $pallet = $_POST['pallets'];
  $layer_boards = $_POST['layerboards'];
  $username = $_POST['username'];

  $sql = "INSERT INTO `pallet_transaction` (`pallet_id`, `pallet_description`, `expiry_date`, `stock_code`, `qty`, `flavour`, `size`, `layer_boards`, `pallet`, `date_created`, `username`) VALUES (concat(DATE_FORMAT(current_date, \"%Y%m\"),LPAD(id, 4, 0)), concat(DATE_FORMAT(current_date, \"%b \"),LPAD(id, 4, 0)), DATE_FORMAT(current_date() + 90,\"%Y-%c-%d\"), '$stock_code', '$qty', '$flavour', '$size', '$layer_boards', '$pallet', DATE_FORMAT(current_date(),\"%Y-%c-%d\"), 'sellop')";
  //die($sql);
  if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
}

?>

 <form action='index.php' method='post'>
      <label for="username">Username:</label>
      <input type = "text" id="username" name="username"><br><br>

      <label for="flavours">Choose a flavour:</label>

      <select name="flavour" id="Flavour">
          <?php
        $sql = "SELECT DISTINCT Flavour FROM `stock_items`";
        $results = $conn->query($sql);
        //echo $results;
        if($results->num_rows > 0){
          while ($row = $results->fetch_assoc()) {
            $option = $row["Flavour"];
            ?>
            <option value ="<?php echo($row["Flavour"]); ?>"><?php echo($row["Flavour"]); ?>
        </option>
        <?php
          }}
     ?>
      </select><br><br>

      <label for="size">Choose a size:</label>

      <select name="size" id="Size">
      <?php

        //if($_POST['flavour'] != ''){

          $sql = "SELECT DISTINCT Size FROM `stock_items`";//WHERE Flavour = '".($_POST['flavour'])."'";

        $results = $conn->query($sql);
        if($results->num_rows > 0){
          while ($row = $results->fetch_assoc()) {
            $option = $row["Size"];
            ?>
            <option value ="<?php echo($row["Size"]); ?>"><?php echo($row["Size"]); ?>
        </option>
        <?php
          //}
        }}
     ?>
     </select><br><br>

      <label for="code">Choose a Stock Code:</label>

      <select name="code" id="code">
      <?php

        $sql = "SELECT DISTINCT Code FROM `stock_items`";

        $results = $conn->query($sql);
        if($results->num_rows > 0){
          while ($row = $results->fetch_assoc()) {
            $option = $row["Code"];
            ?>
        <option value ="<?php echo($row["Code"]); ?>"><?php echo($row["Code"]); ?>
        </option>
        <?php
          }}
          ?>
      </select><br><br>

      <label for="size">Choose a Pallet Qty:</label>

      <select name="pallet_qty" id="pallet_qty">
      <?php

        //if($_POST['code'] != ''){

          //$sql = "SELECT DISTINCT Pallet_qty FROM `stock_items`WHERE Code = '".($_POST['code'])."'";
          $sql = "SELECT DISTINCT Pallet_qty FROM `stock_items`";

        $results = $conn->query($sql);
        if($results->num_rows > 0){
          while ($row = $results->fetch_assoc()) {
            $option = $row["Pallet_qty"];  
      ?>
        <option value ="<?php echo($row["Pallet_qty"]); ?>"><?php echo($row["Pallet_qty"]); ?>
        </option>
        <?php
          //}
        }}
     ?> </select><br><br>

      <label for="layerboards">Layer Boards:</label>
      <input type = "text" id="layerboards" name="layerboards"><br><br>

      <label for="size">Choose a pallets:</label>

      <select name="pallets" id="pallets">
        <option value="chep">Pallet</option>
        <option value="chep">Chep</option>
        <option value="wood">Wood</option>
        <option value="plastic">Plastic</option>
      </select><br><br>

      <input type="submit" name="submit" value="Submit">
    </form>
 
