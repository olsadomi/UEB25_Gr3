<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/helpers/flight_helpers.php';

echo "Testing formatFlightTime:\n";
echo "Valid: " . formatFlightTime('2023-11-15T14:30:00+00:00') . "\n";
echo "Invalid: " . formatFlightTime('invalid-date') . "\n";
echo "Empty: " . formatFlightTime('') . "\n\n";

echo "Testing translateFlightStatus:\n";
echo "Known: " . translateFlightStatus('scheduled') . "\n";
echo "Unknown: " . translateFlightStatus('ghost_flight') . "\n";
echo "Empty: " . translateFlightStatus('') . "\n\n";

$testFlight = [
    'flight' => ['iata' => 'PR123'],
    'departure' => [
        'scheduled' => '2023-11-15T08:00:00+00:00',
        'terminal' => 'T1',
        'gate' => 'G5',
        'airport' => 'Heathrow',
        'iata' => 'LHR'
    ],
    'arrival' => [
        'scheduled' => '2023-11-15T11:30:00+00:00',
        'airport' => 'Prishtina',
        'iata' => 'PRN'
    ]
];

echo "Testing getFlightDetailsJson:\n";
echo "Arrival: " . substr(getFlightDetailsJson($testFlight, 'arrival'), 0, 50) . "...\n";
echo "Departure: " . substr(getFlightDetailsJson($testFlight, 'departure'), 0, 50) . "...\n";
echo "Invalid: " . getFlightDetailsJson([], 'arrival') . "\n";


// Manually trigger different error types
error_log("Direct error_log test"); // System logger
trigger_error("Test E_USER_NOTICE", E_USER_NOTICE);
trigger_error("Test E_USER_WARNING", E_USER_WARNING);

// Test file writing directly
file_put_contents(__DIR__.'/logs/direct_write.log', "Test direct write\n");