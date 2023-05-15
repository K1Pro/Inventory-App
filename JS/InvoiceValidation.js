const id = urlParams.get('id') ? urlParams.get('id') : '';
const pin = urlParams.get('pin') ? urlParams.get('pin') : '';
const noOfItems = 15;
let date = new Date().toJSON();
id ? console.log(id) : console.log('No ID');
pin ? console.log(pin) : console.log('No PIN');

let bill_business_name = document.getElementById(`bill_business_name`);
let bill_first_name = document.getElementById(`bill_first_name`);
let bill_last_name = document.getElementById(`bill_last_name`);
let bill_address = document.getElementById(`bill_address`);
let bill_address2 = document.getElementById(`bill_address2`);
let bill_city = document.getElementById(`bill_city`);
let bill_state = document.getElementById(`bill_state`);
let bill_zip = document.getElementById(`bill_zip`);
let bill_phone = document.getElementById(`bill_phone`);
let bill_fax = document.getElementById(`bill_fax`);
let bill_email = document.getElementById(`bill_email`);
let part1Quantity = document.getElementById(`part1Quantity`);
let part1ItemDesc = document.getElementById(`part1ItemDesc`);
let part1Item = document.getElementById(`part1Item`);
let part1SalesPrice = document.getElementById(`part1SalesPrice`);
let finalPrice = document.getElementById(`finalPrice`);
let submitButton = document.getElementById(`finalPrice`);

function addFinalPrice() {
  // Add up Final Price
  let totalPriceArray = [];
  for (let i = 1; i <= 15; i++) {
    totalPriceArray.push(
      Number(document.getElementById(`part${i}TotalPrice`).value)
    );
  }
  let finalPriceValue = totalPriceArray.reduce(add, 0); // with initial value to avoid when the array is empty
  function add(total, amount) {
    return total + amount;
  }
  finalPrice.value = Number(finalPriceValue).toFixed(2);
}

if (!id && !pin) {
  document.getElementById('invoiceDate').value = date.slice(0, 10);
  document.getElementById('shipDate').value = date.slice(0, 10);
  bill_state.value = 'IL';

  bill_business_name.addEventListener('change', function () {
    let selectedBusiness = customerData.find(
      (element) =>
        element['customers_id'] ==
        this.value.substring(0, this.value.indexOf('-'))
    );
    bill_first_name.value = selectedBusiness.first_name;
    bill_last_name.value = selectedBusiness.last_name;
    bill_address.value = selectedBusiness.address;
    bill_address2.value = selectedBusiness.address2;
    bill_city.value = selectedBusiness.city;
    bill_state.value = selectedBusiness.state;
    bill_zip.value = selectedBusiness.zip;
    bill_phone.value = selectedBusiness.phone;
    bill_fax.value = selectedBusiness.fax;
    bill_email.value = selectedBusiness.email;
  });

  document.getElementById(`part1Quantity`).disabled = true;
  document.getElementById(`part1Item`).disabled = true;
  document.getElementById(`part1SalesPrice`).disabled = true;
}

for (let i = 2; i <= noOfItems; i++) {
  if (document.getElementById(`part${i}ItemDesc`).value == '') {
    document.getElementById(`part${i}Quantity`).disabled = true;
    document.getElementById(`part${i}Quantity`).value = '';

    document.getElementById(`part${i}Item`).disabled = true;
    document.getElementById(`part${i}Item`).value = '';

    document.getElementById(`part${i}ItemDesc`).disabled = true;
    document.getElementById(`part${i}ItemDesc`).value = '';

    document.getElementById(`part${i}SalesPrice`).disabled = true;
    document.getElementById(`part${i}SalesPrice`).value = '';
  }
}

for (let i = 1; i <= 15; i++) {
  document
    .getElementById(`part${i}ItemDesc`)
    .addEventListener('change', function () {
      let selectedInventory = inventoryData.find(
        (element) =>
          element['inventory_id'] ==
          this.value.substring(0, this.value.indexOf('-'))
      );

      if (this.value != '') {
        // Quantity
        document.getElementById(`part${i}Quantity`).disabled = false;
        document.getElementById(`part${i}Quantity`).value =
          selectedInventory.quantityOnHand;
        document
          .getElementById(`part${i}Quantity`)
          .setAttribute('max', selectedInventory.quantityOnHand);
        // Item
        document.getElementById(`part${i}Item`).disabled = false;
        document.getElementById(`part${i}Item`).value =
          selectedInventory.itemName;
        // Sales Price
        document.getElementById(`part${i}SalesPrice`).disabled = false;
        document.getElementById(`part${i}SalesPrice`).value =
          selectedInventory.salesPrice;
        // Item Total Price
        document.getElementById(`part${i}TotalPrice`).value = Number(
          document.getElementById(`part${i}Quantity`).value *
            document.getElementById(`part${i}SalesPrice`).value
        ).toFixed(2); // toLocaleString('en-US');
        // Enable next item
        document.getElementById(`part${i + 1}ItemDesc`).disabled = false;
        addFinalPrice();
      } else {
        // Quantity
        document.getElementById(`part${i}Quantity`).disabled = true;
        document.getElementById(`part${i}Quantity`).value = '';
        // Item
        document.getElementById(`part${i}Item`).disabled = true;
        document.getElementById(`part${i}Item`).value = '';
        // Sales Price
        document.getElementById(`part${i}SalesPrice`).disabled = true;
        document.getElementById(`part${i}SalesPrice`).value = '';
        // Item Total Price
        document.getElementById(`part${i}TotalPrice`).value = Number(
          document.getElementById(`part${i}Quantity`).value *
            document.getElementById(`part${i}SalesPrice`).value
        ).toFixed(2);
        for (let j = i + 1; j <= 15; j++) {
          // Quantity
          document.getElementById(`part${j}Quantity`).value = '';
          document.getElementById(`part${j}Quantity`).disabled = true;
          // Item
          document.getElementById(`part${j}Item`).value = '';
          document.getElementById(`part${j}Item`).disabled = true;
          // Item Description
          document.getElementById(`part${j}ItemDesc`).value = '';
          document.getElementById(`part${j}ItemDesc`).disabled = true;
          // Sales Price
          document.getElementById(`part${j}SalesPrice`).value = '';
          document.getElementById(`part${j}SalesPrice`).disabled = true;
          // Sales Price
          document.getElementById(`part${j}TotalPrice`).value = '0.00';
        }
        addFinalPrice();
      }
    });

  document
    .getElementById(`part${i}Quantity`)
    .addEventListener('change', function () {
      // Item Total Price
      document.getElementById(`part${i}TotalPrice`).value = Number(
        this.value * document.getElementById(`part${i}SalesPrice`).value
      ).toFixed(2);
      addFinalPrice();
    });

  document
    .getElementById(`part${i}SalesPrice`)
    .addEventListener('change', function () {
      // Item Total Price
      document.getElementById(`part${i}TotalPrice`).value = Number(
        document.getElementById(`part${i}Quantity`).value * this.value
      ).toFixed(2);
      addFinalPrice();
    });
}

submitButton.addEventListener('click', function () {
  finalPrice.disabled = false;
});
