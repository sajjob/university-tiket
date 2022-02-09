

<nav class="s-nav-bar">
        <ul>
            <li><a href="admin.php"> پروفایل</a></li>

            <?php
            
            if($_SESSION['user_role'] == 'دانشجو') {
                echo '
                <li><a href="all_tikets.php">تیکت های ارسالی</a></li>
                ';
            } else {
                echo '
                <li><a href="all_tikets.php">تیکت های دریافتی</a></li>
                ';
            }
            
            ?>

            <?php 
             if($_SESSION['user_role'] == 'دانشجو') {
                echo '
                
                <li><a href="add_tiket.php">ارسال تیکت جدید</a></li>
                ';
             }
            
            ?>


            
            <li><a href="change_profile.php">تغییر اطلاعات کاربری</a></li>
            
            <li><a id='exit' href="../includes/logout.php">خروج</a></li>
        </ul>
    </nav>