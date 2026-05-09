<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lawyer Login | Forseti</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/design-system.css">
    <style>
        .auth-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: calc(var(--header-height) + var(--space-8)) var(--space-4) var(--space-8);
            background: linear-gradient(135deg, var(--purple-700) 0%, var(--purple-800) 50%, var(--purple-900) 100%);
            position: relative;
            overflow: hidden;
        }
        .auth-page::before {
            content: '';
            position: absolute;
            top: -10%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(129, 140, 248, 0.2) 0%, transparent 70%);
            border-radius: 50%;
        }
        .auth-page::after {
            content: '';
            position: absolute;
            bottom: -10%;
            left: -5%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(79, 70, 229, 0.15) 0%, transparent 70%);
            border-radius: 50%;
        }
        .auth-card {
            width: 100%;
            max-width: 420px;
            padding: var(--space-10);
            animation: scaleIn 0.5s ease-out;
            position: relative;
            z-index: 1;
        }
        .auth-header {
            text-align: center;
            margin-bottom: var(--space-8);
        }
        .auth-header .auth-icon {
            width: 64px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--purple-500) 0%, var(--purple-600) 100%);
            color: var(--white);
            border-radius: var(--radius-lg);
            font-size: var(--text-2xl);
            margin: 0 auto var(--space-4);
            box-shadow: var(--shadow-purple);
        }
        .auth-header h1 {
            font-size: var(--text-2xl);
            color: var(--purple-900);
            margin-bottom: var(--space-2);
        }
        .auth-header p {
            font-size: var(--text-sm);
            color: var(--slate-500);
        }
        .auth-form .fms-form-group {
            margin-bottom: var(--space-4);
        }
        .auth-input-wrap {
            position: relative;
        }
        .auth-input-wrap i {
            position: absolute;
            left: var(--space-4);
            top: 50%;
            transform: translateY(-50%);
            color: var(--slate-400);
            font-size: var(--text-sm);
            transition: color var(--transition-base);
        }
        .auth-input-wrap .fms-input {
            padding-left: var(--space-10);
        }
        .auth-input-wrap .fms-input:focus + i,
        .auth-input-wrap .fms-input:focus ~ i {
            color: var(--purple-500);
        }
        .auth-submit {
            margin-top: var(--space-2);
        }
        .auth-submit .fms-btn {
            width: 100%;
        }
        .auth-links {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: var(--space-4);
        }
        .auth-links a {
            font-size: var(--text-sm);
            color: var(--purple-600);
            font-weight: 500;
            transition: color var(--transition-base);
        }
        .auth-links a:hover {
            color: var(--purple-800);
        }
        .auth-footer {
            text-align: center;
            margin-top: var(--space-6);
            padding-top: var(--space-6);
            border-top: 1px solid var(--slate-200);
        }
        .auth-footer p {
            font-size: var(--text-sm);
            color: var(--slate-500);
        }
        .auth-footer a {
            color: var(--purple-600);
            font-weight: 600;
            transition: color var(--transition-base);
        }
        .auth-footer a:hover {
            color: var(--purple-800);
        }
        @media (max-width: 480px) {
            .auth-card {
                padding: var(--space-6);
            }
        }
    </style>
</head>
<body>
<button class="fms-theme-toggle-fixed" onclick="window.forsetiTheme.toggle()" aria-label="Toggle dark mode" title="Toggle theme">
  <i class="fas fa-sun"></i>
  <i class="fas fa-moon"></i>
</button>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $passWord = "";
    $userNameErr = $passWordErr = "";

    if (empty($_POST["userName"])) {
        $userNameErr = "UserName required";
    } else {
        $userName = validateInput($_POST["userName"]);
    }
    if (empty($_POST["passWord"])) {
        $passWordErr = "PassWord required";
    } else {
        $passWord = validateInput($_POST["passWord"]);
    }
}

function validateInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<main class="auth-page">
    <div class="glass-strong auth-card">
        <div class="auth-header">
            <div class="auth-icon">
                <i class="fas fa-user-tie"></i>
            </div>
            <h1>Lawyer Login</h1>
            <p>Welcome back! Access your professional dashboard.</p>
        </div>
        <form action="#" method="post" class="fms-form auth-form">
            <div class="fms-form-group">
                <label class="fms-label">Email Address</label>
                <div class="auth-input-wrap">
                    <input type="email" class="fms-input" placeholder="Enter your email" required>
                    <i class="fas fa-envelope"></i>
                </div>
            </div>
            <div class="fms-form-group">
                <label class="fms-label">Password</label>
                <div class="auth-input-wrap">
                    <input type="password" class="fms-input" placeholder="Enter your password" required>
                    <i class="fas fa-lock"></i>
                </div>
            </div>
            <div class="auth-submit">
                <button type="submit" class="fms-btn fms-btn-primary fms-btn-lg">
                    <i class="fas fa-sign-in-alt"></i> Log In
                </button>
            </div>
            <div class="auth-links">
                <a href="#">Forgot Password?</a>
                <a href="lawyerRegistration.php">Sign Up</a>
            </div>
        </form>
        <div class="auth-footer">
            <p>Not a lawyer? <a href="user-login.html">User Login</a> or <a href="admin-login.html">Admin Login</a></p>
        </div>
    </div>
</main>

<script src="js/main.js"></script>
</body>
</html>
