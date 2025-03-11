<?php

include '../components/connect.php';

session_start(); 

if(isset($_SESSION['admin_id'])){
   $admin_id = $_SESSION['admin_id'];
}else{
   $admin_id = '';
   header('location:login.php');
   exit; 
}

if(isset($_POST['delete'])){

   $delete_id = $_POST['delete_id'];
   $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

   $verify_delete = $conn->prepare("SELECT * FROM `property` WHERE id = ?");
   $verify_delete->execute([$delete_id]);

   if($verify_delete->rowCount() > 0){
      $select_images = $conn->prepare("SELECT * FROM `property` WHERE id = ?");
      $select_images->execute([$delete_id]);
      while($fetch_images = $select_images->fetch(PDO::FETCH_ASSOC)){
         $image_01 = $fetch_images['image_01'];
         $image_02 = $fetch_images['image_02'];
         $image_03 = $fetch_images['image_03'];
         $image_04 = $fetch_images['image_04'];
         $image_05 = $fetch_images['image_05'];
         unlink('../uploaded_files/'.$image_01);
         if(!empty($image_02)){
            unlink('../uploaded_files/'.$image_02);
         }
         if(!empty($image_03)){
            unlink('../uploaded_files/'.$image_03);
         }
         if(!empty($image_04)){
            unlink('../uploaded_files/'.$image_04);
         }
         if(!empty($image_05)){
            unlink('../uploaded_files/'.$image_05);
         }
      }
      $delete_listings = $conn->prepare("DELETE FROM `property` WHERE id = ?");
      $delete_listings->execute([$delete_id]);
      $success_msg[] = 'Listing deleted!';
   }else{
      $warning_msg[] = 'Listing deleted already!';
   }

}
if(isset($_POST['accept'])){
   $accept_id = $_POST['approve_id'];
   $accept_id = filter_var($accept_id, FILTER_SANITIZE_STRING);

   
   $update_status = $conn->prepare("UPDATE `property` SET approval_status = 'approved' WHERE id = ?");
   $update_status->execute([$accept_id]);

   $success_msg[] = 'Accepted The property!';
}

if(isset($_POST['reject'])){
   $reject_id = $_POST['reject_id'];
   $reject_id = filter_var($reject_id, FILTER_SANITIZE_STRING);

  
   $update_status = $conn->prepare("UPDATE `property` SET approval_status = 'rejected' WHERE id = ?");
   $update_status->execute([$reject_id]);

   $warning_msg[]= 'Rejected The property!';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Listings</title>


   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>
   

<?php include '../components/admin_header.php'; ?>


<section class="listings">

   <h1 class="heading">all listings</h1>

   <form action="" method="POST" class="search-form">
      <input type="text" name="search_box" placeholder="search listings..." maxlength="100" required>
      <button type="submit" class="fas fa-search" name="search_btn"></button>
   </form>

   <div class="box-container">

   <?php
      if(isset($_POST['search_box']) OR isset($_POST['search_btn'])){
         $search_box = $_POST['search_box'];
         $search_box = filter_var($search_box, FILTER_SANITIZE_STRING);
         $select_listings = $conn->prepare("SELECT * FROM `property` WHERE property_name LIKE '%{$search_box}%' OR address LIKE '%{$search_box}%' ORDER BY date DESC");
         $select_listings->execute();
      }else{
         $select_listings = $conn->prepare("SELECT * FROM `property` ORDER BY date DESC");
         $select_listings->execute();
      } 
      $total_images = 0;
       if($select_listings->rowCount() > 0){
         while($fetch_listing = $select_listings->fetch(PDO::FETCH_ASSOC)){

         $listing_id = $fetch_listing['id'];

         $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
         $select_user->execute([$fetch_listing['user_id']]);
         $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

         if(!empty($fetch_listing['image_02'])){
            $image_coutn_02 = 1;
         }else{
            $image_coutn_02 = 0;
         }
         if(!empty($fetch_listing['image_03'])){
            $image_coutn_03 = 1;
         }else{
            $image_coutn_03 = 0;
         }
         if(!empty($fetch_listing['image_04'])){
            $image_coutn_04 = 1;
         }else{
            $image_coutn_04 = 0;
         }
         if(!empty($fetch_listing['image_05'])){
            $image_coutn_05 = 1;
         }else{
            $image_coutn_05 = 0;
         }

         $total_images = (1 + $image_coutn_02 + $image_coutn_03 + $image_coutn_04 + $image_coutn_05);
   ?>
   <div class="box">
      <div class="thumb">
         <p><i class="far fa-image"></i><span><?= $total_images; ?></span></p>
         <img src="../uploaded_files/<?= $fetch_listing['image_01']; ?>" alt="">
      </div>
      <p class="price"><i class="fas fa-indian-rupee-sign"></i><?= $fetch_listing['price']; ?></p>
      <h3 class="name"><?= $fetch_listing['property_name']; ?></h3>
      <p class="location"><i class="fas fa-map-marker-alt"></i><?= $fetch_listing['address']; ?></p>
      <form action="" method="POST">
         <input type="hidden" name="delete_id" value="<?= $listing_id; ?>">
         <a href="view_property.php?get_id=<?= $listing_id; ?>" class="btn">view property</a>
         <input type="submit" value="delete listing" onclick="return confirm('delete this listing?');" name="delete" class="delete-btn">
         <input type="hidden" name="approve_id" value="<?= $listing_id; ?>">
        <input type="submit" value="<?= $fetch_listing['approval_status'] === 'approved' ? 'Accepted' : 'Accept' ?>" name="accept" <?= $fetch_listing['approval_status'] === 'approved' ? 'disabled' : '' ?> class="accept-btn <?= $fetch_listing['approval_status'] === 'approved' ? 'disabled' : '' ?>"> 

        <input type="hidden" name="reject_id" value="<?= $listing_id; ?>">
         <input type="submit" value="Reject"  onclick="return confirm('Reject this listing?');" name="reject" class="reject-btn">
      </form>
    
      
   </div>
   <?php
         }
      }elseif(isset($_POST['search_box']) OR isset($_POST['search_btn'])){
         echo '<p class="empty">no results found!</p>';
      }else{
         echo '<p class="empty">no property posted yet!</p>';
      }
   ?>

   </div>

</section>



















<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

<?php include '../components/message.php'; ?>

</body>
</html>