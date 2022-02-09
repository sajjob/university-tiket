
<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_navigation.php"; ?>



<div style="border-radius:15px ;text-align:center; background-color:#7d8aa4; width:30%; margin:50px 450px; ">

    <h3 style="color:#151546;"> تیکت های من</h3>
</div>

<table class="table">
    <thead>
        <tr>
            <th>شناسه</th>
            <th>عنوان</th>
            <th> فرستنده</th>
            <th> گیرنده</th>
            <th>به بخش</th>
            <th>تاریخ</th>
            <th>وضعیت</th>
        </tr>
    </thead>
    <tbody>

    <?php

    $query = "SELECT * FROM tikets WHERE sender = '{$_SESSION["username"]}' OR  
    reciver = '{$_SESSION["username"]}' ORDER BY id DESC";
    $select_tikets = mysqli_query($connection , $query);

    while($row = mysqli_fetch_assoc($select_tikets)) {

        $tiket_id            = $row['id'];
        $tiket_title         = $row['title'];
        $tiket_content       = $row['content'];
        $tiket_sender        = $row['sender'];
        $tiket_reciver       = $row['reciver'];
        $tiket_department    = $row['department'];
        $realase_date        = $row['realase_date'];
        $senderFirstName     = $row['sender_first_name'];
        $senderLastName      = $row['sender_last_name'];
        $reciverFirstName    = $row['reciver_first_name'];
        $reciverLastName     = $row['reciver_last_name'];
        $resend_tiket        = $row['resend_tiket'];



        $query_count_tik_id = "SELECT COUNT(tiket_id) FROM answers WHERE
         tiket_id = '$tiket_id' ";
        $select_query_count_tik_id = mysqli_query($connection , $query_count_tik_id);

        $count_tik_id = mysqli_fetch_array($select_query_count_tik_id);
        $count_tik_id[0];


        if($resend_tiket != 1) {
            echo "<tr>";
        echo "<th>$tiket_id</th>";
        echo "<th><a href='show_tiket.php?source=show_post&p_id={$tiket_id}' style='text-decoration: none;'>$tiket_title</a></th>";
        echo "<th>$senderFirstName $senderLastName</th>";
        echo "<th>$reciverFirstName $reciverLastName</th>";
        echo "<th>$tiket_department</th>";
        echo "<th>$realase_date</th>";


        if($count_tik_id[0] == 0) {

            echo "<th class='not-answer'>بدون پاسخ</th>";
            
        } else if($count_tik_id[0] == 1 && $_SESSION['user_role'] == "دانشجو") {

            echo "<th class='recive-tik'>دریافت پاسخ/آماده پاسخ دهی</th>";

        } else if($count_tik_id[0] == 1 && $_SESSION['user_role'] == "استاد") {

            echo "<th class='wating-tik'>در انتظار پاسخ</th>";

        } else if($count_tik_id[0] == 2 && $_SESSION['user_role'] == "دانشجو") {

            echo "<th class='wating-tik'>در انتظار پاسخ</th>";

        }else if($count_tik_id[0] == 2 && $_SESSION['user_role'] == "استاد") {

            echo "<th class='recive-tik'>دریافت پاسخ/آماده پاسخ دهی</th>";

        }else {
            echo "<th class='end-tik'>اتمام تیکت</th>";
        }

        echo "<tr>";
        }

        
    }
    
    ?>

    </tbody>
</table>
        










<div style="border-radius:15px ;text-align:center; background-color:#7d8aa4; width:30%; margin:50px 450px; ">

    <h3 style="color:#151546;"> تیکت های ارجاء داده شده</h3>
</div>




<table class="table">
    <thead>
        <tr>
            <th>شناسه</th>
            <th>عنوان</th>
            <th> فرستنده</th>
            <th> گیرنده</th>
            <th>به بخش</th>
            <th>تاریخ</th>
            <th>ارجاء از نام کاربری</th>
            <th>وضعیت</th>
        </tr>
    </thead>
    <tbody>

    <?php

    $query = "SELECT * FROM tikets WHERE (sender = '{$_SESSION["username"]}' OR  
    reciver = '{$_SESSION["username"]}' OR
    resend_username = '{$_SESSION["username"]}' ) AND
    resend_tiket = 1 ORDER BY id DESC";
    $select_tikets = mysqli_query($connection , $query);

    while($row = mysqli_fetch_assoc($select_tikets)) {

        $tiket_id            = $row['id'];
        $tiket_title         = $row['title'];
        $tiket_content       = $row['content'];
        $tiket_sender        = $row['sender'];
        $tiket_reciver       = $row['reciver'];
        $tiket_department    = $row['department'];
        $realase_date        = $row['realase_date'];
        $senderFirstName     = $row['sender_first_name'];
        $senderLastName      = $row['sender_last_name'];
        $reciverFirstName    = $row['reciver_first_name'];
        $reciverLastName     = $row['reciver_last_name'];
        $resend_username     = $row['resend_username'];



        $query_count_tik_id = "SELECT COUNT(tiket_id) FROM answers WHERE
         tiket_id = '$tiket_id' ";
        $select_query_count_tik_id = mysqli_query($connection , $query_count_tik_id);

        $count_tik_id = mysqli_fetch_array($select_query_count_tik_id);
        $count_tik_id[0];




        echo "<tr>";
        echo "<th>$tiket_id</th>";
        echo "<th><a href='show_tiket.php?source=show_post&p_id={$tiket_id}' style='text-decoration: none;'>$tiket_title</a></th>";
        echo "<th>$senderFirstName $senderLastName</th>";
        echo "<th>$reciverFirstName $reciverLastName</th>";
        echo "<th>$tiket_department</th>";
        echo "<th>$realase_date</th>";
        echo "<th>$resend_username</th>";



        if($count_tik_id[0] == 0) {

            echo "<th class='not-answer'>بدون پاسخ</th>";
            
        } else if($count_tik_id[0] == 1 && $_SESSION['user_role'] == "دانشجو") {

            echo "<th class='recive-tik'>دریافت پاسخ/آماده پاسخ دهی</th>";

        } else if($count_tik_id[0] == 1 && $_SESSION['user_role'] == "استاد") {

            echo "<th class='wating-tik'>در انتظار پاسخ</th>";

        } else if($count_tik_id[0] == 2 && $_SESSION['user_role'] == "دانشجو") {

            echo "<th class='wating-tik'>در انتظار پاسخ</th>";

        }else if($count_tik_id[0] == 2 && $_SESSION['user_role'] == "استاد") {

            echo "<th class='recive-tik'>دریافت پاسخ/آماده پاسخ دهی</th>";

        }else {
            echo "<th class='end-tik'>اتمام تیکت</th>";
        }


        echo "</tr>";
    }
    
    ?>

    </tbody>
</table>