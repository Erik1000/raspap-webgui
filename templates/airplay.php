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
                <span class="icon text-gray-600"><i class="fas fa-circle service-status-<?php echo $serviceStatus ?>"></i></span>
                <span class="text service-status">airplay server <?php echo _($serviceStatus) ?></span>
              </button>
            </div>
          </div><!-- /.row -->
        </div><!-- /.card-header -->
        <div class="card-body">
        <?php $status->showMessages(); ?>
          <form role="form" action="?page=airplay" enctype="multipart/form-data" method="POST">
            <?php echo CSRFTokenFieldTag() ?>
            <!-- Tab panes -->
            <div class="tab-content">
            <?php if ($airplaystatus[0] == 0) { ?>
                  <div class="form-group">
                    <label for="audiotype">Send audio via:</label>
                    <select class="form-control" name="audiotype" id="audiotype" aria-describedby="audiotype-description">
                      <option value="hdmi" selected="selected">HDMI</option>
                      <option value="analog">analog</option>
                      <option value="none">disabled</option>
                    </select>
                    <p class="mb-0" id="audiotype-description">
                      <small>If you select "disabled", it won't output anything but you still have to change the audio output on the client device.</small>
                    </p>
                  </div>
                  <div class="form-group">
                    <label for="blackscreen">Display black screen:</label>
                    <select class="form-control" name="blackscreen" id="blackscreen">
                      <option value="auto" selected="selected">during active connection</option>
                      <option value="always">always</option>
                      <option value="never">never</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="rotate">Rotate screen by:</label>
                    <select class="form-control" name="rotate" id="rotate">
                      <option value="0" selected="selected">0°</option>
                      <option value="90">90°</option>
                      <option value="180">180°</option>
                      <option value="270">270°</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="flipscreen">Flip screen:</label>
                    <select class="form-control" name="flipscreen" id="flipscreen">
                      <option value="no" selected="selected">no</option>
                      <option value="horiz">horizontal</option>
                      <option value="vert">vertical</option>
                      <option value="both">both</option>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <div class="custom-control custom-switch">
                      <input class="custom-control-input" id="chklowlatencymode" type="checkbox" name="lowlatencymode" value="1" aria-describedby="lowlatencymode-description">
                      <label class="custom-control-label" for="chklowlatencymode">Use low latency mode</label>
                    </div>s
                    <p class="mb-0" id="lowlatencymode-description">
                      <small>This mode is good for screen sharing but movies may be blurry.</small>
                    </p>
                  </div>
                  <input type="submit" class="btn btn-success" name="startAirplayServer" value="Start Airplay server" />
            <?php
            } else {
              echo '<input type="submit" class="btn btn-danger" name="stopAirplayServer" value="Stop Airplay server" />';
            }
            ?>
              </form>
            </div>
        </div><!-- /.card-body -->
    <div class="card-footer"> Changed by Erik1000</div>
  </div><!-- /.card -->
</div><!-- /.col-lg-12 -->
</div><!-- /.row -->