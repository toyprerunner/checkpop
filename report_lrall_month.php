<head>
<!-- Bootstrap Core CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css" />

</head>
                  <table width="100%" class="table">
                   <tr><td colspan="8" ><div class="buttons"><button type="button" name="button222" id="button" value="บันทึกข้อมูล"  onclick="" disabled class="positive"><img src="iconset/monitor_edit.png" alt=""/>แสดงรายงานข้อผิดพลาดที่ตรวจพบ</button> </div>	</td></tr>
					
					
				  <tr>
                    <td> 			


<form name="checkFormsearch" onSubmit="return check()"   method="GET" enctype="multipart/form-data"  action="<?=$_SERVER['SCRIPT_NAME'];?>">
					<div align="left"><img src="images/search.png"  />

	<INPUT   type=hidden  name="option"     value="report_lrall_month"  class='lr2013' />
						  เลือกช่วงวันที่<INPUT   type=text  name="date_a" id="popupDatepicker2" readonly  value="<?=$_GET[date_a]?>"  class='lr2013' /> ถึงวันที่<INPUT   type=text  name="date_b" id="popupDatepicker" readonly  value="<?=$_GET[date_b]?>"  class='lr2013' /> <BR><BR>

						 <img src="iconset/report-16.png"  />เลือกเหตุการณ์ 
						   <SELECT name="events" class='lr2013'>
						   <OPTION value="" selected class='lr2013'>=== เลือกเหตุการณ์ ===</OPTION>
						   <OPTION value="0">->แสดงทั้งหมด</OPTION>
						    <OPTION value="1">->พบเลขบัตรประชาชนซ้ำ</OPTION>
							<OPTION value="2">->ตรวจสอบการลงทะเบียนเลขบัตรประชาชนไม่ครบ 13 หลัก</OPTION>
							<OPTION value="3">->ตรวจสอบการลงทะเบียนไม่กรอก ว/ด/ป เกิด</OPTION>
							<OPTION value="4">->ตรวจสอบความไม่สมบูรณ์ของเลขบัตรประชาชนเด็กเกิดใหม่</OPTION>
				 
						   </SELECT>
                              <input type="hidden" name="s" id="textfield"  value="1"/>
                              <input type="submit" name="button" id="button" value="ค้นหา" class='btn' />
      </div>   
					  
						   

			          </form>                </td>
                    </tr>                  </tr>
         <?
		 		 if($_GET[s]=="1"){?>
                 <table width="100%" class="table">
                  <tr>
                    <td   align="center"><strong>HN</strong></td>
                    					<td   align="center"><strong>เลขบัตรประชาชน</strong></td>
                    <td  align="center"><strong>ผู้ลงทะเบียน</strong></td>
          

					<td   align="center"><strong>วันที่ตรวจพบ</strong></td>
 
                  </tr><? } ?>
         <?
		 		 if($_GET[s]=="1"){
 if($_GET[events]=='0'){
 $q="SELECT * FROM `report` WHERE (
SUBSTR( checkdate, 1, 10 )
BETWEEN '$_GET[date_a]'
AND '$_GET[date_b]') AND (status BETWEEN '1' and '4')";
 
$qr=$mysqli->query($q);
 $total=$qr->num_rows;
 }else{
 $q="SELECT * FROM `report` WHERE (
SUBSTR( checkdate, 1, 10 )
BETWEEN '$_GET[date_a]'
AND '$_GET[date_b]') AND status='$_GET[events]'";
 
$qr=$mysqli->query($q);
 $total=$qr->num_rows;
 }

 
   

if($total>=1){

if($_GET[events]=='1'){

$restdct_day = substr("$_GET[date_b]", 0, -3);
  
 
 $SQLdebt223_day="SELECT count(*) as count_day  from pt WHERE SUBSTR( `ldate`,1, 7 ) = '$restdct_day'";
 $sqlquerydebt223_day=$mysqli_hi->query($SQLdebt223_day);
 $rsdebt223_day=$sqlquerydebt223_day->fetch_assoc();	

$round=($total*100)/$rsdebt223_day[count_day];
 $round2=round($round,3);
 echo "<div align=center><br><font color=red><b>จำนวนที่พบเลขบัตรประชาชนซ้ำ จำนวน $total ราย</b></div></font><br>";
  echo "<div align=center><font color='#1b0da0'><b>จำนวน Person ::  ".number_format($rsdebt223_day[count_day],0)."  ราย :: คิดเป็นร้อยละ  $round2 %</b></div></font><br>";
 
}else if($_GET[events]=='0'){

$restdct_day = substr("$_GET[date_b]", 0, -3);
  
 
 $SQLdebt223_day="SELECT count(*) as count_day  from pt WHERE SUBSTR( `ldate`,1, 7 ) = '$restdct_day'";
 $sqlquerydebt223_day=$mysqli_hi->query($SQLdebt223_day);
 $rsdebt223_day=$sqlquerydebt223_day->fetch_assoc();	

$round=($total*100)/$rsdebt223_day[count_day];
 $round2=round($round,3);
 echo "<div align=center><br><font color=red><b>จำนวนที่พบเลขบัตรประชาชนซ้ำ จำนวน $total ราย</b></div></font><br>";
  echo "<div align=center><font color='#1b0da0'><b>จำนวน Person ::  ".number_format($rsdebt223_day[count_day],0)."  ราย :: คิดเป็นร้อยละ  $round2 %</b></div></font><br>";
 
}


}
if($total<1){
echo "<div align=center><font color=red><b>ไม่พบข้อมูลที่ค้นหา</b></font><BR></div><BR>";
?>
<input type="button" name="button" id="button" value="ไม่พบข้อมูลที่ค้นหา"   class='btn' onclick="javascript:location.href='?option=report_lrall_month'"  />
<?
exit();
}

									$e_page=100; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
if(!isset($_GET['s_page'])){   
	$_GET['s_page']=0;   
}else{   
	$chk_page=$_GET['s_page'];     
	$_GET['s_page']=$_GET['s_page']*$e_page;   
}   
$q.=" LIMIT ".$_GET['s_page'].",$e_page";
$qr=$mysqli_hi->query($q);
if($qrx=$qr->num_rows>=1){   
	$plus_p=($chk_page*$e_page)+$qrx=$qr->num_rows;   
}else{   
	$plus_p=($chk_page*$e_page);       
}   
$total_p=ceil($total/$e_page);   
$before_p=($chk_page*$e_page)+1;  

							 while($rs=$qr->fetch_assoc()){
			 
$i_table++;
if($i_table%2==0)
{
$bg = $bg1;
//f1eaae
}
else
{
$bg = $bg2;
}

		 ?>
                  <tr bgcolor="<?=$bg;?>">
                    <td><img src="iconset/information-balloon.png"><?=$rs[hn]?></td>

   <td><?=$rs[id2]?></td>
<?
 $SQLdebt223="SELECT *  from opstaff where staff ='$rs[regis]'";
$sqlquerydebt223=$mysqli_hi->query($SQLdebt223);
$rsdebt223=$sqlquerydebt223->fetch_assoc();	

   ?>
                    <td><div  class="FontNormal"><strong>&nbsp;<?echo "".$rsdebt223[fname]."&nbsp;&nbsp;".$rsdebt223[lname]."";?> </a> </strong></div></td>
                    <td><?=$rs[checkdate]?></td>

					 
                  </tr>
        <? } 
		$qr->free();
		?>

                     <tr>
                    <td>
 <? if($total>0){ ?>
<div class="browse_page">
 <?php   
 // เรียกใช้งานฟังก์ชั่น สำหรับแสดงการแบ่งหน้า   
 
  $show='?option=report_lrall_month&s=1&date_a='.$_GET[date_a].'&date_b='.$_GET[date_b].'&events='.$_GET[events].'';

  page_navigator($show,$before_p,$plus_p,$total,$total_p,$chk_page);    
  ?> 
</div>
<?php } ?></td>
                    </tr>
					<? }?>
</table>
</tabel>
<SCRIPT>

function check() {
 if(document.checkFormsearch.date_a.value=="") {
alert("เลือกวันที่") ;
document.checkFormsearch.date_a.focus() ;
return false ;
}
if(document.checkFormsearch.date_b.value==""){
alert('เลือกวันที่');
document.checkFormsearch.date_b.focus() ;
return false;
 }if((document.checkFormsearch.date_a.value)>(document.checkFormsearch.date_b.value)){
alert('วันที่ไม่ถูกต้อง');
return false;
 }
 if(document.checkFormsearch.events.value=="") {
alert("เลือกเหตุการณ์") ;
document.checkFormsearch.events.focus() ;
return false ;
}
else 
return true ;
} 
 
                  </SCRIPT>