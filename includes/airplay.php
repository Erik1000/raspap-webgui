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
    exec('pidof rpiplay | wc -l', $airplaystatus);

    if (!RASPI_MONITOR_ENABLED) {
        if (isset($_POST['SaveOpenVPNSettings'])) {
            if (isset($_POST['authUser'])) {
            }
            if (isset($_POST['authPassword'])) {
                $authPassword = strip_tags(trim($_POST['authPassword']));
            }
            $return = SaveOpenVPNConfig($status, $_FILES['customFile'], $authUser, $authPassword);
        } elseif (isset($_POST['StartOpenVPN'])) {
            $status->addMessage('Attempting to start OpenVPN', 'info');
            exec('sudo /bin/systemctl start openvpn-client@client', $return);
            exec('sudo /bin/systemctl enable openvpn-client@client', $return);
            foreach ($return as $line) {
                $status->addMessage($line, 'info');
            }
        } elseif (isset($_POST['StopOpenVPN'])) {
            $status->addMessage('Attempting to stop OpenVPN', 'info');
            exec('sudo /bin/systemctl stop openvpn-client@client', $return);
            exec('sudo /bin/systemctl disable openvpn-client@client', $return);
            foreach ($return as $line) {
                $status->addMessage($line, 'info');
            }
        }
    }
    $serviceStatus = $airplaystatus[0] == 0 ? "down" : "up";
    echo renderTemplate(
        "airplay", compact(
            "status",
            "serviceStatus",
            "airplaystatus"
        )
    );
}
