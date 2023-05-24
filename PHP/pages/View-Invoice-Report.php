<?php
$postedData = $_POST;
if($postedData['businessSelect'] && $postedData['invoiceYearSelect']){
    $invoicesSQL = "SELECT * FROM invoices WHERE bill_business_name = '".$postedData['businessSelect']."' AND invoiceDate LIKE '%".$postedData['invoiceYearSelect']."%' ORDER BY invoiceDate DESC";
console_log("both are selected");
} else if ($postedData['businessSelect']){
    $invoicesSQL = "SELECT * FROM invoices WHERE bill_business_name = '".$postedData['businessSelect']."' ORDER BY invoices_id DESC";
} else if ($postedData['invoiceYearSelect']){
    $invoicesSQL = "SELECT * FROM invoices WHERE invoiceDate LIKE '%".$postedData['invoiceYearSelect']."%' ORDER BY invoiceDate DESC";
    // "%".$value."%"
}else {
    $invoicesSQL = "SELECT * FROM invoices ORDER BY invoices_id DESC";
}

$invoicesQuery = mysqli_query($conn, $invoicesSQL);

foreach ($invoicesQuery as $invoices) {
    $invoicesArray[] = $invoices;
};

foreach ($invoicesQuery as $invoices) {
    $finalPriceArray[] = $invoices['finalPrice'];
};

foreach ($invoicesQuery as $invoices) {
    $finalCostArray[] = $invoices['finalCost'];
};

$businessNamesSQL = "SELECT * FROM invoices ORDER BY invoices_id DESC";
$businessNamesQuery = mysqli_query($conn, $businessNamesSQL);
foreach ($businessNamesQuery as $invoices) {
    $billToArray[] = $invoices['bill_business_name'];
};

$invoiceYearSQL = "SELECT * FROM invoices ORDER BY invoices_id DESC";
$invoiceYearQuery = mysqli_query($conn, $invoiceYearSQL);
foreach ($invoiceYearQuery as $invoices) {
    $invoiceYearArray[] = substr($invoices['invoiceDate'], 0, 4);
};

?>
<script>
const postedData = <?php echo json_encode($postedData); ?>;
console.log(postedData)

const invoicesData = <?php echo json_encode($invoiceYearArray); ?>;
console.log(invoicesData)

const finalPriceData = <?php echo json_encode(number_format(array_sum($finalPriceArray), 2, '.', '')); ?>;
console.log(finalPriceData)

// const billData = <?php echo json_encode(array_unique($billToArray)); ?>;
// console.log(billData)
</script>

<div style="overflow-y: auto; overflow-x: auto">

<table class="table table-striped">
  <tr>
    <!-- <th>invoices_id</th> -->
    <!-- <th width="75px">Invoice</th>
    <th width="50px">Slip</th>
    <th width="75px">Modify</th>
    <th width="60px">Email</th> -->
    <!-- <th width="75px">Modify</th> -->
    <!-- <th width="70px">Delete</th> -->
    <th width="80px">Inv No.</th>
    <th width="90px">PO No.</th>
    <th width="140px">
    <form action="./index.php?page=View-Invoice-Report" id="filteringForm" method="post">
        <select name="invoiceYearSelect" id="invoiceYearSelect">
            <option value="">Choose Year...</option>
            <?php
            rsort($invoiceYearArray);
                foreach (array_unique($invoiceYearArray) as $year) {
                    echo '<option value="';
                    echo $year;
                    echo '"';
                    if ($year == $postedData['invoiceYearSelect']){echo "selected";}
                    echo '>';
                    echo $year;
                    echo "</option>";
                }
            ?>
        </select>
    <!-- </form> -->
    </th>
    <!-- <th>shipTo</th> -->
    <th>Paid (Total: $<?php echo $finalPriceArray ? number_format(array_sum($finalPriceArray), 2, '.', '') : "0.00"; ?>)</th>
    <th>Cost (Total: $<?php echo $finalCostArray ? number_format(array_sum($finalCostArray), 2, '.', '') : "0.00"; ?>)</th>
    <th width="50px">Paid</th>

    <th>
    <!-- <form action="./index.php?page=View-Invoice-Report" id="businessSelectForm" method="post"> -->
        <select name="businessSelect" id="businessSelect">
            <option value="">Choose Business...</option>
            <?php
            sort($billToArray);
                foreach (array_unique($billToArray) as $businessName) {
                    echo '<option value="';
                    echo $businessName;
                    echo '"';
                    if ($businessName == $postedData['businessSelect']){echo "selected";}
                    echo '>';
                    echo $businessName;
                    echo "</option>";
                }
            ?>
        </select>
    </form>
    </th>
    <!-- <th>Created</th> -->
    <!-- <th>shipDate</th> -->
    <!-- <th>Part1 Item</th> -->
    <!-- <th>part1Quantity</th> -->
    <!-- <th>Part2 Item</th> -->
    <!-- <th>part2Quantity</th> -->
    <!-- <th>Part3 Item</th> -->
    <!-- <th>part3Quantity</th> -->

  </tr>

<?php
    foreach ($invoicesQuery as $dbValuesOne) {
        echo "<tr>";

            // Link to Invoice 
            // echo '<td class="tdCenter">';
            //     echo '<a href="invoice_pdf.php?id='.$dbValuesOne['invoices_id'].'&pin='.$dbValuesOne['bill_zip'].'" target="_blank">'; 
            //         echo '<img src="./icons/invoice.png" alt="Invoice" width="30" height="30">';
            //     echo '</a>';
            // echo "</td>";

            // Link to Slip
            // echo '<td class="tdCenter">';
            //     echo '<a href="slip_pdf.php?id='.$dbValuesOne['invoices_id'].'&pin='.$dbValuesOne['bill_zip'].'" target="_blank">'; 
            //         echo '<img src="./icons/slip.png" alt="Invoice" width="30" height="30">';
            //     echo '</a>';
            // echo "</td>";

            // Modify the invoice
            // echo '<td class="tdCenter">';
            //     echo '<a href="./index.php?page=Manage-Invoices&id='.$dbValuesOne['invoices_id'].'&pin='.$dbValuesOne['bill_zip'].'">'; 
            //         echo '<img src="./icons/modify.png" alt="Invoice" width="30" height="30">';
            //     echo '</a>';
            // echo "</td>";

            // Sending an invoice via email
            // echo '<td class="tdCenter">';
            //     echo '<a href="./index.php?page=Email-Invoices&id='.$dbValuesOne['invoices_id'].'">';
            //         echo '<img src="./icons/email.png" alt="Email" width="30" height="30">';
            //     echo '</a>';
            // echo "</td>";

            // Delete an Invoice
            // echo '<td class="tdCenter">';
            //     echo '<form action="./index.php?page=View-Invoices" method="post">';
            //         echo '<input class="deleteButton" type="submit" name="submit" value="Delete-invoices-'.$dbValuesOne['invoices_id'].'">';
            //     echo '</form>';
            // echo "</td>";

            // Delete an Invoice
            // echo '<td class="tdCenter">';
            //     echo '<a href="./index.php?page=Delete&id='.$dbValuesOne['invoices_id'].'&db=invoices">';
            //         echo '<img src="./icons/delete.png" alt="Delete" width="30" height="30">';
            //     echo '</a>';
            // echo "</td>";

            // Invoice NO
            echo '<td class="tdCenter">';
                print_r($dbValuesOne['invoices_id']);
            echo "</td>";

            // PO NO
            echo '<td>';
                print_r($dbValuesOne['po_no']);
            echo "</td>";

            // Invoice Date 
            echo "<td>";
                echo date('m/d/Y', strtotime($dbValuesOne['invoiceDate']));
            echo "</td>";

            // Total amount on bill
            echo "<td>$";
                print_r($dbValuesOne['finalPrice']);
            echo "</td>";

            // Total cost
            echo "<td>$";
                print_r($dbValuesOne['finalCost']);
            echo "</td>";

            // Payment Indicator
            echo '<td class="tdCenter">';
                if ($dbValuesOne['paid']) {
                    echo 'Yes';
                } else {
                    echo 'No';
                }
            echo "</td>";

            // Payment Indicator
            // echo '<td class="tdCenter">';
            //     echo '<input type="checkbox">';
            // echo "</td>";

            // Bill To 
            echo "<td>";
                print_r($dbValuesOne['bill_business_name']);
            echo "</td>";

            // Bill To 
            // echo "<td>";
            //     echo ucfirst($dbValuesOne['created']);
            // echo "</td>";

        echo "</tr>";
    }

    // echo "<pre>";
    //     print_r($_POST);
    // echo "</pre>";
?>

</table>
</div>
<script src="./JS/View-Invoice-Report.js"></script>