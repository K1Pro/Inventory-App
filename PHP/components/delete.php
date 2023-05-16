<?php
// Link to Deleting Invoice 
$deleteSQL = "DELETE FROM ".$deleteDB." WHERE ".$deleteDB."_id = '".$deleteValue."'";

if(mysqli_query($conn, $deleteSQL)){
  ?><script>
  snackbar(`Successfully deleted`);
</script><?php   
} else{
  ?><script>
  snackbar(`Error`);
</script><?php   
    // echo "ERROR: Hush! Sorry $sql. "
    //     . mysqli_error($conn);
}

?>