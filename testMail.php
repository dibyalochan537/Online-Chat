<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send SMS</title>
</head>
<body>
    <h1>Send SMS</h1>
    <form id="smsForm">
        <label for="phoneNumber">Phone Number:</label><br>
        <input type="text" id="phoneNumber" name="phoneNumber" required><br><br>
        
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" required></textarea><br><br>
        
        <button type="submit">Send Message</button>
    </form>

    <script>
        document.getElementById('smsForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form from submitting the traditional way
            
            const phoneNumber = document.getElementById('phoneNumber').value;
            const message = document.getElementById('message').value;
            
            // Example API request (this won't actually send a message)
            fetch('https://example.com/api/send-sms', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    phoneNumber: phoneNumber,
                    message: message
                }),
            })
            .then(response => response.json())
            .then(data => {
                alert('Message sent successfully!');
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>
