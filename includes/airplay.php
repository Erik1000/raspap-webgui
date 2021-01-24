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
            if ($killable) {
                exec("sudo /bin/kill $airplaypid", $return, $code);
                $status->addMessage("Stopped the airplay server with pid $airplaypid (returned $code)", 'info');
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
            echo "TODO";
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