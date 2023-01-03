<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Laporan masyarakat | baruna.id</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/login/images/icons/favicon.ico"/>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/vendor/animate/animate.css">
  <!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/vendor/select2/select2.min.css">
  <!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/css/main.css">
  <!--===============================================================================================-->
</head>
<body>

  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST">
          <span class="login100-form-title">
            Laporan Masyarakat <br> baruna.id
          </span>
          <?php if ($this->session->flashdata('error')) { ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <strong>Error!</strong> Email atau Password yang Anda masukan salah !
         </div>
         <?php } if ($this->session->flashdata('success')) { ?>
         <div class="alert alert-success alert-dismissible" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <strong>Success</strong> Silahkan Sign IN dengan email dan password Anda !
         </div>
         <?php } ?>

         <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email">
          <input class="input100" type="email" value=" <?= set_value('email') ?>" name="email" placeholder="email">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Please enter password">
          <input class="input100" type="password" name="pass"  placeholder="Password">
          <span class="focus-input100"></span>
        </div>

        <div class="text-right p-t-13 p-b-23">
          <span class="txt1">
            Forgot
          </span>

          <a href="#" class="txt2">
            Username / Password?
          </a>
        </div>

        <div class="container-login100-form-btn">
          <button class="login100-form-btn">
            Sign in
          </button>
        </div>

        <div class="flex-col-c p-t-30 p-b-40">
          <span class="txt1 p-b-9">
            Don’t have an account?
          </span>

          <a href="<?php echo base_url() ?>login/registration" class="txt3">
            Sign up now
          </a>
        </div>
      </form>
    </div>
  </div>
</div>


<!--===============================================================================================-->
<script src="<?php echo base_url() ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url() ?>assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url() ?>assets/login/vendor/bootstrap/js/popper.js"></script>
<script src="<?php echo base_url() ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url() ?>assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url() ?>assets/login/vendor/daterangepicker/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url() ?>assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url() ?>assets/login/js/main.js"></script>

</body>
</html>