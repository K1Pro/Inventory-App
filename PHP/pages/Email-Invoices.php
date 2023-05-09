<?php
$usersSQL = "SELECT email FROM users WHERE users_id = '".$_SESSION["users_id"]."'";
$users = mysqli_query($conn, $usersSQL);
foreach ($users as $dbValues) {}

$id = htmlspecialchars($_GET["id"]);
$invoicesSQL = "SELECT * FROM invoices WHERE invoices_id = '".$id."'";
$invoices = mysqli_query($conn, $invoicesSQL);
foreach ($invoices as $invoiceValues) {}

?>

<div class="container bg-secondary-subtle" style="overflow-y: auto; overflow-x: hidden">
    <div class="justify-content-center">

        <h4 class="mb-3">Email Invoice</h4>
        <form class="needs-validation" novalidate action="./index.php?page=EmailSent-Invoices&id=<?php echo $invoiceValues['invoices_id'];?>" method="post" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">From:</span>
                <input name="fromEmail" id="fromEmail" type="text" class="form-control" placeholder="From" aria-label="From" aria-describedby="basic-addon2" value="<?php echo $dbValues['email']; ?>">
                <span class="input-group-text" id="basic-addon1">Subject:</span>
                <input name="subject" id="subject" type="text" class="form-control" aria-label="Username" placeholder="Email subject" aria-describedby="basic-addon1" value="Invoice <?php echo $invoiceValues['invoices_id']; ?> from L & M Hardware, Ltd.">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">To:</span>
                <input name="toEmail" id="toEmail" type="text" class="form-control" placeholder="Send to this email" aria-label="Send to this email" aria-describedby="basic-addon2" value="<?php echo $invoiceValues['bill_email']; ?>">
                <span class="input-group-text" id="basic-addon1">CC:</span>
                <input name="CCEmail" id="CCEmail" type="text" class="form-control" placeholder="Send to another email" aria-label="Send to another email" aria-describedby="basic-addon2">
            </div>

            <!-- <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Attach Invoice (Optional)</label>
                <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
            </div> -->

            <hr class="my-4">
            <h6>Email Preview:</h6>
            <div name="sendThisEmail" id="sendThisEmail">
                <div style="border-style: solid;">
                <div style="background-color: #6699cc; padding: 5px 10px 5px 10px; color: #ffffff; font-weight: bold;">
                    L & M Hardware, Ltd.
                </div>
                <div style="background-color: #ccffff; padding: 10px; color: #000000; font-weight: bold;">
                    Invoice# <?php echo $invoiceValues['invoices_id']; ?>&emsp;&emsp;&emsp;&emsp;&emsp;Due: <?php echo date('m/d/Y', strtotime($invoiceValues['invoiceDate']. ' + 10 days'));?>&emsp;&emsp;&emsp;&emsp;&emsp; Amount Due: $<?php echo $invoiceValues['finalPrice']; ?>
                </div>
                <div style="background-color: #ffffff; padding: 10px; color: #000000;">
               <?php 
                ?>
                    Dear Customer,
                    <br><br>
                    Your invoice can be found at this link: <a href="http://landmhardware.com/inventory/invoice.php?id=<?php echo $invoiceValues['invoices_id']; ?>&pin=<?php echo $invoiceValues['bill_zip']; ?>" target="_blank">Invoice# <?php echo $invoiceValues['invoices_id']; ?></a><br>
                    Please remit payment at your earliest convenience.<br>
                    Thank you for your business - we appreciate it very much.<br><br>
                    Sincrerely,<br><br>
                    L & M Hardware, Ltd.<br>
                    310-805-2752<br>
                </div>
                </div>
            </div>

            <hr class="my-4">

            <button class="w-80 btn btn-primary btn-lg" type="submit">Send Invoice</button>

        </form>

    </div>
</div>