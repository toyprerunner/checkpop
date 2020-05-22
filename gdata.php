<? ob_start();?>
<head>
<!-- Bootstrap Core CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css" />

</head>
<?php   
set_time_limit(0);
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false); 
$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];
$starttime = $mtime;
include "include.con/config.inc.php";
include 'include.con/Datelibrary.php'; 

$Dlib = new DateLib();
echo "<div align='center'><font size='+2'  face='verdana'><b>".$Dlib->MadeDay(date('Y-m-d')) ." &nbsp;[".date("H:i:s", mktime(date("H")-1, date("i")+0, date("s")+0, date("m")+0  , date("d")+0, date("Y")+0))."]&nbsp;&nbsp;</b></font></div>";	


$SQLdebt22="SELECT 
hn,
pop_id,
COUNT(pop_id) as cpop
FROM
pt
 where pop_id != 9999999999994 and pop_id != 1111111111119
GROUP BY pop_id
HAVING cpop >1  ORDER BY ldate desc   limit 0,6";
$sqlquerydebt22=$mysqli_hi->query($SQLdebt22);
$addnumdebt22=$sqlquerydebt22->num_rows;
$SQLdebt22_num="SELECT 
hn,
pop_id,
COUNT(pop_id) as cpop
FROM
pt
 where pop_id != 9999999999994 and pop_id != 1111111111119
GROUP BY pop_id
HAVING cpop >1  ORDER BY ldate desc";
$sqlquerydebt22_num=$mysqli_hi->query($SQLdebt22_num);
$addnumdebt22_num=$sqlquerydebt22_num->num_rows;


$SQLdebt23="SELECT 
hn,
pop_id,
ldate
FROM
pt
 where LENGTH(pop_id)!='13'
 ORDER BY ldate desc LIMIT 0,10";
$sqlquerydebt23=$mysqli_hi->query($SQLdebt23);
$addnumdebt23=$sqlquerydebt23->num_rows;
$SQLdebt23_num="SELECT 
hn,
pop_id,
ldate
FROM
pt
 where LENGTH(pop_id)!='13'
 ORDER BY ldate desc";
$sqlquerydebt23_num=$mysqli_hi->query($SQLdebt23_num);
$addnumdebt23_num=$sqlquerydebt23_num->num_rows;

$SQLdebt24="SELECT 
hn,
pop_id,
ldate,brthdate
FROM
pt
 where brthdate is NULL
 ORDER BY ldate desc  LIMIT 0,10";
$sqlquerydebt24=$mysqli_hi->query($SQLdebt24);
$addnumdebt24=$sqlquerydebt24->num_rows;
$SQLdebt24_num="SELECT 
hn,
pop_id,
ldate,brthdate
FROM
pt
 where brthdate is NULL
 ORDER BY ldate desc";
$sqlquerydebt24_num=$mysqli_hi->query($SQLdebt24_num);
$addnumdebt24_num=$sqlquerydebt24_num->num_rows;

$SQLdebt25="SELECT 
hn,
pop_id,
COUNT(pop_id) as cpop
FROM
pt
 where pop_id ='1111111111119'
GROUP BY pop_id
HAVING cpop >1  ORDER BY ldate desc  ";
$sqlquerydebt25=$mysqli_hi->query($SQLdebt25);
$addnumdebt25=$sqlquerydebt25->num_rows;
$SQLdebt256="SELECT COUNT(pop_id) as cpop FROM pt  where pop_id ='1111111111119'";
$sqlquerydebt256=$mysqli_hi->query($SQLdebt256);
$addnumdebt256=$sqlquerydebt256->num_rows;
$rsdebt2256=$sqlquerydebt256->fetch_assoc();

$SQLdebt23_ntn="SELECT
pt.hn,
pt.fname,
pt.lname,
pt.brthdate,
pt.male,
pt.ctzshp,
pt.ntnlty,
pt.ldate,
pt.pop_id,
pt.register,
pttype.namepttype as namepttype 
FROM
pt
INNER JOIN pttype ON pttype.pttype = pt.pttype
where (pt.ntnlty='' or pt.ctzshp='')
GROUP BY pt.hn
ORDER BY ldate desc
LIMIT 0,20";
$sqlquerydebt23_ntn=$mysqli_hi->query($SQLdebt23_ntn);
$addnumdebt23_ntn=$sqlquerydebt23_ntn->num_rows;
if($addnumdebt22<1 AND $addnumdebt23<1 AND $addnumdebt24<1 AND $addnumdebt25<1 AND $addnumdebt256<1){
echo "<div align=center><font><BR><BR><h1><img src=images/goodday.png><BR>ไม่พบความผิดพลาดของข้อมูลประชากร</h1></font></div>";
}


if($addnumdebt22>=1){

?>
<font size='2'>
<table width="101%" class="table table-bordered">
             	<? if($addnumdebt22>0){?>  
					<tr valign="top" >
                    <td colspan="11">
                    <DIV align=left><strong><img src="images/right-wrong-check-marks.png"   />ตรวจสอบการลงทะเบียน Real-Time</strong>   </DIV>    </td>
                    </tr>
<?}?> 
    <tr> 
	<? if($addnumdebt22>0){?>
	<?
	//<?=$Dlib->MadeDay($rs[date_up]) 
	//echo date("Y-m-d H:i:s", mktime(date("H"), date("i")+0, date("s")+0, date("m")+0  , date("d")+0, date("Y")+0))."<br>";
 echo "<BR><div align='center'><font color='red' size='+3'>พบเลขที่บัตรประชาชนซ้ำ Hi MYSQL จำนวน&nbsp;&nbsp;".$addnumdebt22_num."&nbsp;&nbsp;กลุ่ม</font></div>";
 echo "<BR><div align='center'><font color='#0718ba' size='+2'>แสดงเลขที่บัตรประชาชนซ้ำ Hi MYSQL ล่าสุดจำนวน&nbsp;&nbsp;".$addnumdebt22."&nbsp;&nbsp;กลุ่ม</font></div>";
 
}else{
	//<?=$Dlib->MadeDay($rs[date_up]) 
	//echo date("Y-m-d H:i:s", mktime(date("H"), date("i")+0, date("s")+0, date("m")+0  , date("d")+0, date("Y")+0))."<br>";
 echo "<BR><div align='center'><font color='red' size='+3'>ไม่พบเลขที่บัตรประชาชนซ้ำใน  Hi MYSQL </font></div> ";
 
}?>    

</td>


                    </tr> <? if($addnumdebt22>0){?>
					<tr>
                    <td><div align="center"><strong>HN</strong></div></td>
                    <td><div align="center"><strong>เลขบัตร</strong></div></td>
                      <td><div align="center"><strong>ชื่อ-สกุล</strong></div></td>
                        <td><div align="center"><strong>วันเกิด</strong></div></td>
                          <td><div align="center"><strong>มาครั้งแรก</strong></div></td>
                            <td><div align="center"><strong>มาครั้งล่าสุด</strong></div></td>
                              <td><div align="center"><strong>ผู้ลงทะเบียน</strong></div></td> 
                  </tr>
				  <?
	
while($rsdebt22=$sqlquerydebt22->fetch_assoc()){	$i_table++;
if($i_table%2==0)
{
$bg ="#FFFFCC";
//f1eaae
}
else
{
$bg ="#D0FFB0";
}
 $SQLdebt="SELECT  *   FROM  pt   where pt.pop_id='$rsdebt22[pop_id]'"; 
$sqlquerydebt=$mysqli_hi->query($SQLdebt);
$addnumdebt=$sqlquerydebt->num_rows;
	
while($rsdebt=$sqlquerydebt->fetch_assoc()){



	?>
                                    <tr>
                    <td><span class="label label-warning"><?=$rsdebt[hn]?></span></td>
                    <td><strong><?=$rsdebt[pop_id]?></strong></td>
					                        <td><strong><?=$rsdebt[fname]?>&nbsp;&nbsp;<?=$rsdebt[lname]?></strong></td>
                      <td><strong><?=$Dlib->MadeDay($rsdebt[brthdate])?></strong></td>

                          <td><strong><?=$Dlib->MadeDay($rsdebt[fdate])?></strong></td>
                            <td><strong><?=$Dlib->MadeDay($rsdebt[ldate])?></strong></td>
                              <td><span class="label label-success"><? if(empty($rsdebt[register])){echo "ข้อมูลจากฐานข้อมูล HI เวอร์ชั่นเก่า";}else{ echo $rsdebt[register];}?></span>
<?
 $SQLdebt2="SELECT *  from opstaff where staff ='$rsdebt[register]'";
$sqlquerydebt2=$mysqli_hi->query($SQLdebt2);
$rsdebt2=$sqlquerydebt2->fetch_assoc();	
echo "".$rsdebt2[fname]."&nbsp;&nbsp;".$rsdebt2[lname].""; 


//INsert Num พบเลขบัตรประชาชนซ้ำ
$ec=date('00-m-Y');
$dchk=date('d-m-Y');
if($ec==$dchk){ 

$chkdate1=date('Y-m-d H:i:s');
 $SQLdebt2_popchk1ck="select * from `report` where `hn`='$rsdebt[hn]' and `regis`='$rsdebt[register]'";
$sqlquerydebt2_popchk1ck=$mysqli->query($SQLdebt2_popchk1ck);
$popchk1cknum=$sqlquerydebt2_popchk1ck->num_rows;
 
if($popchk1cknum<1){
 $SQLdebt2_popchk1="INSERT INTO `report` (`id` ,`id2` ,`status` ,`checkdate` ,`hn` ,`regis` ,`edit_stat`)VALUES (NULL ,  '$rsdebt[pop_id]',  '1',  '$chkdate1',  '$rsdebt[hn]',  '$rsdebt[register]',  '0')";
 $sqlquerydebt2_popchk1=$mysqli->query($SQLdebt2_popchk1);
}
 
}//if

 

?></td>
                  </tr>         
 <? } } ?> 
 </table>
</font>
<?
 
}
}//IF1
  
if($addnumdebt23>=1){

?>
<font size='2'>
<table width="101%" class="table table-bordered">
	<? if($addnumdebt23>0){?>  
		<tr valign="top" >
			<td colspan="11">
				<DIV align=left><strong><img src="images/right-wrong-check-marks.png"   />ตรวจสอบการลงทะเบียนเลขที่บัตรประชาชนไม่ครบ 13 หลัก Real-Time</strong>   </DIV>    </td>
  </tr>
<?}?> 
    <tr> 
	<? if($addnumdebt23>0){?>
	<?
	//<?=$Dlib->MadeDay($rs[date_up]) 
	//echo date("Y-m-d H:i:s", mktime(date("H"), date("i")+0, date("s")+0, date("m")+0  , date("d")+0, date("Y")+0))."<br>";
 echo "<hr><BR><div align='center'><font color='red' size='+3'>พบเลขที่บัตรประชาชนไม่ครบ 13 หลัก Hi MYSQL ทั้งหมดจำนวน&nbsp;&nbsp;".$addnumdebt23_num."&nbsp;&nbsp;ราย</font></div>
 
 
 
 ";
 echo "<BR><div align='center'><font color='#0718ba' size='+2'>แสดงเลขบัตรประชาชนไม่ครบ 13 หลัก Hi MYSQL  จำนวนล่าสุด&nbsp;&nbsp;".$addnumdebt23."&nbsp;&nbsp;ราย</font></div>";


}else{
	//<?=$Dlib->MadeDay($rs[date_up]) 
	//echo date("Y-m-d H:i:s", mktime(date("H"), date("i")+0, date("s")+0, date("m")+0  , date("d")+0, date("Y")+0))."<br>";
 echo "<BR><div align='center'><font color='red' size='+3'>ไม่พบเลขที่บัตรประชาชนไม่ครบ 13 หลัก  Hi MYSQL </font></div> ";
 
}?>    

</td>


  </tr> <? if($addnumdebt23>0){?>
					<tr>
                    <td><div align="center"  ><strong>HN</strong></div></td>
                    <td><div align="center" ><strong>เลขบัตร</strong></div></td>
                     <td><div align="center" ><strong>ชื่อ-สกุล</strong></div></td>
                     <td><div align="center" ><strong>วันเกิด</strong></div></td>
                     <td><div align="center" ><strong>มาครั้งแรก</strong></div></td>
                     <td><div align="center" ><strong>มาครั้งล่าสุด</strong></div></td>
                     <td><div align="center" ><strong>ผู้ลงทะเบียน</strong></div></td> 
                  </tr>
				  <?
	
while($rsdebt23=$sqlquerydebt23->fetch_assoc()){	$i_table++;
if($i_table%2==0)
{
$bg1 ="#FFFFCC";
//f1eaae
}
else
{
$bg1 ="#D0FFB0";
}


 $SQLdebt2="SELECT  *   FROM  pt   where pt.pop_id='$rsdebt23[pop_id]'"; 
$sqlquerydebt2=$mysqli_hi->query($SQLdebt2);
$addnumdebt2=$sqlquerydebt2->num_rows;
$rsdebt2=$sqlquerydebt2->fetch_assoc();
 

	?>
  <tr>
                    <td><span class="label label-warning"><?=$rsdebt2[hn]?></span></td>
                    <td><strong><?=$rsdebt2[pop_id]?></strong></td>
					                        <td><strong><?=$rsdebt2[fname]?>&nbsp;&nbsp;<?=$rsdebt2[lname]?></strong></td>
                      <td><strong><?=$Dlib->MadeDay($rsdebt2[brthdate])?></strong></td>

                          <td><strong><?=$Dlib->MadeDay($rsdebt2[fdate])?></strong></td>
                            <td><strong><?=$Dlib->MadeDay($rsdebt2[ldate])?></strong></td>
                              <td><span class="label label-success"><?=$rsdebt2[register]?></span>
<?
 $SQLdebt223="SELECT *  from opstaff where staff ='$rsdebt2[register]'";
$sqlquerydebt223=$mysqli_hi->query($SQLdebt223);
$rsdebt223=$sqlquerydebt223->fetch_assoc();	
echo "".$rsdebt223[fname]."&nbsp;&nbsp;".$rsdebt223[lname].""; 

//INsert Num พบเลขบัตรประชาชนไม่ครบ 13 หลัก
$ec1=date('01-m-Y');
$dchk1=date('d-m-Y');
if($ec1==$dchk1){ 

$chkdate2=date('Y-m-d H:i:s');

 $SQLdebt2_popchk2ck="select * from `report` where `hn`='$rsdebt2[hn]' and `regis`='$rsdebt2[register]'";
$sqlquerydebt2_popchk2ck=$mysqli->query($SQLdebt2_popchk2ck);
$popchk1cknum=$sqlquerydebt2_popchk2ck->num_rows;
 
if($popchk2cknum<1){
$SQLdebt2_popchk2="INSERT INTO `report` (`id` ,`id2` ,`status` ,`checkdate` ,`hn` ,`regis` ,`edit_stat`)VALUES (NULL ,  '$rsdebt2[pop_id]',  '2',  '$chkdate2',  '$rsdebt2[hn]',  '$rsdebt2[register]',  '0')";
$sqlquerydebt2_popchk2=$mysqli->query($SQLdebt2_popchk2);
}
}

?></strong></td>
                  </tr>    
				  

 <? } ?> 
          
              
</table>
</font>
<?
 
}
}//IF2
//111111111111111111111111111111111111111111111111111 ตรวจสอบพบไม่ระบุเชื่อชาติ

if($addnumdebt23_ntn>=1){

?>       
<font size='2'>               
<table class="table table-bordered">
             	<? if($addnumdebt23_ntn>0){?>  
					<tr valign="top" >
                    <td colspan="11">
                    <DIV align=left ><strong><img src="images/right-wrong-check-marks.png"   />ตรวจสอบพบไม่ระบุเชื่อชาติ หรือ สัญชาติ Real-Time</strong>   </DIV>    </td>
                    </tr>
<?}?> 
    <tr> 
	<? if($addnumdebt23_ntn>0){?>
	<?
	//<?=$Dlib->MadeDay($rs[date_up]) 
	//echo date("Y-m-d H:i:s", mktime(date("H"), date("i")+0, date("s")+0, date("m")+0  , date("d")+0, date("Y")+0))."<br>";
// echo "<hr><BR><div align='center'><font color='red' size='+3'>ตรวจสอบพบไม่ระบุเชื่อชาติ หรือ สัญชาติ ทั้งหมดจำนวน&nbsp;&nbsp;".$addnumdebt23_num."&nbsp;&nbsp;ราย</font></div> ";
 echo "<BR><div align='center'><font color='#0718ba' size='+2'>พบ!! ไม่ระบุเชื่อชาติ หรือ สัญชาติจำนวน &nbsp;&nbsp;".$addnumdebt23_ntn."&nbsp;&nbsp;ราย</font></div>";


}else{
	//<?=$Dlib->MadeDay($rs[date_up]) 
	//echo date("Y-m-d H:i:s", mktime(date("H"), date("i")+0, date("s")+0, date("m")+0  , date("d")+0, date("Y")+0))."<br>";
 echo "<BR><div align='center'><font color='red' size='+3'>ไม่พบข้อมูลเชื้อชาติ หรือ สัญชาติ ที่ผิดพลาด</font></div> ";
 
}?>    

</td>


                    </tr> <? if($addnumdebt23_ntn>0){?>
					<tr>
                    <td><div align="center"  ><strong>HN</strong></div></td>
                    <td><div align="center" ><strong>เลขบัตร</strong></div></td>
                     <td><div align="center" ><strong>ชื่อ-สกุล</strong></div></td>
                     <td><div align="center" ><strong>วันเกิด</strong></div></td>
					                      <td><div align="center" ><strong>เชื้อชาติ</strong></div></td>
										                       <td><div align="center" ><strong>สัญชาติ</strong></div></td>
                     <td><div align="center" ><strong>มาครั้งแรก</strong></div></td>
                     <td><div align="center" ><strong>มาครั้งล่าสุด</strong></div></td>
                     <td><div align="center" ><strong>สิทธิการรักษา</strong></div></td>
					 
                     <td><div align="center" ><strong>ผู้ลงทะเบียน</strong></div></td> 
                  </tr>
				  <?
	
while($rsdebt23_ntn=$sqlquerydebt23_ntn->fetch_assoc()){	$i_table++;
if($i_table%2==0)
{
$bg1 ="#FFFFCC";
//f1eaae
}
else
{
$bg1 ="#D0FFB0";
}


 $SQLdebt2_ntn2="SELECT  *   FROM  pt   INNER JOIN pttype ON pttype.pttype = pt.pttype  where pt.hn='$rsdebt23_ntn[hn]'"; 
$sqlquerydebt2_ntn2=$mysqli_hi->query($SQLdebt2_ntn2);
$addnumdebt2_ntn2=$sqlquerydebt2_ntn2->num_rows;
$rsdebt2_ntn2=$sqlquerydebt2_ntn2->fetch_assoc();
 

	?>
                                    <tr>
                    <td><span class="label label-warning"><?=$rsdebt2_ntn2[hn]?></span></td>
                    <td><strong><?=$rsdebt2_ntn2[pop_id]?></strong></td>
					                        <td><strong><?=$rsdebt2_ntn2[fname]?>&nbsp;&nbsp;<?=$rsdebt2_ntn2[lname]?></strong></td>
                      <td><strong><?=$Dlib->MadeDay($rsdebt2_ntn2[brthdate])?></strong></td>

                          <td><strong><?=$rsdebt2_ntn2[ntnlty]?></strong></td>
						   <td><strong><?=$rsdebt2_ntn2[ctzshp]?></strong></td>


                          <td><strong><?=$Dlib->MadeDay($rsdebt2_ntn2[fdate])?></strong></td>
                            <td><strong><?=$Dlib->MadeDay($rsdebt2_ntn2[ldate])?></strong></td>
                            <td><strong><?=$rsdebt2_ntn2[namepttype]?></strong></td>

			
                              <td><span class="label label-success"><?=$rsdebt2_ntn2[register]?></span>
<?
 $SQLdebt223_ntn2="SELECT *  from opstaff where staff ='$rsdebt2_ntn2[register]'";
$sqlquerydebt223_ntn2=$mysqli_hi->query($SQLdebt223_ntn2);
$rsdebt223_ntn23=$sqlquerydebt223_ntn2->fetch_assoc();	
echo "".$rsdebt223_ntn23[fname]."&nbsp;&nbsp;".$rsdebt223_ntn23[lname].""; 

?></strong></td>
                  </tr>    
				  

 <? } ?> 
          
              
</table>
</font>
<?
 
}
}//IF2
//111111111111111111111111111111111111111111111111111
if($addnumdebt24>=1){

?>                      
<font size='2'>
<table width="101%" class="table table-bordered">
             	<? if($addnumdebt24>0){?>  
					<tr valign="top" >
                    <td colspan="11">
                    <DIV align=left ><strong><img src="images/right-wrong-check-marks.png"   />ตรวจสอบการลงทะเบียนไม่กรอก ว/ด/ป เกิด Real-Time</strong>   </DIV>    </td>
                    </tr>
<?}?> 
    <tr> 
	<? if($addnumdebt24>0){?>
	<?
	//<?=$Dlib->MadeDay($rs[date_up]) 
	//echo date("Y-m-d H:i:s", mktime(date("H"), date("i")+0, date("s")+0, date("m")+0  , date("d")+0, date("Y")+0))."<br>";
 echo "<hr><BR><div align='center'><font color='red' size='+3'>ตรวจพบไม่กรอก [ว/ด/ป เกิด]  จำนวน&nbsp;&nbsp;".$addnumdebt24_num."&nbsp;&nbsp;ราย</font></div> ";

 echo "<BR><div align='center'><font color='#0718ba' size='+2'>แสดงการตรวจพบไม่กรอก [ว/ด/ป เกิด]  จำนวนล่าสุด&nbsp;&nbsp;".$addnumdebt24."&nbsp;&nbsp;ราย</font></div> ";
}else{
	//<?=$Dlib->MadeDay($rs[date_up]) 
	//echo date("Y-m-d H:i:s", mktime(date("H"), date("i")+0, date("s")+0, date("m")+0  , date("d")+0, date("Y")+0))."<br>";
 echo "<BR><div align='center'><font color='red' size='+3'>ไม่พบ  ว/ด/ป เกิด ผิดพลาด Hi MYSQL </font></div> ";
 
}?>    

</td>


  </tr> <? if($addnumdebt24>0){?>
					<tr>
                    <td><div align="center"  ><strong>HN</strong></div></td>
                    <td><div align="center" ><strong>เลขบัตร</strong></div></td>
                      <td><div align="center" ><strong>ชื่อ-สกุล</strong></div></td>
                        <td><div align="center" ><strong>วันเกิด</strong></div></td>
                          <td><div align="center" ><strong>มาครั้งแรก</strong></div></td>
                            <td><div align="center" ><strong>มาครั้งล่าสุด</strong></div></td>
                              <td><div align="center" ><strong>ผู้ลงทะเบียน</strong></div></td> 
                  </tr>
				  <?
	
while($rsdebt24=$sqlquerydebt24->fetch_assoc()){	$i_table4++;
if($i_table4%2==0)
{
$bg4 ="#FFFFCC";
//f1eaae
}
else
{
$bg4 ="#D0FFB0";
}
 
 $SQLdebt2244="SELECT  *   FROM  pt   where pt.pop_id='$rsdebt24[pop_id]' and brthdate is NULL"; 
$sqlquerydebt2244=$mysqli_hi->query($SQLdebt2244);
$addnumdebt2244=$sqlquerydebt2244->num_rows;
$rsdebt2244=$sqlquerydebt2244->fetch_assoc();

	?>
  <tr>
                    <td><span class="label label-warning"><?=$rsdebt2244[hn]?></span></td>
                    <td><strong><?=$rsdebt2244[pop_id]?></strong></td>
					                        <td><strong><?=$rsdebt2244[fname]?>&nbsp;&nbsp;<?=$rsdebt2244[lname]?></strong></td>
                      <td><strong><?=$rsdebt2244[brthdate]?></strong></td>

                          <td><strong><?=$Dlib->MadeDay($rsdebt2244[fdate])?></strong></td>
                            <td><strong><?=$Dlib->MadeDay($rsdebt2244[ldate])?></strong></td>
                              <td><span class="label label-success"><?=$rsdebt2244[register]?></span>
<?
 $SQLdebt2234="SELECT *  from opstaff where staff ='$rsdebt2244[register]'";
$sqlquerydebt2234=$mysqli_hi->query($SQLdebt2234);
$rsdebt2234=$sqlquerydebt2234->fetch_assoc();	
echo "".$rsdebt2234[fname]."&nbsp;&nbsp;".$rsdebt2234[lname].""; 


//INsert Num ตรวจพบไม่กรอก [ว/ด/ป เกิด]
$ec2=date('01-m-Y');
$dchk2=date('d-m-Y');
if($ec2==$dchk2){ 

$chkdate3=date('Y-m-d H:i:s');
 $SQLdebt2_popchk3ck="select * from `report` where `hn`='$rsdebt2244[hn]' and `regis`='$rsdebt2244[register]'";
$sqlquerydebt2_popchk3ck=$mysqli->query($SQLdebt2_popchk3ck);
$popchk3cknum=$sqlquerydebt2_popchk3ck->num_rows;
 
if($popchk3cknum<1){
$SQLdebt2_popchk3="INSERT INTO `report` (`id` ,`id2` ,`status` ,`checkdate` ,`hn` ,`regis` ,`edit_stat`)VALUES (NULL ,  '$rsdebt2244[pop_id]',  '3',  '$chkdate3',  '$rsdebt2244[hn]',  '$rsdebt2244[register]',  '0')";
$sqlquerydebt2_popchk3=$mysqli->query($SQLdebt2_popchk3);
}
}
?></strong></td>
                  </tr>         
 <? }  ?> 
          
              
</table>
</font>
<?
 
}
}//IF3


if($addnumdebt25>=1){

?>
<font size='2'>
<table width="101%" class="table table-bordered">
	<?php if($addnumdebt25>0){?>  
	<tr valign="top" >
	<td colspan="11">
	<div align=left ><strong><img src="images/right-wrong-check-marks.png"/>ตรวจสอบความสมบูรณ์ของเลขที่บัตรประชาชนเด็กเกิดใหม่ Real-Time</strong>   
    </div>    </td>
	</tr>
<?php }?> 
	<tr> 
	<?php if($addnumdebt25>0){?>
	<?php
	//<?=$Dlib->MadeDay($rs[date_up]) 
	//echo date("Y-m-d H:i:s", mktime(date("H"), date("i")+0, date("s")+0, date("m")+0  , date("d")+0, date("Y")+0))."<br>";
 echo "<hr><BR><div align='center'><font color='#0718ba' size='+2'>พบความไม่สมบูรณ์ของเลขที่บัตรประชาชนเด็กเกิดใหม่ <font color='red' size='+2'>ทั้งหมด จำนวน&nbsp;&nbsp;".$rsdebt2256[cpop]."&nbsp;&nbsp;ราย</font></font></div> <br>
 <div align='center'><font color='red' size='+3'>แสดงข้อมูลเลขบัตรประชาชนเด็กเกิดใหม่  &nbsp;&nbsp; 10&nbsp;&nbsp;รายล่าสุด<img src='images/arrow-down.gif'></font></div>
 ";


}else{
	//<?=$Dlib->MadeDay($rs[date_up]) 
	//echo date("Y-m-d H:i:s", mktime(date("H"), date("i")+0, date("s")+0, date("m")+0  , date("d")+0, date("Y")+0))."<br>";
 echo "<BR><div align='center'><font color='red' size='+3'>ไม่พบข้อมูลผิดพลาด  Hi MYSQL </font></div> ";
 
}?>    

</td>
	</tr> 
		<?php if($addnumdebt25>0){?>
	<tr>
	<td><div align="center"  ><strong>HN</strong></div></td>
	<td><div align="center" ><strong>เลขบัตร</strong></div></td>
	<td><div align="center" ><strong>ชื่อ-สกุล</strong></div></td>
	<td><div align="center" ><strong>วันเกิด</strong></div></td>
	<td><div align="center" ><strong>มาครั้งแรก</strong></div></td>
	<td><div align="center" ><strong>มาครั้งล่าสุด</strong></div></td>
	<td><div align="center" ><strong>ผู้ลงทะเบียน</strong></div></td> 
	</tr>
<?php
	
while($rsdebt25=$sqlquerydebt25->fetch_assoc()){	$i_table++;
if($i_table%2==0)
{
$bg1 ="#FFFFCC";
//f1eaae
}
else
{
$bg1 ="#D0FFB0";
}
 $SQLdebt256="SELECT  *   FROM  pt   where pt.pop_id='$rsdebt25[pop_id]' ORDER BY ldate desc  LIMIT 0 , 25 "; 
$sqlquerydebt256=$mysqli_hi->query($SQLdebt256);
$addnumdebt256=$sqlquerydebt256->num_rows;
	
while($rsdebt256=$sqlquerydebt256->fetch_assoc()){

	?>
<tr>
	<td><span class="label label-warning"><?=$rsdebt256[hn]?></span></td>
	<td><strong><?=$rsdebt256[pop_id]?></strong></td>
	<td><strong><?=$rsdebt256[fname]?>&nbsp;&nbsp;<?=$rsdebt256[lname]?></strong></td>
	<td><strong><?=$Dlib->MadeDay($rsdebt256[brthdate])?></strong></td>
	<td><strong><?=$Dlib->MadeDay($rsdebt256[fdate])?></strong></td>
	<td><strong><?=$Dlib->MadeDay($rsdebt256[ldate])?></strong></td>
	<td><span class="label label-success"><?=$rsdebt256[register]?></span>
<?
 $SQLdebt223="SELECT *  from opstaff where staff ='$rsdebt256[register]'";
$sqlquerydebt223=$mysqli_hi->query($SQLdebt223);
$rsdebt223=$sqlquerydebt223->fetch_assoc();	
$addnum223=$sqlquerydebt223->num_rows;

if(!empty($rsdebt223[fname])){
echo "".$rsdebt223[fname]."&nbsp;&nbsp;".$rsdebt223[lname].""; 
}else{
echo "ไม่พบข้อมูลผู้ลงทะเบียน"; 
}

//INsert Num พบความไม่สมบูรณ์ของเลขบัตรประชาชนเด็กเกิดใหม่
$ec3=date('01-m-Y');
$dchk3=date('d-m-Y');
if($ec3==$dchk2){ 

$chkdate4=date('Y-m-d H:i:s');
 $SQLdebt2_popchk4ck="select * from `report` where `hn`='$rsdebt256[hn]' and `regis`='$rsdebt256[register]'";
$sqlquerydebt2_popchk4ck=$mysqli->query($SQLdebt2_popchk4ck);
$popchk4cknum=$sqlquerydebt2_popchk4ck->num_rows;
 
if($popchk4cknum<1){
$SQLdebt2_popchk4="INSERT INTO `report` (`id` ,`id2` ,`status` ,`checkdate` ,`hn` ,`regis` ,`edit_stat`)VALUES (NULL ,  '$rsdebt256[pop_id]',  '4',  '$chkdate4',  '$rsdebt256[hn]',  '$rsdebt256[register]',  '0')";
$sqlquerydebt2_popchk4=$mysqli->query($SQLdebt2_popchk4);
}
}
?></strong></td>
                  
</tr>     

<?php } } ?> 
</table>
</font>
<?php
}//IF4
}
/*
echo "<br><br>";
 $status0 =  GetServerStatus('10.0.0.1',81);
 $status =  GetServerStatus('10.0.0.5',80);
  $status2 =  GetServerStatus('10.0.0.6',80);
   $status3 =  GetServerStatus('10.0.0.7',80);
    $status4 =  GetServerStatus('10.0.0.3',80);
    $status5 =  GetServerStatus('10.0.0.4',80);
    $status6 =  GetServerStatus('10.0.0.9',80);
    $status7 =  GetServerStatus('10.0.0.2',80);
    $status8 =  GetServerStatus('10.0.0.11',80);

 function GetServerStatus($site, $port)
{
$status = array("<font color='red'><img src='iconset/offline.png'></font>", "<font color='green'><img src='iconset/useron_ser.gif'></font>");
$fp = @fsockopen($site, $port, $errno, $errstr, 2);
if (!$fp) {
    return $status[0];
} else
  { return $status[1];}
}
 
	echo "


	<div align='left'>	  <b>
	<font color='#051bbe'  ><img src='iconset/star.png'>MicroTIK&nbsp;NetWork Connection</red>&nbsp;::&nbsp;".$status0."<br><br>
	<font color='red'  ><img src='iconset/arrow-curve-000-left.png'>HI&nbsp;SERVER5</red>&nbsp;::&nbsp;".$status."<br><br>
	<font color='red' ><img src='iconset/arrow-curve-000-left.png'>HI&nbsp;SERVER6</red>&nbsp;::&nbsp;".$status2."<br><br>
	<font color='red' ><img src='iconset/arrow-curve-000-left.png'>HI&nbsp;SERVER7</red>&nbsp;::&nbsp;".$status3."<br><br>
	<font color='red' ><img src='iconset/arrow-curve-000-left.png'>NOD Antivirus SERVER</red>&nbsp;::&nbsp;".$status4."<br><br>
	<font color='red'  ><img src='iconset/arrow-curve-000-left.png'>Camera SERVER</red>&nbsp;::&nbsp;".$status5."<br><br>
	<font color='red'  ><img src='iconset/arrow-curve-000-left.png'>Camera-NEW SERVER</red>&nbsp;::&nbsp;".$status6."<br><br>
		<font color='red'  ><img src='iconset/arrow-curve-000-left.png'>Express SERVER</red>&nbsp;::&nbsp;".$status7."<br><br>
			<font color='red'  ><img src='iconset/arrow-curve-000-left.png'>NO HardDisk SERVER</red>&nbsp;::&nbsp;".$status8."<br><br>
	</b>  </div>
	 
	";*/
$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];
$endtime = $mtime;
$totaltime = ($endtime - $starttime);
echo "<br><div align='center'><font color='red' size='3'>หน้านี้ประมวลผล ".$totaltime." วินาที</font></div>";
?>
 