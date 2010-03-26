<html>
<head>
<title>管理界面</title>
<link href="tablecloth/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="estilo.css" />
<link rel="stylesheet" type="text/css" href="sdmenu/sdmenu.css" />
<script type="text/javascript" src="tablecloth/tablecloth.js"></script>


<?php include('config.php')?>

<script type="text/javascript">

function setCookie (name, value, path, domain, secure, expires)
{
    document.cookie= name + "=" + escape(value) +
        ((expires) ? "; expires=" + expires.toGMTString() : "") +
        ((path) ? "; path=" + path : "") +
        ((domain) ? "; domain=" + domain : "") +
        ((secure) ? "; secure" : "");
}

function getCookie (name)
{
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1)
    {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
    }
    var end = document.cookie.indexOf(";", begin);
    if (end == -1)
    {
        end = dc.length;
    }
    return unescape(dc.substring(begin + prefix.length, end));
}

function deleteCookie (name, path, domain)
{
    if (getCookie(name))
    {
        document.cookie = name + "=" + 
            ((path) ? "; path=" + path : "") +
            ((domain) ? "; domain=" + domain : "") +
            "; expires=Thu, 01-Jan-70 00:00:01 GMT";
    }
}


function addLoadEvent (func)
{    
    var oldonload = window.onload;
    if (typeof window.onload != 'function')
    {
        window.onload = func;
    } 
    else 
    {
        window.onload = function()
        {
            oldonload();
            func();
        }
    }
}

</script>

<script type="text/javascript">

function menu_init ()
{
	var menu = document.getElementById('nav');
	var subs = menu.childNodes;
	
	var j = 0;
	
	for (var i=0 ; subs[i]; i++)
	{
		if (subs[i].tagName=='LI')
		{
			hs = subs[i].getElementsByTagName('B');
			heading = hs[0];
			ss = subs[i].getElementsByTagName('UL');
			submenu = ss[0];
			
			j++;
			
			heading.onclick = function () { menu_toggle(this); };

			if (getCookie('menu'+j)=='1')
				 submenu.style.display = 'block';
			else if (getCookie('menu'+j)=='0')
				submenu.style.display = 'none';
			else if (j==1)
				submenu.style.display = 'block';
			else
				submenu.style.display = 'none';
		}
	}
}

function menu_toggle (heading)
{
	var section = heading.parentNode;
	var submenus = section.getElementsByTagName('UL');
	var submenu = submenus[0];
		
	if (submenu.style.display=='none')
		submenu.style.display = 'block';
	else
		submenu.style.display = 'none';
		
	var j = 0;

	var menu = document.getElementById('nav');
	var subs = menu.childNodes;
	for (var i=0 ; subs[i]; i++)
	{
		if (subs[i].tagName=='LI')
		{
			hs = subs[i].getElementsByTagName('B');
			h = hs[0];			
			j++;
			
			if (h==heading && submenu.style.display=='none')
				setCookie('menu'+j, '0', '/');
			else if (h==heading)
				setCookie('menu'+j, '1', '/');
		}
	}
		

}

addLoadEvent(menu_init);

</script>

<!--[if IE 6]>
<script type="text/javascript">
// Suckerfish-like code to get B:hover working in IE 6.
function sucker_bold ()
{
	bs = document.getElementById("nav").getElementsByTagName('B');
	for (i=0; bs[i]; i++)
	{
		node = bs[i];
		node.onmouseover=function() { this.className+=" over"; }
		node.onmouseout=function() { this.className=this.className.replace(" over", ""); }
	}
}
addLoadEvent(sucker_bold);
</script>
<![endif]-->



















<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<script type="text/javascript" src="wz_tooltip.js"></script>
<?php include('start.php'); ?>




<!---------------------------- MENU ------------------------------->
<div id="framecontent">
<div class="innertube">
<?php include('menu.php'); ?>
</div>
</div>
<!---------------------------- FIN MENU --------------------------->



<div id="maincontent">
<div class="innertube">
<!---------------------------- CUERPO ----------------------------->


						<!--- op 1 -->
<?php
$op = $_GET["op"];
switch($op) {
	case(1):
?>

<?php include('adreq.php'); ?>


						<!--- op 2 -->
<?php
break;
	case (2):
?>

<?php include('editads.php'); ?>


						<!--- op 3 -->
<?php
break;
	case (3):
?>

<?php include('messages.php'); ?>

						<!--- op 4 -->
<?php
break;
	case (4):
?>

<?php include('payreq.php'); ?>


						<!--- op 5 -->
<?php
break;
	case (5):
?>

<?php include('buyref.php'); ?>





						<!--- op 6 -->

<?php
      break;
    case (6):
?>

<?php include('refreq.php'); ?>

						<!--- op 7 -->

<?php
break;
	case (7):
?>

<?php include('editusers.php'); ?>


						<!--- op 8 -->

<?php
break;
	case (8):
?>

<?php 
//include('prueba.php'); 
?>
						<!--- op 9 -->

<?php
break;
	case (9):
?>

<?php include('configsite.php'); ?>

						<!--- op 10 -->

<?php
break;
	case(10):
?>

<?php include('aproveadreq.php'); ?>

						<!--- op 11 -->
<?php
break;
	case(11):
?>

<?php include('aproveupgreq.php'); ?>

						
						<!--- op 12 -->
<?php
break;
	case(12):
?>

<?php include('emails.php'); ?>


						<!--- op 13 -->

<?php 
break;
	case("13"):
?>

<?php include('cleanads.php'); ?>


						<!--- op 24 -->

<?php
break;
	case(24):
?>

<?php include('addcat.php'); ?>


						<!--- op 25 -->

<?php
break;
	case(25):
?>

<?php include('modifycat.php'); ?>




						<!--- op 26 -->

<?php
break;
	case(26):
?>

<?php include('addrefset.php'); ?>


						<!--- op 27 -->

<?php
break;
	case(27):
?>

<?php include('modrefset.php'); ?>


						<!--- op 28 -->

<?php
break;
	case(28):
?>

<?php include('addads.php'); ?>



						<!--- op 29 -->

<?php
break;
	case(29):
?>

<?php include('searchusers.php'); ?>



						<!--- op 30 -->

<?php
break;
	case(30):
?>

<?php include('searchip.php'); ?>

						<!--- op 31 -->

<?php
break;
	case(31):
?>

<?php include('listpremiums.php'); ?>




                    <!--- op 32 -->
<?php
break;
	case(32):
?>

<?php include('addsignupads.php'); ?>



                   <!--- op 33 -->
<?php
break;
	case(33):
?>

<?php include('signuprequest.php'); ?>


                   <!--- op 34 -->
<?php
break;
	case(34):
?>

<?php include('editsignupads.php'); ?>
                    <!--- op 35 -->
<?php
break;
	case(35):
?>

<?php include('signupbonous.php'); ?>

  <!--- op 36 -->
<?php
break;
	case(36):
?>

<?php include('inactive.php'); ?>
  <!--- op 37 -->
<?php
break;
	case(37):
?>

<?php include('signuprecords.php'); ?>

<?php
break;
	case(38):
?>

<?php include('serchclickrecords.php'); ?>

<?php
break;
	case(39):
?>

<?php include('searchreferral.php'); ?>

<?php
break;
	case(40):
?>

<?php include('clickcheat.php'); ?>

<?php
break;
	case(41):
?>

<?php include('cheatconfig.php'); ?>
<?php
break;
    case(42):
?>
<?php include('addnews.php'); ?>
<?php
break;
    case(43):
?>
<?php include('editnews.php'); ?>
<?php
break;
    case(44):
?>
<?php include('deletenews.php'); 
   break;
    case(45):
   	include("editback.php");
   	break;
    case(46):
   	include("linkmanage.php");
   	break;
   case(55):
   	include("addbacksite.php");
   	break;
    case(56):
   	include("editbacksite.php");
   	break;
    case(57):
   	include("editpayproof.php");
   	break;
    case(571):
   	include("addpayproof.php");
   	break;
    case(572):
   	include("payproof.php");
   	break;
    case(58):
   	include("applyback.php");
   	break;
    case(59):
   	include("backsitelist.php");
   	break;
    case(591):
   	include("calcback.php");
   	break;
    case(592):
   	include("calcprocess.php");
   	break;
    case(60):
   	include("payback.php");
   	break;
    case(61):
   	include("memberbacksite.php");
   	break;
    case(611):
   	include("viewbacksite.php");
   	break;
    case(62):
   	include("editbackaccount.php");
   	break;
   	




}
?>














<!---------------------------- FIN CUERPO ------------------------->
</div>
</div>







</body>
</html>