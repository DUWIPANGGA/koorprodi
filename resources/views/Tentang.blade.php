<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
        }
        .dashboard-card {
            border-radius: 10px;
            padding: 20px;
            color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-blue {
            background-color: #4f8ef7;
        }
        .card-light-blue {
            background-color: #5dc1d6;
        }
        .card-purple {
            background-color: #9b59b6;
        }
        .card-green {
            background-color: #27ae60;
        }
        .chart-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container-fluid" style="overflow: hidden">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 bg-white vh-100">
                <h4 class="mt-3 text-center">Finance</h4>
                <ul class="nav flex-column mt-4">
                    <li class="nav-item">
                        <a class="nav-link active text-dark" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">Pages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">Applications</a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-10">
                <div class="row mt-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="dashboard-card card-blue">
                            <h5>Total Income</h5>
                            <h3>$579,000</h3>
                            <p>Saved 25%</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="dashboard-card card-light-blue">
                            <h5>Total Expenses</h5>
                            <h3>$79,000</h3>
                            <p>Saved 20%</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="dashboard-card card-purple">
                            <h5>Cash on Hand</h5>
                            <h3>$92,000</h3>
                            <p>Saved 25%</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="dashboard-card card-green">
                            <h5>Net Profit Margin</h5>
                            <h3>$179,000</h3>
                            <p>Saved 65%</p>
                        </div>
                    </div>
                </div>

                <!-- Charts -->
                <div class="row mt-4">
                    <div class="col-md-8">
                        <div class="chart-card">
                            <h5>AP and AR Balance</h5>
                            <canvas id="balanceChart" height="150"></canvas>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="chart-card">
                            <h5>% of Income Budget</h5>
                            <canvas id="incomeChart" height="150"></canvas>
                        </div>
                        <div class="chart-card mt-4">
                            <h5>% of Expenses Budget</h5>
                            <canvas id="expensesChart" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const balanceCtx = document.getElementById('balanceChart').getContext('2d');
        new Chart(balanceCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Balance',
                    data: [200, 400, 300, 500, 700, 600],
                    borderColor: '#9b59b6',
                    backgroundColor: 'rgba(155, 89, 182, 0.2)',
                }]
            }
        });

        const incomeCtx = document.getElementById('incomeChart').getContext('2d');
        new Chart(incomeCtx, {
            type: 'doughnut',
            data: {
                labels: ['Budget', 'Used'],
                datasets: [{
                    data: [67, 33],
                    backgroundColor: ['#4f8ef7', '#ccc'],
                }]
            }
        });

        const expensesCtx = document.getElementById('expensesChart').getContext('2d');
        new Chart(expensesCtx, {
            type: 'doughnut',
            data: {
                labels: ['Budget', 'Used'],
                datasets: [{
                    data: [48, 52],
                    backgroundColor: ['#5dc1d6', '#ccc'],
                }]
            }
        });
    </script>
</body>
</html>
