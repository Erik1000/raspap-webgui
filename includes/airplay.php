<?php

require_once 'includes/status_messages.php';
require_once 'includes/config.php';


/**
 * Skidded from openvpn.php
 * now using to execute the airplay server
 */
function DisplayAirplay()
{
    $status = new StatusMessages();
    exec('pidof rpiplay', $airplaypid, $killable);
    if (!RASPI_MONITOR_ENABLED) {
        if (isset($_POST["stopAirplayServer"])) {
            if ($killable == 0) {
                exec("sudo /usr/local/bin/stop_rpiplay.sh", $return, $code);
                $status->addMessage("Stopped the airplay server ($code).", 'success');
                foreach ($return as $line) {
                    $status->addMessage($line, 'info');
                }
            }
            $killable = 1;
        } elseif (isset($_POST["killAirplayServer"])) {
            if ($killable == 0) {
                exec("sudo /usr/local/bin/kill_rpiplay.sh", $return, $code);
                $status->addMessage("Killed the airplay server ($code).", 'success');
                foreach ($return as $line) {
                    $status->addMessage($line, 'info');
                }
                $killable = 1;
            }
        } elseif (isset($_POST["startAirplayServer"])) {
            if ($killable != 0) {
                $lowlatencymode = FALSE;
                $audiotype = "analog";
                $blackscreen = "auto";
                $rotate = "0";
                $flip = "";
                $displayname = "Raspberry Pi";
                if (isset($_POST["displayname"])) {
                    $displayname = escapeshellarg($_POST["displayname"]);
                }
                if (isset($_POST["audiotype"])) {
                    if ($_POST["audiotype"] == "hdmi") {
                        $audiotype = "hdmi";
                    } elseif ($_POST["audiotype"] == "analog") {
                        $audiotype = "analog";
                    } elseif ($_POST["audiotype"] == "off") {
                        $audiotype = "off";
                    }
                }
                if (isset($_POST["blackscreen"])) {
                    if ($_POST["blackscreen"] == "auto") {
                        $blackscreen = "auto";
                    } elseif ($_POST["blackscreen"] == "on") {
                        $blackscreen = "on";
                    } elseif ($_POST["blackscreen"] == "off") {
                        $blackscreen = "off";
                    }
                }
                if (isset($_POST["rotate"])) {
                    if ($_POST["rotate"] == "0" or $_POST["rotate"] == "90" or $_POST["rotate"] == "180" or $_POST["rotate"] == "270") {
                        $rotate = $_POST["rotate"];
                    }
                }
                if (isset($_POST["flipscreen"])) {
                    if ($_POST["flipscreen"] == "horiz" or $_POST["flipscreen"] == "vert" or $_POST["flipscreen"] == "both") {
                        $flip = $_POST["flipscreen"];
                    }
                }
                if (isset($_POST["lowlatencymode"])) {
                    $lowlatencymode = TRUE;
                }
                if ($lowlatencymode) {
                    exec("sudo /usr/local/bin/rpiplay -n $displayname -b $blackscreen -r $rotate -f $flip -a $audiotype -l > /dev/null 2>/dev/null &", $return, $code);
                } else {
                    exec("sudo /usr/local/bin/rpiplay -n $displayname -b $blackscreen -r $rotate -f $flip -a $audiotype > /dev/null 2>/dev/null &", $return, $code);
                }
                $status->addMessage("Started Airplay server. (returned $code)", "success");
                foreach ($return as $line) {
                    $status->addMessage($line, 'info');
                }
                $killable = 0;
            }
        }
    }

    $serviceStatus = $killable == 0 ? "up" : "down";
    echo renderTemplate(
        "airplay", compact(
            "status",
            "serviceStatus",
            "killable"
        )
    );
}