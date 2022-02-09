
<!-- استایل دهی برای پیام موفقیت ثبت نام -->
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

<?php include "db.php";

if(isset($_POST['create_account'])) {
    
    //get informations from create_account.php for registering

    $user_firstname     = $_POST['firstName'];
    $user_lastname      = $_POST['lastName'];
    $userIdentityCode   = $_POST['idCode'];
    $userUniCode        = $_POST['uniCode'];

    $optionDepId     = $_POST['user_department'] ? $_POST['user_department']: false;

    $userDepartmentID   = $optionDepId;
    $userEmail          = $_POST['email'];
    $userName           = $_POST['userName'];
    $userPassword       = $_POST['password'];
    $userConfigPassword = $_POST['password-conf'];

    switch($userDepartmentID) {
        case '1': $userDepartment = 'کامپیوتر';
        break;
        case '2': $userDepartment = 'برق';
        break;
        case '3': $userDepartment = 'مکانیک';
        break;
        case '4': $userDepartment = 'حسابداری';
        break;
        case '5': $userDepartment = 'رباتیک';
        break;
        default:
        $userDepartment = '0';
    }

    //Define User Role
    //کد دسترسی دانشگاه برای اساتید 9911
    if($userUniCode == '9911') {
        $user_role = 'استاد';
    } else {
        $user_role = 'دانشجو';
    }

    $max_userIdentityCode_limit = 10;
    $min_userIdentityCode_limit = 2;
    $max_userUniCode_limit = 14;
    // !!! END of Define Variables !!!

    //چک کردن نام کاربری وارد شده برای اطمینان از یونیک بودن آن
    $check_username_query  = "SELECT * FROM users WHERE username = '{$userName}'";
    $check_username        = mysqli_query($connection , $check_username_query);

    $check_email_query  = "SELECT * FROM users WHERE email = '{$userEmail}'";
    $check_email        = mysqli_query($connection , $check_email_query);



    if(!$userName || !$userPassword || !$userEmail || !$userIdentityCode || 
        !$userUniCode || !$userDepartmentID) {

        echo '
         
         <div class="message">
            <h3> تمام فیلد ها را پر کنید </h3>
            <a href="../create_account.php"> بازگشت به ثبت نام </a>
         </div>
         
         
         
         ';

    } else if(mysqli_num_rows($check_email) > 0) {

        echo "این ایمیل قبلا در سامانه ثبت نام کرده است";

    } else if(mysqli_num_rows($check_username) > 0) {

        echo "این نام کاربری قبلا انتخاب شده است";

    } else if($userConfigPassword !== $userPassword) {

        echo "رمز عبور وارد شده با تکرار آن مغایرت دارد";
       
    } else if (preg_match('/^[^\x{600}-\x{6FF}]+$/u',$user_firstname)) {

        echo "فقط کلمات و فاصله ها در نام مجاز است";
        echo "<br>";
        echo "از @ % , و امثال آنها استفاده نکنید";

      } else if (preg_match('/^[^\x{600}-\x{6FF}]+$/u',$user_lastname)) {

        echo "فقط کلمات و فاصله ها در نام خانوادگی مجاز است";
        echo "<br>";
        echo "از @ % , و امثال آنها استفاده نکنید";

      } else if(strlen($userIdentityCode) > $max_userIdentityCode_limit ||
            strlen($userIdentityCode) < $min_userIdentityCode_limit )  {

        echo "فرمت کد ملی را رعایت کنید";

      } else if(strlen($userUniCode) !== $max_userUniCode_limit && 
            $user_role == 'دانشجو') {

        echo "شماره دانشجویی را اشتباه وارد کرده اید";

      } else if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {

        echo "ایمیل وارد شده صحیح نیست";
      } else if (!preg_match("/^[a-zA-Z-' ]*$/" , $userName)) {

        echo 'فقط از کلمات انگلیسی می توانید برای نام کاربری استفاده کنید';
        echo '<br>';
        echo "از @#$%^&*()|/ استفاده نکنید";
      }
     else {

        $query = "INSERT INTO users(first_name , last_name , identity_code , 
        uni_code , department , department_id , email , username , user_role , 
        user_password) VALUES('{$user_firstname}' , '{$user_lastname}' , 
        '{$userIdentityCode}' , '{$userUniCode}' , 
        '{$userDepartment}' , '{$userDepartmentID}' , '{$userEmail}' ,
         '{$userName}', '{$user_role}' , '{$userPassword}' )";
    
        $create_user = mysqli_query($connection, $query);
    
        if(!$create_user) {
            die('QUERY FAILD' . mysqli_error($connection));
         }

         echo '
         
         <div class="message">
            <h3> ثبت نام با موفقیت انجام شد </h3>
            <a href="../index.php"> ورود به پنل کاربری </a>
         </div>
         
         
         
         ';

    }


}


?>
