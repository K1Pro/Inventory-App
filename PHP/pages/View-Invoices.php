<?php
$postedData = $_POST;
if($postedData['submit']){}
$page = htmlspecialchars($_GET["page"]);
$chosenDB = strtolower(explode('-', $page)[1]);
console_log("Chosen DB:" . $chosenDB);
$invoicesSQL = "SELECT * FROM ".$chosenDB." ORDER BY invoices_id DESC";

if (explode(' ', $postedData['submit'])[0] == "Create") {
    require("./PHP/components/schemaInvoice-create.php");
    for ($i = 1; $i <= 15; $i++) {
        $usersSQL = "SELECT username FROM users WHERE users_id = '".$_SESSION["users_id"]."'";
        $usersQuery = mysqli_query($conn, $usersSQL);
        foreach ($usersQuery as $usersValues) {
          $invoice_created_by = $usersValues['username'];
        }
        if (explode(' ', $postedData['submit'])[1] == "Invoice") {
            if ($postedData['part'.$i.'ItemNo']) {
                if (${"part".$i."ItemNo"} == "305") {console_log("Freight Van Detected");}
                else if(${"part".$i."ItemNo"} == "306") {console_log("Freight UPS Detected");}
                else if(${"part".$i."ItemNo"} == "307") {console_log("Tax Detected");}
                else if(${"part".$i."ItemNo"} == "308") {console_log("Tariff Detected");}
                else if(${"part".$i."ItemNo"} == "313") {console_log("Design Detected");}
                else if(${"part".$i."ItemNo"} == "315") {console_log("Misc Detected");}
                // if (strpos(strtolower(${"part".$i."ItemDesc"}), "freight") !== false) {console_log("Freight Detected");}
                // else if(strpos(strtolower(${"part".$i."ItemDesc"}),"tax") !== false) {console_log("Tax Detected");}
                // else if(strpos(strtolower(${"part".$i."ItemDesc"}), "tariff") !== false) {console_log("Tariff Detected");}
                // else if(strpos(strtolower(${"part".$i."ItemDesc"}), "design") !== false) {console_log("Design Detected");}
                // else if(strpos(strtolower(${"part".$i."ItemDesc"}), "misc") !== false) {console_log("Misc Detected");}
                else {
                    // echo $postedData['part'.$i.'ItemNo'];
                    $inventoryUpdateSQL = "UPDATE inventory SET quantityOnHand = quantityOnHand - ".$postedData['part'.$i.'Quantity']." WHERE inventory_id = ".$postedData['part'.$i.'ItemNo'];
                    mysqli_query($conn, $inventoryUpdateSQL);
                }
            }
        }
    }
    $insertInvoiceSQL = "INSERT INTO ".strtolower(explode(' ', $postedData['submit'])[1])."s VALUES (invoices_id, '$bill_id', '$bill_business_name', '$bill_first_name', '$bill_last_name', '$bill_address', '$bill_address2', '$bill_city', '$bill_state', '$bill_zip', '$bill_country', '$bill_phone', '$bill_fax', '$bill_email', '$shipTo', '$invoiceDate', '$shipDate', '$po_no', '$terms', '$rep', '$via', '$fob', '$project', '$part1ItemNo', '$part1Item', '$part1ItemDesc', '$part1Quantity', '$part1SalesPrice', '$part1Cost', '$part2ItemNo', '$part2Item', '$part2ItemDesc', '$part2Quantity', '$part2SalesPrice', '$part2Cost', '$part3ItemNo', '$part3Item', '$part3ItemDesc', '$part3Quantity', '$part3SalesPrice', '$part3Cost', '$part4ItemNo', '$part4Item', '$part4ItemDesc', '$part4Quantity', '$part4SalesPrice', '$part4Cost', '$part5ItemNo', '$part5Item', '$part5ItemDesc', '$part5Quantity', '$part5SalesPrice', '$part5Cost', '$part6ItemNo', '$part6Item', '$part6ItemDesc', '$part6Quantity', '$part6SalesPrice', '$part6Cost', '$part7ItemNo', '$part7Item', '$part7ItemDesc', '$part7Quantity', '$part7SalesPrice', '$part7Cost', '$part8ItemNo', '$part8Item', '$part8ItemDesc', '$part8Quantity', '$part8SalesPrice', '$part8Cost', '$part9ItemNo', '$part9Item', '$part9ItemDesc', '$part9Quantity', '$part9SalesPrice', '$part9Cost', '$part10ItemNo', '$part10Item', '$part10ItemDesc', '$part10Quantity', '$part10SalesPrice', '$part10Cost', '$part11ItemNo', '$part11Item', '$part11ItemDesc', '$part11Quantity', '$part11SalesPrice', '$part11Cost', '$part12ItemNo', '$part12Item', '$part12ItemDesc', '$part12Quantity', '$part12SalesPrice', '$part12Cost', '$part13ItemNo', '$part13Item', '$part13ItemDesc', '$part13Quantity', '$part13SalesPrice', '$part13Cost', '$part14ItemNo', '$part14Item', '$part14ItemDesc', '$part14Quantity', '$part14SalesPrice', '$part14Cost', '$part15ItemNo', '$part15Item', '$part15ItemDesc', '$part15Quantity', '$part15SalesPrice', '$part15Cost', '$finalPrice', '$finalCost', '$invoice_phone', '$invoice_email', '$paid', '$invoice_created_by')";
    if(mysqli_query($conn, $insertInvoiceSQL)){
        ?>
        <script>snackbar(`Successfully created`);</script>
        <?php  
    } else{
        ?>
        <script>snackbar(`Error`);</script>
        <?php  
    }
} else if ($postedData['submit'] == "Modify Invoice") {
    require("./PHP/components/schemaInvoice-modify.php");
    $updateInvoiceSQL = "UPDATE invoices SET bill_business_name = '".$bill_business_name."', bill_address = '".$bill_address."', bill_address2 = '".$bill_address2."', bill_city = '".$bill_city."', bill_state = '".$bill_state."', bill_zip = '".$bill_zip."', shipTo = '".$shipTo."', invoiceDate = '".$invoiceDate."', shipDate = '".$shipDate."', po_no = '".$po_no."', terms = '".$terms."', rep = '".$rep."', via = '".$via."', fob = '".$fob."', project = '".$project."', part1ItemNo = '".$part1ItemNo."', part1Item = '".$part1Item."', part1ItemDesc = '".$part1ItemDesc."', part1Quantity = '".$part1Quantity."', part1SalesPrice = '".$part1SalesPrice."', part1Cost = '".$part1Cost."', part2ItemNo = '".$part2ItemNo."', part2Item = '".$part2Item."', part2ItemDesc = '".$part2ItemDesc."', part2Quantity = '".$part2Quantity."', part2SalesPrice = '".$part2SalesPrice."', part2Cost = '".$part2Cost."', part3ItemNo = '".$part3ItemNo."', part3Item = '".$part3Item."', part3ItemDesc = '".$part3ItemDesc."', part3Quantity = '".$part3Quantity."', part3SalesPrice = '".$part3SalesPrice."', part3Cost = '".$part3Cost."', part4ItemNo = '".$part4ItemNo."', part4Item = '".$part4Item."', part4ItemDesc = '".$part4ItemDesc."', part4Quantity = '".$part4Quantity."', part4SalesPrice = '".$part4SalesPrice."', part4Cost = '".$part4Cost."', part5ItemNo = '".$part5ItemNo."', part5Item = '".$part5Item."', part5ItemDesc = '".$part5ItemDesc."', part5Quantity = '".$part5Quantity."', part5SalesPrice = '".$part5SalesPrice."', part5Cost = '".$part5Cost."', part6ItemNo = '".$part6ItemNo."', part6Item = '".$part6Item."', part6ItemDesc = '".$part6ItemDesc."', part6Quantity = '".$part6Quantity."', part6SalesPrice = '".$part6SalesPrice."', part6Cost = '".$part6Cost."', part7ItemNo = '".$part7ItemNo."', part7Item = '".$part7Item."', part7ItemDesc = '".$part7ItemDesc."', part7Quantity = '".$part7Quantity."', part7SalesPrice = '".$part7SalesPrice."', part7Cost = '".$part7Cost."', part8ItemNo = '".$part8ItemNo."', part8Item = '".$part8Item."', part8ItemDesc = '".$part8ItemDesc."', part8Quantity = '".$part8Quantity."', part8SalesPrice = '".$part8SalesPrice."', part8Cost = '".$part8Cost."', part9ItemNo = '".$part9ItemNo."', part9Item = '".$part9Item."', part9ItemDesc = '".$part9ItemDesc."', part9Quantity = '".$part9Quantity."', part9SalesPrice = '".$part9SalesPrice."', part9Cost = '".$part9Cost."', part10ItemNo = '".$part10ItemNo."', part10Item = '".$part10Item."', part10ItemDesc = '".$part10ItemDesc."', part10Quantity = '".$part10Quantity."', part10SalesPrice = '".$part10SalesPrice."', part10Cost = '".$part10Cost."', part11ItemNo = '".$part11ItemNo."', part11Item = '".$part11Item."', part11ItemDesc = '".$part11ItemDesc."', part11Quantity = '".$part11Quantity."', part11SalesPrice = '".$part11SalesPrice."', part11Cost = '".$part11Cost."', part12ItemNo = '".$part12ItemNo."', part12Item = '".$part12Item."', part12ItemDesc = '".$part12ItemDesc."', part12Quantity = '".$part12Quantity."', part12SalesPrice = '".$part12SalesPrice."', part12Cost = '".$part12Cost."', part13ItemNo = '".$part13ItemNo."', part13Item = '".$part13Item."', part13ItemDesc = '".$part13ItemDesc."', part13Quantity = '".$part13Quantity."', part13SalesPrice = '".$part13SalesPrice."', part13Cost = '".$part13Cost."', part14ItemNo = '".$part14ItemNo."', part14Item = '".$part14Item."', part14ItemDesc = '".$part14ItemDesc."', part14Quantity = '".$part14Quantity."', part14SalesPrice = '".$part14SalesPrice."', part14Cost = '".$part14Cost."', part15ItemNo = '".$part15ItemNo."', part15Item = '".$part15Item."', part15ItemDesc = '".$part15ItemDesc."', part15Quantity = '".$part15Quantity."', part15SalesPrice = '".$part15SalesPrice."', part15Cost = '".$part15Cost."', finalPrice = '".$finalPrice."', finalCost = '".$finalCost."', invoice_phone = '".$invoice_phone."', invoice_email = '".$invoice_email."' WHERE invoices_id = ".$postedData['invoices_id'];
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
} else if($postedData['submit']=='View-Invoices'){
    array_shift($postedData);
    $mySQLquery = http_build_query($postedData, "", "%' AND ");
    $mySQLquery = str_replace("%26", "&", $mySQLquery);
    $mySQLquery = str_replace("+", " ", $mySQLquery);
    $mySQLquery = str_replace("=", " LIKE '%", $mySQLquery);
    $invoicesSQL = "SELECT * FROM ".$chosenDB." WHERE ".$mySQLquery."%' ORDER BY invoices_id DESC";
    console_log("MySQL Query Generated");
}

?>
<script>
const postedData = <?php echo json_encode($postedData); ?>;
</script>

<div style="overflow-y: auto; overflow-x: auto">
<table class="table table-striped">
  <tr>
    <!-- <th>invoices_id</th> -->
    <th style="width:85px; vertical-align:middle"><?php echo ucfirst(substr($chosenDB, 0, -1));?></th>
    <?php if ($chosenDB == "invoices"){ echo '<th style="vertical-align:middle" width="50px">Slip</th>';} ?>
    <?php if ($chosenDB == "invoices"){ echo '<th style="vertical-align:middle" width="75px">Modify</th>';} ?>
    <th style="width:60px; vertical-align:middle">Email</th>
    <!-- <th width="75px">Modify</th> -->
    <?php if($permissions['type'] == "administrator") { echo'<th style="vertical-align:middle" width="70px">Delete</th>';} ?>
    <form action="./index.php?page=<?php echo $page;?>" id="filteringForm" method="post">
    <input style="display:none" type="text" name="submit" value ="<?php echo $page;?>"></input>
        <th style="width:155px"><input style="width:115px" type="month" id="invoiceDate" name="invoiceDate"></th>
        <!-- Original Invoice Date Header -->
        <!-- <th width="125px"><?php echo ucfirst(substr($chosenDB, 0, -1));?> Date</th> -->
        <!-- <th>shipTo</th> -->
        <th style="width:110px; vertical-align:middle">$Total</th>
        <?php if ($chosenDB == "invoices"){ echo '<th width="50px" style="vertical-align:middle">Paid</th>';} ?>
        <?php if ($chosenDB == "invoices"){ echo '<th width="80px"><input type="text" placeholder="Inv No." style="width:60px" ></th>';} else {echo '<th width="80px">Est No.</th>';} ?>
        
        <?php if ($chosenDB == "invoices"){ echo '<th width="80px"><input type="text" placeholder="PO No." style="width:60px" ></th>';} ?>
        
        <th style="vertical-align:middle">
        <select name="bill_business_name" id="bill_business_name">
                <option value="">Choose Business...</option>
        </select>
        </th>
        <th style="vertical-align:middle">
            <select name="bill_business_name" id="bill_business_name">
                    <option value="">Choose User...</option>
            </select>
        </th>
    </form>
    <!-- <th>shipDate</th> -->
    <!-- <th>Part1 Item</th> -->
    <!-- <th>part1Quantity</th> -->
    <!-- <th>Part2 Item</th> -->
    <!-- <th>part2Quantity</th> -->
    <!-- <th>Part3 Item</th> -->
    <!-- <th>part3Quantity</th> -->

  </tr>

<?php
$invoicesQuery = mysqli_query($conn, $invoicesSQL);
    foreach ($invoicesQuery as $dbValuesOne) {
        echo '<tr>';


            // Link to Invoice 
            echo '<td class="tdCenter">';
                echo '<a href="'.substr($chosenDB, 0, -1).'_pdf.php?id='.$dbValuesOne['invoices_id'].'&pin='.$dbValuesOne['bill_zip'].'" target="_blank">'; 
                    echo '<img src="./icons/invoice.png" alt="Invoice" width="30" height="30">';
                echo '</a>';
            echo "</td>";

            if ($chosenDB == "invoices"){
            // Link to Slip
            echo '<td class="tdCenter">';
                echo '<a href="slip_pdf.php?id='.$dbValuesOne['invoices_id'].'&pin='.$dbValuesOne['bill_zip'].'" target="_blank">'; 
                    echo '<img src="./icons/slip.png" alt="Invoice" width="30" height="30">';
                echo '</a>';
            echo "</td>";
            }

            if ($chosenDB == "invoices"){
            // Modify the invoice
            echo '<td class="tdCenter">';
                echo '<a href="./index.php?page=Manage-Invoices&id='.$dbValuesOne['invoices_id'].'&pin='.$dbValuesOne['bill_zip'].'">'; 
                    echo '<img src="./icons/modify.png" alt="Invoice" width="30" height="30">';
                echo '</a>';
            echo "</td>";
            }

            // Sending an invoice via email
            echo '<td class="tdCenter">';
                echo '<a href="./index.php?page=Email-'.ucfirst($chosenDB).'&id='.$dbValuesOne['invoices_id'].'">';
                    echo '<img src="./icons/email.png" alt="Email" width="30" height="30">';
                echo '</a>';
            echo "</td>";

            if($permissions['type'] == "administrator") {
            // Delete an Invoice
            echo '<td class="tdCenter">';
                echo '<form action="./index.php?page=View-'.ucfirst($chosenDB).'" method="post">';
                    echo '<input class="deleteButton" type="submit" name="submit" value="Delete-'.$chosenDB.'-'.$dbValuesOne['invoices_id'].'">';
                echo '</form>';
            echo "</td>";
            }

            // Delete an Invoice
            // echo '<td class="tdCenter">';
            //     echo '<a href="./index.php?page=Delete&id='.$dbValuesOne['invoices_id'].'&db=invoices">';
            //         echo '<img src="./icons/delete.png" alt="Delete" width="30" height="30">';
            //     echo '</a>';
            // echo "</td>";

            // Invoice Date m/d/Y
            $dueDate = date('Ymd', strtotime(($dbValuesOne['invoiceDate']. ' + 10 days')));
            if(!$dbValuesOne['paid']) {if(date("Ymd") >=$dueDate) {echo '<td style="color:red; font-weight: bold">';} else {echo "<td>";}} else {echo "<td>";}
                    echo date('m/d/Y', strtotime($dbValuesOne['invoiceDate']));
                echo "</td>";

            // Total amount on bill
            if(!$dbValuesOne['paid']) {if(date("Ymd") >=$dueDate) {echo '<td style="color:red; font-weight: bold">';} else {echo "<td>";}} else {echo "<td>";}
                print_r($dbValuesOne['finalPrice']);
            echo "</td>";

            if ($chosenDB == "invoices"){
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
            }

            // Payment Indicator
            // echo '<td class="tdCenter">';
            //     echo '<input type="checkbox">';
            // echo "</td>";

            // Invoice NO
            if(!$dbValuesOne['paid']) {if(date("Ymd") >=$dueDate) {echo '<td class="tdCenter" style="color:red; font-weight: bold">';} else {echo '<td class="tdCenter">';}} else {echo '<td class="tdCenter">';}
                print_r($dbValuesOne['invoices_id']);
            echo "</td>";

            if ($chosenDB == "invoices"){
            // PO NO
            if(!$dbValuesOne['paid']) {if(date("Ymd") >=$dueDate) {echo '<td class="tdCenter" style="color:red; font-weight: bold">';} else {echo '<td class="tdCenter">';}} else {echo '<td class="tdCenter">';}
                print_r($dbValuesOne['po_no']);
            echo "</td>";
            }

            // Bill To 
            if(!$dbValuesOne['paid']) {if(date("Ymd") >=$dueDate) {echo '<td style="color:red; font-weight: bold">';} else {echo "<td>";}} else {echo "<td>";}
                print_r($dbValuesOne['bill_business_name']);
            echo "</td>";

            // Bill To 
            if(!$dbValuesOne['paid']) {if(date("Ymd") >=$dueDate) {echo '<td style="color:red; font-weight: bold">';} else {echo "<td>";}} else {echo "<td>";}
                echo ucfirst($dbValuesOne['created']);
            echo "</td>";

        echo "</tr>";
    }

    // echo "<pre>";
    //     print_r($_POST);
    // echo "</pre>";
?>

</table>
</div>
<script src="./JS/View-Invoices.js"></script>