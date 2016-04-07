


<?php 

$db= mysql_connect("localhost", "root", "") or die ("Нет соединения с хостом");
mysql_select_db ("velom");

function loginUser(){
    if (!isset($_POST['login']) || !isset($_POST['password'])) return false;
    
    $login = $_POST['login']; $password = $_POST['password'];
    
    $login = strtolower($login);
    
    if (!preg_match('/^[a-z]+[0-9]*([\.\-_]{1,1}[a-z0-9]+){0,2}$/', $login)) {return; }    
    if (!preg_match('/^[\x20-\x7e]{4,12}$/', $password)){return;}
    
    $password = sha1($password);
    
    $query = "SELECT * FROM sotr WHERE login='$login' AND pass='$password'";
    
    $result = mysqli_query($db, $query);
    
    if ($result && $result->num_rows == 1){$_SESSION['user'] = $result->fetch_assoc();$result->close();return true;
    }
    return false;
}

function requireLogin(){
 
    if (isset($_SESSION['user'])) return false;
    return true;
}

?>
