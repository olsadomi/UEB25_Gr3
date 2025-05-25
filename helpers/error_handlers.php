<?php


function error_handler($errno, $errstr, $errfile, $errline) {
    $logDir = __DIR__ . '/../logs/';
    file_put_contents($logDir.'path_debug.log', 
        "LogDir: $logDir\n".
        "Realpath: ".realpath($logDir)."\n".
        "Writable: ".(is_writable($logDir)?'yes':'no')."\n"
    );

    $errorTypes = [
        E_ERROR => 'Error',
        E_WARNING => 'Warning',
        E_PARSE => 'Parse Error',
        E_NOTICE => 'Notice',
        E_CORE_ERROR => 'Core Error',
        E_CORE_WARNING => 'Core Warning',
        E_COMPILE_ERROR => 'Compile Error',
        E_COMPILE_WARNING => 'Compile Warning',
        E_USER_ERROR => 'User Error',
        E_USER_WARNING => 'User Warning',
        E_USER_NOTICE => 'User Notice',
        E_STRICT => 'Strict Notice',
        E_RECOVERABLE_ERROR => 'Recoverable Error',
        E_DEPRECATED => 'Deprecated',
        E_USER_DEPRECATED => 'User Deprecated'
    ];
    

    $errorType = $errorTypes[$errno] ?? 'Unknown Error';

    $logMessage = sprintf(
        "[%s] %s: %s in %s on line %d\n",
        date('Y-m-d H:i:s'),
        $errorType,
        $errstr,
        $errfile,
        $errline
    );
    

    if (!empty($errcontext)) {
        $logMessage .= "Context: " . json_encode($errcontext, JSON_PRETTY_PRINT) . "\n";
    }
    

    $logFile = $logDir . 'error_log_' . date('Y-m-d') . '.txt';
    

    file_put_contents($logFile, $logMessage, FILE_APPEND);
    

    return true;
}

function register_error_handler() {

    set_error_handler('error_handler');

    error_reporting(E_ALL);
    ini_set('display_errors', '0');
    ini_set('log_errors', '1');    
}