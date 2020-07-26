<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Login</title>
  <link rel="icon" type="image/x-icon" href="<?=base_url('assets/startbootstrap')?>/assets/img/favicon.ico" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="<?=base_url('assets/startbootstrap')?>/css/styles.css" rel="stylesheet" />
  <link href="<?=base_url('assets/startbootstrap')?>/css/login.css" rel="stylesheet" />
</head>
<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Silakan login dengan ID dan PASSWORD anda</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">ID/Nomor induk:</label><br>
                                <input type="text" name="nomor_induk" id="nomor_induk" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                  <a href="#" class="text-info">Lupa Password?</a><br>
                                  <button type="button" name="submit" class="btn btn-info btn-md submit_login">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url('assets')?>/js/sweetalert.js"></script>
<script type="text/javascript">
$('.submit_login').on('click',function(){
  var nomor_induk = $('#nomor_induk').val();
  var password = $('#password').val();
  $.ajax({
    type : "POST",
    url  : "<?php echo site_url('home/log/admin')?>",
    // dataType : "JSON",
    data : {nomor_induk:nomor_induk,password:password},
    success: function(data){
      window.location.href = "admin";
    },
    error: (function(data) {
      swal ( "Gagal" ,  "ID atau PASSWORD salah!" ,  "error",  {
        buttons: false,
        timer: 1000,
      } );
    })
  });
  return false;
});
</script>
