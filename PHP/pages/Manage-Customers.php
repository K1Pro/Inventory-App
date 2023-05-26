<?php
$id = htmlspecialchars($_GET["id"]);
$customersSQL = "SELECT * FROM customers WHERE customers_id = '".$id."'";
$customers = mysqli_query($conn, $customersSQL);
foreach ($customers as $customerValues) {};
?>

<div class="container bg-secondary-subtle" style="overflow-y: auto; overflow-x: hidden">
    <div class="row g-5 justify-content-center">
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3 text-center"><?php echo strlen($id) ? "Modify customer" : "Create customer"; ?></h4>
        <form class="needs-validation" novalidate  action='./index.php?page=View-Customers&id=<?php echo $id; ?>' method="post">
          <div class="row g-3">
            <div class="col-12">
              <label for="businessName" class="form-label">Business Name <span class="text-body-secondary">(required)</span></label>
              <input type="text" class="form-control" name="businessName" id="businessName" placeholder="" required value="<?php print_r($customerValues['business_name']);?>">
              <div class="invalid-feedback">
                Please enter a business name.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" name="firstName" id="firstName" placeholder="" value="<?php print_r($customerValues['first_name']);?>">
              <div class="invalid-feedback">
                Invalid first name
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" name="lastName" id="lastName" placeholder="" value="<?php print_r($customerValues['last_name']);?>">
              <div class="invalid-feedback">
                Invalid last name
              </div>
            </div>

            <div class="col-sm-6">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" value="<?php print_r($customerValues['address']);?>">
              <div class="invalid-feedback">
                Invalid shipping address.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="address2" class="form-label">Address 2 <span class="text-body-secondary">(Optional)</span></label>
              <input type="text" class="form-control" name="address2" id="address2" value="<?php print_r($customerValues['address2']);?>" placeholder="Apartment or suite">
            </div>

            <div class="col-12">
              <label for="city" class="form-label">City</label>
              <input type="text" class="form-control" name="city" id="city" value="<?php print_r($customerValues['city']);?>" placeholder="">
              <div class="invalid-feedback">
                Invalid city.
              </div>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">State</label>
              <select class="form-select" name="state" id="state">
                <option value="">Choose...</option>
                <option value="AL" <?php if ($customerValues['state'] == "AL") {echo "selected";} ?>>Alabama</option>
                <option value="AK" <?php if ($customerValues['state'] == "AK") {echo "selected";} ?>>Alaska</option>
                <option value="AZ" <?php if ($customerValues['state'] == "AZ") {echo "selected";} ?>>Arizona</option>
                <option value="AR" <?php if ($customerValues['state'] == "AR") {echo "selected";} ?>>Arkansas</option>
                <option value="CA" <?php if ($customerValues['state'] == "CA") {echo "selected";} ?>>California</option>
                <option value="CO" <?php if ($customerValues['state'] == "CO") {echo "selected";} ?>>Colorado</option>
                <option value="CT" <?php if ($customerValues['state'] == "CT") {echo "selected";} ?>>Connecticut</option>
                <option value="DE" <?php if ($customerValues['state'] == "DE") {echo "selected";} ?>>Delaware</option>
                <option value="DC" <?php if ($customerValues['state'] == "DC") {echo "selected";} ?>>District Of Columbia</option>
                <option value="FL" <?php if ($customerValues['state'] == "FL") {echo "selected";} ?>>Florida</option>
                <option value="GA" <?php if ($customerValues['state'] == "GA") {echo "selected";} ?>>Georgia</option>
                <option value="HI" <?php if ($customerValues['state'] == "HI") {echo "selected";} ?>>Hawaii</option>
                <option value="ID" <?php if ($customerValues['state'] == "ID") {echo "selected";} ?>>Idaho</option>
                <option value="IL" <?php if ($customerValues['state'] == "IL") {echo "selected";} ?>>Illinois</option>
                <option value="IN" <?php if ($customerValues['state'] == "IN") {echo "selected";} ?>>Indiana</option>
                <option value="IA" <?php if ($customerValues['state'] == "IA") {echo "selected";} ?>>Iowa</option>
                <option value="KS" <?php if ($customerValues['state'] == "KS") {echo "selected";} ?>>Kansas</option>
                <option value="KY" <?php if ($customerValues['state'] == "KY") {echo "selected";} ?>>Kentucky</option>
                <option value="LA" <?php if ($customerValues['state'] == "LA") {echo "selected";} ?>>Louisiana</option>
                <option value="ME" <?php if ($customerValues['state'] == "ME") {echo "selected";} ?>>Maine</option>
                <option value="MD" <?php if ($customerValues['state'] == "MD") {echo "selected";} ?>>Maryland</option>
                <option value="MA" <?php if ($customerValues['state'] == "MA") {echo "selected";} ?>>Massachusetts</option>
                <option value="MI" <?php if ($customerValues['state'] == "MI") {echo "selected";} ?>>Michigan</option>
                <option value="MN" <?php if ($customerValues['state'] == "MN") {echo "selected";} ?>>Minnesota</option>
                <option value="MS" <?php if ($customerValues['state'] == "MS") {echo "selected";} ?>>Mississippi</option>
                <option value="MO" <?php if ($customerValues['state'] == "MO") {echo "selected";} ?>>Missouri</option>
                <option value="MT" <?php if ($customerValues['state'] == "MT") {echo "selected";} ?>>Montana</option>
                <option value="NE" <?php if ($customerValues['state'] == "NE") {echo "selected";} ?>>Nebraska</option>
                <option value="NV" <?php if ($customerValues['state'] == "NV") {echo "selected";} ?>>Nevada</option>
                <option value="NH" <?php if ($customerValues['state'] == "NH") {echo "selected";} ?>>New Hampshire</option>
                <option value="NJ" <?php if ($customerValues['state'] == "NJ") {echo "selected";} ?>>New Jersey</option>
                <option value="NM" <?php if ($customerValues['state'] == "NM") {echo "selected";} ?>>New Mexico</option>
                <option value="NY" <?php if ($customerValues['state'] == "NY") {echo "selected";} ?>>New York</option>
                <option value="NC" <?php if ($customerValues['state'] == "NC") {echo "selected";} ?>>North Carolina</option>
                <option value="ND" <?php if ($customerValues['state'] == "ND") {echo "selected";} ?>>North Dakota</option>
                <option value="OH" <?php if ($customerValues['state'] == "OH") {echo "selected";} ?>>Ohio</option>
                <option value="OK" <?php if ($customerValues['state'] == "OK") {echo "selected";} ?>>Oklahoma</option>
                <option value="OR" <?php if ($customerValues['state'] == "OR") {echo "selected";} ?>>Oregon</option>
                <option value="PA" <?php if ($customerValues['state'] == "PA") {echo "selected";} ?>>Pennsylvania</option>
                <option value="RI" <?php if ($customerValues['state'] == "RI") {echo "selected";} ?>>Rhode Island</option>
                <option value="SC" <?php if ($customerValues['state'] == "SC") {echo "selected";} ?>>South Carolina</option>
                <option value="SD" <?php if ($customerValues['state'] == "SD") {echo "selected";} ?>>South Dakota</option>
                <option value="TN" <?php if ($customerValues['state'] == "TN") {echo "selected";} ?>>Tennessee</option>
                <option value="TX" <?php if ($customerValues['state'] == "TX") {echo "selected";} ?>>Texas</option>
                <option value="UT" <?php if ($customerValues['state'] == "UT") {echo "selected";} ?>>Utah</option>
                <option value="VT" <?php if ($customerValues['state'] == "VT") {echo "selected";} ?>>Vermont</option>
                <option value="VA" <?php if ($customerValues['state'] == "VA") {echo "selected";} ?>>Virginia</option>
                <option value="WA" <?php if ($customerValues['state'] == "WA") {echo "selected";} ?>>Washington</option>
                <option value="WV" <?php if ($customerValues['state'] == "WV") {echo "selected";} ?>>West Virginia</option>
                <option value="WI" <?php if ($customerValues['state'] == "WI") {echo "selected";} ?>>Wisconsin</option>
                <option value="WY" <?php if ($customerValues['state'] == "WY") {echo "selected";} ?>>Wyoming</option>
              </select>
              <div class="invalid-feedback">
                Invalid state.
              </div>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" class="form-control" name="zip" id="zip" placeholder="" value="<?php print_r($customerValues['zip']);?>">
              <div class="invalid-feedback">
                Invalid zip code
              </div>
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <select class="form-select" name="country" id="country">
                <option value="">Choose...</option>
                <option  <?php if($customerValues['country'] == "USA") echo "selected";?>>USA</option>
              </select>
              <div class="invalid-feedback">
                Invalid country
              </div>
            </div>

            <div class="col-sm-6">
              <label for="phone" class="form-label">Phone</label>
              <input type="text" class="form-control" name="phone" id="phone" placeholder="###-###-####" value="<?php print_r($customerValues['phone']);?>">
              <div class="invalid-feedback">
                Invalid phone
              </div>
            </div>

            <div class="col-sm-6">
              <label for="fax" class="form-label">Fax</label>
              <input type="text" class="form-control" name="fax" id="fax" placeholder="###-###-####" value="<?php print_r($customerValues['fax']);?>">
              <div class="invalid-feedback">
                Invalid fax
              </div>
            </div>


            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" value="<?php print_r($customerValues['email']);?>">
              <div class="invalid-feedback">
                Invalid email
              </div>
            </div>
          </div>
          <hr class="my-4">
          <input class="w-100 btn btn-primary btn-lg" name="submit" type="submit" value ="<?php echo $id ? "Modify Customer" : "Create Customer"; ?>"></input>
        </form>
      </div>
    </div>
  <footer class="pt-3 text-body-secondary text-center text-small">
    <p class="mb-1">&copy; 2023 L&M Hardware</p>
    <!-- <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul> -->
  </footer>
</div>