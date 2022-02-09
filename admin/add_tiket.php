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
                    url:'ajaxData.php' ,
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

// mysqli_data_seek( $select_user_query, 0 );  //for reset select_user_query and use mysqli_fetch_array again.
//mysqli_fetch_array() moves the pointer forward each time you call it. You need mysqli_data_seek() to set the pointer back to the start and then call mysqli_fetch_array() again.



if(isset($_POST['send_post'])) {

    $tiket_title     = $_POST['tiket_title'];
    $tiket_sender    = $_SESSION['username'];
    $user_sender_id = $_SESSION['user_id'];
    $tiket_reciver   = $_POST['tiket_reciver'];
    $tiket_date        = date("Y-m-d H:i:s");

    $sender_firstName = $_SESSION['firstname'];
    $sender_lastName  = $_SESSION['lastname'];

    $query2  = "SELECT * FROM users WHERE 
    username = '{$tiket_reciver}' ";
    $select_reciver_name = mysqli_query($connection , $query2);
    while($rows = mysqli_fetch_array($select_reciver_name)) {
        $reciver_firstName = $rows['first_name'];
        $reciver_lastName = $rows['last_name'];
    }

    $tiket_content     = $_POST['tiket_content'];
    $tiket_sender_role = $_SESSION['user_role'];
    $tiket_department  = $_POST['tiket_department'];
    

    //send an id whit $_POST['post_department']; and we need to convert it
    switch($tiket_department) {
        case '1': $tiket_department = 'کامپیوتر';
        break;
        case '2': $tiket_department = 'برق';
        break;
        case '3': $tiket_department = 'مکانیک';
        break;
        case '4': $tiket_department = 'حسابداری';
        break;
        case '5': $tiket_department = 'رباتیک';
        break;
        default:
        $tiket_department = '0';
    }
 


    if($tiket_title != '' && $tiket_content != '' && 
    $tiket_reciver != '' && $tiket_department != '') {
        $query = "INSERT INTO tikets(title, content, sender, 
        reciver, sender_first_name, sender_last_name,
        reciver_first_name , reciver_last_name , department, realase_date)";

        $query .= "VALUES('{$tiket_title}', '{$tiket_content}' ,
        '{$tiket_sender}','{$tiket_reciver}' , '{$sender_firstName}' ,
        '{$sender_lastName}' , '{$reciver_firstName}' , '{$reciver_lastName}' ,
        '{$tiket_department}', '{$tiket_date}' )";

         $create_tiket = mysqli_query($connection, $query);

         if(!$create_tiket) {
             die("QUERY FAILED ." . mysqli_error($connection));
         }

         ?> 
        <script>
             alert('تیکت با موفقیت ارسال شد.');
        </script>
         <?php
         
    } else { ?>
         <script>
             alert('پر کردن تمام فیلدها الزامی است.');
        </script>

    <?php    }

    }
    

?>


<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">عنوان</label>
    <input class="form-control" type="text" name="tiket_title">
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
    <label for="tiket_content">متن </label>
    <textarea class="form-control" name="tiket_content" id="" cols="30" rows="10"></textarea>
</div>


<div class="form-group">
    <input class="update-btn" type="submit" name="send_post" value="ارسال تیکت">
</div>

</form>

</body>
</html>
