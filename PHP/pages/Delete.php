<div class="container bg-secondary-subtle">
  <div class="d-flex justify-content-center text-center">
    <center>
        <?php
        $id = htmlspecialchars($_GET["id"]);
        $selectedDB = htmlspecialchars($_GET["db"]);

        // Link to Deleting Invoice 
        $deleteInvoiceSQL = "DELETE FROM ".$selectedDB." WHERE ".$selectedDB."_id = '".$id."'";

        if(mysqli_query($conn, $deleteInvoiceSQL)){
          ?><script>
          snackbar(`Successfully deleted`);
        </script><?php   
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
        
        ?>
    </center>
  </div>
</div>
<script>
  const deleteQueryString = window.location.search;
  const urlDeleteParams = new URLSearchParams(deleteQueryString);
  const deletePage = urlDeleteParams.get('db');
  const capitalizedDeletePage = deletePage.charAt(0).toUpperCase() + deletePage.slice(1)
  setTimeout(function () {window.location.href= `./index.php?page=View-${capitalizedDeletePage}`;},1000);
</script>