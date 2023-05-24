let filteringForm = document.getElementById(`filteringForm`);
let invoiceYearSelect = document.getElementById(`invoiceYearSelect`);
// let invoiceYearForm = document.getElementById(`invoiceYearForm`);
let businessSelect = document.getElementById(`businessSelect`);
// let businessSelectForm = document.getElementById(`businessSelectForm`);

businessSelect.addEventListener('change', function () {
  filteringForm.requestSubmit();
});

invoiceYearSelect.addEventListener('change', function () {
  filteringForm.requestSubmit();
});
