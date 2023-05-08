
<?php
    require_once "config.php";

    // SQL query
    $strSQL = "SELECT customers_id, business_name FROM customers ORDER BY business_name ASC";
    $inventorySQL = "SELECT inventory_id, descOnPurchTrans FROM inventory ORDER BY descOnPurchTrans ASC";

    // Execute the query
    $rs = mysqli_query($conn, $strSQL);
    $inventory = mysqli_query($conn, $inventorySQL);

?>

<!-- <div style="overflow-y: scroll"></div> -->
<div class="container bg-secondary-subtle" style="overflow-y: auto; overflow-x: hidden">
  <!-- <main> -->

    <div class="row g-5 justify-content-center">
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3 text-center">Create an invoice</h4>
        <form class="needs-validation" novalidate action="./index.php?page=Created-Invoices" method="post">
          <div class="row g-3">

          <div class="col-md-6">
              <label for="bill_id" class="form-label">Bill To</label>
              <select class="form-select" name="bill_id" id="bill_id" required>
                <option value="">Choose...</option>
                <?php 
                  foreach ($rs as $dbValues) {
                    echo '<option value="';
                    print_r($dbValues['customers_id']);
                    echo '">';
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
              <label for="shipTo" class="form-label">Ship To</label><small class="text-primary"> (optional)</small>
                <textarea class="form-control" aria-label="Ship To" rows="3" name="shipTo" id="shipTo"></textarea>
            </div>

            <div class="col-sm-6">
              <label for="invoiceDate" class="form-label">Invoice Date</label>
              <input type="date" class="form-control" name="invoiceDate" id="invoiceDate" required>
              <div class="invalid-feedback">
                Please enter an invoice date
              </div>
            </div>

            <div class="col-sm-6">
              <label for="shipDate" class="form-label">Ship Date</label>
              <input type="date" class="form-control" name="shipDate" id="shipDate" required>
              <div class="invalid-feedback">
                Please enter a ship date
              </div>
            </div>

            <hr class="my-4">
            <h5>Ordered Parts</h5>

            <!-- Part 1 -->
            <div class="col-md-6">
              <label for="part1ItemNo" class="form-label">Part 1 Item</label>
              <select class="form-select" name="part1ItemNo" id="part1ItemNo" required>
              <option value="">Choose...</option>
              <?php 
                  foreach ($inventory as $dbValues) {
                    echo '<option value="';
                    print_r($dbValues['inventory_id']);
                    echo '">';
                    print_r($dbValues['descOnPurchTrans']);
                    echo "</option>";
                  }
                ?>
              </select>
              <div class="invalid-feedback">
                Please select a part item
              </div>
            </div>

            <div class="col-md-2">
              <label for="part1Quantity" class="form-label">Quantity</label>
              <input type="number" class="form-control" name="part1Quantity" id="part1Quantity" required>
              <div class="invalid-feedback">
                Please enter a quantity
              </div>
            </div>

            <!-- Part 2 -->
            <div class="col-md-6">
              <label for="part2ItemNo" class="form-label">Part 2 Item</label>
              <select class="form-select" name="part2ItemNo" id="part2ItemNo" >
              <option value="">Choose...</option>
              <?php 
                  foreach ($inventory as $dbValues) {
                    echo '<option value="';
                    print_r($dbValues['inventory_id']);
                    echo '">';
                    print_r($dbValues['descOnPurchTrans']);
                    echo "</option>";
                  }
                ?>
              </select>
              <div class="invalid-feedback">
                Please select a part item
              </div>
            </div>

            <div class="col-md-2">
              <label for="part2Quantity" class="form-label">Quantity</label>
              <input type="number" class="form-control" name="part2Quantity" id="part2Quantity">
              <div class="invalid-feedback">
                Please enter a quantity
              </div>
            </div>

            <!-- Part 3 -->
            <div class="col-md-6">
              <label for="part3ItemNo" class="form-label">Part 3 Item</label>
              <select class="form-select" name="part3ItemNo" id="part3ItemNo" >
              <option value="">Choose...</option>
              <?php 
                  foreach ($inventory as $dbValues) {
                    echo '<option value="';
                    print_r($dbValues['inventory_id']);
                    echo '">';
                    print_r($dbValues['descOnPurchTrans']);
                    echo "</option>";
                  }
                ?>
              </select>
              <div class="invalid-feedback">
                Please select a part item
              </div>
            </div>

            <div class="col-md-2">
              <label for="part3Quantity" class="form-label">Quantity</label>
              <input type="number" class="form-control" name="part3Quantity" id="part3Quantity">
              <div class="invalid-feedback">
                Please enter a quantity
              </div>
            </div>

            <!-- Part 4 -->
            <div class="col-md-6">
              <label for="part4ItemNo" class="form-label">Part 4 Item</label>
              <select class="form-select" name="part4ItemNo" id="part4ItemNo" >
              <option value="">Choose...</option>
              <?php 
                  foreach ($inventory as $dbValues) {
                    echo '<option value="';
                    print_r($dbValues['inventory_id']);
                    echo '">';
                    print_r($dbValues['descOnPurchTrans']);
                    echo "</option>";
                  }
                ?>
              </select>
              <div class="invalid-feedback">
                Please select a part item
              </div>
            </div>

            <div class="col-md-2">
              <label for="part4Quantity" class="form-label">Quantity</label>
              <input type="number" class="form-control" name="part4Quantity" id="part4Quantity">
              <div class="invalid-feedback">
                Please enter a quantity
              </div>
            </div>
            
            <!-- Part 5 -->
            <div class="col-md-6">
              <label for="part5ItemNo" class="form-label">Part 5 Item</label>
              <select class="form-select" name="part5ItemNo" id="part5ItemNo" >
              <option value="">Choose...</option>
              <?php 
                  foreach ($inventory as $dbValues) {
                    echo '<option value="';
                    print_r($dbValues['inventory_id']);
                    echo '">';
                    print_r($dbValues['descOnPurchTrans']);
                    echo "</option>";
                  }
                ?>
              </select>
              <div class="invalid-feedback">
                Please select a part item
              </div>
            </div>

            <div class="col-md-2">
              <label for="part5Quantity" class="form-label">Quantity</label>
              <input type="number" class="form-control" name="part5Quantity" id="part5Quantity">
              <div class="invalid-feedback">
                Please enter a quantity
              </div>
            </div>
            
            <!-- Part 6 -->
            <div class="col-md-6">
              <label for="part6ItemNo" class="form-label">Part 6 Item</label>
              <select class="form-select" name="part6ItemNo" id="part6ItemNo" >
              <option value="">Choose...</option>
              <?php 
                  foreach ($inventory as $dbValues) {
                    echo '<option value="';
                    print_r($dbValues['inventory_id']);
                    echo '">';
                    print_r($dbValues['descOnPurchTrans']);
                    echo "</option>";
                  }
                ?>
              </select>
              <div class="invalid-feedback">
                Please select a part item
              </div>
            </div>

            <div class="col-md-2">
              <label for="part6Quantity" class="form-label">Quantity</label>
              <input type="number" class="form-control" name="part6Quantity" id="part6Quantity">
              <div class="invalid-feedback">
                Please enter a quantity
              </div>
            </div>
            
            <!-- Part 7 -->
            <div class="col-md-6">
              <label for="part7ItemNo" class="form-label">Part 7 Item</label>
              <select class="form-select" name="part7ItemNo" id="part7ItemNo" >
              <option value="">Choose...</option>
              <?php 
                  foreach ($inventory as $dbValues) {
                    echo '<option value="';
                    print_r($dbValues['inventory_id']);
                    echo '">';
                    print_r($dbValues['descOnPurchTrans']);
                    echo "</option>";
                  }
                ?>
              </select>
              <div class="invalid-feedback">
                Please select a part item
              </div>
            </div>

            <div class="col-md-2">
              <label for="part7Quantity" class="form-label">Quantity</label>
              <input type="number" class="form-control" name="part7Quantity" id="part7Quantity">
              <div class="invalid-feedback">
                Please enter a quantity
              </div>
            </div>

            
            <!-- Part 8 -->
            <div class="col-md-6">
              <label for="part8ItemNo" class="form-label">Part 8 Item</label>
              <select class="form-select" name="part8ItemNo" id="part8ItemNo" >
              <option value="">Choose...</option>
              <?php 
                  foreach ($inventory as $dbValues) {
                    echo '<option value="';
                    print_r($dbValues['inventory_id']);
                    echo '">';
                    print_r($dbValues['descOnPurchTrans']);
                    echo "</option>";
                  }
                ?>
              </select>
              <div class="invalid-feedback">
                Please select a part item
              </div>
            </div>

            <div class="col-md-2">
              <label for="part8Quantity" class="form-label">Quantity</label>
              <input type="number" class="form-control" name="part8Quantity" id="part8Quantity">
              <div class="invalid-feedback">
                Please enter a quantity
              </div>
            </div>

            
            <!-- Part 9 -->
            <div class="col-md-6">
              <label for="part9ItemNo" class="form-label">Part 9 Item</label>
              <select class="form-select" name="part9ItemNo" id="part9ItemNo" >
              <option value="">Choose...</option>
              <?php 
                  foreach ($inventory as $dbValues) {
                    echo '<option value="';
                    print_r($dbValues['inventory_id']);
                    echo '">';
                    print_r($dbValues['descOnPurchTrans']);
                    echo "</option>";
                  }
                ?>
              </select>
              <div class="invalid-feedback">
                Please select a part item
              </div>
            </div>

            <div class="col-md-2">
              <label for="part9Quantity" class="form-label">Quantity</label>
              <input type="number" class="form-control" name="part9Quantity" id="part9Quantity">
              <div class="invalid-feedback">
                Please enter a quantity
              </div>
            </div>

            <!-- Part 10 -->
            <div class="col-md-6">
              <label for="part10ItemNo" class="form-label">Part 10 Item</label>
              <select class="form-select" name="part10ItemNo" id="part10ItemNo" >
              <option value="">Choose...</option>
              <?php 
                  foreach ($inventory as $dbValues) {
                    echo '<option value="';
                    print_r($dbValues['inventory_id']);
                    echo '">';
                    print_r($dbValues['descOnPurchTrans']);
                    echo "</option>";
                  }
                ?>
              </select>
              <div class="invalid-feedback">
                Please select a part item
              </div>
            </div>

            <div class="col-md-2">
              <label for="part10Quantity" class="form-label">Quantity</label>
              <input type="number" class="form-control" name="part10Quantity" id="part10Quantity">
              <div class="invalid-feedback">
                Please enter a quantity
              </div>
            </div>

            <!-- Part 11 -->
            <div class="col-md-6">
              <label for="part11ItemNo" class="form-label">Part 11 Item</label>
              <select class="form-select" name="part11ItemNo" id="part11ItemNo" >
              <option value="">Choose...</option>
              <?php 
                  foreach ($inventory as $dbValues) {
                    echo '<option value="';
                    print_r($dbValues['inventory_id']);
                    echo '">';
                    print_r($dbValues['descOnPurchTrans']);
                    echo "</option>";
                  }
                ?>
              </select>
              <div class="invalid-feedback">
                Please select a part item
              </div>
            </div>

            <div class="col-md-2">
              <label for="part11Quantity" class="form-label">Quantity</label>
              <input type="number" class="form-control" name="part11Quantity" id="part11Quantity">
              <div class="invalid-feedback">
                Please enter a quantity
              </div>
            </div>
            
            <!-- Part 12 -->
            <div class="col-md-6">
              <label for="part12ItemNo" class="form-label">Part 12 Item</label>
              <select class="form-select" name="part12ItemNo" id="part12ItemNo" >
              <option value="">Choose...</option>
              <?php 
                  foreach ($inventory as $dbValues) {
                    echo '<option value="';
                    print_r($dbValues['inventory_id']);
                    echo '">';
                    print_r($dbValues['descOnPurchTrans']);
                    echo "</option>";
                  }
                ?>
              </select>
              <div class="invalid-feedback">
                Please select a part item
              </div>
            </div>

            <div class="col-md-2">
              <label for="part12Quantity" class="form-label">Quantity</label>
              <input type="number" class="form-control" name="part12Quantity" id="part12Quantity">
              <div class="invalid-feedback">
                Please enter a quantity
              </div>
            </div>
            
            <!-- Part 13 -->
            <div class="col-md-6">
              <label for="part13ItemNo" class="form-label">Part 13 Item</label>
              <select class="form-select" name="part13ItemNo" id="part13ItemNo" >
              <option value="">Choose...</option>
              <?php 
                  foreach ($inventory as $dbValues) {
                    echo '<option value="';
                    print_r($dbValues['inventory_id']);
                    echo '">';
                    print_r($dbValues['descOnPurchTrans']);
                    echo "</option>";
                  }
                ?>
              </select>
              <div class="invalid-feedback">
                Please select a part item
              </div>
            </div>

            <div class="col-md-2">
              <label for="part13Quantity" class="form-label">Quantity</label>
              <input type="number" class="form-control" name="part13Quantity" id="part13Quantity">
              <div class="invalid-feedback">
                Please enter a quantity
              </div>
            </div>
            
            <!-- Part 14 -->
            <div class="col-md-6">
              <label for="part14ItemNo" class="form-label">Part 14 Item</label>
              <select class="form-select" name="part14ItemNo" id="part14ItemNo" >
              <option value="">Choose...</option>
              <?php 
                  foreach ($inventory as $dbValues) {
                    echo '<option value="';
                    print_r($dbValues['inventory_id']);
                    echo '">';
                    print_r($dbValues['descOnPurchTrans']);
                    echo "</option>";
                  }
                ?>
              </select>
              <div class="invalid-feedback">
                Please select a part item
              </div>
            </div>

            <div class="col-md-2">
              <label for="part14Quantity" class="form-label">Quantity</label>
              <input type="number" class="form-control" name="part14Quantity" id="part14Quantity">
              <div class="invalid-feedback">
                Please enter a quantity
              </div>
            </div>
            
            <!-- Part 15 -->
            <div class="col-md-6">
              <label for="part15ItemNo" class="form-label">Part 15 Item</label>
              <select class="form-select" name="part15ItemNo" id="part15ItemNo" >
              <option value="">Choose...</option>
              <?php 
                  foreach ($inventory as $dbValues) {
                    echo '<option value="';
                    print_r($dbValues['inventory_id']);
                    echo '">';
                    print_r($dbValues['descOnPurchTrans']);
                    echo "</option>";
                  }
                ?>
              </select>
              <div class="invalid-feedback">
                Please select a part item
              </div>
            </div>

            <div class="col-md-2">
              <label for="part15Quantity" class="form-label">Quantity</label>
              <input type="number" class="form-control" name="part15Quantity" id="part15Quantity">
              <div class="invalid-feedback">
                Please enter a quantity
              </div>
            </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Create Invoice</button>
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

<?php
    $conn->close();
?>
<script>
let date = new Date().toJSON();
  document.getElementById("invoiceDate").value=date.slice(0,10);
  document.getElementById("shipDate").value=date.slice(0,10);
</script>