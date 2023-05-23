<?php $postedData = $_POST;
$id = htmlspecialchars($_GET["id"]);
if($postedData['submit']){}

if ($postedData['submit'] == "Create Inventory") {
    require("./PHP/components/schemaInventory.php");
    $insertCustomerSQL = "INSERT INTO inventory VALUES (inventory_id, '$itemName', '$subitemOf', '$manufacturersPart','$descOnPurchTrans','$descOnSalesTrans', '$cost', '$COGSaccount', '$preferredVendor', '$salesPrice', '$incomeAccount', '$assetAccount', '$reorderPoint', '$quantityOnHand')";
    if(mysqli_query($conn, $insertCustomerSQL)){
        ?><script>
        snackbar(`Inventory successfully created`);
    </script><?php   
    } else{
        echo "ERROR: Hush! Sorry $insertCustomerSQL. "
            . mysqli_error($conn);
    }
} else if ($postedData['submit'] == "Modify Inventory") {
    require("./PHP/components/schemaInventory.php");

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
    </script><?php   
    } else{
        echo "ERROR: Hush! Sorry $updateInventorySQL. "
            . mysqli_error($conn);
    }
} else if(strpos($postedData['submit'], 'Delete') !== false){
    $parts = explode('-', $postedData['submit']);
    $deleteDB = $parts[1];
    $deleteValue = $parts[2];
    require("./PHP/components/delete.php");
}

?>
<div style="overflow-y: auto; overflow-x: auto">
<table class="table table-striped">
  <tr>
    <!-- <th>No.</th> -->
    <th width="75px">Modify</th>
    <th width="70px">Delete</th>
    <th>Item Name</th>
    <th>Subitem Of</th>
    <!-- <th>manufacturersPart</th> -->
    <th>Desc. On Purch. Trans.</th>
    <!-- <th>descOnSalesTrans</th> -->
    <th width="75px">Price</th>
    <!-- <th>COGSaccount</th> -->
    <th>Preferred Vendor</th>
    <th>Quantity</th>
    <!-- <th>incomeAccount</th> -->
    <!-- <th>assetAccount</th> -->
    <!-- <th>reorderPoint</th> -->
  </tr>

<?php
    // SQL query
    $strSQL = "SELECT itemName, subitemOf, descOnPurchTrans, salesPrice, preferredVendor, quantityOnHand, inventory_id FROM inventory ORDER BY descOnPurchTrans ASC";

    // Execute the query
    $rs = mysqli_query($conn, $strSQL);
    // print_r($rs);
    // echo "<br>";
    
    foreach ($rs as $dbValues) {
        echo "<tr>";
        
        // Link to Modifying Inventory
        echo '<td class="tdCenter">';
            echo '<a href="./index.php?page=Manage-Inventory&id='.$dbValues['inventory_id'].'">';
                echo '<img src="./icons/modify.png" alt="Invoice" width="30" height="30">';
            echo '</a>';
        echo "</td>";

        // Delete an Inventory Part
        echo '<td class="tdCenter">';
            echo '<form action="./index.php?page=View-Inventory" method="post">';
                echo '<input class="deleteButton" type="submit" name="submit" value="Delete-inventory-'.$dbValues['inventory_id'].'">';
            echo '</form>';
        echo "</td>";

        echo "<td>";
            print_r($dbValues['itemName']);
        echo "</td>";

        echo "<td>";
            print_r($dbValues['subitemOf']);
        echo "</td>";

        echo "<td>";
            print_r($dbValues['descOnPurchTrans']);
        echo "</td>";

        echo "<td>$";
            print_r($dbValues['salesPrice']);
        echo "</td>";

        echo "<td>";
            print_r($dbValues['preferredVendor']);
        echo "</td>";

        echo "<td>";
            print_r($dbValues['quantityOnHand']);
        echo "</td>";


        echo "</tr>";
    }
?>

</table>
</div>