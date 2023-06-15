<?php
$invoicesSQL = "SELECT * FROM invoices;";
$invoicesQuery = mysqli_query($conn, $invoicesSQL);
$invoicesRowCount = mysqli_num_rows($invoicesQuery);

$estimatesSQL = "SELECT * FROM estimates;";
$estimatesQuery = mysqli_query($conn, $estimatesSQL);
$estimatesRowCount = mysqli_num_rows($estimatesQuery);

$inventorySQL = "SELECT * FROM inventory;";
$inventoryQuery = mysqli_query($conn, $inventorySQL);
$inventoryRowCount = mysqli_num_rows($inventoryQuery);

$customersSQL = "SELECT * FROM customers;";
$customersQuery = mysqli_query($conn, $customersSQL);
$customersRowCount = mysqli_num_rows($customersQuery);

$usersSQL = "SELECT * FROM users;";
$usersQuery = mysqli_query($conn, $usersSQL);
$usersRowCount = mysqli_num_rows($usersQuery);

?>

<div style="overflow-y: auto; overflow-x: auto">
<table class="table table-striped">
<thead>
  <tr>
    <!-- Email Date Table Header -->
    <th>Download</th>
    <!-- Recepient Header -->
    <th>Table</th>
    <!-- Status Header -->
    <th>Total Items</th>
    <!-- Subject Header -->
    <!-- <th>Subject</th> -->
    <!-- Response Header -->
    <!-- <th style="width:120px">Response</th> -->
    <!-- Notes Header -->
    <!-- <th>Notes</th> -->
  </tr>
  </thead>
  <tbody id="emailList">
    <tr>
      <td>
        <form action="./Download.php" method="post">
          <input type="hidden" id="invoicesDownload" name="download" value="invoices">
          <button type="submit" class="btn btn-warning" value="invoices">Download</button>
        </form>
      </td>
      <td>Invoices</td>
      <td><?php echo $invoicesRowCount; ?></td>
    </tr>
    <tr>
      <td>
      <form action="./Download.php" method="post">
        <input type="hidden" id="estimatesDownload" name="download" value="estimates">
        <button type="submit" class="btn btn-warning" value="estimates">Download</button>
        </form>
      </td>
      <td>Estimates</td>
      <td><?php echo $estimatesRowCount; ?></td>
    </tr>
    <tr>
      <td>
      <form action="./Download.php" method="post">
        <input type="hidden" id="inventoryDownload" name="download" value="inventory">
        <button type="submit" class="btn btn-warning" value="inventory">Download</button>
      </form>
      </td>
      <td>Inventory</td>
      <td><?php echo $inventoryRowCount; ?></td>
    </tr>
    <tr>
      <td>
      <form action="./Download.php" method="post">
        <input type="hidden" id="customersDownload" name="download" value="customers">
        <button type="submit" class="btn btn-warning" value="customers">Download</button>
      </form>
      </td>
      <td>Customers</td>
      <td><?php echo $customersRowCount; ?></td>
    </tr>
    <tr>
      <td>
      <form action='./index.php?page=View-Email-Status' method="post">
        <button type="submit" class="btn btn-warning">Download</button>
      </form>
      </td>
      <td>Emails</td>
      <td><span id="noEmails"></span></td>
    </tr>
    <tr>
      <td>
      <form action="./Download.php" method="post">
        <input type="hidden" id="usersDownload" name="download" value="users">
        <button type="submit" class="btn btn-warning" value="users">Download</button>
      </form>
      </td>
      <td>Users</td>
      <td><?php echo $usersRowCount; ?></td>
    </tr>
  </tbody>
</table>
</div>

<script src="./JS/apiKey.js"></script>
<script>
async function getJSON(url, errorMsg = 'Something went wrong') {
  try {
    const response = await fetch(url);
    const contactData = await response.json();
    return contactData;
  } catch (error) {
    if (error.name === 'AbortError') {
      // console.log('Fetch was aborted');
    }
    // console.log(errorMsg);
  }
}
getJSON(apiKey).then((data) => {
  let emailsFromAPI = data.data.recipients;
  emailsFromAPI = emailsFromAPI.filter(item => !(item.eventtype == "ReadyToSend"));
  document.getElementById("noEmails").innerHTML = emailsFromAPI.length;
});
</script>
