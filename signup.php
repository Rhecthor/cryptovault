<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - CryptoVault Pro</title>
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
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #2563EB 0%, #7C3AED 50%, #059669 100%);
        }
        .btn-primary {
            background: linear-gradient(135deg, #2563EB, #1D4ED8);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #1D4ED8, #1E40AF);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(37, 99, 235, 0.4);
        }
        .crypto-pattern {
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(37, 99, 235, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(124, 58, 237, 0.1) 0%, transparent 50%);
        }
        .input-focus:focus {
            border-color: #2563EB;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }
        .step-indicator {
            transition: all 0.3s ease;
        }
        .step-active {
            background: linear-gradient(135deg, #2563EB, #1D4ED8);
        }
        .step-completed {
            background: #10B981;
        }
    </style>
</head>
<body class="bg-dark text-white min-h-screen crypto-pattern">
    <!-- Navigation -->
    <nav class="bg-dark-light bg-opacity-90 backdrop-blur-lg border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="index.php" class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-gradient-to-r from-primary to-secondary rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                            </svg>
                        </div>
                        <h1 class="text-xl font-bold">CryptoVault Pro</h1>
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-400">Already have an account?</span>
                    <a href="login.php" class="text-primary hover:text-primary-dark transition-colors font-medium">
                        Sign In
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sign Up Form -->
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl w-full space-y-8">
            <div class="text-center">
                <div class="mx-auto w-16 h-16 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold mb-2">Create Your Pro Account</h2>
                <p class="text-gray-400">Join thousands of professional traders on CryptoVault Pro</p>
            </div>

            <!-- Step Indicator -->
            <div class="flex items-center justify-center space-x-4 mb-8">
                <div class="flex items-center">
                    <div class="step-indicator step-active w-8 h-8 rounded-full flex items-center justify-center text-white text-sm font-semibold">1</div>
                    <span class="ml-2 text-sm text-white">Account</span>
                </div>
                <div class="w-12 h-0.5 bg-gray-600"></div>
                <div class="flex items-center">
                    <div class="step-indicator w-8 h-8 rounded-full bg-gray-600 flex items-center justify-center text-white text-sm font-semibold">2</div>
                    <span class="ml-2 text-sm text-gray-400">Verification</span>
                </div>
                <div class="w-12 h-0.5 bg-gray-600"></div>
                <div class="flex items-center">
                    <div class="step-indicator w-8 h-8 rounded-full bg-gray-600 flex items-center justify-center text-white text-sm font-semibold">3</div>
                    <span class="ml-2 text-sm text-gray-400">Complete</span>
                </div>
            </div>

            <div class="bg-dark-light rounded-2xl p-8 border border-gray-700">
                <form method="POST" action="signup_process.php" class="space-y-6" id="signupForm">
                    <!-- Account Type Selection -->
                    <div>
                        <label class="block text-sm font-medium mb-4">Account Type</label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="relative">
                                <input type="radio" id="individual" name="account_type" value="individual" class="sr-only" checked>
                                <label for="individual" class="account-type-card flex items-center p-4 border-2 border-gray-600 rounded-lg cursor-pointer hover:border-primary transition-colors">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="font-semibold">Individual</h3>
                                            <p class="text-sm text-gray-400">Personal trading account</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="relative">
                                <input type="radio" id="institutional" name="account_type" value="institutional" class="sr-only">
                                <label for="institutional" class="account-type-card flex items-center p-4 border-2 border-gray-600 rounded-lg cursor-pointer hover:border-primary transition-colors">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-secondary rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="font-semibold">Institutional</h3>
                                            <p class="text-sm text-gray-400">Corporate/Fund account</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="first_name" class="block text-sm font-medium mb-2">First Name</label>
                            <input 
                                type="text" 
                                id="first_name"
                                name="first_name"
                                required
                                class="w-full px-4 py-3 bg-dark border border-gray-600 rounded-lg text-white placeholder-gray-400 input-focus transition-all duration-200"
                                placeholder="Enter your first name"
                            >
                        </div>
                        <div>
                            <label for="last_name" class="block text-sm font-medium mb-2">Last Name</label>
                            <input 
                                type="text" 
                                id="last_name"
                                name="last_name"
                                required
                                class="w-full px-4 py-3 bg-dark border border-gray-600 rounded-lg text-white placeholder-gray-400 input-focus transition-all duration-200"
                                placeholder="Enter your last name"
                            >
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium mb-2">Email Address</label>
                        <input 
                            type="email" 
                            id="email"
                            name="email"
                            required
                            class="w-full px-4 py-3 bg-dark border border-gray-600 rounded-lg text-white placeholder-gray-400 input-focus transition-all duration-200"
                            placeholder="Enter your email address"
                        >
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium mb-2">Phone Number</label>
                        <div class="flex">
                            <select class="px-3 py-3 bg-dark border border-gray-600 rounded-l-lg text-white border-r-0">
                                <option value="+1">+1</option>
                                <option value="+44">+44</option>
                                <option value="+33">+33</option>
                                <option value="+49">+49</option>
                                <option value="+81">+81</option>
                            </select>
                            <input 
                                type="tel" 
                                id="phone"
                                name="phone"
                                required
                                class="flex-1 px-4 py-3 bg-dark border border-gray-600 rounded-r-lg text-white placeholder-gray-400 input-focus transition-all duration-200"
                                placeholder="Enter your phone number"
                            >
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="password" class="block text-sm font-medium mb-2">Password</label>
                            <div class="relative">
                                <input 
                                    type="password" 
                                    id="password"
                                    name="password"
                                    required
                                    class="w-full px-4 py-3 bg-dark border border-gray-600 rounded-lg text-white placeholder-gray-400 input-focus transition-all duration-200"
                                    placeholder="Create a strong password"
                                >
                                <button type="button" onclick="togglePassword('password')" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-white">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="mt-2">
                                <div class="text-xs text-gray-400 space-y-1">
                                    <div class="flex items-center space-x-2">
                                        <div id="length-check" class="w-2 h-2 rounded-full bg-gray-600"></div>
                                        <span>At least 8 characters</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <div id="uppercase-check" class="w-2 h-2 rounded-full bg-gray-600"></div>
                                        <span>One uppercase letter</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <div id="number-check" class="w-2 h-2 rounded-full bg-gray-600"></div>
                                        <span>One number</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="confirm_password" class="block text-sm font-medium mb-2">Confirm Password</label>
                            <div class="relative">
                                <input 
                                    type="password" 
                                    id="confirm_password"
                                    name="confirm_password"
                                    required
                                    class="w-full px-4 py-3 bg-dark border border-gray-600 rounded-lg text-white placeholder-gray-400 input-focus transition-all duration-200"
                                    placeholder="Confirm your password"
                                >
                                <button type="button" onclick="togglePassword('confirm_password')" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-white">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="referral_code" class="block text-sm font-medium mb-2">Referral Code (Optional)</label>
                        <input 
                            type="text" 
                            id="referral_code"
                            name="referral_code"
                            class="w-full px-4 py-3 bg-dark border border-gray-600 rounded-lg text-white placeholder-gray-400 input-focus transition-all duration-200"
                            placeholder="Enter referral code if you have one"
                        >
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <input 
                                type="checkbox" 
                                id="terms"
                                name="terms"
                                required
                                class="w-4 h-4 text-primary bg-dark border-gray-600 rounded focus:ring-primary focus:ring-2 mt-1"
                            >
                            <label for="terms" class="text-sm text-gray-300">
                                I agree to the <a href="#" class="text-primary hover:text-primary-dark">Terms of Service</a> and <a href="#" class="text-primary hover:text-primary-dark">Privacy Policy</a>
                            </label>
                        </div>
                        <div class="flex items-start space-x-3">
                            <input 
                                type="checkbox" 
                                id="marketing"
                                name="marketing"
                                class="w-4 h-4 text-primary bg-dark border-gray-600 rounded focus:ring-primary focus:ring-2 mt-1"
                            >
                            <label for="marketing" class="text-sm text-gray-300">
                                I would like to receive market updates and promotional emails
                            </label>
                        </div>
                    </div>

                    <button 
                        type="submit"
                        class="w-full btn-primary text-white py-3 rounded-lg font-semibold text-lg"
                    >
                        Create Professional Account
                    </button>

                    <div class="relative my-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-600"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-dark-light text-gray-400">Or sign up with</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <button type="button" class="flex items-center justify-center px-4 py-3 border border-gray-600 rounded-lg hover:bg-dark-lighter transition-colors">
                            <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="currentColor" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="currentColor" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                <path fill="currentColor" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                            </svg>
                            Google
                        </button>
                        <button type="button" class="flex items-center justify-center px-4 py-3 border border-gray-600 rounded-lg hover:bg-dark-lighter transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.024-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.097.118.112.221.083.343-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.001z"/>
                            </svg>
                            Apple
                        </button>
                    </div>
                </form>

                <div class="mt-8 p-4 bg-dark rounded-lg border border-gray-600">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-success mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <h4 class="text-sm font-semibold mb-1">Professional Account Benefits</h4>
                            <ul class="text-xs text-gray-400 space-y-1">
                                <li>• Lower trading fees (0.1% maker, 0.2% taker)</li>
                                <li>• Advanced order types and trading tools</li>
                                <li>• Dedicated account manager</li>
                                <li>• Priority customer support</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <p class="text-gray-400">
                    Already have an account? 
                    <a href="login.php" class="text-primary hover:text-primary-dark font-medium transition-colors">
                        Sign in to your account
                    </a>
                </p>
            </div>
        </div>
    </div>

    <script>
        // Account type selection
        document.querySelectorAll('input[name="account_type"]').forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelectorAll('.account-type-card').forEach(card => {
                    card.classList.remove('border-primary', 'bg-primary', 'bg-opacity-10');
                    card.classList.add('border-gray-600');
                });
                
                const selectedCard = this.closest('.account-type-card');
                selectedCard.classList.remove('border-gray-600');
                selectedCard.classList.add('border-primary', 'bg-primary', 'bg-opacity-10');
            });
        });

        // Initialize first option as selected
        document.getElementById('individual').checked = true;
        document.querySelector('label[for="individual"]').classList.add('border-primary', 'bg-primary', 'bg-opacity-10');

        // Password strength checker
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const lengthCheck = document.getElementById('length-check');
            const uppercaseCheck = document.getElementById('uppercase-check');
            const numberCheck = document.getElementById('number-check');
            
            // Length check
            if (password.length >= 8) {
                lengthCheck.classList.remove('bg-gray-600');
                lengthCheck.classList.add('bg-success');
            } else {
                lengthCheck.classList.remove('bg-success');
                lengthCheck.classList.add('bg-gray-600');
            }
            
            // Uppercase check
            if (/[A-Z]/.test(password)) {
                uppercaseCheck.classList.remove('bg-gray-600');
                uppercaseCheck.classList.add('bg-success');
            } else {
                uppercaseCheck.classList.remove('bg-success');
                uppercaseCheck.classList.add('bg-gray-600');
            }
            
            // Number check
            if (/\d/.test(password)) {
                numberCheck.classList.remove('bg-gray-600');
                numberCheck.classList.add('bg-success');
            } else {
                numberCheck.classList.remove('bg-success');
                numberCheck.classList.add('bg-gray-600');
            }
        });

        function togglePassword(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const button = passwordInput.nextElementSibling;
            const icon = button.querySelector('svg');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                `;
            } else {
                passwordInput.type = 'password';
                icon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                `;
            }
        }

        // Form validation
        document.getElementById('signupForm').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            const terms = document.getElementById('terms').checked;
            
            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Passwords do not match.');
                return;
            }
            
            if (password.length < 8 || !/[A-Z]/.test(password) || !/\d/.test(password)) {
                e.preventDefault();
                alert('Password must meet all requirements.');
                return;
            }
            
            if (!terms) {
                e.preventDefault();
                alert('You must agree to the Terms of Service and Privacy Policy.');
                return;
            }
            
            console.log('Signup form submitted - ready for PHP processing');
        });
    </script>
</body>
</html>
