<style type="text/css">
<!--
.style5 {color: #FFFFFF; font-weight: bold; }
.style6 {color: #000000; font-weight: bold; }
.style10 {color: #FFFFFF}
.style11 {color: #000000}
-->
</style>
<?
	  		$q_num9="SELECT * FROM   debt,plb WHERE debt.hn_id_auto='$_GET[id_auto]' AND debt.dept_type=plb.plb_ib";
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
                      <td bgcolor="#000000">          <DIV align=left class="FontMenu"><strong><br>&nbsp;&nbsp;<img src='iconset/information-balloon.png'>ประวัติการชำระหนี้ <font  color="#FF0000" size="+2">[HN<?=$rs[hn_id]?>]</font><br><br></strong>   </DIV>                       </td>
</tr>
                  </table>
          
					<form id="frmdebt" name="frmdebt" method="post"  onsubmit='return debtcheck();'>
                                  <table width="60%" border="0" align="center" cellpadding="0" cellspacing="0" class="green">
                                    <tr>
                                      <td class="style6"><div align="right" class="style6 style11"><strong>หนังสือสัญญาเลขที่</strong></div></td>
                                      <td class="style6"><span class="style6">*
                                        <?=$rs[book_id]?>
                                      <br />
                                      </span></td>
                                    </tr>
                                    <tr>
                                      <td class="style6"><div align="right" class="style6">HN</div></td>
                                      <td class="style6"><span class="style11"><strong>&nbsp;
                                      <?=$rs[hn_id]?>
                                      </strong></span></td>
                                    </tr>
                                    <tr>
                                      <td class="style6"><div align="right" class="style6">AN</div></td>
                                      <td class="style6"><span class="style11"><strong>&nbsp;
                                      <?=$rs[an_id]?>
                                      </strong></span></td>
                                    </tr>   <tr>
                                      <td width="18%" class="style6"><div align="right" class="style6">เลขที่บัตรประชาชน</div></td>
                                      <td width="82%" class="style6"><span class="style6">&nbsp;<?=$rs[idcard]?></span></td>
                                    </tr>
                                    <tr>
                                      <td width="18%" class="style6"><div align="right" class="style6">ชื่อลูกหนี้</div></td>
                                      <td width="82%" class="style6"><span class="style6">&nbsp;<?=$rs[dept_name]?></span></td>
                                    </tr>
                                    <tr>
                                      <td class="style6"><div align="right" class="style6">อายุ</div></td>
                                      <td class="style6"><span class="style11"><strong>&nbsp;
                                      <?=$rs[dept_age]?>
&nbsp;ปี</strong></span></td>
                                    </tr>
                                    <tr>
                                      <td class="style6"><div align="right" class="style6">ที่อยู่ปัจจุบัน</div></td>
                                      <td class="style6"><span class="style6">&nbsp;<?=$rs[dept_address]?></span></td>
                                    </tr>
                                    <tr>
                                      <td class="style6"><div align="right" class="style6">หมู่ที่</div></td>
                                      <td class="style6"><span class="style6">&nbsp;<?=$rs[dept_moo]?></span></td>
                                    </tr>
                                    <tr>
                                      <td class="style6"><div align="right" class="style6">ตำบล</div></td>
                                      <td class="style6"><span class="style6">&nbsp;<?=$rs[dept_tumbon]?></span></td>
                                    </tr>
                                    <tr>
                                      <td class="style6"><div align="right" class="style6">อำเภอ</div></td>
                                      <td class="style6"><span class="style6">&nbsp;<?=$rs[dept_amper]?></span></td>
                                    </tr>
                                    <tr>
                                      <td class="style6"><div align="right" class="style6">จังหวัด</div></td>
                                      <td class="style6"><span class="style6">&nbsp;<?=$rs[dept_province]?></span></td>
                                    </tr>
                                    <tr>
                                      <td class="style6"><div align="right" class="style6">เบอร์โทรติดต่อ</div></td>
                                      <td class="style6"><span class="style6">&nbsp;<?=$rs[dept_tel]?></span></td>
                                    </tr>
                                    <tr>
                                      <td class="style6"><div align="right" class="style6">สิทธิผู้ป่วย</div></td>
                                      <td class="style6"><span class="style6">&nbsp;<?=$rs[plb_detail]?></span></td>
                                    </tr>
									          <tr>
                                      <td class="style6"><div align="right" class="style6">ผู้ป่วยประเภท</div></td>
                                      <td class="style6"><span class="style6">&nbsp;<?=$rs[patients]?></span></td>
                                    </tr>
                                    <tr>
                                      <td class="style6"><div align="right" class="style6">เมื่อวันที่</div></td>
                                      <td class="style6"><span class="style6">&nbsp;<?=$rs[debt_date]?></span></td>
                                    </tr>
                                    <tr>
                                      <td class="style6"><div align="right" class="style6">จำนวนเงินที่ต้องชำระทั้งสิ้น</div></td>
                                      <td class="style6"><span class="style6">&nbsp;<?=number_format($rs[dept_price_all])?>&nbsp;บาท</span></td>
                                    </tr>
                    <tr>
                      <td colspan="2" bgcolor="#000000"><div align="right"> <br />
                        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                         
                          <tr>
                            <td colspan="5" bgcolor="#000000"><div align="left" class="FontMenu"><strong><br />
                              &nbsp;&nbsp;<img src='iconset/information-balloon.png' />ประวัติการชำระหนี้&nbsp;<font color="#FF0000" size="+1">[ทำสัญญาเมื่อวันที่&nbsp;<?=$rs[debt_date]?>&nbsp;]</font><br />
                              <br />
                            </strong> </div></td>
                          </tr>
                          <tr>
                            <td   bgcolor="#00FF00"><div align="center"><strong>ก่อนชำระ</strong></div></td>
                            <td  bgcolor="#00FF00"><div align="center"><strong>จำนวนที่ชำระ</strong></div></td>
                            <td   bgcolor="#00FF00"><div align="center"><strong>คงเหลือ</strong></div></td>
                            <td   bgcolor="#00FF00"><div align="center"><strong>ชำระเมื่อวันที่</strong></div></td>
                          </tr>
                          <?
	  		$q_num96="SELECT * FROM    pay WHERE hn_id_auto='$rs[hn_id_auto]'";
		  	$qr996=mysql_db_query($dbname,$q_num96);
			while($rs6=mysql_fetch_array($qr996)){
?>
                  <tr>
                            <td bgcolor="#000000" class="style5"><span class="style10">
                            <?=number_format($rs6[price_num_all])?>&nbsp;บาท
                            </span></td>
                     
                    <td bgcolor="#000000" class="style5"><span class="style10">
                    <?=number_format($rs6[pricepay])?>&nbsp;บาท
                    </span></td>
                    <td bgcolor="#000000" class="style5"><span class="style10">
                    <?=number_format($rs6[dept_price_balance])?>&nbsp;บาท
                    </span></td>
                    <td bgcolor="#000000" class="style5"><span class="style10">
                    <?=$rs6[datepay]?>
                    </span></td>
                  </tr>
                  <? } ?>
                          <tr bgcolor="#FF6600">
                            <td colspan="5" bgcolor="#000000"><div align="center" class="style5"> </div></td>
                          </tr>
                        </table>
                        <br />
                      </div></td>
                      </tr>
                    <tr>
                      <td colspan="2" valign="top" bgcolor="#FF0000"><div align="center"> 
                      <input type="hidden" name="p_check" id="button" value="1" />
                     
 
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
