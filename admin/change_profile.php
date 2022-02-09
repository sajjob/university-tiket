
<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_navigation.php"; ?>


<?php 

//$_SESSION['username'] from login page
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '{$username}' ";

    $select_user_profile_query = mysqli_query($connection , $query);

    while($row = mysqli_fetch_array($select_user_profile_query)) {

        $user_id        = $row['id'];
        $username       = $row['username'];
        $user_password  = $row['user_password'];
        $user_firstname = $row['first_name'];
        $user_lastname  = $row['last_name'];
        $user_email     = $row['email'];
        $user_role      = $row['user_role'];
    }
}
?>


<?php 
//when user click user update in this page (change_profile.php) do this
if(isset($_POST['edit_user'])) {
            
    $user_firstname   = $_POST['user_firstname'];
    $user_lastname    = $_POST['user_lastname'];
    // $user_role        = $_POST['user_role'];
    $username      = $_POST['username'];
    $user_email    = $_POST['user_email'];
    $user_password = $_POST['user_password'];


        $query = "UPDATE users SET ";
        $query .="first_name  = '{$user_firstname}', ";
        $query .="last_name = '{$user_lastname}', ";
      //   $query .="user_role   =  '{$user_role}', ";
        $query .="username = '{$username}', ";
        $query .="email = '{$user_email}', ";
        $query .="user_password   = '{$user_password}' ";
        $query .= "WHERE username = '{$username}' ";



    $edit_user_query = mysqli_query($connection,$query);

    function confirmQuery($result) {
        global $connection;
        if(!$result ) {
              die("QUERY FAILED ." . mysqli_error($connection)); 
          }
    }
   
    confirmQuery($edit_user_query);


}
?>
    <!-- change_profile form for change personall information -->
   
    <form action="" method="post" enctype="multipart/form-data">    
      <div class="form-group">
         <label for="name">نام</label>
          <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
      </div>

       <div class="form-group">
         <label for="post_status">نام خانوادگی</label>
          <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
      </div>

      <div class="form-group">
         <label for="post_tags">نام کاربری</label>
          <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
      </div>
      
      <div class="form-group">
         <label for="post_content">ایمیل</label>
          <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
      </div>
      
      <div class="form-group">
         <label for="post_content">رمز عبور</label>
          <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password">
      </div>
      

       <div class="form-group">
          <input class="update-btn" type="submit" name="edit_user" value="به روز رسانی ">
      </div>


</form>
    