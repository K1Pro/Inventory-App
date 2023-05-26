const id = urlParams.get('id') ? urlParams.get('id') : '';
const pin = urlParams.get('pin') ? urlParams.get('pin') : '';
const noOfItems = 15;
let date = new Date().toJSON();
id ? console.log(id) : console.log('No ID');
pin ? console.log(pin) : console.log('No PIN');
invoiceItems = [
  'Quantity',
  'Item',
  'ItemDesc',
  'ItemSelect',
  'SalesPrice',
  'Cost',
];
console.log(inventoryData);

// Retrieve elements
let bill_business_name = document.getElementById(`bill_business_name`);
let bill_business_nameSelect = document.getElementById(
  `bill_business_nameSelect`
);
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
let shipTo = document.getElementById(`shipTo`);
let part1Quantity = document.getElementById(`part1Quantity`);
let part1ItemDesc = document.getElementById(`part1ItemDesc`);
let part1ItemSelect = document.getElementById(`part1ItemSelect`);
let part1Item = document.getElementById(`part1Item`);
let part1SalesPrice = document.getElementById(`part1SalesPrice`);
let part1Cost = document.getElementById(`part1Cost`);
let finalPrice = document.getElementById(`finalPrice`);
let finalCost = document.getElementById(`finalCost`);
let formattedInventoryData = [];
let inventoryDataObjects = {};
let selectedInventory, finalPriceValue, selectedBusiness;
let totalPriceArray = [];

function addFinalPrice() {
  // Add up Final Price
  totalPriceArray = [];
  for (let i = 1; i <= 15; i++) {
    totalPriceArray.push(
      Number(document.getElementById(`part${i}TotalPrice`).value)
    );
  }
  finalPriceValue = totalPriceArray.reduce(add, 0); // with initial value to avoid when the array is empty
  function add(total, amount) {
    return total + amount;
  }
  finalPrice.value = Number(finalPriceValue).toFixed(2);
}

function addFinalCost() {
  // Add up Final Cost
  totalCostArray = [];
  for (let i = 1; i <= 15; i++) {
    totalCostArray.push(
      Number(document.getElementById(`part${i}TotalCost`).value)
    );
  }
  finalCostValue = totalCostArray.reduce(add, 0); // with initial value to avoid when the array is empty
  function add(total, amount) {
    return total + amount;
  }
  finalCost.value = Number(finalCostValue).toFixed(2);
}

function lowerCase(randomString) {
  return randomString.toLowerCase();
}

for (let i = 1; i <= 15; i++) {
  document
    .getElementById(`part${i}Quantity`)
    .addEventListener('change', function () {
      // Item Total Price
      document.getElementById(`part${i}TotalPrice`).value = Number(
        this.value * document.getElementById(`part${i}SalesPrice`).value
      ).toFixed(2);
      addFinalPrice();

      // Item Total Cost
      document.getElementById(`part${i}TotalCost`).value = Number(
        this.value * document.getElementById(`part${i}SalesCost`).value
      ).toFixed(2);
      addFinalCost();
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

  document
    .getElementById(`part${i}Cost`)
    .addEventListener('change', function () {
      // Item Total Cost
      document.getElementById(`part${i}TotalCost`).value = Number(
        document.getElementById(`part${i}Quantity`).value * this.value
      ).toFixed(2);
      addFinalCost();
    });
}

// Validation for creating an invoice
if (!id && !pin) {
  document.getElementById('invoiceDate').value = date.slice(0, 10);
  document.getElementById('shipDate').value = date.slice(0, 10);
  bill_state.value = 'IL';

  bill_business_nameSelect.addEventListener('change', function () {
    if (this.value != '') {
      console.log(customerData);
      selectedBusiness = customerData.find(
        (element) => element['customers_id'] == this.value
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
      shipTo.value = `${selectedBusiness.business_name}\n${selectedBusiness.address} ${selectedBusiness.address2}\n${selectedBusiness.city}, ${selectedBusiness.state} ${selectedBusiness.zip}`;
    } else {
      bill_first_name.value = '';
      bill_last_name.value = '';
      bill_address.value = '';
      bill_address2.value = '';
      bill_city.value = '';
      bill_state.value = 'IL';
      bill_zip.value = '';
      bill_phone.value = '';
      bill_fax.value = '';
      bill_email.value = '';
      shipTo.value = '';
    }
  });

  part1Quantity.disabled = true;
  part1Item.disabled = true;
  part1ItemDesc.required = true;
  part1ItemSelect.required = true;
  part1SalesPrice.disabled = true;
  part1Cost.disabled = true;

  for (let i = 1; i <= 15; i++) {
    document
      .getElementById(`part${i}ItemSelect`)
      .addEventListener('change', function () {
        // Format the array's object values to be lower case
        formattedInventoryData = [];
        inventoryData.forEach((inventory) => {
          inventoryDataObjects = {};
          for (let key in inventory) {
            key == 'descOnPurchTrans'
              ? (inventoryDataObjects[key] = inventory[key].toLowerCase())
              : (inventoryDataObjects[key] = inventory[key]);
          }
          formattedInventoryData.push(inventoryDataObjects);
        });

        selectedInventory = formattedInventoryData.find(
          (element) => element['descOnPurchTrans'] == this.value.toLowerCase()
        );
        console.log(this.value.toLowerCase());
        console.log(selectedInventory);

        if (this.value != '') {
          console.log('test');
          invoiceItems.forEach((invoiceItem) => {
            document.getElementById(`part${i}${invoiceItem}`).disabled = false;
            document.getElementById(`part${i}${invoiceItem}`).required = true;
          });
          // Quantity
          document.getElementById(`part${i}Quantity`).value =
            selectedInventory.quantityOnHand;
          document
            .getElementById(`part${i}Quantity`)
            .setAttribute('max', selectedInventory.quantityOnHand);
          // Item
          document.getElementById(`part${i}Item`).value =
            selectedInventory.itemName;
          // Sales Price
          document.getElementById(`part${i}SalesPrice`).value =
            selectedInventory.salesPrice;
          // Item No
          document.getElementById(`part${i}ItemNo`).value =
            selectedInventory.inventory_id;
          // Cost
          document.getElementById(`part${i}Cost`).value =
            selectedInventory.cost;
          // Item Total Price
          document.getElementById(`part${i}TotalPrice`).value = Number(
            document.getElementById(`part${i}Quantity`).value *
              document.getElementById(`part${i}SalesPrice`).value
          ).toFixed(2); // toLocaleString('en-US');
          // Item Total Cost
          document.getElementById(`part${i}TotalCost`).value = Number(
            document.getElementById(`part${i}Quantity`).value *
              document.getElementById(`part${i}Cost`).value
          ).toFixed(2); // toLocaleString('en-US');
          // Enable next item
          document.getElementById(`part${i + 1}ItemDesc`).disabled = false;
          document.getElementById(`part${i + 1}ItemSelect`).disabled = false;
          // if (this.value.slice(-4) == 'Misc') {
          //   console.log('Misc Selected');
          //   const miscItem = document.createElement('input');
          //   miscItem.value = 'Misc';
          //   this.parentNode.replaceChild(miscItem, this);
          // }
          addFinalPrice();
          addFinalCost();
        } else {
          // Quantity
          document.getElementById(`part${i}Quantity`).disabled = true;
          document.getElementById(`part${i}Quantity`).required = false;
          document.getElementById(`part${i}Quantity`).value = '';
          // Item
          document.getElementById(`part${i}Item`).disabled = true;
          document.getElementById(`part${i}Item`).required = false;
          document.getElementById(`part${i}Item`).value = '';
          // Sales Price
          document.getElementById(`part${i}SalesPrice`).disabled = true;
          document.getElementById(`part${i}SalesPrice`).required = false;
          document.getElementById(`part${i}SalesPrice`).value = '';
          // Cost
          document.getElementById(`part${i}Cost`).disabled = true;
          document.getElementById(`part${i}Cost`).required = false;
          document.getElementById(`part${i}Cost`).value = '';
          // Item No
          document.getElementById(`part${i}ItemNo`).value = '';
          // Item Total Price
          document.getElementById(`part${i}TotalPrice`).value = Number(
            document.getElementById(`part${i}Quantity`).value *
              document.getElementById(`part${i}SalesPrice`).value
          ).toFixed(2);
          // Item Total Cost
          document.getElementById(`part${i}TotalCost`).value = Number(
            document.getElementById(`part${i}Quantity`).value *
              document.getElementById(`part${i}Cost`).value
          ).toFixed(2);
          for (let j = i + 1; j <= 15; j++) {
            document.getElementById(`part${j}ItemNo`).value = '';
            invoiceItems.forEach((invoiceItem) => {
              document.getElementById(`part${j}${invoiceItem}`).value = '';
              document.getElementById(`part${j}${invoiceItem}`).disabled = true;
              document.getElementById(
                `part${i}${invoiceItem}`
              ).required = false;
            });
            // Item Total Price
            document.getElementById(`part${j}TotalPrice`).value = '0.00';
          }
          addFinalPrice();
          addFinalCost();
          document.getElementById(`part1ItemDesc`).required = true;
        }
      });
  }
}

// Validation for modifying an invoice
if (id && pin) {
  invoiceItems.forEach((invoiceItem) => {
    for (let i = 2; i <= noOfItems - 1; i++) {
      document
        .getElementById(`part${i}${invoiceItem}`)
        .addEventListener('change', function () {
          if (this.value != '') {
            invoiceItems.forEach((invoiceItem) => {
              document.getElementById(
                `part${i}${invoiceItem}`
              ).disabled = false;
              document.getElementById(`part${i}${invoiceItem}`).required = true;
              document.getElementById(
                `part${i + 1}${invoiceItem}`
              ).disabled = false;
            });
          }
        });
    }
  });
}

// Disabling all fields that are not ready to be editted
for (let i = 2; i <= noOfItems; i++) {
  if (document.getElementById(`part${i}ItemDesc`).value == '') {
    document.getElementById(`part${i}ItemNo`).value = '';
    invoiceItems.forEach((invoiceItem) => {
      document.getElementById(`part${i}${invoiceItem}`).disabled = true;
      document.getElementById(`part${i}${invoiceItem}`).value = '';
      // document.getElementById(`part${i}${invoiceItem}`).style.visibility =
      //   'hidden';
    });
  }
}

// Enabling only next row of fields (Quantity, Code, Desc, Price) when modifying an invoice only
if (id && pin) {
  for (let i = 2; i <= noOfItems; i++) {
    if (document.getElementById(`part${i - 1}ItemDesc`).value != '') {
      invoiceItems.forEach((invoiceItem) => {
        document.getElementById(`part${i}${invoiceItem}`).disabled = false;
      });
    }
  }
}
