  <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>  
        <div class="buttons">
    <button type="button" name="button222" id="button" value="บันทึกข้อมูลลูกหนี้"   class="positive">
 <img src="iconset/box.gif" alt=""/> รายการข้อมูล พรบ.
    </button> 
                      </td>
                    </tr>
                  </table>

 
                  <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="green">

<? if($_GET[edit]=='1'){
			  $q_edit="SELECT * FROM  plb where plb_ib='$_GET[id]' ";
		  $qr_edit=mysql_db_query($dbname,$q_edit);
			$total_edit=mysql_fetch_array($qr_edit);
			
	?>
                  <form id="plb" name="plb" method="post" action="" onsubmit='return plbcheck();'>
                    <tr>
                      <td colspan="2"   align="center" bgcolor="#FFFFCC"><strong><img src="iconset/information-balloon.png" width="16" height="16" /> </strong><strong>รายการ
                        <input name="topic" type="text" id="textfield" size="40"  value='<?=$total_edit[plb_detail]?>'/>
                      </strong></td>
                      <td   align="center" valign="top" bgcolor="#FFFFCC"><strong>รายละเอียด<br />
                      <textarea name="detail_all" id="textarea" cols="40" rows="4"><?=$total_edit[plb_etc]?></textarea>
                      </strong></td>
                      <td   align="center" bgcolor="#FFFFCC">
                        <br />
                        <br />
						 <input type="hidden" name="hadd_id" id="hadd_id" value="<?=$total_edit[plb_ib]?>" />
                        <input type="hidden" name="hadd" id="hadd" value="2" />
                      <input type="submit" name="save" id="button" value="บันทึก" />
                      <input type="reset" name="resetall" id="button2" value="ยกเลิก" /></td>
                    </tr>
					</form>
<?}else{?>
                  <form id="plb" name="plb" method="post" action="" onsubmit='return plbcheck();'>
                    <tr>
                      <td colspan="2"   align="center" bgcolor="#FFFFCC"><strong><img src="iconset/information-balloon.png" width="16" height="16" /> </strong><strong>รายการ
                        <input name="topic" type="text" id="textfield" size="40" />
                      </strong></td>
                      <td   align="center" valign="top" bgcolor="#FFFFCC"><strong>รายละเอียด<br />
                      <textarea name="detail_all" id="textarea" cols="40" rows="4"></textarea>
                      </strong></td>
                      <td   align="center" bgcolor="#FFFFCC">
                        <br />
                        <br />
                        <input type="hidden" name="hadd" id="hadd" value="checknum" />
                      <input type="submit" name="save" id="button" value="บันทึก" class='btn' />
                      <input type="button" name="resetall" id="button2" value="ยกเลิก"  class='btn'  onclick="javascript:location.href='?option=plb'" /></td>
                    </tr>
					</form>
<?} ?>



           


                  <tr>
                    <td   align="center" bgcolor="#CCCCCC"><strong>รหัส</strong></td>
                    <td  align="center" bgcolor="#CCCCCC"><strong>รายการ</strong></td>
                    <td   align="center" bgcolor="#CCCCCC"><strong>รายละเอียด/ความหมาย</strong></td>
                    <td   align="center" bgcolor="#CCCCCC"><strong>จัดการ</strong></td>
                  </tr>
         <?
       
		  $q="SELECT * FROM  plb";
		  $qr=mysql_db_query($dbname,$q);
			$total=mysql_num_rows($qr);



$e_page=40; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
if(!isset($_GET['s_page'])){   
	$_GET['s_page']=0;   
}else{   
	$chk_page=$_GET['s_page'];     
	$_GET['s_page']=$_GET['s_page']*$e_page;   
}   
$q.=" LIMIT ".$_GET['s_page'].",$e_page";
$qr=mysql_db_query($dbname,$q);
$qrx=mysql_num_rows($qr);
if($qrx>=1){   
	$plus_p=($chk_page*$e_page)+$qrx;   
}else{   
	$plus_p=($chk_page*$e_page);       
}   
$total_p=ceil($total/$e_page);   
$before_p=($chk_page*$e_page)+1;  
 
				  while($rs=mysql_fetch_array($qr)){
									
				  if($bg == "#f2f2f2") { //ส่วนของการ สลับสี 
$bg = "#FFFFFF";
} else {
$bg = "#f2f2f2";}

$d = date("j");
$m = date("m");
$yea = date("Y");
$DateLast7 = date("$yea-m-d", mktime(date("H")+(7*24), date("i")+0));

		   ?>
                  <tr>
                    <td><div  class="FontNormal">&nbsp;<?=$rs[plb_ib]?></div></td>
                    <td><div  class="FontNormal">&nbsp;<?=$rs[plb_detail]?></div></td>
                    <td><div  class="FontNormal"><img src="iconset/information-balloon.png">&nbsp;<?=$rs[plb_etc]?></div></td>
                    <td><div  class="FontNormal"><img src="iconset/pencil-ruler.png">&nbsp;<a href="?option=plb&edit=1&id=<?=$rs[plb_ib]?>">แก้ไขข้อมูล</a>
					</div>
					
					</td>
                  </tr>
        <? }?>

                     <tr>
                    <td colspan="4"><?
	  if($total>0){ ?>
<div class="browse_page">
 <?php   
 // เรียกใช้งานฟังก์ชั่น สำหรับแสดงการแบ่งหน้า   
 $show='?option=plb';
  page_navigator($show,$before_p,$plus_p,$total,$total_p,$chk_page);    
  ?> 
</div>
<?php }?></td>
                    </tr>
</table>
 <?
 if($_POST[hadd]=='checknum'){
 
 
 $SQLs="INSERT INTO  `plb` (`plb_ib` ,`plb_detail` ,`plb_etc` )VALUES (NULL , '$_POST[topic]', '$_POST[detail_all]')"; 
$qqer = mysql_db_query($dbname,$SQLs);
 
 print"<div align=center  class=FontMenuLogin><img src='images/18.gif'><br>บันทึกข้อมูล..</div>";
 print"<meta http-equiv=\"refresh\" content=\"0;URL=?option=plb\">\n";
 
 }else if($_POST[hadd]=='2'){
 
 $SQLs="UPDATE  `plb` SET  `plb_detail`='$_POST[topic]' ,`plb_etc` ='$_POST[detail_all]' WHERE   `plb_ib` ='$_POST[hadd_id]'"; 
$qqer = mysql_db_query($dbname,$SQLs);
 
 print"<div align=center  class=FontMenuLogin><img src='images/18.gif'><br>บันทึกข้อมูล..</div>";
 print"<meta http-equiv=\"refresh\" content=\"0;URL=?option=plb\">\n";
 
 }
 ?>

<SCRIPT>
function plbcheck() {
if(document.plb.topic.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.plb.topic.focus() ;
return false ;
}
if(document.plb.detail_all.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.plb.detail_all.focus() ;
return false ;
}
else 
return true ;
}
 </SCRIPT>