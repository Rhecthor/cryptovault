<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CryptoVault Pro - Trading</title>
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
        .glassmorphism {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-12px);
            box-shadow: 0 25px 50px -12px rgba(37, 99, 235, 0.25);
        }
    </style>
</head>
<body class="bg-dark text-white overflow-x-hidden">
    <nav class="fixed top-0 w-full z-50 bg-dark transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-primary to-secondary rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold gradient-text">CryptoVault Pro</span>
                </div>
                <!-- Centered Nav Links -->
                <div class="flex-1 flex justify-center">
                    <div class="flex space-x-10">
                         <a href="index.php" class="text-lg font-medium hover:text-primary transition-colors duration-200">Home</a>
                        <a href="trading.php" class="text-lg font-medium hover:text-primary transition-colors duration-200">Trading</a>
                        <a href="features.php" class="text-lg font-medium hover:text-primary transition-colors duration-200">Features</a>
                        <a href="stats.php" class="text-lg font-medium hover:text-primary transition-colors duration-200">Stats</a>
                        <a href="about.php" class="text-lg font-medium hover:text-primary transition-colors duration-200">About</a>
                        <a href="contact.php" class="text-lg font-medium hover:text-primary transition-colors duration-200">Contact</a>
                    </div>
                </div>
                <!-- Right Buttons -->
                <div class="flex items-center space-x-4">
                    <a href="login.php" class="border border-primary text-primary px-6 py-2 rounded-full font-semibold hover:bg-primary hover:text-white transition-all">Login</a>
                    <a href="signup.php" class="bg-white text-dark px-6 py-2 rounded-full font-semibold shadow hover:bg-primary hover:text-white transition-all">Sign Up</a>
                </div>
            </div>
        </div>
        <!-- Mobile menu -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 bg-dark-light">
                <a href="#trading" class="block px-3 py-2 hover:text-primary transition-colors">Trading</a>
                <a href="#features" class="block px-3 py-2 hover:text-primary transition-colors">Features</a>
                <a href="#stats" class="block px-3 py-2 hover:text-primary transition-colors">Stats</a>
                <a href="#about" class="block px-3 py-2 hover:text-primary transition-colors">About</a>
                <a href="#contact" class="block px-3 py-2 hover:text-primary transition-colors">Contact</a>
                <div class="px-3 py-2 space-y-2">
                    <a href="login.php" class="block w-full text-center py-2 border border-primary text-primary rounded-lg hover:bg-primary hover:text-white transition-all">Login</a>
                    <a href="signup.php" class="block w-full text-center py-2 btn-primary text-white rounded-lg">Sign Up</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Trading Platform Preview -->
    <section id="trading" class="py-20 bg-dark relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">Professional Trading Interface</h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    Advanced charting tools, real-time data, and institutional-grade execution engine
                </p>
            </div>
            <div class="relative">
                <div class="glassmorphism rounded-2xl p-8 mb-8">
                    <div class="grid lg:grid-cols-3 gap-8">
                        <div class="lg:col-span-2">
                            <div class="bg-dark-light rounded-xl p-6 h-80 flex items-center justify-center">
                                <div class="text-center">
                                    <div class="w-16 h-16 bg-gradient-to-r from-primary to-secondary rounded-full mx-auto mb-4 flex items-center justify-center">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-xl font-bold mb-2">Advanced Charts</h3>
                                    <p class="text-gray-400">TradingView integration with 100+ indicators</p>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="bg-dark-light rounded-xl p-4">
                                <h4 class="font-semibold mb-2">Order Book</h4>
                                <div class="space-y-2 text-sm">
                                    <div class="flex justify-between">
                                        <span class="text-red-400">43,250.00</span>
                                        <span class="text-gray-400">0.5432</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-red-400">43,245.50</span>
                                        <span class="text-gray-400">1.2341</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-red-400">43,240.25</span>
                                        <span class="text-gray-400">0.8765</span>
                                    </div>
                                    <div class="border-t border-gray-600 pt-2">
                                        <div class="flex justify-between font-semibold">
                                            <span class="text-white">43,235.75</span>
                                            <span class="text-success">+2.5%</span>
                                        </div>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-success">43,230.00</span>
                                        <span class="text-gray-400">2.1234</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-success">43,225.50</span>
                                        <span class="text-gray-400">1.5678</span>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-dark-light rounded-xl p-4">
                                <h4 class="font-semibold mb-2">Quick Trade</h4>
                                <div class="space-y-3">
                                    <div class="flex space-x-2">
                                        <button class="flex-1 bg-success text-white py-2 rounded-lg text-sm font-semibold">BUY</button>
                                        <button class="flex-1 bg-error text-white py-2 rounded-lg text-sm font-semibold">SELL</button>
                                    </div>
                                    <input type="text" placeholder="Amount" class="w-full bg-dark border border-gray-600 rounded-lg px-3 py-2 text-sm">
                                    <button class="w-full bg-primary text-white py-2 rounded-lg text-sm font-semibold">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <!-- Footer -->
    <footer class="bg-dark py-16" style="background-image: linear-gradient(135deg, #7C3AED 0%, #2563EB 100%), url('https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=1500&q=80'); background-size: cover; background-blend-mode: multiply;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <div class="flex items-center space-x-2 mb-6">
                        <div class="w-8 h-8 bg-gradient-to-r from-primary to-secondary rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold">CryptoVault Pro</h3>
                    </div>
                    <p class="text-gray-300 mb-4">
                        Professional cryptocurrency trading platform trusted by institutions and serious traders worldwide.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Products</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Professional Trading</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Institutional Services</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">API & Algorithms</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Custody Solutions</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Company</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Careers</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Press</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Blog</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Support</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Help Center</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Security</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">API Documentation</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 pt-8 text-center text-gray-400">
                <p>&copy; 2024 CryptoVault Pro. All rights reserved. | Professional crypto trading platform. Risk disclosure available.</p>
            </div>
        </div>
    </footer>
</body>
</html>
