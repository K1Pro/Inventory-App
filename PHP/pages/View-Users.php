<div style="overflow-y: auto; overflow-x: auto">

<table class="table table-striped">
  <tr>
    <th width="75px">Modify</th>
    <th width="70px">Delete</th>
    <!-- <th>No.</th> -->
    <th>Username</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Type</th>
    <!-- <th>Password</th> -->
    <th>Created</th>
  </tr>

<?php
    require_once "config.php";
    // SQL query
    $strSQL = "SELECT username, email, phone, type, created_at, users_id FROM users";
    // Execute the query
    $rs = mysqli_query($conn, $strSQL);

    
    foreach ($rs as $dbValues) {
        echo "<tr>";
        // Link to Modifying a customer
        echo '<td class="tdCenter">';
            echo '<a href="./index.php?page=Modify-Users&id='.$dbValues['users_id'].'">';
                echo '<img src="./icons/modify.png" alt="Invoice" width="30" height="30">';
            echo '</a>';
        echo "</td>";

        // Delete a customer
        echo '<td class="tdCenter">';
        if ($dbValues['username'] == "larry" || $dbValues['username'] == "bartosz") {} else{
            echo '<a href="./index.php?page=Delete&id='.$dbValues['users_id'].'&db=users">';
                echo '<img src="./icons/delete.png" alt="Invoice" width="30" height="30">';
            echo '</a>';
        }
        echo "</td>";

        echo "<td>";
            print_r($dbValues['username']);
        echo "</td>";

        echo "<td>";
            print_r($dbValues['email']);
        echo "</td>";

        echo "<td>";
            print_r($dbValues['phone']);
        echo "</td>";

        echo "<td>";
            print_r($dbValues['type']);
        echo "</td>";

        echo "<td>";
            print_r($dbValues['created_at']);
        echo "</td>";

        echo "</tr>";
    }

    $conn->close();
?>

</table>
</div>