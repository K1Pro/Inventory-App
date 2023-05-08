<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./icons/favicon.ico">
    <link href="./CSS/slip.css" rel="stylesheet">
    <title>L&M Hardware Invoice</title>
</head>
<body>
    <div id="invoice">
        <img src="./images/blankSlip.jpg" alt="Invoice">
    </div>
        <?php
        require_once "config.php";

        $id = htmlspecialchars($_GET["id"]);
        $pin = htmlspecialchars($_GET["pin"]);

        // SQL query
        $strSQL = "SELECT * FROM invoices WHERE invoices_id = '".$id."' AND bill_zip = '".$pin."'";

        // Execute the query
        $rs = mysqli_query($conn, $strSQL);

        
        foreach ($rs as $dbValues) {
            // print_r($dbValues['invoices_id']);
            // echo "<br>";
            echo '<div id="invoiceDate">';
                echo date('m/d/Y', strtotime($dbValues['invoiceDate']));
            echo "</div>";

            echo '<div id="invoiceNo">';
                echo $dbValues['invoices_id'];
            echo "</div>";

            echo '<div id="billingAddress">';
                echo $dbValues['bill_business_name'];
                echo "<br>";
                echo $dbValues['bill_address'];
                echo "<br>";
                echo $dbValues['bill_city'];
                echo ", ";
                echo $dbValues['bill_state'];
                echo " ";
                echo $dbValues['bill_zip'];
            echo "</div>";

            echo "<pre>";
                echo '<div id="shippingAddress">';
                    if ($dbValues['shipTo']) {
                        echo $dbValues['shipTo'];
                    } else {
                        echo "SAME AS BILL TO";
                    }
                echo "</div>";
            echo "</pre>";

            echo '<div id="poNo">';
                echo $dbValues['invoices_id'];
            echo "</div>";

            echo '<div id="shipDate">';
                echo date('m/d/Y', strtotime($dbValues['shipDate']));
            echo "</div>";

            echo '<div id="ItemQuantity">';
                if ($dbValues['part1Quantity']) {echo $dbValues['part1Quantity'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part2Quantity']) {echo $dbValues['part2Quantity'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part3Quantity']) {echo $dbValues['part3Quantity'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part4Quantity']) {echo $dbValues['part4Quantity'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part5Quantity']) {echo $dbValues['part5Quantity'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part6Quantity']) {echo $dbValues['part6Quantity'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part7Quantity']) {echo $dbValues['part7Quantity'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part8Quantity']) {echo $dbValues['part8Quantity'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part9Quantity']) {echo $dbValues['part9Quantity'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part10Quantity']) {echo $dbValues['part10Quantity'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part11Quantity']) {echo $dbValues['part11Quantity'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part12Quantity']) {echo $dbValues['part12Quantity'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part13Quantity']) {echo $dbValues['part13Quantity'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part14Quantity']) {echo $dbValues['part14Quantity'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part15Quantity']) {echo $dbValues['part15Quantity'] . "<br>";} else {echo "<br>";}
            echo "</div>";

            echo '<div id="ItemCode">';
                if ($dbValues['part1Item']) {echo $dbValues['part1Item'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part2Item']) {echo $dbValues['part2Item'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part3Item']) {echo $dbValues['part3Item'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part4Item']) {echo $dbValues['part4Item'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part5Item']) {echo $dbValues['part5Item'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part6Item']) {echo $dbValues['part6Item'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part7Item']) {echo $dbValues['part7Item'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part8Item']) {echo $dbValues['part8Item'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part9Item']) {echo $dbValues['part9Item'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part10Item']) {echo $dbValues['part10Item'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part11Item']) {echo $dbValues['part11Item'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part12Item']) {echo $dbValues['part12Item'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part13Item']) {echo $dbValues['part13Item'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part14Item']) {echo $dbValues['part14Item'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part15Item']) {echo $dbValues['part15Item'] . "<br>";} else {echo "<br>";}
            echo "</div>";

            echo '<div id="ItemDescription">';
                if ($dbValues['part1ItemDesc']) {echo $dbValues['part1ItemDesc'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part2ItemDesc']) {echo $dbValues['part2ItemDesc'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part3ItemDesc']) {echo $dbValues['part3ItemDesc'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part4ItemDesc']) {echo $dbValues['part4ItemDesc'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part5ItemDesc']) {echo $dbValues['part5ItemDesc'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part6ItemDesc']) {echo $dbValues['part6ItemDesc'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part7ItemDesc']) {echo $dbValues['part7ItemDesc'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part8ItemDesc']) {echo $dbValues['part8ItemDesc'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part9ItemDesc']) {echo $dbValues['part9ItemDesc'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part10ItemDesc']) {echo $dbValues['part10ItemDesc'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part11ItemDesc']) {echo $dbValues['part11ItemDesc'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part12ItemDesc']) {echo $dbValues['part12ItemDesc'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part13ItemDesc']) {echo $dbValues['part13ItemDesc'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part14ItemDesc']) {echo $dbValues['part14ItemDesc'] . "<br>";} else {echo "<br>";}
                if ($dbValues['part15ItemDesc']) {echo $dbValues['part15ItemDesc'] . "<br>";} else {echo "<br>";}
            echo "</div>";

            echo '<div id="InvoicePhone">';
                if ($dbValues['invoice_phone']) echo $dbValues['invoice_phone'] . "<br>";
            echo "</div>";

            echo '<div id="InvoiceEmail">';
                if ($dbValues['invoice_email']) echo $dbValues['invoice_email'] . "<br>";
            echo "</div>";


            // $customersSQL = "SELECT * FROM customers WHERE customers_id = '".$dbValues['billTo']."'";
            // $customers = mysqli_query($conn, $customersSQL);
            // foreach ($customers as $dbValuesTwo) {
            //     echo '<div id="billingAddress">';
            //         print_r($dbValuesTwo['business_name']);
            //         echo "<br>";
            //         print_r($dbValuesTwo['address']);
            //         echo "<br>";
            //         print_r($dbValuesTwo['city']);
            //         echo ", ";
            //         print_r($dbValuesTwo['state']);
            //         echo " ";
            //         print_r($dbValuesTwo['zip']);
            //     echo "</div>";
            // }


            // $inventorySQL = "SELECT * FROM inventory WHERE inventory_id = '".$dbValues['part1Item']."'";
            // $inventory = mysqli_query($conn, $inventorySQL);
            // foreach ($inventory as $dbValuesThree) {
            //         print_r($dbValuesThree['itemName']);
            // }

            // echo "<br>";
        }
        
        // Close connection
        mysqli_close($conn);
        ?>

<!-- <script> window.print();</script> -->

</body>
</html>