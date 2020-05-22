<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<!-- Bootstrap Core CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
class DateLib {
function MadeDay($arg1){
 $made_on = date_parse($arg1);

$made1=$made_on["day"];
$made2=$made_on["month"];
$made3=$made_on["year"]+543;
 

$ret = "";

if($made_on["month"]==1){
        $ref='มกราคม';
		$made2=01;
}else if ($made_on["month"]==2){
	  $ref='กุมภาพันธ์';
	  $made2=02;
}else if ($made_on["month"]==3){
	  $ref='มีนาคม';
	  $made2=03;
}else if ($made_on["month"]==4){
	  $ref='เมนายน';
	  $made2=04;
}else if ($made_on["month"]==5){
	  $ref='พฤษภาคม';
	  $made2=05;
}else if ($made_on["month"]==6){
	  $ref='มิถุนายน';
	  $made2=06;
}else if ($made_on["month"]==7){
	  $ref='กรกฏาคม';
	  $made2=07;
}else if ($made_on["month"]==8){
	  $ref='สิงหาคม';
	  $made2=08;
}else if ($made_on["month"]==9){
	  $ref='กันยายน';
	  $made2=09;
}else if ($made_on["month"]==10){
	  $ref='ตุลาคม';
	  $made2=10;
}else if ($made_on["month"]==11){
	  $ref='พฤศจิกายน';
	  $made2=11;
}else if ($made_on["month"]==12){
	  $ref='ธันวาคม';
	  $made2=12;
}

$ref1 = "".$made1." ".$ref." ".$made3." ";

return $ref1;
}//end func
function MadeDay2($arg1){
 $made_on = date_parse($arg1);

$made2=$made_on["month"];

 

$ret = "";

if($made_on["month"]==1){
        $ref='มกราคม';
		$made2=01;
}else if ($made_on["month"]==2){
	  $ref='กุมภาพันธ์';
	  $made2=02;
}else if ($made_on["month"]==3){
	  $ref='มีนาคม';
	  $made2=03;
}else if ($made_on["month"]==4){
	  $ref='เมนายน';
	  $made2=04;
}else if ($made_on["month"]==5){
	  $ref='พฤษภาคม';
	  $made2=05;
}else if ($made_on["month"]==6){
	  $ref='มิถุนายน';
	  $made2=06;
}else if ($made_on["month"]==7){
	  $ref='กรกฏาคม';
	  $made2=07;
}else if ($made_on["month"]==8){
	  $ref='สิงหาคม';
	  $made2=08;
}else if ($made_on["month"]==9){
	  $ref='กันยายน';
	  $made2=09;
}else if ($made_on["month"]==10){
	  $ref='ตุลาคม';
	  $made2=10;
}else if ($made_on["month"]==11){
	  $ref='พฤศจิกายน';
	  $made2=11;
}else if ($made_on["month"]==12){
	  $ref='ธันวาคม';
	  $made2=12;
}

$ref1 = "".$ref."";

return $ref1;
}//end func
}//end class

?>
</body>
</html>