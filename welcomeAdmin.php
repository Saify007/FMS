<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Forseti</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/design-system.css">
    <style>
        .dashboard-page {
            min-height: 100vh;
            padding: calc(var(--header-height) + var(--space-12)) var(--space-4) var(--space-12);
        }
        .dashboard-header {
            text-align: center;
            margin-bottom: var(--space-10);
        }
        .dashboard-header .dashboard-avatar {
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--purple-500) 0%, var(--purple-600) 100%);
            color: var(--white);
            border-radius: 50%;
            font-size: var(--text-3xl);
            margin: 0 auto var(--space-4);
            box-shadow: var(--shadow-purple);
        }
        .dashboard-header h1 {
            font-size: var(--text-3xl);
            color: var(--purple-900);
        }
        .dashboard-header p {
            color: var(--slate-500);
            font-size: var(--text-lg);
        }
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-6);
            max-width: 900px;
            margin: 0 auto;
        }
        .dashboard-card {
            padding: var(--space-8);
            text-align: center;
            text-decoration: none;
            color: inherit;
            transition: transform var(--transition-base), box-shadow var(--transition-base);
        }
        .dashboard-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-purple-lg);
        }
        .dashboard-card i {
            font-size: var(--text-3xl);
            color: var(--purple-600);
            margin-bottom: var(--space-3);
        }
        .dashboard-card h3 {
            font-size: var(--text-lg);
            color: var(--purple-900);
            margin-bottom: var(--space-1);
        }
        .dashboard-card p {
            font-size: var(--text-sm);
            color: var(--slate-500);
        }
        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-4);
            max-width: 900px;
            margin: 0 auto var(--space-10);
        }
        .stat-card {
            padding: var(--space-6);
            text-align: center;
        }
        .stat-card h2 {
            font-size: var(--text-3xl);
            color: var(--purple-700);
            margin-bottom: var(--space-1);
        }
        .stat-card p {
            font-size: var(--text-sm);
            color: var(--slate-500);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 600;
        }
        @media (max-width: 768px) {
            .dashboard-grid, .dashboard-stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body class="fms-page">

    <nav class="fms-nav scrolled">
        <div class="fms-nav-inner">
            <a href="index.html" class="fms-logo">
                <i class="fas fa-balance-scale" style="font-size: 1.5rem; color: var(--purple-600);"></i>
                Forseti
            </a>
            <div class="fms-nav-links">
                <a href="index.html" class="fms-nav-link">Home</a>
                <a href="application-form.html" class="fms-nav-link">Applications</a>
                <a href="contact.html" class="fms-nav-link">Messages</a>
                <a href="index.html" class="fms-btn fms-btn-secondary fms-nav-cta fms-btn-sm">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <button class="fms-theme-toggle" aria-label="Toggle dark mode" title="Toggle theme">
                    <i class="fas fa-sun"></i>
                    <i class="fas fa-moon"></i>
                </button>
            </div>
        </div>
    </nav>

    <main class="dashboard-page">
        <div class="fms-container">
            <div class="dashboard-header">
                <div class="dashboard-avatar">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h1>Admin Dashboard</h1>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $userName = $_POST['userName'];
                        echo '<p>Welcome back, <strong>' . htmlspecialchars($userName) . '</strong>!</p>';
                    } else {
                        echo '<p>System administration and oversight.</p>';
                    }
                ?>
            </div>

            <div class="dashboard-stats">
                <div class="glass stat-card">
                    <h2>500+</h2>
                    <p>Total Users</p>
                </div>
                <div class="glass stat-card">
                    <h2>120+</h2>
                    <p>Lawyers</p>
                </div>
                <div class="glass stat-card">
                    <h2>45</h2>
                    <p>Pending Cases</p>
                </div>
            </div>

            <div class="dashboard-grid">
                <a href="user-registration.html" class="fms-card dashboard-card">
                    <i class="fas fa-users"></i>
                    <h3>User Management</h3>
                    <p>Manage registered users and accounts.</p>
                </a>
                <a href="lawyer-registration.html" class="fms-card dashboard-card">
                    <i class="fas fa-user-tie"></i>
                    <h3>Lawyer Management</h3>
                    <p>Manage verified lawyers on the platform.</p>
                </a>
                <a href="application-form.html" class="fms-card dashboard-card">
                    <i class="fas fa-file-alt"></i>
                    <h3>Applications</h3>
                    <p>Review and process service applications.</p>
                </a>
                <a href="contact.html" class="fms-card dashboard-card">
                    <i class="fas fa-envelope"></i>
                    <h3>Messages</h3>
                    <p>View contact form submissions.</p>
                </a>
                <a href="ajax.html" class="fms-card dashboard-card">
                    <i class="fas fa-exclamation-triangle"></i>
                    <h3>Complaints</h3>
                    <p>Review user complaints and issues.</p>
                </a>
                <a href="rate.html" class="fms-card dashboard-card">
                    <i class="fas fa-chart-line"></i>
                    <h3>Analytics</h3>
                    <p>View ratings and platform analytics.</p>
                </a>
            </div>
        </div>
    </main>

    <script src="js/main.js"></script>
</body>
</html>
