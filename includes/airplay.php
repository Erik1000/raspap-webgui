<?php

require_once 'includes/status_messages.php';
require_once 'includes/config.php';
require_once 'includes/wifi_functions.php';

getWifiInterface();

/**
 * Skidded from openvpn.php
 * now using to execute the airplay server
 */
function DisplayAirplay()
{

    exec('pidof openvpn | wc -l', $openvpnstatus);
    exec('wget https://ipinfo.io/ip -qO -', $return);


    echo renderTemplate(
        "openvpn", compact(
            "status",
            "serviceStatus",
            "openvpnstatus",
            "public_ip",
            "authUser",
            "authPassword"
        )
    );
}
