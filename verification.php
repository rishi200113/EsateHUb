<?php
session_start();

if(isset($_POST['submit_otp'])) {

    $entered_otp = $_POST['otp'];
  
    $stored_otp = isset($_SESSION['otp']);
  
   
    if($entered_otp == $stored_otp) {
      $email = $_GET['email']; 
      header("Location: changepass.php?email=" . urlencode($email));
        exit(); 
    } else {
    
        $error_msg = "Invalid OTP. Please try again.";
    }
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include 'components/connect.php';

 

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
  
}

if(isset($_GET['email'])) {
    $email = $_GET['email'];
    $otp = mt_rand(100000, 999999);
  
    
    $_SESSION['otp'] = $otp;

    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/SMTP.php';

    try {
        $mail = new PHPMailer(true);

        // Server settings
        $mail->isSMTP();                                  
        $mail->Host       = 'smtp.gmail.com';             
        $mail->SMTPAuth   = true;                          
        $mail->Username   = '@gmail.com';                 
        $mail->Password   = '';                           
        $mail->SMTPSecure = 'ssl'; 
        $mail->Port       = 465;                            

        //Recipients
        $mail->setFrom('@gmail.com', 'EstateHub');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);                                 
        $mail->Subject = 'One-Time Password (OTP) for Registration';
        $mail->Body    = 'Dear User,<br><br>'
                             .'Your One-Time Password (OTP) for registration: '.$otp
                             .'<br><br>'
                             .'Please use this OTP to complete your registration process.'
                             .'<br><br>'
                             .'If you have any questions or need assistance, feel free to contact our support team at <a href="mailto:rishikeethan3@gmail.com">rishikeethan3@gmail.com</a>'
                             .'<br><br>'
                             .'Warm regards,<br>'
                             .'Rishi<br>'
                             .'Founder<br>'
                             .'EstateHub';

        $mail->send();
        $success_msg[] = 'Login successful!';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>OTP Verification Card Design | EstateHub</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body style="background-color: #da7a2c; display: flex; align-items: center; height: 100vh;">
<section class="ver">
<div class="container d-flex justify-content-center align-items-center">

    <div class="card text-center">
    <a href="home.php" class="logo"><i class="fas fa-home"></i>EstateHub</a>
        <div class="card-header p-5">
        
            <img src="images/otp.png">
            <h5 class="mb-2">OTP VERIFICATION</h5>
            <div>
                <p>Code has been sent to <?php echo $email; ?></p>
            </div>
        </div>
        <form method="POST" action="">
            <div class="input-container d-flex flex-row justify-content-center mt-2">
              <input type="text" class="box" maxlength="1" name="otp">
              <input type="text" class="box" maxlength="1" name="otp">
              <input type="text" class="box" maxlength="1" name="otp">
              <input type="text" class="box" maxlength="1" name="otp">
              <input type="text" class="box" maxlength="1" name="otp">
              <input type="text" class="box" maxlength="1" name="otp">
            </div>
            
            <div class="resend">
                <p>
                    Didn't get the OTP? <a href="verification.php" class="text-decoration-none">Resend</a>
              </p>
            </div>
            <div class="mt-3 mb-5">
                <button type="submit" name="submit_otp" class="btn">Verify OTP</button>
            </div>
        </form>
    </div>
</div>
<script src="js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</section>
</body>
</html>
