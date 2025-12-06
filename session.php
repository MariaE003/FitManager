 <?php
 session_start();

if(!isset($_SESSION['id_user'])) {
    header("Location: auth/login.php");
    exit();
}



// logout

if(isset($_POST["logout"])){
    session_unset();
    session_destroy();
    header("Location: auth/login.php");
    exit();
}
 ?>