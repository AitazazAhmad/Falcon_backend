<?php include('header.php')?>
    <!-- <div class="container">
    <form action="include/login_process.php" class="form" method="post">
        <div class="form-group">
            <label for="uname">Username</label>
            <input type="text" name="uname" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" name="login" value="Login" class="btn btn-success">
        </div>
    </form>
</div> -->
<style>
        :root {
            --primary: #3a86ff;
            --secondary: #8338ec;
            --dark: #212529;
            --light: #f8f9fa;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: var(--dark);
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
        }
        
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .project-item {
            transition: all 0.3s ease;
        }
        
        .project-item:hover {
            background-color: rgba(58, 134, 255, 0.1);
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .salary-chart {
            height: 300px;
        }
    </style>
</head>
<?php
        if(isset($_GET['message']))
        echo "<h4>".$_GET['message']."</h4>";
        ?>
<body class="min-h-screen">
    <div id="login-section" class="flex items-center justify-center min-h-screen p-4">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-xl shadow-lg">
            <div class="text-center">
                <h1 class="text-3xl font-bold gradient-text bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent">Employee Portal</h1>
                <p class="mt-2 text-gray-600">Sign in to access your projects and salary information</p>
            </div>
            <form id="login-form" class="space-y-6" action="include/login_process.php" method="post">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">User name</label>
                    <input type="text" name="uname" id="email" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <button type="submit" name="login" value="login" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white gradient-bg hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all">
                        Sign In
                    </button>
                </div>
            </form>
            </body>
</html>

