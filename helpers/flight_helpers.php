<?php
function formatFlightTime($dateString) {
    if (empty($dateString)) {
        error_log("Empty date string provided to formatFlightTime");
        return 'N/A';
    }
    
    try {
        $date = new DateTime($dateString);
        return $date->format('H:i');
    } catch (Exception $e) {
        error_log("DateTime format error (time): " . $e->getMessage() . " for input: " . $dateString);
        return 'N/A';
    }
}

function formatFlightDate($dateString) {
    if (empty($dateString)) {
        error_log("Empty date string provided to formatFlightDate");
        return 'N/A';
    }
    
    try {
        $date = new DateTime($dateString);
        return $date->format('d/m/Y');
    } catch (Exception $e) {
        error_log("DateTime format error (date): " . $e->getMessage() . " for input: " . $dateString);
        return 'N/A';
    }
}

function translateFlightStatus($status) {
    if (empty($status)) {
        error_log("Empty status provided to translateFlightStatus");
        return 'Unknown';
    }
    
    try {
        $statusMap = [
            'scheduled' => 'Scheduled',
            'active' => 'In Flight',
            'landed' => 'Landed',
            'cancelled' => 'Cancelled',
            'diverted' => 'Diverted',
            'unknown' => 'Unknown'
        ];
        
        $lowerStatus = strtolower($status);
        if (!array_key_exists($lowerStatus, $statusMap)) {
            error_log("Unknown flight status encountered: " . $status);
        }
        
        return $statusMap[$lowerStatus] ?? $status;
    } catch (Exception $e) {
        error_log("Error in translateFlightStatus: " . $e->getMessage());
        return $status;
    }
}

function getFlightDateType($dateString) {
    if (empty($dateString)) {
        error_log("Empty date string provided to getFlightDateType");
        return 'unknown';
    }
    
    try {
        $flightDate = new DateTime($dateString);
        $today = new DateTime();
        $tomorrow = (new DateTime())->modify('+1 day');
        
        if ($flightDate->format('Y-m-d') === $today->format('Y-m-d')) {
            return 'today';
        } elseif ($flightDate->format('Y-m-d') === $tomorrow->format('Y-m-d')) {
            return 'tomorrow';
        }
        return 'other';
    } catch (Exception $e) {
        error_log("DateTime error in getFlightDateType: " . $e->getMessage() . " for input: " . $dateString);
        return 'unknown';
    }
}

function getFlightDetailsJson($flight, $type = 'arrival') {
    try {
        if (!is_array($flight)) {
            throw new Exception("Invalid flight data format - expected array");
        }
        
      
        if (!isset($flight['flight']) || !is_array($flight['flight'])) {
            throw new Exception("Missing or invalid flight information");
        }
        
        if ($type === 'arrival' && (!isset($flight['departure']) || !is_array($flight['departure']))) {
            throw new Exception("Missing departure data for arrival flight");
        }
        
        if ($type !== 'arrival' && (!isset($flight['arrival']) || !is_array($flight['arrival']))) {
            throw new Exception("Missing arrival data for departure flight");
        }
        
        $details = [
            'title' => "Flight Details: " . ($flight['flight']['iata'] ?? 'N/A'),
            'details' => $type === 'arrival'
                ? sprintf("Departed at %s,\nFrom: %s",
                    formatFlightTime($flight['departure']['scheduled'] ?? ''),
                    $flight['departure']['terminal'] ?? 'Terminal not specified')
                : sprintf("Check-in From: %s,\nGate: %s",
                    $flight['departure']['gate'] ?? 'Not assigned',
                    $flight['departure']['terminal'] ?? 'Not assigned'),
            'scheduled' => $type === 'arrival'
                ? sprintf("Scheduled arrival time: %s \nAt: %s",
                    formatFlightDate($flight['arrival']['scheduled'] ?? ''),
                    formatFlightTime($flight['arrival']['scheduled'] ?? ''))
                : sprintf("Scheduled departure time: %s \nAt: %s",
                    formatFlightDate($flight['departure']['scheduled'] ?? ''),
                    formatFlightTime($flight['departure']['scheduled'] ?? '')),
            'countryFrom' => $type === 'arrival'
                ? sprintf("From: %s (%s)", 
                    $flight['departure']['airport'] ?? 'Unknown',
                    $flight['departure']['iata'] ?? '')
                : sprintf("From: Kosovo, Prishtina (PRN)"),
            'countryDestination' => $type === 'arrival'
                ? "To: Kosovo, Prishtina (PRN)"
                : sprintf("To: %s (%s)",
                    $flight['arrival']['airport'] ?? 'Unknown',
                    $flight['arrival']['iata'] ?? '')
        ];
        
        $json = json_encode($details);
        if ($json === false) {
            throw new Exception("JSON encode error: " . json_last_error_msg());
        }
        
        $escaped = htmlspecialchars($json, ENT_QUOTES, 'UTF-8');
        if ($escaped === false) {
            throw new Exception("HTML specialchars encoding failed");
        }
        
        return $escaped;
    } catch (Exception $e) {
        error_log("Error in getFlightDetailsJson: " . $e->getMessage());
        
      
        $defaultDetails = [
            'title' => 'Flight Details Error',
            'details' => 'Could not load flight details',
            'scheduled' => 'Information not available',
            'countryFrom' => 'Unknown',
            'countryDestination' => 'Unknown'
        ];
        
        return htmlspecialchars(json_encode($defaultDetails), ENT_QUOTES, 'UTF-8');
    }
}

function logHelperError($functionName, $message, $context = []) {
    $logMessage = sprintf(
        "[%s] Helper Error in %s: %s",
        date('Y-m-d H:i:s'),
        $functionName,
        $message
    );
    
    if (!empty($context)) {
        $logMessage .= " | Context: " . json_encode($context);
    }
    
    error_log($logMessage);
}