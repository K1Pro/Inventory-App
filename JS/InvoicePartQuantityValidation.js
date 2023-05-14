const id = urlParams.get('id') ? urlParams.get('id') : '';
const pin = urlParams.get('pin') ? urlParams.get('pin') : '';
const noOfItems = 15;
let date = new Date().toJSON();
console.log(id);
console.log(pin);

let firstPart = document.getElementById(`part1ItemDesc`).value;
let bill_business_name = document.getElementById(`bill_business_name`);
let bill_address = document.getElementById(`bill_address`);
let bill_city = document.getElementById(`bill_city`);
let bill_state = document.getElementById(`bill_state`);
let bill_zip = document.getElementById(`bill_zip`);
let part1Quantity = document.getElementById(`part1Quantity`);
let part1ItemDesc = document.getElementById(`part1ItemDesc`);
let part1Item = document.getElementById(`part1Item`);
let part1SalesPrice = document.getElementById(`part1SalesPrice`);

if (!id && !pin) {
  document.getElementById('invoiceDate').value = date.slice(0, 10);
  document.getElementById('shipDate').value = date.slice(0, 10);

  bill_business_name.addEventListener('change', function () {
    let selectedBusiness = customerData.find(
      (element) => element['customers_id'] == this.value
    );
    bill_address.value = selectedBusiness.address;
    bill_city.value = selectedBusiness.city;
    bill_state.value = selectedBusiness.state;
    bill_zip.value = selectedBusiness.zip;
  });
}

part1ItemDesc.addEventListener('change', function () {
  console.log(inventoryData);
  let selectedInventory = inventoryData.find(
    (element) => element['inventory_id'] == this.value
  );
  console.log(selectedInventory);
  part1Quantity.value = selectedInventory.quantityOnHand;
  part1Item.value = selectedInventory.itemName;
  part1SalesPrice.value = selectedInventory.salesPrice;
});

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
