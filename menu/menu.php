<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
<!-- Beginning of compulsory code below -->

<link href="css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/dropdown/themes/mtv.com/default.ultimate.css" media="screen" rel="stylesheet" type="text/css" />

<!-- / END -->
      
</head>


<body>

			 

<!-- Beginning of compulsory code below -->

<ul id="nav" class="dropdown dropdown-horizontal">
<!-- -->
<li id="n-home"><a href="?option=main"><img src='iconset/house.png' border='0'>หน้าหลัก</a></li>
<!-- -->
<li id="n-home"><a href="?option=report_lrall_month"><img src='iconset/market_report.png' border='0'>แสดงรายงาน</a><ul>
 
</li>
</ul></li> 
 

<? if($_SESSION["sess_code"]=='10022'){ ?>
<li id="n-shows"><a href="?option=add_user" class="dir"><img src='iconset/market_report.png' border='0'>จัดการผู้ใช้งาน</a></li> 
<? } ?>
<!-- -->
<? if($_SESSION["sess_code"]!='10022'){ ?>
<li id="n-shows"><a href="?option=chkpass" class="dir"><img src='iconset/market_report.png' border='0'>เปลี่ยนรหัสผ่าน</a></li> 
<? } ?>
<li id="n-shows"><a href="log_out.php" class="dir"><img src='iconset/market_report.png' border='0'>ออกจากระบบ</a></li> 




</ul>

<!-- / END -->
 
</body>

</html>

 		 