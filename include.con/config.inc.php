<?
//HI
 $host2="10.0.0.6";
$users2="user";
$pw2="123456";
$dbname2="hi";
$db_port ="3306"; 
$mysqli_hi=new mysqli("$host2","$users2","$pw2","$dbname2",$db_port);
$mysqli_hi->set_charset("utf8");

if (!$mysqli_hi) {
	echo "<H3>ไม่สามารถติดต่อฐานข้อมูลได้</H3>";
	exit();
} 
 	 function add_date($givendate,$day=0,$mth=0,$yr=0) {
													$cd = strtotime($givendate);
													$newdate = date('Y-m-d h:i:s', mktime(date('h',$cd),
													date('i',$cd), date('s',$cd), date('m',$cd)+$mth,
													date('d',$cd)+$day, date('Y',$cd)+$yr));
													return $newdate;
												 }

 if($_SESSION[status]=='1'){

 $n_status="ผู้ดูแลระบบ";

 }

$title="..:::  ตรวจสอบความถูกต้อง ข้อมูลผู้มารับบริการ จากฐานข้อมูล HI MYSQL   :::..";
$footer="พัฒนาโดย<br>
นายเฉลิมพล ศรีคำ นักวิชาการคอมพิวเตอร์ โรงพยาบาลศรีเมืองใหม่";
$credit="<BR><div align='center'><b>PHP Version 5.3.10/Mysqli Support/MySQL V. 5.5.35</b></div>";

?>
