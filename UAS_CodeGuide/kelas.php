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
   <title>Kelas</title>

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

<section class="heading-link">
   <h3>Kelas CodeGuide</h3>
   <p> <a href="index.php">Beranda</a> / kelas </p>
</section>

<section class="courses">

   <h1 class="heading"> kelas terkenal kami </h1>

   <div class="box-container">

      <div class="box">
         <div class="image">
            <img src="images/web dev.svg" alt="">
            <h3>Web Development</h3>
         </div>
         <div class="content">
            <h3>Web Development</h3>
            <p>Bahasa pemrograman yang akan dipelajari pada kursus web development yaitu bahasa pemrograman HTML dan CSS serta belajar mengenai bahasa scripting seperti PHP, Python, ASP, dan Javascript.</p>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/seo.svg" alt="">
            <h3>search engine</h3>
         </div>
         <div class="content">
            <h3>search engine</h3>
            <p>kamu akan mempelajari website agar mendapatkan peringkat teratas di halaman pencarian Google. Website yang berada di posisi teratas akan mendapatkan jumlah pengunjung yang banyak dan berkualitas.</p>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/frontend.svg" alt="">
            <h3>Front end developer</h3>
         </div>
         <div class="content">
            <h3>Front end developer</h3>
            <p>kamu mempelajari bahasa mark up seperti HTML dan CSS serta bahasa pemrograman JavaScript. JavaScript sendiri mempunyai banyak library dan framework seperti jQuery, AngularJS, dll.</p>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/mobile.svg" alt="">
            <h3>Mobile developer</h3>
         </div>
         <div class="content">
            <h3>Mobile developer</h3>
            <p>Pengembangan berbagai aplikasi seperti iOS dan Android, kamu akan mempelajari Javasccript, HTML, CSS, User-interface (UI), Java, dll. agar dapat merekomendasikan perubahan pada aplikasi yang ada.</p>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/backend.svg" alt="">
            <h3>back end developer</h3>
         </div>
         <div class="content">
            <h3>back end developer</h3>
            <p>Kamu akan memperlajari bahasa pemrograman terkait server. yaitu, PHP sebagai bahasa pemrograman yang memiliki  penulisan sederhana, juga akan mempelajari mengenai keamanan sistem.</p>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/fullstack.svg" alt="">
            <h3>Full stack developer</h3>
         </div>
         <div class="content">
            <h3>Full stack developer</h3>
            <p>Kamu akan mempelajari bahasa pemrograman yang dipelajari Front end dan back end. Versi Control System (VCS) juga akan dipelajari agar kamu dapat melacak perubahan yang dibuat dalam basis kode</p>
         </div>
      </div>

</section>


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