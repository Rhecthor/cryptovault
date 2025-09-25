@@ .. @@
 -- Database setup for CryptoVault website
 -- Run this SQL to create the necessary tables

 CREATE DATABASE IF NOT EXISTS cryptovault;
 USE cryptovault;

+-- Users table for authentication
+CREATE TABLE IF NOT EXISTS users (
+    id INT AUTO_INCREMENT PRIMARY KEY,
+    account_type ENUM('individual', 'institutional') NOT NULL DEFAULT 'individual',
+    first_name VARCHAR(100) NOT NULL,
+    last_name VARCHAR(100) NOT NULL,
+    email VARCHAR(255) NOT NULL UNIQUE,
+    phone VARCHAR(20) NOT NULL,
+    password_hash VARCHAR(255) NOT NULL,
+    referral_code VARCHAR(20) UNIQUE, 
+    referred_by INT NULL,
+    verification_token VARCHAR(64) NULL,
+    email_verified BOOLEAN DEFAULT FALSE,
+    two_factor_enabled BOOLEAN DEFAULT FALSE,
+    two_factor_secret VARCHAR(32) NULL,
+    marketing_consent BOOLEAN DEFAULT FALSE,
+    status ENUM('pending', 'active', 'suspended', 'closed') DEFAULT 'pending',
+    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
+    last_login TIMESTAMP NULL,
+    login_count INT DEFAULT 0,
+    ip_address VARCHAR(45),
+    INDEX idx_email (email),
+    INDEX idx_referral_code (referral_code),
+    INDEX idx_status (status),
+    FOREIGN KEY (referred_by) REFERENCES users(id) ON DELETE SET NULL
+);
+
+-- User tokens for remember me functionality
+CREATE TABLE IF NOT EXISTS user_tokens (
+    id INT AUTO_INCREMENT PRIMARY KEY,
+    user_id INT NOT NULL,
+    token VARCHAR(64) NOT NULL,
+    expires_at TIMESTAMP NOT NULL,
+    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
+    INDEX idx_token (token),
+    INDEX idx_expires (expires_at),
+    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
+);
+
+-- Login attempts for security monitoring
+CREATE TABLE IF NOT EXISTS login_attempts (
+    id INT AUTO_INCREMENT PRIMARY KEY,
+    email VARCHAR(255) NOT NULL,
+    ip_address VARCHAR(45) NOT NULL,
+    success BOOLEAN NOT NULL,
+    attempted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
+    INDEX idx_email (email),
+    INDEX idx_ip (ip_address),
+    INDEX idx_attempted_at (attempted_at)
+);
+
+-- Referral bonuses tracking
+CREATE TABLE IF NOT EXISTS referral_bonuses (
+    id INT AUTO_INCREMENT PRIMARY KEY,
+    referrer_id INT NOT NULL,
+    referred_id INT NOT NULL,
+    bonus_amount DECIMAL(10,2) NOT NULL,
+    status ENUM('pending', 'paid', 'cancelled') DEFAULT 'pending',
+    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
+    paid_at TIMESTAMP NULL,
+    FOREIGN KEY (referrer_id) REFERENCES users(id) ON DELETE CASCADE,
+    FOREIGN KEY (referred_id) REFERENCES users(id) ON DELETE CASCADE
+);
+
 -- Newsletter subscribers table
 CREATE TABLE IF NOT EXISTS newsletter_subscribers (
     id INT AUTO_INCREMENT PRIMARY KEY,
@@ .. @@
 -- Insert a default admin user (password: admin123 - CHANGE THIS!)
 INSERT INTO admin_users (username, email, password_hash) VALUES 
 ('admin', 'admin@cryptovault.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');