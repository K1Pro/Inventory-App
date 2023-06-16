<?php
  // require("./PHP/components/phpmail.php");
  console_log($_POST);
?>
<div style="overflow-y: auto; overflow-x: auto">
<table class="table table-striped">
<thead>
  <tr>
    <!-- Email Date Table Header -->
    <th style="width:190px">Email Date</th>
    <!-- Recepient Header -->
    <th>Recepient</th>
    <!-- Status Header -->
    <th style="width:150px">Status</th>
    <!-- Subject Header -->
    <th>Subject</th>
    <!-- Response Header -->
    <th style="width:120px">Response</th>
    <!-- Notes Header -->
    <th>Notes</th>
  </tr>
  </thead>
  <tbody id="emailList"></tbody>
</table>
</div>