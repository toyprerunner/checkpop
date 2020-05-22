                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="green">
                   <tr colspan="9"  bgcolor="#000000"><td colspan="8" ><div class="buttons">
				   
				   <button type="button" name="button222" id="button" value="บันทึกข้อมูล"  onclick="" disabled class="positive"><img src="iconset/monitor_edit.png" alt=""/>ผู้ใช้งาน</button> 
			 

				   </div>	</td></tr>
    <?if($_GET[edit]=='1'){
	 $sqlx="select * from administrator,department where administrator.administrator_op=department.id_department and administrator.administrator_id='$_GET[id]'";
 $query=$mysqli->query($sqlx);
 	 $rs=$query->fetch_assoc();
	?>
                  <form id="plb" name="plb" method="post" action="" onsubmit='return plbcheck();'>
                    <tr  colspan="9">
                      <td colspan="2"   align="center" bgcolor="#FFFFCC"><strong><img src="iconset/information-balloon.png" width="16" height="16" /> </strong><strong>ชื่อ
                        <input name="name1" type="text" id="textfield" size="40" value='<?=$rs[administrator_name]?>'/>
                      </strong></td>
                      <td   align="center" valign="top" bgcolor="#FFFFCC"><strong>รหัสผู้ใช้ 
               <input name="user1" type="text" id="textfield" size="10"  value='<?=$rs[administrator_username]?>'/>
			   รหัสผ่าน
               <input name="pass1" type="text" id="textfield" size="10" value='<?=$rs[administrator_password]?>'/>
			    หน่วยงาน :: <?=$rs[department_name]?> 
                      </strong></td>
                      <td   align="center" bgcolor="#FFFFCC"  colspan="5" >
                    <input type="hidden" name="id_department" id="hadd" value="<?=$rs[administrator_op]?>" />
					  
                    <input type="hidden" name="aid" id="hadd" value="<?=$rs[administrator_id]?>" />
                        <input type="hidden" name="hadd" id="hadd" value="checknum2" />
                      <input type="submit" name="save" id="button" value="บันทึก" />
                      <input type="button" name="resetall" id="button2" value="ยกเลิก" onclick="javascript:location.href='?option=add_user'" /></td>
                    </tr>
</form>
<? } ?>
              
 
                  <tr>
                    <td   align="center" bgcolor="#CCCCCC"><div align='center'><strong>รหัส</strong><div/></td>
                    <td  align="center" bgcolor="#CCCCCC"><div align='center'><strong>รายการ</strong><div/></td>
                    <td   align="center" bgcolor="#CCCCCC"><div align='center'><strong>ชื่อ</strong><div/></td>
					    <td   align="center" bgcolor="#CCCCCC"><div align='center'><strong>รหัสผ่าน</strong><div/></td>
                    <td   align="center" bgcolor="#CCCCCC"><div align='center'><strong>จัดการ</strong><div/></td>
					 <td   align="center" bgcolor="#CCCCCC"><div align='center'><strong>Appove</strong><div/></td>
					 <td   align="center" bgcolor="#CCCCCC"><div align='center'><strong>DELETE</strong><div/></td>
                  </tr>
 <?
 $sqlx="select * from administrator";
 $query=$mysqli->query($sqlx);
 	 while($rs=$query->fetch_assoc()){
 ?>
                  <tr>
                    <td><div  class="FontNormal">&nbsp;<?=$rs[administrator_id]?></div></td>
                    <td><div  class="FontNormal">&nbsp;<?=$rs[administrator_name]?></div></td>
                    <td><div  class="FontNormal"><img src="iconset/user.png">&nbsp;<?=$rs[administrator_username]?>[<?=$rs[administrator_op]?>]</div></td>
					<td><div  class="FontNormal">&nbsp;<?=$rs[administrator_password]?></div></td>
                    <td><div class="buttons"    align="center" ><button type="button" name="button222" id="button" value="บันทึกข้อมูล"  onclick="javascript:location.href='?option=add_user&edit=1&id=<?=$rs[administrator_id]?>'"  class="positive">Edit</button> </div></td>

                    <td>

					<?if($rs[admin_apppove]=='0'){?>
					<div class="buttons"    align="center" ><button type="button" name="button222" id="button" value="บันทึกข้อมูล"  onclick="javascript:location.href='?option=add_user&hadd=2&id=<?=$rs[administrator_id]?>'"  class="positive">Appove</button> </div>
					<? }else{ 
					echo "<div align='center'><font color=red><b>Yes</b></a></div>";
					}
					?>
					
					</td>                    
					<td>					
					<? if($_SESSION["sess_id_datacenter"]==$rs[administrator_id]){ ?>
					<div class="buttons"    align="center" ><button type="button" name="button222" id="button" value="บันทึกข้อมูล"     class="positive">ลบไม่ได้</button> </div>
					<?}else{?>
					<div class="buttons"    align="center" ><button type="button" name="button222" id="button" value="บันทึกข้อมูล"  onclick="javascript:location.href='?option=add_user&hadd=1&id=<?=$rs[administrator_id]?>'"  class="positive">Delete</button> </div>

					<?}?>
					</td>


					
                  </tr>
        <? } ?>

           
</table>
 <?
 if($_POST[hadd]=='checknum'){
$datesix=date('Y-m-d h:i:s');
 $SQLs="INSERT INTO  `administrator` (
`administrator_id` ,
`administrator_name` ,
`administrator_username` ,
`administrator_password` ,
`administrator_datetime` ,
`administrator_op`
)
VALUES ('0', '$_POST[name1]' , '$_POST[user1]' , '$_POST[pass1]' , $datesix , '$_POST[id_department]')
"; 
$qqer =$mysqli->query($SQLs);
 
 print"<div align=center  class=FontMenuLogin><img src='images/18.gif'><br>บันทึกข้อมูล..</div>";
 print"<meta http-equiv=\"refresh\" content=\"0;URL=?option=add_user\">\n";
 
 }else if($_POST[hadd]=='checknum2'){
 
 $SQLs="UPDATE   `administrator` SET  `administrator_name` =  '$_POST[name1]',`administrator_username` =  '$_POST[user1]',`administrator_password` =  '$_POST[pass1]',`administrator_op` =  '$_POST[id_department]' WHERE  `administrator`.`administrator_id` ='$_POST[aid]'"; 
$qqer =$mysqli->query($SQLs);
 
 print"<div align=center  class=FontMenuLogin><img src='images/18.gif'><br>บันทึกข้อมูล..</div>";
 print"<meta http-equiv=\"refresh\" content=\"0;URL=?option=add_user\">\n";
 
 }

 if($_GET[hadd]=='2'){
 
 $SQLs="UPDATE   `administrator` SET   `admin_apppove` ='1' WHERE  `administrator`.`administrator_id` ='$_GET[id]'"; 
$qqer =$mysqli->query($SQLs);
 
 print"<div align=center  class=FontMenuLogin><img src='images/18.gif'><br>บันทึกข้อมูล..</div>";
 print"<meta http-equiv=\"refresh\" content=\"0;URL=?option=add_user\">\n";
 
 } if($_GET[hadd]=='1'){
 
 $SQLs="delete  from   `administrator` where     `administrator`.`administrator_id` ='$_GET[id]'"; 
$qqer =$mysqli->query($SQLs);
 
 print"<div align=center  class=FontMenuLogin><img src='images/18.gif'><br>ลบข้อมูล..</div>";
 print"<meta http-equiv=\"refresh\" content=\"0;URL=?option=add_user\">\n";
 
 }
 ?>

<SCRIPT>
function plbcheck() {
if(document.plb.name1.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.plb.name1.focus() ;
return false ;
}
if(document.plb.user1.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.plb.user1.focus() ;
return false ;
}if(document.plb.pass1.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.plb.pass1.focus() ;
return false ;
}if(document.plb.id_department.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.plb.id_department.focus() ;
return false ;
}
else 
return true ;
}
 </SCRIPT>