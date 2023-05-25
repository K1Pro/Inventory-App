<?php $postedData = $_POST;
$id = htmlspecialchars($_GET["id"]);
if($postedData['submit']){}

if ($postedData['submit'] == "Create Customer") {
    require("./PHP/components/schemaCustomer.php");
    $insertCustomerSQL = "INSERT INTO customers VALUES (customers_id, '$businessName', '$firstName', '$lastName','$address','$address2', '$city', '$state', '$zip', '$country', '$phone', '$fax', '$email')";
    
    if(mysqli_query($conn, $insertCustomerSQL)){
        ?><script>
        snackbar(`Customer successfully created`);
    </script><?php   
    } else{
        echo "ERROR: Hush! Sorry $insertCustomerSQL. "
            . mysqli_error($conn);
    }
} else if ($postedData['submit'] == "Modify Customer") {
    require("./PHP/components/schemaCustomer.php");
    $updateCustomerSQL = "UPDATE customers SET 
    business_name = '".$businessName."', 
    first_name = '".$firstName."', 
    last_name = '".$lastName."', 
    address = '".$address."', 
    address2 = '".$address2."', 
    city = '".$city."', 
    state = '".$state."',
    zip = '".$zip."',
    country = '".$country."',
    phone = '".$phone."',
    fax = '".$fax."',
    email = '".$email."'
    WHERE customers_id = ".$id;

    if(mysqli_query($conn, $updateCustomerSQL)){
        ?><script>
            snackbar(`Customer successfully updated`);
        </script><?php   
    } else{
        echo "ERROR: Hush! Sorry $updateCustomerSQL. "
            . mysqli_error($conn);
    }
} else if(strpos($postedData['submit'], 'Delete') !== false){
    $parts = explode('-', $postedData['submit']);
    $deleteDB = $parts[1];
    $deleteValue = $parts[2];
    require("./PHP/components/delete.php");
}
?>

<div style="overflow-y: auto; overflow-x: auto">

<table class="table table-striped">
  <tr>
    <!-- <th>No.</th> -->
    <th width="75px">Modify</th>
    <?php if($permissions['type'] == "administrator") { echo'<th style="vertical-align:middle" width="70px">Delete</th>';} ?>
    <th>Business</th>
    <th>First Name</th>
    <!-- <th>Last Name</th> -->
    <th>Address</th>
    <!-- <th>Address 2</th> -->
    <!-- <th>City</th> -->
    <!-- <th>State</th> -->
    <!-- <th>Zip</th> -->
    <!-- <th>Country</th> -->
    <th>Phone</th>
    <!-- <th>Fax</th> -->
    <th>Email</th>
  </tr>

<?php
    // SQL query
    $strSQL = "SELECT business_name, first_name, address, phone, email, customers_id FROM customers ORDER BY business_name ASC";

    // Execute the query
    $rs = mysqli_query($conn, $strSQL);
    // print_r($rs);
    // echo "<br>";
    
    foreach ($rs as $dbValues) {
        echo "<tr>";
        
        // Link to Modifying a customer
        echo '<td class="tdCenter">';
            echo '<a href="./index.php?page=Manage-Customers&id='.$dbValues['customers_id'].'">';
                echo '<img src="./icons/modify.png" alt="Invoice" width="30" height="30">';
            echo '</a>';
        echo "</td>";

        // Delete a customer
        if($permissions['type'] == "administrator") {
        echo '<td class="tdCenter">';
            echo '<form action="./index.php?page=View-Customers" method="post">';
                echo '<input class="deleteButton" type="submit" name="submit" value="Delete-customers-'.$dbValues['customers_id'].'">';
            echo '</form>';
        echo "</td>";
        }

        echo "<td>";
            print_r($dbValues['business_name']);
        echo "</td>";

        echo "<td>";
            print_r($dbValues['first_name']);
        echo "</td>";

        echo "<td>";
            print_r($dbValues['address']);
        echo "</td>";

        echo "<td>";
            print_r($dbValues['phone']);
        echo "</td>";

        echo "<td>";
            print_r($dbValues['email']);
        echo "</td>";

        echo "</tr>";
    }
?>

</table>
</div>