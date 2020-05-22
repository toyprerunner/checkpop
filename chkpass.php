                  <table   border="0" align="center" cellpadding="0" cellspacing="0" class="green">
                   <tr colspan="9"  bgcolor="#000000"><td colspan="8" ><div class="buttons"><button type="button" name="button222" id="button" value="บันทึกข้อมูล"  onclick="" disabled class="positive"><img src="iconset/monitor_edit.png" alt=""/>ผู้ใช้งาน [<?=$_SESSION["sess_userlog_datacenter"]?>]</button> </div>	</td></tr>
    <? 
	 $sqlx="select * from administrator where administrator_id='$_SESSION[sess_id_datacenter]'";
 $query=$mysqli->query($sqlx);
 	 $rs=$query->fetch_assoc();
	?>
                  <form id="plb" name="plb" method="post" action="" onsubmit='return plbcheck();'>
                    <tr  colspan="9">
                      <td colspan="2"   align="center" bgcolor="#FFFFCC"><strong><img src="iconset/information-balloon.png" width="16" height="16" /> </strong><strong>ชื่อหน่วยงาน-><font color=red><?=$rs[administrator_name]?></font>
                      </strong></td>
                      <td   align="center" valign="top" bgcolor="#FFFFCC"><strong>รหัสผู้ใช้-><font color=red><?=$rs[administrator_username]?></font> 
			   รหัสผ่านเดิม
               <input name="pass1" type="text" id="textfield" size="10" value=''/>
			   รหัสผ่านใหม่
               <input name="pass2" type="text" id="textfield" size="10" value=''/>
                      </strong></td>
                      <td   align="center" bgcolor="#FFFFCC"  colspan="2" >
                    <input type="hidden" name="aid" id="hadd" value="<?=$rs[administrator_id]?>" />
                        <input type="hidden" name="hadd" id="hadd" value="checknum2" />
                      <input type="submit" name="save" id="button" value="บันทึก" />
                      <input type="reset" name="resetall" id="button2" value="ยกเลิก" /></td>
                    </tr>
</form>
 
 
                  <tr>
                    <td   align="center" bgcolor="#CCCCCC"><strong>รหัส</strong></td>
                    <td  align="center" bgcolor="#CCCCCC"><strong>รายการ</strong></td>
                    <td   align="center" bgcolor="#CCCCCC"><strong>ชื่อ</strong></td>
					    <td   align="center" bgcolor="#CCCCCC"><strong>รหัสผ่าน</strong></td>
 
                  </tr>
 <?
 $sqlx="select * from administrator where administrator_id='$_SESSION[sess_id_datacenter]'";
 $query=$mysqli->query($sqlx);
 	 while($rs=$query->fetch_assoc()){
 ?>
                  <tr>
                    <td><div  class="FontNormal">&nbsp;<?=$rs[administrator_id]?></div></td>
                    <td><div  class="FontNormal">&nbsp;<?=$rs[administrator_name]?></div></td>
                    <td><div  class="FontNormal"><img src="iconset/user.png">&nbsp;<?=$rs[administrator_username]?>[<?=$rs[administrator_op]?>]</div></td>
					<td><div  class="FontNormal">&nbsp;<?=$rs[administrator_password]?></div></td>
             
                  </tr>
        <? } ?>

           
</table>
 <?
 if($_POST[hadd]=='checknum2'){

	 $sqlx2="select * from administrator where administrator_password='$_POST[pass1]'";
	 $query2=$mysqli->query($sqlx2);
	 $totalx=$query2->num_rows;
 if($totalx>'0'){
 $SQLs="UPDATE   `administrator` SET   `administrator_password` =  '$_POST[pass2]' WHERE   `administrator_id` ='$_POST[aid]'"; 
$qqer =$mysqli->query($SQLs);
 
 print"<div align=center  class=FontMenuLogin><img src='images/18.gif'><br>บันทึกข้อมูล..</div>";
 print"<meta http-equiv=\"refresh\" content=\"0;URL=?option=chkpass\">\n";
 }//IF
else{
 print"<div align=center  class=FontMenuLogin><br><h1>ไม่สามารถทำรายการได้<br>ข้อมูลที่ท่านกรอกไม่ถูกต้อง..<br><br>ติดต่อ..งานไอที 261</h1></div>";
 
}
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