<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col">
              <i class="fas fa-key fa-fw mr-2"></i>AirPlay
            </div>
            <div class="col">
              <button class="btn btn-light btn-icon-split btn-sm service-status float-right">
                <span class="icon text-gray-600"><i class="fas fa-circle service-status-green"></i></span>
                <span class="text service-status">airplay server up/down add here</span>
              </button>
            </div>
          </div><!-- /.row -->
        </div><!-- /.card-header -->
        <div class="card-body">
        <?php $status->showMessages(); ?>
          <form role="form" action="?page=openvpn_conf" enctype="multipart/form-data" method="POST">
            <?php echo CSRFTokenFieldTag() ?>
            <!-- Tab panes -->
            <div class="tab-content">
              <?php if (!RASPI_MONITOR_ENABLED) : ?>
                  <input type="submit" class="btn btn-outline btn-primary" name="SaveOpenVPNSettings" value="Save settings" />
                  <?php if ($openvpnstatus[0] == 0) {
                      echo '<input type="submit" class="btn btn-success" name="StartOpenVPN" value="Start OpenVPN" />' , PHP_EOL;
                    } else {
                      echo '<input type="submit" class="btn btn-warning" name="StopOpenVPN" value="Stop OpenVPN" />' , PHP_EOL;
                    }
                  ?>
              <?php endif ?>
              </form>
            </div>
        </div><!-- /.card-body -->
    <div class="card-footer"> Changed by Erik1000</div>
  </div><!-- /.card -->
</div><!-- /.col-lg-12 -->
</div><!-- /.row -->

