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
} else {
  console.log(page);
}
// if (postedData)
console.log(postedData.invoiceDate);
postedData.invoiceDate ? (invoiceDate.value = postedData.invoiceDate) : '';
