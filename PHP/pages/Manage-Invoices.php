<link href="./CSS/invoice-modify.css" rel="stylesheet">
<div style="overflow-y: auto; overflow-x: auto; width:100vw">
    <form class="needs-validation" novalidate  action='./index.php?page=View-Invoices' method="post">
        <input class="btn btn-primary btn-lg m-2" name="submit" type="submit" value ="Modify Invoice"></input>
        <div id="invoice">
            <img src="./images/blankInvoice.jpg" alt="Invoice">
        </div>

        <?php
        $id = htmlspecialchars($_GET["id"]);
        $pin = htmlspecialchars($_GET["pin"]);
        $noOfItems =  15;
        $invoicesSQL = "SELECT * FROM invoices WHERE invoices_id = '".$id."' AND bill_zip = '".$pin."'";
        $invoiceQuery = mysqli_query($conn, $invoicesSQL);
        foreach ($invoiceQuery as $invoice) {};
        
        echo '<div id="invoiceDateAndNo">';
            echo '<input type="date" class="fill-in" id="invoiceDate" name="invoiceDate" value="'.date('Y-m-d', strtotime($invoice['invoiceDate'])).'" style="width:82px; margin-right: 40px;" required>';
            echo $invoice['invoices_id'];
        echo "</div>";

        echo '<div id="billingAddress">';
            echo '<input type="text" class="fill-in" name="bill_business_name" value="'.$invoice['bill_business_name'].'" style="width:270px"><br>';
            echo '<input type="text" class="fill-in" name="bill_address" value="'.$invoice['bill_address'].'" style="width:270px"><br>';
            echo '<input type="text" class="fill-in" name="bill_city" value="'.$invoice['bill_city'].'" style="width:270px"><br>';
            echo '<input type="text" class="fill-in" name="bill_state" value="'.$invoice['bill_state'].'" style="width:135px">';
            echo '<input type="text" class="fill-in" name="bill_zip" value="'.$invoice['bill_zip'].'" style="width:135px">';
        echo "</div>";

        echo '<div id="shippingAddress">';
        ?><textarea class="fill-in" name="shipTo" rows="5" style="width:300px;resize:none"><?php
            echo $invoice['shipTo'] ? $invoice['shipTo'] : "SAME AS BILL TO";
        ?></textarea><?php
        echo "</div>";      

        echo '<div id="invoiceOptions">';
                echo '<input type="text" class="no-outline" name="invoices_id" value="'.$invoice['invoices_id'].'" style="text-align: center;width:91px" disabled>';
                echo '<input type="text" class="fill-in" name="terms" value="'.$invoice['terms'].'" style="width:108px">';
                echo '<input type="text" class="fill-in" name="rep" value="" style="width:78px">';
                echo '<input type="date" class="fill-in" id="shipDate" name="shipDate" value="'.date('Y-m-d', strtotime($invoice['shipDate'])).'" style="width:90px" required>';
                echo '<input type="text" class="fill-in" name="via" value="" style="width:90px">';
                echo '<input type="text" class="fill-in" name="fob" value="" style="width:132px">';
                echo '<input type="text" class="fill-in" name="project" value="" style="width:114px">';
        echo "</div>";


        echo '<div id="Items">';
            for ($i = 1; $i <= $noOfItems; $i++) {
                echo '<input type="text" class="fill-in" id="part'.$i.'Quantity" name="part'.$i.'Quantity" value="'.$invoice['part'.$i.'Quantity'].'"       style="width:85px">';
                echo '<input type="text" class="fill-in" id="part'.$i.'Item"    name="part'.$i.'Item"       value="'.$invoice['part'.$i.'Item'].'"          style="margin-left:10px; width:100px">';
                echo '<input type="text" class="fill-in" id="part'.$i.'ItemDesc" name="part'.$i.'ItemDesc"  value="'.$invoice['part'.$i.'ItemDesc'].'"      style="margin-left:10px; width:248px">';
                echo '<input type="text" class="fill-in" id="part'.$i.'SalesPrice" name="part'.$i.'SalesPrice" value="'.$invoice['part'.$i.'SalesPrice'].'" style="margin-left:10px; margin-right:20px; width:120px">';
                if ($invoice['part'.$i.'SalesPrice'] != 0) {
                    echo "$" . number_format((($invoice['part'.$i.'SalesPrice'] * $invoice['part'.$i.'Quantity'])),2) . "<br>";} else {echo "<br>";
                }
            }
        echo "</div>";

        echo '<div id="finalPrice">';
            echo "$" . number_format($invoice['finalPrice'], 2, '.', ',');
        echo "</div>";

        echo '<div id="phoneAndEmail">';
            echo '<input type="text" class="fill-in" name="invoice_phone" value="'.$invoice['invoice_phone'].'" style="width:195px">';
            echo '<input type="text" class="fill-in" name="invoice_email" value="'.$invoice['invoice_email'].'" style="margin-left:10px; width:248px">';
        echo "</div>";
        ?>
    </form>
</div>
<script src="./JS/InvoicePartQuantityValidation.js"></script>
<!-- <script> window.print();</script> -->
<!-- 
</body>
</html> -->