<?php
// ───── [ METRIC 2: TEST PASS RATE ] ───── //
// Define mock tests for demo purposes
$tests = [
    ['name' => 'Booking Page Loads',        'status' => 'pass'],
    ['name' => 'Booking Cancel Works',      'status' => 'fail'],
    ['name' => 'PDF Export Works',          'status' => 'pass'],
    ['name' => 'Unauthorized Redirect',     'status' => 'pass'],
];

// Count total and passed
$totalTests = count($tests);
$passedTests = 0;

foreach ($tests as $test) {
    if ($test['status'] === 'pass') {
        $passedTests++;
    }
}

// Calculate pass rate
$passRate = $totalTests ? ($passedTests / $totalTests) * 100 : 0;

// Display results
echo "<h2>Test Pass Rate</h2>";
echo "<p><strong>" . number_format($passRate, 1) . "%</strong> tests passed ({$passedTests} out of {$totalTests})</p>";
echo "<ul>";
foreach ($tests as $test) {
    echo "<li>{$test['name']}: <strong>{$test['status']}</strong></li>";
}
echo "</ul>";
?>
