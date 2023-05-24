<h1 class="visually-hidden">L&M Hardware Sidebar</h1>
      <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <!-- <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg> -->
          <img src="./icons/mainIcon.png" alt="LandMHardware" width="40" height="32">
          <span class="fs-4">L&M Inventory</span>
        </a>
        <hr>
        <ul class="nav nav-pills yellow flex-column mb-auto">
          <li class="nav-item">
            <a href="?page=View-Home" class="nav-link text-white" aria-current="page">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
              Home
            </a>
          </li>
          <li>
            <a href="?page=View-Invoices" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#receipt"></use></svg>
              Invoices
            </a>
          </li>
          <li>
            <a href="?page=View-Invoice-Report" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
              Invoice Report
            </a>
          </li>
          <li>
            <a href="?page=Estimates" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#patchquestion"></use></svg>
              Estimates
            </a>
          </li>
          <li>
            <a href="?page=View-Inventory" class="nav-link text-white">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#tools"></use></svg>
              Inventory
            </a>
          </li>
          <li>
            <a href="?page=View-Customers" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
              Customers
            </a>
          </li>
          <li>
            <a href="?page=View-Users" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#vcard"></use></svg>
              Users
            </a>
          </li>
        </ul>
        <hr>
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <!-- <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2"> -->
            <strong><?php echo ucfirst(htmlspecialchars($_SESSION["username"])); ?></strong>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="?page=Manage-Invoices">Create Invoice & Slip</a></li>
            <li><a class="dropdown-item" href="?page=Manage-Invoices&action=estimate">Create Estimate</a></li>
            <li><a class="dropdown-item" href="?page=Manage-Inventory">Create Inventory</a></li>
            <li><a class="dropdown-item" href="?page=Manage-Customers">Create Customer</a></li>
            <li><a class="dropdown-item" href="?page=Create-Users">Create User</a></li>
            <!-- <li><a id="export" class="dropdown-item" href="?page=Export">Import-Export</a></li> -->
            <li><a class="dropdown-item" href="?page=Reset-Password">Reset Password</a></li>
            <!-- <li><a class="dropdown-item" href="#">Profile</a></li> -->
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Sign Out</a></li>
          </ul>
        </div>
      </div>

      <p>
    
    
</p>
<script src="./JS/sidebar.js"></script>