<?php
function calculateCyclomaticComplexity($code) {
    $decision_keywords = ['if', 'else if', 'while', 'for', 'foreach', 'case', 'catch', '?'];
    $count = 0;

    foreach ($decision_keywords as $keyword) {
        $count += substr_count($code, $keyword);
    }

    // Cyclomatic Complexity = number of decision points + 1
    return $count + 1;
}

// Example usage
$file = 'mybookings.php'; // <-- Make sure this file exists in the same directory!

if (file_exists($file)) {
    $code = file_get_contents($file);
    $complexity = calculateCyclomaticComplexity($code);
    echo "Cyclomatic Complexity of '{$file}' is: " . $complexity . "\n";
} else {
    echo "Error: File '{$file}' not found.\n";
}
?>
