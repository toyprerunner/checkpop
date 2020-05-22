
  <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>  
 <div class="buttons">
 
    <button type="button" name="button222" id="button" value="บันทึกข้อมูลลูกหนี้"   class="positive">
 <img src="images/tick.png" alt=""/> ข้อมูลการเข้าใช้งานระบบ
    </button> 
    </div> 
                      </td>
                    </tr>
                  </table>

 
                  <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="green">
                    
                  <tr>
                    <td   align="center" bgcolor="#CCCCCC"><strong>ผู้ใช้งาน</strong></td>
                    <td  align="center" bgcolor="#CCCCCC"><strong>ไอพี</strong></td>
					<td   align="center" bgcolor="#CCCCCC"><strong>เวลา</strong></td>
		 
                  </tr>
         <?
		 		 if($_POST[s]=="1"){
		$_POST[search]=trim($_POST[search]);
				
				$q = "SELECT * FROM   log_chk where   date_log  LIKE '%$_POST[search]%'  ORDER BY  `date_log` DESC ";
		
 	 
		}else{
			  $q="SELECT * FROM   log_chk  ORDER BY  date_log DESC ";
 
		}
 
									$qr=mysql_db_query($dbname,$q);
									 $total=mysql_num_rows($qr);

if($total<1){
echo "<div align=center><font color=red><b>ไม่พบข้อมูลที่ค้นหา</b></font><BR> <input type='button' name='resetall' id='button2' value='ยกเลิก'  class='btn'  onclick='javascript:history.back(-1)' /></div><BR><BR>";
exit();
}

									$e_page=40; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
if(!isset($_GET['s_page'])){   
	$_GET['s_page']=0;   
}else{   
	$chk_page=$_GET['s_page'];     
	$_GET['s_page']=$_GET['s_page']*$e_page;   
}   
$q.=" LIMIT ".$_GET['s_page'].",$e_page";
$qr=mysql_db_query($dbname,$q);
if($qrx=mysql_num_rows($qr)>=1){   
	$plus_p=($chk_page*$e_page)+$qrx=mysql_num_rows($qr);   
}else{   
	$plus_p=($chk_page*$e_page);       
}   
$total_p=ceil($total/$e_page);   
$before_p=($chk_page*$e_page)+1;  


										while($rs=mysql_fetch_array($qr)){
			 
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
                    <td><div  class="FontNormal"><strong>&nbsp;<?=$rs[by_log_name]?>
                    </strong></div></td>
                    <td><div  class="FontNormal"><strong><?=$rs[ip_log]?></strong></div></td>
             
		 
					<td><div  class="FontNormal"><strong> &nbsp;<?=$rs[date_log]?></strong></div></td>
				 
                  </tr>
        <? } ?>

                     <tr>
                    <td colspan="7">
 <? if($total>0){ ?>
<div class="browse_page">
 <?php   
 // เรียกใช้งานฟังก์ชั่น สำหรับแสดงการแบ่งหน้า   
 $show='?option=log_file';
  page_navigator($show,$before_p,$plus_p,$total,$total_p,$chk_page);    
  ?> 
</div>
<?php } ?></td>
                    </tr>
</table>
<SCRIPT>
 
function check() {
if(document.checkFormsearch.search.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.checkFormsearch.search.focus() ;
return false ;
}
else 
return true ;
}
                  </SCRIPT>
