<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../helpers/cache_helpers.php';

function getFlights($type = 'arrivals') {
    $endpoint = 'http://api.aviationstack.com/v1/flights';
    
    $params = [
        'access_key' => AVIATIONSTACK_API_KEY,
        'limit' => 20
    ];

    $params[($type === 'arrivals') ? 'arr_iata' : 'dep_iata'] = 'PRN';

    $url = $endpoint . '?' . http_build_query($params);
    
    try {
        $response = file_get_contents($url);
        if ($response === false) {
            throw new Exception("API request failed");
        }
        
        $data = json_decode($response, true);
        
        if (isset($data['error'])) {
            throw new Exception($data['error']['info'] ?? 'API error');
        }
        
        return $data['data'] ?? [];
    } catch (Exception $e) {
        error_log("API Error: " . $e->getMessage());
        
        $cacheFile = ($type === 'arrivals') ? ARRIVALS_CACHE_FILE : DEPARTURES_CACHE_FILE;
        $cachedData = getCachedData($cacheFile);
        
        return $cachedData !== false ? $cachedData : [];
    }
}
?>