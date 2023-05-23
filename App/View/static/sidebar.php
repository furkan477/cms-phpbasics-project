<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?= _link('logout') ?>" >
        <i class="fa fa-sign-out-alt"></i>Çıkış Yap
        </a>
      </li>
    </ul>
  </nav>


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= _link('profile') ?>" class="brand-link">
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
          <a href="<?= _link('profile') ?>" class="d-block"><?= sess('name').' '.sess('surname') ?></a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?= _link('') ?>" class="nav-link">
              <i class="nav-icon fa fa-chart-line"></i>
              <p>
                Keşfet
                <span class="right badge badge-danger">Yeni</span>
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a class="nav-link active">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Müşteriler
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= _link('customer/add') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Müşteri Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= _link('customer/') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tüm Müşteriler</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <a class="nav-link active">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Projeler
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= _link('project/add') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proje Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= _link('project/') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tüm Projeler</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
