
<div style="overflow-y: auto; overflow-x: auto">
<table class="table table-striped">
<thead>
  <tr>
    <!-- Email Date Table Header -->
    <th style="width:190px">Email Date</th>
    <!-- Status Header -->
    <th style="width:120px">Status</th>
    <!-- Recepient Header -->
    <th>Recepient</th>
    <!-- Subject Header -->
    <th>Subject</th>
    <!-- Response Header -->
    <!-- <th style="width:120px">Response</th> -->
    <!-- Notes Header -->
    <th>Sender</th>
  </tr>
  </thead>
  <!-- <tbody id="emailList"> -->
  <?php
  // require("./PHP/components/phpmail.php");
  console_log($_POST);
  $sentEmailsSQL = "SELECT email_date, email_recepient, email_status, email_subject, email_sender FROM emails ORDER BY email_date DESC";
  $sentEmailsQuery = mysqli_query($conn, $sentEmailsSQL);
  foreach ($sentEmailsQuery as $dbValues) {
    echo "<tr>";
      echo "<td>";
          echo date('m/d/Y g:i a', strtotime($dbValues['email_date']));
      echo "</td>";

      echo "<td>";
          print_r($dbValues['email_status']);
      echo "</td>";

      echo "<td>";
          print_r($dbValues['email_recepient']);
      echo "</td>";

      echo "<td>";
          print_r($dbValues['email_subject']);
      echo "</td>";

      echo "<td>";
          print_r($dbValues['email_sender']);
      echo "</td>";

    echo "</tr>";
  }

?>
  <!-- </tbody> -->
</table>
</div>