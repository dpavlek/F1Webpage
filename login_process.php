<?php 

include 'ConnToDB.php';
$username = $_POST['Username'];
$password = md5($_POST["password"]);

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $mysqli->query($sql);
if(!$row = $result->fetch_assoc()){
    $_SESSION['message'] = 'Prijava neuspješna!';
}
else{
    $_SESSION['message'] = 'Prijava uspješna!';
    
    setcookie("user",$row['username'],time() + 3600);
    setcookie("firstname",$row['firstname'],time() + 3600);
    setcookie("lastname",$row['lastname'],time() + 3600);
    setcookie("user_birth", $row['birth'],time() + 3600);
    setcookie("user_sex", $row['sex'],time() + 3600);

    $_SESSION['username'] = $row['username'];
    $_SESSION['firstname'] = $row['firstname'];
    $_SESSION['lastname'] = $row['lastname'];

    header("location: index.php");
}

?>