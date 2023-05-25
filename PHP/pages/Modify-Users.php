<?php
$id = htmlspecialchars($_GET["id"]);
$usersSQL = "SELECT * FROM users WHERE users_id = '".$id."'";
$users = mysqli_query($conn, $usersSQL);
foreach ($users as $usersValues) {};

?>
 <div class="container bg-secondary-subtle">
  <div class="d-flex justify-content-center text-center">
  <center>
    <h4 class="mb-3 text-center">Modify user</h4>
    <form action='./index.php?page=Modified-Users&id=<?php echo $id; ?>' method="post">
        <div class="form-group text-start mb-3">
            <label>Username</label>
            <input type="text" name="username" id="username" class="form-control mt-1" value="<?php print_r($usersValues['username']);?>">
            <span class="invalid-feedback"></span>
        </div>    
        <div class="form-group text-start mb-3" required>
            <label>Email</label>
            <input type="email" name="email" id="email" class="form-control mt-1" value="<?php print_r($usersValues['email']);?>">
            <span class="invalid-feedback"></span>
        </div>
        <div class="form-group text-start mb-3" required>
            <label>Phone</label>
            <input type="phone" name="phone" id="phone" class="form-control mt-1" value="<?php print_r($usersValues['phone']);?>">
            <span class="invalid-feedback"></span>
        </div>
        <div class="form-group text-start mb-3">
            <label>Account Type</label>
              <select name="type" id="type" class="form-select mt-1">
                <option value="">Choose...</option>
                <option value="user" <?php if ($usersValues['type'] == "user") {echo "selected";} ?>>User</option>
                <option value="administrator" <?php if ($usersValues['type'] == "administrator") {echo "selected";} ?>>Administrator</option>
              </select>
              <span class="invalid-feedback"></span>
              <small class="text-body-secondary">*User cannot delete</small>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary mt-3" value="Submit">
            <input type="reset" class="btn btn-secondary ml-2 mt-3" value="Reset">
        </div>
        <!-- <p>Already have an account? <a href="login.php">Login here</a>.</p> -->
    </form>
    </center>
</div>    
</div> 
