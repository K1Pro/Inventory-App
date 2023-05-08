<!-- <div style="overflow-y: scroll"></div> -->
<div class="container bg-secondary-subtle" style="overflow-y: auto; overflow-x: hidden">
  <!-- <main> -->

    <div class="row g-5 justify-content-center">
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3 text-center">Create a customer</h4>
        <form class="needs-validation" novalidate  action="./index.php?page=Created-Customers" method="post">
          <div class="row g-3">

            <div class="col-12">
              <label for="businessName" class="form-label">Business Name</label>
              <input type="text" class="form-control" name="businessName" id="businessName" placeholder="" required>
              <div class="invalid-feedback">
                Please enter a business name.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" name="firstName" id="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" name="lastName" id="lastName" placeholder="" value="">
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="address2" class="form-label">Address 2 <span class="text-body-secondary">(Optional)</span></label>
              <input type="text" class="form-control" name="address2" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="col-12">
              <label for="city" class="form-label">City</label>
              <input type="text" class="form-control" name="city" id="city" placeholder="" required>
              <div class="invalid-feedback">
                Please enter the city.
              </div>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">State</label>
              <select class="form-select" name="state" id="state" required>
                <option value="">Choose...</option>
                <?php
                  require("./PHP/components/statesSelect.php");
                ?>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" class="form-control" name="zip" id="zip" placeholder="" required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <select class="form-select" name="country" id="country" required>
                <option value="">Choose...</option>
                <option>USA</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="phone" class="form-label">Phone</label>
              <input type="text" class="form-control" name="phone" id="phone" placeholder="###-###-####" value="" required>
              <div class="invalid-feedback">
                Phone is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="fax" class="form-label">Fax</label>
              <input type="text" class="form-control" name="fax" id="fax" placeholder="###-###-####" value="" required>
              <div class="invalid-feedback">
                Fax is optional.
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-body-secondary">(Optional)</span></label>
              <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" required>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Create Customer</button>
        </form>
      </div>
    </div>
  <!-- </main> -->

  <footer class="pt-3 text-body-secondary text-center text-small">
    <p class="mb-1">&copy; 2023 L&M Hardware</p>
    <!-- <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul> -->
  </footer>
</div>