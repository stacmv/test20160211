<?php
define("APP_DIR", "app/");
define("ASSETS_DIR", "assets/");
define("TEMPLATES_DIR", APP_DIR . "templates/");
define("TEMP_DIR", ".tmp/");

$CFG = new \Stacmv\Config(APP_DIR . "settings/settings.ini");

// Base dir
$CFG["url_base"] = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]); if (substr($CFG["url_base"],-1)!="/") $CFG["url_base"] .="/"; 

