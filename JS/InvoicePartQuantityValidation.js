const id = urlParams.get('id') ? urlParams.get('id') : '';
const pin = urlParams.get('pin') ? urlParams.get('pin') : '';
console.log(id);
console.log(pin);

// for (let i = 1; i <= 15; i++) {
//   document
//     .getElementById(`part${i}ItemNo`)
//     .addEventListener('change', function () {
//       let quantityOnHand = this.value.slice(this.value.indexOf('-') + 1);
//       if (this.value != '') {
//         document.getElementById(`part${i}Quantity`).disabled = false;
//         document.getElementById(`part${i}Quantity`).value = quantityOnHand;
//         document
//           .getElementById(`part${i}Quantity`)
//           .setAttribute('max', quantityOnHand);
//         document.getElementById(`part${i + 1}ItemNo`).disabled = false;
//       } else {
//         document.getElementById(`part${i}Quantity`).disabled = true;
//         document.getElementById(`part${i}Quantity`).value = '';
//         for (let j = i + 1; j <= 15; j++) {
//           document.getElementById(`part${j}ItemNo`).value = '';
//           document.getElementById(`part${j}ItemNo`).disabled = true;
//           document.getElementById(`part${j}Quantity`).value = '';
//           document.getElementById(`part${j}Quantity`).disabled = true;
//         }
//       }
//     });
// }
