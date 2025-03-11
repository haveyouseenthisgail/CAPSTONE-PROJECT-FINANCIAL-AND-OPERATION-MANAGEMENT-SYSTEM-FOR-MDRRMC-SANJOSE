<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Login</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page" style="flex-direction:unset;">
  <div class="img__logo" style="position: relative;">
    <img src="/dist/img/custom-img/logo.png" alt="" style="width: 22rem;height:16rem;position:absolute;left:-13rem; top: -8rem;">
  </div>
  <style>
    .invalid {
      color: red;
    }
  </style>
  <div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html">
        <p style="font-weight: 600;">ADMIN LOGIN</p>
      </a>
    </div>

    <div class="card" style="background-color: #d9d9d959 !important;padding:1rem;">
      <div class="card-body login-card-body" style=" background-color: #d9d9d900 !important;">


        <form method="POST" action="inc/controller.php">
          <div class="input-group mb-3" style="display: inline;">
            <label for="username" style="font-size:1.5rem;color:#000;">Username</label>
            <input type="text" name="admin_user" class="form-control" placeholder="Enter Username" style="width: 100%;background-color:#d3d3d3ba;border-radius:4px">

          </div>
          <div class="input-group mb-3" style="display: inline-block;">
            <label for="password" style="font-size:1.5rem;color:#000;">Password</label>
            <input type="password" name="admin_pass" class="form-control" placeholder=" Enter Password" style="width:100%;background-color:#d3d3d3ba;border-radius:4px;">

          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" name="loginBtn" class="btn btn-primary btn-block" style="font-size: 1.2rem;">Login</button>
            </div>
          </div>
          <?php if (isset($_GET['invalid'])): ?>
            <p class="invalid">Sorry, your password was incorrect. Please double-check your password.</p>
          <?php endif; ?>
        </form>


      </div>
    </div>
  </div>

  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="dist/js/adminlte.min.js"></script>
</body>

</html>