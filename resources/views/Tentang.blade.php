<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Design</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #8A92FF, #C7D2FE);
        }

        .sidebar {
            height: 100vh;
            background: linear-gradient(to bottom, #6A75F0, #4A56E2);
            color: white;
            padding: 20px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            margin: 15px 0;
        }

        .sidebar a:hover {
            text-decoration: underline;
        }

        .main-content {
            padding: 20px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-card {
            background: linear-gradient(to right, #FFD5A7, #FFC371);
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .profile-card img {
            border-radius: 50%;
            border: 4px solid white;
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        .notification-list {
            list-style: none;
            padding: 0;
        }

        .notification-list li {
            margin-bottom: 10px;
            font-size: 14px;
        }

        .recent-products img {
            border-radius: 10px;
            width: 60px;
            height: 60px;
            object-fit: cover;
        }

        .chart-container {
            position: relative;
            width: 100%;
            height: 300px;
        }

        .gradient-btn {
            background: linear-gradient(to right, #4A56E2, #6A75F0);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .gradient-btn:hover {
            background: linear-gradient(to right, #6A75F0, #4A56E2);
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <h4>AnicornApp</h4>
                <a href="#">Dashboard</a>
                <a href="#">Orders</a>
                <a href="#">Tracking</a>
                <a href="#">Revenue</a>
                <a href="#">Analytics</a>
                <hr>
                <a href="#">Settings</a>
                <a href="#">Logout</a>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 main-content">
                <div class="row mb-4">
                    <!-- Analytics Overview -->
                    <div class="col-md-8">
                        <div class="card p-3">
                            <h5>Analytics Overview</h5>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6>Orders</h6>
                                    <p>40,664</p>
                                </div>
                                <div>
                                    <h6>Sales</h6>
                                    <p>243K USD</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Card -->
                    <div class="col-md-4">
                        <div class="profile-card">
                            <img src="https://via.placeholder.com/100" alt="Profile">
                            <h6>Kiera Lyons</h6>
                            <p>Moderator</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Revenue Chart -->
                    <div class="col-md-8">
                        <div class="card p-3">
                            <h5>Revenue</h5>
                            <div class="chart-container">
                                <canvas id="revenueChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Device Chart -->
                    <div class="col-md-4">
                        <div class="card p-3">
                            <h5>Device</h5>
                            <div class="chart-container">
                                <canvas id="deviceChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctxRevenue = document.getElementById('revenueChart').getContext('2d');
        const ctxDevice = document.getElementById('deviceChart').getContext('2d');

        new Chart(ctxRevenue, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr'],
                datasets: [{
                    label: 'Revenue',
                    data: [100, 200, 300, 400],
                    borderColor: 'rgba(74, 86, 226, 1)',
                    tension: 0.4
                }]
            }
        });

        new Chart(ctxDevice, {
            type: 'doughnut',
            data: {
                labels: ['Mobile', 'Tablet', 'Desktop'],
                datasets: [{
                    data: [50, 30, 20],
                    backgroundColor: ['#4A56E2', '#6A75F0', '#FFD5A7']
                }]
            }
        });
    </script>
</body>

</html>