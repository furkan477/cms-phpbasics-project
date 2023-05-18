<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sorgulamax | BiletBayisi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= assets('plugins/fontawesome-free/css/all.min.css')?> ">
  <link rel="stylesheet" href="<?= assets('plugins/sweetalert2/sweetalert2.css')?> ">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= assets('css/adminlte.min.css')?>">
</head>
<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <a href="javascript:void(0)"><b>Sorgula</b>MAX</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sorgulamax.dev'e başlamak için oturum açın</p>

      <form id="login">
        <div class="input-group mb-3">
          <input id="email" type="email" class="form-control" placeholder="E-mail adresi">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control" placeholder="Şifre">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!--<div class="col-8">
            <div class="icheck-primary mt-2">
              <input type="checkbox" id="remember">
              <label for="remember">
              Beni Hatırla
              </label>
            </div>
          </div> -->
          <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary btn-block">Giriş</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!--<div class="social-auth-links text-center mb-3">
        <p>- Veya -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>Facebook hesabınızı kullanarak giriş yap
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Google hesabınızı kullanarak giriş yap   
        </a>
      </div>
      <p class="mb-1">
        <a href="forgot-password.html">Şifremi Unuttum</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">yeni üyelik kaydı</a>
      </p> -->


    </div>
  </div>
</div>

<!-- jQuery -->
<script src="<?= assets('plugins/jquery/jquery.min.js')?> "></script>
<!-- Bootstrap 4 -->
<script src="<?= assets('plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<script src="<?= assets('plugins/sweetalert2/sweetalert2.all.js')?>"></script>
<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?= assets('js/adminlte.min.js')?>"></script>

<script>

  const login = document.getElementById('login');

  login.addEventListener('submit', (event) => {

    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    let formData = new FormData();
    formData.append('email',email);
    formData.append('password',password);

    console.log(email,password);

    axios.post('<?= $form_link; ?>', formData)
      .then(res => { 

        console.log(res) 

        if (res.data.redirect){
          window.location.href = res.data.redirect;
        }
        
        Swal.fire(
          res.data.title,
          res.data.msg,
          res.data.status
        )
      })
      .catch(err => { console.log(err) })

    event.preventDefault();

  });

</script>

</body>
</html>
