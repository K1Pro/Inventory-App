<?php
$getdata = $_GET;
console_log(strtolower(explode('-', $getdata['page'])[1]));
console_log(substr(explode('-', $getdata['page'])[1], 0, -1));

$usersSQL = "SELECT email FROM users WHERE users_id = '".$_SESSION["users_id"]."'";
$users = mysqli_query($conn, $usersSQL);
foreach ($users as $dbValues) {}

$id = htmlspecialchars($_GET["id"]);
$invoicesSQL = "SELECT * FROM ".strtolower(explode('-', $getdata['page'])[1])." WHERE invoices_id = '".$id."'";
$invoices = mysqli_query($conn, $invoicesSQL);
$invoiceArray[] = array();
foreach ($invoices as $invoiceValues) {
    $invoiceArray[] = $invoiceValues;
}
?>
<div class="container bg-secondary-subtle" style="overflow-y: auto; overflow-x: hidden">
    <div class="justify-content-center">
        <h4 class="mb-3">Email <?php echo substr(explode('-', $getdata['page'])[1], 0, -1);?></h4>
        <form class="needs-validation" novalidate action="./index.php?page=View-<?php echo explode('-', $getdata['page'])[1];?>" method="post">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">From:</span>
                <input name="fromEmail" readonly id="fromEmail" type="text" class="form-control" placeholder="From" aria-label="From" aria-describedby="basic-addon2" value="support@landmhardware.com" required>
                <span class="input-group-text" id="basic-addon1">Subject:</span>
                <input name="subject" id="subject" type="text" class="form-control" aria-label="Username" placeholder="Email subject" aria-describedby="basic-addon1" value="<?php echo substr(explode('-', $getdata['page'])[1], 0, -1) . " " . $invoiceValues['invoices_id']; ?> from L & M Hardware, Ltd." required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">To:</span>
                <input name="toEmail" id="toEmail" type="text" class="form-control" placeholder="Send to this email" aria-label="Send to this email" aria-describedby="basic-addon2" value="<?php echo $invoiceValues['bill_email']; ?>" required>
                <span class="input-group-text" id="basic-addon1">CC:</span>
                <input name="CCEmail" id="CCEmail" type="text" class="form-control" placeholder="Send to another email" aria-label="Send to another email" aria-describedby="basic-addon2">
            </div>

            <hr class="my-4">
            <h6>Email Preview:</h6>
            <div name="sendThisEmail" id="sendThisEmail">
                <div style="border-style: solid;">
                <div style="background-color: #6699cc; padding: 5px 10px 5px 10px; color: #ffffff; font-weight: bold;">
                    L & M Hardware, Ltd.
                </div>
                <div style="background-color: #ccffff; padding: 10px; color: #000000; font-weight: bold;">
                    <?php 
                    echo substr(explode('-', $getdata['page'])[1], 0, -1) . "# " . $invoiceValues['invoices_id'];
                    if (explode('-', $getdata['page'])[1] == "Invoices") {
                        echo '&emsp;&emsp;&emsp;&emsp;&emsp;Due: '.
                        date('m/d/Y', strtotime($invoiceValues['invoiceDate']. ' + 10 days')) .
                        '&emsp;&emsp;&emsp;&emsp;&emsp; Amount Due: $';
                    } else { echo '&emsp;&emsp;&emsp;&emsp;&emsp; Estimate: $';}
                        echo $invoiceValues['finalPrice']; ?>
                </div>
                <div style="background-color: #ffffff; padding: 10px; color: #000000;">
                    Dear Customer,
                    <br><br>
                    Your <?php echo substr(strtolower(explode('-', $getdata['page'])[1]), 0, -1); ?> is attached to this email as a pdf.<br>
                    Additionally, your <?php echo substr(strtolower(explode('-', $getdata['page'])[1]), 0, -1); ?> can be found at this link: <a href="http://landmhardware.com/inventory/<?php echo substr(strtolower(explode('-', $getdata['page'])[1]), 0, -1); ?>_pdf.php?id=<?php echo $invoiceValues['invoices_id']; ?>&pin=<?php echo $invoiceValues['bill_zip']; ?>" target="_blank">PDF</a> or <a href="http://landmhardware.com/inventory/<?php echo substr(strtolower(explode('-', $getdata['page'])[1]), 0, -1); ?>_html.php?id=<?php echo $invoiceValues['invoices_id']; ?>&pin=<?php echo $invoiceValues['bill_zip']; ?>" target="_blank">HTML</a><br>
                    <?php if (explode('-', $getdata['page'])[1] == "Invoices") {echo 
                    'Please remit payment at your earliest convenience.<br>';}?>
                    Thank you for your business - we appreciate it very much.<br><br>
                    Sincrerely,<br><br>
                    L & M Hardware, Ltd.<br>
                    312-805-2752<br>
                </div>
                </div>
            </div>

            <hr class="my-4">
            <input name="submit" id="sendEmailBtn" type="submit" value="Email <?php echo substr(explode('-', $getdata['page'])[1], 0, -1);?>" class="w-80 btn btn-primary btn-lg" /></input>

        </form>

    </div>
</div>
<script>const invoiceData = <?php echo json_encode($invoiceArray); ?>;</script>
<script src="./JS/smtp.js"></script>
<script src="./JS/Email-Invoices.js"></script>