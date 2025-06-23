<?php
session_start();
if(!isset($_SESSION['uname'])) {
    header('location:index.php?message=You need to login to access the employee portal');
    exit();
}

// Sample employee data (in real app, this would come from database)
$employeeData = [
    'uname' => $_SESSION['uname'],
    'name' => $_SESSION['uname'],
    'position' => $_SESSION['role'],
    'department' => 'Engineering',
    'join_date' => '2020-06-15',
    'email' => $_SESSION['uname'].'@falcondynamic.com',
    // 'photo' => 'https://randomuser.me/api/portraits/men/'.rand(1,99).'.jpg'
];

// Sample projects data
$projects = [
    [
        'name' => 'E-commerce Platform',
        'status' => 'In Progress',
        'progress' => 75,
        'deadline' => '2023-08-15',
        'priority' => 'High'
    ],
    [
        'name' => 'Mobile App Redesign',
        'status' => 'Review',
        'progress' => 90,
        'deadline' => '2023-07-30',
        'priority' => 'Medium'
    ],
    [
        'name' => 'API Migration',
        'status' => 'Planning',
        'progress' => 20,
        'deadline' => '2023-09-30',
        'priority' => 'Low'
    ]
];

// Sample salary data
$salary = [
    'base' => 7500,
    'bonus' => 1200,
    'deductions' => 870,
    'taxes' => 1870,
    'net' => 7500 + 1200 - 870 - 1870
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Portal | <?php echo $employeeData['name']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.css" rel="stylesheet">
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
        
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            transition: all 0.3s;
        }
        
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 5px;
            border-radius: 5px;
            padding: 10px 15px;
        }
        
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }
        
        .sidebar .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .badge-priority {
            padding: 5px 10px;
            font-weight: 500;
        }
        
        .badge-priority.high {
            background-color: #ff6b6b;
        }
        
        .badge-priority.medium {
            background-color: #ffd166;
        }
        
        .badge-priority.low {
            background-color: #06d6a0;
        }
        
        .profile-img {
            width: 100px;
            height: 100px;
            border: 3px solid white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        
        .progress-thin {
            height: 5px;
        }
        
        .tab-content {
            background: white;
            border-radius: 0 0 10px 10px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }
        
        .nav-tabs .nav-link {
            border: none;
            padding: 12px 20px;
            color: #6c757d;
            font-weight: 500;
        }
        
        .nav-tabs .nav-link.active {
            color: var(--primary);
            border-bottom: 3px solid var(--primary);
            background: transparent;
        }
        
        .logout-btn {
            border: none;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transition: all 0.3s;
        }
        
        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        
        .salary-card {
            border-left: 4px solid var(--primary);
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block sidebar collapse p-0">
                <div class="position-sticky pt-3">
                    <div class="text-center mt-4 mb-5">
                        <img src="<?php echo $employeeData['photo']; ?>" alt="Profile" class="profile-img rounded-circle mb-3">
                        <h5><?php echo $employeeData['name']; ?></h5>
                        <p class="text-white-50 mb-0"><?php echo $employeeData['position']; ?></p>
                    </div>
                    
                    <ul class="nav flex-column px-3">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-project-diagram"></i> Projects
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-tasks"></i> Tasks
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-file-invoice-dollar"></i> Salary
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-calendar-alt"></i> Schedule
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                        </li>
                        <li class="nav-item mt-4">
                            <a href="include/logout_process.php" class="btn btn-danger">Logout</a>

                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Employee Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-calendar me-1"></i> <?php echo date('F Y'); ?>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Stats Cards -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="text-muted mb-2">Active Projects</h6>
                                        <h3 class="mb-0"><?php echo count($projects); ?></h3>
                                    </div>
                                    <div class="bg-primary bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-project-diagram text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="text-muted mb-2">Total Tasks</h6>
                                        <h3 class="mb-0">14</h3>
                                    </div>
                                    <div class="bg-warning bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-tasks text-warning"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="text-muted mb-2">Hours This Week</h6>
                                        <h3 class="mb-0">38.5</h3>
                                    </div>
                                    <div class="bg-info bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-clock text-info"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="text-muted mb-2">Upcoming Leaves</h6>
                                        <h3 class="mb-0">2</h3>
                                    </div>
                                    <div class="bg-success bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-umbrella-beach text-success"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Projects Section -->
                        <div class="card mb-4">
                            <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">My Projects</h5>
                                <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Project</th>
                                                <th>Progress</th>
                                                <th>Status</th>
                                                <th>Deadline</th>
                                                <th>Priority</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($projects as $project): ?>
                                            <tr>
                                                <td><?php echo $project['name']; ?></td>
                                                <td>
                                                    <div class="progress progress-thin">
                                                        <div class="progress-bar bg-<?php 
                                                            echo $project['progress'] > 70 ? 'success' : 
                                                            ($project['progress'] > 30 ? 'warning' : 'danger'); 
                                                        ?>" role="progressbar" 
                                                        style="width: <?php echo $project['progress']; ?>%" 
                                                        aria-valuenow="<?php echo $project['progress']; ?>" 
                                                        aria-valuemin="0" 
                                                        aria-valuemax="100"></div>
                                                    </div>
                                                    <small><?php echo $project['progress']; ?>%</small>
                                                </td>
                                                <td>
                                                    <span class="badge bg-<?php 
                                                        echo $project['status'] === 'In Progress' ? 'info' : 
                                                        ($project['status'] === 'Review' ? 'warning' : 'secondary');
                                                    ?>">
                                                        <?php echo $project['status']; ?>
                                                    </span>
                                                </td>
                                                <td><?php echo date('M d, Y', strtotime($project['deadline'])); ?></td>
                                                <td>
                                                    <span class="badge badge-priority <?php echo strtolower($project['priority']); ?>">
                                                        <?php echo $project['priority']; ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Tasks Section -->
                        <div class="card mb-4">
                            <ul class="nav nav-tabs" id="tasksTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="current-tab" data-bs-toggle="tab" data-bs-target="#current" type="button" role="tab" aria-controls="current" aria-selected="true">Current Tasks</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button" role="tab" aria-controls="completed" aria-selected="false">Completed</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="tasksTabContent">
                                <div class="tab-pane fade show active" id="current" role="tabpanel" aria-labelledby="current-tab">
                                    <div class="list-group">
                                        <!-- Task items would go here -->
                                        <a href="#" class="list-group-item list-group-item-action border-0">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1">Implement user authentication</h6>
                                                <small class="text-muted">Due: Today</small>
                                            </div>
                                            <p class="mb-1 text-muted">E-commerce Platform</p>
                                            <small class="text-muted d-flex align-items-center">
                                                <span class="badge bg-danger me-2">High</span> 
                                                <i class="far fa-clock me-1"></i> 2 hours remaining
                                            </small>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action border-0">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1">Design mobile app dashboard</h6>
                                                <small class="text-muted">Due: Tomorrow</small>
                                            </div>
                                            <p class="mb-1 text-muted">Mobile App Redesign</p>
                                            <small class="text-muted d-flex align-items-center">
                                                <span class="badge bg-warning me-2">Medium</span> 
                                                <i class="far fa-clock me-1"></i> 1 day remaining
                                            </small>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action border-0">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1">API documentation review</h6>
                                                <small class="text-muted">Due: In 3 days</small>
                                            </div>
                                            <p class="mb-1 text-muted">API Migration</p>
                                            <small class="text-muted d-flex align-items-center">
                                                <span class="badge bg-success me-2">Low</span> 
                                                <i class="far fa-clock me-1"></i> 3 days remaining
                                            </small>
                                        </a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item list-group-item-action border-0">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1 text-muted"><s>Setup development environment</s></h6>
                                                <small class="text-success">Completed: Yesterday</small>
                                            </div>
                                            <p class="mb-1 text-muted">API Migration</p>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action border-0">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1 text-muted"><s>Mobile app wireframes</s></h6>
                                                <small class="text-success">Completed: 2 days ago</small>
                                            </div>
                                            <p class="mb-1 text-muted">Mobile App Redesign</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <!-- Salary Card -->
                        <div class="card salary-card mb-4">
                            <div class="card-header bg-white border-0">
                                <h5 class="mb-0">This Month's Salary </h5>
                            </div>
                            <div class="card-body">
                                <h3 class="mb-0">$<?php echo number_format($salary['net'], 2); ?></h3>
                                <p class="text-muted">Base Salary: $<?php echo number_format($salary['base'], 2); ?></p>
                                <p class="text-muted">Bonus: $<?php echo number_format($salary['bonus'], 2); ?></p>
                                <p class="text-muted">Deductions: -$<?php echo number_format($salary['deductions'], 2); ?></p>
                                <p class="text-muted">Taxes: -$<?php echo number_format($salary['taxes'], 2); ?></p>
                            </div>
                        </div>
                        
                        <!-- Salary History Chart -->
                        <div class="card mb-4">
                            <div class="card-header bg-white border-0">
                                <h5 class="mb-0">Salary History</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="salaryHistoryChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('salaryHistoryChart').getContext('2d');
        const salaryHistoryChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Salary History',
                    data: [6500, 6800, 7000, 7200, 7500, 7500, 7500, 7500, 7500, 7500, 7500, 7500],
                    borderColor: '#3a86ff',
                    backgroundColor: 'rgba(58, 134, 255, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>