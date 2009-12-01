<tr>
<td bgcolor="<?=$highlight?>">


<?php
require('config.php');
$sqle = "SELECT * FROM tb_ads WHERE user='$last' and ident='$id'";
$resulte = mysql_query($sqle);        
$myrow = mysql_fetch_array($resulte);
mysql_close($con);


$time=$myrow['visitime'];

$crok1 = date(time());
$crok2 = date($time + (24 * 60 * 60));



if($crok1 >= $crok2)

{ 

?><?php echo $bold?><a href="view.php?ad=<?php echo $id?>" target="_blank"><?php echo $description?></a><?php echo $boldc?><?php



 } else { ?><del><?php echo$description?><del><?php }


?>


</td>
<tD bgcolor="<?php echo $highlight?>">
<?php echo $members?> 	 	

</td>
<td bgcolor="<?php echo $highlight?>">

<?php echo $outside?>

</td>
<td bgcolor="<?php echo $highlight?>">

<?php echo $total?>

</td>
</tr>

