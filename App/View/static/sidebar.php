  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" href="<?= _link('logout') ?>" >
        <i class="fa fa-sign-out-alt"></i>Sign Out
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <div class="image bg-success d-flex align-items-center justify-content-center m-0 p-2">
        <i class="fa fa-plane-departure"></i>
        <span class="brand-text font-weight-light">Uçak Bileti</span>
      </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image bg-success d-flex align-items-center justify-content-center m-0 p-2">
          <i class="fa fa-user"></i>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= sess('name').' '.sess('surname') ?></a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?= _link('') ?>" class="nav-link">
              <i class="nav-icon fa fa-chart-line"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Customers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= _link('customer/add') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= _link('customer/') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Customers</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Project
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= _link('project/add') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= _link('project/') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Project</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
