<?php
session_start();

include('./baseConnection.php');
/*$host ='localhost';
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
*/


$res =$pdo->query("Select f.name as Name,food.quantity as Quantity, f.nutriction_fact as Nutriction from Food_Definition f,Food food,User u
WHERE u.login='$_SESSION[login]'
AND u.Id_User=food.Id_User
AND food.Id_Food=f.Id_Food");
?>

<?php include ('./header.php');?>

<div id="storage"> 
	<table align="left" border="1px" style ="width:300px; line-height:30px;">
    		<tr>
        		<th colspan=3> <h2>Fridge</h2></th>
    		</tr>
    		<t>
     	   		<th>Food</th>
			<th>Nutriction Fact</th>
			<th>Quantity </th>
		</t>

	<?php
		if($row=$res->fetch()){
			do{?>
			<tr>
       				<td> <?php echo $row['Name'] ?> </td>
				<td> <?php echo $row['Nutriction'] ?> </td>
				<td> <?php echo $row['Quantity'] ?> </td>
   	 		</tr>
			<?php }	while($row=$res->fetch());
			} else{?>
			<tr>
			<td colspan=3> No food here ! Please add some food !</td>
			</tr> <?php }?>
	</table>
</div> 
<div id="add">
	<h1>Ajout d'aliments</h1>	
</div>
<?php include ('./footer.php')?>
