<style type="text/css">
<!--
.style5 {color: #FFFFFF; font-weight: bold; }
.style6 {color: #000000; font-weight: bold; }
.style9 {color: #FF0000; font-weight: bold; }
-->
</style>
<?
	  		$q_num9="SELECT * FROM   debt WHERE hn_id_auto='$_GET[id_auto]'";
		  	$qr99=mysql_db_query($dbname,$q_num9);
			$rs=mysql_fetch_array($qr99);
?>
  <script language="JavaScript">
function chk(){

var a1=parseFloat(document.frmdebt.priceall.value);
var a2=parseFloat(document.frmdebt.pricepay2.value);
document.frmdebt.price_debt.value=a1-a2;  

}
//ให้รับเฉพาะตัวเลข
function checknumber() {
  key=event.keyCode
  if (key<48  ||  key>57) event.returnValue = false;
}
</script>
  <table width="60%" border="0" align="center" cellpadding="0" cellspacing="0"> 
<tr>
                      <td bgcolor="#000000">          <DIV align=left class="FontMenu"><strong><br>&nbsp;&nbsp;<img src='iconset/information-balloon.png'>สภาพหนี้<br><br></strong>   </DIV>                       </td>
</tr>
                  </table>
          
					<form id="frmdebt" name="frmdebt" method="post"  onsubmit='return debtcheck();'>
                                  <table width="60%" border="0" align="center" cellpadding="0" cellspacing="0" class="green">
                                    <tr>
                                      <td><div align="right" class="style6"><strong>หนังสือสัญญาเลขที่</strong></div></td>
                                      <td><span class="style9">*
                                        <?=$rs[book_id]?>
                                      <br />
                                      </span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">HN</div></td>
                                      <td><strong>&nbsp;
                                      <?=$rs[hn_id]?>
                                      </strong></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">AN</div></td>
                                      <td><strong>&nbsp;
                                      <?=$rs[an_id]?>
                                      </strong></td>
                                    </tr>
                                    <tr>
                                      <td width="18%"><div align="right" class="style6">ชื่อลูกหนี้</div></td>
                                      <td width="82%"><span class="style9">&nbsp;<?=$rs[dept_name]?></span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">อายุ</div></td>
                                      <td><strong>&nbsp;
                                      <?=$rs[dept_age]?>
&nbsp;ปี</strong></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">ที่อยู่ปัจจุบัน</div></td>
                                      <td><span class="style9">&nbsp;<?=$rs[dept_address]?></span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">หมู่ที่</div></td>
                                      <td><span class="style9">&nbsp;<?=$rs[dept_moo]?></span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">ตำบล</div></td>
                                      <td><span class="style9">&nbsp;<?=$rs[dept_tumbon]?></span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">อำเภอ</div></td>
                                      <td><span class="style9">&nbsp;<?=$rs[dept_amper]?></span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">จังหวัด</div></td>
                                      <td><span class="style9">&nbsp;<?=$rs[dept_province]?></span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">เบอร์โทรติดต่อ</div></td>
                                      <td><span class="style9">&nbsp;<?=$rs[dept_tel]?></span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">ประเภทผู้ป่วย</div></td>
                                      <td><span class="style9">&nbsp;<?=$rs[dept_type]?></span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">เมื่อวันที่</div></td>
                                      <td><span class="style9">&nbsp;<?=$rs[debt_date]?></span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">จำนวนเงินที่ต้องชำระทั้งสิ้น</div></td>
                                      <td><span class="style9">&nbsp;<?=number_format($rs[dept_price_all])?>&nbsp;บาท</span></td>
                                    </tr>
                    <tr>
                      <td colspan="2" bgcolor="#000000"><div align="right"> <br />
                        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                         
                          <tr>
                            <td colspan="3" bgcolor="#000000"><div align="left" class="FontMenu"><strong><br />
                              &nbsp;&nbsp;<img src='iconset/information-balloon.png' />รายการแจ้งหนี้ค้างชำระ&nbsp;<font color="#FF0000" size="+2">[ค้างชำระ&nbsp;<?=number_format($rs[dept_price_balance])?>&nbsp;บาท]</font><br />
                              <br />
                            </strong> </div></td>
                          </tr>
                          <tr>
                            <td width="8%" bgcolor="#00FF00"><div align="center"><strong>ลำดับ</strong></div></td>
                            <td width="65%" bgcolor="#00FF00"><div align="center"><strong>รายการ</strong></div></td>
                            <td width="27%" bgcolor="#00FF00"><div align="center"><strong>จำนวนเงิน</strong></div></td>
                          </tr>
                  <tr>
                            <td bgcolor="#000000"><div align="center" class="style5">1</div></td>
                            <td bgcolor="#000000"><span class="style5">ค่ายาและค่าบริการทางการแพทย์คงเหลือทั้งสิ้น</span></td>
                            <td bgcolor="#000000"><span class="style5">

                            <input name="priceall" type="text" id="textfield" size="10" onKeyUp="chk()" value='<?=$rs[dept_price_balance]?>' onkeypress='checknumber' readonly="readonly"/>
                            บาท*</span></td>
                          </tr>
                          <tr>
                            <td bgcolor="#000000"><div align="center" class="style5">2</div></td>
                            <td bgcolor="#000000"><span class="style5">ชำระ</span></td>
                            <td bgcolor="#000000"><span class="style5">
                            <input name="pricepay2" type="text" id="textfield4" size="10" onKeyUp="chk()" onkeypress='checknumber' value='0'/>
                            บาท*</span></td>
                          </tr>
                          <tr>
                            <td bgcolor="#000000"><div align="center" class="style5">3</div></td>
                            <td bgcolor="#000000"><span class="style5">คงเหลือค้างชำระ</span></td>
                            <td bgcolor="#000000"><span class="style5">
                            <input name="price_debt" type="text" id="textfield13" size="10"  onKeyUp="chk()" value='0' readonly/>
                            บาท*</span></td>
                          </tr>
                          <tr bgcolor="#FF6600">
                            <td colspan="3" bgcolor="#000000"><div align="center" class="style5">*จำนวนเงินคงเหลือทั้งสิ้นระบบจะคำนวนอัตโนมัติ</div></td>
                          </tr>
                        </table>
                        <br />
                      </div></td>
                      </tr>
                    <tr>
                      <td colspan="2" valign="top" bgcolor="#FF0000"><div align="center"><span class="style5"><br />
                      * ห้ามเว้นช่องว่าง ไม่มีให้ -</span><br />
                      <br />
                      <input type="hidden" name="p_check" id="button" value="1" />
                        <input type="submit" name="button" id="button" value="บันทึกข้อมูล" />
 						   <input type="button" name="button2" id="button2" value="ยกเลิก" onclick="javascript:location='?option=receivables'" />
                        <br />
                        <br />
                      </div></td>
                      </tr>
                  </table>
  </form>
  			  <?



if($_POST[p_check]=='1'&&$_POST[pricepay2]<=$rs[dept_price_balance]&&$_POST[pricepay2]>0){

$add_chk=date('Y-m-d h:i:s');

$pay_money=$rs[dept_price_balance]-$_POST[pricepay2];

$add_SQL="update debt set dept_price_balance='$pay_money' where hn_id_auto='$rs[hn_id_auto]'";
$QUSQL=mysql_db_query($dbname,$add_SQL);

$add_SQL2="INSERT INTO   `pay` (
`p_id` ,
`hn_id_auto` ,
`add_id` ,
`price_num_all` ,
`pricepay` ,
`dept_price_balance` ,
`datepay`,
`date_pay_one`
)
VALUES (
NULL ,  '$rs[hn_id_auto]',  '$rs[hn_id]',  '$_POST[priceall]','$_POST[pricepay2]','$_POST[price_debt]','$add_chk',  '$rs[debt_date]')";
$QUSQL2=mysql_db_query($dbname,$add_SQL2);
 

 print"<div align=center class=FontMenuLogin><img src='images/18.gif'><br>บันทึกข้อมูลเรียบร้อย..  </div>";  
 print"<meta http-equiv=\"refresh\" content=\"0;URL=?option=receivables\">\n";
}else{

print"<div align=center class=FontMenuLogin><br><h1>ผิดพลาด กรุณาตรวจสอบความถูกต้อง..  </h1></div>";  
}


				  ?>
<SCRIPT>
 
function debtcheck() {
if(document.frmdebt.bookno.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.bookno.focus() ;
return false ;
}
if(document.frmdebt.hnno.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.hnno.focus() ;
return false ;
}if(document.frmdebt.anno.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.anno.focus() ;
return false ;
}if(document.frmdebt.myname.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.myname.focus() ;
return false ;
}if(document.frmdebt.age.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.age.focus() ;
return false ;
}if(document.frmdebt.address.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.address.focus() ;
return false ;
}if(document.frmdebt.moote.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.moote.focus() ;
return false ;
}if(document.frmdebt.tumbon.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.tumbon.focus() ;
return false ;
}if(document.frmdebt.amper.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.amper.focus() ;
return false ;
}if(document.frmdebt.province.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.province.focus() ;
return false ;
}if(document.frmdebt.telnumber.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.telnumber.focus() ;
return false ;
}if(document.frmdebt.pptype.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.pptype.focus() ;
return false ;
}if(document.frmdebt.dateadd.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.dateadd.focus() ;
return false ;
}if(document.frmdebt.pricepay.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.pricepay.focus() ;
return false ;
}if(document.frmdebt.priceall.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.priceall.focus() ;
return false ;
}if(document.frmdebt.pricepay2.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.pricepay2.focus() ;
return false ;
}if(document.frmdebt.price_debt.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.price_debt.focus() ;
return false ;
} 
else 
return true ;
}
                  </SCRIPT>
