<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="table.css">
    <title>Document</title>
</head>
<body>


<table>
    <thead>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Password</th>
            <th>Supprimer</th>
            <th>Modifier</th>
        </tr>
    </thead>
    <tbody>
        

<?php
require('./connexion.php');
$p=crud::Selectdata();
if (isset($_GET['id'])){
$id=$_GET['id'];
$e=crud::delete($id);
}
if(count( $p)>0){
    for($i=0; $i <count( $p); $i++){
        echo'<tr>';
         foreach( $p[$i] as $key => $value ) {
                    if ($key!='id'){
                        echo'<td>'.$value. '</td>';
                    }
                }
                ?>

<td><a href="users.php?id=<?php echo $p[$i]['id']?>"><img src="trash-alt-svgrepo-com.svg" alt=""></a></td>
<td><a href="upDate.php"><img src="edit-3-svgrepo-com.svg" alt=""></a></td>



<?php
                echo'</tr>';
            }
        }
?>


</tbody>
</table>




</body>
</html>