<div class="container bg-secondary-subtle">
  <div class="d-flex justify-content-center text-center">
    <center>
        <?php
        $id = htmlspecialchars($_GET["id"]);
        
        // Taking all 5 values from the form data(input)
        $businessName =  $_REQUEST['businessName'] ? $_REQUEST['businessName'] : '';
        $firstName =  $_REQUEST['firstName'] ? $_REQUEST['firstName'] : '';
        $lastName = $_REQUEST['lastName'] ? $_REQUEST['lastName'] : '';
        $address = $_REQUEST['address'] ? $_REQUEST['address'] : '';
        $address2 = $_REQUEST['address2'] ? $_REQUEST['address2'] : '';
        $city = $_REQUEST['city'] ? $_REQUEST['city'] : '';
        $state =  $_REQUEST['state'] ? $_REQUEST['state'] : '';
        $zip = $_REQUEST['zip'] ? $_REQUEST['zip'] : '';
        $country = $_REQUEST['country'] ? $_REQUEST['country'] : '';
        $phone =  $_REQUEST['phone'] ? $_REQUEST['phone'] : '';
        $fax =  $_REQUEST['fax'] ? $_REQUEST['fax'] : '';
        $email =  $_REQUEST['email'] ? $_REQUEST['email'] : '';

        // UPDATE Customers
        // SET ContactName = 'Alfred Schmidt', City = 'Frankfurt'
        // WHERE CustomerID = 1;

        
        // Performing insert query execution
        $sql = "UPDATE customers SET 
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

        if(mysqli_query($conn, $sql)){
            echo "<h3>Modified customer successfully.</h3>";

            // echo nl2br("\n$itemName\n $subitemOf\n "
            //     . "$manufacturersPart\n $descOnPurchTrans\n $cost");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
        ?>
    </center>
  </div>
</div>
<script>
  setTimeout(function () {window.location.href= './index.php?page=View-Customers';},1000);
</script>