<? include('header.php'); ?>
<h3 class="pagetitle">
<img border="0" src="images/history.jpg" width="74" height="65" align="absmiddle" >你的历史</h3>
<br>
<b>付款检查中:</b> 当你申请付款后我们会检查你的账户来确认你有没有遵守条款。<br>
<b>付款已发送:</b> 你的付款申请已经通过付款方式发送.
<br>
<br>
<div id="tables">
<table align="center" width="80%" cellpadding="0">
<tr>
<th class="top"><b>
日期
</b></th>
<th class="top"><b>
金额(元)
</b></th>
<th class="top"><b>
方式
</b></th>
<th class="top"><b>
状态
</b></th>
</tr>


<?

$lole=$_COOKIE["usNick"];
require('config.php');

$tabla = mysql_query("SELECT * FROM tb_payme where username='$lole' ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($row = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen




echo "<tr><td align='left'>";

echo "&nbsp;";

echo "</td><td align='left'>";

echo $row["money"];

echo "</td><td align='left'>";

echo "支付宝";

echo "</td><td align='left'>";

echo "审核中";

echo "</td></tr>";

}






$lole=$_COOKIE["usNick"];

$tabla = mysql_query("SELECT * FROM tb_history where user='$lole' ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($row = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen

echo "<tr><td align='left'>";

echo $row["date"];

echo "</td><td align='left'>";

echo $row["amount"];

echo "</td><td align='left'>";

echo "支付宝";

echo "</td><td align='left'>";

echo "已发送";

echo "</td></tr>";

}

echo "</table>";

?>
</div>







		<!--footer starts here-->
<? include('footer.php'); ?>