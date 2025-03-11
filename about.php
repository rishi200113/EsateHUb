<?php  

include 'components/connect.php';

session_start();


if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About Us</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

  
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>



<section class="about">

   <div class="row">
      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>
      <div class="content">
         <h3>why choose us?</h3>
         <p>At Estate Hub, we understand the importance of finding the perfect property. Our platform offers a seamless, user-friendly experience, ensuring that buyers and sellers can connect effortlessly. We provide comprehensive property listings, advanced search filters, and direct communication channels to make your real estate transactions smooth and efficient. With our dedicated support and innovative features, Estate Hub is your trusted partner in the property market.</p>
         <a href="contact.php" class="inline-btn">contact us</a>
      </div>
   </div>

</section>




<section class="reviews">

   <h1 class="heading">client's reviews</h1>

   <div class="box-container">

      <div class="box">
         <div class="user">
            <img src="images/img1.jpg" alt="">
            <div>
               <h3>Aj sellam</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
         <p>"I had a fantastic experience with Estate Hub. The platform made it easy for me to find the perfect property. The process was smooth and efficient, and the customer support was top-notch. Highly recommend!"</p>
      </div>

      <div class="box">
         <div class="user">
            <img src="images/img2.jpg" alt="">
            <div>
               <h3>its mani</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
         <p>"Estate Hub is a game-changer in the real estate market. The user interface is intuitive, and the search filters helped me find exactly what I was looking for. Excellent service!"</p>
      </div>

      <div class="box">
         <div class="user">
            <img src="images/img3.jpg" alt="">
            <div>
               <h3>Vashan OFF</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
         <p>"Thanks to Estate Hub, I was able to list my property and find a buyer quickly. The direct communication feature is a great addition, and the platform is very easy to use."</p>
      </div>

      <div class="box">
         <div class="user">
            <img src="images/img4.jpg" alt="">
            <div>
               <h3>Saranku</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
         <p>"Estate Hub has made my property search so much easier. The detailed listings and advanced search options allowed me to find the right property without any hassle. Great job!"</p>
      </div>

      <div class="box">
         <div class="user">
            <img src="images/img5.jpg" alt="">
            <div>
               <h3>Noyal Pons</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
         <p>"Listing my property on Estate Hub was a breeze. The platform is user-friendly, and the support team was very helpful. I highly recommend it to anyone looking to buy or sell property."</p>
      </div>

      <div class="box">
         <div class="user">
            <img src="images/img6.jpg" alt="">
            <div>
               <h3>Gethu(appa,mersal,etc...)</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
         <p>"Estate Hub provides a comprehensive solution for property transactions. The process is straightforward, and the platform offers all the tools you need to make informed decisions. Highly satisfied!"</p>
      </div>

      <div class="box">
         <div class="user">
            <img src="images/img7.png" alt="">
            <div>
               <h3>RJ styles</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
         <p>"Finding a property has never been this easy. Estate Hub's advanced search features and detailed listings helped me find the perfect home. Great platform!"</p>
      </div>

      <div class="box">
         <div class="user">
            <img src="images/img8.jpg" alt="">
            <div>
               <h3>Mr Purruki</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
         <p>"Estate Hub offers an exceptional real estate experience. The platform is easy to navigate, and the support team is always ready to assist. I found the perfect property thanks to Estate Hub!"</p>
      </div>


      

   </div>

</section>

<?php include 'components/footer.php'; ?>


<script src="js/script.js"></script>

</body>
</html>