<link href="./CSS/invoice-modify.css" rel="stylesheet">
<div style="overflow-y: auto; overflow-x: auto; width:100vw">
    <form class="needs-validation" novalidate  action='./index.php?page=View-Invoices' method="post">
        <?php
            $id = htmlspecialchars($_GET["id"]);
            $pin = htmlspecialchars($_GET["pin"]);
        ?>
        <input class="btn btn-primary btn-lg m-2" name="submit" type="submit" value ="<?php echo $id && $pin ? "Modify Invoice" : "Create Invoice"; ?>"></input>
        <div id="invoice">
            <img src="./images/blankInvoice.jpg" alt="Invoice">
        </div>

        <?php
        $noOfItems =  15;

        $invoicesSQL = "SELECT * FROM invoices WHERE invoices_id = '".$id."' AND bill_zip = '".$pin."'";
        $invoiceQuery = mysqli_query($conn, $invoicesSQL);
        foreach ($invoiceQuery as $invoice) {};

        $customersSQL = "SELECT * FROM customers ORDER BY business_name ASC";
        $customersQuery = mysqli_query($conn, $customersSQL);
        $customerArray[] = array();
        foreach ($customersQuery as $customer) {
            $customerArray[] = $customer;
        };

        $inventorySQL = "SELECT * FROM inventory ORDER BY descOnPurchTrans ASC";
        $inventoryQuery = mysqli_query($conn, $inventorySQL);
        $inventoryArray[] = array();
        foreach ($inventoryQuery as $inventory) {
            $inventoryArray[] = $inventory;
        };

        $usersSQL = "SELECT email, phone FROM users WHERE users_id = '".$_SESSION["users_id"]."'";
        $usersQuery = mysqli_query($conn, $usersSQL);
        foreach ($usersQuery as $usersValues) {
          $invoice_phone = $usersValues['phone'];
          $invoice_email = $usersValues['email'];
        }
        
        echo '<div id="invoiceDateAndNo">';
            echo '<input type="date" class="fill-in" id="invoiceDate" name="invoiceDate" value="'.date('Y-m-d', strtotime($invoice['invoiceDate'])).'" style="width:82px; margin-right: 40px;" required>';
            echo $invoice['invoices_id'];
        echo "</div>";

        echo '<div id="billingAddress">';
            if ($id && $pin) {
                echo '<input type="text" class="fill-in" id="bill_business_name" name="bill_business_name" value="'.$invoice['bill_business_name'].'" style="width:270px"><br>';
            } else {
                echo '<select class="fill-in" name="bill_business_name" id="bill_business_name" style="width:270px">';
                    echo '<option value="">Choose business name to prefill...</option>';
                    foreach ($customersQuery as $customer) {
                        echo '<option value="';
                        print_r($customer['customers_id']);
                        echo '">';
                        print_r($customer['business_name']);
                        echo "</option>";
                    }
                echo '</select><br>';
            }
            echo '<input type="text" class="fill-in" id="bill_address" name="bill_address" value="" placeholder="Address" style="width:200px">';
            echo '<input type="text" class="fill-in" id="bill_address2" name="bill_address2" value="" placeholder="Apt#" style="width:70px"><br>';
            echo '<input type="text" class="fill-in" id="bill_city" name="bill_city" value="" placeholder="City" style="width:270px"><br>';
            echo '<select class="fill-in" id="bill_state" name="bill_state" placeholder="State" value="" style="width:135px">';
                require("./PHP/components/statesSelect.php");
            echo '</select>';
            echo '<input type="text" class="fill-in" id="bill_zip" name="bill_zip" value="" placeholder="Zip" style="width:135px">';
        echo "</div>";

        echo '<div id="shippingAddress">';
        ?><textarea class="fill-in" name="shipTo" rows="5" style="width:300px;resize:none"><?php
            echo $invoice['shipTo'] ? $invoice['shipTo'] : "SAME AS BILL TO";
        ?></textarea><?php
        echo "</div>";      

        echo '<div id="invoiceOptions">';
                echo '<input type="text" class="no-outline" name="invoices_id" value="'.$invoice['invoices_id'].'" style="text-align: center;width:91px" disabled>';
                echo '<input list="termsList" class="fill-in" name="terms" value="'.$invoice['terms'].'" style="width:108px">';
                    echo '<datalist id="termsList">';
                        echo '<option value="Due on receipt">';
                        echo '<option value="Net 15">';
                        echo '<option value="Net 30">';
                    echo '</datalist>';
                echo '<input type="text" class="fill-in" name="rep" value="" style="width:78px">';
                echo '<input type="date" class="fill-in" id="shipDate" name="shipDate" value="'.date('Y-m-d', strtotime($invoice['shipDate'])).'" style="width:90px" required>';
                echo '<input type="text" class="fill-in" name="via" value="" style="width:90px">';
                echo '<input type="text" class="fill-in" name="fob" value="" style="width:132px">';
                echo '<input type="text" class="fill-in" name="project" value="" style="width:114px">';
        echo "</div>";


        echo '<div id="Items">';
            for ($i = 1; $i <= $noOfItems; $i++) {
                echo '<input type="number" step="1" min="1" class="fill-in" id="part'.$i.'Quantity" name="part'.$i.'Quantity" value="'.$invoice['part'.$i.'Quantity'].'"  style="width:85px">';
                echo '<input type="text" class="fill-in" id="part'.$i.'Item"    name="part'.$i.'Item"       value="'.$invoice['part'.$i.'Item'].'"     style="margin-left:10px; width:100px">';
                if ($id && $pin) {
                echo '<input type="text" class="fill-in" id="part'.$i.'ItemDesc" name="part'.$i.'ItemDesc"  value="'.$invoice['part'.$i.'ItemDesc'].'" style="margin-left:10px; width:248px">';
                } else {
                    echo '<select class="fill-in" id="part'.$i.'ItemDesc" name="part'.$i.'ItemDesc" style="margin-left:10px; width:248px">';
                    echo '<option value="">Choose...</option>';
                    foreach ($inventoryQuery as $inventory) {
                      echo '<option value="';
                      echo $inventory['inventory_id'];
                      echo '">';
                      print_r($inventory['descOnPurchTrans']);
                      echo "</option>";
                    }
                echo '</select>';
                }
                echo '<input type="number" step=".01" min="0" class="fill-in" id="part'.$i.'SalesPrice" name="part'.$i.'SalesPrice" value="'.$invoice['part'.$i.'SalesPrice'].'" style="margin-left:10px; margin-right:20px; width:120px">';
                echo '$<input type="text" disabled class="no-outline" id="part'.$i.'TotalPrice" value="' . number_format((($invoice['part'.$i.'SalesPrice'] * $invoice['part'.$i.'Quantity'])),2, '.', ',') .'" style="width:85px"><br>';
            }
        echo "</div>";

        echo '<div id="finalPrice">';
            echo "$" . number_format($invoice['finalPrice'], 2, '.', ',');
        echo "</div>";

        echo '<div id="phoneAndEmail">';
        if ($id && $pin) {
            echo '<input type="text" class="fill-in" name="invoice_phone" value="'.$invoice['invoice_phone'].'" style="width:195px">';
            echo '<input type="text" class="fill-in" name="invoice_email" value="'.$invoice['invoice_email'].'" style="margin-left:10px; width:248px">';
        } else {
            echo '<input type="text" class="fill-in" name="invoice_phone" value="'.$invoice_phone.'" style="width:195px">';
            echo '<input type="text" class="fill-in" name="invoice_email" value="'.$invoice_email.'" style="margin-left:10px; width:248px">';
        }
        echo "</div>";
        ?>
    </form>
</div>
<script>
const customerData = <?php echo json_encode($customerArray); ?>;
const inventoryData = <?php echo json_encode($inventoryArray); ?>;
</script>

<script src="./JS/InvoicePartQuantityValidation.js"></script>

<!-- <script> window.print();</script> -->
<!-- 
</body>
</html> -->