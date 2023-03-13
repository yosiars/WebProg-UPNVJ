<?php

$db_name = 'mysql:host=localhost;dbname=daftar_db';
$user_name = 'root';
$user_password = '';

$conn = new PDO($db_name, $user_name, $user_password);

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $courses = $_POST['courses'];
   $courses = filter_var($courses, FILTER_SANITIZE_STRING);
   $gender = $_POST['gender'];
   $gender = filter_var($gender, FILTER_SANITIZE_STRING);

   $select_registration = $conn->prepare("SELECT * FROM `daftar_form` WHERE name = ? AND number = ? AND email = ? AND courses = ? AND gender = ?");
   $select_registration->execute([$name, $number, $email, $courses, $gender]);

   if($select_registration->rowCount() > 0){
      $message[] = 'Nama sudah terdaftar!';
   }else{
      $insert_message = $conn->prepare("INSERT INTO `daftar_form`(name, number, email, courses, gender) VALUES(?,?,?,?,?)");
      $insert_message->execute([$name, $number, $email, $courses, $gender]);
      $message[] = 'Registrasi berhasil! Tunggu email dari kami untuk masuk ke tahap selanjutnya!';
   }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Project UAS</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
         <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
      ';
   }
}
?>

<!-- header section starts  -->

<header class="header">

   <section class="flex">

      <a href="#home" class="logo">CodeGuide</a>

      <nav class="navbar">
         <a href="index.php">beranda</a>
         <a href="tentang.php">tentang</a>
         <a href="kelas.php">kelas</a>
         <a href="#registration">daftar</a>
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>

   </section>

</header>

<!-- header section ends -->



<!-- home section starts  -->

<section class="home" id="home">

   <div class="row">

      <div class="content">
         <h3>Jago Programming bersama <span>CodeGuide</span></h3>
         <a href="#registration" class="btn">Daftar</a>
      </div>

      <div class="image">
         <img src="https://img.freepik.com/free-vector/programming-concept-illustration_114360-1325.jpg?t=st=1653663048~exp=1653663648~hmac=c9045d8ac412f30e0eda6b9f23405bab859fa51fbd8d95e520bf2cf10c614713&w=740" alt="">
      </div>

   </div>

</section>

<!-- home section ends -->

<!-- couter section stars  -->

<section class="count">

   <div class="box-container">

      <div class="box">
         <i class="fas fa-graduation-cap"></i>
         <div class="content">
            <h3>100+</h3>
            <p>kelas</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-user-graduate"></i>
         <div class="content">
            <h3>1500+</h3>
            <p>anggota</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-chalkboard-user"></i>
         <div class="content">
            <h3>3+</h3>
            <p>pendiri</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-face-smile"></i>
         <div class="content">
            <h3>100%</h3>
            <p>kepuasan</p>
         </div>
      </div>

   </div>

</section>

<!-- couter section ends -->

<!-- about section starts  -->

<section class="about" id="about">

   <div class="row">

      <div class="image">
         <img src="https://img.freepik.com/free-vector/research-paper-concept-illustration_114360-8312.jpg?t=st=1653663689~exp=1653664289~hmac=99855523694e212a4613da85dda343b5d9204442a404aef32fc8169e53f72f2e&w=740" alt="">
      </div>

      <div class="content">
         <h3>mengapa perlu bergabung dengan code guide?</h3>
         <p>CodeGuide, solusimu untuk bisa mahir di bidang IT. Tersedia banyak kelas pilihan yang menarik dengan berbagai tingkatan berbeda agar kamu siap terjun ke dunia kerja. Selain itu, kamu juga dapat berkumpul bersama anggota lain yang juga pecinta programming lho. Yuk, bergabung bersama CodeGuide.</p>
         <a href="tentang.php" class="btn">Baca Selengkapnya</a>
      </div>

   </div>

</section>

<!-- about section ends -->

<!-- courses section starts  -->

<section class="courses" id="courses">

   <h1 class="heading">kelas <span>kami</span></h1>

   <section class="see">
   <a href="kelas.php">Lihat semua kelas</a>
   </section>

   <div class="swiper course-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <img src="images/web dev.svg" alt="">
            <h3>web development</h3>
            <p>Bahasa pemrograman yang akan dipelajari pada kursus web development yaitu bahasa pemrograman HTML dan CSS serta belajar mengenai bahasa scripting seperti PHP, Python, ASP, dan Javascript.</p>
         </div>

         <div class="swiper-slide slide">
            <img src="images/seo.svg" alt="">
            <h3>search engine</h3>
            <p>kamu akan mempelajari website agar mendapatkan peringkat teratas di halaman pencarian Google. Website yang berada di posisi teratas akan mendapatkan jumlah pengunjung yang banyak dan berkualitas.</p>
         </div>

         <div class="swiper-slide slide">
            <img src="images/frontend.svg" alt="">
            <h3>Front end developer</h3>
            <p>kamu mempelajari bahasa mark up seperti HTML dan CSS serta bahasa pemrograman JavaScript. JavaScript sendiri mempunyai banyak library dan framework seperti jQuery, AngularJS, dll.</p>
         </div>


      </div>
   </div>

</section>

<!-- courses section ends -->


<!-- reviews section starts  -->

<section class="reviews" id="reviews">

   <h1 class="heading"> ulasan <span>user</span></h1>

   <div class="swiper reviews-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <p>Overall saya sangat terbantu dengan gabung ke komunitas code guide ini, karena saya sangat dibantu soal dunia IT yang sebelumnya tidak saya pahami, sehingga sekarang saya bisa bekerja dan terjun ke dunia IT, pokoknya good banget deh.</p>
            <div class="user">
               <img src="images/pic-1.png" alt="">
               <div class="user-info">
                  <h3>john</h3>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>
         </div>

         <div class="swiper-slide slide">
            <p>Keren banget sih ini komunitas, kalian gak bakal nyesel deh kalo gabung ke komunitas code guide, disini banyak banget orang-orang yang udah sukses di dunia IT, sehingga kalian bebas bertanya dan berdiskusi mengenai masalah yang kalian hadapi saat mengoding.</p>
            <div class="user">
               <img src="images/pic-2.png" alt="">
               <div class="user-info">
                  <h3>selena</h3>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>
         </div>

         <div class="swiper-slide slide">
            <p>Dulu saya sering banget bingung saat lagi coding, pasti ada yang stuck gitu tetapi setelah saya bergabung ke komunitas code guide ini saya merasa sangat terbantu, sehingga saya merasa bahwa coding itu menyenangkan dan tidak sesusah yang dibayangkan.</p>
            <div class="user">
               <img src="images/pic-3.png" alt="">
               <div class="user-info">
                  <h3>chris</h3>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>
         </div>

         <div class="swiper-slide slide">
            <p>Saya sangat terbantu dengan adanya Code Guide ini. Saya dapat mempelajari banyak hal baru dibidang yang saya pilih ini. Teman-teman komunitas ini bersifat ramah kepada siapapun dan tidak membeda-bedakan. Mereka selalu membantu setiap kali saya merasa kesulitan.</p>
            <div class="user">
               <img src="images/pic-4.png" alt="">
               <div class="user-info">
                  <h3>emily</h3>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>
         </div>

         <div class="swiper-slide slide">
            <p>Code Guide merupakan komunitas yang ramah bagi para anggotanya. Saya mendapat ilmu baru, pengalaman baru, serta sudut pandang baru mengenai dunia IT berkat bergabung dengan komunitas ini. Yang paling penting, saya dapat bertanya dan belajar kapanpun saya mau.</p>
            <div class="user">
               <img src="images/pic-5.png" alt="">
               <div class="user-info">
                  <h3>steve</h3>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>
         </div>

         <div class="swiper-slide slide">
            <p> Ini baru masa depan! Code Guide adalah cara baru dalam belajar bidang IT. Saya tidak menyangka bahwa belajar ternyata juga bisa jadi menyenangkan seperti ini. Kami dapat berkumpul dan mempelajari hal baru dengan semua anggota komunitas dimanapun dan kapanpun.</p>
            <div class="user">
               <img src="images/pic-6.png" alt="">
               <div class="user-info">
                  <h3>leo</h3>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>


<!-- reviews section ends -->

<!-- registration section starts  -->

<section class="registration" id="registration">

   <h1 class="heading"><span>Bergabung</span> Sekarang</h1>

   <div class="row">

      <div class="image">
         <img src="https://img.freepik.com/free-vector/flat-design-illustration-customer-support_23-2148887720.jpg?t=st=1653666357~exp=1653666957~hmac=81269a15508c5199abd4dc6d621b77eaa0bc08495c59fc4edac0d923310cfd2b&w=740" alt="">
      </div>

      <form action="" method="post">
         <span>nama</span>
         <input type="text" required placeholder="Masukan nama lengkap anda" maxlength="50" name="name" class="box">
         <span>email</span>
         <input type="email" required placeholder="Contoh: codeguide123@gmail.com" maxlength="50" name="email" class="box">
         <span>telepon</span>
         <input type="tel" required placeholder="Contoh: 081298765432" max="9999999999" min="0" name="number" class="box" onkeypress="if(this.value.length == 12) return false;">
         <span>pilih kursus</span>
         <select name="courses" class="box" required>
            <option value="" disabled selected>--Pilih kursus yang diinginkan--</option>
            <option value="web developement">web developement</option>
            <option value="search engine">search engine</option>
            <option value="Front end developer">Front end developer</option>
            <option value="Mobile developer">Mobile developer</option>
            <option value="back end developer">back end developer</option>
            <option value="Full stack developer">Full stack developer</option>
            <option value="data analysis">data analysis</option>
            <option value="artificial intelligence">artificial intelligence</option>
         </select>
         <span>jenis kelamin</span>
         <div class="radio">
            <input type="radio" name="gender" value="male" id="male">
            <label for="Laki-laki">Laki-laki</label>
            <input type="radio" name="gender" value="female" id="female">
            <label for="Perempuan">Perempuan</label>
         </div>
         <input type="submit" value="Daftar" class="btn" name="send">
      </form>

   </div>

</section>

<!-- registration section ends -->

<!-- footer section starts  -->

<footer class="footer">

   <div class="hubungi">Follow Us:</div>

   <section>

      <div class="share">
         <a href="https://web.facebook.com/groups/44291561847/" class="fab fa-facebook-f"></a>
         <a href="https://twitter.com/bem__upnvj?s=20&t=ZVNhqXwTtj0Vh3hUKJCuOg" class="fab fa-twitter"></a>
         <a href="https://id.linkedin.com/company/bemfik-upnvj" class="fab fa-linkedin"></a>
         <a href="https://www.instagram.com/fasilkomupnvj/" class="fab fa-instagram"></a>
         <a href="https://www.youtube.com/channel/UCmIK65b-zTQEPCajtkzLlcw" class="fab fa-youtube"></a>
      </div>

   </section>

</footer>

<!-- footer section ends -->

<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>