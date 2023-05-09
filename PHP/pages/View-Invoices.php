<div style="overflow-y: auto; overflow-x: auto">

<table class="table table-striped">
  <tr>
    <!-- <th>invoices_id</th> -->
    <th width="75px">Invoice</th>
    <th width="50px">Slip</th>
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
                echo '<a href="invoice.php?id='.$dbValuesOne['invoices_id'].'&pin='.$dbValuesOne['bill_zip'].'" target="_blank">'; 
                    echo '<img src="./icons/invoice.png" alt="Invoice" width="30" height="30">';
                echo '</a>';
            echo "</td>";

            // Link to Packaging Slip
            echo '<td class="tdCenter">';
                echo '<a href="slip.php?id='.$dbValuesOne['invoices_id'].'&pin='.$dbValuesOne['bill_zip'].'" target="_blank">'; 
                    echo '<img src="./icons/slip.png" alt="Invoice" width="30" height="30">';
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
?>

</table>
</div>