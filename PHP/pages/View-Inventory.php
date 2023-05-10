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
            echo '<a href="./index.php?page=Delete">';
            echo '<a href="./index.php?page=Delete&id='.$dbValues['inventory_id'].'&db=inventory">';
                echo '<img src="./icons/delete.png" alt="Invoice" width="30" height="30">';
            echo '</a>';
        echo "</td>";
        // foreach ($dbValues as $values) {
        //     echo "<td>$values</td>";
        // }
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