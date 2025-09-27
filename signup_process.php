<?php
/**
 * Sign Up Process Handler
 * Handles user registration
 */

// Enable error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set content type
header('Content-Type: text/html; charset=UTF-8');

// Check if form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: signup.html');
    exit;
}

// Get and sanitize form data
$account_type = trim($_POST['account_type'] ?? '');
$first_name = trim($_POST['first_name'] ?? '');
$last_name = trim($_POST['last_name'] ?? '');
$email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$phone = trim($_POST['phone'] ?? '');
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';
$referral_code = trim($_POST['referral_code'] ?? '');
$terms = isset($_POST['terms']);
$marketing = isset($_POST['marketing']);

// Validate required fields
$errors = [];

if (empty($first_name)) {
    $errors[] = "First name is required.";
}

if (empty($last_name)) {
    $errors[] = "Last name is required.";
}

if (empty($email)) {
    $errors[] = "A valid email address is required.";
}

if (empty($phone)) {
    $errors[] = "Phone number is required.";
}

if (empty($password)) {
    $errors[] = "Password is required.";
} elseif (strlen($password) < 8) {
    $errors[] = "Password must be at least 8 characters long.";
} elseif (!preg_match('/[A-Z]/', $password)) {
    $errors[] = "Password must contain at least one uppercase letter.";            
} elseif (!preg_match('/\d/', $password)) {
    $errors[] = "Password must contain at least one number.";
}

if ($password !== $confirm_password) {
    $errors[] = "Passwords do not match.";
}

if (!$terms) {
    $errors[] = "You must agree to the Terms of Service and Privacy Policy.";
}

if (!in_array($account_type, ['individual', 'institutional'])) {
    $errors[] = "Please select a valid account type.";
}

// If no validation errors, process the registration
if (empty($errors)) {
    // Database connection (adjust credentials as needed)
    $host = 'localhost';
    $dbname = 'cryptovault';
    $username = 'root';
    $password_db = '';
    
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password_db);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Check if email already exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->rowCount() > 0) {
            $errors[] = "An account with this email address already exists.";
        } else {
            // Hash password
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            
            // Generate verification token
            $verification_token = bin2hex(random_bytes(32));
            
            // Handle referral code
            $referrer_id = null;
            if (!empty($referral_code)) {
                $referralStmt = $pdo->prepare("SELECT id FROM users WHERE referral_code = ? AND status = 'active'");
                $referralStmt->execute([$referral_code]);
                $referrer = $referralStmt->fetch();
                if ($referrer) {
                    $referrer_id = $referrer['id'];
                }
            }
            
            // Generate unique referral code for new user
            $user_referral_code = strtoupper(substr($first_name, 0, 2) . substr($last_name, 0, 2) . rand(1000, 9999));
            
            // Insert new user
            $insertStmt = $pdo->prepare("
                INSERT INTO users (
                    account_type, first_name, last_name, email, phone, password_hash, 
                    referral_code, referred_by, verification_token, marketing_consent, 
                    created_at, ip_address
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)
            ");
            
            $insertStmt->execute([
                $account_type, $first_name, $last_name, $email, $phone, $password_hash,
                $user_referral_code, $referrer_id, $verification_token, $marketing ? 1 : 0,
                $_SERVER['REMOTE_ADDR']
            ]);
            
            $user_id = $pdo->lastInsertId();
            
            // Send verification email
            $verification_link = "https://your-domain.com/verify.php?token=" . $verification_token;
            $subject = "Verify Your CryptoVault Pro Account";
            
            $emailBody = "
            <html>
            <body style='font-family: Arial, sans-serif; background-color: #0F172A; color: #ffffff; padding: 20px;'>
                <div style='max-width: 600px; margin: 0 auto; background-color: #1E293B; padding: 30px; border-radius: 10px;'>
                    <div style='text-align: center; margin-bottom: 30px;'>
                        <h1 style='color: #2563EB; margin: 0;'>CryptoVault Pro</h1>
                    </div>
                    
                    <h2 style='color: #ffffff; margin-bottom: 20px;'>Welcome to CryptoVault Pro!</h2>
                    
                    <p style='color: #D1D5DB; line-height: 1.6; margin-bottom: 20px;'>
                        Dear " . htmlspecialchars($first_name) . ",
                    </p>
                    
                    <p style='color: #D1D5DB; line-height: 1.6; margin-bottom: 20px;'>
                        Thank you for creating your professional trading account with CryptoVault Pro. 
                        To complete your registration and start trading, please verify your email address.
                    </p>
                    
                    <div style='text-align: center; margin: 30px 0;'>
                        <a href='" . $verification_link . "' style='background: linear-gradient(135deg, #2563EB, #1D4ED8); color: white; padding: 15px 30px; text-decoration: none; border-radius: 8px; font-weight: bold; display: inline-block;'>
                            Verify Email Address
                        </a>
                    </div>
                    
                    <p style='color: #D1D5DB; line-height: 1.6; margin-bottom: 20px;'>
                        Your account details:
                    </p>
                    
                    <ul style='color: #D1D5DB; line-height: 1.6; margin-bottom: 20px;'>
                        <li>Account Type: " . ucfirst($account_type) . "</li>
                        <li>Email: " . htmlspecialchars($email) . "</li>
                        <li>Referral Code: " . $user_referral_code . "</li>
                    </ul>
                    
                    <p style='color: #D1D5DB; line-height: 1.6; margin-bottom: 20px;'>
                        If you didn't create this account, please ignore this email.
                    </p>
                    
                    <p style='color: #D1D5DB; line-height: 1.6;'>
                        Best regards,<br>
                        The CryptoVault Pro Team
                    </p>
                </div>
            </body>
            </html>
            ";
            
            $headers = [
                'MIME-Version: 1.0',
                'Content-type: text/html; charset=UTF-8',
                'From: noreply@cryptovault.com',
                'Reply-To: support@cryptovault.com'
            ];
            
            @mail($email, $subject, $emailBody, implode("\r\n", $headers));
            
            // If referrer exists, add referral bonus
            if ($referrer_id) {
                $bonusStmt = $pdo->prepare("INSERT INTO referral_bonuses (referrer_id, referred_id, bonus_amount, status, created_at) VALUES (?, ?, 50.00, 'pending', NOW())");
                $bonusStmt->execute([$referrer_id, $user_id]);
            }
            
            $success = true;
        }
        
    } catch (PDOException $e) {
        $errors[] = "Database error. Please try again later.";
        // In production, log the error instead of displaying it
        error_log("Signup error: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($success) ? 'Registration Successful' : 'Registration Error'; ?> - CryptoVault Pro</title>
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
                <h2 class="text-2xl font-bold mb-4 text-success">Registration Successful!</h2>
                <p class="mb-6 text-gray-300">
                    Thank you for joining CryptoVault Pro! We've sent a verification email to 
                    <strong><?php echo htmlspecialchars($email); ?></strong>. 
                    Please check your inbox and click the verification link to activate your account.
                </p>
                <div class="space-y-3">
                    <a href="login.html" class="block w-full bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-lg font-semibold transition-all duration-200">
                        Go to Login
                    </a>
                    <a href="index.html" class="block w-full border border-primary text-primary hover:bg-primary hover:text-white px-6 py-3 rounded-lg font-semibold transition-all duration-200">
                        Back to Home
                    </a>
                </div>
            <?php else: ?>
                <div class="text-error mb-6">
                    <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.502 0L4.268 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold mb-4 text-error">Registration Failed</h2>
                <div class="mb-6">
                    <?php foreach ($errors as $error): ?>
                        <p class="mb-2 text-gray-300"><?php echo htmlspecialchars($error); ?></p>
                    <?php endforeach; ?>
                </div>
                
                <div class="space-y-3">
                    <a href="signup.html" class="block w-full bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-lg font-semibold transition-all duration-200">
                        Try Again
                    </a>
                    <a href="login.html" class="block w-full border border-primary text-primary hover:bg-primary hover:text-white px-6 py-3 rounded-lg font-semibold transition-all duration-200">
                        Already Have Account?
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>