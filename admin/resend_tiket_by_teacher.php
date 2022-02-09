<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_navigation.php"; ?>

<?php 


if(isset($_POST['resend_post'])) {
    $tiket_id = $_POST['tiket_id'];
    $tiket_title = $_POST['tiket_title'];
    $tiket_content = $_POST['tiket_content'];
    $tiket_sender = $_POST['tiket_sender'];
    $tiket_first_reciver = $_POST['tiket_first_reciver'];
    $tiket_sender_first_name = $_POST['tiket_sender_first_name'];
    $tiket_sender_last_name = $_POST['tiket_sender_last_name'];
    $tiket_reciver_first_name = $_POST['tiket_reciver_first_name'];
    $tiket_reciver_last_name = $_POST['tiket_reciver_last_name'];
    $tiket_realase_date = $_POST['tiket_realase_date'];

    $resend_username = $_SESSION['username'];
    
    $tiket_reciver = $_POST['tiket_reciver'];

    $query2  = "SELECT * FROM users WHERE 
    username = '{$tiket_reciver}' ";
    $select_reciver_name = mysqli_query($connection , $query2);
    while($rows = mysqli_fetch_array($select_reciver_name)) {
        $reciver_firstName = $rows['first_name'];
        $reciver_lastName = $rows['last_name'];

        // $tiket_sender_role = $_SESSION['user_role'];
        // $tiket_department = $_POST['tiket_department'];

        //send an id whit $_POST['post_department']; and we need to convert it
        // switch($tiket_department) {
        //     case '1': $tiket_department = 'کامپیوتر';
        //     break;
        //     case '2': $tiket_department = 'برق';
        //     break;
        //     case '3': $tiket_department = 'مکانیک';
        //     break;
        //     case '4': $tiket_department = 'حسابداری';
        //     break;
        //     case '5': $tiket_department = 'رباتیک';
        //     break;
        //     default:
        //     $tiket_department = '0';
        // }

        $resend_tiket = 1;

        $query = "UPDATE tikets SET resend_tiket = '{$resend_tiket}' ,
         resend_username = '{$resend_username}' ,
         reciver = '{$tiket_reciver}' ,
         reciver_first_name = '{$reciver_firstName}' ,
         reciver_last_name = '{$reciver_lastName}'  WHERE id = '{$tiket_id}' ";

        

         $create_tiket = mysqli_query($connection, $query);

         if(!$create_tiket) {
             die("QUERY FAILED ." . mysqli_error($connection));
         }


    }

}


?>

