
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Müşteri Detayı</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= assets('plugins/fontawesome-free/css/all.min.css')?> ">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= assets('css/adminlte.min.css')?>">
  <link rel="stylesheet" href="<?= assets('plugins/summernote/summernote.min.css')?>">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">


    <?= $data['sidebar']; ?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $data['customer']['name'].' '.$data['customer']['surname']?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= _link('') ?>">Keşfet</a></li>
              <li class="breadcrumb-item"><a href="<?= _link('customer') ?>">Müşteriler</a></li>
              <li class="breadcrumb-item active"><?= $data['customer']['name'].' '.$data['customer']['surname']?></li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-widget widget-user-2">
                    <div class="widget-user-header bg-warning">
                        <h3 class="widget-user-username ml-2"><?= $data['customer']['name'].' '.$data['customer']['surname']?></h3>
                        <h5 class="widget-user-desc ml-2"><?= $data['customer']['company'] ?></h5>
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a  class="nav-link">
                                    Projeleri : <?= 'Kullanıcının '.count($data['projects']).' tane Projesi var' ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="mailto:<?= $data['customer']['email'] ?>" class="nav-link">
                                    Email : <?= $data['customer']['email'] ?>
                                 </a>
                            </li>
                            <li class="nav-item">
                                <a href="tel:<?= $data['customer']['phone'] ?>" class="nav-link">
                                    Phone : <?= $data['customer']['phone'] ?>                                
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="tel:<?= $data['customer']['gsm'] ?>" class="nav-link">
                                    GSM : <?= $data['customer']['gsm'] ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>   

            <div class="col-md-8">
              <textarea id="summernote"><?= htmlspecialchars_decode($data['customer']['notes']) ?></textarea>
              <button style="width: 100%;" class="btn btn-sm btn-dark" onclick="saveNote()">Kaydet</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
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
                    <?php foreach($data['projects'] as $key => $value): ?>
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
                          <button onclick="confirm(<?= $value['id'] ?>)" class="btn btn-sm btn-danger">Delete</button>
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



<script src="<?= assets('plugins/jquery/jquery.min.js')?> "></script>
<script src="<?= assets('plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<script src="<?= assets('plugins/sweetalert2/sweetalert2.all.js')?>"></script>
<script src="<?= assets('plugins/summernote/summernote.min.js')?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?= assets('js/adminlte.min.js')?>"></script>


<script>

  $(function (){

    $('#summernote').summernote({
      height: 183,
      toolbar: [

        ['font', ['bold', 'underline', 'clear']],

        ['color', ['color']],

        ['para', ['ul', 'ol', 'paragraph']],

        ['insert', ['link']],

      ],
      placeholder: 'Müşterileriniz ile ilgili notlar alın...',
    });

  })

   function saveNote(){

     var html =  $('#summernote').summernote('code');

      let formData = new FormData();

      formData.append('html',html);

      axios.post('<?= _link('customer/notes/'.$data['customer']['id']) ?>', formData)
          .then(res => { 
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