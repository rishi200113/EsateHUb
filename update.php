<?php  

include 'components/connect.php';

session_start(); 

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:login.php');
   exit; 
}

$select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ? LIMIT 1");
$select_user->execute([$user_id]);
$fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);



if(isset($_POST['submit'])){
   
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING); 
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   
   
   if(!empty($name)){
      $update_name = $conn->prepare("UPDATE `users` SET name = ? WHERE id = ?");
      $update_name->execute([$name, $user_id]);
      $success_msg[] = 'name updated!';
   }

  

   if(!empty($number)){
      $verify_number = $conn->prepare("SELECT number FROM `users` WHERE number = ?");
      $verify_number->execute([$number]);
      if($verify_number->rowCount() > 0){
         $warning_msg[] = 'number already taken!';
      }else{
         $update_number = $conn->prepare("UPDATE `users` SET number = ? WHERE id = ?");
         $update_number->execute([$number, $user_id]);
         $success_msg[] = 'number updated!';
      }
   }

   $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
   $prev_pass = $fetch_user['password'];
   $old_pass = sha1($_POST['old_pass']);
   $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
   $new_pass = sha1($_POST['new_pass']);
   $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
   $c_pass = sha1($_POST['c_pass']);
   $c_pass = filter_var($c_pass, FILTER_SANITIZE_STRING);

   if($old_pass != $empty_pass){
      if($old_pass != $prev_pass){
         $warning_msg[] = 'old password not matched!';
      }elseif($new_pass != $c_pass){
         $warning_msg[] = 'confirm passowrd not matched!';
      }else{
         if($new_pass != $empty_pass){
            $update_pass = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
            $update_pass->execute([$c_pass, $user_id]);
            $success_msg[] = 'password updated successfully!';
         }else{
            $warning_msg[] = 'please enter new password!';
         }
      }
   }

  
   if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"]) && !empty($_FILES["image"]["name"])) {
     
      $target_dir = "user_files/";
      $target_file = $target_dir . basename($_FILES["image"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  
      
      $check = getimagesize($_FILES["image"]["tmp_name"]);
      if ($check !== false) {
          $uploadOk = 1;
          

      } else {
          echo "File is not an image.";
          $uploadOk = 0;
      }
  
     
      if ($_FILES["image"]["size"] > 5000000) { // 5MB limit
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
      }
  
      
      $allowed_formats = array("jpg", "jpeg", "png", "gif");
      if (!in_array($imageFileType, $allowed_formats)) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
      }
  
     
      if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
      } else {
          
          if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            
              $image = basename($_FILES["image"]["name"]);
              $update_query = "UPDATE users SET image_01='$image' WHERE id= '$user_id' ";
              $update_statement = $conn->prepare($update_query);
              $update_statement->execute();

              
  
              $success_msg[] = 'Profie picture updated!';
  
            //   header('Location: update.php');
            //   exit();
              
          } else {
            $warning_msg[] =  'Sorry, there was an error uploading your file.';
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
   <title>update</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

   <link rel="stylesheet" href= https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css>

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="form-container">

<form action="" method="post" enctype="multipart/form-data">
      <h3>update your account!</h3>
      
      <section class="vh-100" style="background-color: #da7a2c;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-md-9 col-lg-7 col-xl-5">
        <div class="card" style="border-radius: 55px;">
          <div class="card-body p-4">
            <div class="d-flex text-black">
              <div class="flex-shrink-0">
              <label for="image" class="image-label">
              <img src="user_files/<?php echo $fetch_user['image_01']; ?>" onerror="this.src='images/prof.jpg'"
         alt="Profile Image" class="img-fluid profile-image"
        onmouseover="document.querySelector('.tooltip').style.opacity = '1';"
        onmouseout="document.querySelector('.tooltip').style.opacity = '0';">
    <input type="file" id="image" name="image" class="image-input" style="display: none;">
    <div class="tooltip">click to change profile?</div>
</label>
            
              </div>
             
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
      
      <input type="tel" name="name" maxlength="50" placeholder="<?= $fetch_user['name']; ?>" class="box">
      <input type="email" name="email" maxlength="50" placeholder="<?= $fetch_user['email']; ?>" class="box" readonly>
      <input type="number" name="number" min="0" max="9999999999" maxlength="10" placeholder="<?= $fetch_user['number']; ?>" class="box">
      
      <input type="password" name="old_pass" maxlength="20" placeholder="enter your old password" class="box">
      <input type="password" name="new_pass" maxlength="20" placeholder="enter your new password" class="box">
      <input type="password" name="c_pass" maxlength="20" placeholder="confirm your new password" class="box">
      <input type="submit" value="update now" name="submit" class="btn">
   </form>

</section>







<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>


<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>
</body>
</html>