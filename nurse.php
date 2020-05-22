  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>  
  <table width="100%" border="0"  cellpadding="0" cellspacing="0">
                    <tr>
                      <td>  
 
<div class="buttons">
<!--    <button type="button" name="button222" id="button" value="บันทึกข้อมูลลูกหนี้"  onclick="javascript:location.href='?option=debt'" class="positive">-->
    <button type="button" name="button222" id="button" value="บันทึกข้อมูลลูกหนี้"   class="positive">
 <img src="iconset/market_report.png" alt=""/>ข้อมูลการทำคลอด</button> 
                       </td>
                    </tr>
                  </table>
                  <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="green">
                    <tr>
                    <td colspan="8" bgcolor="#180372">
					<? $ndate=date('Y-m-d');
					$ndate2=date('Y-m');
					$nyears=date('Y')+543;
					?>
                    <DIV align=left class="FontMenu"><strong><h3>ข้อมูลประจำเดือน <?=$Dlib->MadeDay2($ndate)?>   <? echo "$nyears";?></h3></strong>   </DIV> 	
					
<?
		 		 if($_POST[s]=="1"){
 		$_POST[search]=trim($_POST[search]);
				
				$q = "SELECT * FROM   lr_lbw WHERE date_add='$dateday' AND (name LIKE  '%$_POST[search]%' OR hn LIKE '%$_POST[search]%') ORDER BY lbw_id desc";
		
 	 
		}else{
			  $q="SELECT *,COUNT(*) as cnu FROM  lr_lbw  WHERE  nurse_id!='' AND DATE_FORMAT( DATE,  '%Y-%m' ) ='$ndate2' AND stat_event!='2' GROUP BY nurse_id  ORDER BY cnu desc ";
 
		}
//SELECT DATE_FORMAT( DATE,  '%Y-%m' ) AS MyDate FROM lr_lbw WHERE DATE_FORMAT( DATE,  '%Y-%m' ) =  '2013-07'  



 
									$qr=$mysqli->query($q);
									 $total=$qr->num_rows;
 if($_POST[s]=="1"){
if($total<1){
echo "<div align=center><font color=red><b>ไม่พบข้อมูลที่ค้นหา</b></font><BR> <input type='button' name='resetall' id='button2' value='ยกเลิก'  class='btn'  onclick='javascript:history.back(-1)' /></div><BR><BR>";
 
}
}else{
if($total<1){
echo "<div align=center><h1><font color='#FFFFFF'><b>ยังไม่มีการบันทึกข้อมูลประจำเดือนนี้  </b></font></h1><BR></div><BR><BR>";
 
}
}


if($total>=1){
?>
  </td>
                    </tr>


                  <tr>
                    <td   align="center" bgcolor="#CCCCCC"><div  class="FontNormal" align="center"><strong>พยาบาล/ผู้ทำคลอด</strong></div></td>
                    <td   align="center" bgcolor="#CCCCCC"><div  class="FontNormal" align="center"><strong>จำนวนหญิงคลอด</strong></div></td>
          
                  </tr>
         <?


$e_page=20; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
if(!isset($_GET['s_page'])){   
	$_GET['s_page']=0;   
}else{   
	$chk_page=$_GET['s_page'];     
	$_GET['s_page']=$_GET['s_page']*$e_page;   
}   
$q.=" LIMIT ".$_GET['s_page'].",$e_page";
$qr=$mysqli->query($q);
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


$SQLADD_nurse="SELECT * FROM dct WHERE dct='$rs[nurse_id]'";
$sqlquery_nurse=$mysqli_hi->query($SQLADD_nurse);
 $rs_nurse=$sqlquery_nurse->fetch_assoc();
		 ?>
                  <tr bgcolor="<?=$bg;?>">
                    <td align='center'><div  class="FontNormal" align="center"><?=$rs_nurse[fname]?></div></td>
                    <td align='center'><div  class="FontNormal" align="center"><?=$rs[cnu]?> ราย</div></td>
   
                  </tr>

        <? } 
		$qr->free();
		?>

                     <tr>
                    <td colspan="8" bgcolor="#f5f89b">
 <? if($total>0){ ?>
<div class="browse_page">
 <?php   
 // เรียกใช้งานฟังก์ชั่น สำหรับแสดงการแบ่งหน้า   
 $show='?option=main';
  page_navigator($show,$before_p,$plus_p,$total,$total_p,$chk_page);    
  ?> 
</div>
<?php } ?>
</td>
</tr>
<? } //IF TOTAL?>
</table>

</td>
</tr>
 
</table>
 