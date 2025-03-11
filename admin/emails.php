<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include '../components/connect.php';

if(isset($_SESSION['admin_id'])){
   $admin_id = $_SESSION['admin_id'];
} else {
   $admin_id = '';
   header('location:login.php');
   exit; 
}


$select_users = $conn->prepare("SELECT email FROM users");
$select_users->execute();
$users = $select_users->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send_email'])) {
    $message = $_POST['message'];

    require '../phpmailer/src/PHPMailer.php';
    require '../phpmailer/src/Exception.php';
    require '../phpmailer/src/SMTP.php';

    try {
        foreach($users as $user) {
            $email = $user['email'];
            $mail = new PHPMailer(true);

  
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'rishikeethan3@gmail.com';
            $mail->Password   = 'tqfw vpdx huvk weif';
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

           
            $mail->setFrom('rishikeethan3@gmail.com', 'EstateHub');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Message from EstateHub';
            $mail->Body    = nl2br($message);

            $mail->send();
        }
        $success_msg[]= 'Emails have been sent to all active users!';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Send Email to Users</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="../css/admin_style.css">
  
</head>
<body>
   
<?php include '../components/admin_header.php'; ?>

<section class="send-email">
    <div class="container">
        <h1>Send Email to All Active Users</h1>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" class="form-control" rows="8" required></textarea>
            </div>
            <button type="submit" name="send_email" class="btn btn-primary">Send Email</button>
        </form>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script src="../js/admin_script.js"></script>

<?php include '../components/message.php'; ?>
</body>
</html>
