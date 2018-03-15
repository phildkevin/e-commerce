<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/bootstrap/fa/css/font-awesome.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

<script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/admin.js') ?>"></script>
<input type="hidden" id="base_url" value="<?= base_url() ?>">


<div class="admin-login" style="min-height:700px;margin-top:-56px;">

  <div class="container-fluid" style="padding-top:100px">
    <div class="row">
      <div class="col-sm-1">

      </div>
      <div class="col-sm-7">
        <div class="card themeBorder" style="height:auto">
          <div class="card-header themeBg textW">
            <h4><i class="fa fa-sign-in"></i> Administrator</h4>
          </div>
            <div class="card-body">
              <form class="loginForm" method="post">
                <div class="form-group">
                  <strong>Email</strong>
                  <input type="text" class="form-control" id="email_login" name="email_login" placeholder="e.g example@mail.com">
                </div>
                <div class="form-group">
                  <strong>Password</strong>
                  <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password">
                </div>
                <div align="right">
                  <button type="submit" class="btn btn-success themeBtn">Submit</button>
                </div>
              </form>
            </div>
          </div>
      </div>
      <div class="col-sm-4">

      </div>
    </div>
  </div>

</div>
