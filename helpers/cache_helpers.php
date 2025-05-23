<?php
require_once __DIR__ . '/../includes/config.php';

function initCache() {
    if (!file_exists(CACHE_DIR)) {
        mkdir(CACHE_DIR, 0755, true);
    }
}

function getCachedData($cacheFile) {
    if (!CACHE_ENABLED || !file_exists($cacheFile)) {
        return false;
    }
    
    $fileTime = filemtime($cacheFile);
    if (time() - $fileTime > CACHE_EXPIRY) {
        return false; 
    }
    
    return json_decode(file_get_contents($cacheFile), true);
}

function saveToCache($cacheFile, $data) {
    if (!CACHE_ENABLED) return false;
    
    initCache();
    file_put_contents($cacheFile, json_encode($data));
    return true;
}

function getFlightsWithCache($type) {
    $cacheFile = ($type === 'arrivals') ? ARRIVALS_CACHE_FILE : DEPARTURES_CACHE_FILE;
    

    $cachedData = getCachedData($cacheFile);
    if ($cachedData !== false) {
        return $cachedData;
    }

    require_once __DIR__ . '/../api/flight_api.php';
    $freshData = getFlights($type);
    

    if (!empty($freshData)) {
        saveToCache($cacheFile, $freshData);
    }
    
    return $freshData;
}
?>