<style type="text/css">
<!--
.style5 {color: #FFFFFF; font-weight: bold; }
.style6 {color: #000000; font-weight: bold; }
.style9 {color: #FF0000; font-weight: bold; }
-->
</style>
  <table width="60%" border="0" align="center" cellpadding="0" cellspacing="0"><br><br>
<tr>
                      <td bgcolor="#000000">          <DIV align=left class="FontMenu"><strong><br>&nbsp;&nbsp;<img src='iconset/information-balloon.png'>บันทึกข้อมูลยอมรับสภาพหนี้<br><br></strong>   </DIV>                       </td>
</tr>
                  </table>
          
					<form id="frmdebt" name="frmdebt" method="post"  onsubmit='return debtcheck();'>
                                  <table width="60%" border="0" align="center" cellpadding="0" cellspacing="0" class="green">
                                    <tr>
                                      <td><div align="right" class="style6">เลขที่หนังสือ</div></td>
                                      <td><span class="style9">
                                      <input name="bookno" type="text" id="textfield14" size="55" />
                                      *<br />
                                      เลขที่ อบ0027.301(2)/3350</span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">HN</div></td>
                                      <td><span class="style9">
                                      <input name="hnno" type="text" id="textfield17" size="55" />
                                      *</span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">AN</div></td>
                                      <td><input name="anno" type="text" id="textfield16" size="55" /></td>
                                    </tr>
                                    <tr>
                                      <td width="18%"><div align="right" class="style6">ข้าพเจ้า</div></td>
                                      <td width="82%"><span class="style9">
                                      <input name="myname" type="text" id="textfield3" size="55" />
                                      *</span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">อายุ</div></td>
                                      <td><span class="style9">
                                        <select name="age" id="select">
                                          <option   value="" selected="selected">**อาุยุ**</option>
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
                                      <input name="address" type="text" id="textfield5" size="55" />
                                      *</span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">หมู่ที่</div></td>
                                      <td><span class="style9">
                                      <input name="moote" type="text" id="textfield6" size="55" />
                                      *</span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">ตำบล</div></td>
                                      <td><span class="style9">
                                      <input name="tumbon" type="text" id="textfield7" size="55" />
                                      *</span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">อำเภอ</div></td>
                                      <td><span class="style9">
                                      <input name="amper" type="text" id="textfield8" size="55" />
                                      *</span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">จังหวัด</div></td>
                                      <td><span class="style9">
                                      <select name="province">
      <option value="" selected>--------- เลือกจังหวัด ---------</option>
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
                                      <input name="telnumber" type="text" id="textfield10" size="55" />
                                      *</span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">ประเภทผู้ป่วย</div></td>
                                      <td><span class="style9">
                                      <input name="pptype" type="text" id="textfield11" size="55" />
                                      *</span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">เมื่อวันที่</div></td>
                                      <td><span class="style9">
                                 <INPUT   type=text  name="dateadd"   onClick="popUpCalendar(this, frmdebt.dateadd, 'yyyy-mm-dd')" readonly  value=""/>

                                 
                                      *</span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">จำนวนเงินที่ต้องชำระทั้งสิ้น</div></td>
                                      <td><span class="style9">
                                      <input name="pricepay" type="text" id="textfield2" size="55" />
                                      *</span></td>
                                    </tr>
                    <tr>
                      <td colspan="2" bgcolor="#000000"><div align="right"> <br />
                        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                          <br />
                          <br />
                          <tr>
                            <td colspan="3" bgcolor="#000000"><div align="left" class="FontMenu"><strong><br />
                              &nbsp;&nbsp;<img src='iconset/information-balloon.png' />รายการแจ้งหนี้ค้างชำระ<br />
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
                            <td bgcolor="#000000"><span class="style5">ค่ายาและค่าบริการทางการแพทย์รวมทั้งสิ้น</span></td>
                            <td bgcolor="#000000"><span class="style5">
                            <input name="priceall" type="text" id="textfield" size="10" />
                            บาท*</span></td>
                          </tr>
                          <tr>
                            <td bgcolor="#000000"><div align="center" class="style5">2</div></td>
                            <td bgcolor="#000000"><span class="style5">ชำระ</span></td>
                            <td bgcolor="#000000"><span class="style5">
                            <input name="pricepay2" type="text" id="textfield4" size="10" />
                            บาท*</span></td>
                          </tr>
                          <tr>
                            <td bgcolor="#000000"><div align="center" class="style5">3</div></td>
                            <td bgcolor="#000000"><span class="style5">คงเหลือค้างชำระ</span></td>
                            <td bgcolor="#000000"><span class="style5">
                            <input name="price_debt" type="text" id="textfield13" size="10" />
                            บาท*</span></td>
                          </tr>
                          <tr bgcolor="#FF6600">
                            <td colspan="3" bgcolor="#000000"><div align="center" class="style5">*จำนวนเงินคงทั้งสิ้นระบบจะคำนวนอัตโนมัติ</div></td>
                          </tr>
                        </table>
                        <br />
                      </div></td>
                      </tr>
                    <tr>
                      <td colspan="2" valign="top" bgcolor="#FF0000"><div align="center"><span class="style5"><br />
                      * ห้ามเว้นช่องว่าง ไม่มีให้ -</span><br />
                      <br />
                        <input type="submit" name="button" id="button" value="บันทึกข้อมูล" />
                        <input type="button" name="button2" id="button2" value="ยกเลิก" onclick="javascript:history.back(-1)" />
                        <br />
                        <br />
                      </div></td>
                      </tr>
                  </table>
                  </form>
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
