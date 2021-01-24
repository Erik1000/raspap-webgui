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
                exec("kill $airplaypid", $n, $s);
                $status->addMessage($n, 'info');
                $status->addMessage("Stopped the airplay server with pid $airplaypid ($s)", 'info');
            }
        } elseif (isset($_POST["killAirplayServer"])) {
            exec("kill -SIGKILL $airplaypid", $n, $s);
            $status->addMessage($n, 'info');
            $status->addMessage("Killed the airplay server with pid $airplaypid ($s)", 'danger');

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