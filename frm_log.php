<body onload = "document.loginform.name.focus()";>

<!-- Main Body Starts Here -->
<div id="main_body">

<!-- Form Title Starts Here -->
<div class="form_title">
<img src="images/form_title.gif" alt="Smmhospital" />
</div>
<!-- Form Title Ends Here -->

<!-- Form Starts Here -->
<div class="form_box">
<form id="loginform" name="loginform" method="post" action="" onsubmit='return check_LOG();' autocomplete='off' >
<table  border="0" cellpadding="0" cellspacing="0"  >
  <tr>
    <td>&nbsp;<p class="form_text">
<b><center><font color="#FFFFFF">ชื่อผู้ใช้งาน</font></center></b>
</p></td>
    <td>&nbsp;<p class="form_input_BG"><input type="text" name="name" id="name" value="" /></p></td>
  </tr>
  <tr>
    <td>&nbsp;<p class="form_text"  >
<b><center><font color="#FFFFFF">รหัสผ่านผู้ใช้งาน</font></center></b>
</p></td>
    <td>&nbsp;<p class="form_input_BG"><input type="password" name="pwd" id="pwd" value="" /></p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td> 
<INPUT  type=hidden value='login' name='login'> 
<input title="login Now" style="margin-left:96px;" type="image" src="images/login_btn.png" name="login" id="login" /> 
 

 </td>
  </tr>
</table>
 

</form>

</div>
<!-- Form Ends Here -->

</div>
<!-- Main Body Ends Here -->
<div align='center'>
<div class="buttons"><button type="button" name="button222" id="button" value="ลงทะเบียนใหม่"  onclick="javascript:location.href='?option=register'"  class="positive">ลงทะเบียนใหม่</button> </div>
 

</div>
 <?
 if($_POST[login]=='login'){
  

 
 $SQLs="SELECT * FROM  administrator,department  WHERE administrator.administrator_op=department.id_department and administrator.administrator_username  ='$_POST[name]'  AND administrator.administrator_password ='$_POST[pwd]'"; 
 		$qqer =$mysqli->query($SQLs);
 	$NumRows = $qqer->num_rows;
 	$rs=$qqer->fetch_assoc(); 
 if($NumRows>="1"){ 
 
 
				session_start();
				$_SESSION["sess_userlog_datacenter"]="".$rs[administrator_name]."";
				$_SESSION["sess_id_datacenter"]=$rs[administrator_id];
 $_SESSION["sess_code"]=$rs[administrator_op];
  $_SESSION["sess_depart"]=$rs[department_name];
				session_write_close();
 
 print"<div align=center  class=FontMenuLogin><img src='images/18.gif'><br>กำลังเข้าสู่ระบบ..</div>";
  print"<meta http-equiv=\"refresh\" content=\"0;URL=index.php?option=report_lrall_month\">\n";
 }else{
print"<div align=center  class=FontMenuLogin><img src='images/18.gif'><br>ไม่พบผู้ใช้..</div>";

 print"<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">\n";
 }
 }
 ?>

                       </body>
                        <SCRIPT>
function check_LOG() {
if(document.loginform.name.value=="") {
alert("กรอกชื่อผู้ใช้งาน") ;
document.loginform.name.focus() ;
return false ;
}
if(document.loginform.pwd.value=="") {
alert("กรอกรหัสผ่าน") ;
document.loginform.pwd.focus() ;
return false ;
}
else 
return true ;
}
 </SCRIPT>