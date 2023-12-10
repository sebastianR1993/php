<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// TWORZENIE POŁĄCZENIA
$conn = mysqli_connect($servername, $username, $password, $dbname);

// SPRAWDZANIE CZY POŁĄCZENIE ZOSTAŁO UTWORZONE
if (!$conn) {
    die("Nieudane połączenie: " . mysqli_connect_error());
}


    $login = $_POST['log'];
    $pas = $_POST['nas'];
   
    $get_user_query = "SELECT * FROM users WHERE login = '$login'";
    $user_result = mysqli_query($conn, $get_user_query);
    if(mysqli_num_rows($user_result) == 1){
        $user = mysqli_fetch_assoc($user_result);
        if(password_verify($pas,$user['hash'])){
            $_SESSION['logged'] = $user['id_users'];
            $_SESSION['USER_NAME'] = $user['login'];
          
            header("location: index.php?log=1")

        }else{
            
        }
    }
?>