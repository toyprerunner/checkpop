<style type="text/css">
<!--
.style2 {color: #000000; font-weight: bold; }
-->
</style>
  <table width="60%" border="0" align="center" cellpadding="0" cellspacing="0"><br><br>
<tr>
                      <td bgcolor="#000000">          <DIV align=left class="FontMenu"><strong><br>&nbsp;&nbsp;<img src='iconset/information-balloon.png'>ติดต่อแจ้งปัญหาการใช้งาน<br><br></strong>   </DIV>                       </td>
</tr>
                  </table>
					<form id="form1" name="form1" method="post" action="">
                                  <table width="60%" border="0" align="center" cellpadding="0" cellspacing="0" class="green">
                    <tr>
                      <td width="18%"><div align="right" class="style2">เรื่อง</div></td>
                      <td width="82%"><input name="textfield" type="text" id="textfield" size="55" /></td>
                    </tr>
                    <tr>
                      <td valign="top"><div align="right" class="style2">รายละเอียด</div></td>
                      <td><textarea name="textarea" id="textarea" cols="55" rows="15"></textarea>
                        <br />
                        <input type="submit" name="button" id="button" value="ส่งข้อความ" />
                        <input type="submit" name="button2" id="button2" value="ยกเลิก" /></td>
                    </tr>
                  </table>
</form>
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
