<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="s_inscrire.css">
    <title>Se Connecter</title>
</head>
<style>
    .form{
        width: 250px;
        height:280;
    }
    
</style>
<body>

<?php
 require('./connexion.php');
 if(isset($_POST['login_button'])){
  $_SESSION['validate']=false;
  $name=$_POST['name'];
  $password = $_POST['password'];
  $p=crud::conect()->prepare('SELECT * FROM crudtable WHERE name=:n and pass=:p');
  $p->bindValue(':n',$name);
  $p->bindValue(':p',$password);
  $p->execute();
  $d=$p->fetchAll(PDO::FETCH_ASSOC);
  if ($p->rowCount()>0){
    $_SESSION['name']=$name;
    $_SESSION['pass']=$password;
    $_SESSION['validate']=true;
    header('location:home.php');
}  else{
        echo"Assurez vous d'avoir un compte !";
    }}
?>

    <div class="form">
        <div class="title">
            <p>Se connecter</p>
        </div>
        <form action="" method="post">
            <input type="text" name="name"placeholder="Prénom">
            <input type="text" name="password"placeholder="Mot de Passe">
            <input type="submit" value="S'inscrire" name="login_button">
        </form>
    </div>
</body>
</html>