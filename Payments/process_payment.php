<?php
session_start();

// Check if user_id is set in the session
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('User not logged in. Please log in to continue.'); window.location.href = '../Profile/logging.php';</script>";
    exit;
}

// Retrieve form data (assuming all necessary validations are performed)
$eventName = $_POST['event_name'];
$eventDate = $_POST['event_date'];
$eventTime = $_POST['event_time']; // Added event time
$venueId = $_POST['venue_id']; // Changed to venue ID
$amount = $_POST['amount'];
$paymentDate = $_POST['payment_date'];
$paymentMethod = $_POST['payment_method'];
$organizerId = $_SESSION['user_id']; // Assuming the user ID is stored in the session

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "entreefy_system";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare SQL statements with placeholders 
$sqlEventReservation = "INSERT INTO event_reservations (title, date, time, organizer_id, created_at) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP)";
$sqlPayment = "INSERT INTO payments (reservation_id, amount, payment_date, payment_method) VALUES (?, ?, ?, ?)";
$sqlEventVenue = "INSERT INTO event_venue (event_id, venue_id) VALUES (?, ?)";

if ($stmt = $conn->prepare($sqlEventReservation)) {
    $stmt->bind_param("sssi", $eventName, $eventDate, $eventTime, $organizerId);

    if ($stmt->execute()) {
        $reservationId = $stmt->insert_id;

        // Insert into event_venue table
        if ($stmtVenue = $conn->prepare($sqlEventVenue)) {
            $stmtVenue->bind_param("ii", $reservationId, $venueId);

            if ($stmtVenue->execute()) {
                // Insert into payments table
                if ($stmtPayment = $conn->prepare($sqlPayment)) {
                    $stmtPayment->bind_param("idss", $reservationId, $amount, $paymentDate, $paymentMethod);

                    if ($stmtPayment->execute()) {
                        echo '<script>
                        alert("Payment processed successfully!");
                        window.location.href = "Payment.php";
                        </script>';
                    } else {
                        echo "Error: " . $stmtPayment->error;
                    }
                } else {
                    echo "Error: " . $conn->error;
                }

                $stmtVenue->close();
            } else {
                echo "Error: " . $stmtVenue->error;
            }
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    if (isset($stmtPayment)) $stmtPayment->close();
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
