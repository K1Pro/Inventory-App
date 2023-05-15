<?php
$postedData = $_POST;
if($postedData['submit']){
    require("./PHP/components/invoicesSchema.php");
}

if ($postedData['submit'] == "Create Invoice") {
    // Performing insert query execution
    $insertInvoiceSQL = "INSERT INTO invoices VALUES (invoices_id, '$bill_id', '$bill_business_name', '$bill_first_name', '$bill_last_name', '$bill_address', '$bill_address2', '$bill_city', '$bill_state', '$bill_zip', '$bill_country', '$bill_phone', '$bill_fax', '$bill_email', '$shipTo', '$invoiceDate', '$shipDate', '$terms', '$rep', '$via', '$fob', '$project', '$part1ItemNo', '$part1Item', '$part1ItemDesc', '$part1Quantity', '$part1SalesPrice', '$part2ItemNo', '$part2Item', '$part2ItemDesc', '$part2Quantity', '$part2SalesPrice', '$part3ItemNo', '$part3Item', '$part3ItemDesc', '$part3Quantity', '$part3SalesPrice', '$part4ItemNo', '$part4Item', '$part4ItemDesc', '$part4Quantity', '$part4SalesPrice', '$part5ItemNo', '$part5Item', '$part5ItemDesc', '$part5Quantity', '$part5SalesPrice', '$part6ItemNo', '$part6Item', '$part6ItemDesc', '$part6Quantity', '$part6SalesPrice', '$part7ItemNo', '$part7Item', '$part7ItemDesc', '$part7Quantity', '$part7SalesPrice', '$part8ItemNo', '$part8Item', '$part8ItemDesc', '$part8Quantity', '$part8SalesPrice', '$part9ItemNo', '$part9Item', '$part9ItemDesc', '$part9Quantity', '$part9SalesPrice', '$part10ItemNo', '$part10Item', '$part10ItemDesc', '$part10Quantity', '$part10SalesPrice', '$part11ItemNo', '$part11Item', '$part11ItemDesc', '$part11Quantity', '$part11SalesPrice', '$part12ItemNo', '$part12Item', '$part12ItemDesc', '$part12Quantity', '$part12SalesPrice', '$part13ItemNo', '$part13Item', '$part13ItemDesc', '$part13Quantity', '$part13SalesPrice', '$part14ItemNo', '$part14Item', '$part14ItemDesc', '$part14Quantity', '$part14SalesPrice', '$part15ItemNo', '$part15Item', '$part15ItemDesc', '$part15Quantity', '$part15SalesPrice', '$finalPrice', '$invoice_phone', '$invoice_email', '$paid')";
    
    if(mysqli_query($conn, $insertInvoiceSQL)){
        ?><script>snackbar(`Successfully created invoice`);</script><?php  
    } else{
        ?><script>snackbar(`Error`);</script><?php  
        // echo "ERROR: Hush! Sorry $insertInvoiceSQL. "
        //     . mysqli_error($conn);
    }
 
} else if ($postedData['submit'] == "Modify Invoice"){
    ?><script>snackbar(`Successfully modified invoice`);</script><?php   
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
    <!-- <th width="50px">Slip</th> -->
    <th width="75px">Modify</th>
    <th width="60px">Email</th>
    <!-- <th width="75px">Modify</th> -->
    <th width="70px">Delete</th>
    <th width="125px">Invoice Date</th>
    <!-- <th>shipTo</th> -->
    <th width="110px">Total Paid</th>
    <th width="50px">Paid</th>
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
                echo '<a href="./index.php?page=Delete&id='.$dbValuesOne['invoices_id'].'&db=invoices">';
                    echo '<img src="./icons/delete.png" alt="Delete" width="30" height="30">';
                echo '</a>';
            echo "</td>";

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
                echo '<input type="checkbox">';
            echo "</td>";

            // Invoice NO
            echo '<td class="tdCenter">';
                print_r($dbValuesOne['invoices_id']);
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