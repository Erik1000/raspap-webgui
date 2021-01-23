<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col">
              <i class="fas fa-film fa-fw mr-2"></i>AirPlay
            </div>
            <div class="col">
              <button class="btn btn-light btn-icon-split btn-sm service-status float-right">
                <span class="icon text-gray-600"><i class="fas fa-circle service-status-down"></i></span>
                <span class="text service-status">airplay server up/down add here</span>
              </button>
            </div>
          </div><!-- /.row -->
        </div><!-- /.card-header -->
        <div class="card-body">
          <form role="form" action="?page=airplay" enctype="multipart/form-data" method="POST">
            <?php echo CSRFTokenFieldTag() ?>
            <!-- Tab panes -->
            <div class="tab-content">
                  <div class="form-group">
                    <label for="audiotype">Send audio via:</label>
                    <select class="form-control" name="interface" id="audiotype">
                      <option value="hdmi" selected="selected">HDMI</option>
                      <option value="analog">Analog</option>
                      <option value="none">None (disabled)</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-switch">
                      <input class="custom-control-input" id="chkfallback" type="checkbox" name="Fallback" value="1" aria-describedby="fallback-description">
                      <label class="custom-control-label" for="chkfallback">Use low latency mode</label>
                    </div>
                    <p class="mb-0" id="fallback-description">
                      <small>Add this later</small>
                    </p>
                  </div>
                  <input type="submit" class="btn btn-success" name="startAirplayServer" value="Start Airplay server" />
                  <input type="submit" class="btn btn-danger" name="stopAirplayServer" value="Stop Airplay server" />
              </form>
            </div>
        </div><!-- /.card-body -->
    <div class="card-footer"> Changed by Erik1000</div>
  </div><!-- /.card -->
</div><!-- /.col-lg-12 -->
</div><!-- /.row -->

