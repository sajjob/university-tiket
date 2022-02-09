<?php include 'includes/admin_header.php'; ?>
<?php include 'includes/admin_navigation.php'; ?>




<!-- نمایش گزارشات تیکت ها تا 7 روز برای پنل دانشجویان -->


<?php 

if($_SESSION['user_role'] == 'دانشجو') {

?>

<div class="row">
    <div class="col-m3">
                <h3>تیکت های در انتظار پاسخ استاد</h3>
<?php



    $query = "SELECT * FROM tikets";
    $select_query = mysqli_query($connection , $query);
    
    
    while($row = mysqli_fetch_array($select_query)) {
    
        $tiket_id = $row['id'];
        $tiket_title = $row['title'];
        $tiket_date = $row['realase_date'];
    
        $query_count_tik_id = "SELECT COUNT(tiket_id) FROM answers WHERE
         tiket_id = '$tiket_id'";
        $select_query_count_tik_id = mysqli_query($connection , $query_count_tik_id);
    
        $count_tik_id = mysqli_fetch_array($select_query_count_tik_id);
        $count_tik_id[0];
    

        //گزارش نمایش تیکت ها فقط تا 7 روز گذشته
        $now = time();
        $diff =  $now - strtotime($tiket_date);
        $differnce_result = round($diff/(60*60*24));




        if($differnce_result <= 7) {


            if(($count_tik_id[0] == 2 || $count_tik_id[0] == 0 )
               && $row['sender'] == $_SESSION['username']) {
       
                   echo '
                   <p style="color:#796702;">عنوان: '. $row["title"] .' <br>
                    تاریخ : '. $row["realase_date"] .' <br>
                    '.$differnce_result.' روز قبل <br>
                    شناسه تیکت: '.$tiket_id.'</p>
                   
                   ';
               }
        }
    
    }

?>
            </div>
            <div class="col-m3">
                <h3>تیکت های آماده پاسخ شما</h3>

                <?php

    $query = "SELECT * FROM tikets";
    $select_query = mysqli_query($connection , $query);
    
    
    while($row = mysqli_fetch_array($select_query)) {
    
        $tiket_id = $row['id'];
        $tiket_title = $row['title'];
        $tiket_date = $row['realase_date'];
    
        $query_count_tik_id = "SELECT COUNT(tiket_id) FROM answers WHERE
         tiket_id = '$tiket_id'";
        $select_query_count_tik_id = mysqli_query($connection , $query_count_tik_id);
    
        $count_tik_id = mysqli_fetch_array($select_query_count_tik_id);
        $count_tik_id[0];

        //گزارش نمایش تیکت ها فقط تا 7 روز گذشته
        $now = time();
        $diff =  $now - strtotime($tiket_date);
        $differnce_result = round($diff/(60*60*24));
    
        if($differnce_result <= 7) {


            if($count_tik_id[0] == 1 && $row['sender'] == $_SESSION['username']) {
       
                   echo '
                   <p style="color:green;">عنوان: '. $row["title"] .'  <br>
                    تاریخ : '. $row["realase_date"] .' <br>
                     '.$differnce_result.' روز قبل <br>
                     شناسه تیکت: '.$tiket_id.'</p>
                   
                   ';
               }
        }
    
    
    }

?>

</div>
<div class="col-m3">
                <h3 >تیکت های بسته شده</h3>
                    
<?php

    $query = "SELECT * FROM tikets";
    $select_query = mysqli_query($connection , $query);
    
    
    while($row = mysqli_fetch_array($select_query)) {
    
        $tiket_id = $row['id'];
        $tiket_title = $row['title'];
        $tiket_date = $row['realase_date'];
    
        $query_count_tik_id = "SELECT COUNT(tiket_id) FROM answers WHERE
         tiket_id = '$tiket_id'";
        $select_query_count_tik_id = mysqli_query($connection , $query_count_tik_id);
    
        $count_tik_id = mysqli_fetch_array($select_query_count_tik_id);
        $count_tik_id[0];

         //گزارش نمایش تیکت ها فقط تا 7 روز گذشته
         $now = time();
         $diff =  $now - strtotime($tiket_date);
         $differnce_result = round($diff/(60*60*24));
     
         if($differnce_result <= 7) {
    
            if($count_tik_id[0] == 3 && $row['sender'] == $_SESSION['username']) {
            
                   echo '
                   <p style="color:red;">عنوان: '. $row["title"] .' <br>
                     تاریخ : '. $row["realase_date"] .' <br> 
                    '.$differnce_result.' روز قبل  <br>
                    شناسه تیکت: '.$tiket_id.'</p>

                   ';
               } 
        }
    
    }
    

?>
    
    
</div>
    

</div>

<div style="margin:100px 300px;">
    <h1>
    برای اطلاعات بیشتر به قسمت <span style="color:red;">تیکت های ارسالی</span> مراجعه کنید.    

    </h1>

</div>

<?php } ?>


<!-- نمایش گزارشات تیکت ها تا 7 روز برای پنل اساتید -->

<?php 

if($_SESSION['user_role'] == 'استاد') {

?>

<div class="row">
    <div class="col-m3">
                <h3>تیکت های در انتظار پاسخ دانشجو</h3>
<?php



    $query = "SELECT * FROM tikets";
    $select_query = mysqli_query($connection , $query);
    
    
    while($row = mysqli_fetch_array($select_query)) {
    
        $tiket_id = $row['id'];
        $tiket_title = $row['title'];
        $tiket_date = $row['realase_date'];
    
        $query_count_tik_id = "SELECT COUNT(tiket_id) FROM answers WHERE
         tiket_id = '$tiket_id'";
        $select_query_count_tik_id = mysqli_query($connection , $query_count_tik_id);
    
        $count_tik_id = mysqli_fetch_array($select_query_count_tik_id);
        $count_tik_id[0];
    

        //گزارش نمایش تیکت ها فقط تا 7 روز گذشته
        $now = time();
        $diff =  $now - strtotime($tiket_date);
        $differnce_result = round($diff/(60*60*24));




        if($differnce_result <= 7) {


            if($count_tik_id[0] == 1 
               && $row['reciver'] == $_SESSION['username']) {
       
                   echo '
                   <p style="color:#796702;">عنوان: '. $row["title"] .' <br>
                    تاریخ : '. $row["realase_date"] .' <br>
                    '.$differnce_result.' روز قبل <br>
                    شناسه تیکت: '.$tiket_id.'</p>
                   
                   ';
               }
        }
    
    }

?>
            </div>
            <div class="col-m3">
                <h3>تیکت های آماده پاسخ شما</h3>

                <?php

    $query = "SELECT * FROM tikets";
    $select_query = mysqli_query($connection , $query);
    
    
    while($row = mysqli_fetch_array($select_query)) {
    
        $tiket_id = $row['id'];
        $tiket_title = $row['title'];
        $tiket_date = $row['realase_date'];
    
        $query_count_tik_id = "SELECT COUNT(tiket_id) FROM answers WHERE
         tiket_id = '$tiket_id'";
        $select_query_count_tik_id = mysqli_query($connection , $query_count_tik_id);
    
        $count_tik_id = mysqli_fetch_array($select_query_count_tik_id);
        $count_tik_id[0];

        //گزارش نمایش تیکت ها فقط تا 7 روز گذشته
        $now = time();
        $diff =  $now - strtotime($tiket_date);
        $differnce_result = round($diff/(60*60*24));
    
        if($differnce_result <= 7) {


            if(($count_tik_id[0] == 2 || $count_tik_id[0] == 0 ) &&
                $row['reciver'] == $_SESSION['username']) {
       
                   echo '
                   <p style="color:green;">عنوان: '. $row["title"] .'  <br>
                    تاریخ : '. $row["realase_date"] .' <br>
                     '.$differnce_result.' روز قبل <br>
                     شناسه تیکت: '.$tiket_id.'</p>
                   
                   ';
               }
        }
    
    
    }

?>

</div>
<div class="col-m3">
                <h3 >تیکت های بسته شده</h3>
                    
<?php

    $query = "SELECT * FROM tikets";
    $select_query = mysqli_query($connection , $query);
    
    
    while($row = mysqli_fetch_array($select_query)) {
    
        $tiket_id = $row['id'];
        $tiket_title = $row['title'];
        $tiket_date = $row['realase_date'];
    
        $query_count_tik_id = "SELECT COUNT(tiket_id) FROM answers WHERE
         tiket_id = '$tiket_id'";
        $select_query_count_tik_id = mysqli_query($connection , $query_count_tik_id);
    
        $count_tik_id = mysqli_fetch_array($select_query_count_tik_id);
        $count_tik_id[0];

         //گزارش نمایش تیکت ها فقط تا 7 روز گذشته
         $now = time();
         $diff =  $now - strtotime($tiket_date);
         $differnce_result = round($diff/(60*60*24));
     
         if($differnce_result <= 7) {
    
            if($count_tik_id[0] == 3 &&
             $row['reciver'] == $_SESSION['username']) {
            
                   echo '
                   <p style="color:red;">عنوان: '. $row["title"] .' <br>
                     تاریخ : '. $row["realase_date"] .' <br> 
                    '.$differnce_result.' روز قبل  <br>
                    شناسه تیکت: '.$tiket_id.'</p>

                   ';
               } 
        }
    
    }
    

?>
    
    
</div>
    

</div>

<div style="margin:100px 300px;">
    <h1>
    برای اطلاعات بیشتر به قسمت <span style="color:red;">تیکت های دریافتی</span> مراجعه کنید.    

    </h1>

</div>

<?php } ?>




</body>
</html>