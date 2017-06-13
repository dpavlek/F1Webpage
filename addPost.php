<!DOCTYPE html>
<html lang="en">

    <?php
session_start();
$_SESSION['message']='';
include 'ConnToDB.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_COOKIE["user"])) {
                $title = $mysqli -> real_escape_string($_POST['title']);
                $content = $mysqli->real_escape_string($_POST['content']);
                $user = $_COOKIE["user"];
                date_default_timezone_set('Europe/Zagreb');
                $date = date("YY-mm-dd HH:ii:ss", time());

                $sql = "INSERT INTO blogposts (Title, Content, User, time)"
                        . "VALUES ('$title','$content', '$user', '$date')";

                if($mysqli -> query($sql) === true){
                    $_SESSION['message'] = 'Dodavanje članka uspješno!';
                    echo "<script>window.close();</script>";
                }
                else{
                    $_SESSION['message'] = "Članak nije dodan u bazu!";
                }
    }
    else{
        $_SESSION['message']='Korisnik nije logiran!';
    }
}
?>

    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="css/personalstyle.css">
    </head>

    <body>
        <form action="addPost.php" method="post" name="Login_Form" class="form-signin">
        <div class="form-group">
            <label for="title">Naslov</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="content">Sadržaj:</label>
            <textarea class="form-control" rows="20" id="content" name="content"></textarea>
        </div>
        <button type="submit" class="btn btn-default">Pošalji</button>
        </form>
    <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
    </body>
</html>