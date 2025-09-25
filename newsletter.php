<?php
/**
 * Newsletter Signup Handler
 * Process newsletter subscription form
 */

// Enable error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set content type
header('Content-Type: text/html; charset=UTF-8');

// Check if form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.html');
    exit;
}

// Get and sanitize form data
$email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Please enter a valid email address.";
} else {
    // Database connection (adjust credentials as needed)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cryptovault";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        $error = "Database connection failed: " . $conn->connect_error;
    }

    try {
        // Check if email already exists
        $stmt = $conn->prepare("SELECT id FROM newsletter_subscribers WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $message = "This email is already subscribed to our newsletter.";
        } else {
            // Insert new subscriber
            $stmt = $conn->prepare("INSERT INTO newsletter_subscribers (email, subscribed_at, ip_address) VALUES (?, NOW(), ?)");
            $stmt->bind_param("ss", $email, $_SERVER['REMOTE_ADDR']);
            $stmt->execute();
            
            $success = "Thank you for subscribing to our newsletter!";
            
            // Optional: Send welcome email
            $to = $email;
            $subject = "Welcome to CryptoVault Newsletter";
            $emailBody = "
            <html>
            <body>
                <h2>Welcome to CryptoVault!</h2>
                <p>Thank you for subscribing to our newsletter. You'll receive the latest crypto news, market insights, and platform updates.</p>
                <p>Best regards,<br>The CryptoVault Team</p>
            </body>
            </html>
            ";
            
            $headers = [
                'MIME-Version: 1.0',
                'Content-type: text/html; charset=UTF-8',
                'From: noreply@cryptovault.com',
                'Reply-To: support@cryptovault.com'
            ];
            
            @mail($to, $subject, $emailBody, implode("\r\n", $headers));
        }
        
    } catch (Exception $e) {
        $error = "Database error: " . $e->getMessage();
        // In production, log the error instead of displaying it
        error_log("Newsletter signup error: " . $e->getMessage());
        $error = "Sorry, there was an error processing your subscription. Please try again later.";
    } finally {
        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter Subscription - CryptoVault</title>
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
                <h2 class="text-2xl font-bold mb-4 text-accent">Success!</h2>
                <p class="mb-6"><?php echo htmlspecialchars($success); ?></p>
            <?php elseif (isset($message)): ?>
                <div class="text-yellow-400 mb-6">
                    <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.502 0L4.268 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold mb-4 text-yellow-400">Already Subscribed</h2>
                <p class="mb-6"><?php echo htmlspecialchars($message); ?></p>
            <?php else: ?>
                <div class="text-red-400 mb-6">
                    <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold mb-4 text-red-400">Error</h2>
                <p class="mb-6"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
            
            <a href="index.html" class="bg-primary hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-200 inline-block">
                Back to Home
            </a>
        </div>
    </div>
</body>
</html>