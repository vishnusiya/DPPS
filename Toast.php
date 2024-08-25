<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Display toast message if exists
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    $message_type = $_SESSION['message_type'];
    $bg_color = ($message_type === 'success') ? 'green' : 'red';

    // Print JavaScript to show Toastify
    echo "<script>
        Toastify({
            text: '$message',
            style: {
                background: '$bg_color'
            },
            duration: 3000,
            gravity: 'top', // can be top or bottom
            position: 'right' // can be left or right
        }).showToast();
    </script>";

    // Clear the message after displaying
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
}
?>
