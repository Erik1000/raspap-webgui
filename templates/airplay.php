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
            <label for="audio-outpu">Audio via</label>
              <div class="o-switch btn-group" id="audio-output" data-toggle="buttons" role="group">
                <label class="btn btn-secondary active">
                  <input type="radio" name="options" id="hdmi" autocomplete="off" checked>HDMI
                </label>
                <label class="btn btn-secondary">
                  <input type="radio" name="options" id="analog" autocomplete="off">Analog
                </label>
                <label class="btn btn-secondary">
                  <input type="radio" name="options" id="none" autocomplete="off">None (disabled)
                </label>
              </div>
            </div>
          </div>
          <input type="submit" class="btn btn-outline btn-primary" name="startAirplay" value="Start Airplay Server" />
        </form>
      </div><!-- /.card-body -->
      <div class="card-footer"></div>
    </div><!-- /.card -->
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
