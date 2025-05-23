<?php
function formatFlightTime($dateString) {
    if (empty($dateString)) return 'N/A';
    try {
        $date = new DateTime($dateString);
        return $date->format('H:i');
    } catch (Exception $e) {
        return 'N/A';
    }
}

function formatFlightDate($dateString) {
    if (empty($dateString)) return 'N/A';
    try {
        $date = new DateTime($dateString);
        return $date->format('d/m/Y');
    } catch (Exception $e) {
        return 'N/A';
    }
}

function translateFlightStatus($status) {
    $statusMap = [
        'scheduled' => 'Scheduled',
        'active' => 'In Flight',
        'landed' => 'Landed',
        'cancelled' => 'Cancelled',
        'diverted' => 'Diverted',
        'unknown' => 'Unknown'
    ];
    return $statusMap[strtolower($status)] ?? $status;
}

function getFlightDateType($dateString) {
    if (empty($dateString)) return 'unknown';
    
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
        return 'unknown';
    }
}

function getFlightDetailsJson($flight, $type = 'arrival') {
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
    
    return htmlspecialchars(json_encode($details), ENT_QUOTES, 'UTF-8');
}
?>