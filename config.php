<?php

    $config['BASED_URL'] = "http://localhost/ams";
    $config['SERVER_HOST'] = "http://localhost:8000";
    $config['API_KEY'] = "somesupersecretkeyhere";
    $config['ACTIVE_LINK'] = basename("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", ".php");

    