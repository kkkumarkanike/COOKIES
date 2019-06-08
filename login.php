<?php
/**
 * Created by PhpStorm.
 * User: kkkum
 * Date: 6/7/2019
 * Time: 11:51 AM
 */
include 'db_config.php';


//setcookie($name,$value,time()+3600);
if (isset($_COOKIE['name'])) {
    $val = $_COOKIE['name'];
    $q = "select * from cook where value = '$val'";
    $result = mysqli_query($conn,$q);
    $rows = mysqli_num_rows($result);
    if ($rows > 0){
        echo $rows['name'];
        echo $rows['pass'];
        echo 'session running';

    }

} else{
    $name = $_POST['name'];
//$value = rand(0000,9999);
    $pass = $_POST['password'];
    $value = rand(0000,9999);
    $q = "select nam,pass from cook where nam = '$name' and pass = '$pass'";
    setcookie('name',$value,time()+3600);
    $insert = "update cook set value = '$value'";
    mysqli_query($conn,$insert);
    $result = mysqli_query($conn,$q);
    $rows = mysqli_num_rows($result);
    if ($rows > 0){

        echo 'Freshly logged in ';
        header("Location:");

    }



}
?>