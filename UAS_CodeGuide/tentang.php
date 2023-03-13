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
   <title>Tentang</title>

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
   <h3>Tentang CodeGuide</h3>
   <p> <a href="index.php">Beranda</a> / Tentang </p>
</section>

<!-- about section starts  -->

<section class="about" id="about">

   <div class="row">

      <div class="image">
         <img src="https://img.freepik.com/free-vector/research-paper-concept-illustration_114360-8312.jpg?t=st=1653663689~exp=1653664289~hmac=99855523694e212a4613da85dda343b5d9204442a404aef32fc8169e53f72f2e&w=740" alt="">
      </div>

      <div class="content">
         <h3>mengapa perlu bergabung dengan code guide?</h3>
         <p>CodeGuide, solusimu untuk bisa mahir di bidang IT. Tersedia banyak kelas pilihan yang menarik dengan berbagai tingkatan berbeda agar kamu siap terjun ke dunia kerja. Selain itu, kamu juga dapat berkumpul bersama anggota lain yang juga pecinta programming lho. Yuk, bergabung bersama CodeGuide.</p>
      </div>

   </div>

</section>

<!-- about section ends -->

<!-- teachers section starts  -->

<section class="teachers">

   <h1 class="heading">Pendiri CodeGuide</h1>

   <div class="swiper teachers-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <div class="image">
               <img src="images/tutor1.jpeg" alt="">
               <div class="share">
                  <a href="https://web.facebook.com/groups/44291561847/" class="fab fa-facebook-f"></a>
                  <a href="https://twitter.com/bem__upnvj?s=20&t=ZVNhqXwTtj0Vh3hUKJCuOg" class="fab fa-twitter"></a>
                  <a href="https://www.instagram.com/fasilkomupnvj/" class="fab fa-instagram"></a>
                  <a href="https://id.linkedin.com/company/bemfik-upnvj" class="fab fa-linkedin"></a>
               </div>
            </div>
            <div class="content">
               <h3>Maulida Afifah</h3>
               <span>2010512066</span>
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="image">
               <img src="images/tutor2.jpg" alt="">
               <div class="share">
                  <a href="https://web.facebook.com/groups/44291561847/" class="fab fa-facebook-f"></a>
                  <a href="https://twitter.com/bem__upnvj?s=20&t=ZVNhqXwTtj0Vh3hUKJCuOg" class="fab fa-twitter"></a>
                  <a href="https://www.instagram.com/fasilkomupnvj/" class="fab fa-instagram"></a>
                  <a href="https://id.linkedin.com/company/bemfik-upnvj" class="fab fa-linkedin"></a>
               </div>
            </div>
            <div class="content">
               <h3>Yosia Ruhut Sidabutar</h3>
               <span>2010512077</span>
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="image">
               <img src="images/tutor3.jpeg" alt="">
               <div class="share">
                  <a href="https://web.facebook.com/groups/44291561847/" class="fab fa-facebook-f"></a>
                  <a href="https://twitter.com/bem__upnvj?s=20&t=ZVNhqXwTtj0Vh3hUKJCuOg" class="fab fa-twitter"></a>
                  <a href="https://www.instagram.com/fasilkomupnvj/" class="fab fa-instagram"></a>
                  <a href="https://id.linkedin.com/company/bemfik-upnvj" class="fab fa-linkedin"></a>
               </div>
            </div>
            <div class="content">
               <h3>Dinda Putri Pamungkas </h3>
               <span>2010512070</span>
            </div>
         </div>
         </div>
         
      </div>

   </div>

</section>

<!-- teachers section ends -->

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