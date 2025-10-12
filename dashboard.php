<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CryptoVault Pro - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#F59E0B',
                        'primary-dark': '#D97706',
                        secondary: '#10B981',
                        'secondary-dark': '#059669',
                        accent: '#3B82F6',
                        'accent-dark': '#2563EB',
                        dark: '#0A0A0B',
                        'dark-light': '#1A1A1B',
                        'dark-lighter': '#2A2A2B',
                        'dark-border': '#3A3A3B',
                        success: '#10B981',
                        warning: '#F59E0B',
                        error: '#EF4444',
                        'text-primary': '#FFFFFF',
                        'text-secondary': '#A1A1AA',
                        'text-muted': '#71717A'
                    }
                }
            }
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .glassmorphism {
            background: rgba(26, 26, 27, 0.8);
            backdrop-filter: blur(12px);
            border-radius: 16px;
            border: 1px solid rgba(58, 58, 59, 0.3);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
        }
        
        .sidebar-item {
            transition: all 0.3s ease;
            position: relative;
        }
        
        .sidebar-item:hover {
            background: rgba(245, 158, 11, 0.1);
            border-left: 3px solid #F59E0B;
        }
        
        .sidebar-item.active {
            background: rgba(245, 158, 11, 0.2);
            border-left: 3px solid #F59E0B;
        }
        
        .balance-hidden {
            filter: blur(8px);
            transition: filter 0.3s ease;
        }
        
        .crypto-card {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(16, 185, 129, 0.1) 100%);
            border: 1px solid rgba(245, 158, 11, 0.2);
        }
        
        .notification-dot {
            width: 8px;
            height: 8px;
            background: #EF4444;
            border-radius: 50%;
            position: absolute;
            top: 8px;
            right: 8px;
        }

    
        .nav-item {
            transition: all 0.3s ease;
        }
        .nav-item.active {
            background-color: rgba(245, 158, 11, 0.2);
            border-left: 3px solid #F59E0B;
        }
    </style>
</head>
<body class="bg-dark text-text-primary font-sans min-h-screen flex">
    <!-- Sidebar -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-80 h-full flex flex-col justify-between bg-dark-light glassmorphism border-r border-dark-border transform -translate-x-full md:relative md:translate-x-0 md:w-80 transition-transform duration-300 ease-in-out">
        <div>
            <!-- Logo Section -->
            <div class="mb-8 flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-br from-primary to-secondary rounded-xl flex items-center justify-center">
                    <i class="fas fa-coins text-dark text-lg"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-primary">CryptoVault Pro</h2>
                    <p class="text-xs text-text-muted">Professional Trading</p>
                </div>
            </div>

            <!-- User Profile Section -->
            <div class="mb-6 p-4 glassmorphism flex items-center space-x-3">
                <div class="w-12 h-12 bg-gradient-to-br from-accent to-secondary rounded-full flex items-center justify-center">
                    <i class="fas fa-user text-white"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-text-primary"> User</h3>
                    <p class="text-sm text-text-muted">Premium Member</p>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1">
                <div class="mb-6">
                    <h4 class="text-xs font-semibold text-text-muted uppercase tracking-wider mb-3">Main Menu</h4>
                    <ul class="space-y-1">
                        <li>
                            <button class="sidebar-item active w-full flex items-center space-x-3 py-3 px-4 rounded-lg text-sm justify-start" onclick="showSection('dashboard')">
                                <i class="fas fa-chart-line w-5"></i>
                                <span>Dashboard</span>
                            </button>
                        </li>
                        <li>
                            <button class="sidebar-item w-full flex items-center space-x-3 py-3 px-4 rounded-lg text-sm justify-start" onclick="showSection('portfolio')">
                                <i class="fas fa-wallet w-5"></i>
                                <span>Portfolio</span>
                                <span class="ml-auto bg-secondary text-dark text-xs px-2 py-1 rounded-full">12</span>
                            </button>
                        </li>
                        <li>
                            <button class="sidebar-item w-full flex items-center space-x-3 py-3 px-4 rounded-lg text-sm justify-start" onclick="showSection('trading')">
                                <i class="fas fa-exchange-alt w-5"></i>
                                <span>Trading</span>
                                <div class="notification-dot"></div>
                            </button>
                        </li>
                        <li>
                            <button class="sidebar-item w-full flex items-center space-x-3 py-3 px-4 rounded-lg text-sm justify-start" onclick="showSection('analytics')">
                                <i class="fas fa-chart-bar w-5"></i>
                                <span>Analytics</span>
                            </button>
                        </li>
                        <li>
                            <button class="sidebar-item w-full flex items-center space-x-3 py-3 px-4 rounded-lg text-sm justify-start" onclick="showSection('transactions')">
                                <i class="fas fa-history w-5"></i>
                                <span>Transactions</span>
                            </button>
                        </li>
                    </ul>
                </div>

                <div class="mb-6">
                    <h4 class="text-xs font-semibold text-text-muted uppercase tracking-wider mb-3">Tools & Features</h4>
                    <ul class="space-y-1">
                        <li>
                            <button class="sidebar-item w-full flex items-center space-x-3 py-3 px-4 rounded-lg text-sm justify-start" onclick="showSection('reports')">
                                <i class="fas fa-file-alt w-5"></i>
                                <span>Reports</span>
                            </button>
                        </li>
                        <li>
                            <button class="sidebar-item w-full flex items-center space-x-3 py-3 px-4 rounded-lg text-sm justify-start" onclick="showSection('alerts')">
                                <i class="fas fa-bell w-5"></i>
                                <span>Price Alerts</span>
                                <span class="ml-auto bg-error text-white text-xs px-2 py-1 rounded-full">3</span>
                            </button>
                        </li>
                        <li>
                            <button class="sidebar-item w-full flex items-center space-x-3 py-3 px-4 rounded-lg text-sm justify-start" onclick="showSection('market-news')">
                                <i class="fas fa-newspaper w-5"></i>
                                <span>Market News</span>
                            </button>
                        </li>
                        <li>
                            <button class="sidebar-item w-full flex items-center space-x-3 py-3 px-4 rounded-lg text-sm justify-start" onclick="showSection('settings')">
                                <i class="fas fa-cog w-5"></i>
                                <span>Settings</span>
                            </button>
                        </li>
                        <li>
                            <button class="sidebar-item w-full flex items-center space-x-3 py-3 px-4 rounded-lg text-sm justify-start" onclick="showSection('deposit-withdraw')">
                                <i class="fas fa-exchange-alt w-5"></i>
                                <span>Deposit & Withdraw</span>
                            </button>
                        </li>
                        <li>
                            <button class="sidebar-item w-full flex items-center space-x-3 py-3 px-4 rounded-lg text-sm justify-start" onclick="showSection('send-receive')">
                                <i class="fas fa-paper-plane w-5"></i>
                                <span>Send & Receive</span>
                            </button>
                        </li>
                        <li>
                            <button class="sidebar-item w-full flex items-center space-x-3 py-3 px-4 rounded-lg text-sm justify-start" onclick="showSection('exchange')">
                                <i class="fas fa-sync-alt w-5"></i>
                                <span>Exchange</span>
                            </button>
                        </li>
                        <li>
                            <button class="sidebar-item w-full flex items-center space-x-3 py-3 px-4 rounded-lg text-sm justify-start" onclick="showSection('security')">
                                <i class="fas fa-shield-alt w-5"></i>
                                <span>Security Center</span>
                            </button>
                        </li>
                        <li>
                            <button class="sidebar-item w-full flex items-center space-x-3 py-3 px-4 rounded-lg text-sm justify-start" onclick="showSection('api-access')">
                                <i class="fas fa-key w-5"></i>
                                <span>API Access</span>
                            </button>
                        </li>
                        <li>
                            <button class="sidebar-item w-full flex items-center space-x-3 py-3 px-4 rounded-lg text-sm justify-start" onclick="showSection('support')">
                                <i class="fas fa-headset w-5"></i>
                                <span>Support</span>
                            </button>
                        </li>
                        <li>
                            <button class="sidebar-item w-full flex items-center space-x-3 py-3 px-4 rounded-lg text-sm justify-start" onclick="showSection('referral')">
                                <i class="fas fa-users w-5"></i>
                                <span>Referral Program</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

    
        <div class="space-y-3 pb-6">
            <div class="p-3 glassmorphism">
                <div class="flex items-center justify-between text-sm">
                    <span class="text-text-muted">API Status</span>
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-success rounded-full"></div>
                        <span class="text-success">Connected</span>
                    </div>
                </div>
            </div>
            <form action="index.php" method="get">
                <button type="submit" class="w-full py-3 bg-gradient-to-r from-error to-warning text-white font-semibold rounded-lg hover:opacity-90 transition flex items-center justify-center">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    Log Out
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 bg-dark overflow-y-auto">
    
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center space-x-4">
                <button id="sidebarToggle" class="md:hidden text-text-primary hover:text-primary transition-colors">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-text-primary">Dashboard</h1>
                    <p class="text-text-muted text-sm md:text-base">Welcome back, User. Here's your portfolio overview.</p>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <button id="balanceToggle" class="flex items-center space-x-2 px-4 py-2 glassmorphism rounded-lg hover:bg-dark-lighter transition">
                    <i id="eyeIcon" class="fas fa-eye text-text-muted"></i>
                    <span class="text-sm text-text-muted">Hide Balance</span>
                </button>
                <div class="flex items-center space-x-2">
                    <div class="w-3 h-2 bg-success rounded-full animate-pulse"></div>
                    <span class="text-sm text-text-muted">Live Market Data</span>
                </div>
            </div>
        </div>

        <!-- Dashboard Section  -->
        <div id="dashboard">
            <!-- Enhanced Balance Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="crypto-card glassmorphism p-6 text-center">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-sm font-semibold text-text-muted">Total Portfolio</h3>
                        <i class="fas fa-chart-line text-primary"></i>
                    </div>
                    <p id="totalBalance" class="text-3xl font-bold text-primary mb-1">$1,050,047</p>
                    <div class="flex items-center justify-center space-x-2">
                        <span class="text-success text-sm">+2.3%</span>
                        <span class="text-text-muted text-xs">24h</span>
                    </div>
                </div>
                
                <div class="crypto-card glassmorphism p-6 text-center">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-sm font-semibold text-text-muted">Bitcoin (BTC)</h3>
                        <i class="fab fa-bitcoin text-warning"></i>
                    </div>
                    <p id="btcBalance" class="text-3xl font-bold text-warning mb-1">$192,390</p>
                    <div class="flex items-center justify-center space-x-2">
                        <span class="text-success text-sm">+1.1%</span>
                        <span class="text-text-muted text-xs">2.45 BTC</span>
                    </div>
                </div>
                
                <div class="crypto-card glassmorphism p-6 text-center">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-sm font-semibold text-text-muted">Ethereum (ETH)</h3>
                        <i class="fab fa-ethereum text-secondary"></i>
                    </div>
                    <p id="ethBalance" class="text-3xl font-bold text-secondary mb-1">$293,105</p>
                    <div class="flex items-center justify-center space-x-2">
                        <span class="text-error text-sm">-0.7%</span>
                        <span class="text-text-muted text-xs">127.8 ETH</span>
                    </div>
                </div>
                
                <div class="crypto-card glassmorphism p-6 text-center">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-sm font-semibold text-text-muted">Active Orders</h3>
                        <i class="fas fa-clock text-accent"></i>
                    </div>
                    <p class="text-3xl font-bold text-accent mb-1">27</p>
                    <div class="flex items-center justify-center space-x-2">
                        <span class="text-warning text-sm">Pending</span>
                        <span class="text-text-muted text-xs">$45.2K</span>
                    </div>
                </div>
            </div>

            <!-- Charts Section (smaller and responsive) -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <div class="glassmorphism p-6 h-64 flex flex-col justify-between">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-text-primary">Portfolio Performance</h3>
                        <div class="flex space-x-2">
                            <button class="px-3 py-1 text-xs bg-primary text-dark rounded-full">7D</button>
                            <button class="px-3 py-1 text-xs text-text-muted hover:text-primary">30D</button>
                            <button class="px-3 py-1 text-xs text-text-muted hover:text-primary">1Y</button>
                        </div>
                    </div>
                    <div class="flex-1 flex items-center justify-center">
                        <canvas id="balanceChart" height="180"></canvas>
                    </div>
                </div>
                <div class="glassmorphism p-6 h-64 flex flex-col justify-between">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-text-primary">Asset Allocation</h3>
                        <button class="text-xs text-primary hover:underline">View Details</button>
                    </div>
                    <div class="flex-1 flex items-center justify-center">
                        <canvas id="projectChart" height="180"></canvas>
                    </div>
                </div>
            </div>

            <!-- Enhanced Tables Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Recent Transactions -->
                <div class="glassmorphism p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-text-primary">Recent Transactions</h3>
                        <button class="text-sm text-primary hover:underline">View All</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead>
                                <tr class="text-text-muted border-b border-dark-border">
                                    <th class="pb-3">Asset</th>
                                    <th class="pb-3">Type</th>
                                    <th class="pb-3">Amount</th>
                                    <th class="pb-3">Status</th>
                                    <th class="pb-3">Date</th>
                                </tr>
                            </thead>
                            <tbody class="space-y-2">
                                <tr class="border-b border-dark-border">
                                    <td class="py-3">
                                        <div class="flex items-center space-x-2">
                                            <i class="fab fa-bitcoin text-warning"></i>
                                            <span>Bitcoin</span>
                                        </div>
                                    </td>
                                    <td class="py-3 text-success">Buy</td>
                                    <td class="py-3">0.25 BTC</td>
                                    <td class="py-3">
                                        <span class="bg-success text-dark px-2 py-1 rounded-full text-xs">Completed</span>
                                    </td>
                                    <td class="py-3 text-text-muted">2 hours ago</td>
                                </tr>
                                <tr class="border-b border-dark-border">
                                    <td class="py-3">
                                        <div class="flex items-center space-x-2">
                                            <i class="fab fa-ethereum text-secondary"></i>
                                            <span>Ethereum</span>
                                        </div>
                                    </td>
                                    <td class="py-3 text-error">Sell</td>
                                    <td class="py-3">5.0 ETH</td>
                                    <td class="py-3">
                                        <span class="bg-warning text-dark px-2 py-1 rounded-full text-xs">Pending</span>
                                    </td>
                                    <td class="py-3 text-text-muted">5 hours ago</td>
                                </tr>
                                <tr class="border-b border-dark-border">
                                    <td class="py-3">
                                        <div class="flex items-center space-x-2">
                                            <i class="fas fa-coins text-accent"></i>
                                            <span>Cardano</span>
                                        </div>
                                    </td>
                                    <td class="py-3 text-success">Buy</td>
                                    <td class="py-3">1,000 ADA</td>
                                    <td class="py-3">
                                        <span class="bg-success text-dark px-2 py-1 rounded-full text-xs">Completed</span>
                                    </td>
                                    <td class="py-3 text-text-muted">1 day ago</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Market Overview -->
                <div class="glassmorphism p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-text-primary">Top Cryptocurrencies</h3>
                        <button class="text-sm text-primary hover:underline">Market</button>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 bg-dark-lighter rounded-lg">
                            <div class="flex items-center space-x-3">
                                <i class="fab fa-bitcoin text-warning text-xl"></i>
                                <div>
                                    <p class="font-semibold">Bitcoin</p>
                                    <p class="text-xs text-text-muted">BTC</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold">$67,234</p>
                                <p class="text-xs text-success">+2.4%</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between p-3 bg-dark-lighter rounded-lg">
                            <div class="flex items-center space-x-3">
                                <i class="fab fa-ethereum text-secondary text-xl"></i>
                                <div>
                                    <p class="font-semibold">Ethereum</p>
                                    <p class="text-xs text-text-muted">ETH</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold">$2,891</p>
                                <p class="text-xs text-error">-1.2%</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between p-3 bg-dark-lighter rounded-lg">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-coins text-accent text-xl"></i>
                                <div>
                                    <p class="font-semibold">Cardano</p>
                                    <p class="text-xs text-text-muted">ADA</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold">$0.89</p>
                                <p class="text-xs text-success">+5.7%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Deposit & Withdraw Section -->
        <div id="deposit-withdraw" class="hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                 <!-- Deposit Section -->
                <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-xl p-6">
                    <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                        <i class="fas fa-arrow-down text-green-400 mr-2"></i>
                        Deposit Crypto
                    </h3>
                    <form class="space-y-4">
                        <div>
                            <label class="block text-gray-300 text-sm font-medium mb-2">Select Currency</label>
                            <select class="w-full bg-gray-700/50 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-400">
                                <option value="BTC">Bitcoin (BTC)</option>
                                <option value="ETH">Ethereum (ETH)</option>
                                <option value="USDT">Tether (USDT)</option>
                                <option value="BNB">Binance Coin (BNB)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-300 text-sm font-medium mb-2">Amount</label>
                            <input type="number" step="0.00000001" placeholder="0.00000000" class="w-full bg-gray-700/50 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-400">
                        </div>
                        <div class="bg-gray-700/30 rounded-lg p-4">
                            <p class="text-sm text-gray-300 mb-2">Deposit Address:</p>
                            <div class="flex items-center space-x-2">
                                <code class="flex-1 bg-gray-800 px-3 py-2 rounded text-yellow-400 text-sm">1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa</code>
                                <button type="button" onclick="copyToClipboard('1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa')" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 px-3 py-2 rounded transition-colors">
                                    <i class="fas fa-copy"></i>
                                </button>
                            </div>
                            <div class="mt-4 text-center">
                                <div class="inline-block bg-white p-2 rounded">
                                    <canvas id="depositQR" width="120" height="120"></canvas>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                 <!-- Withdraw Section -->
                <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-xl p-6">
                    <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                        <i class="fas fa-arrow-up text-red-400 mr-2"></i>
                        Withdraw Crypto
                    </h3>
                    <form class="space-y-4">
                        <div>
                            <label class="block text-gray-300 text-sm font-medium mb-2">Select Currency</label>
                            <select class="w-full bg-gray-700/50 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-400">
                                <option value="BTC">Bitcoin (BTC) - Available: 2.45678901</option>
                                <option value="ETH">Ethereum (ETH) - Available: 15.234567</option>
                                <option value="USDT">Tether (USDT) - Available: 5,432.10</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-300 text-sm font-medium mb-2">Recipient Address</label>
                            <input type="text" placeholder="Enter wallet address" class="w-full bg-gray-700/50 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-400">
                        </div>
                        <div>
                            <label class="block text-gray-300 text-sm font-medium mb-2">Amount</label>
                            <div class="relative">
                                <input type="number" step="0.00000001" placeholder="0.00000000" class="w-full bg-gray-700/50 border border-gray-600 rounded-lg px-4 py-3 pr-16 text-white focus:outline-none focus:border-yellow-400">
                                <button type="button" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-yellow-400 text-sm hover:text-yellow-300">MAX</button>
                            </div>
                        </div>
                        <div class="bg-gray-700/30 rounded-lg p-4">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-300">Network Fee:</span>
                                <span class="text-white">0.0001 BTC</span>
                            </div>
                            <div class="flex justify-between text-sm mt-1">
                                <span class="text-gray-300">You'll Receive:</span>
                                <span class="text-green-400">0.0000 BTC</span>
                            </div>
                        </div>
                        <button type="submit" class="w-full bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-semibold py-3 rounded-lg transition-all duration-300">
                            Withdraw
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Send & Receive Section -->
        <div id="send-receive" class="hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                 <!-- Send Section -->
                <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-xl p-6">
                    <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                        <i class="fas fa-paper-plane text-blue-400 mr-2"></i>
                        Send Crypto
                    </h3>
                    <form class="space-y-4">
                        <div>
                            <label class="block text-gray-300 text-sm font-medium mb-2">From Wallet</label>
                            <select class="w-full bg-gray-700/50 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-400">
                                <option value="BTC">Bitcoin Wallet - 2.45678901 BTC</option>
                                <option value="ETH">Ethereum Wallet - 15.234567 ETH</option>
                                <option value="USDT">USDT Wallet - 5,432.10 USDT</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-300 text-sm font-medium mb-2">Recipient</label>
                            <input type="text" placeholder="Enter wallet address or scan QR" class="w-full bg-gray-700/50 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-400">
                            <button type="button" class="mt-2 text-yellow-400 text-sm hover:text-yellow-300 flex items-center">
                                <i class="fas fa-qrcode mr-1"></i> Scan QR Code
                            </button>
                        </div>
                        <div>
                            <label class="block text-gray-300 text-sm font-medium mb-2">Amount</label>
                            <div class="relative">
                                <input type="number" step="0.00000001" placeholder="0.00000000" class="w-full bg-gray-700/50 border border-gray-600 rounded-lg px-4 py-3 pr-16 text-white focus:outline-none focus:border-yellow-400">
                                <button type="button" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-yellow-400 text-sm hover:text-yellow-300">MAX</button>
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-300 text-sm font-medium mb-2">Note (Optional)</label>
                            <input type="text" placeholder="Add a note for this transaction" class="w-full bg-gray-700/50 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-400">
                        </div>
                        <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold py-3 rounded-lg transition-all duration-300">
                            Send Crypto
                        </button>
                    </form>
                </div>

                 <!-- Receive Section -->
                <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-xl p-6">
                    <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                        <i class="fas fa-download text-green-400 mr-2"></i>
                        Receive Crypto
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-gray-300 text-sm font-medium mb-2">Select Currency</label>
                            <select id="receiveAsset" onchange="updateReceiveAddress()" class="w-full bg-gray-700/50 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-400">
                                <option value="BTC">Bitcoin (BTC)</option>
                                <option value="ETH">Ethereum (ETH)</option>
                                <option value="USDT">Tether (USDT)</option>
                            </select>
                        </div>
                        <div class="bg-gray-700/30 rounded-lg p-4">
                            <p class="text-sm text-gray-300 mb-2">Your Wallet Address:</p>
                            <div class="flex items-center space-x-2 mb-4">
                                <code id="receiveAddress" class="flex-1 bg-gray-800 px-3 py-2 rounded text-yellow-400 text-sm break-all">1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa</code>
                                <button type="button" onclick="copyReceiveAddress()" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 px-3 py-2 rounded transition-colors">
                                    <i class="fas fa-copy"></i>
                                </button>
                            </div>
                            <div class="text-center">
                                <div class="inline-block bg-white p-2 rounded">
                                    <canvas id="receiveQR" width="150" height="150"></canvas>
                                </div>
                            </div>
                            <p class="text-xs text-gray-400 mt-4 text-center">
                                Only send <span id="selectedAsset">Bitcoin</span> to this address. Sending other assets may result in permanent loss.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Exchange/Swap Section -->
        <div id="exchange" class="hidden">
            <div class="max-w-2xl mx-auto">
                <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-xl p-6">
                    <h3 class="text-xl font-semibold text-white mb-6 flex items-center">
                        <i class="fas fa-exchange-alt text-purple-400 mr-2"></i>
                        Crypto Exchange
                    </h3>
                    <form class="space-y-6">
                         <!-- From Section -->
                        <div class="bg-gray-700/30 rounded-lg p-4">
                            <label class="block text-gray-300 text-sm font-medium mb-2">From</label>
                            <div class="flex items-center space-x-4">
                                <select class="bg-gray-700/50 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-400">
                                    <option value="BTC">Bitcoin (BTC)</option>
                                    <option value="ETH">Ethereum (ETH)</option>
                                    <option value="USDT">Tether (USDT)</option>
                                </select>
                                <input type="number" step="0.00000001" placeholder="0.00000000" class="flex-1 bg-gray-700/50 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-400">
                            </div>
                            <p class="text-xs text-gray-400 mt-2">Available: 2.45678901 BTC</p>
                        </div>

                         <!-- Swap Button -->
                        <div class="flex justify-center">
                            <button type="button" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 p-3 rounded-full transition-colors">
                                <i class="fas fa-arrow-down"></i>
                            </button>
                        </div>

                         <!-- To Section -->
                        <div class="bg-gray-700/30 rounded-lg p-4">
                            <label class="block text-gray-300 text-sm font-medium mb-2">To</label>
                            <div class="flex items-center space-x-4">
                                <select class="bg-gray-700/50 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-400">
                                    <option value="ETH">Ethereum (ETH)</option>
                                    <option value="BTC">Bitcoin (BTC)</option>
                                    <option value="USDT">Tether (USDT)</option>
                                </select>
                                <input type="number" step="0.00000001" placeholder="0.00000000" readonly class="flex-1 bg-gray-600/50 border border-gray-600 rounded-lg px-4 py-3 text-gray-300">
                            </div>
                            <p class="text-xs text-gray-400 mt-2">Estimated: ~15.234 ETH</p>
                        </div>

                         <!-- Exchange Rate -->
                        <div class="bg-gray-700/30 rounded-lg p-4">
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-gray-300">Exchange Rate:</span>
                                <span class="text-white">1 BTC = 15.234 ETH</span>
                            </div>
                            <div class="flex justify-between items-center text-sm mt-2">
                                <span class="text-gray-300">Network Fee:</span>
                                <span class="text-white">0.001 BTC</span>
                            </div>
                            <div class="flex justify-between items-center text-sm mt-2">
                                <span class="text-gray-300">Exchange Fee (0.1%):</span>
                                <span class="text-white">0.0001 BTC</span>
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white font-semibold py-3 rounded-lg transition-all duration-300">
                            Exchange Now
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Security Center Section -->
        <div id="security" class="hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                 <!-- 2FA Setup -->
                <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-xl p-6">
                    <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                        <i class="fas fa-shield-alt text-green-400 mr-2"></i>
                        Two-Factor Authentication
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 bg-gray-700/30 rounded-lg">
                            <div>
                                <p class="text-white font-medium">SMS Authentication</p>
                                <p class="text-gray-400 text-sm">+1 *** *** **34</p>
                            </div>
                            <span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Active</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-700/30 rounded-lg">
                            <div>
                                <p class="text-white font-medium">Authenticator App</p>
                                <p class="text-gray-400 text-sm">Google Authenticator</p>
                            </div>
                            <button class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 px-3 py-1 rounded text-xs transition-colors">Setup</button>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-700/30 rounded-lg">
                            <div>
                                <p class="text-white font-medium">Hardware Key</p>
                                <p class="text-gray-400 text-sm">YubiKey, etc.</p>
                            </div>
                            <button class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 px-3 py-1 rounded text-xs transition-colors">Add</button>
                        </div>
                    </div>
                </div>

                 <!-- Device Management -->
                <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-xl p-6">
                    <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                        <i class="fas fa-laptop text-blue-400 mr-2"></i>
                        Device Management
                    </h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between p-3 bg-gray-700/30 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-desktop text-gray-400"></i>
                                <div>
                                    <p class="text-white font-medium">Windows PC</p>
                                    <p class="text-gray-400 text-xs">Chrome • Last active: Now</p>
                                </div>
                            </div>
                            <span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Current</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-700/30 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-mobile-alt text-gray-400"></i>
                                <div>
                                    <p class="text-white font-medium">iPhone 14</p>
                                    <p class="text-gray-400 text-xs">Safari • Last active: 2 hours ago</p>
                                </div>
                            </div>
                            <button class="text-red-400 hover:text-red-300 text-xs">Remove</button>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-700/30 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-tablet-alt text-gray-400"></i>
                                <div>
                                    <p class="text-white font-medium">iPad Pro</p>
                                    <p class="text-gray-400 text-xs">Safari • Last active: 1 day ago</p>
                                </div>
                            </div>
                            <button class="text-red-400 hover:text-red-300 text-xs">Remove</button>
                        </div>
                    </div>
                </div>
            </div>

             <!-- Recent Login Activity -->
            <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-xl p-6 mt-8">
                <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                    <i class="fas fa-history text-purple-400 mr-2"></i>
                    Recent Login Activity
                </h3>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-700">
                                <th class="text-left text-gray-300 font-medium py-3">Date & Time</th>
                                <th class="text-left text-gray-300 font-medium py-3">Device</th>
                                <th class="text-left text-gray-300 font-medium py-3">Location</th>
                                <th class="text-left text-gray-300 font-medium py-3">IP Address</th>
                                <th class="text-left text-gray-300 font-medium py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr class="border-b border-gray-700/50">
                                <td class="py-3 text-white">Dec 15, 2024 10:30 AM</td>
                                <td class="py-3 text-gray-300">Windows PC</td>
                                <td class="py-3 text-gray-300">New York, US</td>
                                <td class="py-3 text-gray-300">192.168.1.1</td>
                                <td class="py-3"><span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Success</span></td>
                            </tr>
                            <tr class="border-b border-gray-700/50">
                                <td class="py-3 text-white">Dec 15, 2024 08:15 AM</td>
                                <td class="py-3 text-gray-300">iPhone 14</td>
                                <td class="py-3 text-gray-300">New York, US</td>
                                <td class="py-3 text-gray-300">192.168.1.2</td>
                                <td class="py-3"><span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Success</span></td>
                            </tr>
                            <tr class="border-b border-gray-700/50">
                                <td class="py-3 text-white">Dec 14, 2024 11:45 PM</td>
                                <td class="py-3 text-gray-300">Unknown Device</td>
                                <td class="py-3 text-gray-300">London, UK</td>
                                <td class="py-3 text-gray-300">185.123.45.67</td>
                                <td class="py-3"><span class="bg-red-500 text-white px-2 py-1 rounded text-xs">Blocked</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- API Access Section -->
        <div id="api-access" class="hidden">
            <div class="max-w-4xl mx-auto space-y-6">
                 <!-- API Keys Management -->
                <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-xl p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-semibold text-white flex items-center">
                            <i class="fas fa-key text-yellow-400 mr-2"></i>
                            API Keys
                        </h3>
                        <button class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 px-4 py-2 rounded-lg font-medium transition-colors">
                            <i class="fas fa-plus mr-2"></i>Create New Key
                        </button>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="bg-gray-700/30 rounded-lg p-4">
                            <div class="flex items-center justify-between mb-3">
                                <div>
                                    <h4 class="text-white font-medium">Trading Bot API</h4>
                                    <p class="text-gray-400 text-sm">Created: Dec 10, 2024</p>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Active</span>
                                    <button class="text-red-400 hover:text-red-300">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <div>
                                    <label class="block text-gray-300 text-xs mb-1">API Key</label>
                                    <div class="flex items-center space-x-2">
                                        <code class="flex-1 bg-gray-800 px-3 py-2 rounded text-yellow-400 text-sm">ak_live_1234567890abcdef...</code>
                                        <button onclick="copyToClipboard('ak_live_1234567890abcdef')" class="bg-gray-600 hover:bg-gray-500 text-white px-3 py-2 rounded transition-colors">
                                            <i class="fas fa-copy"></i>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-300 text-xs mb-1">Secret Key</label>
                                    <div class="flex items-center space-x-2">
                                        <code class="flex-1 bg-gray-800 px-3 py-2 rounded text-gray-400 text-sm">••••••••••••••••••••••••••••••••</code>
                                        <button class="bg-gray-600 hover:bg-gray-500 text-white px-3 py-2 rounded transition-colors">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 flex flex-wrap gap-2">
                                <span class="bg-blue-500/20 text-blue-400 px-2 py-1 rounded text-xs">Read</span>
                                <span class="bg-green-500/20 text-green-400 px-2 py-1 rounded text-xs">Trade</span>
                                <span class="bg-purple-500/20 text-purple-400 px-2 py-1 rounded text-xs">Withdraw</span>
                            </div>
                        </div>

                        <div class="bg-gray-700/30 rounded-lg p-4">
                            <div class="flex items-center justify-between mb-3">
                                <div>
                                    <h4 class="text-white font-medium">Portfolio Tracker</h4>
                                    <p class="text-gray-400 text-sm">Created: Dec 5, 2024</p>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="bg-gray-500 text-white px-2 py-1 rounded text-xs">Inactive</span>
                                    <button class="text-red-400 hover:text-red-300">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="mt-3 flex flex-wrap gap-2">
                                <span class="bg-blue-500/20 text-blue-400 px-2 py-1 rounded text-xs">Read</span>
                            </div>
                        </div>
                    </div>
                </div>

                 <!-- API Usage Statistics -->
                <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-xl p-6 mt-8">
                    <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                        <i class="fas fa-chart-bar text-blue-400 mr-2"></i>
                        API Usage Statistics
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <div class="bg-gray-700/30 rounded-lg p-4 text-center">
                            <p class="text-2xl font-bold text-white">1,247</p>
                            <p class="text-gray-400 text-sm">Requests Today</p>
                        </div>
                        <div class="bg-gray-700/30 rounded-lg p-4 text-center">
                            <p class="text-2xl font-bold text-white">45,892</p>
                            <p class="text-gray-400 text-sm">This Month</p>
                        </div>
                        <div class="bg-gray-700/30 rounded-lg p-4 text-center">
                            <p class="text-2xl font-bold text-white">99.9%</p>
                            <p class="text-gray-400 text-sm">Uptime</p>
                        </div>
                    </div>
                    <div class="bg-gray-700/30 rounded-lg p-4">
                        <h4 class="text-white font-medium mb-3">Rate Limits</h4>
                        <div class="space-y-2">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-300">Public API</span>
                                <span class="text-white">1,200 / 1,200 per hour</span>
                            </div>
                            <div class="w-full bg-gray-600 rounded-full h-2">
                                <div class="bg-yellow-400 h-2 rounded-full" style="width: 100%"></div>
                            </div>
                            <div class="flex justify-between items-center mt-3">
                                <span class="text-gray-300">Private API</span>
                                <span class="text-white">47 / 100 per minute</span>
                            </div>
                            <div class="w-full bg-gray-600 rounded-full h-2">
                                <div class="bg-green-400 h-2 rounded-full" style="width: 47%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Market News Section -->
        <div id="market-news" class="hidden">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                 <!-- Latest News -->
                <div class="lg:col-span-2 bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-xl p-6">
                    <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                        <i class="fas fa-newspaper text-blue-400 mr-2"></i>
                        Latest Crypto News
                    </h3>
                    <div class="space-y-4">
                        <article class="border-b border-gray-700/50 pb-4">
                            <div class="flex items-start space-x-4">
                                <img src="https://via.placeholder.com/60" alt="News" class="w-15 h-15 rounded-lg object-cover">
                                <div class="flex-1">
                                    <h4 class="text-white font-medium mb-1">Bitcoin Reaches New All-Time High Above $100,000</h4>
                                    <p class="text-gray-400 text-sm mb-2">Bitcoin surged past the $100,000 milestone for the first time, driven by institutional adoption and regulatory clarity...</p>
                                    <div class="flex items-center text-xs text-gray-500">
                                        <span>CoinDesk</span>
                                        <span class="mx-2">•</span>
                                        <span>2 hours ago</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                        
                        <article class="border-b border-gray-700/50 pb-4">
                            <div class="flex items-start space-x-4">
                                <img src="https://via.placeholder.com/60" alt="News" class="w-15 h-15 rounded-lg object-cover">
                                <div class="flex-1">
                                    <h4 class="text-white font-medium mb-1">Ethereum 2.0 Staking Rewards Increase to 5.2%</h4>
                                    <p class="text-gray-400 text-sm mb-2">The latest network upgrade has improved staking yields, attracting more validators to secure the network...</p>
                                    <div class="flex items-center text-xs text-gray-500">
                                        <span>The Block</span>
                                        <span class="mx-2">•</span>
                                        <span>4 hours ago</span>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="border-b border-gray-700/50 pb-4">
                            <div class="flex items-start space-x-4">
                                <img src="https://via.placeholder.com/60" alt="News" class="w-15 h-15 rounded-lg object-cover">
                                <div class="flex-1">
                                    <h4 class="text-white font-medium mb-1">DeFi TVL Surpasses $200 Billion Mark</h4>
                                    <p class="text-gray-400 text-sm mb-2">Total Value Locked in DeFi protocols reaches a new record, signaling growing confidence in decentralized finance...</p>
                                    <div class="flex items-center text-xs text-gray-500">
                                        <span>DeFi Pulse</span>
                                        <span class="mx-2">•</span>
                                        <span>6 hours ago</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>

                 <!-- Price Alerts & Market Insights -->
                <div class="space-y-6">
                     <!-- Price Alerts -->
                    <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-xl p-6">
                        <h3 class="text-lg font-semibold text-white mb-4 flex items-center">
                            <i class="fas fa-bell text-yellow-400 mr-2"></i>
                            Price Alerts
                        </h3>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-3 bg-gray-700/30 rounded-lg">
                                <div>
                                    <p class="text-white font-medium">BTC > $105,000</p>
                                    <p class="text-gray-400 text-sm">Target reached!</p>
                                </div>
                                <span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Triggered</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-gray-700/30 rounded-lg">
                                <div>
                                    <p class="text-white font-medium">ETH < $3,800</p>
                                    <p class="text-gray-400 text-sm">Waiting...</p>
                                </div>
                                <span class="bg-blue-500 text-white px-2 py-1 rounded text-xs">Active</span>
                            </div>
                        </div>
                        <button class="w-full mt-4 bg-yellow-400 hover:bg-yellow-500 text-gray-900 py-2 rounded-lg font-medium transition-colors">
                            <i class="fas fa-plus mr-2"></i>Add Alert
                        </button>
                    </div>

                     <!-- Market Insights -->
                    <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-xl p-6">
                        <h3 class="text-lg font-semibold text-white mb-4 flex items-center">
                            <i class="fas fa-chart-line text-green-400 mr-2"></i>
                            Market Insights
                        </h3>
                        <div class="space-y-4">
                            <div class="bg-gray-700/30 rounded-lg p-3">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-gray-300 text-sm">Fear & Greed Index</span>
                                    <span class="text-green-400 font-medium">78 - Extreme Greed</span>
                                </div>
                                <div class="w-full bg-gray-600 rounded-full h-2">
                                    <div class="bg-green-400 h-2 rounded-full" style="width: 78%"></div>
                                </div>
                            </div>
                            <div class="bg-gray-700/30 rounded-lg p-3">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-gray-300 text-sm">Market Cap</span>
                                    <span class="text-white font-medium">$3.2T</span>
                                </div>
                                <p class="text-green-400 text-xs">+5.2% (24h)</p>
                            </div>
                            <div class="bg-gray-700/30 rounded-lg p-3">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-gray-300 text-sm">BTC Dominance</span>
                                    <span class="text-white font-medium">42.3%</span>
                                </div>
                                <p class="text-red-400 text-xs">-1.1% (24h)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Support Section -->
        <div id="support" class="hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                 <!-- Help Center -->
                <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-xl p-6">
                    <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                        <i class="fas fa-question-circle text-blue-400 mr-2"></i>
                        Help Center
                    </h3>
                    <div class="space-y-4">
                        <div class="bg-gray-700/30 rounded-lg p-4 hover:bg-gray-700/50 transition-colors cursor-pointer">
                            <h4 class="text-white font-medium mb-2">Getting Started</h4>
                            <p class="text-gray-400 text-sm">Learn the basics of using CryptoVault Pro</p>
                        </div>
                        <div class="bg-gray-700/30 rounded-lg p-4 hover:bg-gray-700/50 transition-colors cursor-pointer">
                            <h4 class="text-white font-medium mb-2">Security & Safety</h4>
                            <p class="text-gray-400 text-sm">Best practices for keeping your crypto safe</p>
                        </div>
                        <div class="bg-gray-700/30 rounded-lg p-4 hover:bg-gray-700/50 transition-colors cursor-pointer">
                            <h4 class="text-white font-medium mb-2">Trading Guide</h4>
                            <p class="text-gray-400 text-sm">How to buy, sell, and trade cryptocurrencies</p>
                        </div>
                        <div class="bg-gray-700/30 rounded-lg p-4 hover:bg-gray-700/50 transition-colors cursor-pointer">
                            <h4 class="text-white font-medium mb-2">API Documentation</h4>
                            <p class="text-gray-400 text-sm">Technical documentation for developers</p>
                        </div>
                    </div>
                </div>

                 <!-- Contact Support -->
                <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-xl p-6">
                    <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                        <i class="fas fa-headset text-green-400 mr-2"></i>
                        Contact Support
                    </h3>
                    <form class="space-y-4">
                        <div>
                            <label class="block text-gray-300 text-sm font-medium mb-2">Subject</label>
                            <select class="w-full bg-gray-700/50 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-400">
                                <option>Account Issues</option>
                                <option>Trading Problems</option>
                                <option>Security Concerns</option>
                                <option>Technical Support</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-300 text-sm font-medium mb-2">Priority</label>
                            <select class="w-full bg-gray-700/50 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-400">
                                <option>Low</option>
                                <option>Medium</option>
                                <option>High</option>
                                <option>Urgent</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-300 text-sm font-medium mb-2">Message</label>
                            <textarea rows="4" placeholder="Describe your issue in detail..." class="w-full bg-gray-700/50 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-400 resize-none"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold py-3 rounded-lg transition-all duration-300">
                            Send Message
                        </button>
                    </form>
                    
                    <div class="mt-6 pt-6 border-t border-gray-700">
                        <h4 class="text-white font-medium mb-3">Other Ways to Reach Us</h4>
                        <div class="space-y-2 text-sm">
                            <p class="text-gray-300">
                                <i class="fas fa-envelope text-yellow-400 mr-2"></i>
                                support@cryptovault.pro
                            </p>
                            <p class="text-gray-300">
                                <i class="fas fa-phone text-yellow-400 mr-2"></i>
                                +1 (555) 123-4567
                            </p>
                            <p class="text-gray-300">
                                <i class="fas fa-clock text-yellow-400 mr-2"></i>
                                24/7 Support Available
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Referral Program Section -->
        <div id="referral" class="hidden">
            <div class="max-w-4xl mx-auto space-y-6">
                 <!-- Referral Overview -->
                <div class="bg-gradient-to-r from-purple-500/20 to-pink-500/20 border border-purple-500/30 rounded-xl p-6">
                    <div class="text-center mb-6">
                        <h3 class="text-2xl font-bold text-white mb-2">Earn with Every Referral</h3>
                        <p class="text-gray-300">Invite friends and earn 25% of their trading fees forever!</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-gray-800/50 rounded-lg p-4 text-center">
                            <p class="text-2xl font-bold text-purple-400">$1,247</p>
                            <p class="text-gray-300 text-sm">Total Earned</p>
                        </div>
                        <div class="bg-gray-800/50 rounded-lg p-4 text-center">
                            <p class="text-2xl font-bold text-pink-400">23</p>
                            <p class="text-gray-300 text-sm">Active Referrals</p>
                        </div>
                        <div class="bg-gray-800/50 rounded-lg p-4 text-center">
                            <p class="text-2xl font-bold text-yellow-400">$89</p>
                            <p class="text-gray-300 text-sm">This Month</p>
                        </div>
                    </div>
                </div>

                 <!-- Referral Link -->
                <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-xl p-6">
                    <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                        <i class="fas fa-link text-blue-400 mr-2"></i>
                        Your Referral Link
                    </h3>
                    <div class="flex items-center space-x-4 mb-4">
                        <input type="text" value="https://cryptovault.pro/ref/CV123456" readonly class="flex-1 bg-gray-700/50 border border-gray-600 rounded-lg px-4 py-3 text-white">
                        <button onclick="copyToClipboard('https://cryptovault.pro/ref/CV123456')" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 px-6 py-3 rounded-lg font-medium transition-colors">
                            <i class="fas fa-copy mr-2"></i>Copy
                        </button>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                            <i class="fab fa-twitter mr-2"></i>Share on Twitter
                        </button>
                        <button class="bg-blue-800 hover:bg-blue-900 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                            <i class="fab fa-facebook mr-2"></i>Share on Facebook
                        </button>
                        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                            <i class="fab fa-whatsapp mr-2"></i>Share on WhatsApp
                        </button>
                    </div>
                </div>

                 <!-- Referral History -->
                <div class="bg-gray-800/50 backdrop-blur-sm border border-gray-700/50 rounded-xl p-6 mt-8">
                    <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                        <i class="fas fa-users text-green-400 mr-2"></i>
                        Referral History
                    </h3>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-gray-700">
                                    <th class="text-left text-gray-300 font-medium py-3">User</th>
                                    <th class="text-left text-gray-300 font-medium py-3">Join Date</th>
                                    <th class="text-left text-gray-300 font-medium py-3">Status</th>
                                    <th class="text-left text-gray-300 font-medium py-3">Total Earned</th>
                                    <th class="text-left text-gray-300 font-medium py-3">This Month</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                <tr class="border-b border-gray-700/50">
                                    <td class="py-3 text-white">user_crypto123</td>
                                    <td class="py-3 text-gray-300">Dec 10, 2024</td>
                                    <td class="py-3"><span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Active</span></td>
                                    <td class="py-3 text-green-400">$234.50</td>
                                    <td class="py-3 text-green-400">$45.20</td>
                                </tr>
                                <tr class="border-b border-gray-700/50">
                                    <td class="py-3 text-white">trader_pro</td>
                                    <td class="py-3 text-gray-300">Dec 8, 2024</td>
                                    <td class="py-3"><span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Active</span></td>
                                    <td class="py-3 text-green-400">$189.75</td>
                                    <td class="py-3 text-green-400">$23.10</td>
                                </tr>
                                <tr class="border-b border-gray-700/50">
                                    <td class="py-3 text-white">bitcoin_hodler</td>
                                    <td class="py-3 text-gray-300">Dec 5, 2024</td>
                                    <td class="py-3"><span class="bg-yellow-500 text-white px-2 py-1 rounded text-xs">Pending</span></td>
                                    <td class="py-3 text-green-400">$0.00</td>
                                    <td class="py-3 text-green-400">$0.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Placeholder for other sections like Portfolio, Trading, Analytics, etc. -->
        <!-- These would be implemented similarly to the dashboard section -->

    </main>

    <script>
        // Balance visibility toggle functionality
        let balanceVisible = true;
        const balanceToggle = document.getElementById('balanceToggle');
        const eyeIcon = document.getElementById('eyeIcon');
        const balanceElements = ['totalBalance', 'btcBalance', 'ethBalance'];

        balanceToggle.addEventListener('click', function() {
            balanceVisible = !balanceVisible;
            
            balanceElements.forEach(id => {
                const element = document.getElementById(id);
                if (balanceVisible) {
                    element.classList.remove('balance-hidden');
                    eyeIcon.className = 'fas fa-eye text-text-muted';
                    balanceToggle.querySelector('span').textContent = 'Hide Balance';
                } else {
                    element.classList.add('balance-hidden');
                    eyeIcon.className = 'fas fa-eye-slash text-text-muted';
                    balanceToggle.querySelector('span').textContent = 'Show Balance';
                }
            });
        });

        // Enhanced Chart.js configurations
        const balanceChart = new Chart(document.getElementById('balanceChart').getContext('2d'), {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Portfolio Value',
                    data: [950000, 980000, 1020000, 1010000, 1040000, 1035000, 1050000],
                    borderColor: '#F59E0B',
                    backgroundColor: 'rgba(245, 158, 11, 0.1)',
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#F59E0B',
                    pointBorderColor: '#FFFFFF',
                    pointBorderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { 
                    legend: { display: false }
                },
                scales: { 
                    x: { 
                        grid: { display: false, color: '#3A3A3B' },
                        ticks: { color: '#A1A1AA' }
                    }, 
                    y: { 
                        grid: { color: '#3A3A3B' },
                        ticks: { color: '#A1A1AA' }
                    }
                }
            }
        });

        const projectChart = new Chart(document.getElementById('projectChart').getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['Bitcoin', 'Ethereum', 'Cardano', 'Others'],
                datasets: [{
                    data: [35, 28, 20, 17],
                    backgroundColor: ['#F59E0B', '#10B981', '#3B82F6', '#7C3AED'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { 
                    legend: { 
                        position: 'bottom',
                        labels: { color: '#A1A1AA', padding: 20 }
                    }
                }
            }
        });

        // Enhanced navigation function
        function showSection(sectionId) {
            // Hide all main content sections
            const mainSections = ['dashboard', 'deposit-withdraw', 'send-receive', 'exchange', 'security', 'api-access', 'market-news', 'support', 'referral'];
            mainSections.forEach(section => {
                const element = document.getElementById(section);
                if (element) {
                    element.classList.add('hidden');
                }
            });

            // Show selected section
            const selectedSection = document.getElementById(sectionId);
            if (selectedSection) {
                selectedSection.classList.remove('hidden');
            }

            // Update active sidebar item
            document.querySelectorAll('.sidebar-item').forEach(item => {
               
                item.classList.remove('active');
            });

            const activeItem = document.querySelector(`[onclick="showSection('${sectionId}')"]`);
            if (activeItem) {
                activeItem.classList.add('active');
            }
        }

        // Copy to clipboard function
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                // Show success message
                const toast = document.createElement('div');
                toast.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg z-50';
                toast.textContent = 'Copied to clipboard!';
                document.body.appendChild(toast);
                setTimeout(() => toast.remove(), 2000);
            });
        }

        // Copy receive address function
        function copyReceiveAddress() {
            const address = document.getElementById('receiveAddress').textContent;
            copyToClipboard(address);
        }

        // Update receive address based on selected asset
        function updateReceiveAddress() {
            const asset = document.getElementById('receiveAsset').value;
            const addressElement = document.getElementById('receiveAddress');
            const assetNameElement = document.getElementById('selectedAsset');
            
            const addresses = {
                'BTC': '1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa',
                'ETH': '0x742d35Cc6634C0532925a3b8D4C2C4e4C4C4C4',
                'USDT': 'TQn9Y2khEsLJW1ChVWFMSMeRDow5CXDB2i'
            };

            const assetNames = {
                'BTC': 'Bitcoin',
                'ETH': 'Ethereum', 
                'USDT': 'Tether (USDT)'
            };

            addressElement.textContent = addresses[asset] || addresses['BTC'];
            assetNameElement.textContent = assetNames[asset] || assetNames['BTC'];
            
            // Update QR code (simplified - in real implementation would generate actual QR)
            generateQRCode('receiveQR', addresses[asset] || addresses['BTC']);
        }

        // Simple QR code generation (placeholder)
        function generateQRCode(canvasId, text) {
            const canvas = document.getElementById(canvasId);
            if (canvas) {
                const ctx = canvas.getContext('2d');
                ctx.fillStyle = '#000';
                ctx.fillRect(0, 0, canvas.width, canvas.height);
                ctx.fillStyle = '#fff';
                ctx.font = '10px Arial';
                ctx.textAlign = 'center';
                ctx.fillText('QR Code Placeholder', canvas.width / 2, canvas.height / 2 - 10);
                ctx.fillText(text.substring(0, 15) + '...', canvas.width / 2, canvas.height / 2 + 10);
            }
        }

        // Initialize QR codes on page load
        document.addEventListener('DOMContentLoaded', function() {
            generateQRCode('depositQR', '1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa');
            updateReceiveAddress(); // Initialize receive address and QR code
        });

        // Initial call to show the default dashboard section
        document.addEventListener('DOMContentLoaded', function() {
            showSection('dashboard');
        });
    </script>
</body>
</html>
