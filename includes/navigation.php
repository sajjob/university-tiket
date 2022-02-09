<!-- dark backdrop when show login form -->
<div id="backdrop"></div>

    <!-- login form start with js -->
    <section class="modal card" id="add-modal">
        <form action="includes/login.php" method="post" class="modal__content">

            <label for="title">نام کاربری</label>
            <input name="username" class="login-input" type="text" placeholder="نام کاربری"><br>
            <label for="image-url">کلمه عبور</label>
            <input name="password" class="login-input" type="password" placeholder="کلمه عبور"><br>
            <input name = "login" class="btn btn--success"  type="submit" value="ورود" >

        </form>

    </section>


    <!-- start navbar -->
    <nav>

        <ul class="nav-links">
            <li><a href="index.php"> خانه </a></li>
            <li id="log"><a style="cursor:pointer;"> ورود </a></li>
            <li><a href="create_account.php">ثبت نام</a></li>
            <li><a href="admin/admin.php">پنل کاربری من </a></li>
        </ul>

        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>

     <script src="./Scripts/app2.js"></script>
     <script src="./Scripts/app3.js"></script>
