
  <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>  
 
<div class="buttons">
<!--    <button type="button" name="button222" id="button" value="บันทึกข้อมูลลูกหนี้"  onclick="javascript:location.href='?option=debt'" class="positive">-->
    <?
	if($_SESSION[sess_level_PAYMENT]=='2'){	
	?>
	<a href="wap_admin_add.php"  onclick="return hs.htmlExpand(this, { objectType: 'iframe' } )">
 <img src='iconset/book_add.png' border='0'>บันทึกข้อมูลผู้ใช้งานระบบ
	</a>
 <?}?>
    </button> 

                      </td>
                    </tr>
                  </table>

 
                  <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="green">
				  <? if($_SESSION[sess_level_PAYMENT]=='2'){	 ?>
                    <tr>
                    <td colspan="7" bgcolor="#333">
                    <DIV align=left class="FontMenu"><strong></strong>   </DIV> 		 				
					<form name="checkFormsearch" onSubmit="return check()"   method="POST" enctype="multipart/form-data" >
					<div align="right"><img src="images/search.png"  />
						  <input type="text" name="search" id="textfield" />
                              <input type="hidden" name="s" id="textfield"  value="1"/>
                              <input type="submit" name="button" id="button" value="ค้นหาตามชื่อ" class='btn' />
                      </div>               
					       </form>                </td>
                    </tr>
					<? } ?>
                  <tr>
                    <td   align="center" bgcolor="#CCCCCC"><strong>ไอดี</strong></td>
					 <td   align="center" bgcolor="#CCCCCC"><strong>ชื่อเข้าใช้งาน</strong></td>
					  <td   align="center" bgcolor="#CCCCCC"><strong>รหัสผ่าน</strong></td>
                    <td  align="center" bgcolor="#CCCCCC"><strong>ชื่อ-สกุล</strong></td>
                    <td   align="center" bgcolor="#CCCCCC"><strong>ฝ่าย</strong></td>
					<td   align="center" bgcolor="#CCCCCC"><strong>ระดับ</strong></td>
                    <td   align="center" bgcolor="#CCCCCC"><strong>จัดการ</strong></td>
                  </tr>
         <?
		 		 if($_POST[s]=="1"){
		$_POST[search]=trim($_POST[search]);
				
				$q = "SELECT * FROM   admin_user  where  admin_name  LIKE '%$_POST[search]%' OR a_user LIKE '%$_POST[search]%'   ORDER BY  admin_id DESC ";
		
 	 
		}else{

			if($_SESSION[sess_level_PAYMENT]=='2'){	
			  $q="SELECT * FROM  admin_user  ORDER BY  admin_id DESC ";
			}else{
			$q="SELECT * FROM  admin_user  where admin_id='$_SESSION[sess_id_PAYMENT]' ORDER BY  admin_id DESC ";
			}
 
		}
 
									$qr=mysql_db_query($dbname,$q);
									 $total=mysql_num_rows($qr);

if($total<1){
echo "<div align=center><font color=red><b>ไม่พบข้อมูลที่ค้นหา</b></font><BR> <input type='button' name='resetall' id='button2' value='ยกเลิก'  class='btn'  onclick='javascript:history.back(-1)' /></div><BR><BR>";
exit();
}

									$e_page=20; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
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
if($rs[admin_level]=='2'){ $admin_con='ผู้ดูแลระบบ';}
if($rs[admin_level]=='1'){ $admin_con='ผู้ปฏิบัติงานทั่วไป';}
if($rs[admin_level]=='0'){ $admin_con='ผู้รับผิดชอบงาน';}
 
		 ?>
                  <tr bgcolor="<?=$bg;?>">
                    <td><div  class="FontNormal"><strong><img src="iconset/arrow-000-small.png">&nbsp;
                    <?=$rs[admin_id]?>
                    </strong></div></td>
                    <td><div  class="FontNormal"><strong>&nbsp;
					<? if($rs[admin_status]=='0'){?>
					<img src='iconset/joystick_error.png' border='0'><?=$rs[a_user]?>
					<?}
					else  if($rs[admin_status]=='1'){
					?><img src='iconset/joystick.png' border='0'><?=$rs[a_user]?><?
					}
					?>
					</td>
                    <td><div  class="FontNormal"><strong> &nbsp;
                    <?=$rs[a_pass]?>
                    &nbsp;</strong></div></td>
					<td><div  class="FontNormal"><strong> &nbsp;
				    <?=$rs[admin_name]?>
			 
					</strong></div></td>
					<td><div  class="FontNormal"><strong> &nbsp;
				    <?=$rs[admin_condition]?>
				    &nbsp;</strong></div></td>
					<td><div  class="FontNormal"><strong> &nbsp;
				    <?=$admin_con?>
 
				    &nbsp;</strong></div></td>
                    <td>
			 
										<div  class="FontNormal"><? 					if($_SESSION[sess_id_PAYMENT]==$rs[admin_id]||$_SESSION[sess_level_PAYMENT]=='2'){	 ?>
					<strong><img src="iconset/pencil-ruler.png">&nbsp;<a href="wap_admin_edit.php?id_auto=<?=$rs[admin_id]?>"  onclick="return hs.htmlExpand(this, { objectType: 'iframe' } )">แก้ไข</a>
					<?}?>
					</strong>

					<?
					if($_SESSION[sess_level_PAYMENT]=='2'){	
					if($_SESSION[sess_id_PAYMENT]!=$rs[admin_id]){

										if($rs[admin_status]=='1'){
										$bl='Block';$blz=0;
										}else 	if($rs[admin_status]=='0'){
										$bl='UNBlock';
										$blz=1;
										}
										?>
					<strong><img src="iconset/minus-button.png">&nbsp;<a href='?option=admin&id_auto=<?=$rs[admin_id]?>&up=9&s=<?=$blz?>' ><?=$bl?></a></strong></div>
		 <? }}?>
					
					</td>
                  </tr>
        <? }
					
	 
					if($_GET[up]=='9'){
					
 
					$upcSQL="update admin_user set admin_status='$_GET[s]' where admin_id='$_GET[id_auto]'";
					$QSQL=mysql_db_query($dbname,$upcSQL);

//echo "update admin_user set admin_status='$blz' where admin_id='$_GET[id_auto]'";
		print"<meta http-equiv=\"refresh\" content=\"0;URL=?option=admin\">\n"; 
					}
					
					
					?>

                     <tr>
                    <td colspan="7">
 <? if($total>0){ ?>
<div class="browse_page">
 <?php   
 // เรียกใช้งานฟังก์ชั่น สำหรับแสดงการแบ่งหน้า   
 $show='?option=admin';
  page_navigator($show,$before_p,$plus_p,$total,$total_p,$chk_page);    
  ?> 
</div>
<?php } ?></td>
                    </tr>
</table>
