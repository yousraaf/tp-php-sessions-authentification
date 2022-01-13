<?php
session_start();


$connex=new PDO('mysql:host=localhost;dbname=mabase', 'root', '');
?>
<html>
<head></head>
<body>

<form method="post" action="index.php">
Login : <input type="text" name="log" /><br />
Password : <input type="password" name="pass" /><br />
<input type="submit" value="Entrer" />
</form>
<?php

if (isset ($_POST['log'])){
$login = $_POST["pass"];
$password = $_POST["pass"];
$sql = "SELECT * FROM user WHERE login='$login' AND password='$password'";
$query=$connex->query($sql);
$row=$query->fetchAll(\PDO::FETCH_ASSOC);

if (!$row){
    // ici l’utilisateur n’est pas reconnu
    $_SESSION["msg"] = "Votre login ou mot de passe est incorrect";

    } else {
    // Ici l’utilisateur a fourni les bonnes informations
    $_SESSION["login"] = 1;
    $_SESSION["msg"] ="Bienvenu M. " . $row[0]['login'];
    
    ?>
    <h3 align="left"><?php echo $_SESSION["msg"]; ?></h3>
    <?php
    }
   echo "<div class='bienvenu'></div><h2>Ma page protégée</h2><a href='index.php?fer=1'>Logout</a>";
    
}
if (isset ($_POST['fer'])){
    session_start();
session_destroy();

}
?>

</body>
</html>
