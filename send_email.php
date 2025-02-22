<?php
ini_set("SMTP","smtp.gmail.com");
ini_set("SMTP","ssl://smtp.gmail.com");
ini_set("smtp_port","25");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = filter_var($_POST['to'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    $headers = 'From: dibyalochandash123@gmail.com' . "\r\n" .
               'Reply-To: rajudash7980@gmail.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email.";
    }
} else {
    echo "Invalid request.";
}
?>
