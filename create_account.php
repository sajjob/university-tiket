<!-- ثبت نام دانشجویان و اساتید-->

<?php include  "includes/header.php"; ?>
<?php include "includes/navigation.php" ?>


<style>
    body{
        background: #ededf7;
    }
</style>

    <section id="signup-form" class="forms">
        <form action="includes/register_create_accont.php" method="post">
            <h4>ثبت نام</h4><br>
            <label for=""><span style="color:red;">*</span> نام و نام خانوادگی فقط با حروف فارسی قابل قبول است </label><br>
            <input name="firstName" class="login-input" type="text" placeholder="نام"><br>
            <input name="lastName" class="login-input" type="text" placeholder="نام خانوادگی"><br>
            <input name="idCode" class="login-input" type="number" placeholder="کد ملی" onkeypress="return isNumberKey(event)"><br>
            <label for=""><span style="color:red;">*</span>اساتید محترم به جای شماره دانشجویی، کد دسترسی دانشگاه را وارد کنند</label><br>
            <input name="uniCode" class="login-input" type="number" placeholder="شماره دانشجویی" onkeypress="return isNumberKey(event)"><br>
            <select id="dep" name="user_department" class="login-input" style="cursor:pointer;">
            <option value="0">دپارتمان را انتخاب کنید</option>
            <option value="1">کامپیوتر</option>
            <option value="2">برق</option>
            <option value="3">مکانیک</option>
            <option value="4">حسابداری</option>
            <option value="5">رباتیک</option>
            </select><br>
            <input name="email" class="login-input" type="text" placeholder="ایمیل"><br>
            <label for=""><span style="color:red;">*</span> استفاده از حروف لاتین برای نام کاربری الزامی است </label><br>
            <input name="userName" class="login-input" type="text" placeholder="نام کاربری"><br>
            <input name="password" class="login-input" type="password" placeholder="کلمه عبور"><br>
            <input name="password-conf" class="login-input" type="password" placeholder="تکرار کلمه عبور"><br>
            <input name= "create_account" class="send-input"  type="submit" value="ثبت اطلاعات">
        </form>
    </section>
    


    <script>
    //برای اجازه ندادن به کاربر برای نوشتن هرچیزی غیر از عدد

    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>

<?php include "includes/footer.php"; ?>