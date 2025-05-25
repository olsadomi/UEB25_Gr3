<?php

define('AVIATIONSTACK_API_KEY', 'ef21025fa1da1ada8e3776ac72717fcb');
define('ERROR_REPORTING', true);
define('LOG_ERRORS', true);
define('ERROR_LOG_DIR', __DIR__ . '/../logs/');


define('CACHE_ENABLED', true);
define('CACHE_DIR', __DIR__ . '/../cache');
define('ARRIVALS_CACHE_FILE', CACHE_DIR . '/arrivals.cache');
define('DEPARTURES_CACHE_FILE', CACHE_DIR . '/departures.cache');
define('CACHE_EXPIRY', 3600);

if (ERROR_REPORTING) {
    require_once __DIR__ . '/../helpers/error_handlers.php';
    register_error_handler();

}

error_log("TEST: Config loaded successfully");
file_put_contents(__DIR__.'/../logs/config_test.log', "Config loaded\n");
?>