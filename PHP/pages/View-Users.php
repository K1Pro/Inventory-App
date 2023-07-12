
<div style="overflow-y: auto; overflow-x: auto">

<table class="table table-striped">
  <tr>
    <th width="75px">Modify</th>
    <th width="70px">Delete</th>
    <th>Username</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Type</th>
    <th>Created</th>
  </tr>

<?php
if($permissions['type'] == "administrator") {
    $postedData = $_POST;
    if(strpos($postedData['submit'], 'Delete') !== false){
        $parts = explode('-', $postedData['submit']);
        $deleteDB = $parts[1];
        $deleteValue = $parts[2];
        require("./PHP/components/delete.php");
    }
    $strSQL = "SELECT username, email, phone, type, created_at, users_id FROM users";
    $rs = mysqli_query($conn, $strSQL);
    foreach ($rs as $dbValues) {
        echo "<tr>";
        // Link to Modifying a customer
        echo '<td class="tdCenter">';
        if ($dbValues['username'] == "bartosz") {} else{
            echo '<a href="./index.php?page=Modify-Users&id='.$dbValues['users_id'].'">';
                echo '<img src="./icons/modify.png" alt="Invoice" width="30" height="30">';
            echo '</a>';
        }
        echo "</td>";

        // Delete an Invoice
        echo '<td class="tdCenter">';
        if ($dbValues['username'] == "larry" || $dbValues['username'] == "bartosz") {} else{
            echo '<form action="./index.php?page=View-Users" method="post">';
                echo '<input class="deleteButton" type="submit" name="submit" value="Delete-users-'.$dbValues['users_id'].'">';
            echo '</form>';
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
}
?>
</table>
</div>