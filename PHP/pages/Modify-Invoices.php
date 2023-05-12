<link href="./CSS/invoice-modify.css" rel="stylesheet">
<div style="overflow-y: auto; overflow-x: auto; width:100vw">
<!-- <div class="container bg-secondary-subtle">
  <div class="d-flex justify-content-center text-center"> -->
    <form class="needs-validation" novalidate  action='./index.php?page=View-Invoices' method="post">
        <input class="btn btn-primary btn-lg m-2" name="submit" type="submit" value ="Modify Invoice"></input>

<!-- </div>
</div> -->
    <div id="invoice">
        <img src="./images/blankInvoice.jpg" alt="Invoice">
    </div>

        <?php
        // require_once "config.php";
        $id = htmlspecialchars($_GET["id"]);
        $pin = htmlspecialchars($_GET["pin"]);

        // SQL query
        $strSQL = "SELECT * FROM invoices WHERE invoices_id = '".$id."' AND bill_zip = '".$pin."'";

        // Execute the query
        $rs = mysqli_query($conn, $strSQL);

        $noOfItems =  15;

        foreach ($rs as $dbValues) {
            echo '<div id="invoiceDateAndNo">';
                    echo '<input type="date" class="no-outline" name="invoiceDate" value="'.date('Y-m-d', strtotime($dbValues['invoiceDate'])).'" style="width:82px; margin-right: 40px;" required>';
                    echo $dbValues['invoices_id'];
            echo "</div>";

            echo '<div id="billingAddress">';
                echo '<input type="text" class="no-outline" name="bill_business_name" value="'.$dbValues['bill_business_name'].'" style="width:270px"><br>';
                echo '<input type="text" class="no-outline" name="bill_address" value="'.$dbValues['bill_address'].'" style="width:270px"><br>';
                echo '<input type="text" class="no-outline" name="bill_city" value="'.$dbValues['bill_city'].'" style="width:270px"><br>';
                echo '<input type="text" class="no-outline" name="bill_state" value="'.$dbValues['bill_state'].'" style="width:135px">';
                echo '<input type="text" class="no-outline" name="bill_zip" value="'.$dbValues['bill_zip'].'" style="width:135px">';
            echo "</div>";

            echo '<div id="shippingAddress">';
            ?><textarea class="no-outline" name="shipTo" rows="5" style="width:300px;resize:none"><?php
                echo $dbValues['shipTo'] ? $dbValues['shipTo'] : "SAME AS BILL TO";
            ?></textarea><?php
            echo "</div>";      

            echo '<div id="invoiceOptions">';
                    echo '<span style="margin-left:90px;">'.$dbValues['invoices_id'].'</span>';
                    echo '<input type="text" class="no-outline" name="terms" value="'.$dbValues['terms'].'" style="margin-left:50px; width:106px">';
                    echo '<input type="text" class="no-outline" name="rep" value="" style="width:78px">';
                    echo '<input type="date" class="no-outline" name="shipDate" value="'.date('Y-m-d', strtotime($dbValues['shipDate'])).'" style="width:90px" required>';
                    echo '<input type="text" class="no-outline" name="via" value="" style="width:90px">';
                    echo '<input type="text" class="no-outline" name="fob" value="" style="width:132px">';
                    echo '<input type="text" class="no-outline" name="project" value="" style="width:114px">';
            echo "</div>";


            echo '<div id="Items">';
                for ($i = 1; $i <= $noOfItems; $i++) {
                    echo '<input type="text" class="no-outline" name="part'.$i.'Quantity" value="'.$dbValues['part'.$i.'Quantity'].'" style="width:85px">';
                    echo '<input type="text" class="no-outline" name="part'.$i.'Item" value="'.$dbValues['part'.$i.'Item'].'" style="margin-left:10px; width:100px">';
                    echo '<input type="text" class="no-outline" name="part'.$i.'ItemDesc" value="'.$dbValues['part'.$i.'ItemDesc'].'" style="margin-left:10px; width:248px">';
                    echo '<input type="text" class="no-outline" name="part'.$i.'SalesPrice" value="'.$dbValues['part'.$i.'SalesPrice'].'" style="margin-left:10px; margin-right:20px; width:120px">';
                    if ($dbValues['part'.$i.'SalesPrice'] != 0) {echo "$" . number_format((($dbValues['part'.$i.'SalesPrice'] * $dbValues['part'.$i.'Quantity'])),2) . "<br>";} else {echo "<br>";}
                }
            echo "</div>";

            echo '<div id="finalPrice">';
                echo "$" . number_format($dbValues['finalPrice'], 2, '.', ',');
            echo "</div>";

            echo '<div id="phoneAndEmail">';
                echo '<input type="text" class="no-outline" name="invoice_phone" value="'.$dbValues['invoice_phone'].'" style="width:195px">';
                echo '<input type="text" class="no-outline" name="invoice_email" value="'.$dbValues['invoice_email'].'" style="margin-left:10px; width:248px">';
            echo "</div>";
        }
        ?>
    </form>
</div>
<!-- <script> window.print();</script> -->
<!-- 
</body>
</html> -->