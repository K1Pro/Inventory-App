<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
  <?php
    require("./PHP/components/defaultHeader.php");
  ?>
  <body class="bg-secondary-subtle">
    <?php
      // This was included in the Bootstrap Sidebars Modules, not needed for now
      // require("./HTML/Bootstrap/SideBarsThemeSymbols.html");
      // require("./HTML/Bootstrap/SideBarsTheme.html");
      require("./HTML/Bootstrap/SideBarsSymbols.html");
    ?>
    <main class="d-flex flex-nowrap">
      <?php
        require("./PHP/components/sideBar.php");
      ?>
      <div class="b-example-divider b-example-vr"></div>
      <!-- <div style="padding: 10px;"></div> -->
      <?php
        $page = htmlspecialchars($_GET["page"]) ? htmlspecialchars($_GET["page"]) : "View-Home";
        require("./PHP/pages/" . $page . ".php");
      ?>
    </main>
    <?php
      require("./PHP/components/bootstrap.php");
    ?>
  </body>
</html>