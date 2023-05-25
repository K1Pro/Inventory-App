<div class="container bg-secondary-subtle">
  <div class="d-flex justify-content-center text-center">
    <center>
        <?php
        $id = htmlspecialchars($_GET["id"]);
        
        // Taking all 5 values from the form data(input)
        $username =  $_REQUEST['username'] ? $_REQUEST['username'] : '';
        $email =  $_REQUEST['email'] ? $_REQUEST['email'] : '';
        $phone = $_REQUEST['phone'] ? $_REQUEST['phone'] : '';
        $type = $_REQUEST['type'] ? $_REQUEST['type'] : '';
        
        // Performing insert query execution
        // FInished here
        $sql = "UPDATE users SET 
        username = '".$username."', 
        email = '".$email."', 
        phone = '".$phone."', 
        type = '".$type."'
        WHERE users_id = ".$id;

        if(mysqli_query($conn, $sql)){
            echo "<h3>Modified user successfully.</h3>";

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
  setTimeout(function () {window.location.href= './index.php?page=View-Users';},1000);
</script>