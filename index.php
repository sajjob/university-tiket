<!-- main page -> start website in here -->
<!-- این صفحه شامل یک اسلایدر ،یک معرفی به اجمالی از دانشگاه های دیگر و لاگین یوزر ها می باشد -->


<?php include "includes/header.php" ?>

<?php include "includes/navigation.php" ?>

<style>
    body {
        background: #ededf7;
    }
    
  
</style>


<!-- start slider with 6 topic -->

<div class="slider">
      <div class="slide current">
        <div class="content">
          <h1>دانشکده فنی و حرفه ای شهید شمسی پور میزبان کارشناسان آموزش همگانی آبفای منطقه دو تهران بود </h1>
          <p>
          دانشکده فنی و حرفه ای شهید شمسی پور با حدود 300 دانشجو در ترم تابستانی میزبان کارشناسان آموزش همگانی آبفای منطقه دو به منظور آموزش راهکارهای صرفه جویی در مصرف آب در بین دانشجویان بود 
          </p>
        </div>
      </div>
      <div class="slide">
        <div class="content">
          <h1></h1>
          <p></p>
        </div>
      </div>
      <div class="slide">
        <div class="content">
          <h1></h1>
          <p></p>
        </div>
      </div>
      <div class="slide">
        <div class="content">
          <h1></h1>
          <p></p>
        </div>
      </div>
      <div class="slide">
        <div class="content">
          <h1>جلسه شورای آموزشی و پژوهشی دانشکده فنی و حرفه ای شهید شمسی پور برگزار شد</h1>
          <p>
          به گزارش روابط عمومی دانشگاه شمسی پور، جلسه شورای آموزشی و پژوهشی با حضور مهندس عبدی، رئیس دانشکده و اعضای شورا، روز دوشنبه مورخ بیست و چهارم خرداد 1400 حول محورهای آموزشی و پژوهشی در سالن کنفرانس دانشکده برگزار شد.
          </p>
        </div>
      </div><div class="slide">
        <div class="content">
          <h1>جشن فارق التحصیلان دانشگاهی</h1>
          <p>
            یکی از بهترین و به یادماندگارترین خاطرات دانشگاهی برای دانشجویان است.
          </p>
        </div>
      </div>
    </div>
    <div class="buttons">
        <button id="prev"><i class="fa fa-arrow-left">قبل</i></button>
        <button id="next"><i class="fa fa-arrow-right">بعد</i></button>
    </div>


    <!-- 4 university intrudoction -->

    <div class="row">
            <div class="col-m4">
                <a href=""><h4 style="border: 1px solid black;"> دانشگاه شهید شمسی پور </h4></a>
                <img src="./assets/images/shamsipour-logo.jpg" alt="img 1">
                <p>
                     بهترین دانشگاه های فنی و حرفه ای کشور دانشگاه فنی حرفه ای شهید شمسی پور تهران می باشد.
                </p>
            </div>

            <div class="col-m4">
                <a href=""><h4 style="border: 1px solid black;"> دانشگاه آزاد اسلامی </h4></a>
                <img src="./assets/images/Azad_University_logo.jpg" alt="img 2">
                <p>
                   دانشگاه آزاد اسلامی یکی از موفق ترین دانشگاه های سراسر کشور
                </p>
            </div>

            <div class="col-m4">
                <a href=""><h4 style="border: 1px solid black;"> دانشگاه صنعتی شریف </h4></a>
                <img src="./assets/images/Sanati-sharif-logo.jpg" alt="img 3">
                <p>
                   موفق ترین دانشگاه صنعتی کشور در حوزه ی صنعت و تکنولوژی با دانشجویان موفق در سراسر دنیا
                </p>
            </div>

            <div class="col-m4">
                <a href=""><h4 style="border: 1px solid black;"> دانشگاه تهران  </h4></a>
                <img src="./assets/images/University_of_Tehran_logo.jpg"img 4">
                <p>
                     قدیمی ترین دانشگاه ایران دانشگاه تهران است. با سابقه ای طولانی
                </p>
            </div>
        </div>
        
    </div>

            
    <!-- start login form -->

    <section class="forms" id="log">
        <form action="includes/login.php" method="post">

            <input name="username" class="login-input" type="text" placeholder="نام کاربری"><br>
            <input name="password" class="login-input" type="password" placeholder="کلمه عبور"><br>
            <input name = "login" class="send-input"  type="submit" value="ورود" >

        </form>


   
        <div class="sign-up-message">
            <p>آیا در سامانه ثبت نام کرده اید؟   <a href="create_account.php"> ثبت نام </a></p>
        </div>
    </section>


    <!-- add script for slider -->

    <script src="./Scripts/app.js"></script>

    <!-- start footer -->

<?php include "includes/footer.php"; ?>