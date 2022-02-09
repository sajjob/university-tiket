<style>
    .message {
        background: rgb(247, 247, 247);
        width: 700px;
        margin: 50px auto;
        padding: 20px;
        text-align: center;
        border: 1px solid rgb(82, 82, 82);
        border-radius: 3px;
    }
</style>


<?php include "../includes/db.php";

session_start();

//Get answers on tikets from show_tiket.php
if(isset($_POST['send-answer'])) {

    $tiket_id =  $_SESSION['tiket_id'];
    $tiket_title = $_SESSION['tiket_title'];

    $answer_text =  $_POST['answer_text'];

    $answer_sender = $_SESSION['username'];
    $answer_sender_role = $_SESSION['user_role'];

    if($answer_sender_role == 'استاد') {
        $answer_reciver_role = 'دانشجو';
        $answer_reciver = $_SESSION['answer_reciver'];
    } else if($answer_sender_role == 'دانشجو') {
        $answer_reciver_role = 'استاد';
        $answer_reciver = $_SESSION['answer_sender'];
    }

    //چک کردن برای خالی نبودن کادر متن پاسخ
    if(!empty($answer_text)) {
        $query = "INSERT INTO answers(tiket_id , tiket_title , answer_txt ,
     answer_sender , answer_reciver , answer_sender_role , answer_reciver_role ,
     answer_date) VALUES('{$tiket_id}' , '{$tiket_title}' , '{$answer_text}' ,
     '{$answer_sender}' , '{$answer_reciver}' , '{$answer_sender_role}' ,
     '{$answer_reciver_role}' , now() )";

     $select_query = mysqli_query($connection , $query);


     echo '
     <div class="message">
        <h3>جواب شما با موفقیت ارسال شد</h3>
        <a href="admin.php">بازگشت</a>
     </div>
     
     ';
    } else {
        echo '
     <div class="message">
        <h3>هیچ متنی وارد نکرده اید</h3>
        <a href="all_tikets.php">بازگشت</a>
     </div>
     
     ';
    }

    
}

?>

