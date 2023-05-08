
<?php
header("Location:http//www.google.com");
include 'config.php';

$select = "SELECT * FROM `inventory` ";
$result = $conn->query($select);

if($result->num_rows > 0){
    $separator = ",";
    $filename = "employee_" . date('Y-m-d') . ".csv";
    // Set header content-type to CSV and filename
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    // create a file pointer connected to the output stream
    $output = fopen('php://output', 'w');

    //set CSV column headers
    $fields = array('inventory_id', 'itemName', 'Email', 'Phone', 'Enable');
    fputcsv($output, $fields, $separator);
    
    
    while($row = $result->fetch_object()){ 
        $status = ($row->is_enabled == '1')?'Yes':'No';
        $lineData = array($row->inventory_id, $row->itemName, $row->email, $row->phone, $status);
	fputcsv($output, $lineData, $separator);
    }
	
    fclose($output);
    exit();
}

?>
