<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INNOVANA - @yield('title')</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logopolindra.png ') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://unpkg.com/trix@2.0.8/dist/trix.css" rel="stylesheet">

    @livewireStyles
    <style>
        body {
            margin: 0;
            background-color: #F4F4F4;
            font-family: Arial, sans-serif;
            height: 100vh;
        }

        .navbar {
            background-color: #031927; /* Warna biru gelap */
            color: #fff;
        }

        .navbar-brand {
            color: #fff;
            font-weight: bold;
            text-decoration: none;
        }

        .dashboard {
            display: flex;
            height: 100vh;
            flex-direction: row;
        }

        .sidebar {
            width: 240px;
            background-color: #031927; /* Warna biru gelap */
            color: #fff;
            padding: 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            flex-shrink: 0;
        }

        .sidebar img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .sidebar h4 {
            /* color: #fff; */
            margin-bottom: 10px;
        }

        .sidebar p {
            font-size: 14px;
            /* color: #ccc; */
            margin-bottom: 20px;
        }

        .menu a {
            display: block;
            color: #313131;
            padding: 10px 15px;
            margin-bottom: 10px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .menu a:hover {
            color: #fff;
            background-color: #4CAF50; /* Aksen hijau untuk hover */
        }

        .menu a i {
            margin-right: 10px;
        }

        .content-wrapper {
            flex: 1;
            padding: 20px;
            background-color: #F4F4F4; /* Warna abu-abu lembut */
            overflow-y: auto;
        }

        .container-card {
            background: #fff;
            padding: 15px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .container-card h4 {
            margin: 10px 0;
            font-size: 18px;
            color: #333;
        }

        .container-card i {
            font-size: 24px;
            color: #333;
        }

        .charts {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        .chart {
            flex: 1;
            background: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        iframe {
            width: 100%;
            height: 300px;
            border: none;
            border-radius: 10px;
        }

        .param-button {
            background: linear-gradient(to right, #555, #666);
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: background 0.3s, transform 0.3s;
        }

        .param-button:hover {
            background: linear-gradient(to right, #4CAF50, #3e8e41); /* Aksen hijau pada hover */
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .dashboard {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                box-shadow: none;
                position: absolute;
                z-index: 99;
                width: 50%;
            }

            .menu a {
                font-size: 14px;
            }
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            if (sidebar.style.display === "none") {
                sidebar.style.display = "block";
            } else {
                sidebar.style.display = "none";
            }
        }
    </script>
    @livewireStyles
</head>

<body>
    <div class="dashboard">
        <div class="sidebar col-md-2 bg-white vh-90" id="sidebar" style="width: 200px;">
            
            <h5 style="text-align: center; font-size: 18px;">{{ Auth::user()->name }}</h5>
            <div class="menu">
                <a href="{{ route('dashboard') }}" class="active"><i class="fas fa-home"></i> Home</a>
                <a href="{{ route('Rekap.index') }}"><i class="fas fa-chart-line"></i> Charts</a>
                <a href="{{ route('users.edit',Auth::user()->id) }}"><i class="fas fa-cog"></i> Settings</a>
                <a href="{{route('rekap')  }}"><i class="fas fa-sliders-h"></i> Rekap</a>
                <a href="{{ route('users.index') }}"><i class="fas fa-user"></i> User</a>
                <a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
        <button onclick="toggleSidebar()" class="param-button"
            style="position: absolute; top: 10px; left: 10px; z-index: 100;">
            <i class="fas fa-bars"></i>
        </button>

    <div class="content-wrapper">
        @yield('content')
    </div>
    </div>
    @livewireScripts
    <script src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

@yield('scripts')
</body>

</html>
