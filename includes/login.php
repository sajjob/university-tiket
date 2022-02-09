<?php include "db.php"?>

<?php session_start(); ?>

<?php


//Get login data from index.php
if(isset($_POST['login'])) {
   
   $username = $_POST['username'];
   $password = $_POST['password'];
   //echo $username . ' ' . $password;
   $username = mysqli_real_escape_string($connection , $username);
   $password = mysqli_real_escape_string($connection , $password);


   $query = "SELECT * FROM users WHERE username = '{$username}'";
   $select_user_query = mysqli_query($connection , $query);

   if(!$select_user_query) {
      die('QUERY FAILD' . mysqli_error($connection));
   }

   while($row = mysqli_fetch_array($select_user_query)) {
      $db_user_id = $row['id']; 
      $db_username = $row['username']; 
      $db_user_password = $row['user_password']; 
      $db_user_firstname = $row['first_name']; 
      $db_user_lastname = $row['last_name']; 
      $db_user_role = $row['user_role'];
      $db_user_department = $row['department'];

   }
   if($username === $db_username && $password === $db_user_password) {
      $_SESSION['user_id'] = $db_user_id;
      $_SESSION['username'] = $db_username;
      $_SESSION['firstname'] = $db_user_firstname;
      $_SESSION['lastname'] = $db_user_lastname;
      $_SESSION['user_role'] = $db_user_role;
      $_SESSION['user_department'] = $db_user_department;

      header('Location: ../admin/admin.php');
   }else {
      header('Location: ../index.php');
   }
}