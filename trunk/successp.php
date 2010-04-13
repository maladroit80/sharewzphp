
<?php

session_start();

if(!isset($_GET['verify'])){ 
echo "<img src=error.gif>";
echo "SECURITY CODE ERROR... "; exit();
}

if($_GET['verify']!=$_SESSION['string']){ 
echo "<img src=error.gif>";
echo "SECURITY CODE ERROR... "; exit();
}





if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"]))
{

// Se incluyen los archivos necesarios

require('config.php');
require('funciones.php');

// Se sanitizan los datos de las cokies

$user=uc($_COOKIE["usNick"]);

// Se selecciona la tabla tb_users donde el usuario es el que se provee en la cookie

$sql = "SELECT * FROM tb_users WHERE username='$user'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

// Se sanitiza de nuevo la cookie

$wask = uc($_COOKIE["usNick"]);


//验证用户名是否一致

$wesk = $row['username'];

$prem = $row['account'];

if($prem!="premium")
{
echo "error"; exit();
}




// Se comprueba que el dato de la cookie sea el mismo que el de la tabla, de lo contrario se muestra error, se termina
// el script y se borra la cookie.

if("$wesk" != "$wask") {
echo "登录错误.";
exit();
}

// 得到session的密码

$wazk = uc($_COOKIE["usPass"]);

// 得到对应数据库的密码

$wezk = $row['password'];

//验证是否一致，否则报错，账户不增加金额

if(strtolower($wezk) != strtolower($wazk)) {
echo "登录错误.";
exit();
}


$usere=uc($_COOKIE["usNick"]);
$adse=limpiar($_GET["ad"]);



$querye = mysql_query("SELECT * FROM tb_ads WHERE user = '$usere' and ident= '$adse'") or die(mysql_error());
$rowe = mysql_fetch_array($querye);



$checkad = mysql_query("SELECT id FROM tb_ads WHERE id='$adse' and tipo='ads'");
$ad_exist = mysql_num_rows($checkad);

if ($ad_exist<1) {
// En caso de no existir
echo "Error no existe."; exit();
}



$time=$rowe['visitime'];

$crok1 = date(time());
$crok2 = date($time + (24 * 60 * 60));



if($crok1 >= $crok2)
{
//echo "Si la hora actual es mayor o igual a la hora en que empez� mas 24 horas, creamos las variables. Terminamos el script y damos un boton para actualizar.<br>";

$kok = uc($_COOKIE["usNick"]);
// Si ya existe una tabla solamente la editamos

$checkvisit = mysql_query("SELECT * FROM tb_ads WHERE user='$kok' and ident='$adse'");
$referer_visit = mysql_num_rows($checkvisit);

if ($referer_visit>0) {





      $sqlz = "SELECT * FROM tb_ads WHERE id='$adse'";
      $resultz = mysql_query($sqlz);        
      $myrowz = mysql_fetch_array($resultz);

//获取当前改广告的会员已点击数
$numero=$myrowz["members"];


//获取当前广告点击数上限
$jo=$myrowz["plan"];

//判断点击数是否已经满额
if ($numero >= $jo)
{
echo "<script>alert('该广告已经无效！')</script>";
exit();
}









//设置数据库，使该广告的状态为‘visit’


    $queryzx = "UPDATE tb_ads SET visitime='$crok1' WHERE user='$usere' and ident='$adse' and tipo='visit'";
    mysql_query($queryzx) or die(mysql_error());




//referals visits
      $sqlzd = "SELECT * FROM tb_users WHERE username='$kok'";
      $resultzd = mysql_query($sqlzd);        
      $myrowzd = mysql_fetch_array($resultzd);
$juaz=$myrowzd["referer"];

if ($juaz!=""){
      $sqlzde = "SELECT * FROM tb_users WHERE username='$juaz'";
      $resultzde = mysql_query($sqlzde);        
      $myrowzde = mysql_fetch_array($resultzde);
$juaze=$myrowzde["referalvisits"];
$billetes=$myrowzde["money"];

	//统计高级会员点击广告的价值
      $sqlzdu = "SELECT * FROM tb_config WHERE item='premiumreferalc' and howmany='1'";
      $resultzdu = mysql_query($sqlzdu);        
      $myrowzdu = mysql_fetch_array($resultzdu);

$elprecio=$myrowzdu["price"];

	//统计高级会员下线点击广告的价值
      $sqlexd = "UPDATE tb_users SET referalvisits='$juaze' +1, money='$billetes' +'$elprecio' WHERE username='$juaz'";
      $resultexd = mysql_query($sqlexd);
}



	//设置数据库增加改广告的广告数量
      $sqlex = "UPDATE tb_ads SET members='$numero' +1 WHERE id='$adse'";
      $resultex = mysql_query($sqlex);


//info del user


      $sqlze = "SELECT * FROM tb_users WHERE username='$usere'";
      $resultze = mysql_query($sqlze);        
      $myrowze = mysql_fetch_array($resultze);

$visitas=$myrowze["visits"];
$dinero=$myrowze["money"];


      $sqlzdu = "SELECT * FROM tb_config WHERE item='premiumclick' and howmany='1'";
      $resultzdu = mysql_query($sqlzdu);        
      $myrowzdu = mysql_fetch_array($resultzdu);

$elprecio=$myrowzdu["price"];


      $sqlexzz = "UPDATE tb_users SET visits='$visitas' +1, money='$dinero' +'$elprecio' WHERE username='$usere'";
      $resultexzz = mysql_query($sqlexzz);


}else{




      $sqlz = "SELECT * FROM tb_ads WHERE id='$adse'";
      $resultz = mysql_query($sqlz);        
      $myrowz = mysql_fetch_array($resultz);

$numero=$myrowz["members"];


// si se termino el plan terminamos el script
$jo=$myrowz["plan"];

if ($numero >= $jo)
{
echo "<script>alert('El link ya no esta disponible')</script>";
exit();
}





    //Todo parece correcto procedemos con la inserccion
    $queryzz = "INSERT INTO tb_ads (user, ip, tipo, ident, visitime) VALUES('$usere','','visit','$adse','$crok1')";
    mysql_query($queryzz) or die(mysql_error());




//referals visits
      $sqlzd = "SELECT * FROM tb_users WHERE username='$kok'";
      $resultzd = mysql_query($sqlzd);        
      $myrowzd = mysql_fetch_array($resultzd);
$juaz=$myrowzd["referer"];

if ($juaz!=""){
      $sqlzde = "SELECT * FROM tb_users WHERE username='$juaz'";
      $resultzde = mysql_query($sqlzde);        
      $myrowzde = mysql_fetch_array($resultzde);
$juaze=$myrowzde["referalvisits"];
$billetes=$myrowzde["money"];

      $sqlzdu = "SELECT * FROM tb_config WHERE item='premiumreferalc' and howmany='1'";
      $resultzdu = mysql_query($sqlzdu);        
      $myrowzdu = mysql_fetch_array($resultzdu);

$elprecio=$myrowzdu["price"];

      $sqlexd = "UPDATE tb_users SET referalvisits='$juaze' +1, money='$billetes' +'$elprecio' WHERE username='$juaz'";
      $resultexd = mysql_query($sqlexd);
}

      $sqlex = "UPDATE tb_ads SET members='$numero' +1 WHERE id='$adse'";
      $resultex = mysql_query($sqlex);




//info del user


      $sqlze = "SELECT * FROM tb_users WHERE username='$usere'";
      $resultze = mysql_query($sqlze);        
      $myrowze = mysql_fetch_array($resultze);

$visitas=$myrowze["visits"];
$dinero=$myrowze["money"];

      $sqlzdu = "SELECT * FROM tb_config WHERE item='premiumclick' and howmany='1'";
      $resultzdu = mysql_query($sqlzdu);        
      $myrowzdu = mysql_fetch_array($resultzdu);

$elprecio=$myrowzdu["price"];


      $sqlexzz = "UPDATE tb_users SET visits='$visitas' +1, money='$dinero' +'$elprecio' WHERE username='$usere'";
      $resultexzz = mysql_query($sqlexzz);


}

echo "<img src=ok.gif>";

// echo "Los datos se han isertado en la base de datos.";

}else{

$juaz= date("n/j/Y H:i:s", $crok1);
$juaze= date("n/j/Y H:i:s", $crok2);


//echo "hora actual: ".$juaz."<br>";

//echo "hora en que podras volver a visitar la pagina: ".$juaze;

echo "<img src=error.gif>";

}



}else{





}







?>