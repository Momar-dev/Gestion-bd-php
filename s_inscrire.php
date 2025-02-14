<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="s_inscrire.css">
    <title>S'inscrire</title>
</head>
<body>

    <?php
     require('./connexion.php');
     if(isset($_POST['signUp_button'])){
        $name=$_POST['name'];
        $lastName=$_POST['lastName'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confPassword=$_POST['confiPassword'];
       if(!empty($_POST['name'])&& !empty($_POST['lastName'])&& !empty($_POST['email'])&& !empty($_POST['password'])){
       if ($password==$confPassword) {
        $p=crud::conect()->prepare('INSERT INTO crudtable(name,lastName,email,pass) VALUES(:n,:1,:e,:p)');
        $p->bindValue(':n', $name);
        $p->bindValue(':1', $lastName);
        $p->bindValue(':e', $email);
        $p->bindValue(':p', $password);
        $p->execute();
        echo"Crée avec Succès";
       }else{
        echo"Les mots de passe ne correspondent pas !";
       }
       }
     }

    ?>

    <div class="form">
        <div class="title">
            <p>S'inscrire</p>
        </div>
        <form action="" method="post">
            <input type="text" name="name"placeholder="Prénom">
            <input type="text" name="lastName"placeholder="Nom">
            <input type="email" name="email"placeholder="exemple@gmail.com">
            <input type="password" name="password"placeholder="Mot de Passe">
            <input type="password" name="confiPassword"placeholder="Confirmez votre Mot de Passe">
            <input type="submit" value="S'inscrire" name="signUp_button">
        </form>
    </div>
</body>
</html>