<?php
function get_post_float($name)
{
    $value = filter_input(INPUT_POST, $name, FILTER_VALIDATE_FLOAT);
    if ($value === false || $value === null) {
        return 0.0;
    }

    return max(0.0, (float) $value);
}

function load_recommendations($connection, $table, $target, $label)
{
    require_once __DIR__ . '/lib/calculations.php';

    try {
        $components = fetch_components($connection, $table);
        return recommend_components($components, $target, $label);
    } catch (RuntimeException $exception) {
        error_log($exception->getMessage());
        return ["Unable to retrieve {$label} recommendations at this time."];
    }
}

$l1 = get_post_float('l1');
$l2 = get_post_float('l2');
$f1 = get_post_float('f1');
$f2 = get_post_float('f2');
$t1 = get_post_float('t1');
$t2 = get_post_float('t2');
$s1 = get_post_float('s1');
$s2 = get_post_float('s2');
$la1 = get_post_float('la1');
$la2 = get_post_float('la2');
$m1 = get_post_float('m1');
$m2 = get_post_float('m2');
$fr1 = get_post_float('fr1');
$fr2 = get_post_float('fr2');

$acDcInput = isset($_POST['ac/dc']) ? strtolower(trim($_POST['ac/dc'])) : '';
$acDc = ($acDcInput === 'ac' || $acDcInput === 'dc') ? $acDcInput : '';

$baseLoad = (25 * $l1 * $l2) + (100 * $f1 * $f2) + (200 * $t1 * $t2) + (50 * $s1 * $s2) + (50 * $la1 * $la2) + (15 * $m1 * $m2) + (300 * $fr1 * $fr2);
$acPanelRequirement = $baseLoad / (5 * 0.75 * 0.8 * 0.8);
$acBatteryRequirement = $baseLoad * 2 / (0.85 * 0.97 * 0.97 * 0.8 * 12);
$acInverterLoad = ((25 * $l2) + (100 * $f2) + (200 * $t2) + (50 * $s2) + (50 * $la2) + (15 * $m2) + (300 * $fr2)) * 1.4;

$dcPanelRequirement = $baseLoad / (5 * 0.75 * 0.8);
$dcBatteryRequirement = $baseLoad * 2 / (0.95 * 0.8 * 12);
$dcInverterLoad = ((25 * $l1) + (100 * $f1) + (200 * $t1) + (50 * $s1) + (50 * $la1) + (15 * $m1) + (300 * $fr1)) * 1.4;

$panelRecommendations = [];
$batteryRecommendations = [];
$inverterRecommendations = [];
$systemMessage = '';
$inverterHeading = $acDc === 'dc' ? 'DC Inverters' : 'Inverters';

require_once __DIR__ . '/config.php';

try {
    $conn = create_db_connection();
} catch (RuntimeException $exception) {
    error_log($exception->getMessage());
    http_response_code(500);
    $systemMessage = 'Unable to connect to the database.';
}

if ($systemMessage === '') {
    if ($acDc === '') {
        $systemMessage = 'Please select AC or DC to view recommendations.';
    } elseif ($acDc === 'ac') {
        $panelRecommendations = load_recommendations($conn, 'panels', $acPanelRequirement, 'panel');
        $batteryRecommendations = load_recommendations($conn, 'battery', $acBatteryRequirement, 'battery');
        $inverterRecommendations = load_recommendations($conn, 'inverters', $acInverterLoad, 'inverter');
    } else {
        $panelRecommendations = load_recommendations($conn, 'panels', $dcPanelRequirement, 'panel');
        $batteryRecommendations = load_recommendations($conn, 'battery', $dcBatteryRequirement, 'battery');
        $inverterRecommendations = load_recommendations($conn, 'inverters', $dcInverterLoad, 'DC inverter');
    }

    $conn->close();
}

$systemLabel = $acDc === '' ? 'Not selected' : strtoupper($acDc);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <style>
        html, body, h1, h2, h3, h4, h5 {font-family: "Raleway", sans-serif;}
        .w3-ul li {padding: 12px;}
    </style>
    <title>Solar PV Recommendations</title>
</head>
<body class="w3-light-grey">
<div class="w3-content" style="max-width:1400px">
    <div class="w3-container w3-center w3-padding-32">
        <h1><b>SOLAR PV SYSTEM</b></h1>
        <p>Your savings start <span class="w3-tag">now</span></p>
    </div>
    <div class="w3-container w3-padding-16 w3-white w3-margin-bottom">
        <p><strong>Total daily load:</strong> <?php echo htmlspecialchars(number_format($baseLoad, 2), ENT_QUOTES, 'UTF-8'); ?> Wh</p>
        <p><strong>Configuration:</strong> <?php echo htmlspecialchars($systemLabel, ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
    <?php if ($systemMessage !== ''): ?>
        <div class="w3-container w3-center w3-padding-32 w3-white w3-margin-bottom">
            <h2><b><?php echo htmlspecialchars($systemMessage, ENT_QUOTES, 'UTF-8'); ?></b></h2>
        </div>
    <?php else: ?>
        <?php $sections = [
            ['title' => 'Panels', 'items' => $panelRecommendations],
            ['title' => 'Batteries', 'items' => $batteryRecommendations],
            ['title' => $inverterHeading, 'items' => $inverterRecommendations],
        ]; ?>
        <?php foreach ($sections as $section): ?>
            <div class="w3-container w3-padding-32 w3-white w3-margin-bottom">
                <h2 class="w3-center"><b><?php echo htmlspecialchars($section['title'], ENT_QUOTES, 'UTF-8'); ?></b></h2>
                <ul class="w3-ul w3-border">
                    <?php foreach ($section['items'] as $recommendation): ?>
                        <li><?php echo nl2br(htmlspecialchars($recommendation, ENT_QUOTES, 'UTF-8')); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>
        <div class="w3-container w3-center w3-padding-32 w3-white w3-margin-bottom">
            <h3><b>Installation Tip</b></h3>
            <p>Please install the panels at a 43 degree tilt to the horizontal ground.</p>
        </div>
    <?php endif; ?>
    <div class="w3-container w3-center w3-padding-32">
        <a class="w3-button w3-blue" href="contact.html">Go back and calculate more</a>
    </div>
</div>
</body>
</html>
