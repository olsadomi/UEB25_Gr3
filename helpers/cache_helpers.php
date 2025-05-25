<?php
require_once __DIR__ . '/../includes/config.php';

function initCache() {
    try {
        if (!file_exists(CACHE_DIR)) {
            if (!mkdir(CACHE_DIR, 0755, true)) {
                throw new Exception("Failed to create cache directory");
            }
        }
    } catch (Exception $e) {
        error_log("Cache initialization error: " . $e->getMessage());
        throw $e;
    }
}

function getCachedData($cacheFile) {
    try {
        if (!CACHE_ENABLED || !file_exists($cacheFile)) {
            return false;
        }
        
        $fileTime = filemtime($cacheFile);
        if (time() - $fileTime > CACHE_EXPIRY) {
            return false; 
        }
        
        $data = file_get_contents($cacheFile);
        if ($data === false) {
            throw new Exception("Failed to read cache file");
        }
        
        $decoded = json_decode($data, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("Cache data decode error: " . json_last_error_msg());
        }
        
        return $decoded;
    } catch (Exception $e) {
        error_log("Cache read error: " . $e->getMessage());
        return false;
    }
}

function saveToCache($cacheFile, $data) {
    try {
        if (!CACHE_ENABLED) return false;
        
        initCache();
        
        $encoded = json_encode($data);
        if ($encoded === false) {
            throw new Exception("Failed to encode data for cache");
        }
        
        $result = file_put_contents($cacheFile, $encoded);
        if ($result === false) {
            throw new Exception("Failed to write to cache file");
        }
        
        return true;
    } catch (Exception $e) {
        error_log("Cache write error: " . $e->getMessage());
        return false;
    }
}

function getFlightsWithCache($type) {
    try {
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
    } catch (Exception $e) {
        error_log("getFlightsWithCache error: " . $e->getMessage());
        return [];
    }
}