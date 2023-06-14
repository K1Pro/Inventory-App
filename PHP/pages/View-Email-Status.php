<div style="overflow-y: auto; overflow-x: auto">
<table class="table table-striped">
<thead>
  <tr>
    <!-- Invoice Table Header -->
    <th>Email Date</th>
    <!-- Slip Table Header -->
    <th>Recepient</th>
    <!-- Modify Table Header -->
    <th>Status</th>
    <!-- Email Table Header -->
    <th>Subject</th>
    <!-- Delete Table Header -->
    <th>Response</th>
    <!-- Invoice Date Table Header -->
    <th>Notes</th>
    <!-- Final Sales Price Table Header -->
    <!-- <th>7</th> -->
    <!-- Paid Status Table Header -->
    <!-- <th>8</th> -->
    <!-- User Table Header -->
    <!-- <th>9</th> -->
  </tr>
  </thead>
  <tbody id="emailList"></tbody>
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
  emailsFromAPI.sort(function(b,a){
  return new Date(a.eventdate) - new Date(b.eventdate);
});
console.log(emailsFromAPI)
let contactList = document.getElementById('emailList');
emailsFromAPI.forEach((contact) => {
  if (contact.eventtype !="ReadyToSend") {
  console.log(contact)
  let tableRow = document.createElement('tr');
  contactList.appendChild(tableRow);
  
  let firstTableData = document.createElement('td');
  firstTableData.innerHTML = contact.eventdate.replaceAll("-", "/").slice(5,10) + "/" + contact.eventdate.replaceAll("-", "/").slice(0,4);
  tableRow.appendChild(firstTableData);

  let secondTableData = document.createElement('td');
  secondTableData.innerHTML = contact.to;
  tableRow.appendChild(secondTableData);

  let thirdTableData = document.createElement('td');
  thirdTableData.innerHTML = contact.eventtype;
  tableRow.appendChild(thirdTableData);

  let fourthTableData = document.createElement('td');
  fourthTableData.innerHTML = contact.subject;
  tableRow.appendChild(fourthTableData);

  let fifthTableData = document.createElement('td');
  fifthTableData.innerHTML = contact.messagecategory;
  tableRow.appendChild(fifthTableData);

  let sixthTableData = document.createElement('td');
  sixthTableData.innerHTML = contact.message.replaceAll(/[<>]/g, '');
  tableRow.appendChild(sixthTableData);
  }
});
})

</script>