<?php
/**
 * Contact Form Handler
 * Process contact form submissions
 */

// Enable error reporting for development
// error_reporting(E_ALL);
// ini_set('display_errors', 1); // Disable for production to prevent unwanted output

// Set content type
header('Content-Type: text/html; charset=UTF-8');

// Check if form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.html');
    exit;
}

// Get and sanitize form data
$name = trim($_POST['name'] ?? '');
$email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

// Validate required fields
$errors = [];

if (empty($name)) {
    $errors[] = "Name is required.";
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "A valid email address is required.";
}

if (empty($subject)) {
    $errors[] = "Subject is required.";
}

if (empty($message)) {
    $errors[] = "Message is required.";
}

// If no validation errors, process the form
if (empty($errors)) {
    // Database connection (adjust credentials as needed)
    $host = 'localhost';
    $dbname = 'cryptovault';
    $username = 'root';
    $password = '';
    
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Insert contact form submission
    $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, subject, message, sent_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->execute([$name, $email, $subject, $message]);
        
        // Send email notification to admin
        $adminEmail = "admin@cryptovault.com"; // Change this to your admin email
        $emailSubject = "New Contact Form Submission: " . $subject;
        
        $emailBody = "
        <html>
        <body>
            <h2>New Contact Form Submission</h2>
            <p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>
            <p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>
            <p><strong>Subject:</strong> " . htmlspecialchars($subject) . "</p>
            <p><strong>Message:</strong></p>
            <p>" . nl2br(htmlspecialchars($message)) . "</p>
            <p><strong>IP Address:</strong> " . $_SERVER['REMOTE_ADDR'] . "</p>
            <p><strong>Submitted:</strong> " . date('Y-m-d H:i:s') . "</p>
        </body>
        </html>
        ";
        
        $headers = [
            'MIME-Version: 1.0',
            'Content-type: text/html; charset=UTF-8',
            'From: noreply@cryptovault.com',
            'Reply-To: ' . $email
        ];
        
    @mail($adminEmail, $emailSubject, $emailBody, implode("\r\n", $headers));
        
        // Send confirmation email to user
        $userSubject = "Thank you for contacting CryptoVault";
        $userEmailBody = "
        <html>
        <body>
            <h2>Thank you for contacting us!</h2>
            <p>Dear " . htmlspecialchars($name) . ",</p>
            <p>We have received your message and will get back to you within 24 hours.</p>
            <p><strong>Your message:</strong></p>
            <p>" . nl2br(htmlspecialchars($message)) . "</p>
            <p>Best regards,<br>The CryptoVault Support Team</p>
        </body>
        </html>
        ";
        
        $userHeaders = [
            'MIME-Version: 1.0',
            'Content-type: text/html; charset=UTF-8',
            'From: support@cryptovault.com',
            'Reply-To: support@cryptovault.com'
        ];
        
    @mail($email, $userSubject, $userEmailBody, implode("\r\n", $userHeaders));
        
        $success = "Thank you for your message! We'll get back to you within 24 hours.";
        
    } catch (PDOException $e) {
        $errors[] = "Database error: " . $e->getMessage();
        // In production, log the error instead of displaying it
        error_log("Contact form error: " . $e->getMessage());
        $errors[] = "Sorry, there was an error sending your message. Please try again later.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form - CryptoVault</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3B82F6',
                        secondary: '#8B5CF6',
                        accent: '#10B981',
                        dark: '#0F172A',
                        'dark-light': '#1E293B'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-dark text-white min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full mx-4">
        <div class="bg-dark-light rounded-xl p-8 text-center">
            <?php if (isset($success)): ?>
                <div class="text-accent mb-6">
                    <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold mb-4 text-accent">Message Sent!</h2>
                <p class="mb-6"><?php echo htmlspecialchars($success); ?></p>
            <?php else: ?>
                <div class="text-red-400 mb-6">
                    <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold mb-4 text-red-400">Error</h2>
                <div class="mb-6">
                    <?php foreach ($errors as $error): ?>
                        <p class="mb-2"><?php echo htmlspecialchars($error); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <a href="index.html" class="bg-primary hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-200 inline-block">
                Back to Home
            </a>
        </div>
    </div>
</body>
</html>