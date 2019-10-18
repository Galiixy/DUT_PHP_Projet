<?php
session_start();

include['maquette/baseConnection.php'];

 
?>

<?php include ['maquette/header.php'];?>

<table align="center" border="1px" style ="width:300px; line-height:30px;">
    <tr>
        <th> <h2>Fridge</h2></th>
    </tr>
    <t>
        <th>Food</th>
        <th>Nutriction Fact</th>
    </t>

<?php
    while($row=$res->fetch())
    {
    <tr>
        <td> <?php echo $row['Name'] ?> </td>
        <td> <?php echo $row['Nuctriction'] ?> </td>
    </tr>
    }


?>


</table>
<?php include ['maquette/footer.php']?>