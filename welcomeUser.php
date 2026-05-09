<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard | Forseti</title>
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
        @media (max-width: 768px) {
            .dashboard-grid {
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
                <a href="application-form.html" class="fms-nav-link">Apply</a>
                <a href="contact.html" class="fms-nav-link">Contact</a>
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
                    <i class="fas fa-user"></i>
                </div>
                <h1>User Dashboard</h1>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $fname = $_POST['fname'];
                        echo '<p>Welcome back, <strong>' . htmlspecialchars($fname) . '</strong>!</p>';
                    } else {
                        echo '<p>Welcome to your personalized dashboard.</p>';
                    }
                ?>
            </div>

            <div class="dashboard-grid">
                <a href="application-form.html" class="fms-card dashboard-card">
                    <i class="fas fa-file-signature"></i>
                    <h3>Apply for Service</h3>
                    <p>Submit a new legal service application.</p>
                </a>
                <a href="contact.html" class="fms-card dashboard-card">
                    <i class="fas fa-envelope"></i>
                    <h3>Contact Support</h3>
                    <p>Get in touch with our support team.</p>
                </a>
                <a href="ajax.html" class="fms-card dashboard-card">
                    <i class="fas fa-exclamation-circle"></i>
                    <h3>Complaint Box</h3>
                    <p>Raise any concerns or issues you have.</p>
                </a>
                <a href="lawyerfb.html" class="fms-card dashboard-card">
                    <i class="fas fa-comment"></i>
                    <h3>Feedback</h3>
                    <p>Share your experience with us.</p>
                </a>
                <a href="rate.html" class="fms-card dashboard-card">
                    <i class="fas fa-star"></i>
                    <h3>Rate Lawyer</h3>
                    <p>Rate and review your lawyer.</p>
                </a>
                <a href="checkout.html" class="fms-card dashboard-card">
                    <i class="fas fa-credit-card"></i>
                    <h3>Payments</h3>
                    <p>Manage your billing and payments.</p>
                </a>
            </div>
        </div>
    </main>

    <script src="js/main.js"></script>
</body>
</html>
