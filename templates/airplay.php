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
          <form role="form" action="?page=openvpn_conf" enctype="multipart/form-data" method="POST">
            <?php echo CSRFTokenFieldTag() ?>
            <!-- Tab panes -->
            <div class="tab-content">
                  <label for="audiotype">Send audio via</label>
                  <div class="o-switch btn-group" id="audiotype" data-toggle="buttons" role="group">
                    <label class="btn btn-secondary active">
                      <input type="radio" name="options" id="option1" autocomplete="off" checked>HDMI
                    </label>
                    <label class="btn btn-secondary">
                      <input type="radio" name="options" id="option2" autocomplete="off">Analog
                    </label>
                    <label class="btn btn-secondary">
                      <input type="radio" name="options" id="option3" autocomplete="off">None (disabled)
                    </label>
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

