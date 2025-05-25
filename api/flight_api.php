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

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        
        $response = curl_exec($ch);
        
        if ($response === false) {
            $errorMsg = "API request failed: " . curl_error($ch);
            curl_close($ch);
            throw new Exception($errorMsg);
        }
        
        curl_close($ch);
        
        $data = json_decode($response, true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("JSON decode error: " . json_last_error_msg());
        }
        
        if (isset($data['error'])) {
            throw new Exception($data['error']['info'] ?? 'API error');
        }
        
        if (!isset($data['data'])) {
            throw new Exception("Invalid API response structure");
        }
        
        return $data['data'] ?? [];
    } catch (Exception $e) {
    
        error_log("Flight API Error: " . $e->getMessage());
        
        $cacheFile = ($type === 'arrivals') ? ARRIVALS_CACHE_FILE : DEPARTURES_CACHE_FILE;
        $cachedData = getCachedData($cacheFile);
        
        return $cachedData !== false ? $cachedData : [];
    }
}{}
?>