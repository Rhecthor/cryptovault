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
                                };
                            </script>
                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <style>
                                .glassmorphism {
                                    background: rgba(30, 41, 59, 0.7);
                                    backdrop-filter: blur(12px);
                                    border-radius: 16px;
                                    border: 1px solid rgba(255,255,255,0.08);
                                    box-shadow: 0 8px 32px 0 rgba(31, 41, 55, 0.37);
                                }
                            </style>
                        </head>
                        <body class="bg-dark text-white font-sans min-h-screen flex">
                            <!-- Sidebar -->
                            <aside class="w-72 bg-dark-lighter h-screen p-6 flex flex-col glassmorphism">
                                <div class="mb-8 flex items-center space-x-3">
                                    <img src="https://via.placeholder.com/40" alt="Logo" class="rounded-lg">
                                    <h2 class="text-2xl font-bold text-primary">CryptoVault Pro</h2>
                                </div>
                                <nav class="flex-1">
                                    <ul class="space-y-2">
                                        <li><a href="#" class="block py-2 px-4 rounded-lg hover:bg-dark-light transition">Dashboard</a></li>
                                        <li><a href="#" class="block py-2 px-4 rounded-lg bg-primary text-white">Analytics</a></li>
                                        <li><a href="#" class="block py-2 px-4 rounded-lg hover:bg-dark-light transition">Transactions</a></li>
                                        <li><a href="#" class="block py-2 px-4 rounded-lg hover:bg-dark-light transition">Reports</a></li>
                                        <li><a href="#" class="block py-2 px-4 rounded-lg hover:bg-dark-light transition">Settings</a></li>
                                    </ul>
                                </nav>
                                <div class="mt-8">
                                    <button class="w-full py-2 bg-warning text-dark font-semibold rounded-lg">Log Out</button>
                                </div>
                            </aside>
                            <!-- Main Content -->
                            <main class="flex-1 p-8 bg-dark flex flex-col gap-8">
                                <!-- Top Cards -->
                                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                                    <div class="glassmorphism p-6 text-center">
                                        <h3 class="text-lg font-semibold text-gray-300 mb-2">Total Balance</h3>
                                        <p class="text-3xl font-bold text-primary mb-1">$1,050,047</p>
                                        <span class="text-success">+2.3%</span>
                                    </div>
                                    <div class="glassmorphism p-6 text-center">
                                        <h3 class="text-lg font-semibold text-gray-300 mb-2">BTC Wallet</h3>
                                        <p class="text-3xl font-bold text-warning mb-1">$192,390</p>
                                        <span class="text-success">+1.1%</span>
                                    </div>
                                    <div class="glassmorphism p-6 text-center">
                                        <h3 class="text-lg font-semibold text-gray-300 mb-2">ETH Wallet</h3>
                                        <p class="text-3xl font-bold text-accent mb-1">$293,105</p>
                                        <span class="text-error">-0.7%</span>
                                    </div>
                                    <div class="glassmorphism p-6 text-center">
                                        <h3 class="text-lg font-semibold text-gray-300 mb-2">Open Orders</h3>
                                        <p class="text-3xl font-bold text-secondary mb-1">27</p>
                                        <span class="text-warning">Pending</span>
                                    </div>
                                </div>
                                <!-- Charts & Project Completion -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    <div class="glassmorphism p-6">
                                        <h3 class="text-lg font-semibold mb-4">Balance Overview</h3>
                                        <canvas id="balanceChart"></canvas>
                                    </div>
                                    <div class="glassmorphism p-6">
                                        <h3 class="text-lg font-semibold mb-4">Project Completion</h3>
                                        <canvas id="projectChart"></canvas>
                                    </div>
                                </div>
                                <!-- Transactions & Reports -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    <div class="glassmorphism p-6">
                                        <h3 class="text-lg font-semibold mb-4">Transactions</h3>
                                        <table class="w-full text-left text-sm">
                                            <thead>
                                                <tr class="text-gray-400">
                                                    <th>Name</th>
                                                    <th>Status</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="py-2">Jonathan Sandoval</td>
                                                    <td><span class="bg-success text-white px-2 py-1 rounded">Completed</span></td>
                                                    <td>$7,500</td>
                                                    <td>04 Jul 2024</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">Matt Dotsey</td>
                                                    <td><span class="bg-warning text-dark px-2 py-1 rounded">In Progress</span></td>
                                                    <td>$4,100</td>
                                                    <td>10 Jun 2024</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">Andre Parker</td>
                                                    <td><span class="bg-error text-white px-2 py-1 rounded">Failed</span></td>
                                                    <td>$2,300</td>
                                                    <td>18 May 2024</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">Miguel Chavez</td>
                                                    <td><span class="bg-success text-white px-2 py-1 rounded">Completed</span></td>
                                                    <td>$6,800</td>
                                                    <td>23 Apr 2024</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="glassmorphism p-6">
                                        <h3 class="text-lg font-semibold mb-4">Weekly Reports</h3>
                                        <table class="w-full text-left text-sm">
                                            <thead>
                                                <tr class="text-gray-400">
                                                    <th>Name</th>
                                                    <th>Status</th>
                                                    <th>Size</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="py-2">Jonathan Sandoval</td>
                                                    <td>In Progress</td>
                                                    <td>56 MB</td>
                                                    <td>04 Jul 2024</td>
                                                    <td>04:41 AM</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">Matt Dotsey</td>
                                                    <td>In Progress</td>
                                                    <td>43 MB</td>
                                                    <td>10 Jun 2024</td>
                                                    <td>03:14 PM</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">Andre Parker</td>
                                                    <td>Submitted</td>
                                                    <td>28 MB</td>
                                                    <td>18 May 2024</td>
                                                    <td>09:47 AM</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-2">Miguel Chavez</td>
                                                    <td>Submitted</td>
                                                    <td>24 MB</td>
                                                    <td>23 Apr 2024</td>
                                                    <td>07:11 AM</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </main>
                            <script>
                                // Chart.js configs
                                const balanceChart = new Chart(document.getElementById('balanceChart').getContext('2d'), {
                                    type: 'line',
                                    data: {
                                        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                                        datasets: [{
                                            label: 'Balance',
                                            data: [7500, 8200, 7900, 8600, 9000, 9400, 10000],
                                            borderColor: '#F59E0B',
                                            backgroundColor: 'rgba(245, 158, 11, 0.2)',
                                            fill: true,
                                            tension: 0.4
                                        }]
                                    },
                                    options: {
                                        plugins: { legend: { display: false } },
                                        scales: { x: { grid: { display: false } }, y: { grid: { display: false } } }
                                    }
                                });
                                const projectChart = new Chart(document.getElementById('projectChart').getContext('2d'), {
                                    type: 'bar',
                                    data: {
                                        labels: ['Completed', 'In Progress', 'Failed', 'Pending'],
                                        datasets: [{
                                            label: 'Projects',
                                            data: [12, 5, 2, 8],
                                            backgroundColor: ['#10B981', '#F59E0B', '#EF4444', '#7C3AED']
                                        }]
                                    },
                                    options: {
                                        plugins: { legend: { display: false } },
                                        scales: { x: { grid: { display: false } }, y: { grid: { display: false } } }
                                    }
                                });
                            </script>
                        </body>
                        </html>