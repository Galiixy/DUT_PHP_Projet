<?php
session_start();

#include['maquette/baseConnection.php'];
$host ='localhost';
$db ='galiixy';
$user='galiixy';
$pass='Jobslpxi';
$charset='utf8mb4';

$dsn ="mysql:host=$host;dbname=$db;charset=$charset";
$options = [
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES =>false,
];
try {
	$pdo = new PDO($dsn,$user,$pass,$options);
} catch(\PDOException $e){
	throw new \PDOException($e->getMessage(),(int)$e->getCode());
}



$res =$pdo->query("Select f.name as Name, f.nutriction_fact as Nutriction from Food_Definition f,Food food,User u
WHERE u.login='$_SESSION[login]'
AND u.Id_User=food.Id_User
AND food.Id_Food=f.Id_Food");
?>

<?php include ['header.php'];?>

<table align="center" border="1px" style ="width:300px; line-height:30px;">
    <tr>
        <th> <h2>Fridge</h2></th>
    </tr>
    <t>
        <th>Food</th>
        <th>Nutriction Fact</th>
    </t>

<?php
if(isset($row)) {
	while($row=$res->fetch())
    {?>
    <tr>
        <td> <?php echo $row['Name'] ?> </td>
        <td> <?php echo $row['Nuctriction'] ?> </td>
    </tr>
<?php  }
}
else{ ?>
<tr> 
	<td> aucune nourriture ajouté </td> 
</tr> 

<?php

}


?>


</table>
<?php include ['footer.php']?>
