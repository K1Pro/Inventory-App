<!-- <div style="overflow-y: scroll"></div> -->
<div class="container bg-secondary-subtle" style="overflow-y: auto; overflow-x: hidden">
  <!-- <main> -->

    <div class="row g-5 justify-content-center">
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3 text-center">Create an inventory part</h4>
        <form class="needs-validation" novalidate action="./index.php?page=Created-Inventory" method="post">
          <div class="row g-3">

            <div class="col-sm-4">
              <label for="itemName" class="form-label">Item Name</label>
              <input type="text" class="form-control" name="itemName" id="itemName" placeholder="">
              <div class="invalid-feedback">
                Please enter an item name.
              </div>
            </div>

            <div class="col-sm-4">
              <label for="subitemOf" class="form-label">Subitem of</label>
              <input type="text" class="form-control" name="subitemOf" id="subitemOf" placeholder="" value="">
              <div class="invalid-feedback">
                Please enter a subitem name.
              </div>
            </div>

            <div class="col-sm-4">
              <label for="manufacturersPart" class="form-label">Manufacturer's Part#</label>
              <input type="text" class="form-control" name="manufacturersPart" id="manufacturersPart" placeholder="" value="">
              <div class="invalid-feedback">
                Please enter a manufacturer's part number.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="descOnPurchTrans" class="form-label">Description on Purchase Transactions</label>
              <input type="text" class="form-control" name="descOnPurchTrans" id="descOnPurchTrans" placeholder="" >
              <div class="invalid-feedback">
                Please enter a description on purchase transactions
              </div>
            </div>

            <div class="col-sm-6">
              <label for="descOnSalesTrans" class="form-label">Description on Sales Transactions</label>
              <input type="text" class="form-control" name="descOnSalesTrans" id="descOnSalesTrans" placeholder="">
            </div>

            <div class="col-sm-4">
              <label for="cost" class="form-label">Cost</label>
              <input type="number" class="form-control" name="cost" id="cost" placeholder="" step=".01">
              <div class="invalid-feedback">
                Please enter a cost.
              </div>
            </div>

            <div class="col-sm-4">
              <label for="COGSaccount" class="form-label">COGS Account</label>
              <input type="text" class="form-control" name="COGSaccount" id="COGSaccount" placeholder="" value="">
              <div class="invalid-feedback">
                Please enter a COGS Account
              </div>
            </div>

            <div class="col-sm-4">
              <label for="preferredVendor" class="form-label">Preferred Vendor</label>
              <input type="text" class="form-control" name="preferredVendor" id="preferredVendor" placeholder="" value="">
              <div class="invalid-feedback">
                Please enter a preferred Vendor
              </div>
            </div>

            <div class="col-sm-6">
              <label for="salesPrice" class="form-label">Sales Price</label>
              <input type="number" class="form-control" name="salesPrice" id="salesPrice" placeholder="" step=".01">
              <div class="invalid-feedback">
                Please enter a Sales Price
              </div>
            </div>

            <div class="col-sm-6">
              <label for="incomeAccount" class="form-label">Income Account</label>
              <input type="text" class="form-control" name="incomeAccount" id="incomeAccount" placeholder="">
            </div>

            <div class="col-sm-6">
              <label for="assetAccount" class="form-label">Asset Account</label>
              <input type="text" class="form-control" name="assetAccount" id="assetAccount" placeholder="" >
              <div class="invalid-feedback">
                Please enter an Access Account
              </div>
            </div>

            <div class="col-sm-6">
              <label for="reorderPoint" class="form-label">Reorder Point</label>
              <input type="text" class="form-control" name="reorderPoint" id="reorderPoint" placeholder="">
            </div>

          </div>


          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Create an Inventory Part</button>
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
