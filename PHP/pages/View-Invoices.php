<?php
$postedData = $_POST;
if($postedData['submit']){}

if ($postedData['submit'] == "Create Invoice") {
    require("./PHP/components/invoiceSchema-create.php");
    for ($i = 1; $i <= 15; $i++) {
        console_log(${"part".$i."ItemDesc"});
        if ($postedData['part'.$i.'ItemNo']) {
            if (${"part".$i."ItemDesc"} == "Freight - Van Delivery") {}
            else if(${"part".$i."ItemDesc"} == "Freight - UPS") {}
            else if(${"part".$i."ItemDesc"} == "Sales Tax") {}
            else if(${"part".$i."ItemDesc"} == "3% TARIFF") {}
            else if(${"part".$i."ItemDesc"} == "Web Design") {}
            else if(${"part".$i."ItemDesc"} == "Misc") {}
            else {
                // echo $postedData['part'.$i.'ItemNo'];
                $inventoryUpdateSQL = "UPDATE inventory SET quantityOnHand = quantityOnHand - ".$postedData['part'.$i.'Quantity']." WHERE inventory_id = ".$postedData['part'.$i.'ItemNo'];
                mysqli_query($conn, $inventoryUpdateSQL);
            }
        }
    }
    $insertInvoiceSQL = "INSERT INTO invoices VALUES (invoices_id, '$bill_id', '$bill_business_name', '$bill_first_name', '$bill_last_name', '$bill_address', '$bill_address2', '$bill_city', '$bill_state', '$bill_zip', '$bill_country', '$bill_phone', '$bill_fax', '$bill_email', '$shipTo', '$invoiceDate', '$shipDate', '$po_no', '$terms', '$rep', '$via', '$fob', '$project', '$part1ItemNo', '$part1Item', '$part1ItemDesc', '$part1Quantity', '$part1SalesPrice', '$part2ItemNo', '$part2Item', '$part2ItemDesc', '$part2Quantity', '$part2SalesPrice', '$part3ItemNo', '$part3Item', '$part3ItemDesc', '$part3Quantity', '$part3SalesPrice', '$part4ItemNo', '$part4Item', '$part4ItemDesc', '$part4Quantity', '$part4SalesPrice', '$part5ItemNo', '$part5Item', '$part5ItemDesc', '$part5Quantity', '$part5SalesPrice', '$part6ItemNo', '$part6Item', '$part6ItemDesc', '$part6Quantity', '$part6SalesPrice', '$part7ItemNo', '$part7Item', '$part7ItemDesc', '$part7Quantity', '$part7SalesPrice', '$part8ItemNo', '$part8Item', '$part8ItemDesc', '$part8Quantity', '$part8SalesPrice', '$part9ItemNo', '$part9Item', '$part9ItemDesc', '$part9Quantity', '$part9SalesPrice', '$part10ItemNo', '$part10Item', '$part10ItemDesc', '$part10Quantity', '$part10SalesPrice', '$part11ItemNo', '$part11Item', '$part11ItemDesc', '$part11Quantity', '$part11SalesPrice', '$part12ItemNo', '$part12Item', '$part12ItemDesc', '$part12Quantity', '$part12SalesPrice', '$part13ItemNo', '$part13Item', '$part13ItemDesc', '$part13Quantity', '$part13SalesPrice', '$part14ItemNo', '$part14Item', '$part14ItemDesc', '$part14Quantity', '$part14SalesPrice', '$part15ItemNo', '$part15Item', '$part15ItemDesc', '$part15Quantity', '$part15SalesPrice', '$finalPrice', '$invoice_phone', '$invoice_email', '$paid')";
    if(mysqli_query($conn, $insertInvoiceSQL)){
        ?>
        <script>snackbar(`Successfully created invoice`);</script>
        <?php  
    } else{
        ?>
        <script>snackbar(`Error`);</script>
        <?php  
    }
} else if ($postedData['submit'] == "Modify Invoice") {
    require("./PHP/components/invoiceSchema-modify.php");
    $updateInvoiceSQL = "UPDATE invoices SET bill_business_name = '".$bill_business_name."', bill_address = '".$bill_address."', bill_address2 = '".$bill_address2."', bill_city = '".$bill_city."', bill_state = '".$bill_state."', bill_zip = '".$bill_zip."', shipTo = '".$shipTo."', invoiceDate = '".$invoiceDate."', shipDate = '".$shipDate."', po_no = '".$po_no."', terms = '".$terms."', rep = '".$rep."', via = '".$via."', fob = '".$fob."', project = '".$project."', part1ItemNo = '".$part1ItemNo."', part1Item = '".$part1Item."', part1ItemDesc = '".$part1ItemDesc."', part1Quantity = '".$part1Quantity."', part1SalesPrice = '".$part1SalesPrice."', part2ItemNo = '".$part2ItemNo."', part2Item = '".$part2Item."', part2ItemDesc = '".$part2ItemDesc."', part2Quantity = '".$part2Quantity."', part2SalesPrice = '".$part2SalesPrice."', part3ItemNo = '".$part3ItemNo."', part3Item = '".$part3Item."', part3ItemDesc = '".$part3ItemDesc."', part3Quantity = '".$part3Quantity."', part3SalesPrice = '".$part3SalesPrice."', part4ItemNo = '".$part4ItemNo."', part4Item = '".$part4Item."', part4ItemDesc = '".$part4ItemDesc."', part4Quantity = '".$part4Quantity."', part4SalesPrice = '".$part4SalesPrice."', part5ItemNo = '".$part5ItemNo."', part5Item = '".$part5Item."', part5ItemDesc = '".$part5ItemDesc."', part5Quantity = '".$part5Quantity."', part5SalesPrice = '".$part5SalesPrice."', part6ItemNo = '".$part6ItemNo."', part6Item = '".$part6Item."', part6ItemDesc = '".$part6ItemDesc."', part6Quantity = '".$part6Quantity."', part6SalesPrice = '".$part6SalesPrice."', part7ItemNo = '".$part7ItemNo."', part7Item = '".$part7Item."', part7ItemDesc = '".$part7ItemDesc."', part7Quantity = '".$part7Quantity."', part7SalesPrice = '".$part7SalesPrice."', part8ItemNo = '".$part8ItemNo."', part8Item = '".$part8Item."', part8ItemDesc = '".$part8ItemDesc."', part8Quantity = '".$part8Quantity."', part8SalesPrice = '".$part8SalesPrice."', part9ItemNo = '".$part9ItemNo."', part9Item = '".$part9Item."', part9ItemDesc = '".$part9ItemDesc."', part9Quantity = '".$part9Quantity."', part9SalesPrice = '".$part9SalesPrice."', part10ItemNo = '".$part10ItemNo."', part10Item = '".$part10Item."', part10ItemDesc = '".$part10ItemDesc."', part10Quantity = '".$part10Quantity."', part10SalesPrice = '".$part10SalesPrice."', part11ItemNo = '".$part11ItemNo."', part11Item = '".$part11Item."', part11ItemDesc = '".$part11ItemDesc."', part11Quantity = '".$part11Quantity."', part11SalesPrice = '".$part11SalesPrice."', part12ItemNo = '".$part12ItemNo."', part12Item = '".$part12Item."', part12ItemDesc = '".$part12ItemDesc."', part12Quantity = '".$part12Quantity."', part12SalesPrice = '".$part12SalesPrice."', part13ItemNo = '".$part13ItemNo."', part13Item = '".$part13Item."', part13ItemDesc = '".$part13ItemDesc."', part13Quantity = '".$part13Quantity."', part13SalesPrice = '".$part13SalesPrice."', part14ItemNo = '".$part14ItemNo."', part14Item = '".$part14Item."', part14ItemDesc = '".$part14ItemDesc."', part14Quantity = '".$part14Quantity."', part14SalesPrice = '".$part14SalesPrice."', part15ItemNo = '".$part15ItemNo."', part15Item = '".$part15Item."', part15ItemDesc = '".$part15ItemDesc."', part15Quantity = '".$part15Quantity."', part15SalesPrice = '".$part15SalesPrice."', finalPrice = '".$finalPrice."', invoice_phone = '".$invoice_phone."', invoice_email = '".$invoice_email."' WHERE invoices_id = ".$postedData['invoices_id'];
    if(mysqli_query($conn, $updateInvoiceSQL)){
        ?><script>snackbar(`Successfully modified invoice`);</script><?php
    } else{
        ?><script>snackbar(`Error`);</script><?php  
    }
} else if($postedData['submit']=='Email Invoice'){
    ?><script>snackbar(`Successfully emailed invoice`);</script><?php
} else if(strpos($postedData['submit'], 'Delete') !== false){
    $parts = explode('-', $postedData['submit']);
    $deleteDB = $parts[1];
    $deleteValue = $parts[2];
    require("./PHP/components/delete.php");
} else if(strpos($postedData['submit'], 'Paid') !== false){
    $paid = explode('-', $postedData['submit']);
    if ($paid[3] ==0) { $invoicesSQL = "UPDATE invoices SET paid = 1 WHERE invoices_id = ".$paid[2];
    } else {            $invoicesSQL = "UPDATE invoices SET paid = 0 WHERE invoices_id = ".$paid[2];}
    if(mysqli_query($conn, $invoicesSQL)){
        ?><script>snackbar(`Payment status updated`);</script><?php   
    } else{
        ?><script>snackbar(`Error`);</script><?php   
    }
}

?>
<script>
const postedData = <?php echo json_encode($postedData); ?>;
console.log(postedData)
</script>

<div style="overflow-y: auto; overflow-x: auto">

<table class="table table-striped">
  <tr>
    <!-- <th>invoices_id</th> -->
    <th width="75px">Invoice</th>
    <th width="50px">Slip</th>
    <th width="75px">Modify</th>
    <th width="60px">Email</th>
    <!-- <th width="75px">Modify</th> -->
    <th width="70px">Delete</th>
    <th width="125px">Invoice Date</th>
    <!-- <th>shipTo</th> -->
    <th width="110px">Total Paid</th>
    <th width="50px">Paid</th>
    <th width="80px">Inv No.</th>
    <th width="70px">PO No.</th>
    <th>Bill To</th>
    <!-- <th>shipDate</th> -->
    <!-- <th>Part1 Item</th> -->
    <!-- <th>part1Quantity</th> -->
    <!-- <th>Part2 Item</th> -->
    <!-- <th>part2Quantity</th> -->
    <!-- <th>Part3 Item</th> -->
    <!-- <th>part3Quantity</th> -->

  </tr>

<?php
    // SQL query
    $strSQL = "SELECT * FROM invoices ORDER BY invoices_id DESC";
    
    // Execute the query
    $rs = mysqli_query($conn, $strSQL);
    // print_r($rs);
    // echo "<br>";


    foreach ($rs as $dbValuesOne) {
        echo "<tr>";

            // Link to Invoice 
            echo '<td class="tdCenter">';
                echo '<a href="invoice_pdf.php?id='.$dbValuesOne['invoices_id'].'&pin='.$dbValuesOne['bill_zip'].'" target="_blank">'; 
                    echo '<img src="./icons/invoice.png" alt="Invoice" width="30" height="30">';
                echo '</a>';
            echo "</td>";

            // Link to Slip
            echo '<td class="tdCenter">';
                echo '<a href="slip_pdf.php?id='.$dbValuesOne['invoices_id'].'&pin='.$dbValuesOne['bill_zip'].'" target="_blank">'; 
                    echo '<img src="./icons/slip.png" alt="Invoice" width="30" height="30">';
                echo '</a>';
            echo "</td>";

            // Link to Packaging Slip
            echo '<td class="tdCenter">';
                echo '<a href="./index.php?page=Manage-Invoices&id='.$dbValuesOne['invoices_id'].'&pin='.$dbValuesOne['bill_zip'].'">'; 
                    echo '<img src="./icons/modify.png" alt="Invoice" width="30" height="30">';
                echo '</a>';
            echo "</td>";

            // Sending an invoice via email
            echo '<td class="tdCenter">';
                echo '<a href="./index.php?page=Email-Invoices&id='.$dbValuesOne['invoices_id'].'">';
                    echo '<img src="./icons/email.png" alt="Email" width="30" height="30">';
                echo '</a>';
            echo "</td>";

            // Delete an Invoice
            echo '<td class="tdCenter">';
                echo '<form action="./index.php?page=View-Invoices" method="post">';
                    echo '<input class="deleteButton" type="submit" name="submit" value="Delete-invoices-'.$dbValuesOne['invoices_id'].'">';
                echo '</form>';
            echo "</td>";

            // Delete an Invoice
            // echo '<td class="tdCenter">';
            //     echo '<a href="./index.php?page=Delete&id='.$dbValuesOne['invoices_id'].'&db=invoices">';
            //         echo '<img src="./icons/delete.png" alt="Delete" width="30" height="30">';
            //     echo '</a>';
            // echo "</td>";

            // Invoice Date 
            echo "<td>";
                print_r($dbValuesOne['invoiceDate']);
            echo "</td>";

            // Total amount on bill
            echo "<td>$";
                print_r($dbValuesOne['finalPrice']);
            echo "</td>";

            // Payment Indicator
            echo '<td class="tdCenter">';
                echo '<form action="./index.php?page=View-Invoices" method="post">';
                if ($dbValuesOne['paid']) {
                    echo '<input class="checked" type="submit" name="submit" value="Paid-invoices-'.$dbValuesOne['invoices_id'].'-'.$dbValuesOne['paid'].'">';
                } else {
                    echo '<input class="unchecked" type="submit" name="submit" value="Paid-invoices-'.$dbValuesOne['invoices_id'].'-'.$dbValuesOne['paid'].'">';
                }
                echo '</form>';
            echo "</td>";

            // Payment Indicator
            // echo '<td class="tdCenter">';
            //     echo '<input type="checkbox">';
            // echo "</td>";

            // Invoice NO
            echo '<td class="tdCenter">';
                print_r($dbValuesOne['invoices_id']);
            echo "</td>";

            // PO NO
            echo '<td class="tdCenter">';
                print_r($dbValuesOne['po_no']);
            echo "</td>";

            // Bill To 
            echo "<td>";
                print_r($dbValuesOne['bill_business_name']);
            echo "</td>";

        echo "</tr>";
    }

    // echo "<pre>";
    //     print_r($_POST);
    // echo "</pre>";
?>

</table>
</div>