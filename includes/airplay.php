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
                exec("sudo /bin/kill $airplaypid", $return, $code);
                $status->addMessage("Stopped the airplay server with pid $airplaypid (returned $code)", 'success');
                foreach ($return as $line) {
                    $status->addMessage($line, 'info');
                }
            }
        } elseif (isset($_POST["killAirplayServer"])) {
            exec("sudo /bin/kill -SIGKILL $airplaypid", $return, $s);
            $status->addMessage("Killed the airplay server with pid $airplaypid (returned $code)", 'danger');
            foreach ($return as $line) {
                $status->addMessage($line, 'info');
            }
        } elseif (isset($_POST["startAirplayServer"])) {
            exec("/usr/local/bin/rpiplay -b on > /dev/null 2>/dev/null &", $return, $code);
            $status->addMessage("Started Airplay server. (returned $code)", "success");
            foreach ($return as $line) {
                $status->addMessage($line, 'info');
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