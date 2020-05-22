
<?
 

				$q = "SELECT * FROM  debt,plb where  debt.dept_type=plb.plb_ib AND debt.hn_id_auto='$_GET[id_auto]' ";
				
									$qr=mysql_db_query($dbname,$q);
									$rs=mysql_fetch_array($qr)
?>
<style type="text/css">
<!--
.style5 {color: #FFFFFF; font-weight: bold; }
.style6 {color: #000000; font-weight: bold; }
.style9 {color: #FF0000; font-weight: bold; font-size:10pt; }
-->
</style>
  <table width="60%" border="0" align="center" cellpadding="0" cellspacing="0"> 
<tr>
                      <td bgcolor="#000000">          <DIV align=left class="FontMenu"><strong><br>&nbsp;&nbsp;<img src='iconset/information-balloon.png'>บันทึกข้อมูลยอมรับสภาพหนี้<br><br></strong>   </DIV>                       </td>
</tr>
                  </table>
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
 
					<form id="frmdebt" name="frmdebt" method="post"  onsubmit='return debtcheck();'>
                                  <table width="60%" border="0" align="center" cellpadding="0" cellspacing="0" class="green">
                                    <tr>
                                      <td><div align="right" class="style6">เลขที่หนังสือ</div></td>
                                      <td><span class="style9">
                                      <input name="bookno" type="text" id="textfield14" size="55"  onKeyDown="if(event.keyCode==13){ document.frmdebt.hnno.focus()}"  value='<?=$rs[book_id]?>'  />
                                      *<br />
                                       อบ0027.301(2)/3350</span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">HN</div></td>
                                      <td><span class="style9">
                                      <input name="hnno" type="text" id="textfield17" size="55"  onKeyDown="if(event.keyCode==13){ document.frmdebt.anno.focus()}"   value='<?=$rs[hn_id]?>'  />
                                      *</span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">AN</div></td>
                                      <td><input name="anno" type="text" id="textfield16" size="55"  onKeyDown="if(event.keyCode==13){ document.frmdebt.idcard1.focus()}"   value='<?=$rs[an_id]?>'   /></td>
                                    </tr>
									          <tr>
                                      <td width="18%"><div align="right" class="style6">เลขที่บัตรประชาชน</div></td>
                                      <td width="82%"><span class="style9">
                                      <input name="idcard1" type="text" id="textfield3" size="55"  onKeyDown="if(event.keyCode==13){ document.frmdebt.myname.focus()}"  value='<?=$rs[idcard]?>'  onkeypress="autoTab(this)"   />
                                      *</span></td>
                                    </tr>
                                    <tr>
                                      <td width="18%"><div align="right" class="style6">ข้าพเจ้า</div></td>
                                      <td width="82%"><span class="style9">
                                      <input name="myname" type="text" id="textfield3" size="55"  onKeyDown="if(event.keyCode==13){ document.frmdebt.age.focus()}"  value='<?=$rs[dept_name]?>'  />
                                      *</span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">อายุ</div></td>
                                      <td><span class="style9">
                                        <select name="age" id="select" onKeyDown="if(event.keyCode==13){ document.frmdebt.address.focus()}">
                                          <option   value="<?=$rs[dept_age]?>" selected="selected">--<?=$rs[dept_age]?>--</option>
                                          <? 
									  $iage='10';
									  while($iage<=110){?>
                                          <option   value="<?=$iage?>">
                                          <?=$iage?>
                                          </option>
                                          <? $iage++; } ?>
                                          </select>
                                      *                                      </span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">ที่อยู่ปัจจุบัน</div></td>
                                      <td><span class="style9">
                                      <input name="address" type="text" id="textfield5" size="55" onKeyDown="if(event.keyCode==13){ document.frmdebt.moote.focus()}"  value='<?=$rs[dept_address]?>' />
                                      *</span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">หมู่ที่</div></td>
                                      <td><span class="style9">
                                      <input name="moote" type="text" id="textfield6" size="55" onKeyDown="if(event.keyCode==13){ document.frmdebt.tumbon.focus()}"  value='<?=$rs[dept_moo]?>' />
                                      *</span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">ตำบล</div></td>
                                      <td><span class="style9">
                                      <input name="tumbon" type="text" id="textfield7" size="55"  onKeyDown="if(event.keyCode==13){ document.frmdebt.amper.focus()}" value='<?=$rs[dept_tumbon]?>'   />
                                      *</span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">อำเภอ</div></td>
                                      <td><span class="style9">
                                      <input name="amper" type="text" id="textfield8" size="55"  onKeyDown="if(event.keyCode==13){ document.frmdebt.province.focus()}"  value='<?=$rs[dept_amper]?>'  />
                                      *</span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">จังหวัด</div></td>
                                      <td><span class="style9">
                                      <select name="province"  onKeyDown="if(event.keyCode==13){ document.frmdebt.telnumber.focus()}">
      <option value="<?=$rs[dept_province]?>" selected>--<?=$rs[dept_province]?>--</option>
      <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
      <option value="กระบี่">กระบี่ </option>
      <option value="กาญจนบุรี">กาญจนบุรี </option>
      <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
      <option value="กำแพงเพชร">กำแพงเพชร </option>
      <option value="ขอนแก่น">ขอนแก่น</option>
      <option value="จันทบุรี">จันทบุรี</option>
      <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
      <option value="ชัยนาท">ชัยนาท </option>
      <option value="ชัยภูมิ">ชัยภูมิ </option>
      <option value="ชุมพร">ชุมพร </option>
      <option value="ชลบุรี">ชลบุรี </option>
      <option value="เชียงใหม่">เชียงใหม่ </option>
      <option value="เชียงราย">เชียงราย </option>
      <option value="ตรัง">ตรัง </option>
      <option value="ตราด">ตราด </option>
      <option value="ตาก">ตาก </option>
      <option value="นครนายก">นครนายก </option>
      <option value="นครปฐม">นครปฐม </option>
      <option value="นครพนม">นครพนม </option>
      <option value="นครราชสีมา">นครราชสีมา </option>
      <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
      <option value="นครสวรรค์">นครสวรรค์ </option>
      <option value="นราธิวาส">นราธิวาส </option>
      <option value="น่าน">น่าน </option>
      <option value="นนทบุรี">นนทบุรี </option>
      <option value="บึงกาฬ">บึงกาฬ</option>
      <option value="บุรีรัมย์">บุรีรัมย์</option>
      <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
      <option value="ปทุมธานี">ปทุมธานี </option>
      <option value="ปราจีนบุรี">ปราจีนบุรี </option>
      <option value="ปัตตานี">ปัตตานี </option>
      <option value="พะเยา">พะเยา </option>
      <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
      <option value="พังงา">พังงา </option>
      <option value="พิจิตร">พิจิตร </option>
      <option value="พิษณุโลก">พิษณุโลก </option>
      <option value="เพชรบุรี">เพชรบุรี </option>
      <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
      <option value="แพร่">แพร่ </option>
      <option value="พัทลุง">พัทลุง </option>
      <option value="ภูเก็ต">ภูเก็ต </option>
      <option value="มหาสารคาม">มหาสารคาม </option>
      <option value="มุกดาหาร">มุกดาหาร </option>
      <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
      <option value="ยโสธร">ยโสธร </option>
      <option value="ยะลา">ยะลา </option>
      <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
      <option value="ระนอง">ระนอง </option>
      <option value="ระยอง">ระยอง </option>
      <option value="ราชบุรี">ราชบุรี</option>
      <option value="ลพบุรี">ลพบุรี </option>
      <option value="ลำปาง">ลำปาง </option>
      <option value="ลำพูน">ลำพูน </option>
      <option value="เลย">เลย </option>
      <option value="ศรีสะเกษ">ศรีสะเกษ</option>
      <option value="สกลนคร">สกลนคร</option>
      <option value="สงขลา">สงขลา </option>
      <option value="สมุทรสาคร">สมุทรสาคร </option>
      <option value="สมุทรปราการ">สมุทรปราการ </option>
      <option value="สมุทรสงคราม">สมุทรสงคราม </option>
      <option value="สระแก้ว">สระแก้ว </option>
      <option value="สระบุรี">สระบุรี </option>
      <option value="สิงห์บุรี">สิงห์บุรี </option>
      <option value="สุโขทัย">สุโขทัย </option>
      <option value="สุพรรณบุรี">สุพรรณบุรี </option>
      <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
      <option value="สุรินทร์">สุรินทร์ </option>
      <option value="สตูล">สตูล </option>
      <option value="หนองคาย">หนองคาย </option>
      <option value="หนองบัวลำภู">หนองบัวลำภู </option>
      <option value="อำนาจเจริญ">อำนาจเจริญ </option>
      <option value="อุดรธานี">อุดรธานี </option>
      <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
      <option value="อุทัยธานี">อุทัยธานี </option>
      <option value="อุบลราชธานี">อุบลราชธานี</option>
      <option value="อ่างทอง">อ่างทอง </option>
 
</select>

                                      *</span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">เบอร์โทรติดต่อ</div></td>
                                      <td><span class="style9">
                                      <input name="telnumber" type="text" id="textfield10" size="55"   onKeyDown="if(event.keyCode==13){ document.frmdebt.pptype.focus()}" value='<?=$rs[dept_tel]?>' />
                                      *</span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">สิทธิ</div></td>
                                      <td><span class="style9">

									<select name="pptype" onKeyDown="if(event.keyCode==13){ document.frmdebt.patients1.focus()}" >
									<? 
									$SQLBL="SELECT * FROM  plb";
									$SQBL=mysql_db_query($dbname,$SQLBL);
?><option value="<?=$rs[dept_type]?>" selected>--------- <?=$rs[plb_detail]?>---------</option><?
									while($ptype=mysql_fetch_array($SQBL)){?>
      
	  <option value="<?=$ptype[plb_ib]?>"  ><?=$ptype[plb_detail]?></option>
	  <? } ?>
</select>

                                  
                                      *</span></td>
                                    </tr>
									                <tr>
                                      <td><div align="right" class="style6">ผู้ป่วยประเภท</div></td>
                                      <td><span class="style9">
                                      <input name="patients1" type="text" id="textfield10" size="55"  onKeyDown="if(event.keyCode==13){ document.frmdebt.pricepay.focus()}" value='<?=$rs[patients]?>' />
                                      *<BR> เช่น อุบัติเหตุจราจร</span></td>
                                    </tr>

<?
$SQL_chk_debt="SELECT * FROM pay  WHERE add_id='$rs[hn_id]' AND price_num_all='$rs[dept_price_all]'";
$QUSQL_debt=mysql_db_query($dbname,$SQL_chk_debt);
$SQL_chk_debt_sun=mysql_num_rows($QUSQL_debt);
if($SQL_chk_debt_sun<=1){

?>

                                    <tr>
                                      <td><div align="right" class="style6">ทำสัญญาเมื่อวันที่</div></td>
                                      <td><span class="style9">  <INPUT   type=text  name="dateadd"   onClick="popUpCalendar(this, frmdebt.dateadd, 'yyyy-mm-dd')" readonly  value="<?=$rs[debt_date]?>" onKeyDown="if(event.keyCode==13){ document.frmdebt.pricepay.focus()}" />
									  </span></td>
                                    </tr>
							 

									<? }else{?>
									 <tr>
                                      <td><div align="right" class="style6">ทำสัญญาเมื่อวันที่</div></td>
                                      <td><span class="style9">
									  <?=$Dlib->MadeDay($rs[debt_date])?><BR><font color='#000000' size='2'>**ไม่สารถแก้ไขวันที่ ทำสัญญาได้ เนื่องจากได้มีการชำระเงินแล้ว</font>
									  </span></td>
                                    </tr>
									
								<?	} ?>
                                    <tr>
                                      <td><div align="right" class="style6">จำนวนเงินที่ต้องชำระทั้งสิ้น</div></td>
                                      <td><span class="style9"><?=number_format($rs[dept_price_all],0)?>&nbsp;บาท</span></td>
                                    </tr>
                 
                    <tr>
                      <td colspan="2" valign="top" bgcolor="#000000"><div align="center"><span class="style5"><br />
                      * ห้ามเว้นช่องว่าง ไม่มีให้ -</span><br />
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
 

$date_payss=date('Y-m-d',strtotime("+1 month"));
		  

if($_POST[p_check]=='1'){

$add_chk=date('Y-m-d h:i:s');

$dd_pay= add_date("".$_POST[dateadd]."",0,1,0);
 
  $add_SQL10="UPDATE  `debt_info` SET  `debt_info_an_id` =  '$_POST[anno]',`debt_info_idcard` =  '$_POST[idcard1]',`debt_info_dept_name` =  '$_POST[myname]',`debt_info_dept_age` =  '$_POST[age]',`debt_info_dept_address` =  '$_POST[address]',`debt_info_dept_moo` =  '$_POST[moote]',`debt_info_dept_tumbon` =  '$_POST[tumbon]',`debt_info_dept_amper` =  '$_POST[amper]',`debt_info_dept_province` =  '$_POST[province]',`debt_info_dept_tel` =  '$_POST[telnumber]',`debt_info_dept_emp` =  'เจ้าหน้าที่ห้องบัตร',`debt_info_dept_type` =  '$_POST[pptype]',`debt_info_date_pay` =  '$add_chk' WHERE `debt_info_hn_id` ='$_POST[hnno]'";
$QUSQL10=mysql_db_query($dbname,$add_SQL10);

$add_SQL="update debt SET hn_id='$_POST[hnno]',an_id='$_POST[anno]',idcard='$_POST[idcard1]',dept_name='$_POST[myname]',dept_age='$_POST[age]',dept_address='$_POST[address]',dept_moo='$_POST[moote]',dept_tumbon='$_POST[tumbon]',dept_amper='$_POST[amper]',dept_province='$_POST[province]',dept_tel='$_POST[telnumber]',dept_type='$_POST[pptype]',patients='$_POST[patients1]',debt_date='$_POST[dateadd]',date_pay='$dd_pay' where  hn_id_auto='$rs[hn_id_auto]'";
$QUSQL=mysql_db_query($dbname,$add_SQL);
 
$add_SQL2="update pay SET  datepay='$dd_pay',date_pay_one='$_POST[dateadd]'  where  add_id='$rs[hn_id]' AND price_num_all='$rs[dept_price_all]'";
$QUSQL=mysql_db_query($dbname,$add_SQL);

 
//exit();

 print"<div align=center class=FontMenuLogin><img src='images/18.gif'><br>แก้ไขข้อมูลเรียบร้อย..  </div>";  
// print"<meta http-equiv=\"refresh\" content=\"0;URL=?option=debt_edit&id_auto=".$_GET[id_auto]."\">\n"; 

print"<meta http-equiv=\"refresh\" content=\"0;URL=?option=main\">\n"; 


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
}if(document.frmdebt.idcard1.value=="") {
alert("กรอกข้อมูลให้ครบ ไม่มีให้ - หรือระบุเหตุผลที่ไม่มีเพราะ") ;
document.frmdebt.idcard1.focus() ;
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
}if(document.frmdebt.patients1.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.patients1.focus() ;
return false ;
}if(document.frmdebt.dateadd.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.dateadd.focus() ;
return false ;
}if(document.frmdebt.pricepay.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.pricepay.focus() ;
return false ;
}
if(document.frmdebt.pricepay.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.pricepay.focus() ;
return false ;
}
if(isNaN(document.frmdebt.pricepay.value)){
alert('กรอกข้อมูลให้เป็นตัวเลขเท่านั้น');
document.frmdebt.pricepay.focus() ;
return false;
 }


if(document.frmdebt.priceall.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.priceall.focus() ;
return false ;
}
if(isNaN(document.frmdebt.priceall.value)){
alert('กรอกข้อมูลให้เป็นตัวเลขเท่านั้น');
document.frmdebt.priceall.focus() ;
return false;
 }
if(document.frmdebt.pricepay2.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.pricepay2.focus() ;
return false ;
}
if(isNaN(document.frmdebt.pricepay2.value)){
alert('กรอกข้อมูลให้เป็นตัวเลขเท่านั้น');
document.frmdebt.pricepay2.focus() ;
return false;
 }
if(document.frmdebt.price_debt.value=="") {
alert("กรอกข้อมูลให้ครบ") ;
document.frmdebt.price_debt.focus() ;
return false ;
} 
if(isNaN(document.frmdebt.price_debt.value)){
alert('กรอกข้อมูลให้เป็นตัวเลขเท่านั้น');
document.frmdebt.price_debt.focus() ;
return false;
 }
else 
return true ;
}
                  </SCRIPT>
