<div class="container bg-secondary-subtle">
  <div class="d-flex justify-content-center text-center">
    <center>

<?php 
    $id = htmlspecialchars($_GET["id"]);
    $invoicesSQL = "SELECT * FROM invoices WHERE invoices_id = '".$id."'";
    $invoices = mysqli_query($conn, $invoicesSQL);
    foreach ($invoices as $invoiceValues) {}

    $to = $_REQUEST['toEmail'];
    $subject = $_REQUEST['subject'];
    $htmlContent = '
    <html> 
    <head> 
        <title>L & M Hardware Invoice</title> 
    </head> 
    <body> 
    <div name="sendThisEmail" id="sendThisEmail">
    <div style="border-style: solid;">
    <div style="background-color: #6699cc; padding: 5px 10px 5px 10px; color: #ffffff; font-weight: bold;">
        L & M Hardware, Ltd.
    </div>
    <div style="background-color: #ccffff; padding: 10px; color: #000000; font-weight: bold;">
        Invoice# '. $invoiceValues['invoices_id'] .'&emsp;&emsp;&emsp;&emsp;&emsp;Due: '.date('m/d/Y', strtotime($invoiceValues['invoiceDate']. ' + 10 days')).' &emsp;&emsp;&emsp;&emsp;&emsp; Amount Due: $'.$invoiceValues['finalPrice'].'
    </div>
    <div style="background-color: #ffffff; padding: 10px; color: #000000;">

        Dear Customer,
        <br><br>
        Your invoice can be found at this link: <a href="http://landmhardware.com/inventory/invoice.php?id='.$invoiceValues['invoices_id'].'&pin='.$invoiceValues['bill_zip'].'" target="_blank">Invoice# '.$invoiceValues['invoices_id'].'</a><br>
        Please remit payment at your earliest convenience.<br>
        Thank you for your business - we appreciate it very much.<br><br>
        Sincrerely,<br><br>
        L & M Hardware, Ltd.<br>
        310-805-2752<br>
    </div>
    </div>
    </div>
    </body> 
    </html>';

    // Set content-type header for sending HTML email 
    $headers = "MIME-Version: 1.0" . "\r\n"; 
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 

    // Additional headers 
    $headers .= 'From: <'.$_REQUEST['fromEmail'].'>' . "\r\n"; 
    $headers .= 'Cc: <'.$_REQUEST['CCEmail'].'>' . "\r\n"; 
    // $headers .= 'Bcc: welcome2@example.com' . "\r\n"; 


    // Send email 
    if(mail($to, $subject, $htmlContent, $headers)){ 
        echo '<h3>Email has sent successfully.</h3>'; 
        // echo $to .'<br>'. $subject .'<br>'. $htmlContent .'<br>'. $headers;
    }else{ 
        echo '<h3>Email sending failed.</h3>'; 
    }

?>

    </center>
  </div>
</div>

<script>
  setTimeout(function () {window.location.href= './index.php?page=View-Invoices';},1000);
</script>