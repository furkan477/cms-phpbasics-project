<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Müşteri Listele</title>

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
            <h1 class="m-0">Müşteri Listele</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= _link('') ?>">Keşfet</a></li>
              <li class="breadcrumb-item active">Müşteri Listele</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Müşteri</th>
                      <th style="width: 40px"><center>Eylem</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count = 1 ?>
                    <?php foreach($data['customers'] as $key => $value): ?>
                    <tr id="row_<?= $value['id'] ?>">
                      <td><?= $value['name'].' '.$value['surname'] ?></td>
                      
                      <td>
                        <div class="btn-group btn-group-md">
                          <button onclick="confirm(<?= $value['id'] ?>)" class="btn btn-md btn-danger">Delete</button>
                          <a href="<?= _link('customer/edit/'.$value['id']) ?>" class="btn btn-md btn-warning">Update</a>
                          <a href="<?= _link('customer/detail/'.$value['id']) ?>" class="btn btn-md btn-info">Detail</a>
                        </div>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
      </table>
    </div>
  </div>



  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>

<script src="<?= assets('plugins/jquery/jquery.min.js')?> "></script>
<!-- Bootstrap 4 -->
<script src="<?= assets('plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?= assets('plugins/sweetalert2/sweetalert2.all.js')?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?= assets('js/adminlte.min.js')?>"></script>


<script>

function confirm(id){

  Swal.fire({
    title: 'Kullanıcıyı Silmek İstediğinize Emin misiniz ? ',
    icon: 'info',
    showDenyButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    denyButtonText: `Hayır ,Değilim`,
    confirmButtonText: 'Evet ,Eminim'

  }).then((result) => {
    if (result.isConfirmed) {
        removeCustomer(id)
    } else if (result.isDenied) {
        Swal.fire('Kullanıcı Halen Yerinde Durmaktadır', '', 'info')
    }
  })
}



  function removeCustomer(id){
    let customer_id = id;

    let formData = new FormData();
    formData.append('customer_id',customer_id);

    axios.post('<?= _link('customer/remove') ?>', formData)
      .then(res => { 

        console.log(res) 
        
        if (res.data.remove){
          document.getElementById('row_'+ res.data.remove).remove();
        }

        Swal.fire(
          res.data.title,
          res.data.msg,
          res.data.status
        )

      })
      .catch(err => { console.log(err) })
  }

</script>

</body>
</html>
