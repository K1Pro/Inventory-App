<div class="container bg-secondary-subtle">
  <div class="d-flex justify-content-center text-center">
    <center>
        <?php
        require_once "config.php";
        
        $itemName =  $_REQUEST['itemName'];
        $subitemOf =  $_REQUEST['subitemOf'];
        $manufacturersPart = $_REQUEST['manufacturersPart'];
        $descOnPurchTrans = $_REQUEST['descOnPurchTrans'];
        $descOnSalesTrans = $_REQUEST['descOnSalesTrans'];
        $cost = $_REQUEST['cost'];
        $COGSaccount = $_REQUEST['COGSaccount'];
        $preferredVendor =  $_REQUEST['preferredVendor'];
        $salesPrice = $_REQUEST['salesPrice'];
        $incomeAccount = $_REQUEST['incomeAccount'];
        $assetAccount =  $_REQUEST['assetAccount'];
        $reorderPoint =  $_REQUEST['reorderPoint'];

        
        // Performing insert query execution
        $sql = "INSERT INTO inventory VALUES (inventory_id, '$itemName', '$subitemOf', '$manufacturersPart','$descOnPurchTrans','$descOnSalesTrans', '$cost', '$COGSaccount', '$preferredVendor', '$salesPrice', '$incomeAccount', '$assetAccount', '$reorderPoint')";
        
        if(mysqli_query($conn, $sql)){
            echo "<h3>Added a new inventory part successfully.";

            // echo nl2br("\n$itemName\n $subitemOf\n "
            //     . "$manufacturersPart\n $descOnPurchTrans\n $cost");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
        
        // Close connection
        mysqli_close($conn);
        ?>
    </center>
  </div>
</div>
<script>
  setTimeout(function () {window.location.href= './index.php?page=View-Inventory';},1000);
</script>