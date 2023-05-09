<?php
$id = htmlspecialchars($_GET["id"]);
$selectedDB = htmlspecialchars($_GET["db"]);
// Selecting the data
$invoicesSQL = "SELECT * FROM invoices WHERE invoices_id = '".$id."'";
$customersSQL = "SELECT customers_id, business_name FROM customers";
$inventorySQL = "SELECT itemName, subitemOf, descOnPurchTrans, cost, preferredVendor, salesPrice, inventory_id FROM inventory ORDER BY descOnPurchTrans ASC";
// Execute the query
$invoices = mysqli_query($conn, $invoicesSQL);
$customers = mysqli_query($conn, $customersSQL);
$inventory = mysqli_query($conn, $inventorySQL);
foreach ($invoices as $invoiceValues) {}
foreach ($inventory as $inventoryValues) {}

?>


<!-- <div style="overflow-y: scroll"></div> -->
<div class="container bg-secondary-subtle" style="overflow-y: auto; overflow-x: hidden">
  <!-- <main> -->

    <div class="row g-5 justify-content-center">
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3 text-center">Modify invoice</h4>
        <form class="needs-validation" novalidate  action="./index.php?page=Created-Invoices" method="post">
          <div class="row g-3">

          <div class="col-md-6">
              <label for="billTo" class="form-label">Bill To</label>
              <select class="form-select" name="billTo" id="billTo" >
                <option value="">Choose...</option>
                <?php 
                  foreach ($customers as $dbValues) {
                    echo '<option value="';
                    print_r($dbValues['customers_id']);
                    echo '"';
                    if ($dbValues['customers_id'] == $invoiceValues['billTo']) {
                        echo " selected ";
                    }
                    echo '>';
                    print_r($dbValues['business_name']);
                    echo "</option>";
                  }
                ?>
              </select>
              <div class="invalid-feedback">
                Please select whom to bill to.
              </div>
            </div>
            <div class="col-md-6">
              <label for="shipTo" class="form-label">Ship To</label>
              <select class="form-select" name="shipTo" id="shipTo">
                <option value="">Choose...</option>
                <?php 
                
                  foreach ($customers as $dbValues) {
                    echo '<option value="';
                    print_r($dbValues['customers_id']);
                    echo '"';
                    if ($dbValues['customers_id'] == $invoiceValues['shipTo']) {
                        echo " selected ";
                    }
                    echo '>';
                    print_r($dbValues['business_name']);
                    echo "</option>";
                  }
                ?>
              </select>
              <div class="invalid-feedback">
                Please select whom to bill to.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="invoiceDate" class="form-label">Invoice Date</label>
              <input type="date" class="form-control" name="invoiceDate" id="invoiceDate" value="<?php foreach ($invoices as $dbValues) {print_r($dbValues['invoiceDate']);}?>">
              <div class="invalid-feedback">
                Please enter an invoice date
              </div>
            </div>

            <div class="col-sm-6">
              <label for="shipDate" class="form-label">Ship Date</label>
              <input type="date" class="form-control" name="shipDate" id="shipDate" value="<?php foreach ($invoices as $dbValues) {print_r($dbValues['shipDate']);}?>">
              <div class="invalid-feedback">
                Please enter a ship date
              </div>
            </div>

            <hr class="my-4">
            <label class="form-check-label">Ordered Parts</label>
            <!-- <div class="form-check">
                
            </div> -->
            <div class="col-md-4">
              <label for="part1Item" class="form-label">Part 1 Item</label>
              <select class="form-select" name="part1Item" id="part1Item" >
              <option value="">Choose...</option>
              <?php 
                  foreach ($inventory as $dbValues) {
                    echo '<option value="';
                    print_r($dbValues['inventory_id']);
                    echo '"';
                    if ($dbValues['inventory_id'] == $invoiceValues['part1Item']) {
                        echo " selected ";
                    }
                    echo '>';
                    print_r($dbValues['descOnPurchTrans']);
                    echo "</option>";
                  }
                ?>
              </select>
              <div class="invalid-feedback">
                Please select a part item
              </div>
            </div>

            <div class="col-md-5">
              <label for="part1Quantity" class="form-label">Quantity</label>
              <input type="number" class="form-control" name="part1Quantity" id="part1Quantity" value="<?php echo $invoiceValues['part1Quantity'];?>">
              <div class="invalid-feedback">
                Please enter a quantity
              </div>
            </div>

            <div class="col-md-4">
              <label for="part2Item" class="form-label">Part 2 Item</label>
              <select class="form-select" name="part2Item" id="part2Item" >
              <option value="">Choose...</option>
              <?php 
                  foreach ($inventory as $dbValues) {
                    echo '<option value="';
                    print_r($dbValues['inventory_id']);
                    echo '"';
                    if ($dbValues['inventory_id'] == $invoiceValues['part2Item']) {
                        echo " selected ";
                    }
                    echo '>';
                    print_r($dbValues['descOnPurchTrans']);
                    echo "</option>";
                  }
                ?>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>

            <div class="col-md-5">
              <label for="part2Quantity" class="form-label">Quantity</label>
              <input type="number" class="form-control" name="part2Quantity" id="part2Quantity" value="<?php echo $invoiceValues['part2Quantity'];?>">
              <div class="invalid-feedback">
                Please enter a quantity
              </div>
            </div>

            <div class="col-md-4">
              <label for="part3Item" class="form-label">Part 3 Item</label>
              <select class="form-select" name="part3Item" id="part3Item" >
              <option value="">Choose...</option>
              <?php 
                  foreach ($inventory as $dbValues) {
                    echo '<option value="';
                    print_r($dbValues['inventory_id']);
                    echo '"';
                    if ($dbValues['inventory_id'] == $invoiceValues['part3Item']) {
                        echo " selected ";
                    }
                    echo '>';
                    print_r($dbValues['descOnPurchTrans']);
                    echo "</option>";
                  }
                ?>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>

            <div class="col-md-5">
              <label for="part3Quantity" class="form-label">Quantity</label>
              <input type="number" class="form-control" name="part3Quantity" id="part3Quantity" value="<?php echo $invoiceValues['part3Quantity'];?>">
              <div class="invalid-feedback">
                Please enter a quantity
              </div>
            </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Modify Invoice</button>
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

<!-- <script>
  const deleteQueryString = window.location.search;
  const urlDeleteParams = new URLSearchParams(deleteQueryString);
  const deletePage = urlDeleteParams.get('db');
  const capitalizedDeletePage = deletePage.charAt(0).toUpperCase() + deletePage.slice(1)
  setTimeout(function () {window.location.href= `./index.php?page=View-${capitalizedDeletePage}`;},1000);
</script> -->