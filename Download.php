<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
require_once "config.php";
?>

<?php

$SQL = "SELECT * FROM ".$_POST["download"]."";
$Query = mysqli_query($conn, $SQL);

$showSQL = "SHOW COLUMNS FROM ".$_POST["download"]."";
$showQuery = mysqli_query($conn, $showSQL);

// Fetch records from database 
// $query = $db->query("SELECT * FROM invoices"); 
 
if($Query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = date('Y-m-d-') . ucfirst($_POST["download"]) . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 

    $databaseHeaders = [];
    
    foreach ($showQuery as $value) {
       array_push($databaseHeaders, $value["Field"]);
    }
     
    // Set column headers 
    // $fields = array('users_id', 'username', 'password', 'email', 'phone', 'type', 'created_at'); 
    $fields = $databaseHeaders; 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $Query->fetch_assoc()){ 
        // $status = ($row['status'] == 1)?'Active':'Inactive'; 
        $lineData = [];
        foreach ($databaseHeaders as $value) {
            // $lineData = array($row[$value]);
            array_push($lineData, $row[$value]);
         }
        // $lineData = array($row['users_id'], $row['username'], $row['password'], $row['email'], $row['phone'], $row['type'], $row['created_at']); 
        fputcsv($f, $lineData, $delimiter); 
    } 

    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 

?>