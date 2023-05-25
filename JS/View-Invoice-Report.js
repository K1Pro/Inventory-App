let filteringForm = document.getElementById(`filteringForm`);
let invoiceDate = document.getElementById(`invoiceDate`);
// let invoiceYearForm = document.getElementById(`invoiceYearForm`);
let bill_business_name = document.getElementById(`bill_business_name`);
// let businessSelectForm = document.getElementById(`businessSelectForm`);

bill_business_name.addEventListener('change', function () {
  filteringForm.requestSubmit();
});

invoiceDate.addEventListener('change', function () {
  filteringForm.requestSubmit();
});

function exportData() {
  const event = new Date();
  const fileNameDate = event.toISOString().slice(0, 19).replaceAll(':', '-');
  /* Get the HTML data using Element by Id */
  let table = document.getElementById('invoiceReportTable');

  /* Declaring array variable */
  let rows = [];

  //iterate through rows of table
  for (let i = 1, row; (row = table.rows[i]); i++) {
    //rows would be accessed using the "row" variable assigned in the for loop
    //Get each cell value/column from the row
    column1 = row.cells[0].innerText;
    column2 = row.cells[1].innerText;
    column3 = row.cells[2].innerText;
    column4 = row.cells[3].innerText;
    column5 = row.cells[4].innerText;
    column6 = row.cells[5].innerText;
    column7 = row.cells[6].innerText;

    /* add a new records in the array */
    rows.push([column1, column2, column3, column4, column5, column6, column7]);
  }
  csvContent = 'data:text/csv;charset=utf-8,';
  /* add the column delimiter as comma(,) and each row splitted by new line character (\n) */
  rows.forEach(function (rowArray) {
    row = rowArray.join(',');
    csvContent += row + '\r\n';
  });

  /* create a hidden <a> DOM node and set its download attribute */
  let encodedUri = encodeURI(csvContent);
  let link = document.createElement('a');
  link.setAttribute('href', encodedUri);
  link.setAttribute(`download`, `${fileNameDate}-LMHardwareInvoiceReport.csv`);
  document.body.appendChild(link);
  /* download the data file named "InvoiceReport.csv" */
  link.click();
}
