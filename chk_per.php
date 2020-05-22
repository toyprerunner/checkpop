<body onload="document.checkFormsearchhn.searchforhn.focus();"> 
<style type="text/css">
<!--
.style5 {color: #FFFFFF; font-weight: bold; }
.style6 {color: #000000; font-weight: bold; }
.style9 {color: #FF0000; font-weight: bold; }
-->
</style>


   <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>  
<div class="buttons">
    <button type="button" name="button222" id="button" value="บันทึก/ตรวจสอบ-ข้อมูล"    class="positive">
 <img src="images/tick.png" alt=""/>บันทึก/ตรวจสอบ-ข้อมูล
    </button> 
                      </td>
                    </tr>
                  </table>
                  <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" >
                    <tr>
                    <td colspan="7" bgcolor="#333">	
					<form name="checkFormsearchhn"  onsubmit='return debtcheck_per();'   method="POST" enctype="multipart/form-data" action='?option=debt'>

					        <table width="50%" border="0" align="center" cellpadding="0" cellspacing="0" class="green" >	
                           <BR>     
							 <tr><td   bgcolor="#333"><img src="iconset/female.png"  /><font color="#FFFFFF" size="3"><b>กรอก HN แม่</b></font></td>
							 <td   bgcolor="#333"><input type="text" name="searchforhn" id="textfield"  onkeypress="return RestrictSpace()" style="width: 230px; height: 15px"/></td></tr>                  
						   <tr><td   bgcolor="#333" > <img src="iconset/calculator.png"  /><font color="#FFFFFF" size="3"><b>วันที่รับไว้</b></font></td><td   bgcolor="#333"> <INPUT   type=text  name="date11" id="popupDatepicker2" readonly  value="" style="width: 230px; height: 15px" /></td></tr>     
						    <tr><td   bgcolor="#333"><img src="iconset/eye.png"  /><font color="#FFFFFF" size="3"><b>เลือกเหตุการณ์</b></font></td><td   bgcolor="#333"> <SELECT name="events">
						   <OPTION value="" selected>-> เลือกเหตุการณ์ </OPTION>
						   <OPTION value="0" >->คลอดที่ รพ.-> ปกติ</OPTION>
						    <OPTION value="1">->คลอดที่ รพ.-> เด็กเสียชีวิต</OPTION>
 						   	<OPTION value="2">->ยังไม่คลอด -> กลับบ้าน/REFER/ADMIT</OPTION>
						    <OPTION value="3">->ไม่ได้คลอดที่ รพ. [คลอดที่บ้าน/อื่นๆ]</OPTION>

						   </SELECT></td></tr>                  
							 <tr><td   bgcolor="#333" colspan="7"><input type="hidden" name="searchforhn_chk" id="textfield"  value="1" />  <BR>
                              <div align="center"><input type="submit" name="button" id="button" value="ค้นหา" class='btn' /></div></td> </tr>                  
						

</table><BR> </form>             </td>
                    </tr> 

</table>
</body>
<SCRIPT>

function debtcheck_per() {
 if(document.checkFormsearchhn.searchforhn.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.checkFormsearchhn.searchforhn.focus() ;
return false ;
}
if(isNaN(document.checkFormsearchhn.searchforhn.value)){
alert('กรอกตัวเลขเท่านั้น');
document.checkFormsearchhn.searchforhn.focus() ;
return false;
 } if(document.checkFormsearchhn.date11.value=="") {
alert("เลือกวันที่") ;
document.checkFormsearchhn.date11.focus() ;
return false ;
}if(document.checkFormsearchhn.events.value=="") {
alert("เลือกเหตุการณ์") ;
document.checkFormsearchhn.events.focus() ;
return false ;
}
else 
return true ;
} 
 
                  </SCRIPT>


 