<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_navigation.php"; ?>


<script src="scripts/jquery.min.js"></script>


<script>
    $(document).ready(function() {
        $('#dep').on('change' , function() {
            var dpeID = $(this).val();
            if(dpeID) {
                $.ajax({
                    type:'POST' ,
                    url:'ajaxDataTeachers.php' ,
                    data:'depart_id='+dpeID,
                    success:function(html) {
                        $('#rec').html(html);
                    }
                });
            } else {
                $('#rec').html('<option value="">dsadadadadada</option>');
            }
        });

    });

</script>








<?php 

    //Get tiket id when clicked from all_tikets.php page
    if(isset($_GET['p_id'])) {

        $the_tiket_id = $_GET['p_id'];

        $query = "SELECT * FROM tikets WHERE id = {$the_tiket_id}";
        $select_tiket = mysqli_query($connection , $query);
    
        while($row = mysqli_fetch_assoc($select_tiket)) {
    
            $tiket_id            = $row['id'];
            $tiket_title         = $row['title'];
            $tiket_content       = $row['content'];
            $tiket_sender        = $row['sender'];
            $tiket_reciver       = $row['reciver'];
            $sender_first_name   = $row['sender_first_name'];
            $sender_last_name    = $row['sender_last_name'];
            $reciver_first_name  = $row['reciver_first_name'];
            $reciver_last_name   = $row['reciver_last_name'];
            $department          = $row['department'];
            $realase_date        = $row['realase_date'];
            $resend_tiket        = $row['resend_tiket'];
            $resend_username     = $row['resend_username'];

            $_SESSION['tiket_id']         = $tiket_id;
            $_SESSION['tiket_title']      = $tiket_title;
            $_SESSION['answer_reciver']   = $tiket_sender;
            $_SESSION['answer_sender']    = $tiket_reciver;
        }

    }
   


?>



<div class='tiket_post'>

    <div class="post">
    <p style="background-color:#dfdfff; font-size:20px; color: #00728c; border-radius:10px;">عنوان</p>
        <h3 style="text-align:center; margin-top:10px"><?php echo $tiket_title; ?></h3>
    </div>

    <div class="post">
        <p style="background-color:#dfdfff; font-size:20px; color: #00728c; border-radius:10px;">متن</p>
        <div class="paragraph">
            <p><?php echo $tiket_content; ?></p>
        </div>

        <br>
        <br>
        <br>

        <div class="tiket_info">
            <h4>تاریخ انتشار:  <?php echo $realase_date; ?></h4> 
            <h4>ارسال شده به نام کاربری  :    <?php echo $tiket_reciver;?></h4> 
            <h4>نام و نام خانوادگی  :    <?php echo $reciver_first_name . ' ' . $reciver_last_name;?></h4> 
            <h4>بخش :    <?php echo $department; ?> </h4> 
            <h4>شناسه تیکت :    <?php echo $tiket_id; ?> </h4> 
        </div>


        <?php
        //count same tiket id from answers table for answering
        $query_count_tik_id = "SELECT COUNT(tiket_id) FROM answers WHERE tiket_id = '{$tiket_id}'";
        $select_query_count_tik_id = mysqli_query($connection , $query_count_tik_id);
        
        $count_tik_id = mysqli_fetch_array($select_query_count_tik_id);
        $count_tik_id[0];

        if($_SESSION['user_role'] == 'استاد' && $count_tik_id[0] == 0) {
            
            if($resend_username != $_SESSION["username"]) {
            echo '
            <div class="ask-yes-no">
                    <button id="active-answer">پاسخ دهی به این تیکت</button>
                </div>
            ';
            }

        if($resend_tiket == 0) {
            echo '
            <div class="send-to-another-teacher">
                    <button id="active-send">ارجاءاین تیکت به اساتید دیگر</button>
                </div>
            ';
        }

        } else if($_SESSION['user_role'] == 'دانشجو' && $count_tik_id[0] == 1) {

            echo '
            <div class="ask-yes-no">
                    <button id="active-answer">پاسخ دهی به این تیکت</button>
                </div>
            ';
        } else if($_SESSION['user_role'] == 'استاد' && $count_tik_id[0] == 2) {
            echo '
            <div class="ask-yes-no">
                    <button id="active-answer">پاسخ دهی به این تیکت</button>
                </div>
            ';
        }
        ?>
    </div>
</div>


<div class="textarea">

    <!-- <button class="cancel-answer">انصراف</button> -->
    <button id="cancel-answer"><span class="close">&times;</span></button>

        <!-- send answer to register_answer.php page --> 
    <form action="register_answer.php" method="post">
        <label for="">پاسخ شما</label><br><br>
        <textarea name="answer_text" id="" cols="30" rows="10" ></textarea><br>
        <input name="send-answer" id="send-answer" type="submit" value="ارسال پاسخ">
    </form>
</div>



<!-- فرم ارجاء تیکت دریافت شده برای استاد به استاد دیگر -->

<div class="form-area">

    <!-- <button class="cancel-resending">انصراف</button> -->
    <button id="cancel-resending"><span class="close">&times;</span></button>


    <form action="resend_tiket_by_teacher.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
        <label for="tiket_department"> شناسه این تیکت </label><br>
        <input type="text" name="tiket_id" value="<?php echo $tiket_id; ?>">
        </div>

        <div class="form-group">
        <label for="tiket_department"> عنوان </label><br>
        <input type="text" name="tiket_title" value="<?php echo $tiket_title; ?>">
        </div>

        <div class="form-group">
        <label for="tiket_department"> متن </label><br>
        <textarea class="form-control" name="tiket_content" id="" cols="30" rows="10">
            <?php echo $tiket_content; ?></textarea>
        </div>

        <div class="form-group">
        <label for="tiket_department"> فرستنده </label><br>
        <input type="text" name="tiket_sender" value="<?php echo $tiket_sender; ?>"">
        </div>

        
        <div class="form-group">
        <label for="tiket_department"> گیرنده </label><br>
        <input type="text" name="tiket_first_reciver" value="<?php echo $tiket_reciver; ?>">
        </div>

        
        <div class="form-group">
        <label for="tiket_department"> نام فرستنده </label><br>
        <input type="text" name="tiket_sender_first_name" value="<?php echo $sender_first_name; ?>">
        </div>


        
        <div class="form-group">
        <label for="tiket_department"> نام خانوادگی فرستنده </label><br>
        <input type="text" name="tiket_sender_last_name" value="<?php echo $sender_last_name; ?>">
        </div>

        <div class="form-group">
        <label for="tiket_department"> نام گیرنده </label><br>
        <input type="text" name="tiket_reciver_first_name" value="<?php echo $reciver_first_name; ?>">
        </div>

        <div class="form-group">
        <label for="tiket_department"> نام خانوادگی گیرنده </label><br>
        <input type="text" name="tiket_reciver_last_name" value="<?php echo $reciver_last_name; ?>">
        </div>

        <div class="form-group">
        <label for="tiket_department"> تاریخ تیکت </label><br>
        <input type="text" name="tiket_realase_date" value="<?php echo $realase_date; ?>">
        </div>

        <div class="form-group">
        <label for="tiket_department"> بخش </label>
        <select id="dep" name="tiket_department" class="select-add_option">

        <option value="">دپارتمان را انتخاب کنید</option>

        <?php 

        $query1 = "SELECT DISTINCT department , department_id From users ORDER BY department ASC";
        $select_user_query1 = mysqli_query($connection , $query1);
        
        if(!$select_user_query1) {
         die('QUERY FAILD' . mysqli_error($connection));
          }
         if($select_user_query1) {
        
          while($row = mysqli_fetch_array($select_user_query1)) {
            echo "<option value='". $row['department_id'] ."'<select>".$row['department']."</option>";
          }
        }   else {
            echo '<option value="">دپارتمان در دسترس نیست </option>';
        }

          ?>

            </select>
        </div>

        <div class="form-group">
            <label for="user_reciver_id"> ارسال به نام کاربری </label>
            <select id="rec" name="tiket_reciver" class="select-add_option">
            <option value="">اول دپارتمان را انتخاب کنید</option>

            </select>
        </div>

        <div class="form-group">
            <input class="update-btn" type="submit" name="resend_post" value="ارسال تیکت">
        </div>

    </form>

</div>





<?php
//show tiket answers part
$query_teacher_answer = "SELECT * FROM answers WHERE tiket_id = '{$the_tiket_id}'";
$select_query_teacher_answer = mysqli_query($connection , $query_teacher_answer);

while($r = mysqli_fetch_array($select_query_teacher_answer)) {

    if($r['answer_sender_role'] == $_SESSION['user_role']) {

        echo '

        <div class="green-answer">
        جواب شما
        <p> '. $r['answer_txt'] .' </p>
    
        <div class="answer-date">
            <h4>تاریخ : '.$r['answer_date'].'</h4>
        </div>
    </div>
        
        ';
    } else if($r['answer_sender_role'] !== $_SESSION['user_role']) {
        echo '

    <div class="yellow-answer">
    پاسخ به شما
    <p> '. $r['answer_txt'] .' </p>

    <div class="answer-date">
        <h4>تاریخ : '. $r['answer_date'] .'</h4>
    </div>
</div>

    ';
    }
    
}


?>







<script src="scripts/app.js"></script>
