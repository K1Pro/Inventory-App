<div class="container bg-secondary-subtle">
  <div class="d-flex justify-content-center text-center">
    <center>
        <?php
        require_once "config.php";
        
        $businessName =  $_REQUEST['businessName'];
        $firstName =  $_REQUEST['firstName'];
        $lastName = $_REQUEST['lastName'];
        $address = $_REQUEST['address'];
        $address2 = $_REQUEST['address2'];
        $city = $_REQUEST['city'];
        $state =  $_REQUEST['state'];
        $zip = $_REQUEST['zip'];
        $country = $_REQUEST['country'];
        $phone =  $_REQUEST['phone'];
        $fax =  $_REQUEST['fax'];
        $email =  $_REQUEST['email'];

        
        // Performing insert query execution
        $sql = "INSERT INTO customers VALUES (customers_id, '$businessName', '$firstName', '$lastName','$address','$address2', '$city', '$state', '$zip', '$country', '$phone', '$fax', '$email')";
        
        if(mysqli_query($conn, $sql)){
            echo "<h3>Added a new customer successfully.";

            // echo nl2br("\n$firstName\n $lastName\n "
            //     . "$email\n $address\n $address2");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
        
        // Close connection
        mysqli_close($conn);
        ?>
    </center>
  </div>
</div>
<script>
  setTimeout(function () {window.location.href= './index.php?page=View-Customers';},1000);
</script>