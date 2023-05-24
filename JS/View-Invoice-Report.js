let businessSelect = document.getElementById(`businessSelect`);
let businessSelectForm = document.getElementById(`businessSelectForm`);

businessSelect.addEventListener('change', function () {
  //   if (this.value != '') {
  console.log('Business Change');
  businessSelectForm.requestSubmit();
  //   businessSelectForm.dispatchEvent(
  //     new CustomEvent('submit', { cancelable: true })
  //   );
  //   }
});
