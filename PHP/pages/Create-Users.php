<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $email = $phone = $type = "";
$username_err = $password_err = $confirm_password_err = $email_err = $phone_err = $type_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT users_id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Validate Email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";     
    } else{
        $email = trim($_POST["email"]);
    }

    // Validate Email
    if(empty(trim($_POST["phone"]))){
        $phone_err = "Please enter a phone.";     
    } else{
        $phone = trim($_POST["phone"]);
    }

    // Validate Account Type
    if(empty(trim($_POST["type"]))){
        $type_err = "Please enter an account type.";     
    } else{
        $type = trim($_POST["type"]);
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, email, phone, type) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_password, $param_email, $param_phone, $param_type);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_email = $email;
            $param_phone = $phone;
            $param_type = $type;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                // header("location: login.php");
                // header("location: ./index.php?page=View-Home");
                // echo "Successfully created new user";
                echo '<script type="text/javascript">',
                    'window.location.replace("./index.php?page=View-Users");',
                    '</script>';
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
 
 <div class="container bg-secondary-subtle">
  <div class="d-flex justify-content-center text-center">
  <center>
    <h4 class="mb-3 text-center">Create a user</h4>
    <!-- <p>Please fill this form to create an account.</p> -->
    <form action="./index.php?page=Create-Users" method="post">
    <?php
    // The above form action needs to redirect to the same page
    // echo htmlspecialchars($_SERVER["PHP_SELF"]);  
    ?>
        <div class="form-group text-start mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control mt-1 <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
        </div>    
        <div class="form-group text-start mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control mt-1 <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group text-start mb-3">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control mt-1 <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
        </div>
        <div class="form-group text-start mb-3" required>
            <label>Email</label>
            <input type="email" name="email" class="form-control mt-1 <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
            <span class="invalid-feedback"><?php echo $email_err; ?></span>
        </div>
        <div class="form-group text-start mb-3" required>
            <label>Phone</label>
            <input type="phone" name="phone" class="form-control mt-1 <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
            <span class="invalid-feedback"><?php echo $phone_err; ?></span>
        </div>
        <div class="form-group text-start mb-3">
            <label>Account Type</label>
              <select name="type" class="form-select mt-1 <?php echo (!empty($type_err)) ? 'is-invalid' : ''; ?>">
                <option value="">Choose...</option>
                <option value="user" <?php if ($type == "user") {echo "selected";} ?>>User</option>
                <option value="administrator" <?php if ($type == "administrator") {echo "selected";} ?>>Administrator</option>
              </select>
              <span class="invalid-feedback"><?php echo $type_err; ?></span>
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
