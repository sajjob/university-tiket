<?php session_start(); ?>
<?php

$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "tikt";

//create db conn
$db = new mysqli($dbHost , $dbUsername , $dbPassword , $dbName);

if($db -> connect_error) {
    die('con faild' . $db -> connect_error);
}

if(!empty($_POST["depart_id"])) {

    $query = "SELECT * FROM users WHERE department_id = ".$_POST["depart_id"]." AND
     user_role = '{$_SESSION["user_role"]}' AND username != '{$_SESSION["username"]}' ";

    $result = $db -> query($query);

    if($result -> num_rows > 0) {
        while($row = $result -> fetch_assoc()){
            echo '<option value="'.$row['username'].'">'.$row['first_name'].'
             '.' '.$row['last_name'].'</option>';
        }
    } else {
        echo '<option value="">هیچ فردی برای انتخاب در این بخش موجود نیست</option>';
    }
}

