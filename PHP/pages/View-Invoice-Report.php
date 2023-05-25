<?php
$postedData = $_POST;

$mySQLquery = http_build_query($postedData, "", "%' AND ");
$mySQLquery = str_replace("%26", "&", $mySQLquery);
$mySQLquery = str_replace("+", " ", $mySQLquery);
$mySQLquery = str_replace("=", " LIKE '%", $mySQLquery);

if($postedData['bill_business_name'] || $postedData['invoiceDate']){
    $invoicesSQL = "SELECT * FROM invoices WHERE ".$mySQLquery."%' ORDER BY invoiceDate DESC";
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

$bill_business_namesSQL = "SELECT * FROM invoices ORDER BY invoices_id DESC";
$bill_business_namesQuery = mysqli_query($conn, $bill_business_namesSQL);
foreach ($bill_business_namesQuery as $invoices) {
    $bill_business_nameArray[] = $invoices['bill_business_name'];
};

$invoiceDateSQL = "SELECT * FROM invoices ORDER BY invoices_id DESC";
$invoiceDateQuery = mysqli_query($conn, $invoiceDateSQL);
foreach ($invoiceDateQuery as $invoices) {
    $invoiceDateArray[] = substr($invoices['invoiceDate'], 0, 4);
};

?>
<script>
const postedData = <?php echo json_encode($postedData); ?>;
console.log(postedData)

const invoicesData = <?php echo json_encode($invoiceDateArray); ?>;
console.log(invoicesData)

const finalPriceData = <?php echo json_encode(number_format(array_sum($finalPriceArray), 2, '.', '')); ?>;
console.log(finalPriceData)

// const billData = <?php echo json_encode(array_unique($bill_business_nameArray)); ?>;
// console.log(billData)
</script>

<div style="overflow-y: auto; overflow-x: auto">

<table class="table table-striped" id="invoiceReportTable">
  <tr>
    <!-- <th>invoices_id</th> -->
    <!-- <th width="75px">Invoice</th>
    <th width="50px">Slip</th>
    <th width="75px">Modify</th>
    <th width="60px">Email</th> -->
    <!-- <th width="75px">Modify</th> -->
    <!-- <th width="70px">Delete</th> -->
    <th style="width:110px"><button onclick="exportData()">Download</button></th>
    <th style="width:90px">PO No.</th>
    <th style="width:140px">
    <form action="./index.php?page=View-Invoice-Report" id="filteringForm" method="post">
        <select name="invoiceDate" id="invoiceDate" data-bs-theme="dark">
            <option value="">Choose Year...</option>
            <?php
            rsort($invoiceDateArray);
                foreach (array_unique($invoiceDateArray) as $invoiceDate) {
                    echo '<option value="';
                    echo $invoiceDate;
                    echo '"';
                    if ($invoiceDate == $postedData['invoiceDate']){echo "selected";}
                    echo '>';
                    echo $invoiceDate;
                    echo "</option>";
                }
            ?>
        </select>
    <!-- </form> -->
    </th>
    <!-- <th>shipTo</th> -->
    <th>Paid (Total: $<?php echo $finalPriceArray ? number_format(array_sum($finalPriceArray), 2, '.', '') : "0.00"; ?>)</th>
    <th>Cost (Total: $<?php echo $finalCostArray ? number_format(array_sum($finalCostArray), 2, '.', '') : "0.00"; ?>)</th>
    <th style="width:50px">Paid</th>

    <th>
    <!-- <form action="./index.php?page=View-Invoice-Report" id="bill_business_nameForm" method="post"> -->
        <select name="bill_business_name" id="bill_business_name" data-bs-theme="dark">
            <option value="">Choose Business...</option>
            <?php
            sort($bill_business_nameArray);
                foreach (array_unique($bill_business_nameArray) as $bill_business_name) {
                    echo '<option value="';
                    echo $bill_business_name;
                    echo '"';
                    if ($bill_business_name == $postedData['bill_business_name']){echo "selected";}
                    echo '>';
                    echo $bill_business_name;
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
<script>
function exportData(){
    const event = new Date();
    const fileNameDate = event.toISOString().slice(0,19).replaceAll(":", "-");
    /* Get the HTML data using Element by Id */
    let table = document.getElementById("invoiceReportTable");
 
    /* Declaring array variable */
    let rows =[];
 
      //iterate through rows of table
    for(let i=1,row; row = table.rows[i];i++){
        //rows would be accessed using the "row" variable assigned in the for loop
        //Get each cell value/column from the row
        column1 = row.cells[0].innerText;
        column2 = row.cells[1].innerText;
        column3 = row.cells[2].innerText;
        column4 = row.cells[3].innerText;
        column5 = row.cells[4].innerText;
        column6 = row.cells[5].innerText;
        column7 = row.cells[6].innerText;
 
    /* add a new records in the array */
        rows.push(
            [
                column1,
                column2,
                column3,
                column4,
                column5,
                column6,
                column7
            ]
        );

        }
        csvContent = "data:text/csv;charset=utf-8,";
         /* add the column delimiter as comma(,) and each row splitted by new line character (\n) */
        rows.forEach(function(rowArray){
            row = rowArray.join(",");
            csvContent += row + "\r\n";
        });

        /* create a hidden <a> DOM node and set its download attribute */
        let encodedUri = encodeURI(csvContent);
        let link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute(`download`, `${fileNameDate}-InvoiceReport.csv`);
        document.body.appendChild(link);
         /* download the data file named "InvoiceReport.csv" */
        link.click();
}
</script>