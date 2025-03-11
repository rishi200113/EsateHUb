<?php  

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
}

if(isset($_POST['send'])){

   $msg_id = create_unique_id();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $message = $_POST['message'];
   $message = filter_var($message, FILTER_SANITIZE_STRING);

   $verify_contact = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $verify_contact->execute([$name, $email, $number, $message]);

   if($verify_contact->rowCount() > 0){
      $warning_msg[] = 'message sent already!';
   }else{
      $send_message = $conn->prepare("INSERT INTO `messages`(id, name, email, number, message) VALUES(?,?,?,?,?)");
      $send_message->execute([$msg_id, $name, $email, $number, $message]);
      $success_msg[] = 'message send successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact Us</title>

   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>



<section class="contact" id="contact">

   <div class="row">
      <div class="image">
         <img src="images/contact-img.svg" alt="">
      </div>
      <form action="" method="post">
         <h3>get in touch</h3>
         <input type="text" name="name" required maxlength="50" placeholder="enter your name" class="box">
         <input type="email" name="email" required maxlength="50" placeholder="enter your email" class="box">
         <input type="number" name="number" required maxlength="10" max="9999999999" min="0" placeholder="enter your number" class="box">
         <textarea name="message" placeholder="enter your message" required maxlength="1000" cols="30" rows="10" class="box"></textarea>
         <input type="submit" value="send message" name="send" class="btn">
      </form>
   </div>

</section>



<section class="faq" id="faq">

   <h1 class="heading">FAQ</h1>

   <div class="box-container">

      <div class="box active">
         <h3><span>How to cancel a booking?</span><i class="fas fa-angle-down"></i></h3>
         <p>To cancel a booking, log in to your account, navigate to your bookings, and select the cancel option for the booking you wish to cancel. Follow the prompts to complete the cancellation process.</p>
      </div>

      <div class="box active">
         <h3><span>When will I get possession of the property?</span><i class="fas fa-angle-down"></i></h3>
         <p>The possession date of the property will be communicated by the seller. It is typically mentioned in the property details or communicated directly to you after the purchase agreement is finalized.</p>
      </div>

      <div class="box">
         <h3><span>Where can I pay the rent?</span><i class="fas fa-angle-down"></i></h3>
         <p>You can pay the rent through the online payment portal on our website. Log in to your account, go to the payments section, and follow the instructions to complete your rent payment.</p>
      </div>

      <div class="box">
         <h3><span>How to contact the buyers?</span><i class="fas fa-angle-down"></i></h3>
         <p>You can contact buyers directly through our messaging system. Log in to your account, go to your listings, and use the 'Contact Buyer' button to send a message.</p>
      </div>

      <div class="box">
         <h3><span>Why is my listing not showing up?</span><i class="fas fa-angle-down"></i></h3>
         <p>If your listing is not showing up, ensure it has been approved by the admin and that all required fields are filled out correctly. You can also check your account to ensure your listing is active.</p>
      </div>

      <div class="box">
         <h3><span>How to promote my listing?</span><i class="fas fa-angle-down"></i></h3>
         <p>To promote your listing, you can use our featured listing service. This service allows your property to appear at the top of search results and gain more visibility. Contact our support team for more details.</p>
      </div>

   </div>

</section>



<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>


<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

</body>
</html>