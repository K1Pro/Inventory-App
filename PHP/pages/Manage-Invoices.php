<?php
    $id = htmlspecialchars($_GET["id"]);
    $pin = htmlspecialchars($_GET["pin"]);
    $action = htmlspecialchars($_GET["action"]);
    $notVisibile = $action ? ";visibility:hidden" : "";
    $buttonAction = substr(explode('-', $page)[1], 0, -1);
    console_log($_POST);
?>
<link href="./CSS/invoice-modify.css" rel="stylesheet">
<div style="overflow-y: auto; overflow-x: auto; width:100vw">
    <form class="needs-validation" novalidate id="InvoiceForm" action="<?php 
    if ($action) {echo "./index.php?page=View-Estimates";} else {echo "./index.php?page=View-Invoices";} 
    ?>" method="post">
        <!-- <input style="display:none" type="text" name="submit" value ="<?php 
        // if ($id && $pin) {echo "Modify Invoice";} else {echo "Create Invoice";} 
        ?>"></input> -->
        <input class="btn btn-primary btn-lg m-2" id="submitButton" name="submit" type="submit" value ="<?php if ($id && $pin) {echo "Modify $buttonAction";} else if ($action) {echo "Create Estimate";} else {echo "Create Invoice";} ?>"></input>
        <div id="invoice">
        <?php if ($action) {
            echo '<img src="./images/blankManageEstimate.jpg" alt="Estimate">';
        } else {
            echo '<img src="./images/blankManageInvoice.jpg" alt="Invoice">';
        }
        ?>
        </div>
        <?php
        $noOfItems =  15;

        $invoicesSQL = "SELECT * FROM ".strtolower(explode('-', $page)[1])." WHERE invoices_id = '".$id."' AND bill_zip = '".$pin."'";
        $invoiceQuery = mysqli_query($conn, $invoicesSQL);
        foreach ($invoiceQuery as $invoice) {};

        $customersSQL = "SELECT * FROM customers ORDER BY business_name ASC";
        $customersQuery = mysqli_query($conn, $customersSQL);
        $customerArray[] = array();
        foreach ($customersQuery as $customer) {$customerArray[] = $customer;};

        $inventorySQL = "SELECT * FROM inventory WHERE quantityOnHand > 0  ORDER BY descOnPurchTrans ASC";
        $inventoryQuery = mysqli_query($conn, $inventorySQL);
        $inventoryArray[] = array();
        foreach ($inventoryQuery as $inventory) {$inventoryArray[] = $inventory;};
        
        echo '<div id="invoiceDateAndNo">';
            echo '<input type="date" class="fill-in" id="invoiceDate" name="invoiceDate" value="'.date('Y-m-d', strtotime($invoice['invoiceDate'])).'" style="width:82px; margin-right: 4px;" required>';
            echo '<input type="text" class="no-outline" name="invoices_id" value="'.$invoice['invoices_id'].'" style="text-align: center;width:91px" readonly>';
        echo "</div>";

        echo '<div id="billingAddress">';
            // if ($id && $pin) {
            //     echo '<input type="text" class="fill-in" id="bill_business_name" name="bill_business_name" value="'.$invoice['bill_business_name'].'" style="width:270px" required><br>';
            // } else {
            echo '<span class="billToDropdown">';
            echo '<input class="fill-in" id="bill_business_name" name="bill_business_name" value="'.$invoice['bill_business_name'].'" placeholder="Choose business name" type="text" />';
            echo '<select class="fill-in" id="bill_business_nameSelect" name="bill_business_nameSelect" style="width:270px" onchange="this.previousElementSibling.value=this.options[this.selectedIndex].text; this.previousElementSibling.focus()">';
                echo '<option value="">Choose business name</option>';
                foreach ($customersQuery as $customer) {
                    echo '<option value="';
                    echo $customer['customers_id'];
                    echo '">';
                    echo $customer['business_name'];
                    echo "</option>";
                }
            echo '</select>';
            echo '</span><br>';
            // }
            echo '<input type="number" class="fill-in" id="bill_id" name="bill_id" value="'.$invoice['bill_id'].'" style="display: none;width:90px">';
            echo '<input type="text" class="fill-in" id="bill_first_name" name="bill_first_name" value="'.$invoice['bill_first_name'].'" placeholder="First Name" style="display: none;width:90px">';
            echo '<input type="text" class="fill-in" id="bill_last_name" name="bill_last_name" value="'.$invoice['bill_last_name'].'" placeholder="Last Name" style="display: none;width:90px">';
            echo '<input type="text" class="fill-in" id="bill_address" name="bill_address" value="'.$invoice['bill_address'].'" placeholder="Address" style="width:200px" required>';
            echo '<input type="text" class="fill-in" id="bill_address2" name="bill_address2" value="'.$invoice['bill_address2'].'" placeholder="Apt#" style="width:70px"><br>';
            echo '<input type="text" class="fill-in" id="bill_city" name="bill_city" value="'.$invoice['bill_city'].'" placeholder="City" style="width:270px" required><br>';
            echo '<select class="fill-in" id="bill_state" name="bill_state" style="width:135px">';
                require("./PHP/components/statesSelect.php");
            echo '</select>';
            echo '<input type="text" class="fill-in" id="bill_zip" name="bill_zip" value="'.$invoice['bill_zip'].'" placeholder="Zip" style="width:135px" required><br>';

            echo '<input type="text" class="fill-in" id="bill_phone" name="bill_phone" value="'.$invoice['bill_phone'].'" placeholder="Phone" style="display: none;width:90px">';
            echo '<input type="text" class="fill-in" id="bill_fax" name="bill_fax" value="'.$invoice['bill_fax'].'" placeholder="Fax" style="display: none;width:90px">';
            echo '<input type="text" class="fill-in" id="bill_email" name="bill_email" value="'.$invoice['bill_email'].'" placeholder="Email" style="display: none;width:90px">';
        echo "</div>";

        echo $action ? '<div id="shippingAddress" style="visibility:hidden">' : '<div id="shippingAddress">';
        ?><textarea class="fill-in" id="shipTo" name="shipTo" rows="5" style="width:300px;resize:none" required><?php
            echo $invoice['shipTo'];
        ?></textarea><?php
        echo "</div>";      

        echo '<div id="invoiceOptions">';
                echo '<input type="text" class="fill-in" name="po_no" value="'.$invoice['po_no'].'"';
                echo $action ? ' style="width:91px;visibility:hidden">' : ' style="text-align: center;width:91px" required>';
                echo '<input list="termsList" class="fill-in" name="terms" value="'.$invoice['terms'].'" style="width:108px'.$notVisibile.'">';
                    echo '<datalist id="termsList">';
                        echo '<option value="Due on receipt">';
                        echo '<option value="Net 15">';
                        echo '<option value="Net 30">';
                    echo '</datalist>';
                echo '<input type="text" class="fill-in" name="rep" value="'.$invoice['rep'].'" style="width:78px'.$notVisibile.'">';
                echo '<input type="date" class="fill-in" id="shipDate" name="shipDate" value="'.date('Y-m-d', strtotime($invoice['shipDate'])).'" style="width:90px'.$notVisibile.'" required>';
                echo '<input type="text" class="fill-in" name="via" value="'.$invoice['via'].'" style="width:90px'.$notVisibile.'">';
                echo '<input type="text" class="fill-in" name="fob" value="'.$invoice['fob'].'" style="width:132px'.$notVisibile.'">';
                echo '<input type="text" class="fill-in" name="project" value="'.$invoice['project'].'" style="width:114px">';
        echo "</div>";


        echo '<div id="Items">';
            for ($i = 1; $i <= $noOfItems; $i++) {
                if ($invoice['part'.$i.'Quantity'] > 0){
                    echo '<input type="number" step="1" min="1" class="fill-in" id="part'.$i.'Quantity" name="part'.$i.'Quantity" value="'.$invoice['part'.$i.'Quantity'].'"  style="width:85px">';
                } else {
                    echo '<input type="number" step="1" min="1" class="fill-in" id="part'.$i.'Quantity" name="part'.$i.'Quantity" value=""  style="width:85px">';
                }
                
                echo '<input type="text" class="fill-in" id="part'.$i.'Item"    name="part'.$i.'Item"       value="'.$invoice['part'.$i.'Item'].'"     style="margin-left:10px; width:100px">';
                // if ($id && $pin) {
                // echo '<input type="text" class="fill-in" id="part'.$i.'ItemDesc" name="part'.$i.'ItemDesc"  value="'.$invoice['part'.$i.'ItemDesc'].'" style="margin-left:10px; margin-right:10px; width:248px">';
                // } else {
                    echo '<span class="inventoryDropdown" style="margin-left:10px; margin-right:10px">';
                    echo '<input class="fill-in" id="part'.$i.'ItemDesc" name="part'.$i.'ItemDesc" value="'.$invoice['part'.$i.'ItemDesc'].'" placeholder="Choose..." type="text" />';
                    echo '<select class="fill-in" id="part'.$i.'ItemSelect" style="width:248px" onchange="this.previousElementSibling.value=this.options[this.selectedIndex].text; this.previousElementSibling.focus()">';
                    // echo '<input list="part'.$i.'ItemDescList" class="fill-in" id="part'.$i.'ItemDesc" name="part'.$i.'ItemDesc" placeholder="TYPE ITEM DESCRIPTION..." style="margin-left:10px; margin-right:10px; width:248px">';
                    // echo '<datalist id="part'.$i.'ItemDescList">';
                    echo '<option value="">Choose...</option>';
                    foreach ($inventoryQuery as $inventory) {
                      echo '<option value="';
                      echo $inventory['inventory_id'];
                      echo '">';
                      echo $inventory['descOnPurchTrans'];
                      echo "</option>";
                    }
                // echo '</datalist>';
                echo '</select>';
                echo '</span>';
                // }
                if ($invoice['part'.$i.'SalesPrice'] > 0) {
                    echo '$<input type="number" step=".01" min="0" class="fill-in" id="part'.$i.'SalesPrice" name="part'.$i.'SalesPrice" value="'.$invoice['part'.$i.'SalesPrice'].'" style="margin-left:5px; margin-right:5px; width:60px">';
                }   else {
                    echo '$<input type="number" step=".01" min="0" class="fill-in" id="part'.$i.'SalesPrice" name="part'.$i.'SalesPrice" value="" style="margin-left:5px; margin-right:5px; width:60px">';
                }
                echo '$<input type="number" step=".01" min="0" class="fill-in" id="part'.$i.'Cost" name="part'.$i.'Cost" value="'.$invoice['part'.$i.'Cost'].'" style="margin-left:5px; margin-right:15px; width:60px">';
                echo '$<input type="text" disabled class="no-outline" id="part'.$i.'TotalPrice" value="' . number_format($invoice['part'.$i.'SalesPrice'] * $invoice['part'.$i.'Quantity'], 2, '.', '') .'" style="width:85px">';
                // These should be hidden VVVVVVVVVVV display:none;
                echo '<input type="text" disabled class="no-outline" id="part'.$i.'TotalCost" value="' . number_format($invoice['part'.$i.'Cost'] * $invoice['part'.$i.'Quantity'], 2, '.', '') .'" style="display:none;width:85px">';
                echo '<input type="number" class="fill-in" id="part'.$i.'ItemNo" name="part'.$i.'ItemNo" value="'.$invoice['part'.$i.'ItemNo'].'" style="display:none;width:40px">';
                echo '<br>';
                // These should be hidden ^^^^^^^^^^^
            }
        echo "</div>";

        echo '<div id="finalPriceGroup">';
            echo 'Total:&emsp; $<input type="text" readonly class="no-outline" name="finalPrice" id="finalPrice" value="' . number_format($invoice['finalPrice'], 2, '.', '').'">';
        echo "</div>";
//style="display:none"
        echo '<div id="finalCostGroup" style="display:none">';
            echo 'Cost:&emsp; $<input type="text" readonly class="no-outline" name="finalCost" id="finalCost" value="' . number_format($invoice['finalCost'], 2, '.', '').'">';
        echo "</div>";

        echo '<div id="finalFreightGroup" style="display:none">';
            echo 'Freight:&emsp; $<input type="text" readonly class="no-outline" name="finalFreight" id="finalFreight" value="' . number_format($invoice['finalFreight'], 2, '.', '').'">';
        echo "</div>";

        echo '<div id="notes">';
            ?><textarea class="fill-in" name="invoice_notes" rows="5" placeholder="Notes" style="width:248px;text-align: left;resize:none"><?php
                if($invoice['invoice_notes']) {
                    echo $invoice['invoice_notes'];
                } 
            ?></textarea><?php
        echo "</div>";

        echo '<div id="phoneAndEmail">';
            ?><textarea class="fill-in" name="invoice_phone" rows="2" style="width:195px;text-align: center;resize:none<?php echo $notVisibile;?>" required><?php
                if($invoice['invoice_phone']) {
                    echo $invoice['invoice_phone'];
                } else {
                    echo "815-412-4908\n";
                    echo "630-493-1026";
                }
            ?></textarea><?php
            ?><textarea class="fill-in" name="invoice_email" rows="2" style="margin-left:10px; width:248px;text-align: center;resize:none<?php echo $notVisibile;?>" required><?php
                if($invoice['invoice_email']) {
                    echo $invoice['invoice_email'];
                } else {
                    echo "justin@lshc.org\n";
                    echo "mario@lshc.org";
                }
            ?></textarea><?php
        echo "</div>";
        ?>

    <!-- </form> -->
</div>
<script>
const customerData = <?php echo json_encode($customerArray); ?>;
const inventoryData = <?php echo json_encode($inventoryArray); ?>;
</script>
<script src="./JS/Manage-Invoices.js"></script>