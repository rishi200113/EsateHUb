<?php
session_start();

include 'components/connect.php';


session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
}


if(isset($_GET['email']) && isset($_POST['submit'])) {
    
    $email = $_GET['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    
    
    $new_pass = sha1($_POST['new_pass']);
    $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
    $c_pass = sha1($_POST['c_pass']);
    $c_pass = filter_var($c_pass, FILTER_SANITIZE_STRING);
    $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709'; 


    if($new_pass != $c_pass) {
        $warning_msg[] = 'Confirm password does not match!';
    } else {
        
        if($new_pass != $empty_pass) {
            
            $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ? LIMIT 1");
            $select_users->execute([$email]);
            $row = $select_users->fetch(PDO::FETCH_ASSOC);
            if($select_users->rowCount() > 0){
                $update_pass = $conn->prepare("UPDATE `users` SET password = ? WHERE email = ?");
                $update_pass->execute([$new_pass, $email]); 
                $_SESSION['user_id'] = $row['id']; 
                header('location:index.php');
                exit; 
            } else {
                $warning_msg[] = 'User not found!';
            }
        } else {
            $warning_msg[] = 'Please enter a new password!';
        }
    }
}
else{
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="form-container">
   <form action="" method="post">
      <h3>Change password!</h3>
      <input type="password" name="new_pass" maxlength="20" placeholder="Enter your new password" class="box">
      <input type="password" name="c_pass" maxlength="20" placeholder="Confirm your new password" class="box">
      <input type="submit" value="Update Now" name="submit" class="btn">
   </form>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>
<script src="js/script.js"></script>
<?php include 'components/message.php'; ?>
</body>
</html>
