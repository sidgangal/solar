<?php
$room_no = filter_input(INPUT_POST, 'room_no', FILTER_VALIDATE_INT);
$room_rent = filter_input(INPUT_POST, 'room_rent', FILTER_VALIDATE_FLOAT);
$room_type = filter_input(INPUT_POST, 'room_type', FILTER_UNSAFE_RAW);

$statusCode = 200;
$message = '';

if ($room_no === false || $room_rent === false || $room_type === null) {
    $message = 'Invalid room data provided.';
    $statusCode = 400;
} else {
    $room_type = trim($room_type);
    if ($room_type === '') {
        $message = 'Invalid room data provided.';
        $statusCode = 400;
    }
}

if ($message === '') {
    require_once __DIR__ . '/config.php';

    try {
        $conn = create_db_connection();
    } catch (RuntimeException $exception) {
        error_log($exception->getMessage());
        $message = 'Unable to connect to the database.';
        $statusCode = 500;
    }
}

if ($message === '' && isset($conn)) {
    $stmt = $conn->prepare('INSERT INTO rooms (room_no, room_rent, room_type) VALUES (?, ?, ?)');

    if ($stmt === false) {
        error_log('Failed to prepare room insert: ' . $conn->error);
        $message = 'Unable to add room at this time.';
        $statusCode = 500;
    } else {
        $room_rent = (float) $room_rent;
        $stmt->bind_param('ids', $room_no, $room_rent, $room_type);

        if ($stmt->execute()) {
            $message = 'Room added.';
        } else {
            error_log('Failed to execute room insert: ' . $stmt->error);
            $message = 'Unable to add room at this time.';
            $statusCode = 500;
        }

        $stmt->close();
    }

    $conn->close();
}

if ($statusCode !== 200) {
    http_response_code($statusCode);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative Link Effects: Subtle and modern effects for links or menu items">
    <meta name="keywords" content="link effect, css transition, style, inspiration, css3, menu item, web design">
    <meta name="author" content="Codrops">
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/demo.css">
    <link rel="stylesheet" type="text/css" href="css/component.css">
    <script src="js/modernizr.custom.js"></script>
    <title>Room details</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>WELCOME: <i>ADMIN</i></h1>
        </header>
        <section class="color-1" style="padding: 0px">
            <nav class="cl-effect-4">
                <a href="myprofile.php" data-hover="CLICK HERE"><span>HOME</span></a>
                <a href="logout.php" data-hover="CLICK "><span>LOGOUT</span></a>
            </nav>
        </section>
        <p class="status-message"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
</body>
</html>
