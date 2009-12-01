<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<b>添加广告种类</b><br>
<br>

<?php include('config.php')?>
<?

$catname = $_POST["catname"];
$id=$_POST["id"];


if($catname==NULL) {
}else{


// sanitizamos las variables



$catname=limitatexto($catname,50);










$query = "INSERT INTO tb_ads_categories (id, catname) VALUES('$id', '$catname')";
mysql_query($query) or die(mysql_error());

echo "分类被添加..";


}




?>

<form action="index.php?op=24" method="POST">

<table><tr>
  <th width="150">分类号:</th>
<td><input type="text" size="25" maxlength="3" name="id" autocomplete="off"></td></tr>
<tr>
  <th width="150">分类名称:</th>
<td><input type="text" size="25" maxlength="50" name="catname" autocomplete="off"></td></tr>
<tr><td></td><td>
<input type="submit" value="添加分类" class="button"></td></tr></table>

</form>