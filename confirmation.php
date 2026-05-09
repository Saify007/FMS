<?php
$name = $comment = "";
$success = false;
$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"] ?? ""));
    $comment = htmlspecialchars(trim($_POST["comment"] ?? ""));

    if(!empty($name) && !empty($comment)) {
        $success = true;
    } else {
        $error = "Please fill all the fields in the form!";
    }
} else {
    $error = "Something went wrong. Please try again.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation | Forseti</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/design-system.css">
    <style>
        .confirm-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: var(--space-4);
            background: linear-gradient(135deg, var(--purple-700) 0%, var(--purple-800) 50%, var(--purple-900) 100%);
            position: relative;
            overflow: hidden;
            text-align: center;
        }
        .confirm-page::before {
            content: '';
            position: absolute;
            top: -10%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(129, 140, 248, 0.2) 0%, transparent 70%);
            border-radius: 50%;
        }
        .confirm-page::after {
            content: '';
            position: absolute;
            bottom: -10%;
            left: -5%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(79, 70, 229, 0.15) 0%, transparent 70%);
            border-radius: 50%;
        }
        .confirm-card {
            width: 100%;
            max-width: 560px;
            padding: var(--space-12);
            animation: scaleIn 0.5s ease-out;
            position: relative;
            z-index: 1;
        }
        .confirm-icon {
            width: 100px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: var(--text-4xl);
            margin: 0 auto var(--space-6);
            box-shadow: 0 12px 32px rgba(0,0,0,0.15);
            animation: float 3s ease-in-out infinite;
        }
        .confirm-icon.success {
            background: linear-gradient(135deg, var(--success) 0%, #059669 100%);
            color: var(--white);
            box-shadow: 0 12px 32px rgba(16, 185, 129, 0.3);
        }
        .confirm-icon.error {
            background: linear-gradient(135deg, var(--error) 0%, #b91c1c 100%);
            color: var(--white);
            box-shadow: 0 12px 32px rgba(239, 68, 68, 0.3);
        }
        .confirm-card h1 {
            font-size: var(--text-3xl);
            color: var(--purple-900);
            margin-bottom: var(--space-3);
        }
        .confirm-card p {
            color: var(--slate-500);
            font-size: var(--text-lg);
            line-height: var(--line-relaxed);
            margin-bottom: var(--space-4);
        }
        .confirm-details {
            background: var(--purple-50);
            border-radius: var(--radius-md);
            padding: var(--space-6);
            margin: var(--space-6) 0;
            text-align: left;
        }
        .confirm-details h3 {
            font-size: var(--text-sm);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--purple-700);
            margin-bottom: var(--space-3);
        }
        .confirm-details p {
            font-size: var(--text-sm);
            color: var(--slate-600);
            margin-bottom: var(--space-2);
        }
        .confirm-details strong {
            color: var(--purple-800);
        }
        .confirm-actions {
            display: flex;
            gap: var(--space-3);
            justify-content: center;
            flex-wrap: wrap;
            margin-top: var(--space-8);
        }
        @media (max-width: 480px) {
            .confirm-card {
                padding: var(--space-8) var(--space-6);
            }
            .confirm-actions {
                flex-direction: column;
            }
            .confirm-actions .fms-btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <button class="fms-theme-toggle-fixed" onclick="window.forsetiTheme.toggle()" aria-label="Toggle dark mode" title="Toggle theme">
        <i class="fas fa-sun"></i>
        <i class="fas fa-moon"></i>
    </button>
    <main class="confirm-page">
        <div class="glass-strong confirm-card">
            <?php if($success): ?>
                <div class="confirm-icon success">
                    <i class="fas fa-check"></i>
                </div>
                <h1>Problem Received!</h1>
                <p>Hi, <strong><?php echo $name; ?></strong>. Your problem has been received successfully. Our team will look into it and get back to you shortly.</p>
                <div class="confirm-details">
                    <h3>Submitted Details</h3>
                    <p><strong>Name:</strong> <?php echo $name; ?></p>
                    <p><strong>Problem:</strong> <?php echo $comment; ?></p>
                </div>
                <div class="confirm-actions">
                    <a href="ajax.html" class="fms-btn fms-btn-primary fms-btn-lg">
                        <i class="fas fa-arrow-left"></i> Back to Complaint Box
                    </a>
                    <a href="index.html" class="fms-btn fms-btn-secondary fms-btn-lg">
                        <i class="fas fa-home"></i> Home
                    </a>
                </div>
            <?php else: ?>
                <div class="confirm-icon error">
                    <i class="fas fa-times"></i>
                </div>
                <h1>Oops!</h1>
                <p><?php echo $error; ?></p>
                <div class="confirm-actions">
                    <a href="ajax.html" class="fms-btn fms-btn-primary fms-btn-lg">
                        <i class="fas fa-arrow-left"></i> Try Again
                    </a>
                    <a href="index.html" class="fms-btn fms-btn-secondary fms-btn-lg">
                        <i class="fas fa-home"></i> Home
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </main>
    <script src="js/main.js"></script>
</body>
</html>
