
 
<style type="text/css">
<!--
.style5 {color: #FFFFFF; font-weight: bold; }
.style6 {color: #000000; font-weight: bold; }
.style9 {color: #FF0000; font-weight: bold; font-size:10pt; }
-->
</style>
  <table width="60%" border="0" align="center" cellpadding="0" cellspacing="0"> 
<tr>
                      <td bgcolor="#000000">          <DIV align=left class="FontMenu"><strong><br>&nbsp;&nbsp;<img src='iconset/information-balloon.png'> ลงทะเบียนใช้งาน<br><br></strong>   </DIV>                       </td>
</tr>
                  </table>
 
 
					<form id="frmdebt" name="frmdebt" method="post"  onsubmit='return debtcheck();'>
                                  <table width="60%" border="0" align="center" cellpadding="0" cellspacing="0" class="green">
								       <tr>
                                      <td><div align="right" class="style6">เลขที่บัตรประจำตัวประชาชน</div></td>
                                      <td><span class="style9">
                                      <input name="id_card" type="text" id="textfield17" size="55"  onKeyDown="if(event.keyCode==13){ document.frmdebt.uname.focus()}"   value=''  />
                                      *</span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">ชื่อ-ชื่อสกุล</div></td>
                                      <td><span class="style9">
                                      <input name="uname" type="text" id="textfield14" size="55"  onKeyDown="if(event.keyCode==13){ document.frmdebt.user1.focus()}"  value=''  />
                                      *</span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">Username</div></td>
                                      <td><span class="style9">
                                      <input name="user1" type="text" id="textfield17" size="55"  onKeyDown="if(event.keyCode==13){ document.frmdebt.pass1.focus()}"   value=''  />
                                      *</span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">Password</div></td>
                                      <td><input name="pass1" type="text" id="textfield16" size="55"  onKeyDown="if(event.keyCode==13){ document.frmdebt.depart.focus()}"   value=''   /></td>
                                    </tr>
 
                                    <tr>
                                      <td><div align="right" class="style6">หน่วยงาน</div></td>
                                      <td><span class="style9">

									<select name="depart"   >
									<? 
									$SQLBL="SELECT * FROM  department";
									$SQBL=$mysqli->query($SQLBL);
									?><option value="" selected>---------เลือกหน่วยงาน---------</option><?
									while($rs=$SQBL->fetch_assoc()){?>
      
	  <option value="<?=$rs[id_department]?>"  ><?=$rs[department_name]?></option>
	  <? } ?>
</select>

                                  
                                      *</span></td>
                                    </tr>
									         
                    <tr>
                      <td colspan="2" valign="top" bgcolor="#000000"><div align="center"><span class="style5"><br />
                      * ห้ามเว้นช่องว่าง</span><br />
                      <br />  
					  <input type="hidden" name="p_check" id="button" value="1" />
                        <input type="submit" name="button" id="button" value="บันทึกข้อมูล" class='btn'  />
                     <input type="button" name="resetall" id="button2" value="ยกเลิก"  class='btn'  onclick="javascript:location.href='?option=main'" />
                        <br />
                        <br />
                      </div></td>
                      </tr>
                  </table>
                  </form>

				  <? 
 

//$date_payss=date('Y-m-d',strtotime("+1 month"));
		  

if($_POST[p_check]=='1'){

$add_chk=date('Y-m-d H:i:s');
  
	 $sqlx2="select * from administrator where `idcard`='$_POST[id_card]'";
	 $query2=$mysqli->query($sqlx2);
	 $totalx=$query2->num_rows;
 if($totalx>'0'){
 print"<div align=center class=FontMenuLogin><h1>!! ERROR<br>ท่านเคยใช้รหัสบัตรประชาชนนี้สมัครไปแล้ว<br>หรือโทรแจ้งที่ งานไอที 261</h1></div>";  
 }else{

  $SQLs="INSERT INTO  `administrator` (
`administrator_id` ,
`administrator_name` ,
`administrator_username` ,
`administrator_password` ,
`administrator_datetime` ,
`administrator_op` ,
`admin_apppove` ,
`idcard`
)
VALUES (
NULL ,  '$_POST[uname]',  '$_POST[user1]',  '$_POST[pass1]',  '$add_chk',  '$_POST[depart]',  '0',  '$_POST[id_card]')"; 
$qqer =$mysqli->query($SQLs);

 print"<div align=center class=FontMenuLogin><img src='images/18.gif'><br>บันทึกข้อมูลเรียบร้อย..กรุณารอการตรวจสอบจากผู้ดูแลระบบ<br>หรือโทรแจ้งที่ งานไอที 261</div>";  
 
 print"<meta http-equiv=\"refresh\" content=\"1;URL=?option=main\">\n"; 

 }
}

				  ?>
<SCRIPT>
 
function debtcheck() {
 if(document.frmdebt.id_card.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.id_card.focus() ;
return false ;
}
 if(!checkID(document.frmdebt.id_card.value)){
alert('รหัสประชาชนไม่ถูกต้อง');return false ;}
 if(document.frmdebt.uname.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.uname.focus() ;
return false ;
}if(document.frmdebt.user1.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.user1.focus() ;
return false ;
} if(document.frmdebt.pass1.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.pass1.focus() ;
return false ;
}  if(document.frmdebt.depart.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.depart.focus() ;
return false ;
} 
else 
return true ;
}
                  </SCRIPT>
