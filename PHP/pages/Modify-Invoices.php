<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./icons/favicon.ico">
    <link href="./CSS/invoice.css" rel="stylesheet">
    <title>L&M Hardware Invoice</title>
</head>
<body> -->
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
            echo '<div id="invoiceDate">';
                echo '<input type="date" class="no-outline" name="invoiceDate" value="'.date('Y-m-d', strtotime($dbValues['invoiceDate'])).'" style="width:82px" required>';
            echo "</div>";

            echo '<div id="invoiceNo">';
                echo $dbValues['invoices_id'];
            echo "</div>";

            echo '<div id="billingAddress">';
                echo '<input type="text" class="no-outline" name="bill_business_name" value="'.$dbValues['bill_business_name'].'" size="40">';
                echo "<br>";
                echo '<input type="text" class="no-outline" name="bill_address" value="'.$dbValues['bill_address'].'" size="40">';
                echo "<br>";
                echo '<input type="text" class="no-outline" name="bill_city" value="'.$dbValues['bill_city'].'" size="40">';
                echo "<br>";
                echo '<input type="text" class="no-outline" name="bill_state" value="'.$dbValues['bill_state'].'" size="17">';
                echo '<input type="text" class="no-outline" name="bill_zip" value="'.$dbValues['bill_zip'].'" size="17">';
            echo "</div>";

            echo '<div id="shippingAddress">';
            ?><textarea class="no-outline" name="shipTo" cols="48" rows="5" style="resize:none"><?php
                echo $dbValues['shipTo'] ? $dbValues['shipTo'] : "SAME AS BILL TO";
            ?></textarea><?php
            echo "</div>";            

            echo '<div id="poNo">';
                echo $dbValues['invoices_id'];
            echo "</div>";

            echo '<div id="terms">';
                echo '<input type="text" class="no-outline" name="terms" value="'.$dbValues['terms'].'" size="11">';
            echo "</div>";

            echo '<div id="rep">';
                echo '<input type="text" class="no-outline" name="rep" value="" size="6">';
            echo "</div>";

            echo '<div id="shipDate">';
                echo '<input type="date" class="no-outline" name="shipDate" value="'.date('Y-m-d', strtotime($dbValues['shipDate'])).'" style="width:82px" required>';
            echo "</div>";

            echo '<div id="via">';
                echo '<input type="text" class="no-outline" name="via" value="" size="8">';
            echo "</div>";

            echo '<div id="fob">';
                echo '<input type="text" class="no-outline" name="fob" value="" size="15">';
            echo "</div>";

            echo '<div id="project">';
                echo '<input type="text" class="no-outline" name="project" value="" size="12">';
            echo "</div>";


            echo '<div id="ItemQuantity">';
                for ($i = 1; $i <= $noOfItems; $i++) {
                    echo '<input type="text" class="no-outline" name="part'.$i.'Quantity" value="'.$dbValues['part'.$i.'Quantity'].'" size="8"><br>';
                }
            echo "</div>";

            echo '<div id="ItemCode">';
                for ($i = 1; $i <= $noOfItems; $i++) {
                    echo '<input type="text" class="no-outline" name="part'.$i.'Item" value="'.$dbValues['part'.$i.'Item'].'" size="11"><br>';
                }
            echo "</div>";

            echo '<div id="ItemDescription">';
                for ($i = 1; $i <= $noOfItems; $i++) {
                    echo '<input type="text" class="no-outline" name="part'.$i.'ItemDesc" value="'.$dbValues['part'.$i.'ItemDesc'].'" size="35"><br>';
                }
            echo "</div>";

            echo '<div id="ItemSalesPrice">';
                for ($i = 1; $i <= $noOfItems; $i++) {
                    echo '<input type="text" class="no-outline" name="part'.$i.'SalesPrice" value="'.$dbValues['part'.$i.'SalesPrice'].'" size="13"><br>';
                }
            echo "</div>";

            echo '<div id="finalAmount">';
                // number_format(($value/100),2)
                for ($i = 1; $i <= $noOfItems; $i++) {
                    if ($dbValues['part'.$i.'SalesPrice'] != 0) {echo "$" . number_format((($dbValues['part'.$i.'SalesPrice'] * $dbValues['part'.$i.'Quantity'])),2) . "<br>";} else {echo "<br>";}
                }
            echo "</div>";

            echo '<div id="finalPrice">';
                echo "$" . number_format($dbValues['finalPrice'], 2, '.', ',');
            echo "</div>";

            echo '<div id="InvoicePhone">';
                echo '<input type="text" class="no-outline" name="invoice_phone" value="'.$dbValues['invoice_phone'].'" size="11">';
            echo "</div>";

            echo '<div id="InvoiceEmail">';
                echo '<input type="text" class="no-outline" name="invoice_email" value="'.$dbValues['invoice_email'].'" size="11">';
            echo "</div>";
        }
        
        // Close connection
        // mysqli_close($conn);
        ?>
    </form>
</div>
<!-- <script> window.print();</script> -->
<!-- 
</body>
</html> -->