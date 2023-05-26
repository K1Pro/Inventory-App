<?php
$postedData = $_POST;
$startDateSQL = "SELECT invoiceDate FROM invoices ORDER BY invoiceDate ASC LIMIT 1";
$startDateQuery = mysqli_query($conn, $startDateSQL);
foreach ($startDateQuery as $veryFirstDate) {};

$endDateSQL = "SELECT invoiceDate FROM invoices ORDER BY invoiceDate DESC LIMIT 1";
$endDateQuery = mysqli_query($conn, $endDateSQL);
foreach ($endDateQuery as $veryLastDate) {};

$defaultStartDate = $postedData['startDate'] ? $postedData['startDate'] : $veryFirstDate['invoiceDate'];
$defaultEndDate = $postedData['endDate'] ? $postedData['endDate'] : $veryLastDate['invoiceDate'];

if($postedData['bill_business_name'] || $postedData['startDate'] || $postedData['endDate']){
    $invoicesSQL = "SELECT * FROM invoices WHERE bill_business_name LIKE '%".$postedData['bill_business_name']."%' AND invoiceDate BETWEEN '".$defaultStartDate."' AND '".$defaultEndDate."' ORDER BY invoiceDate DESC";
} else {
    $invoicesSQL = "SELECT * FROM invoices ORDER BY invoices_id DESC";
}

$invoicesQuery = mysqli_query($conn, $invoicesSQL);

foreach ($invoicesQuery as $invoices) {$invoicesArray[] = $invoices;};
foreach ($invoicesQuery as $invoices) {$finalPriceArray[] = $invoices['finalPrice'];};
foreach ($invoicesQuery as $invoices) {$finalCostArray[] = $invoices['finalCost'];};

$bill_business_namesSQL = "SELECT * FROM invoices ORDER BY invoices_id DESC";
$bill_business_namesQuery = mysqli_query($conn, $bill_business_namesSQL);
foreach ($bill_business_namesQuery as $invoices) {
    $bill_business_nameArray[] = $invoices['bill_business_name'];
};

$invoiceDateSQL = "SELECT * FROM invoices ORDER BY invoices_id DESC";
$invoiceDateQuery = mysqli_query($conn, $invoiceDateSQL);
foreach ($invoiceDateQuery as $invoices) {
    $invoiceDateArray[] = $invoices['invoiceDate'];
};

?>
<script>
const postedData = <?php echo json_encode($postedData); ?>;
console.log(postedData)

const invoicesData = <?php echo json_encode($invoiceDateArray); ?>;
console.log(invoicesData)

const finalPriceData = <?php echo json_encode(number_format(array_sum($finalPriceArray), 2, '.', '')); ?>;
console.log(finalPriceData)

</script>

<div style="overflow-y: auto; overflow-x: auto">

<table class="table table-striped" id="invoiceReportTable">
  <tr>
    <th style="width:120px"><button type="button" class="btn btn-warning" onclick="exportData()">Download</button></th>
    <th style="width:90px; vertical-align:middle">PO No.</th>
    <th style="width:220px;vertical-align:middle">
    <form action="./index.php?page=View-Invoice-Report" id="filteringForm" method="post">
        <!-- <select name="invoiceDate" id="invoiceDate" data-bs-theme="dark">
            <option value="">Choose Year</option>
            <?php
            // rsort($invoiceDateArray);
            //     foreach (array_unique($invoiceDateArray) as $invoiceDate) {
            //         echo '<option value="';
            //         echo $invoiceDate;
            //         echo '"';
            //         if ($invoiceDate == $postedData['invoiceDate']){echo "selected";}
            //         echo '>';
            //         echo $invoiceDate;
            //         echo "</option>";
            //     }
            ?>
        </select> -->
        <input style="width:100px" type="date" name="startDate" id="startDate" value="<?php echo $defaultStartDate; ?>" data-bs-theme="dark">
        <input style="width:100px" type="date" name="endDate" id="endDate" value="<?php echo $defaultEndDate; ?>" data-bs-theme="dark">
    </th>
    <th style="vertical-align:middle">Paid ($<?php echo $finalPriceArray ? number_format(array_sum($finalPriceArray), 2, '.', '') : "0.00"; ?>)</th>
    <th style="vertical-align:middle">Cost ($<?php echo $finalCostArray ? number_format(array_sum($finalCostArray), 2, '.', '') : "0.00"; ?>)</th>
    <th style="vertical-align:middle">Freight ($)</th>
    <th style="width:50px; vertical-align:middle">Paid</th>

    <th style="vertical-align:middle">
    <!-- <form action="./index.php?page=View-Invoice-Report" id="bill_business_nameForm" method="post"> -->
        <select name="bill_business_name" id="bill_business_name" data-bs-theme="dark">
            <option value="">Choose Business</option>
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
  </tr>

<?php
    foreach ($invoicesQuery as $dbValuesOne) {
        echo "<tr>";

            // Invoice NO
            echo '<td class="tdCenter">';
                print_r($dbValuesOne['invoices_id']);
            echo "</td>";

            // PO NO
            echo '<td>';
                print_r($dbValuesOne['po_no']);
            echo "</td>";

            // Invoice Date 
            echo '<td class="tdCenter">';
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

            // Total freight
            echo "<td>$";
                // print_r($dbValuesOne['finalCost']);
            echo "</td>";

            // Payment Indicator
            echo '<td class="tdCenter">';
                if ($dbValuesOne['paid']) {
                    echo 'Yes';
                } else {
                    echo 'No';
                }
            echo "</td>";

            // Bill To 
            echo "<td>";
                print_r($dbValuesOne['bill_business_name']);
            echo "</td>";

        echo "</tr>";
    }
?>

</table>
</div>
<script src="./JS/View-Invoice-Report.js"></script>