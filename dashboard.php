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
    </style>
</head>
<body class="bg-dark text-text-primary font-sans min-h-screen flex">
    <!-- Enhanced Sidebar -->
    <aside class="w-80 bg-dark-light h-screen p-6 flex flex-col glassmorphism border-r border-dark-border">
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
        <div class="mb-6 p-4 glassmorphism">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-gradient-to-br from-accent to-secondary rounded-full flex items-center justify-center">
                    <i class="fas fa-user text-white"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-text-primary">John Trader</h3>
                    <p class="text-sm text-text-muted">Premium Member</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1">
            <div class="mb-6">
                <h4 class="text-xs font-semibold text-text-muted uppercase tracking-wider mb-3">Main Menu</h4>
                <ul class="space-y-1">
                    <li>
                        <a href="#dashboard" class="sidebar-item active flex items-center space-x-3 py-3 px-4 rounded-lg text-sm">
                            <i class="fas fa-chart-line w-5"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#portfolio" class="sidebar-item flex items-center space-x-3 py-3 px-4 rounded-lg text-sm">
                            <i class="fas fa-wallet w-5"></i>
                            <span>Portfolio</span>
                            <span class="ml-auto bg-secondary text-dark text-xs px-2 py-1 rounded-full">12</span>
                        </a>
                    </li>
                    <li>
                        <a href="#trading" class="sidebar-item flex items-center space-x-3 py-3 px-4 rounded-lg text-sm">
                            <i class="fas fa-exchange-alt w-5"></i>
                            <span>Trading</span>
                            <div class="notification-dot"></div>
                        </a>
                    </li>
                    <li>
                        <a href="#analytics" class="sidebar-item flex items-center space-x-3 py-3 px-4 rounded-lg text-sm">
                            <i class="fas fa-chart-bar w-5"></i>
                            <span>Analytics</span>
                        </a>
                    </li>
                    <li>
                        <a href="#transactions" class="sidebar-item flex items-center space-x-3 py-3 px-4 rounded-lg text-sm">
                            <i class="fas fa-history w-5"></i>
                            <span>Transactions</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="mb-6">
                <h4 class="text-xs font-semibold text-text-muted uppercase tracking-wider mb-3">Tools</h4>
                <ul class="space-y-1">
                    <li>
                        <a href="#reports" class="sidebar-item flex items-center space-x-3 py-3 px-4 rounded-lg text-sm">
                            <i class="fas fa-file-alt w-5"></i>
                            <span>Reports</span>
                        </a>
                    </li>
                    <li>
                        <a href="#alerts" class="sidebar-item flex items-center space-x-3 py-3 px-4 rounded-lg text-sm">
                            <i class="fas fa-bell w-5"></i>
                            <span>Price Alerts</span>
                            <span class="ml-auto bg-error text-white text-xs px-2 py-1 rounded-full">3</span>
                        </a>
                    </li>
                    <li>
                        <a href="#news" class="sidebar-item flex items-center space-x-3 py-3 px-4 rounded-lg text-sm">
                            <i class="fas fa-newspaper w-5"></i>
                            <span>Market News</span>
                        </a>
                    </li>
                    <li>
                        <a href="#settings" class="sidebar-item flex items-center space-x-3 py-3 px-4 rounded-lg text-sm">
                            <i class="fas fa-cog w-5"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Bottom Section -->
        <div class="mt-auto space-y-3">
            <div class="p-3 glassmorphism">
                <div class="flex items-center justify-between text-sm">
                    <span class="text-text-muted">API Status</span>
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-success rounded-full"></div>
                        <span class="text-success">Connected</span>
                    </div>
                </div>
            </div>
            <button class="w-full py-3 bg-gradient-to-r from-error to-warning text-white font-semibold rounded-lg hover:opacity-90 transition">
                <i class="fas fa-sign-out-alt mr-2"></i>
                Log Out
            </button>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 bg-dark overflow-y-auto">
        <!-- Header with Balance Toggle -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-text-primary">Dashboard</h1>
                <p class="text-text-muted">Welcome back, John. Here's your portfolio overview.</p>
            </div>
            <div class="flex items-center space-x-4">
                <button id="balanceToggle" class="flex items-center space-x-2 px-4 py-2 glassmorphism rounded-lg hover:bg-dark-lighter transition">
                    <i id="eyeIcon" class="fas fa-eye text-text-muted"></i>
                    <span class="text-sm text-text-muted">Hide Balance</span>
                </button>
                <div class="flex items-center space-x-2">
                    <div class="w-3 h-3 bg-success rounded-full animate-pulse"></div>
                    <span class="text-sm text-text-muted">Live Market Data</span>
                </div>
            </div>
        </div>

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

        <!-- Charts Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="glassmorphism p-4 md:p-6 flex flex-col justify-between h-72 md:h-80">
                <div class="flex items-center justify-between mb-2">
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
            
            <div class="glassmorphism p-4 md:p-6 flex flex-col justify-between h-72 md:h-80">
                <div class="flex items-center justify-between mb-2">
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

        // Sidebar navigation functionality
        document.querySelectorAll('.sidebar-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('.sidebar-item').forEach(i => i.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>
