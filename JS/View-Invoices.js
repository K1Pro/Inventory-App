let date = new Date().toJSON();
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

if (page == 'View-Invoices') {
  // Paid Table Column
  let paid = document.getElementById(`paid`);
  paid.addEventListener('change', function () {
    filteringForm.requestSubmit();
  });
  postedData.paid ? (paid.value = postedData.paid) : (paid.value = '');

  // Invoice No Table Column
  let invoices_id = document.getElementById(`invoices_id`);
  invoices_id.addEventListener('change', function () {
    filteringForm.requestSubmit();
  });
  postedData.invoices_id
    ? (invoices_id.value = postedData.invoices_id)
    : (invoices_id.value = '');

  // PO No Table Column
  let po_no = document.getElementById(`po_no`);
  po_no.addEventListener('change', function () {
    filteringForm.requestSubmit();
  });
  postedData.po_no ? (po_no.value = postedData.po_no) : (po_no.value = '');

  // Created Table Column
  let created = document.getElementById(`created`);
  created.addEventListener('change', function () {
    filteringForm.requestSubmit();
  });
  postedData.created
    ? (created.value = postedData.created)
    : (created.value = '');
} else {
}

console.log(postedData);
postedData.invoiceDate
  ? (invoiceDate.value = postedData.invoiceDate)
  : (invoiceDate.value = date.slice(0, 7));
