<?php
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

?>

<?php
    $login = $_POST['login'];
    $pas = $_POST['password'];
    $repas = $_POST['re_password'];


        if($pas== $repas){
            $hash = password_hash($pas,PASSWORD_DEFAULT);
  

            $query = "INSERT INTO users VALUES(null,'$login','$hash',default, 0, 2)";
            $result = mysqli_query($conn, $query);

            if($result) {
                header("location: index.php?reg=1");
            }
        }

?>
