<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
	        <div class="col">
						<i class="fas fa-user-lock mr-2">AirPlay
          </div>
        </div><!-- /.row -->
      </div><!-- /.card-header -->
      <div class="card-body">
        <h4>Airplay server settings</h4>
        <form role="form" action="?page=auth_conf" method="POST">
            <?php echo CSRFTokenFieldTag() ?>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="username"><?php echo _("Username"); ?></label>
              <input type="text" class="form-control" name="username" value="<?php echo htmlspecialchars($username, ENT_QUOTES); ?>"/>
            </div>
          </div>
          <input type="submit" class="btn btn-outline btn-primary" name="UpdateAdminPassword" value="Start" />
        </form>
      </div><!-- /.card-body -->
      <div class="card-footer"></div>
    </div><!-- /.card -->
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
