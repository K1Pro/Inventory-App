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
  // console.log(contact)
  let tableRow = document.createElement('tr');
  contactList.appendChild(tableRow);

  let retrievedDate = new Date(contact.eventdate);
  let adjustedChicagoTime = retrievedDate.setHours(retrievedDate.getHours() -10);
  let ChicagoTime = new Date(adjustedChicagoTime).toJSON();
  
  let firstTableData = document.createElement('td');
  firstTableData.innerHTML = ChicagoTime.replaceAll("-", "/").slice(5,10) + "/" + ChicagoTime.replaceAll("-", "/").slice(0,4) + ChicagoTime.replaceAll("T", " ").slice(10,19);
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