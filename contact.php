<?php
// Functions to filter user inputs
function filterName($field){
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        return $field;
    } else{
        return FALSE;
    }
}
function filterEmail($field){
    $field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);
    if(filter_var($field, FILTER_VALIDATE_EMAIL)){
        return $field;
    } else{
        return FALSE;
    }
}
function filterString($field){
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if(!empty($field)){
        return $field;
    } else{
        return FALSE;
    }
}

// Define variables and initialize with empty values
$nameErr = $emailErr = $messageErr = "";
$name = $email = $subject = $message = "";
$successMsg = "";
$errorMsg = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["name"])){
        $nameErr = "Please enter your name.";
    } else{
        $name = filterName($_POST["name"]);
        if($name == FALSE){
            $nameErr = "Please enter a valid name.";
        }
    }
    if(empty($_POST["email"])){
        $emailErr = "Please enter your email address.";
    } else{
        $email = filterEmail($_POST["email"]);
        if($email == FALSE){
            $emailErr = "Please enter a valid email address.";
        }
    }
    if(empty($_POST["subject"])){
        $subject = "";
    } else{
        $subject = filterString($_POST["subject"]);
    }
    if(empty($_POST["message"])){
        $messageErr = "Please enter your comment.";
    } else{
        $message = filterString($_POST["message"]);
        if($message == FALSE){
            $messageErr = "Please enter a valid comment.";
        }
    }
    if(empty($nameErr) && empty($emailErr) && empty($messageErr)){
        $to = 'avik.statom2018@gmail.com';
        $headers = 'From: '. $email . "\r\n" .
        'Reply-To: '. $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
        if(mail($to, $subject, $message, $headers)){
            $successMsg = "Your message has been sent successfully!";
        } else{
            $errorMsg = "Unable to send email. Please try again!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Forseti</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/design-system.css">
    <style>
        .contact-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: calc(var(--header-height) + var(--space-8)) var(--space-4) var(--space-8);
            background: linear-gradient(135deg, var(--purple-700) 0%, var(--purple-800) 50%, var(--purple-900) 100%);
            position: relative;
            overflow: hidden;
        }
        .contact-page::before {
            content: '';
            position: absolute;
            top: -10%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(167, 139, 250, 0.2) 0%, transparent 70%);
            border-radius: 50%;
        }
        .contact-card {
            width: 100%;
            max-width: 560px;
            padding: var(--space-10);
            animation: scaleIn 0.5s ease-out;
            position: relative;
            z-index: 1;
        }
        .contact-header {
            text-align: center;
            margin-bottom: var(--space-8);
        }
        .contact-header .contact-icon {
            width: 72px;
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--purple-500) 0%, var(--purple-600) 100%);
            color: var(--white);
            border-radius: var(--radius-lg);
            font-size: var(--text-3xl);
            margin: 0 auto var(--space-4);
            box-shadow: var(--shadow-purple);
        }
        .contact-header h1 {
            font-size: var(--text-2xl);
            color: var(--purple-900);
            margin-bottom: var(--space-2);
        }
        .contact-header p {
            font-size: var(--text-sm);
            color: var(--slate-500);
        }
        .alert {
            padding: var(--space-4);
            border-radius: var(--radius-md);
            margin-bottom: var(--space-6);
            font-size: var(--text-sm);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: var(--space-2);
        }
        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }
        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }
        .form-actions {
            display: flex;
            gap: var(--space-3);
        }
        .form-actions .fms-btn {
            flex: 1;
        }
        @media (max-width: 480px) {
            .contact-card {
                padding: var(--space-6);
            }
            .form-actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

    <main class="contact-page">
        <div class="glass-strong contact-card">
            <div class="contact-header">
                <div class="contact-icon">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <h1>Contact Us</h1>
                <p>Please fill in this form and send us your message. We will respond as soon as possible.</p>
            </div>

            <?php if($successMsg): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> <?php echo $successMsg; ?>
                </div>
            <?php endif; ?>
            <?php if($errorMsg): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $errorMsg; ?>
                </div>
            <?php endif; ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="fms-form">
                <div class="fms-form-group">
                    <label class="fms-label" for="inputName"><i class="fas fa-user"></i> Name <sup style="color: var(--error);">*</sup></label>
                    <input type="text" name="name" id="inputName" class="fms-input" placeholder="Enter your name" value="<?php echo $name; ?>">
                    <?php if($nameErr): ?><span class="fms-error"><?php echo $nameErr; ?></span><?php endif; ?>
                </div>
                <div class="fms-form-group">
                    <label class="fms-label" for="inputEmail"><i class="fas fa-envelope"></i> Email <sup style="color: var(--error);">*</sup></label>
                    <input type="email" name="email" id="inputEmail" class="fms-input" placeholder="Enter your email" value="<?php echo $email; ?>">
                    <?php if($emailErr): ?><span class="fms-error"><?php echo $emailErr; ?></span><?php endif; ?>
                </div>
                <div class="fms-form-group">
                    <label class="fms-label" for="inputSubject"><i class="fas fa-tag"></i> Subject</label>
                    <input type="text" name="subject" id="inputSubject" class="fms-input" placeholder="Enter subject" value="<?php echo $subject; ?>">
                </div>
                <div class="fms-form-group">
                    <label class="fms-label" for="inputComment"><i class="fas fa-comment"></i> Message <sup style="color: var(--error);">*</sup></label>
                    <textarea name="message" id="inputComment" class="fms-textarea" placeholder="Write your message here..."><?php echo $message; ?></textarea>
                    <?php if($messageErr): ?><span class="fms-error"><?php echo $messageErr; ?></span><?php endif; ?>
                </div>
                <div class="form-actions">
                    <button type="submit" class="fms-btn fms-btn-primary fms-btn-lg">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                    <button type="reset" class="fms-btn fms-btn-secondary fms-btn-lg">
                        <i class="fas fa-undo"></i> Reset
                    </button>
                </div>
            </form>
        </div>
    </main>

    <script src="js/main.js"></script>
</body>
</html>
