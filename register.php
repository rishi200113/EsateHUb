<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
}

if(isset($_POST['submit'])){

   

   $id = create_unique_id();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING); 
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING); 
   $c_pass = sha1($_POST['c_pass']);
   $c_pass = filter_var($c_pass, FILTER_SANITIZE_STRING); 

   


            require 'PHPMailer/src/PHPMailer.php';
            require 'PHPMailer/src/Exception.php';
            require 'PHPMailer/src/SMTP.php';

            try {
               $mail = new PHPMailer(true);

                // Server settings
                $mail->isSMTP();                                  
                $mail->Host       = 'smtp.gmail.com';             
                $mail->SMTPAuth   = true;                          
                $mail->Username   = 'rishikeethan3@gmail.com';                 
                $mail->Password   = 'tqfw vpdx huvk weif';                           
                $mail->SMTPSecure = 'ssl'; 
                $mail->Port       = 465;                            

                //Recipients
                $mail->setFrom('rishikeethan3@gmail.com', 'EstateHub');
                $mail->addAddress($email);

                // Content
                $mail->isHTML(true);                                 
                $mail->Subject = 'Join Us TO own your property!';
                $mail->Body    = 'Dear '.$name.',<br><br>'
                                .'At "EsateHub", we\'re on a mission to complete dreams '
                                .'Your account has been successfully created. Thank you for joining us!'
                                .'<br><br>'
                                .'By joining our team, you become a part of a compassionate community dedicated to bringing hope and support to those facing challenges. Whether it\'s providing essential resources for a child\'s education, offering a family a chance for stability, or contributing to sustainable solutions for waste management, every action counts.'
                                .'<br><br>'
                                .'If you have any questions or need assistance, feel free to contact our support team at <a href="mailto:rishikeethan3@gmail.com">rishikeethan3@gmail.com</a>'
                                .'<br><br>'
                                .'Warm regards,<br>'
                                .'Rishi<br>'
                                .'Founder<br>'
                                .'EstateHub';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

         

   $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_users->execute([$email]);

   if($select_users->rowCount() > 0){
      $warning_msg[] = 'email already taken!';
   }else{
      if($pass != $c_pass){
         $warning_msg[] = 'Password not matched!';
      }else{

        
         
         $insert_user = $conn->prepare("INSERT INTO `users`(id, name, number, email, password) VALUES(?,?,?,?,?)");
         $insert_user->execute([$id, $name, $number, $email, $c_pass]);
         if($insert_user){
            $verify_users = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
            $verify_users->execute([$email, $pass]);
            $row = $verify_users->fetch(PDO::FETCH_ASSOC);
         
            if($verify_users->rowCount() > 0){
               $_SESSION['user_id'] = $row['id']; 
               header('location:index.php');
            }else{
               $error_msg[] = 'something went wrong!';
            }
         }

      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>


   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

 
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>



<section class="form-container">

   <form action="" method="post">
      <h3>create an account!</h3>
      <input type="tel" name="name" required maxlength="50" placeholder="enter your name" class="box">
      <input type="email" name="email" required maxlength="50" placeholder="enter your email" class="box">
      <input type="number" name="number" required min="0" max="9999999999" maxlength="10" placeholder="enter your number" class="box">
      <input type="password" name="pass" required maxlength="20" placeholder="enter your password" class="box">
      <input type="password" name="c_pass" required maxlength="20" placeholder="confirm your password" class="box">
      <p>already have an account? <a href="login.html">login now</a></p>
      <input type="submit" value="register now" name="submit" class="btn">
   </form>

</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

</body>
</html>
