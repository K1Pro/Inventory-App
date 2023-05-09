<div class="container bg-secondary-subtle">
  <div class="d-flex justify-content-center text-center">
    <center>
        <?php
        // Taking all 5 values from the form data(input)
        $bill_id =  $_REQUEST['bill_id'];

        $customersSQL = "SELECT * FROM customers WHERE customers_id = '".$bill_id."'";
        $customers = mysqli_query($conn, $customersSQL);
        foreach ($customers as $dbValues) {
          $bill_business_name =  $dbValues['business_name'];
          $bill_first_name =  $dbValues['first_name'];
          $bill_last_name =  $dbValues['last_name'];
          $bill_address =  $dbValues['address'];
          $bill_address2 =  $dbValues['address2'];
          $bill_city =  $dbValues['city'];
          $bill_state =  $dbValues['state'];
          $bill_zip =  $dbValues['zip'];
          $bill_country =  $dbValues['country'];
          $bill_email =  $dbValues['email'];
        }

        $shipTo =  $_REQUEST['shipTo'];

        $invoiceDate = $_REQUEST['invoiceDate'];
        $shipDate = $_REQUEST['shipDate'];

        $part1ItemNo = $_REQUEST['part1ItemNo'];
        $part1Quantity = $_REQUEST['part1Quantity'] ? $_REQUEST['part1Quantity'] : 0;
        $inventorySQL = "SELECT itemName, descOnPurchTrans, salesPrice FROM inventory WHERE inventory_id = '".$part1ItemNo ."'";
        $inventory = mysqli_query($conn, $inventorySQL);
        foreach ($inventory as $dbValues) {
          $part1Item = $dbValues['itemName'];
          $part1ItemDesc = $dbValues['descOnPurchTrans'];
          $part1SalesPrice = $dbValues['salesPrice'] ? $dbValues['salesPrice'] : 0;
        }

        $part2ItemNo = $_REQUEST['part2ItemNo'];
        $part2Quantity =  $_REQUEST['part2Quantity'] ? $_REQUEST['part2Quantity'] : 0;
        $inventorySQL = "SELECT itemName, descOnPurchTrans, salesPrice FROM inventory WHERE inventory_id = '".$part2ItemNo ."'";
        $inventory = mysqli_query($conn, $inventorySQL);
        foreach ($inventory as $dbValues) {
          $part2Item = $dbValues['itemName'];
          $part2ItemDesc = $dbValues['descOnPurchTrans'];
          $part2SalesPrice = $dbValues['salesPrice'] ? $dbValues['salesPrice'] : 0;
        }

        $part3ItemNo = $_REQUEST['part3ItemNo'];
        $part3Quantity = $_REQUEST['part3Quantity'] ? $_REQUEST['part3Quantity'] : 0;
        $inventorySQL = "SELECT itemName, descOnPurchTrans, salesPrice FROM inventory WHERE inventory_id = '".$part3ItemNo ."'";
        $inventory = mysqli_query($conn, $inventorySQL);
        foreach ($inventory as $dbValues) {
          $part3Item = $dbValues['itemName'];
          $part3ItemDesc = $dbValues['descOnPurchTrans'];
          $part3SalesPrice = $dbValues['salesPrice'] ? $dbValues['salesPrice'] : 0;
        }

        $part4ItemNo = $_REQUEST['part4ItemNo'];
        $part4Quantity = $_REQUEST['part4Quantity'] ? $_REQUEST['part4Quantity'] : 0;
        $inventorySQL = "SELECT itemName, descOnPurchTrans, salesPrice FROM inventory WHERE inventory_id = '".$part4ItemNo ."'";
        $inventory = mysqli_query($conn, $inventorySQL);
        foreach ($inventory as $dbValues) {
          $part4Item = $dbValues['itemName'];
          $part4ItemDesc = $dbValues['descOnPurchTrans'];
          $part4SalesPrice = $dbValues['salesPrice'] ? $dbValues['salesPrice'] : 0;
        }

        $part5ItemNo = $_REQUEST['part5ItemNo'];
        $part5Quantity = $_REQUEST['part5Quantity'] ? $_REQUEST['part5Quantity'] : 0;
        $inventorySQL = "SELECT itemName, descOnPurchTrans, salesPrice FROM inventory WHERE inventory_id = '".$part5ItemNo ."'";
        $inventory = mysqli_query($conn, $inventorySQL);
        foreach ($inventory as $dbValues) {
          $part5Item = $dbValues['itemName'];
          $part5ItemDesc = $dbValues['descOnPurchTrans'];
          $part5SalesPrice = $dbValues['salesPrice'] ? $dbValues['salesPrice'] : 0;
        }

        $part6ItemNo = $_REQUEST['part6ItemNo'];
        $part6Quantity = $_REQUEST['part6Quantity'] ? $_REQUEST['part6Quantity'] : 0;
        $inventorySQL = "SELECT itemName, descOnPurchTrans, salesPrice FROM inventory WHERE inventory_id = '".$part6ItemNo ."'";
        $inventory = mysqli_query($conn, $inventorySQL);
        foreach ($inventory as $dbValues) {
          $part6Item = $dbValues['itemName'];
          $part6ItemDesc = $dbValues['descOnPurchTrans'];
          $part6SalesPrice = $dbValues['salesPrice'] ? $dbValues['salesPrice'] : 0;
        }

        $part7ItemNo = $_REQUEST['part7ItemNo'];
        $part7Quantity = $_REQUEST['part7Quantity'] ? $_REQUEST['part7Quantity'] : 0;
        $inventorySQL = "SELECT itemName, descOnPurchTrans, salesPrice FROM inventory WHERE inventory_id = '".$part7ItemNo ."'";
        $inventory = mysqli_query($conn, $inventorySQL);
        foreach ($inventory as $dbValues) {
          $part7Item = $dbValues['itemName'];
          $part7ItemDesc = $dbValues['descOnPurchTrans'];
          $part7SalesPrice = $dbValues['salesPrice'] ? $dbValues['salesPrice'] : 0;
        }

        $part8ItemNo = $_REQUEST['part8ItemNo'];
        $part8Quantity = $_REQUEST['part8Quantity'] ? $_REQUEST['part8Quantity'] : 0;
        $inventorySQL = "SELECT itemName, descOnPurchTrans, salesPrice FROM inventory WHERE inventory_id = '".$part8ItemNo ."'";
        $inventory = mysqli_query($conn, $inventorySQL);
        foreach ($inventory as $dbValues) {
          $part8Item = $dbValues['itemName'];
          $part8ItemDesc = $dbValues['descOnPurchTrans'];
          $part8SalesPrice = $dbValues['salesPrice'] ? $dbValues['salesPrice'] : 0;
        }

        $part9ItemNo = $_REQUEST['part9ItemNo'];
        $part9Quantity = $_REQUEST['part9Quantity'] ? $_REQUEST['part9Quantity'] : 0;
        $inventorySQL = "SELECT itemName, descOnPurchTrans, salesPrice FROM inventory WHERE inventory_id = '".$part9ItemNo ."'";
        $inventory = mysqli_query($conn, $inventorySQL);
        foreach ($inventory as $dbValues) {
          $part9Item = $dbValues['itemName'];
          $part9ItemDesc = $dbValues['descOnPurchTrans'];
          $part9SalesPrice = $dbValues['salesPrice'] ? $dbValues['salesPrice'] : 0;
        }

        $part10ItemNo = $_REQUEST['part10ItemNo'];
        $part10Quantity = $_REQUEST['part10Quantity'] ? $_REQUEST['part10Quantity'] : 0;
        $inventorySQL = "SELECT itemName, descOnPurchTrans, salesPrice FROM inventory WHERE inventory_id = '".$part10ItemNo ."'";
        $inventory = mysqli_query($conn, $inventorySQL);
        foreach ($inventory as $dbValues) {
          $part10Item = $dbValues['itemName'];
          $part10ItemDesc = $dbValues['descOnPurchTrans'];
          $part10SalesPrice = $dbValues['salesPrice'] ? $dbValues['salesPrice'] : 0;
        }

        $part11ItemNo = $_REQUEST['part11ItemNo'];
        $part11Quantity = $_REQUEST['part11Quantity'] ? $_REQUEST['part11Quantity'] : 0;
        $inventorySQL = "SELECT itemName, descOnPurchTrans, salesPrice FROM inventory WHERE inventory_id = '".$part11ItemNo ."'";
        $inventory = mysqli_query($conn, $inventorySQL);
        foreach ($inventory as $dbValues) {
          $part11Item = $dbValues['itemName'];
          $part11ItemDesc = $dbValues['descOnPurchTrans'];
          $part11SalesPrice = $dbValues['salesPrice'] ? $dbValues['salesPrice'] : 0;
        }

        $part12ItemNo = $_REQUEST['part12ItemNo'];
        $part12Quantity = $_REQUEST['part12Quantity'] ? $_REQUEST['part12Quantity'] : 0;
        $inventorySQL = "SELECT itemName, descOnPurchTrans, salesPrice FROM inventory WHERE inventory_id = '".$part12ItemNo ."'";
        $inventory = mysqli_query($conn, $inventorySQL);
        foreach ($inventory as $dbValues) {
          $part12Item = $dbValues['itemName'];
          $part12ItemDesc = $dbValues['descOnPurchTrans'];
          $part12SalesPrice = $dbValues['salesPrice'] ? $dbValues['salesPrice'] : 0;
        }

        $part13ItemNo = $_REQUEST['part13ItemNo'];
        $part13Quantity = $_REQUEST['part13Quantity'] ? $_REQUEST['part13Quantity'] : 0;
        $inventorySQL = "SELECT itemName, descOnPurchTrans, salesPrice FROM inventory WHERE inventory_id = '".$part13ItemNo ."'";
        $inventory = mysqli_query($conn, $inventorySQL);
        foreach ($inventory as $dbValues) {
          $part13Item = $dbValues['itemName'];
          $part13ItemDesc = $dbValues['descOnPurchTrans'];
          $part13SalesPrice = $dbValues['salesPrice'] ? $dbValues['salesPrice'] : 0;
        }

        $part14ItemNo = $_REQUEST['part14ItemNo'];
        $part14Quantity = $_REQUEST['part14Quantity'] ? $_REQUEST['part14Quantity'] : 0;
        $inventorySQL = "SELECT itemName, descOnPurchTrans, salesPrice FROM inventory WHERE inventory_id = '".$part14ItemNo ."'";
        $inventory = mysqli_query($conn, $inventorySQL);
        foreach ($inventory as $dbValues) {
          $part14Item = $dbValues['itemName'];
          $part14ItemDesc = $dbValues['descOnPurchTrans'];
          $part14SalesPrice = $dbValues['salesPrice'] ? $dbValues['salesPrice'] : 0;
        }

        $part15ItemNo = $_REQUEST['part15ItemNo'];
        $part15Quantity = $_REQUEST['part15Quantity'] ? $_REQUEST['part15Quantity'] : 0;
        $inventorySQL = "SELECT itemName, descOnPurchTrans, salesPrice FROM inventory WHERE inventory_id = '".$part15ItemNo ."'";
        $inventory = mysqli_query($conn, $inventorySQL);
        foreach ($inventory as $dbValues) {
          $part15Item = $dbValues['itemName'];
          $part15ItemDesc = $dbValues['descOnPurchTrans'];
          $part15SalesPrice = $dbValues['salesPrice'] ? $dbValues['salesPrice'] : 0;
        }

        $usersSQL = "SELECT email, phone FROM users WHERE users_id = '".$_SESSION["users_id"]."'";
        $users = mysqli_query($conn, $usersSQL);
        foreach ($users as $dbValues) {
          $invoice_phone = $dbValues['phone'];
          $invoice_email = $dbValues['email'];
        }

        $finalPrice =
        number_format((
        ($part1SalesPrice * $part1Quantity ) + 
        ($part2SalesPrice * $part2Quantity ) + 
        ($part3SalesPrice * $part3Quantity ) + 
        ($part4SalesPrice * $part4Quantity ) + 
        ($part5SalesPrice * $part5Quantity ) +
        ($part6SalesPrice * $part6Quantity ) +
        ($part7SalesPrice * $part7Quantity ) +
        ($part8SalesPrice * $part8Quantity ) +
        ($part9SalesPrice * $part9Quantity ) +
        ($part10SalesPrice * $part10Quantity ) +
        ($part11SalesPrice * $part11Quantity ) +
        ($part12SalesPrice * $part12Quantity ) +
        ($part13SalesPrice * $part13Quantity ) +
        ($part14SalesPrice * $part14Quantity ) +
        ($part15SalesPrice * $part15Quantity )
        ),2, '.', '');
        
        // Performing insert query execution
        $sql = "INSERT INTO invoices VALUES (invoices_id, '$bill_id', '$bill_business_name', '$bill_first_name', '$bill_last_name', '$bill_address', '$bill_address2', '$bill_city', '$bill_state', '$bill_zip', '$bill_country', '$bill_email', '$shipTo', '$invoiceDate','$shipDate', '$part1ItemNo', '$part1Item', '$part1ItemDesc', '$part1Quantity', '$part1SalesPrice', '$part2ItemNo', '$part2Item', '$part2ItemDesc', '$part2Quantity', '$part2SalesPrice', '$part3ItemNo', '$part3Item', '$part3ItemDesc', '$part3Quantity', '$part3SalesPrice', '$part4ItemNo', '$part4Item', '$part4ItemDesc', '$part4Quantity', '$part4SalesPrice', '$part5ItemNo', '$part5Item', '$part5ItemDesc', '$part5Quantity', '$part5SalesPrice', '$part6ItemNo', '$part6Item', '$part6ItemDesc', '$part6Quantity', '$part6SalesPrice', '$part7ItemNo', '$part7Item', '$part7ItemDesc', '$part7Quantity', '$part7SalesPrice', '$part8ItemNo', '$part8Item', '$part8ItemDesc', '$part8Quantity', '$part8SalesPrice', '$part9ItemNo', '$part9Item', '$part9ItemDesc', '$part9Quantity', '$part9SalesPrice', '$part10ItemNo', '$part10Item', '$part10ItemDesc', '$part10Quantity', '$part10SalesPrice', '$part11ItemNo', '$part11Item', '$part11ItemDesc', '$part11Quantity', '$part11SalesPrice', '$part12ItemNo', '$part12Item', '$part12ItemDesc', '$part12Quantity', '$part12SalesPrice', '$part13ItemNo', '$part13Item', '$part13ItemDesc', '$part13Quantity', '$part13SalesPrice', '$part14ItemNo', '$part14Item', '$part14ItemDesc', '$part14Quantity', '$part14SalesPrice', '$part15ItemNo', '$part15Item', '$part15ItemDesc', '$part15Quantity', '$part15SalesPrice', '$finalPrice', '$invoice_phone', '$invoice_email')";
        
        if(mysqli_query($conn, $sql)){
            echo "<h3>Added a new invoice successfully.";

            // echo nl2br("\n$bill_business_name\n $invoiceDate\n "
            //     . "$finalPrice\n $part2Item\n $part3Item");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
        
        ?>
    </center>
  </div>
</div>
<script>
  setTimeout(function () {window.location.href= './index.php?page=View-Invoices';},1000);
</script>