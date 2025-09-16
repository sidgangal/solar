<?php
require_once __DIR__ . '/../lib/calculations.php';

function assert_equal($expected, $actual, $message)
{
    if ($expected !== $actual) {
        fwrite(STDERR, $message . PHP_EOL);
        fwrite(STDERR, 'Expected: ' . var_export($expected, true) . PHP_EOL);
        fwrite(STDERR, 'Actual: ' . var_export($actual, true) . PHP_EOL);
        exit(1);
    }
}

$components = [
    ['name' => 'Panel 1', 'price' => 100.0, 'wattage' => 100],
    ['name' => 'Panel 2', 'price' => 150.0, 'wattage' => 150],
    ['name' => 'Panel 3', 'price' => 200.0, 'wattage' => 200],
];

$result = recommend_components($components, 120, 'panel');
assert_equal(1, count($result), 'Expected a single recommendation when an appropriately sized panel exists.');
assert_equal('You should use 1 Panel 2 panel costing Rs 150', $result[0], 'Unexpected recommendation for single panel lookup.');

$result = recommend_components($components, 500, 'panel');
assert_equal(3, count($result), 'Expected three fallback recommendations when no panel is large enough.');
assert_equal('You should use 3 Panel 3 panels costing Rs 600', $result[0], 'Unexpected recommendation for largest panel fallback.');
assert_equal('You should use 4 Panel 2 panels costing Rs 600', $result[1], 'Unexpected recommendation for medium panel fallback.');
assert_equal('You should use 5 Panel 1 panels costing Rs 500', $result[2], 'Unexpected recommendation for smallest panel fallback.');

echo "All tests passed." . PHP_EOL;
