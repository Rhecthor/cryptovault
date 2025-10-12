# CryptoVault - Crypto Landing Page

A professional cryptocurrency trading platform landing page built with HTML, Tailwind CSS, and PHP.

## Features

- **Responsive Design**: Mobile-first design that works on all devices
- **Modern UI**: Dark theme with crypto-inspired gradients and animations
- **Contact Forms**: Working contact and newsletter signup forms
- **PHP Backend**: Server-side form processing with database storage
- **Security**: Input validation and sanitization
- **Professional Layout**: Hero section, features, stats, about, and contact sections

## Setup Instructions

### Prerequisites
- Web server with PHP support (Apache/Nginx)
- MySQL database
- PHP 7.4 or higher

### Installation

1. **Upload Files**: Upload all files to your web server's document root

2. **Database Setup**:
   - Create a MySQL database named `cryptovault`
   - Import the `database.sql` file to create the necessary tables
   - Update database credentials in `contact.php` and `newsletter.php`

3. **Configuration**:
   - Edit the database connection settings in both PHP files:
     ```php
     $host = 'localhost';        // Your database host
     $dbname = 'cryptovault';    // Your database name
     $username = 'your_db_user'; // Your database username
     $password = 'your_db_password'; // Your database password
     ```

4. **Email Configuration**:
   - Update email addresses in the PHP files:
     - Admin email in `contact.php`
     - From addresses for outgoing emails

### File Structure

```
cryptovault/
├── index.php          # Main landing page
├── contact.php         # Contact form handler
├── newsletter.php      # Newsletter signup handler
├── database.sql        # Database schema
└── README.md          # This file
```

### Features Breakdown

#### Frontend (HTML + Tailwind CSS)
- **Navigation**: Responsive navbar with mobile menu
- **Hero Section**: Eye-catching intro with call-to-action buttons
- **Features Section**: Highlights of platform benefits
- **Stats Section**: Key metrics and numbers
- **About Section**: Company information and value propositions
- **Newsletter**: Email signup form
- **Contact**: Full contact form with validation
- **Footer**: Comprehensive site links and social media

#### Backend (PHP)
- **Form Processing**: Handles contact and newsletter forms
- **Database Storage**: Stores submissions in MySQL
- **Email Notifications**: Sends confirmations and admin notifications
- **Input Validation**: Sanitizes and validates all user inputs
- **Error Handling**: Graceful error handling with user feedback

### Customization

1. **Colors**: Modify the Tailwind config in `index.php` to change the color scheme
2. **Content**: Update text content throughout `index.php`
3. **Database**: Modify table structures in `database.sql` as needed
4. **Styling**: Add custom CSS for additional styling
5. **Functionality**: Extend PHP files for additional features

### Security Considerations

- All user inputs are sanitized and validated
- SQL queries use prepared statements to prevent injection
- Email addresses are properly validated
- IP addresses are logged for security monitoring
- Consider adding CAPTCHA for production use

### Production Deployment

Before going live:

1. **Change Default Passwords**: Update any default admin passwords
2. **SSL Certificate**: Ensure HTTPS is enabled
3. **Error Reporting**: Disable PHP error display in production
4. **Backup Strategy**: Implement regular database backups
5. **Email Configuration**: Set up proper SMTP for email delivery
6. **Security Headers**: Add appropriate security headers
7. **Rate Limiting**: Consider adding rate limiting to forms

### Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

### License

This project is created for educational and commercial use. Modify and use as needed for your cryptocurrency platform.
