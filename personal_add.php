 <? 
 if($_GET[edit]=='1'){   
 
  $SQLs="SELECT * FROM  personnel_user,department  WHERE personnel_user.id_person ='$_GET[id]' AND personnel_user.Id_department=department.id_department "; 
			$qqer = mysql_db_query($dbname,$SQLs);
			$NumRows = mysql_num_rows($qqer);
			 $rs=mysql_fetch_array($qqer);
 ?>
   <form name="checkForm" onSubmit="return check()"   method="POST" enctype="multipart/form-data"  >
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="grid_index">
  <tr>
    <td   colspan="2" bgcolor="#333"><div align="left" class="FontMenu"><strong>&nbsp;บันทึกข้อมูล</strong> </div></td>
  </tr>  <tr>
    <td width="29%"  ><div align="right" class="FontNormal">รหัสประจำตัวประชาชน&nbsp;::</div></td>
    <td width="71%"  >
      <div align="left" class="style1">
        <input name="idcard" type="text"   size="50" maxlength="13"  id="no1" onKeyDown="return nextbox(event, 'no2');"  value="<?=$rs[id_card]?>" readonly="readonly"/>
    *13 หลัก</div></td>
  </tr>
  <tr>
    <td width="29%"  ><div align="right" class="FontNormal">ชื่อเข้าใช้งานระบบ&nbsp;::</div></td>
    <td width="71%"  >
      <div align="left" class="style1">
        <input name="p_user" type="text"  size="50" id="no2" onKeyDown="return nextbox(event, 'no3');" value="<?=$rs[p_username]?>"/>
    *</div></td>
  </tr>
  <tr>
    <td  ><div align="right" class="FontNormal">รหัสผ่าน&nbsp;::</div></td>
    <td  ><span class="style1">
      <input name="p_pass" type="password"  size="50" id="no3" onKeyDown="return nextbox(event, 'no4');" value="<?=$rs[p_password]?>"/>
      *</span></td>
  </tr>
  <tr>
    <td colspan="2"  ><div align="right">&nbsp;</div></td>
  </tr>
  <tr>
    <td  ><div align="right" class="FontNormal">ชื่อ-สกุล &nbsp;[ภาษาไทย]&nbsp;::</div></td>
    <td  ><span class="style1">
      <input name="p_name" type="text"  size="50" id="no4" onKeyDown="return nextbox(event, 'no5');" value="<?=$rs[name_th]?>"/>
      * ระบุคำนำหน้าด้วย</span></td>
  </tr>
  <tr>
    <td  ><div align="right" class="FontNormal">ชื่อ-สกุล &nbsp;[ภาษาอังกฤษ]&nbsp;::</div></td>
    <td  ><span class="style1">
      <input name="p_nameeng" type="text"   size="50" id="no5" onKeyDown="return nextbox(event, 'no6');" value="<?=$rs[name_en]?>"/>
      *</span></td>
  </tr>
  <tr>
    <td  ><div align="right" class="FontNormal">ชื่อเล่น ::</div></td>
    <td  ><span class="style1">
      <input name="p_nickname" type="text"   size="50" id="no6" onKeyDown="return nextbox(event, 'no7');" value="<?=$rs[nicName]?>"/>
      *</span></td>
  </tr>
  
  
  <tr>
    <td  ><div align="right" class="FontNormal">วันเกิด ::</div></td>
    <td  ><?=$rs[birthday]?>
 </td>
  </tr>
  <tr>
    <td  ><div align="right" class="FontNormal">อีเมล์&nbsp;::</div></td>
    <td  ><span class="style1">
      <input name="p_mail" type="text"  size="50" id="no7" onKeyDown="return nextbox(event, 'no9');" value="<?=$rs[p_mail]?>"/>
      *</span></td>
  </tr>
  <!--<tr>
    <td  ><div align="right">เงินเดือน&nbsp;::</div></td>
    <td  ><span class="style1">
      <input name="p_salary" type="text"  size="50" id="no8" onKeyDown="return nextbox(event, 'no9');"/>
      *</span></td>
  </tr>-->
  <tr>
    <td  ><div align="right" class="FontNormal">ที่อยู่ตามภูมิลำเนา&nbsp;::</div></td>
    <td  ><span class="style1">
      <textarea name="p_address"  cols="47" rows="5" id="no9" onKeyDown="return nextbox(event, 'no10');"><?=$rs[address_domicile]?></textarea>
    *</span></td>
  </tr>
  <tr>
    <td  ><div align="right" class="FontNormal">ที่อยู่ปัจจุบัน&nbsp;::</div></td>
    <td  ><span class="style1">
      <textarea name="p_address2"  cols="47" rows="5" id="no10" onKeyDown="return nextbox(event, 'no11');"><?=$rs[address_now]?></textarea>
    *</span></td>
  </tr>
  <tr>
    <td  ><div align="right" class="FontNormal">เบอร์โทรศัพท์&nbsp;::</div></td>
    <td  ><span class="style1">
      <input name="p_tel" type="text"  size="50" id="no11" onKeyDown="return nextbox(event, 'no12');" value="<?=$rs[phone]?>"/>
      *</span></td>
  </tr>
  <tr>
    <td  ><div align="right"  class="FontNormal">หน่วยงาน&nbsp;::</div></td>
    <td  ><span class="style1">
     <select name="p_department"  id="no13" onkeydown="return nextbox(event, 'no14');" >
        <option selected="selected" value="<?=$rs[Id_department]?>">-- <?=$rs[department_name]?> --</option>
<?
	  $SQLSE1="SELECT * FROM department ";
	  $qse1=mysql_db_query($dbname,$SQLSE1);
	  while($RSSE1=mysql_fetch_array($qse1)){
?>
        <option value="<?=$RSSE1[0]?>"><?=$RSSE1[1]?></option>
<? } ?>
        </select>
      *</span></td>
  </tr>
 
  <tr>
    <td  ><div align="right"  class="FontNormal">รูปภาพ&nbsp;::</div></td>
    <td  ><span class="style1"><br />
 <img src="member/thumb/<?=$rs[picture]?>" border="1"> <br />

      <input type="file" name="fileupload" id="textfield3" />
    *GIF , JPG</span></td>
  </tr>
  <tr>
    <td  >&nbsp;</td>
    <td  >&nbsp;</td>
  </tr>
  <tr>
    <td  >&nbsp;</td>
    <td  >
        <input type="hidden" name="chk" id="button" value="2" />
    <input type="submit" name="button" id="button" value="ยืนยัน" />
    &nbsp;
    <input type="button" name="button2" id="button2" value="ยกเลิก"  onclick="javascript:history.back();"/></td>
  </tr>
</table>
</form>
<? 
}else{
 ?>
  <form name="checkForm" onSubmit="return check()"   method="POST" enctype="multipart/form-data"  >
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="grid">
  <tr>
    <td   colspan="2" bgcolor="#333"><div align="left" class="FontMenu"><strong>&nbsp;บันทึกข้อมูล</strong> </div></td>
  </tr>  <tr>
    <td width="29%"  ><div align="right">รหัสประจำตัวประชาชน&nbsp;::</div></td>
    <td width="71%"  >
      <div align="left" class="style1">
        <input name="idcard" type="text"   size="50" maxlength="13"  id="no1" onKeyDown="return nextbox(event, 'no2');"  value=""/>
    *13 หลัก</div></td>
  </tr>
  <tr>
    <td width="29%"  ><div align="right">ชื่อเข้าใช้งานระบบ&nbsp;::</div></td>
    <td width="71%"  >
      <div align="left" class="style1">
        <input name="p_user" type="text"  size="50" id="no2" onKeyDown="return nextbox(event, 'no3');" value="" maxlength="10"/>
    *ภาษาอังกฤษเท่านั้น ไม่เกิน 10 ตัวอักษร ห้ามเว้นวรรค</div></td>
  </tr>
  <tr>
    <td  ><div align="right">รหัสผ่าน&nbsp;::</div></td>
    <td  ><span class="style1">
      <input name="p_pass" type="text"  size="50" id="no3" onKeyDown="return nextbox(event, 'no4');" value="" maxlength="10"/>
      *ไม่เกิน 10 ตัวอักษร ห้ามเว้นวรรค</span></td>
  </tr>
  <tr>
    <td colspan="2"  ><div align="right">&nbsp;</div></td>
  </tr>
  <tr>
    <td  ><div align="right">ชื่อ-สกุล &nbsp;[ภาษาไทย]&nbsp;::</div></td>
    <td  ><span class="style1">
      <input name="p_name" type="text"  size="50" id="no4" onKeyDown="return nextbox(event, 'no5');" value=""/>
      *</span></td>
  </tr>
  <tr>
    <td  ><div align="right">ชื่อ-สกุล &nbsp;[ภาษาอังกฤษ]&nbsp;::</div></td>
    <td  ><span class="style1">
      <input name="p_nameeng" type="text"   size="50" id="no5" onKeyDown="return nextbox(event, 'no6');" value=""/>
      *</span></td>
  </tr>
  <tr>
    <td  ><div align="right">ชื่อเล่น ::</div></td>
    <td  ><span class="style1">
      <input name="p_nickname" type="text"   size="50" id="no6" onKeyDown="return nextbox(event, 'no7');" value=""/>
      *</span></td>
  </tr>
  
  
  <tr>
    <td  ><div align="right">วันเกิด ::</div></td>
    <td  ><span class="style1">
    
      <select name="p_date" id="select">
        <option value="01">01</option>
        <option value="02">02</option>
        <option value="03">03</option>
        <option value="04">04</option>
        <option value="05">05</option>
        <option value="06">06</option>
        <option value="07">07</option>
        <option value="08">08</option>
        <option value="09">09</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
      </select>
 
      <select name="p_month" id="select2">
        <option value="01">มกราคม</option>
        <option value="02">กุมภาพันธ์</option>
        <option value="03">มีนาคม</option>
        <option value="04">เมษายน</option>
        <option value="05">พฤษภาคม</option>
        <option value="06">มิถุนายน</option>
        <option value="07">กรกฎาคม</option>
        <option value="08">สิงหาคม</option>
        <option value="09">กันยายน</option>
        <option value="10">ตุลาคม</option>
        <option value="11">พฤศจิกายน</option>
        <option value="12">ธันวาคม</option>
      </select>
      
      <select name="p_year" id="select3">
      <?
	  $i=2500;
	   while($i<=2554){?>
      <option value="<?=$i?>"><?=$i?></option>
      <? $i++; }?>
      </select>
    </span></td>
  </tr>
  <tr>
    <td  ><div align="right">อีเมล์&nbsp;::</div></td>
    <td  ><span class="style1">
      <input name="p_mail" type="text"  size="50" id="no7" onKeyDown="return nextbox(event, 'no9');"/>
      *</span></td>
  </tr>
  <!--<tr>
    <td  ><div align="right">เงินเดือน&nbsp;::</div></td>
    <td  ><span class="style1">
      <input name="p_salary" type="text"  size="50" id="no8" onKeyDown="return nextbox(event, 'no9');"/>
      *</span></td>
  </tr>-->
  <tr>
    <td  ><div align="right">ที่อยู่ตามภูมิลำเนา&nbsp;::</div></td>
    <td  ><span class="style1">
      <textarea name="p_address"  cols="47" rows="5" id="no9" onKeyDown="return nextbox(event, 'no10');"></textarea>
    *</span></td>
  </tr>
  <tr>
    <td  ><div align="right">ที่อยู่ปัจจุบัน&nbsp;::</div></td>
    <td  ><span class="style1">
      <textarea name="p_address2"  cols="47" rows="5" id="no10" onKeyDown="return nextbox(event, 'no11');"></textarea>
    *</span></td>
  </tr>
  <tr>
    <td  ><div align="right">เบอร์โทรศัพท์&nbsp;::</div></td>
    <td  ><span class="style1">
      <input name="p_tel" type="text"  size="50" id="no11" onKeyDown="return nextbox(event, 'no12');" value=""/>
      *</span></td>
  </tr>
  <tr>
    <td  ><div align="right">หน่วยงาน&nbsp;::</div></td>
    <td  ><span class="style1">
     <select name="p_department"  id="no13" onkeydown="return nextbox(event, 'no14');" >
        <option selected="selected" value="">-- หน่วยงาน --</option>
<?
	  $SQLSE1="SELECT * FROM department ";
	  $qse1=mysql_db_query($dbname,$SQLSE1);
	  while($RSSE1=mysql_fetch_array($qse1)){
?>
        <option value="<?=$RSSE1[0]?>"><?=$RSSE1[1]?></option>
<? } ?>
        </select>
      *</span></td>
  </tr>
 
  <tr>
    <td  ><div align="right">รูปภาพ&nbsp;::</div></td>
    <td  ><span class="style1">
      <input type="file" name="fileupload" id="textfield3" />
    *GIF , JPG</span></td>
  </tr>
  <tr>
    <td  >&nbsp;</td>
    <td  >&nbsp;</td>
  </tr>
  <tr>
    <td  >&nbsp;</td>
    <td  >
        <input type="hidden" name="chk" id="button" value="1" />
    <input type="submit" name="button" id="button" value="ยืนยัน"  class='btn'/>
    &nbsp;
    <input type="reset" name="button2" id="button2" value="ยกเลิก" class='btn' /></td>
  </tr>
</table>
</form>
<? }?>

 
 
 
 <?
  if($_POST[chk]=='1'){
			
 
	
			$s_date_eng=$_POST[p_year]."-".$_POST[p_month]."-".$_POST[p_date]."";
 

			/*INSERT ID*/
			$strSql_LastNum = "SELECT id_person FROM personnel ORDER BY id_person DESC";
			$Result = mysql_db_query($dbname,$strSql_LastNum);
			$NumRows = mysql_num_rows($Result);
			if ($NumRows >= 1){
				$Row = mysql_fetch_array($Result);
				$Row["id_person"] = $Row["id_person"] + 1;
				$Row["id_person"] = sprintf("%07d",$Row["id_person"]);
				$LastNum= $Row["id_person"];
			}else{$LastNum= "0000001";}
/*INSERT ID*/
 

 /*****ตรวจสอบซ้ำ***/
 	$strSql_LastNum2 = "SELECT * FROM personnel WHERE id_card='$_POST[idcard]'";
			$Result2 = mysql_db_query($dbname,$strSql_LastNum2);
			$NumRows2 = mysql_num_rows($Result2);
 if($NumRows2>="1"){
 		?>
		<script>alert("คุณได้ทำการสมัครสมาชิกไปแล้ว!!");</script>
		<?
			exit();
 }
 
/********* UPLOAD PHOOT ***********************************/
if(!empty($fileupload)){
					$file=$_FILES['fileupload'];
					$array_last=explode(".",$file[name]);
					$c=count($array_last)-1; 
					$lastname=strtolower($array_last[$c]) ;
if ($lastname=="gif" or $lastname=="jpg" or $lastname=="jpeg") {
$file=$_FILES['fileupload'];
$place2place="./member"; //ระบุตำแหน่งที่เก็บไฟล์
/*
echo "ชื่อของไฟล์ คือ ".$file[name]."<br>";
echo "ขนาดของไฟล์ คือ ".$file[size]."<br>";
echo "เนื้อหาของไฟล์ คือ ".$file[tmp_name]."<br>";
echo "ชนิดของไฟล์ คือ ".$file[type]."<br><br>";
*/
$now=date('Y-m-d-h-i-s');
 
$photoname=$_POST[idcard]."-".$now.".".$lastname;
if(@copy($file[tmp_name],"$place2place/".$photoname))
{

try {
			$thumb = PhpThumbFactory::create("member/$photoname");
			$thumb->adaptiveResize(120, 158);
			$thumb->save("member/thumb/$photoname");

		}
		catch(Exception $e) { }


if(eregi("^image",$file[type])){
//echo "<img src=\"$place2place/$file[name]\">";
}else{
//echo "<a href=\"$place2place/$file[name]\">$file[name] </a>";
}

}
else{
echo "ไม่มีทาง";
}
		}else{
		?>
		<script>alert("อัพโหลดได้เฉพาะไฟล์  JPG,JPEG");</script>
		<?
			exit();
		}
}
/********* END  UPLOAD PHOOT ***********************************/
 if(!empty($photoname)){
 $photoname=$photoname;
 }else{
 $photoname="no_image.jpg";
 }
 
 
 $sqlin=" INSERT INTO  `personnel` (
`id_person` ,
`salary` ,
`name_th` ,
`nicName` ,
`name_en` ,
`picture` ,
`birthday` ,
`id_card` ,
`address_domicile` ,
`address_now` ,
`phone` ,
`Id_department` ,
`status_appv` ,
`p_username` ,
`p_password` ,
`p_mail` 
)
VALUES (
'$LastNum', '0', '$_POST[p_name]', '$_POST[p_nickname]', '$_POST[p_nameeng]', '$photoname', '$s_date_eng', '$_POST[idcard]', '$_POST[p_address]', '$_POST[p_address2]', '$_POST[p_tel]', '$_POST[p_department]', '0', '$_POST[p_user]', '$_POST[p_pass]', '$_POST[p_mail]'
)";
$qq=mysql_db_query($dbname,$sqlin);

 
	$strTo = "siammax2000@gmail.com";
	$strSubject = "Smm Internet Register";
	$strHeader = "Smm Internet Register";
	$strMessage = "สมัคร รหัสอินเตอร์เน็ต /n $_POST[p_name] /n ชื่อล๊อกอิน $_POST[p_user]  /n รหัสผ่าน $_POST[p_pass]";
	$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
 

  		?>
		<script>alert("สมัครสมาชิกเรียบร้อย");</script>
		<?
print"<meta http-equiv=\"refresh\" content=\"0;URL=?menu=m\">\n";
 
 }//END IF
else if($_POST[chk]=='2'){



 
			$s_date=explode('-',$_POST[p_date]);
			$date_year=$s_date[2]-543;
			$s_date_eng=$date_year."-".$s_date[1]."-".$s_date[0]."";

/********* UPLOAD PHOOT ***********************************/
if(!empty($fileupload)){
					$file=$_FILES['fileupload'];
					$array_last=explode(".",$file[name]);
					$c=count($array_last)-1; 
					$lastname=strtolower($array_last[$c]) ;
if ($lastname=="gif" or $lastname=="jpg" or $lastname=="jpeg") {
$file=$_FILES['fileupload'];
$place2place="./member"; //ระบุตำแหน่งที่เก็บไฟล์
/*
echo "ชื่อของไฟล์ คือ ".$file[name]."<br>";
echo "ขนาดของไฟล์ คือ ".$file[size]."<br>";
echo "เนื้อหาของไฟล์ คือ ".$file[tmp_name]."<br>";
echo "ชนิดของไฟล์ คือ ".$file[type]."<br><br>";
*/
$now=date('Y-m-d-h-i-s');
 
$photoname=$rs[picture];
if(@copy($file[tmp_name],"$place2place/".$photoname))
{

try {
			$thumb = PhpThumbFactory::create("member/$photoname");
			$thumb->adaptiveResize(120, 158);
			$thumb->save("member/thumb/$photoname");

		}
		catch(Exception $e) { }


if(eregi("^image",$file[type])){
//echo "<img src=\"$place2place/$file[name]\">";
}else{
//echo "<a href=\"$place2place/$file[name]\">$file[name] </a>";
}

}
else{
echo "ไม่มีทาง";
}
		}else{
		?>
		<script>alert("อัพโหลดได้เฉพาะไฟล์  JPG,JPEG");</script>
		<?
			exit();
		}
}
/********* END  UPLOAD PHOOT ***********************************/
 if(!empty($photoname)){
 $photoname=$photoname;
 }else{
 $photoname=$rs[picture];
 }
 
$SQL="UPDATE personnel SET salary='0',name_th='$_POST[p_name]',nicName='$_POST[p_nickname]',name_en='$_POST[p_nameeng]',picture='$photoname',id_card='$_POST[idcard]',address_domicile='$_POST[p_address]',address_now='$_POST[p_address2]',phone='$_POST[p_tel]',Id_department='$_POST[p_department]',p_password='$_POST[p_pass]',p_mail='$_POST[p_mail]' WHERE  id_person='$_GET[id]'";
$qq=mysql_db_query($dbname,$SQL);


  		?>
		<script>alert("แก้ไขเรียบร้อย");</script>
		<?
print"<meta http-equiv=\"refresh\" content=\"0;URL=?menu=m\">\n";




}
 ?>
 
 
 
<script>

function checkID(id)
{
if(id.length != 13) return false;
for(i=0, sum=0; i < 12; i++)
sum += parseFloat(id.charAt(i))*(13-i); if((11-sum%11)%10!=parseFloat(id.charAt(12)))
return false; return true;}


function check() {
  if(document.checkForm.idcard.value == "")
    {
        alert('กรุณากรอกรหัสบัตรประจำตัวประชาชน');
        document.checkForm.idcard.focus();
        return false;
    }  
		  if(!checkID(document.checkForm.idcard.value)){
alert('รหัสประชาชนไม่ถูกต้อง');return false}
 
 
 if(document.checkForm.p_user.value=="") {
alert("!! กรอก ข้อมูลให้ครบทุกช่อง") ;
document.checkForm.p_user.focus() ;
return false ;
	}
	if(document.checkForm.p_pass.value=="") {
alert("!! กรอก ข้อมูลให้ครบทุกช่อง") ;
document.checkForm.p_pass.focus() ;
return false ;
	}
	if(document.checkForm.p_name.value=="") {
alert("!! กรอก ข้อมูลให้ครบทุกช่อง") ;
document.checkForm.p_name.focus() ;
return false ;
	}
	if(document.checkForm.p_nameeng.value=="") {
alert("!! กรอก ข้อมูลให้ครบทุกช่อง") ;
document.checkForm.p_nameeng.focus() ;
return false ;
	} 	if(document.checkForm.p_nickname.value=="") {
alert("!! กรอก ข้อมูลให้ครบทุกช่อง") ;
document.checkForm.p_nickname.focus() ;
return false ;
	} if(document.checkForm.p_date.value=="") {
alert("!! กรอก ข้อมูลให้ครบทุกช่อง") ;
document.checkForm.p_date.focus() ;
return false ;
	}if(document.checkForm.p_mail.value=="") {
alert("!! กรอก ข้อมูลให้ครบทุกช่อง") ;
document.checkForm.p_mail.focus() ;
return false ;
	} if(document.checkForm.p_address.value=="") {
alert("!! กรอก ข้อมูลให้ครบทุกช่อง") ;
document.checkForm.p_address.focus() ;
return false ;
	} if(document.checkForm.p_address2.value=="") {
alert("!! กรอก ข้อมูลให้ครบทุกช่อง") ;
document.checkForm.p_address2.focus() ;
return false ;
	} if(document.checkForm.p_tel.value=="") {
alert("!! กรอก ข้อมูลให้ครบทุกช่อง") ;
document.checkForm.p_tel.focus() ;
return false ;
	} if(document.checkForm.p_department.value=="") {
alert("!! กรอก ข้อมูลให้ครบทุกช่อง") ;
document.checkForm.p_department.focus() ;
return false ;
	} 
	
 
}
           </SCRIPT>