<?php  

include 'components/connect.php';

session_start();


if(isset($_SESSION['user_id'])){
    
   $user_id = $_SESSION['user_id'];
   
} else {
   $user_id = '';
}



include 'components/save_send.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

  
   <link rel="stylesheet" href="css/style.css">

   <link rel="stylesheet" href= https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css>


<!-- button frame work -->
<!-- <style>


.button--piyo{
    --main_color : #ff8d13f4 ;
    --sub_color1 : #000 ;
    --sub_color2 : #000 ;
    --base_color : #000 ;
    --border_radius1 : 60px 60px 40px 40px / 48px 48px 30px 30px ;
    --border_radius2 : 70px 70px 40px 40px / 48px 48px 30px 30px ;
    --border_radius3 : 40px 40px 40px 40px / 48px 48px 30px 30px ;
}

.button{
    position : relative ;
    display : flex ;
    justify-content : center ;
    align-items : center ;
    width : 280px ;
    height : 80px ;
    box-sizing : border-box ;
    text-decoration : none ;
    border : solid 3px #000 ;
    border-radius : 40px ;
    background : var(--main_color) ;
    font-family: 'Fredoka One', cursive;
    left:30%;
    top:80px;
}
.button::before{
    content : '' ;
    position : absolute ;
    z-index : 2 ;
    top : 0 ;
    right : 20px ;
    bottom : 0 ;
    margin : auto 0 ;
    width : 24px ;
    height : 24px ;
    background : var(--base_color) ; 
    transition : all ease .2s ;
}
.button__wrapper{
    display : flex ;
    justify-content : center ;
    align-items : center ;
    position : relative ;
    z-index : 1 ; 
    width : 100% ;
    height : 100% ;
    border-radius : 40px ;
    overflow : hidden ;
}
.button__wrapper::before,
.button__wrapper::after{
    transition : all .5s ease ;
}
.characterBox{
    position : absolute ;
    top : -54px ;
    left : 0 ;
    right : 0 ;
    margin : 0 auto ;
    display : flex ;
    justify-content : space-between ;
    align-items : flex-end ;
    width : 180px ;
    height : 56px ;
}
.button__text{
    position : relative ;
    z-index : 3 ;
    font-size : 32px ;
    letter-spacing : 4px ;
    color : var(--base_color) ;
    transition : all .3s ease ;
}
.character{
    position : relative ;
    width : 56px ;
    height : 36px ;
    box-sizing : border-box ;
    border : solid 3px #000 ;
    background : var(--main_color) ;
    border-radius : var(--border_radius1) ;
    animation : sleep 1s ease infinite alternate ;
}
.character::before{
    content : '' ;
    position : absolute ;
    top : -12px ;
    left : 22px ;
    width : 12px ;
    height : 12px ;
    background : #000 ;
    clip-path : path('M10.23,3.32c-3.54,.63-5.72,2.51-7.02,4.23-.33-1.58-.34-3.54,.93-5.12,.52-.65,.41-1.59-.24-2.11C3.24-.19,2.29-.08,1.77,.57c-3.82,4.77-.31,11.11-.13,11.42,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0-.01-.02,2.49,.04,2.52,0,.1-.14,1.54-4.82,6.59-5.71,.82-.14,1.37-.92,1.22-1.74s-.94-1.36-1.75-1.21Z') ;
}
.character__face{
    position : absolute ;
    z-index : 2 ;
    top : 15px ;
    left : 0 ;
    right : 0 ;
    margin : 0 auto ;
    width : 12px ;
    height : 6px ;
    background : var(--sub_color2) ;
    border-radius : 50% 50% 50% 50% / 78% 78% 22% 22% ;
    transition : .2s ;
}
.character__face::before,
.character__face::after{
    content : '' ;
    position : absolute ;
    top : -4px ;
    width : 8px ;
    height : 2px ;
    border-radius : 4px ;
    background : #000 ;
}
.character__face::before{
    left : -5px ;
}
.character__face::after{
    right : -5px ;
}

.button:hover .button__wrapper::before{
    transform : translateX(-12px) ;
}
.button:hover .button__wrapper::after{
    transform : rotateY(180deg) translateX(-12px) ;
}
.button:hover .button__text{
    letter-spacing : 6px ;
}
.button:hover::before{
    right : 14px ;
}
.button:hover .wakeup{
    animation : wakeup .2s ease ;
    animation-fill-mode : forwards ;
}
.button:hover .wakeup .character__face{
    top : 20px ;
}
.button:hover .wakeup .character__face::before,
.button:hover .wakeup .character__face::after{
    animation : eye 5s linear infinite ;
}
.button:hover .wakeup:nth-child(2) .character__face::before,
.button:hover .wakeup:nth-child(2) .character__face::after{
    animation : eye_2 5s linear infinite ;
}
@media (max-width:450px){
.button{
    width: 200px;
    height: 50px;
    left: 25%;
}
.button__text {
    
    font-size: 15px;
  
}
}
@keyframes sleep{
    0%  {
        height : 36px ;
        border-radius : var(--border_radius1) ;
    }
    100%{
        height : 32px ;
        border-radius : var(--border_radius2) ;
    }
}
@keyframes wakeup{
    0%  {
        height : 32px ;
        border-radius : var(--border_radius2) ;
    }
    100%{
        height : 56px ;
        border-radius : var(--border_radius3) ;
    }
}
@keyframes eye {
    0%{
        top : -6px ;
        width : 6px ;
        height : 6px ;
    }
    30%{
        top : -6px ;
        width : 6px ;
        height : 6px ;
    }
    32%{
        top : -4px ;
        width : 8px ;
        height : 2px ;
    }
    34%{
        top : -6px ;
        width : 6px ;
        height : 6px ;
    }
    70%{
        top : -6px ;
        width : 6px ;
        height : 6px ;
    }
    72%{
        top : -4px ;
        width : 8px ;
        height : 2px ;
    }
    74%{
        top : -6px ;
        width : 6px ;
        height : 6px ;
    }
    76%{
        top : -4px ;
        width : 8px ;
        height : 2px ;
    }
    78%{
        top : -6px ;
        width : 6px ;
        height : 6px ;
    }
    100%{
        top : -6px ;
        width : 6px ;
        height : 6px ;
    }
}
@keyframes eye_2 {
    0%{
        top : -6px ;
        width : 6px ;
        height : 6px ;
    }
    10%{
        transform : translateX(0);
    }
    12%{
        transform : translateX(3px);
    }
    20%{
        top : -6px ;
        width : 6px ;
        height : 6px ;
    }
    22%{
        top : -4px ;
        width : 8px ;
        height : 2px ;
    }
    24%{
        top : -6px ;
        width : 6px ;
        height : 6px ;
    }
    25%{
        transform : translateX(3px);
    }
    27%{
        transform : translateX(0);
    }
    74%{
        top : -6px ;
        width : 6px ;
        height : 6px ;
        transform : translateX(0);
    }
    76%{
        top : -4px ;
        width : 8px ;
        height : 2px ;
        transform : translateX(3px);
    }
    78%{
        top : -6px ;
        width : 6px ;
        height : 6px ;
    }
    80%{
        top : -4px ;
        width : 8px ;
        height : 2px ;
    }
    82%{
        top : -6px ;
        width : 6px ;
        height : 6px ;
    }
    85%{
        transform : translateX(3px);
    }
    87%{
        transform : translateX(0);
    }
    100%{
        top : -6px ;
        width : 6px ;
        height : 6px ;
        transform : translateX(0);
    }
}
@keyframes body_hoo{
    0%  {
        bottom : 2px ;
    }
    100%{
        bottom : 0 ;
    }
}
@keyframes body_hoo_wakeup{
    0%  {
        bottom : 2px ;
    }
    100%{
        bottom : 6px ;
    }
}
@keyframes face_pen{
    0%  {
        height : 14px ;
    }
    100%{
        height : 10px ;
    }
}
@keyframes face_pen_wakeup{
    0%  {
        height : 14px ;
    }
    100%{
        height : 28px ;
    }
}








.button:not(:last-child){
    margin-bottom : 80px ;
}

</style> -->
</head>
<body>
   
<?php include 'components/user_header.php'; ?>


<div class="home">

<div class="video-background">
<section class="center">
<h3>
  <span>Find</span>
  <span>Your</span>
  <span>PerfectProperty</span>
  <br>
  <span class="center-span">With</span>
  <span class="center-span">US</span>

  <br>

<!-- <a href="#services" class="button button--piyo">
        <div class="button__wrapper">
            <span class="button__text">FindMore</span>
        </div>
        <div class="characterBox">
            <div class="character wakeup">
                <div class="character__face"></div>
            </div>
            <div class="character wakeup">
                <div class="character__face"></div>
            </div>
            <div class="character">
                <div class="character__face"></div>
            </div>
        </div>
    </a> -->
    </h3>
  <video autoplay  muted loop >
    <source src="images/back.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>
</div>
  
</div>



<section class="services" id="services">

   <h1 class="heading">our services</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/icon-1.png" alt="">
         <h3>Buy house</h3>
         <p>Discover your dream home with ease through our comprehensive listings, tailored to match your preferences and budget. Let us guide you through every step of the buying process, ensuring a seamless experience from start to finish.</p>
      </div>

      <div class="box">
         <img src="images/icon-2.png" alt="">
         <h3>Rent house</h3>
         <p>Find the perfect rental property that suits your lifestyle and requirements. Whether you're seeking a cozy apartment or a spacious family home, our extensive rental options cater to all needs. Trust us to simplify your search and facilitate hassle-free renting.</p>
      </div>

      <div class="box">
         <img src="images/icon-3.png" alt="">
         <h3>Sell house</h3>
         <p>Entrust us with the sale of your property and unlock its full potential in today's competitive market. Benefit from our expertise in marketing strategies, negotiation skills, and market insights to achieve optimal returns on your investment. Your satisfaction is our priority.</p>
      </div>

      <div class="box">
         <img src="images/icon-4.png" alt="">
         <h3>Flats and Buildings</h3>
         <p>Explore a diverse range of flats and buildings, each offering unique features and amenities to enhance your living or investment experience. From modern condominiums to heritage buildings, we present a variety of options to suit every taste and requirement.</p>
      </div>

      <div class="box">
         <img src="images/icon-5.png" alt="">
         <h3>Shops and Malls</h3>
         <p>Browse through our selection of prime retail spaces and shopping malls, strategically located in bustling commercial areas. Whether you're launching a new business or expanding your retail footprint, our portfolio offers a myriad of opportunities for success and growth.</p>
      </div>

      <div class="box">
         <img src="images/icon-6.png" alt="">
         <h3>24/7 Service</h3>
         <p>Our commitment to customer satisfaction knows no bounds. With round-the-clock assistance, we ensure prompt responses to your inquiries, swift resolution of any concerns, and continuous support throughout your real estate journey. Experience unparalleled service excellence with EstateHub.</p>
      </div>

   </div>

</section>



<section class="listings">

   <h1 class="heading">Random listings</h1>

   <div class="box-container">
      <?php
         $total_images = 0;
         $select_properties = $conn->prepare("SELECT * FROM `property` WHERE approval_status = 'approved'  ORDER BY RAND() LIMIT 2");
         $select_properties->execute();
         if($select_properties->rowCount() > 0){
            while($fetch_property = $select_properties->fetch()){
               
            $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_user->execute([$fetch_property['user_id']]);
            $fetch_user = $select_user->fetch();

            if(!empty($fetch_property['image_02'])){
               $image_coutn_02 = 1;
            }else{
               $image_coutn_02 = 0;
            }
            if(!empty($fetch_property['image_03'])){
               $image_coutn_03 = 1;
            }else{
               $image_coutn_03 = 0;
            }
            if(!empty($fetch_property['image_04'])){
               $image_coutn_04 = 1;
            }else{
               $image_coutn_04 = 0;
            }
            if(!empty($fetch_property['image_05'])){
               $image_coutn_05 = 1;
            }else{
               $image_coutn_05 = 0;
            }

            $total_images = (1 + $image_coutn_02 + $image_coutn_03 + $image_coutn_04 + $image_coutn_05);

            $select_saved = $conn->prepare("SELECT * FROM `saved` WHERE property_id = ? and user_id = ?");
            $select_saved->execute([$fetch_property['id'], $user_id]);

      ?>
      <form action="" method="POST">
         <div class="box">
            <input type="hidden" name="property_id" value="<?= $fetch_property['id']; ?>">
            <?php
               if($select_saved->rowCount() > 0){
            ?>
            <button type="submit" name="save" class="save"><i class="fa-solid fa-bookmark" style="color: #d6660a;"></i><span>saved</span></button>
            <?php
               }else{ 
            ?>
            <button type="submit" name="save" class="save"><i class="fa-solid fa-bookmark" ></i><span>save</span></button>
            <?php
               }
            ?>
            <div class="thumb">
               <p class="total-images"><i class="far fa-image"></i><span><?= $total_images; ?></span></p> 
               <img src="uploaded_files/<?= $fetch_property['image_01']; ?>" alt="">
            </div>
            <div class="admin">
               <h3><?= substr($fetch_user['name'], 0, 1); ?></h3>
               <div>
                  <p><?= $fetch_user['name']; ?></p>
                  <span><?= $fetch_property['date']; ?></span>
               </div>
            </div>
         </div>
         <div class="box">
            <div class="price"><i class="fa-solid fa-rupee-sign"></i><span><?= $fetch_property['price']; ?></span></div>
            <h3 class="name"><?= $fetch_property['property_name']; ?></h3>
            <p class="location"><i class="fas fa-map-marker-alt"></i><span><?= $fetch_property['address']; ?></span></p>
            <div class="flex">
               <p><i class="fas fa-house"></i><span><?= $fetch_property['type']; ?></span></p>
               <p><i class="fas fa-tag"></i><span><?= $fetch_property['offer']; ?></span></p>
               <p><i class="fas fa-bed"></i><span><?= $fetch_property['bhk']; ?> BHK</span></p>
               <p><i class="fas fa-trowel"></i><span><?= $fetch_property['status']; ?></span></p>
               <p><i class="fas fa-couch"></i><span><?= $fetch_property['furnished']; ?></span></p>
               <p><i class="fas fa-maximize"></i><span><?= $fetch_property['carpet']; ?>sqft</span></p>
            </div>
            <div class="flex-btn">
               <a href="view_property.php?get_id=<?= $fetch_property['id']; ?>" class="btn">view property</a>
               <input type="submit" value="send enquiry" name="send" class="btn">
            </div>
         </div>
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">no properties added yet! <a href="post_property.php" style="margin-top:1.5rem;" class="btn">add new</a></p>';
      }
      ?>
      
   </div>

   <div style="margin-top: 2rem; text-align:center;">
      <a href="listings.php" class="inline-btn">view all</a>
   </div>

</section>




<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>


<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>



</body>
</html>