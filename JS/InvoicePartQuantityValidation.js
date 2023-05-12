const id = urlParams.get('id') ? urlParams.get('id') : '';
const pin = urlParams.get('pin') ? urlParams.get('pin') : '';
const noOfItems = 15;
let date = new Date().toJSON();
if (!id && !pin) {
  document.getElementById('invoiceDate').value = date.slice(0, 10);
  document.getElementById('shipDate').value = date.slice(0, 10);
}
console.log(id);
console.log(pin);

let firstPart = document.getElementById(`part1ItemDesc`).value;
console.log(firstPart);

if (firstPart) {
} else {
  for (let i = 2; i <= noOfItems; i++) {
    document.getElementById(`part${i}Quantity`).disabled = true;
    document.getElementById(`part${i}Item`).disabled = true;
    document.getElementById(`part${i}ItemDesc`).disabled = true;
    document.getElementById(`part${i}SalesPrice`).disabled = true;
  }
}

for (let i = 1; i <= 15; i++) {
  // document
  //   .getElementById(`part${i}Item`)
  //   .addEventListener('change', function () {
  //     let quantityOnHand = this.value.slice(this.value.indexOf('-') + 1);
  //     if (this.value != '') {
  //       document.getElementById(`part${i}Quantity`).disabled = false;
  //       document.getElementById(`part${i}Quantity`).value = quantityOnHand;
  //       document
  //         .getElementById(`part${i}Quantity`)
  //         .setAttribute('max', quantityOnHand);
  //       document.getElementById(`part${i + 1}Item`).disabled = false;
  //     } else {
  //       document.getElementById(`part${i}Quantity`).disabled = true;
  //       document.getElementById(`part${i}Quantity`).value = '';
  //       for (let j = i + 1; j <= 15; j++) {
  //         document.getElementById(`part${j}Item`).value = '';
  //         document.getElementById(`part${j}Item`).disabled = true;
  //         document.getElementById(`part${j}Quantity`).value = '';
  //         document.getElementById(`part${j}Quantity`).disabled = true;
  //       }
  //     }
  //   });
}
