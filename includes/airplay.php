<?php

require_once 'includes/status_messages.php';
require_once 'includes/config.php';
require_once 'includes/wifi_functions.php';


/**
 * Skidded from openvpn.php
 * now using to execute the airplay server
 */
function DisplayAirplay()
{
    echo renderTemplate(
        "airplay"
    );
}
