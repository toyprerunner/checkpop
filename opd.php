 
  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" >
                    <tr>
                      <td>  

<div class="buttons">
 
    <button type="button" name="button222" id="button" value="บันทึกข้อมูล"  onclick="javascript:location.href='?option=health'" class="positive"  ><img src="iconset/information-balloon.png" alt=""/>รายงานกลุ่มประกันสุขภาพ</button><button type="button" name="button222" id="button" value="บันทึกข้อมูล"  onclick="javascript:location.href='?option=ht-dm'" class="positive"  ><img src="iconset/information-balloon.png" alt=""/>รายงานจำนวนผู้ป่วยที่เป็นโรคเบาหวาน-ความดัน / ไตรมาส</button> 

 <button type="button" name="button222" id="button" value="บันทึกข้อมูล"  onclick="javascript:location.href='?option=opd'" class="positive" ><img src="iconset/icon-online.gif" alt=""/>รายงานจำนวนผู้ป่วยนอก (HN) ที่มารับบริการ / ไตรมาส</button> 
 </div>
                       </td>
                    </tr>
                  </table>

	
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0"   bgcolor="#180372" class="green" >
                    <tr colspan="8" >
                    <td colspan="3" bgcolor="#180372">
					
                    <DIV align="center" class="FontMenu"><h1>	
					<form name="checkFormsearch" onSubmit="return check()"   method="POST" enctype="multipart/form-data" >
					<div align="left" class="FontMenu_big"><img src="images/search.png"  />


						  เลือกช่วงวันที่<INPUT   type=text  name="date_a" id="popupDatepicker2" readonly  value="<?=$_POST[date_a]?>"  class='lr2013' /> ถึงวันที่<INPUT   type=text  name="date_b" id="popupDatepicker" readonly  value="<?=$_POST[date_b]?>"  class='lr2013' />               <input type="hidden" name="s" id="textfield"  value="1"/>
                              <input type="submit" name="button" id="button" value="แสดงข้อมูล" class='btn' /> 
                      </div>   
					       </form>   
					</h1> 
					 </DIV> 	
            </td>		
                    </tr>
		 
							    <?
		 		 if($_POST[s]=="1"){			
 
$q93="SELECT
ovst.vn,
ovst.vstdttm,
ovst.hn,
ovst.nrxtime,
ovst.drxtime,
ovst.cln,
ovst.dct,
ovst.pttype,
ovst.ovstist,
ovst.ovstost,
ovst.overtime,
ovst.pr,
ovst.rr,
ovst.sbp,
ovst.dbp,
ovst.preg,
ovst.tb,
ovst.toq,
ovst.drink,
ovst.mr,
ovst.an,
ovst.rcptno,
ovst.register,
pt.hn,
pt.pname,
pt.fname
FROM
ovst
INNER JOIN pt ON pt.hn = ovst.hn
WHERE
(date(ovst.vstdttm) BETWEEN '$_POST[date_a]' AND '$_POST[date_b]') and ovst.ovstost!='0'
GROUP BY ovst.hn"; 
$qr93=$mysqli_hi->query($q93);
$total93=$qr93->num_rows;
$rs93=$qr93->fetch_assoc();
?>
					<tr>
                    <td bgcolor="#180372" width="32%" ><div align='left' class="FontMenu_big">จำนวนผู้ป่วยนอก (HN) ที่มารับบริการ / ไตรมาส</div></td>
					<td bgcolor="#180372" width="68%" ><div align='left' class="FontMenu_big"><?=$total93?> ราย</div></td>
                    </tr>
										 <tr>
                    <td bgcolor="#180372" colspan="3" ><div align='right' class="FontMenu"></div></td>
			 
                    </tr>
					<? }?>
</table>
 
 </div>
  <SCRIPT>
function check() {
 if(document.checkFormsearch.date_a.value=="") {
alert("เลือกวันที่") ;
document.checkFormsearch.date_a.focus() ;
return false ;
}
if(document.checkFormsearch.date_b.value==""){
alert('เลือกวันที่');
document.checkFormsearch.date_b.focus() ;
return false;
 }if((document.checkFormsearch.date_a.value)>(document.checkFormsearch.date_b.value)){
alert('วันที่ไม่ถูกต้อง');
return false;
 }
else 
return true ;
} 
                  </SCRIPT>