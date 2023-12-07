<?php
// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Function to sanitize string input
    function sanitizeString($string) {
        $string = trim($string); 
        $string = stripslashes($string); 
        $string = htmlspecialchars($string); 
        return $string;
    }

    $attraction = isset($_POST['attraction']) ? sanitizeString($_POST['attraction']) : '';
    $firstName = isset($_POST['firstName']) ? sanitizeString($_POST['firstName']) : '';
    $totalGuests = isset($_POST['totalGuests']) ? filter_var($_POST['totalGuests'], FILTER_SANITIZE_NUMBER_INT) : 0;
    $reservationDate = isset($_POST['reservationDate']) ? sanitizeString($_POST['reservationDate']) : '';

    $errors = [];
    if (empty($firstName)) {
        $errors[] = 'First name is required.';
    }
    if ($totalGuests <= 0) {
        $errors[] = 'Total guests should be a positive number.';
    }
    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $reservationDate)) {
        $errors[] = 'Invalid date format.';
    }

    // Check for errors
    if (count($errors) > 0) {
        header('Content-Type: application/json');
        echo json_encode(['errors' => $errors]);
        exit;
    }

    // Reformat the reservation date to a more friendly format
    $dateObject = new DateTime($reservationDate);
    $friendlyDate = $dateObject->format('F jS');

    // Create the confirmation message
    $confirmationMessage = "Thank You {$firstName}. Your reservation for your party of {$totalGuests} at {$attraction} is confirmed for {$friendlyDate}";

    // Send back the response in JSON format
    header('Content-Type: application/json');
    echo json_encode(['message' => $confirmationMessage]);
} else {
    // Handle the case where the request is not a POST request
    header('Content-Type: application/json');
    echo json_encode(['message' => 'Invalid request']);
}
?>
