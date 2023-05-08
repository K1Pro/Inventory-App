<div class="container bg-secondary-subtle">
  <div class="d-flex justify-content-center text-center">
    <center>
        <?php
        require_once "config.php";

        $id = htmlspecialchars($_GET["id"]);
        
        // Taking all 5 values from the form data(input)
        $itemName =  $_REQUEST['itemName'] ? $_REQUEST['itemName'] : "";
        $subitemOf =  $_REQUEST['subitemOf'] ? $_REQUEST['subitemOf'] : "";
        $manufacturersPart = $_REQUEST['manufacturersPart'] ? $_REQUEST['manufacturersPart'] : "";
        $descOnPurchTrans = $_REQUEST['descOnPurchTrans'] ? $_REQUEST['descOnPurchTrans'] : "";
        $descOnSalesTrans = $_REQUEST['descOnSalesTrans'] ? $_REQUEST['descOnSalesTrans'] : "";
        $cost = $_REQUEST['cost'] ? $_REQUEST['cost'] : "";
        $COGSaccount = $_REQUEST['COGSaccount'] ? $_REQUEST['COGSaccount'] : "";
        $preferredVendor =  $_REQUEST['preferredVendor'] ? $_REQUEST['preferredVendor'] : "";
        $salesPrice = $_REQUEST['salesPrice'] ? $_REQUEST['salesPrice'] : "";
        $incomeAccount = $_REQUEST['incomeAccount'] ? $_REQUEST['incomeAccount'] : "";
        $assetAccount =  $_REQUEST['assetAccount'] ? $_REQUEST['assetAccount'] : "";
        $reorderPoint =  $_REQUEST['reorderPoint'] ? $_REQUEST['reorderPoint'] : "";

        // UPDATE Customers
        // SET ContactName = 'Alfred Schmidt', City = 'Frankfurt'
        // WHERE CustomerID = 1;

        
        // Performing insert query execution
        // FInished here
        $sql = "UPDATE inventory SET 
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
        reorderPoint = '".$reorderPoint."'
        WHERE inventory_id = ".$id;

        if(mysqli_query($conn, $sql)){
            echo "<h3>Modified inventory part successfully.</h3>";

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