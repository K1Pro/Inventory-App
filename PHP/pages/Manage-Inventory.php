<?php
$id = htmlspecialchars($_GET["id"]);
$inventorySQL = "SELECT * FROM inventory WHERE inventory_id = '".$id."'";
$inventory = mysqli_query($conn, $inventorySQL);
foreach ($inventory as $inventoryValues) {};

// If inventory was modified, import posted modifications
$itemName =  $_POST['itemName'] ? $_POST['itemName'] : "";
$subitemOf =  $_POST['subitemOf'] ? $_POST['subitemOf'] : "";
$manufacturersPart = $_POST['manufacturersPart'] ? $_POST['manufacturersPart'] : "";
$descOnPurchTrans = $_POST['descOnPurchTrans'] ? $_POST['descOnPurchTrans'] : "";
$descOnSalesTrans = $_POST['descOnSalesTrans'] ? $_POST['descOnSalesTrans'] : "";
$cost = $_POST['cost'] ? $_POST['cost'] : "";
$COGSaccount = $_POST['COGSaccount'] ? $_POST['COGSaccount'] : "";
$preferredVendor =  $_POST['preferredVendor'] ? $_POST['preferredVendor'] : "";
$salesPrice = $_POST['salesPrice'] ? $_POST['salesPrice'] : "";
$incomeAccount = $_POST['incomeAccount'] ? $_POST['incomeAccount'] : "";
$assetAccount =  $_POST['assetAccount'] ? $_POST['assetAccount'] : "";
$reorderPoint =  $_POST['reorderPoint'] ? $_POST['reorderPoint'] : "";
$quantityOnHand =  $_POST['quantityOnHand'] ? $_POST['quantityOnHand'] : "";

if (strlen($_POST['submit']) && strlen($id)) {
  // Performing update query execution
  $updateInventorySQL = "UPDATE inventory SET 
  itemName = '".$itemName."', 
  subitemOf = '".$subitemOf."', 
  manufacturersPart = '".$manufacturersPart."', 
  descOnPurchTrans = '".$descOnPurchTrans."', 
  descOnSalesTrans = '".$descOnSalesTrans."', 
  cost = '".$cost."', 
  COGSaccount = '".$COGSaccount."',
  preferredVendor = '".$preferredVendor."',
  salesPrice = '".$salesPrice."',
  incomeAccount = '".$incomeAccount."',
  assetAccount = '".$assetAccount."',
  reorderPoint = '".$reorderPoint."',
  quantityOnHand = '".$quantityOnHand."'
  WHERE inventory_id = ".$id;

  if(mysqli_query($conn, $updateInventorySQL)){
    ?><script>
    snackbar(`Inventory successfully updated`);
    setTimeout(function () {window.location.href= './index.php?page=View-Inventory';},1000);
  </script><?php   
  } else{
    echo "ERROR: Hush! Sorry $updateInventorySQL. "
        . mysqli_error($conn);
  }
} else if (strlen($_POST['submit'])) {
  // Performing insert query execution
  $insertCustomerSQL = "INSERT INTO inventory VALUES (inventory_id, '$itemName', '$subitemOf', '$manufacturersPart','$descOnPurchTrans','$descOnSalesTrans', '$cost', '$COGSaccount', '$preferredVendor', '$salesPrice', '$incomeAccount', '$assetAccount', '$reorderPoint', '$quantityOnHand')";
  
  if(mysqli_query($conn, $insertCustomerSQL)){
    ?><script>
    snackbar(`Inventory successfully created`);
    setTimeout(function () {window.location.href= './index.php?page=View-Inventory';},1000);
  </script><?php   
  } else{
      echo "ERROR: Hush! Sorry $insertCustomerSQL. "
          . mysqli_error($conn);
  }
}

?>

<!-- <div style="overflow-y: scroll"></div> -->
<div class="container bg-secondary-subtle" style="overflow-y: auto; overflow-x: hidden">
  <!-- <main> -->

    <div class="row g-5 justify-content-center">
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3 text-center"><?php echo strlen($id) ? "Modify inventory part" : "Create inventory part"; ?></h4>
        <form class="needs-validation" novalidate action='./index.php?page=Manage-Inventory&id=<?php echo $id; ?>' method="post">
          <div class="row g-3">

            <div class="col-sm-4">
              <label for="itemName" class="form-label">Item Name</label>
              <input type="text" class="form-control" name="itemName" id="itemName" value="<?php print_r($inventoryValues['itemName']);?>" placeholder="" required>
              <!-- <div class="invalid-feedback">
                Invalid item name
              </div> -->
            </div>

            <div class="col-sm-4">
              <label for="subitemOf" class="form-label">Subitem of</label>
              <input type="text" class="form-control" name="subitemOf" id="subitemOf" placeholder="" value="<?php print_r($inventoryValues['subitemOf']);?>" required>
              <div class="invalid-feedback">
                Invalid subitem name
              </div>
            </div>

            <div class="col-sm-4">
              <label for="manufacturersPart" class="form-label">Manufacturer's Part#</label>
              <input type="text" class="form-control" name="manufacturersPart" id="manufacturersPart" placeholder="" value="<?php print_r($inventoryValues['manufacturersPart']);?>">
              <div class="invalid-feedback">
                Invalid manufacturer's part#
              </div>
            </div>

            <div class="col-sm-6">
              <label for="descOnPurchTrans" class="form-label">Description on Purchase Transactions</label>
              <input type="text" class="form-control" name="descOnPurchTrans" id="descOnPurchTrans" placeholder="" value="<?php print_r($inventoryValues['descOnPurchTrans']);?>" required>
              <div class="invalid-feedback">
                Invalid description
              </div>
            </div>

            <div class="col-sm-6">
              <label for="descOnSalesTrans" class="form-label">Description on Sales Transactions</label>
              <input type="text" class="form-control" name="descOnSalesTrans" id="descOnSalesTrans" placeholder="" value="<?php print_r($inventoryValues['descOnSalesTrans']);?>" required>
              <div class="invalid-feedback">
                Invalid description
              </div>
            </div>

            <div class="col-sm-4">
              <label for="cost" class="form-label">Cost</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon1">$</span>
                <input type="number" step="0.01" min="0" class="form-control" name="cost" id="cost" placeholder="" aria-label="cost" aria-describedby="basic-addon1" value="<?php echo $inventoryValues['cost'] ? $inventoryValues['cost'] : "0.00";?>" required>
                <div class="invalid-feedback">
                  Invalid cost
                </div>
              </div>
            </div>

            <div class="col-sm-4">
              <label for="salesPrice" class="form-label">Sales Price</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon1">$</span>
                <input type="number" step="0.01" min="0" class="form-control" name="salesPrice" id="salesPrice" placeholder="" aria-label="salesPrice" aria-describedby="basic-addon1" value="<?php echo $inventoryValues['salesPrice'] ? $inventoryValues['salesPrice'] : "0.00";?>" required>
                <div class="invalid-feedback">
                  Invalid sales price
                </div>
              </div>
            </div>

            <div class="col-sm-4">
              <label for="quantityOnHand" class="form-label">Quantity on Hand</label>
              <input type="number" step="1" min="0" class="form-control" name="quantityOnHand" id="quantityOnHand" placeholder="" value="<?php echo $inventoryValues['quantityOnHand'] ? $inventoryValues['quantityOnHand'] : "0";?>">
              <div class="invalid-feedback">
                Invalid quantity on hand
              </div>
            </div>

            <div class="col-sm-6">
              <label for="preferredVendor" class="form-label">Preferred Vendor</label>
              <input type="text" class="form-control" name="preferredVendor" id="preferredVendor" placeholder="" value="<?php print_r($inventoryValues['preferredVendor']);?>">
              <div class="invalid-feedback">
                Invalid preferred vendor
              </div>
            </div>

            <div class="col-sm-6">
              <label for="reorderPoint" class="form-label">Reorder Point</label>
              <input type="text" class="form-control" name="reorderPoint" id="reorderPoint" placeholder="" value="<?php print_r($inventoryValues['reorderPoint']);?>">
              <div class="invalid-feedback">
                Invalid reorder point
              </div>
            </div>

            <div class="col-sm-4">
              <label for="COGSaccount" class="form-label">COGS Account</label>
              <input type="text" class="form-control" name="COGSaccount" id="COGSaccount" placeholder="" value="<?php print_r($inventoryValues['COGSaccount']);?>">
              <div class="invalid-feedback">
                Invalid COGS Account
              </div>
            </div>

            <div class="col-sm-4">
              <label for="incomeAccount" class="form-label">Income Account</label>
              <input type="text" class="form-control" name="incomeAccount" id="incomeAccount" placeholder="" value="<?php print_r($inventoryValues['incomeAccount']);?>">
              <div class="invalid-feedback">
                Invalid income account
              </div>
            </div>

            <div class="col-sm-4">
              <label for="assetAccount" class="form-label">Asset Account</label>
              <input type="text" class="form-control" name="assetAccount" id="assetAccount" placeholder="" value="<?php print_r($inventoryValues['assetAccount']);?>">
              <div class="invalid-feedback">
                Invalid Access Account
              </div>
            </div>



          </div>


          <hr class="my-4">
          <input class="w-100 btn btn-primary btn-lg" name="submit" type="submit" value ="Submit"></input>
        </form>
      </div>
    </div>
  <!-- </main> -->

  <footer class="pt-3 text-body-secondary text-center text-small">
    <p class="mb-1">&copy; 2023 L&M Hardware</p>
    <!-- <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul> -->
  </footer>
</div>
