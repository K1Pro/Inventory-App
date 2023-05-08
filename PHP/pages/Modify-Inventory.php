<?php
require_once "config.php";

$id = htmlspecialchars($_GET["id"]);
$inventorySQL = "SELECT * FROM inventory WHERE inventory_id = '".$id."'";
$inventory = mysqli_query($conn, $inventorySQL);
foreach ($inventory as $inventoryValues) {};

?>

<!-- <div style="overflow-y: scroll"></div> -->
<div class="container bg-secondary-subtle" style="overflow-y: auto; overflow-x: hidden">
  <!-- <main> -->

    <div class="row g-5 justify-content-center">
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3 text-center">Modify inventory part</h4>
        <form class="needs-validation" novalidate  action='./index.php?page=Modified-Inventory&id=<?php echo $id; ?>' method="post">
          <div class="row g-3">

            <div class="col-sm-4">
              <label for="itemName" class="form-label">Item Name</label>
              <input type="text" class="form-control" name="itemName" id="itemName" value="<?php print_r($inventoryValues['itemName']);?>" placeholder="">
              <div class="invalid-feedback">
                Please enter an item name.
              </div>
            </div>

            <div class="col-sm-4">
              <label for="subitemOf" class="form-label">Subitem of</label>
              <input type="text" class="form-control" name="subitemOf" id="subitemOf" placeholder="" value="<?php print_r($inventoryValues['subitemOf']);?>">
              <div class="invalid-feedback">
                Please enter a subitem name.
              </div>
            </div>

            <div class="col-sm-4">
              <label for="manufacturersPart" class="form-label">Manufacturer's Part#</label>
              <input type="text" class="form-control" name="manufacturersPart" id="manufacturersPart" placeholder="" value="<?php print_r($inventoryValues['manufacturersPart']);?>">
              <div class="invalid-feedback">
                Please enter a manufacturer's part number.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="descOnPurchTrans" class="form-label">Description on Purchase Transactions</label>
              <input type="text" class="form-control" name="descOnPurchTrans" id="descOnPurchTrans" placeholder="" value="<?php print_r($inventoryValues['descOnPurchTrans']);?>">
              <div class="invalid-feedback">
                Please enter a description on purchase transactions
              </div>
            </div>

            <div class="col-sm-6">
              <label for="descOnSalesTrans" class="form-label">Description on Sales Transactions</label>
              <input type="text" class="form-control" name="descOnSalesTrans" id="descOnSalesTrans" placeholder="" value="<?php print_r($inventoryValues['descOnSalesTrans']);?>">
            </div>

            <div class="col-sm-4">
              <label for="cost" class="form-label">Cost</label>
              <input type="text" class="form-control" name="cost" id="cost" placeholder="" value="<?php print_r($inventoryValues['cost']);?>">
              <div class="invalid-feedback">
                Please enter a cost.
              </div>
            </div>

            <div class="col-sm-4">
              <label for="COGSaccount" class="form-label">COGS Account</label>
              <input type="text" class="form-control" name="COGSaccount" id="COGSaccount" placeholder="" value="<?php print_r($inventoryValues['COGSaccount']);?>">
              <div class="invalid-feedback">
                Please enter a COGS Account
              </div>
            </div>

            <div class="col-sm-4">
              <label for="preferredVendor" class="form-label">Preferred Vendor</label>
              <input type="text" class="form-control" name="preferredVendor" id="preferredVendor" placeholder="" value="<?php print_r($inventoryValues['preferredVendor']);?>">
              <div class="invalid-feedback">
                Please enter a preferred Vendor
              </div>
            </div>

            <div class="col-sm-6">
              <label for="salesPrice" class="form-label">Sales Price</label>
              <input type="text" class="form-control" name="salesPrice" id="salesPrice" placeholder="" value="<?php print_r($inventoryValues['salesPrice']);?>">
              <div class="invalid-feedback">
                Please enter a Sales Price
              </div>
            </div>

            <div class="col-sm-6">
              <label for="incomeAccount" class="form-label">Income Account</label>
              <input type="text" class="form-control" name="incomeAccount" id="incomeAccount" placeholder="" value="<?php print_r($inventoryValues['incomeAccount']);?>">
            </div>

            <div class="col-sm-6">
              <label for="assetAccount" class="form-label">Asset Account</label>
              <input type="text" class="form-control" name="assetAccount" id="assetAccount" placeholder="" value="<?php print_r($inventoryValues['assetAccount']);?>">
              <div class="invalid-feedback">
                Please enter an Access Account
              </div>
            </div>

            <div class="col-sm-6">
              <label for="reorderPoint" class="form-label">Reorder Point</label>
              <input type="text" class="form-control" name="reorderPoint" id="reorderPoint" placeholder="" value="<?php print_r($inventoryValues['reorderPoint']);?>">
            </div>

          </div>


          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Modify Inventory Part</button>
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
