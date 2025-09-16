<?php

function fetch_components($connection, $table)
{
    $allowedTables = [
        'panels',
        'battery',
        'inverters',
        'dc_inverter',
    ];

    if (!in_array($table, $allowedTables, true)) {
        throw new InvalidArgumentException('Unsupported component table: ' . $table);
    }

    $query = sprintf('SELECT NAME, PRICE, W FROM %s ORDER BY W ASC', $table);
    $result = $connection->query($query);

    if ($result === false) {
        throw new RuntimeException('Failed to fetch ' . $table . ': ' . $connection->error);
    }

    $components = [];

    while ($row = $result->fetch_assoc()) {
        $components[] = [
            'name' => $row['NAME'],
            'price' => (float) $row['PRICE'],
            'wattage' => (float) $row['W'],
        ];
    }

    $result->free();

    return $components;
}

function format_price($price)
{
    if (abs($price - round($price)) < 0.01) {
        return (string) round($price);
    }

    return number_format($price, 2, '.', '');
}

function pluralize_label($label, $count)
{
    return $label . ($count === 1 ? '' : 's');
}

function recommend_components($components, $targetWattage, $itemLabel)
{
    if (empty($components)) {
        return ["No {$itemLabel} data available."];
    }

    foreach ($components as $component) {
        if ($component['wattage'] >= $targetWattage) {
            return [
                sprintf(
                    'You should use 1 %s %s costing Rs %s',
                    $component['name'],
                    $itemLabel,
                    format_price($component['price'])
                ),
            ];
        }
    }

    $recommendations = [];
    $sorted = array_reverse($components);
    $choices = array_slice($sorted, 0, min(3, count($sorted)));

    foreach ($choices as $component) {
        $count = (int) ceil($targetWattage / $component['wattage']);
        $totalPrice = $count * $component['price'];

        $recommendations[] = sprintf(
            'You should use %d %s %s costing Rs %s',
            $count,
            $component['name'],
            pluralize_label($itemLabel, $count),
            format_price($totalPrice)
        );
    }

    return $recommendations;
}
