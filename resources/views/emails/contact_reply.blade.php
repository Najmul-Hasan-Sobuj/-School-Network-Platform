<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Reply</title>
    <style>
        /* Reset some basic styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        /* Main container */
        .container {
            width: 100%;
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        /* Header styles */
        .header {
            background-color: #4A90E2;
            color: white;
            padding: 20px;
            text-align: center;
        }

        /* Body styles */
        .body {
            padding: 20px;
        }

        /* Footer styles */
        .footer {
            padding: 20px;
            text-align: center;
            font-size: 0.9em;
            background-color: #f4f4f4;
        }

        /* Responsive styles */
        @media (max-width: 600px) {
            .container {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Contact Reply</h1>
        </div>
        <div class="body">
            <p>Hello {{ $contact->name }},</p>
            <p>Thank you for your message. We will get back to you as soon as possible.</p>
            <p><strong>Message:</strong><br>{{ $contact->msg }}</p>
        </div>
        <div class="footer">
            <p>Regards,<br>Najmul Hasan</p>
        </div>
    </div>
</body>

</html>
