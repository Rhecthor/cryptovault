<?php
/**
 * Email Verification Handler
 * Handles email verification for user accounts
 */

// Enable error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set content type
header('Content-Type: text/html; charset=UTF-8');

// Start session
session_start();

// Get token from URL
$token = $_GET['token'] ?? '';

if (empty($token)) {
    $error = "Invalid verification link.";
} else {
    // Database connection
    $servername = "db.pxxl.pro";
    $port = "33029";
    $username = "user_c40aec2d";
    $password_db = "52ac4e1a11404011fb6b6d4572b7ddd30";
    $dbname = "db_961583c9";

    // Create connection
    $conn = new mysqli($servername, $username, $password_db, $dbname, $port);

    // Check connection
    if ($conn->connect_error) {
        $error = "Database connection failed: " . $conn->connect_error;
    } else {
        try {
            // Check if token exists and is valid
            $stmt = $conn->prepare("SELECT id, email, first_name FROM users WHERE verification_token = ? AND email_verified = FALSE");
            $stmt->bind_param("s", $token);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            if ($user) {
                // Update user as verified
                $updateStmt = $conn->prepare("UPDATE users SET email_verified = TRUE, verification_token = NULL, status = 'active' WHERE id = ?");
                $updateStmt->bind_param("i", $user['id']);
                $updateStmt->execute();

                $success = true;
                $user_name = $user['first_name'];
                $user_email = $user['email'];

                $updateStmt->close();
            } else {
                $error = "Invalid or expired verification link.";
            }

            $stmt->close();

        } catch (Exception $e) {
            $error = "Database error: " . $e->getMessage();
            // In production, log the error instead of displaying it
            error_log("Verification error: " . $e->getMessage());
        } finally {
            $conn->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($success) ? 'Email Verified' : 'Verification Error'; ?> - CryptoVault Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563EB',
                        'primary-dark': '#1D4ED8',
                        secondary: '#7C3AED',
                        'secondary-dark': '#6D28D9',
                        accent: '#059669',
                        'accent-dark': '#047857',
                        dark: '#0F172A',
                        'dark-light': '#1E293B',
                        'dark-lighter': '#334155',
                        success: '#10B981',
                        warning: '#F59E0B',
                        error: '#EF4444'
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
                <div class="text-success mb-6">
                    <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold mb-4 text-success">Email Verified!</h2>
                <p class="mb-6 text-gray-300">
                    Welcome to CryptoVault Pro, <strong><?php echo htmlspecialchars($user_name); ?></strong>!<br>
                    Your email address (<strong><?php echo htmlspecialchars($user_email); ?></strong>) has been successfully verified.
                    You can now log in to your account and start trading.
                </p>
                <div class="space-y-3">
                    <a href="login.php" class="block w-full bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-lg font-semibold transition-all duration-200">
                        Login to Your Account
                    </a>
                    <a href="index.php" class="block w-full border border-primary text-primary hover:bg-primary hover:text-white px-6 py-3 rounded-lg font-semibold transition-all duration-200">
                        Back to Home
                    </a>
                </div>
            <?php else: ?>
                <div class="text-error mb-6">
                    <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.502 0L4.268 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold mb-4 text-error">Verification Failed</h2>
                <p class="mb-6 text-gray-300"><?php echo htmlspecialchars($error); ?></p>

                <div class="space-y-3">
                    <a href="signup.php" class="block w-full bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-lg font-semibold transition-all duration-200">
                        Create New Account
                    </a>
                    <a href="login.php" class="block w-full border border-primary text-primary hover:bg-primary hover:text-white px-6 py-3 rounded-lg font-semibold transition-all duration-200">
                        Back to Login
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
