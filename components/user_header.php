
<?php

$select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ? LIMIT 1");
$select_user->execute([$user_id]);
$fetch_user = $select_user->fetch();
?>

<header class="header">

<link rel="stylesheet" href= https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css>



   <nav class="navbar nav-1">
      <section class="flex">
         <a href="index.php" class="logo"><i class="fa-solid fa-house-laptop"></i>EstateHub</a>
         <ul>
            <li><a href="post_property.php" class="logo1">Add property<i class="fa-solid fa-upload"></i></a></li>
           
         </ul>
          <?php if($user_id != ''){ ?>
                  <a href="update.php" style="float: right; margin-left: 10px;">
                  <img src="user_files/<?php echo $fetch_user['image_01']; ?>" onerror="this.src='images/prof.jpg'" alt="avatar"
                  class="img-fluid rounded-circle me-3"  width="35" height="35" style="border-radius:60%;">
                 </a> 
         <?php } ?>
      </section>
   </nav>

   <nav class="navbar nav-2">
      <section class="flex">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div class="menu">
            <ul>
               <li><a href="#">my listings<i class="fas fa-angle-down"style="color: #d6660a;"></i></a>
                  <ul>
                    
                     <li><a href="post_property.php">post Property <i class="fa-solid fa-upload"></i></a></li>
                     <li><a href="my_listings.php">my listings <i class="fa-solid fa-clipboard-list"></i></a></li>
                  </ul>
               </li>
               <li><a href="#">Find<i class="fas fa-angle-down" style="color: #df6807;"></i></a>
                  <ul>
                     <li><a href="search.php"> search <i class="fa-solid fa-magnifying-glass-location" ></i></a></li>
                     <li><a href="listings.php">All Properties <i class="fa-solid fa-list"></i></a></li>
                  </ul>
               </li>
               <li><a href="#">help<i class="fas fa-angle-down" style="color: #d6660a;"></i></a>
                  <ul>
                     <li><a href="about.php">about us <i class="fa-solid fa-shop"></i></a></li>
                     <li><a href="contact.php">contact us <i class="fa-solid fa-address-book"></i></a></li>
                     <li><a href="contact.php#faq">FAQ <i class="fa-solid fa-question"></i></a></li>
                  </ul>
               </li>
            </ul>
         </div>
         <ul>
            <li><a href="saved.php">BookMark<i class="fa-solid fa-bookmark" style="color: #d6660a;"></i></a></li>
            <li><a href="#">account <i class="fas fa-angle-down" style="color: #d6660a;"></i></a>
           
         
       
               <ul>
                  <?php if($user_id != ''){ ?>
                     <li><a href="dashboard.php">dashboard <i class="fa-solid fa-table-columns"></i></a></li>
                     <li><a href="components/user_logout.php" onclick="return confirm('logout from this website?');">log_out   <i class="fa-solid fa-right-from-bracket"></i></a></li>
                     
                  <?php } else { ?>
                     <li><a href="login.php">login now<i class="fa-solid fa-address-card" style="color: #df6807;"></i></a></li>
                     <li><a href="register.php">register  <i class="fa-solid fa-user-pen" style="color: #d6660a;"></i></a></li>
                  <?php } ?>
               </ul>
            </li>
           </ul>
          
      </section>
   </nav>
</header>

