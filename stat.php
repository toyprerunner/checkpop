                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="green">
                   <tr colspan="9"  bgcolor="#000000"><td colspan="8" ><div class="buttons">
				   
				   <button type="button" name="button222" id="button" value="บันทึกข้อมูล"  onclick="javascript:location.href='?option=admin'"  class="positive"><img src="iconset/monitor_edit.png" alt=""/>ผู้ใช้งาน</button> 
				   <button type="button" name="button222" id="button" value="บันทึกข้อมูล"  onclick="javascript:location.href='?option=stat'"   class="positive"><img src="iconset/market_report.png" alt=""/>สถิติการเข้าใช้งาน</button> 

				   </div>	</td></tr>
 
                  
              
 
                  <tr>
                    <td   align="center" bgcolor="#CCCCCC"><div align='center'><strong>ลำดับ</strong><div/></td>
                    <td  align="center" bgcolor="#CCCCCC"><div align='center'><strong>เข้าใช้งานโดย</strong><div/></td>
                    <td   align="center" bgcolor="#CCCCCC"><div align='center'><strong>ชื่อผู้ใช้</strong><div/></td>
					    <td   align="center" bgcolor="#CCCCCC"><div align='center'><strong>IP address</strong><div/></td>
                    <td   align="center" bgcolor="#CCCCCC"><div align='center'><strong>DATE</strong><div/></td>
 
                  </tr>
 <?
 $q="select * from log_chk ORDER BY date_log desc";
 

$qr=$mysqli->query($q);
 $total=$qr->num_rows;

	$e_page=100; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
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
 ?>
                  <tr>
                    <td><div  class="FontNormal">&nbsp;<?=$rs[log_id]?></div></td>
                    <td><div  class="FontNormal">&nbsp;<?=$rs[by_log]?></div></td>
                    <td><div  class="FontNormal"><?=$rs[by_log_name]?></div></td>
			  <td><div  class="FontNormal"><?=$rs[ip_log]?></div></td> <td><div  class="FontNormal"><?=$rs[date_log]?></div></td>
 
 
                  </tr>
        <? } ?>
                     <tr>
                    <td colspan="11" bgcolor="#f5f89b">
 <? if($total>0){ ?>
<div class="browse_page">
 <?php   
 // เรียกใช้งานฟังก์ชั่น สำหรับแสดงการแบ่งหน้า   
 $show='?option=stat';
  page_navigator($show,$before_p,$plus_p,$total,$total_p,$chk_page);    
  ?> 
</div>
<?php } ?></td>
                    </tr>
           
</table>
 