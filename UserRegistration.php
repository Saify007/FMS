<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration | Forseti</title>
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
            max-width: 520px;
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
        .auth-form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-4);
        }
        .auth-form-grid .fms-form-group:first-child,
        .auth-form-grid .fms-form-group:nth-child(2) {
            grid-column: span 2;
        }
        .auth-gender {
            grid-column: span 2;
            padding: var(--space-4);
            background: var(--slate-50);
            border-radius: var(--radius-md);
            border: 2px solid var(--slate-200);
        }
        .auth-gender-label {
            font-family: var(--font-heading);
            font-weight: 600;
            font-size: var(--text-sm);
            color: var(--slate-700);
            margin-bottom: var(--space-3);
            display: block;
        }
        .auth-gender-options {
            display: flex;
            gap: var(--space-6);
            flex-wrap: wrap;
        }
        .auth-gender-options label {
            display: flex;
            align-items: center;
            gap: var(--space-2);
            cursor: pointer;
            font-size: var(--text-sm);
            color: var(--slate-700);
            font-weight: 500;
        }
        .auth-gender-options input {
            width: 18px;
            height: 18px;
            accent-color: var(--purple-600);
        }
        .auth-submit {
            grid-column: span 2;
            margin-top: var(--space-2);
        }
        .auth-submit .fms-btn {
            width: 100%;
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
            .auth-form-grid {
                grid-template-columns: 1fr;
            }
            .auth-form-grid .fms-form-group:first-child,
            .auth-form-grid .fms-form-group:nth-child(2) {
                grid-column: span 1;
            }
            .auth-gender {
                grid-column: span 1;
            }
            .auth-submit {
                grid-column: span 1;
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
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = validateInput($_POST["gender"]);
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = validateInput($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
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
                <i class="fas fa-user"></i>
            </div>
            <h1>User Registration</h1>
            <p>Create your account to access personalized legal services</p>
        </div>
        <form action="#" method="post" class="fms-form auth-form-grid">
            <div class="fms-form-group">
                <label class="fms-label"><i class="fas fa-id-card"></i> Full Name</label>
                <input type="text" class="fms-input" placeholder="Enter your full name" required>
            </div>
            <div class="fms-form-group">
                <label class="fms-label"><i class="fas fa-user"></i> Username</label>
                <input type="text" class="fms-input" placeholder="Choose a username" required>
            </div>
            <div class="fms-form-group">
                <label class="fms-label"><i class="fas fa-envelope"></i> Email Address</label>
                <input type="email" class="fms-input" placeholder="Enter your email" required>
            </div>
            <div class="fms-form-group">
                <label class="fms-label"><i class="fas fa-phone"></i> Phone Number</label>
                <input type="tel" class="fms-input" placeholder="Enter your phone number" required>
            </div>
            <div class="fms-form-group">
                <label class="fms-label"><i class="fas fa-lock"></i> Password</label>
                <input type="password" class="fms-input" placeholder="Create a password" required>
            </div>
            <div class="fms-form-group">
                <label class="fms-label"><i class="fas fa-lock"></i> Confirm Password</label>
                <input type="password" class="fms-input" placeholder="Re-enter your password" required>
            </div>
            <div class="auth-gender">
                <span class="auth-gender-label"><i class="fas fa-venus-mars" style="margin-right: var(--space-2); color: var(--purple-500);"></i> Gender</span>
                <div class="auth-gender-options">
                    <label><input type="radio" name="gender" value="male"> Male</label>
                    <label><input type="radio" name="gender" value="female"> Female</label>
                    <label><input type="radio" name="gender" value="other"> Other</label>
                </div>
            </div>
            <div class="auth-submit">
                <button type="submit" class="fms-btn fms-btn-primary fms-btn-lg">
                    <i class="fas fa-user-plus"></i> Register Now
                </button>
            </div>
        </form>
        <div class="auth-footer">
            <p>Already have an account? <a href="user-login.html">Log In</a></p>
        </div>
    </div>
</main>

<script src="js/main.js"></script>
</body>
</html>
