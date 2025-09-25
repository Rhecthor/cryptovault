<?php
/**
 * Login Process Handler
 * Handles user authentication
 */

// Enable error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set content type
header('Content-Type: text/html; charset=UTF-8');

// Start session
session_start();

// Check if form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.html');
    exit;
}

// Get and sanitize form data
$email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$password = $_POST['password'] ?? '';
$remember = isset($_POST['remember']);

// Validate required fields
$errors = [];

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "A valid email address is required.";
}

if (empty($password)) {
    $errors[] = "Password is required.";
}

// If no validation errors, process the login
if (empty($errors)) {
    // Database connection (adjust credentials as needed)
    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $dbname = "cryptovault";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password_db, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    try {
        // Check if user exists and verify password
    $stmt = $conn->prepare("SELECT id, email, password_hash FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password_hash'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['logged_in'] = true;
            // Redirect to dashboard
            header('Location: dashboard.php');
            exit;
        } else {
            $errors[] = "Invalid email or password.";
        }
        
    } catch (Exception $e) {
        $errors[] = "Database error. Please try again later.";
        // In production, log the error instead of displaying it
        error_log("Login error: " . $e->getMessage());
    } finally {
        if (isset($stmt) && $stmt instanceof mysqli_stmt) {
            $stmt->close();
        }
        if (isset($conn) && $conn instanceof mysqli) {
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
    <title>Login Error - CryptoVault Pro</title>
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
            <div class="text-error mb-6">
                <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.502 0L4.268 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                </svg>
            </div>
            <h2 class="text-2xl font-bold mb-4 text-error">Login Failed</h2>
            <div class="mb-6">
                <?php foreach ($errors as $error): ?>
                    <p class="mb-2 text-gray-300"><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            </div>
            
            <div class="space-y-3">
                <a href="login.html" class="block w-full bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-lg font-semibold transition-all duration-200">
                    Try Again
                </a>
                <a href="signup.html" class="block w-full border border-primary text-primary hover:bg-primary hover:text-white px-6 py-3 rounded-lg font-semibold transition-all duration-200">
                    Create Account
                </a>
            </div>
        </div>
    </div>
</body>
</html>