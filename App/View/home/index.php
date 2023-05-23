<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ana Sayfa</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= assets('plugins/fontawesome-free/css/all.min.css')?> ">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= assets('css/adminlte.min.css')?>">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


<?= $data['sidebar']; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">AnaSayfa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">AnaSayfa</a></li>
              <li class="breadcrumb-item active">AnaSayfa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Toplam Müşteri</span>
                <span class="info-box-number"><?= $data['totals']['total_customer'] ?? 0 ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Toplam Proje</span>
                <span class="info-box-number"><?= $data['totals']['total_project'] ?? 0 ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fa fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sistem Kullanıcısı</span>
                <span class="info-box-number"><?= $data['totals']['system_users'] ?? 0 ?></span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <?php foreach ($data['projects'] as $project): ?>
            <div class="col-lg-6 col-6">
            <!-- small card -->
            <div class="small-box bg-<?= $project['status'] == 'A' ? 'success' : 'danger' ?>">
              <div class="inner">
                <h3><?= $project['total'] ?></h3>

                <p><?= $project['status'] == 'A' ? 'Devam Eden Projeler' : 'Tamamlanmış Projeler' ?></p>
              </div>
              <div class="icon">
                <i class="fas fa-<?= $project['status'] == 'A' ? 'check' : 'plus' ?>"></i>
              </div>
              <a href="<?= _link('project') ?>" class="small-box-footer">
                Tüm Projeler Hakkında<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <?php endforeach; ?>
        </div> 
        <div class="row">
          <div class="col-md-6">
            <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Proje</th>
                      <th>Durum</th>
                      <th>İlerleyiş</th>
                      <th style="width: 40px"><center>Eylem</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count = 1 ?>
                    <?php foreach($data['projects_table'] as $key => $value): ?>
                    <tr id="row_<?= $value['id'] ?>">
                      <td><?= $value['title'];?></td>
                      <td><?= $value['status'] == 'A' ? 'Aktif' : 'Pasif' ;?></td>

                      <td>
                        <?= $value['progress']; ?>%
                        <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: <?= $value['progress']; ?>%"></div>
                        </div>
                    </td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <a href="<?= _link('project/edit/'.$value['id']) ?>" class="btn btn-sm btn-warning">Update</a>
                        </div>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
            </table>
          </div>
          <div class="col-md-6">
            <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Proje</th>
                      <th>Durum</th>
                      <th>İlerleyiş</th>
                      <th style="width: 40px"><center>Eylem</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count = 1 ?>
                    <?php foreach($data['projects_table_2'] as $key => $value): ?>
                    <tr id="row_<?= $value['id'] ?>">
                      <td><?= $value['title'];?></td>
                      <td><?= $value['status'] == 'A' ? 'Aktif' : 'Pasif' ;?></td>

                      <td>
                        <?= $value['progress']; ?>%
                        <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: <?= $value['progress']; ?>%"></div>
                        </div>
                    </td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <a href="<?= _link('project/edit/'.$value['id']) ?>" class="btn btn-sm btn-warning">Update</a>
                        </div>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= assets('plugins/jquery/jquery.min.js')?> "></script>
<!-- Bootstrap 4 -->
<script src="<?= assets('bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?= assets('js/adminlte.min.js')?>"></script>
</body>
</html>
