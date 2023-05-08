<div style="overflow-y: auto; overflow-x: auto">

<table class="table table-striped">
  <tr>
    <!-- <th>No.</th> -->
    <th width="75px">Modify</th>
    <th width="70px">Delete</th>
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
    require_once "config.php";

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
            echo '<a href="./index.php?page=Modify-Customers&id='.$dbValues['customers_id'].'">';
                echo '<img src="./icons/modify.png" alt="Invoice" width="30" height="30">';
            echo '</a>';
        echo "</td>";

        // Delete a customer
        echo '<td class="tdCenter">';
            echo '<a href="./index.php?page=Delete">';
            echo '<a href="./index.php?page=Delete&id='.$dbValues['customers_id'].'&db=customers">';
                echo '<img src="./icons/delete.png" alt="Invoice" width="30" height="30">';
            echo '</a>';
        echo "</td>";

        // foreach ($dbValues as $values) {
        //     echo "<td>$values</td>";
        // }

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

    $conn->close();
?>

</table>
</div>