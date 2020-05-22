  <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="green">
                    <tr>
                    <td colspan="7" bgcolor="#180372">
				
                    <DIV align=left class="FontMenu">	<? if(!empty($_POST[date_a])){?><h3><strong>ข้อมูลวันที่ <?=$Dlib->MadeDay($_POST[date_a])?> ถึง <?=$Dlib->MadeDay($_POST[date_b])?></strong> </h3> <? }?> <h4>
					รหัสโรงพยาบาล: 34020100 <BR>ชื่อโรงพยาบาล:ศรีเมืองใหม่ รพช.</h4>
					</DIV> 	
					
 


					<form name="checkFormsearch" onSubmit="return check()"   method="POST" enctype="multipart/form-data" >
<div align="center" class="FontMenu"><img src="images/search.png"  />
						  ช่วงเวลา<INPUT   type=text  name="date_a" id="popupDatepicker2" readonly  value="<?=$_POST[date_a]?>"   class='lr2013' /> ถึง<INPUT   type=text  name="date_b" id="popupDatepicker" readonly  value="<?=$_POST[date_b]?>"   class='lr2013' /> 
                              <input type="hidden" name="s" id="textfield"  value="1"/>
                              <input type="submit" name="button" id="button" value="ค้นหา" class='btn' />
                      </div>           
					       </form>    
						   <SCRIPT>

function check() {
 if(document.checkFormsearch.date_a.value=="") {
alert("เลือกวันที่") ;
document.checkFormsearch.date_a.focus() ;
return false ;
}
if(document.checkFormsearch.date_b.value==""){
alert('เลือกวันที่');
document.checkFormsearchhn.date_b.focus() ;
return false;
 } 
else 
return true ;
} 
 
                  </SCRIPT>
						   </td>
                    </tr>      </table>
  <?		 		 if($_POST[s]=="1"){
 
  //จำนวนมารดาที่คลอดทั้งหมด
	$chkper_Chart="SELECT  COUNT( * ) AS num FROM lr_lbw WHERE  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND stat_event!='2' AND province!='34' AND  province!='00'";
	$sqlquery_Chart=$mysqli->query($chkper_Chart);
		$sqlnum_Chart=$sqlquery_Chart->fetch_assoc();
// นอกเขตอำเภอ age
		$chkper_Chart2="SELECT  COUNT( * ) AS num FROM lr_lbw WHERE  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND stat_event!='2' AND  aumper!='02' AND province='34'";
	$sqlquery_Chart2=$mysqli->query($chkper_Chart2);
		$sqlnum_Chart2=$sqlquery_Chart2->fetch_assoc();
	// ในเขตอำเภอ age
			$chkper_Chart3="SELECT  COUNT( * ) AS num FROM lr_lbw WHERE  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND stat_event!='2' AND  aumper='02' AND   province='34'";
	$sqlquery_Chart3=$mysqli->query($chkper_Chart3);
		$sqlnum_Chart3=$sqlquery_Chart3->fetch_assoc();

				$chkper_Chart4="SELECT  COUNT( * ) AS num FROM lr_lbw WHERE  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND stat_event!='2' AND  province='00'";
	$sqlquery_Chart4=$mysqli->query($chkper_Chart4);
	$sqlnum_Chart4=$sqlquery_Chart4->fetch_assoc();

	//จำนวนมารดาอายุต่ำกว่า 20 ปี คลอด
	// ในเขตอำเภอ age             
	$chkper_Cil="SELECT  COUNT( * ) AS num FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND  SUBSTR(`age`,1,2 )<='20' AND  aumper='02' AND province='34'";
	$sqlquery_chin=$mysqli->query($chkper_Cil);
	$sqlnum_chin1=$sqlquery_chin->fetch_assoc();
	// นอกเขตอำเภอ  
		$chkper_Cil2="SELECT  COUNT( * ) AS num FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND  SUBSTR(`age`,1,2 )<='20' AND  aumper!='02' AND province='34'";
	$sqlquery_chin2=$mysqli->query($chkper_Cil2);
	$sqlnum_chin2=$sqlquery_chin2->fetch_assoc();
		// นอกเขตจังหวัด
		$chkper_Cil3="SELECT  COUNT( * ) AS num FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND SUBSTR(`age`,1,2 )<='20' AND  province!='34' AND   province!='00'";
	$sqlquery_chin3=$mysqli->query($chkper_Cil3);
	$sqlnum_chin3=$sqlquery_chin3->fetch_assoc();
		// นอกเขตประเทศ
		$chkper_Cil4="SELECT  COUNT( * ) AS num FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND  SUBSTR(`age`,1,2 )<='20' AND  province='00'";
	$sqlquery_chin4=$mysqli->query($chkper_Cil4);
	$sqlnum_chin4=$sqlquery_chin4->fetch_assoc();



	//คลอดปกติ
	// ในเขตอำเภอ age
	$chkper_dxmom="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE (stat_event!='2' AND  stat_event!='3') AND (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ((dx_mom1='O800' OR dx_mom1='O809') OR (dx_mom2='O800' OR dx_mom2='O809') OR (dx_mom3='O800' OR dx_mom3='O809')  OR (dx_mom4='O800' OR dx_mom4='O809') OR  (dx_mom5='O800' OR dx_mom5='O809') OR (dx_mom6='O800' OR dx_mom6='O809')) AND  (aumper='02' AND province='34')";
	$sqlquery_dxmom=$mysqli->query($chkper_dxmom);
	$sqlnum_dxmom=$sqlquery_dxmom->fetch_assoc();
	// นอกเขตอำเภอ  
	 	$chkper_dxmom1="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE  (stat_event!='2' AND  stat_event!='3') AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ((dx_mom1='O800' OR dx_mom1='O809') OR (dx_mom2='O800' OR dx_mom2='O809') OR (dx_mom3='O800' OR dx_mom3='O809')  OR (dx_mom4='O800' OR dx_mom4='O809') OR  (dx_mom5='O800' OR dx_mom5='O809') OR (dx_mom6='O800' OR dx_mom6='O809')) AND  (aumper!='02' AND province='34')";
	$sqlquery_dxmom1=$mysqli->query($chkper_dxmom1);
	$sqlnum_dxmom1=$sqlquery_dxmom1->fetch_assoc();
		// นอกเขตจังหวัด
 	$chkper_dxmom2="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE  (stat_event!='2' AND  stat_event!='3') AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ((dx_mom1='O800' OR dx_mom1='O809') OR (dx_mom2='O800' OR dx_mom2='O809') OR (dx_mom3='O800' OR dx_mom3='O809')  OR (dx_mom4='O800' OR dx_mom4='O809') OR  (dx_mom5='O800' OR dx_mom5='O809') OR (dx_mom6='O800' OR dx_mom6='O809')) AND  (province!='34') AND (province!='00')";
	$sqlquery_dxmom2=$mysqli->query($chkper_dxmom2);
	$sqlnum_dxmom2=$sqlquery_dxmom2->fetch_assoc();
		// นอกเขตประเทศ
 	$chkper_dxmom3="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE  (stat_event!='2' AND  stat_event!='3') AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ((dx_mom1='O800' OR dx_mom1='O809') OR (dx_mom2='O800' OR dx_mom2='O809') OR (dx_mom3='O800' OR dx_mom3='O809')  OR (dx_mom4='O800' OR dx_mom4='O809') OR  (dx_mom5='O800' OR dx_mom5='O809') OR (dx_mom6='O800' OR dx_mom6='O809')) AND  (province='00')";
	$sqlquery_dxmom3=$mysqli->query($chkper_dxmom3);
	$sqlnum_dxmom3=$sqlquery_dxmom3->fetch_assoc();

 
  ?>

  <table width="90%" border="0" cellpadding="0" cellspacing="0" class="green" >
              <tr>
                <td width="50%" height="30" align="center"><strong><span  class="style23">ข้อมูล</span></strong></td>
                <td width="10%" align="left"><strong><span  class="style23">ในเขต<br>
                  อำเภอ</span></strong></td>
                <td width="10%" align="left"><strong><span  class="style23">นอกเขต<br>
                  อำเภอ</span></strong></td>
				<td width="10%" align="left"><strong><span  class="style23">นอกเขต<br>
                  จังหวัด</span></strong></td>
				<td width="10%" align="left"><strong><span  class="style23">นอกเขต<br>
                  ประเทศ</span></strong></td>
              </tr>
 
              
<tr bgcolor=#ffe6a4>                <td width="50%" height="25"><span class="style23">
				<strong>1&nbsp;</strong><strong>จำนวนมารดาที่คลอดทั้งหมด</strong>				
				</span></td>
                  <td width="10%"><span class="style23">
                                        <input name="a1" type="text" class="style16" id="a" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="<?=$sqlnum_Chart3[num]?>">
                  </span>
                  <td width="10%"><span class="style23">
                                        <input name="b1" type="text" class="style16" id="b" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="<?=$sqlnum_Chart2[num]?>">
            </span>
                  <td width="10%"><span class="style23">
                                        <input name="c1" type="text" class="style16" id="c" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="<?=$sqlnum_Chart[num]?>">
            </span>
                  <td width="10%"><span class="style23">
                                        <input name="d1" type="text" class="style16" id="d" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="<?=$sqlnum_Chart4[num]?>">
            </span>
                </tr>
            
               
              
<tr bgcolor=#fbff94>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;1.1&nbsp;จำนวนมารดาที่คลอดในโรงพยาบาลทั้งหมด				
				</span></td>
                  <td width="10%"><span class="style23">
                                        <input name="a2" type="text" class="style16" id="a" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
                  </span>
                  <td width="10%"><span class="style23">
                                        <input name="b2" type="text" class="style16" id="b" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                  <td width="10%"><span class="style23">
                                        <input name="c2" type="text" class="style16" id="c" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                  <td width="10%"><span class="style23">
                                        <input name="d2" type="text" class="style16" id="d" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                 </tr>
            
               
              
<tr bgcolor=#ffe6a4>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.1.1&nbsp;คลอดปกติ [ O800 ]				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a11" type="text" class="style16" id="a11" onKeyPress="checknumber()" value="<?=$sqlnum_dxmom[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b11" type="text" class="style16" id="b11" onKeyPress="checknumber()" value="<?=$sqlnum_dxmom1[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c11" type="text" class="style16" id="c11" onKeyPress="checknumber()" value="<?=$sqlnum_dxmom2[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d11" type="text" class="style16" id="d11" onKeyPress="checknumber()" value="<?=$sqlnum_dxmom3[num]?>"  size="3" maxlength="4">
              </span>
                 </tr>
            
          <?
 //คลอดผิดปกติ
	// ในเขตอำเภอ age
	$chkper_dxmom_abnormal="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE (stat_event!='2' AND  stat_event!='3') AND (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ((dx_mom1!='O800' AND dx_mom1!='O809') AND (dx_mom2!='O800' AND dx_mom2!='O809') AND (dx_mom3!='O800' AND dx_mom3!='O809')  AND (dx_mom4!='O800' AND dx_mom4!='O809') AND  (dx_mom5!='O800' AND dx_mom5!='O809') AND (dx_mom6!='O800' AND dx_mom6!='O809')) AND  (aumper='02' AND province='34')";
	$sqlquery_dxmom_abnormal=$mysqli->query($chkper_dxmom_abnormal);
	$sqlnum_dxmom_abnormal=$sqlquery_dxmom_abnormal->fetch_assoc();
	// นอกเขตอำเภอ  
	 	$chkper_dxmom1_abnormal="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE  (stat_event!='2' AND  stat_event!='3') AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ((dx_mom1!='O800' AND dx_mom1!='O809') AND (dx_mom2!='O800' AND dx_mom2!='O809') AND (dx_mom3!='O800' AND dx_mom3!='O809')  AND (dx_mom4!='O800' AND dx_mom4!='O809') AND  (dx_mom5!='O800' AND dx_mom5!='O809') AND (dx_mom6!='O800' AND dx_mom6!='O809')) AND  (aumper!='02' AND province='34')";

 
	$sqlquery_dxmom1_abnormal=$mysqli->query($chkper_dxmom1_abnormal);
	$sqlnum_dxmom1_abnormal=$sqlquery_dxmom1_abnormal->fetch_assoc();
		// นอกเขตจังหวัด
 	$chkper_dxmom2_abnormal="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE  (stat_event!='2' AND  stat_event!='3') AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ((dx_mom1!='O800' AND dx_mom1!='O809') AND (dx_mom2!='O800' AND dx_mom2!='O809') AND (dx_mom3!='O800' AND dx_mom3!='O809')  AND (dx_mom4!='O800' AND dx_mom4!='O809') AND  (dx_mom5!='O800' AND dx_mom5!='O809') AND (dx_mom6!='O800' AND dx_mom6!='O809')) AND  (province!='34') AND (province!='00')";
	$sqlquery_dxmom2_abnormal=$mysqli->query($chkper_dxmom2_abnormal);
	$sqlnum_dxmom2_abnormal=$sqlquery_dxmom2_abnormal->fetch_assoc();
		// นอกเขตประเทศ
 	$chkper_dxmom3_abnormal="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE  (stat_event!='2' AND  stat_event!='3') AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ((dx_mom1!='O800' AND dx_mom1!='O809') AND (dx_mom2!='O800' AND dx_mom2!='O809') AND (dx_mom3!='O800' AND dx_mom3!='O809')  AND (dx_mom4!='O800' AND dx_mom4!='O809') AND  (dx_mom5!='O800' AND dx_mom5!='O809') AND (dx_mom6!='O800' AND dx_mom6!='O809')) AND  (province='00')";
	$sqlquery_dxmom3_abnormal=$mysqli->query($chkper_dxmom3_abnormal);
	$sqlnum_dxmom3_abnormal=$sqlquery_dxmom3_abnormal->fetch_assoc();

 
  ?>
<tr bgcolor=#ffe6a4>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.1.2&nbsp;คลอดผิดปกติ				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a3" type="text" class="style16" id="a3" onKeyPress="checknumber()" value="<?=$sqlnum_dxmom_abnormal[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b3" type="text" class="style16" id="b3" onKeyPress="checknumber()" value="<?=$sqlnum_dxmom1_abnormal[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c3" type="text" class="style16" id="c3" onKeyPress="checknumber()" value="<?=$sqlnum_dxmom2_abnormal[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d3" type="text" class="style16" id="d3" onKeyPress="checknumber()" value="<?=$sqlnum_dxmom3_abnormal[num]?>"  size="3" maxlength="4">
              </span>
                 </tr> 
            
               
              				        <?
			  
	// ในเขตอำเภอ age  Cloth of Gold delivery.  ผ่าท้องคลอด
	$sql_clothofgold1_alone="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ')  AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O82' AND 'O829') or  (dx_mom2 BETWEEN 'O82' AND 'O829') or  (dx_mom3 BETWEEN 'O82' AND 'O829') or  (dx_mom4 BETWEEN 'O82' AND 'O829') or  (dx_mom5 BETWEEN 'O82' AND 'O829') or  (dx_mom6 BETWEEN 'O82' AND 'O829')) AND (aumper='02' AND province='34') ORDER BY lbw_id desc";
	$sqlquery_clothofgold1_alone=$mysqli->query($sql_clothofgold1_alone);
	 $sqlnum_clothofgold1_alone=$sqlquery_clothofgold1_alone->fetch_assoc();
	// นอกเขตอำเภอ  

	 $sql_clothofgold2_alone="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ')   AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O82' AND 'O829') or  (dx_mom2 BETWEEN 'O82' AND 'O829') or  (dx_mom3 BETWEEN 'O82' AND 'O829') or  (dx_mom4 BETWEEN 'O82' AND 'O829') or  (dx_mom5 BETWEEN 'O82' AND 'O829') or  (dx_mom6 BETWEEN 'O82' AND 'O829')) AND  (aumper!='02' AND province='34') ORDER BY lbw_id desc";
	$sqlquery_clothofgold2_alone=$mysqli->query($sql_clothofgold2_alone);
	$sqlnum_clothofgold2_alone=$sqlquery_clothofgold2_alone->fetch_assoc();
		// นอกเขตจังหวัด

		
 	$sql_clothofgold3_alone="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ')   AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O82' AND 'O829') or  (dx_mom2 BETWEEN 'O82' AND 'O829') or  (dx_mom3 BETWEEN 'O82' AND 'O829') or  (dx_mom4 BETWEEN 'O82' AND 'O829') or  (dx_mom5 BETWEEN 'O82' AND 'O829') or  (dx_mom6 BETWEEN 'O82' AND 'O829')) AND    (province!='34') AND (province!='00')  ORDER BY lbw_id desc";
	$sqlquery_clothofgold3_alone=$mysqli->query($sql_clothofgold3_alone);
	$sqlnum_clothofgold3_alone=$sqlquery_clothofgold3_alone->fetch_assoc();
		// นอกเขตประเทศ
 
 	$sql_clothofgold4_alone="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ')  AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O82' AND 'O829') or  (dx_mom2 BETWEEN 'O82' AND 'O829') or  (dx_mom3 BETWEEN 'O82' AND 'O829') or  (dx_mom4 BETWEEN 'O82' AND 'O829') or  (dx_mom5 BETWEEN 'O82' AND 'O829') or  (dx_mom6 BETWEEN 'O82' AND 'O829')) AND     (province='00') ORDER BY lbw_id desc";
	$sqlquery_clothofgold4_alone=$mysqli->query($sql_clothofgold4_alone);
	$sqlnum_clothofgold4_alone=$sqlquery_clothofgold4_alone->fetch_assoc();
			   ?>

<tr bgcolor=#fbff94>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : โดยวิธีผ่าท้องคลอด [ O82,O829 ]			
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a12" type="text" class="style16" id="a12" onKeyPress="checknumber()" value="<?=$sqlnum_clothofgold1_alone[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b12" type="text" class="style16" id="b12" onKeyPress="checknumber()" value="<?=$sqlnum_clothofgold2_alone[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c12" type="text" class="style16" id="c12" onKeyPress="checknumber()" value="<?=$sqlnum_clothofgold3_alone[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d12" type="text" class="style16" id="d12" onKeyPress="checknumber()" value="<?=$sqlnum_clothofgold4_alone[num]?>"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              		<?
 	
	// ในเขตอำเภอ age  Cloth of Gold delivery.  โดยวิธีใช้คีม
	$sql_clothofgoldk1_alone="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O810' AND 'O813') or  (dx_mom2 BETWEEN 'O810' AND 'O813') or  (dx_mom3 BETWEEN 'O810' AND 'O813') or  (dx_mom4 BETWEEN 'O810' AND 'O813') or  (dx_mom5 BETWEEN 'O810' AND 'O813') or  (dx_mom6 BETWEEN 'O810' AND 'O813')) AND  (aumper='02' AND province='34') ORDER BY lbw_id desc";
	$sqlquery_clothofgoldk1_alone=$mysqli->query($sql_clothofgoldk1_alone);
	 $sqlnum_clothofgoldk1_alone=$sqlquery_clothofgoldk1_alone->fetch_assoc();
	// นอกเขตอำเภอ  
	 $sql_clothofgoldk2_alone="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ')  AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O810' AND 'O813') or  (dx_mom2 BETWEEN 'O810' AND 'O813') or  (dx_mom3 BETWEEN 'O810' AND 'O813') or  (dx_mom4 BETWEEN 'O810' AND 'O813') or  (dx_mom5 BETWEEN 'O810' AND 'O813') or  (dx_mom6 BETWEEN 'O810' AND 'O813')) AND  (aumper!='02' AND province='34') ORDER BY lbw_id desc";
	$sqlquery_clothofgoldk2_alone=$mysqli->query($sql_clothofgoldk2_alone);
	$sqlnum_clothofgoldk2_alone=$sqlquery_clothofgoldk2_alone->fetch_assoc();
		// นอกเขตจังหวัด

		
 	$sql_clothofgoldk3_alone="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ')   AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O810' AND 'O813') or  (dx_mom2 BETWEEN 'O810' AND 'O813') or  (dx_mom3 BETWEEN 'O810' AND 'O813') or  (dx_mom4 BETWEEN 'O810' AND 'O813') or  (dx_mom5 BETWEEN 'O810' AND 'O813') or  (dx_mom6 BETWEEN 'O810' AND 'O813')) AND    (province!='34') AND (province!='00')  ORDER BY lbw_id desc";
	$sqlquery_clothofgoldk3_alone=$mysqli->query($sql_clothofgoldk3_alone);
	$sqlnum_clothofgoldk3_alone=$sqlquery_clothofgoldk3_alone->fetch_assoc();
		// นอกเขตประเทศ
 
 	$sql_clothofgoldk4_alone="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O810' AND 'O813') or  (dx_mom2 BETWEEN 'O810' AND 'O813') or  (dx_mom3 BETWEEN 'O810' AND 'O813') or  (dx_mom4 BETWEEN 'O810' AND 'O813') or  (dx_mom5 BETWEEN 'O810' AND 'O813') or  (dx_mom6 BETWEEN 'O810' AND 'O813')) AND     (province='00') ORDER BY lbw_id desc";
	$sqlquery_clothofgoldk4_alone=$mysqli->query($sql_clothofgoldk4_alone);
	$sqlnum_clothofgoldk4_alone=$sqlquery_clothofgoldk4_alone->fetch_assoc();
			   ?>
<tr bgcolor=#ffe6a4>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : โดยวิธีใช้คีม [ O810,O813 ]			
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a13" type="text" class="style16" id="a13" onKeyPress="checknumber()" value="<?=$sqlnum_clothofgoldk1_alone[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b13" type="text" class="style16" id="b13" onKeyPress="checknumber()" value="<?=$sqlnum_clothofgoldk2_alone[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c13" type="text" class="style16" id="c13" onKeyPress="checknumber()" value="<?=$sqlnum_clothofgoldk3_alone[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d13" type="text" class="style16" id="d13" onKeyPress="checknumber()" value="<?=$sqlnum_clothofgoldk4_alone[num]?>"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
        	        <?
 
	// ในเขตอำเภอ age  Cloth of Gold delivery.  โดยวิธีใช้เครื่องสูญญากาศ  vacuum
	$sql_vacuum1_alone="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O814' AND 'O814') or  (dx_mom2 BETWEEN 'O814' AND 'O814') or  (dx_mom3 BETWEEN 'O814' AND 'O814') or  (dx_mom4 BETWEEN 'O814' AND 'O814') or  (dx_mom5 BETWEEN 'O814' AND 'O814') or  (dx_mom6 BETWEEN 'O814' AND 'O814')) AND (aumper='02' AND province='34') ORDER BY lbw_id desc";
	$sqlquery_vacuum1_alone=$mysqli->query($sql_vacuum1_alone);
	 $sqlnum_vacuum1_alone=$sqlquery_vacuum1_alone->fetch_assoc();
	// นอกเขตอำเภอ  

	 $sql_vacuum2_alone="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O814' AND 'O814') or  (dx_mom2 BETWEEN 'O814' AND 'O814') or  (dx_mom3 BETWEEN 'O814' AND 'O814') or  (dx_mom4 BETWEEN 'O814' AND 'O814') or  (dx_mom5 BETWEEN 'O814' AND 'O814') or  (dx_mom6 BETWEEN 'O814' AND 'O814')) AND  (aumper!='02' AND province='34') ORDER BY lbw_id desc";
	$sqlquery_vacuum2_alone=$mysqli->query($sql_vacuum2_alone);
	$sqlnum_vacuum2_alone=$sqlquery_vacuum2_alone->fetch_assoc();
		// นอกเขตจังหวัด

		
 	$sql_vacuum3_alone="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O814' AND 'O814') or  (dx_mom2 BETWEEN 'O814' AND 'O814') or  (dx_mom3 BETWEEN 'O814' AND 'O814') or  (dx_mom4 BETWEEN 'O814' AND 'O814') or  (dx_mom5 BETWEEN 'O814' AND 'O814') or  (dx_mom6 BETWEEN 'O814' AND 'O814')) AND    (province!='34') AND (province!='00')  ORDER BY lbw_id desc";
	$sqlquery_vacuum3_alone=$mysqli->query($sql_vacuum3_alone);
	$sqlnum_vacuum3_alone=$sqlquery_vacuum3_alone->fetch_assoc();
		// นอกเขตประเทศ
 
 	$sql_vacuum4_alone="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O814' AND 'O814') or  (dx_mom2 BETWEEN 'O814' AND 'O814') or  (dx_mom3 BETWEEN 'O814' AND 'O814') or  (dx_mom4 BETWEEN 'O814' AND 'O814') or  (dx_mom5 BETWEEN 'O814' AND 'O814') or  (dx_mom6 BETWEEN 'O814' AND 'O814')) AND     (province='00') ORDER BY lbw_id desc";
	$sqlquery_vacuum4_alone=$mysqli->query($sql_vacuum4_alone);
	$sqlnum_vacuum4_alone=$sqlquery_vacuum4_alone->fetch_assoc();
			   ?>               
<tr bgcolor=#fbff94>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : โดยวิธีใช้เครื่องสูญญากาศ [ O814 ]			
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a14" type="text" class="style16" id="a14" onKeyPress="checknumber()" value="<?=$sqlnum_vacuum1_alone[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b14" type="text" class="style16" id="b14" onKeyPress="checknumber()" value="<?=$sqlnum_vacuum2_alone[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c14" type="text" class="style16" id="c14" onKeyPress="checknumber()" value="<?=$sqlnum_vacuum3_alone[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d14" type="text" class="style16" id="d14" onKeyPress="checknumber()" value="<?=$sqlnum_vacuum4_alone[num]?>"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
      						        <?
	 
	// ในเขตอำเภอ age  Cloth of Gold delivery.  breech position.
	$sql_breech1_alone="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ')  AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O801' AND 'O801') or  (dx_mom2 BETWEEN 'O801' AND 'O801') or  (dx_mom3 BETWEEN 'O801' AND 'O801') or  (dx_mom4 BETWEEN 'O801' AND 'O801') or  (dx_mom5 BETWEEN 'O801' AND 'O801') or  (dx_mom6 BETWEEN 'O801' AND 'O801')) AND (aumper='02' AND province='34') ORDER BY lbw_id desc";
	$sqlquery_breech1_alone=$mysqli->query($sql_breech1_alone);
	 $sqlnum_breech1_alone=$sqlquery_breech1_alone->fetch_assoc();
	// นอกเขตอำเภอ  

	 $sql_breech2_alone="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ')  AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O801' AND 'O801') or  (dx_mom2 BETWEEN 'O801' AND 'O801') or  (dx_mom3 BETWEEN 'O801' AND 'O801') or  (dx_mom4 BETWEEN 'O801' AND 'O801') or  (dx_mom5 BETWEEN 'O801' AND 'O801') or  (dx_mom6 BETWEEN 'O801' AND 'O801')) AND  (aumper!='02' AND province='34') ORDER BY lbw_id desc";
	$sqlquery_breech2_alone=$mysqli->query($sql_breech2_alone);
	$sqlnum_breech2_alone=$sqlquery_breech2_alone->fetch_assoc();
		// นอกเขตจังหวัด

		
 	$sql_breech3_alone="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O801' AND 'O801') or  (dx_mom2 BETWEEN 'O801' AND 'O801') or  (dx_mom3 BETWEEN 'O801' AND 'O801') or  (dx_mom4 BETWEEN 'O801' AND 'O801') or  (dx_mom5 BETWEEN 'O801' AND 'O801') or  (dx_mom6 BETWEEN 'O801' AND 'O801')) AND    (province!='34') AND (province!='00')  ORDER BY lbw_id desc";
	$sqlquery_breech3_alone=$mysqli->query($sql_breech3_alone);
	$sqlnum_breech3_alone=$sqlquery_breech3_alone->fetch_assoc();
		// นอกเขตประเทศ
 
 	$sql_breech4_alone="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O801' AND 'O801') or  (dx_mom2 BETWEEN 'O801' AND 'O801') or  (dx_mom3 BETWEEN 'O801' AND 'O801') or  (dx_mom4 BETWEEN 'O801' AND 'O801') or  (dx_mom5 BETWEEN 'O801' AND 'O801') or  (dx_mom6 BETWEEN 'O801' AND 'O801')) AND     (province='00') ORDER BY lbw_id desc";
	$sqlquery_breech4_alone=$mysqli->query($sql_breech4_alone);
	$sqlnum_breech4_alone=$sqlquery_breech4_alone->fetch_assoc();
			   ?>          
<tr bgcolor=#ffe6a4>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : คลอดท่าก้น [ O801 ]				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a15" type="text" class="style16" id="a15" onKeyPress="checknumber()" value="<?=$sqlnum_breech1_alone[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b15" type="text" class="style16" id="b15" onKeyPress="checknumber()" value="<?=$sqlnum_breech2_alone[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c15" type="text" class="style16" id="c15" onKeyPress="checknumber()" value="<?=$sqlnum_breech3_alone[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d15" type="text" class="style16" id="d15" onKeyPress="checknumber()" value="<?=$sqlnum_breech4_alone[num]?>"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
         <!--     
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.1.3&nbsp;คลอดครรภ์แฝด				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a4" type="text" class="style16" id="a4" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b4" type="text" class="style16" id="b4" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c4" type="text" class="style16" id="c4" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d4" type="text" class="style16" id="d4" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;1.2&nbsp;จำนวนมารดาที่คลอดก่อนถึงโรงพยาบาล				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a5" type="text" class="style16" id="a5" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b5" type="text" class="style16" id="b5" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c5" type="text" class="style16" id="c5" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d5" type="text" class="style16" id="d5" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;1.3&nbsp;จำนวนมารดาที่คลอดที่บ้าน				
				</span></td>
                  <td width="10%"><span class="style23">
                                        <input name="a6" type="text" class="style16" id="a" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
                  </span>
                  <td width="10%"><span class="style23">
                                        <input name="b6" type="text" class="style16" id="b" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                  <td width="10%"><span class="style23">
                                        <input name="c6" type="text" class="style16" id="c" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                  <td width="10%"><span class="style23">
                                        <input name="d6" type="text" class="style16" id="d" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.3.1&nbsp;คลอดโดย จนท.สธ. หรือ ผดบ.				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a16" type="text" class="style16" id="a16" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b16" type="text" class="style16" id="b16" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c16" type="text" class="style16" id="c16" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d16" type="text" class="style16" id="d16" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.3.2&nbsp;คลอดเอง				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a17" type="text" class="style16" id="a17" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b17" type="text" class="style16" id="b17" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c17" type="text" class="style16" id="c17" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d17" type="text" class="style16" id="d17" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
        
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				<strong>2&nbsp;</strong><strong>จำนวนเด็กเกิดทั้งหมด</strong>				
				</span></td>
                  <td width="10%"><span class="style23">
                                        <input name="a7" type="text" class="style16" id="a" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
                  </span>
                  <td width="10%"><span class="style23">
                                        <input name="b7" type="text" class="style16" id="b" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                  <td width="10%"><span class="style23">
                                        <input name="c7" type="text" class="style16" id="c" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                  <td width="10%"><span class="style23">
                                        <input name="d7" type="text" class="style16" id="d" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;2.1&nbsp;จำนวนเด็กเกิดมีชีพ				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a8" type="text" class="style16" id="a8" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b8" type="text" class="style16" id="b8" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c8" type="text" class="style16" id="c8" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d8" type="text" class="style16" id="d8" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;2.2&nbsp;จำนวนเด็กเกิดไร้ชีพ				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a9" type="text" class="style16" id="a9" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b9" type="text" class="style16" id="b9" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c9" type="text" class="style16" id="c9" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d9" type="text" class="style16" id="d9" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				<strong>3&nbsp;</strong><strong>จำนวนเด็ก อายุต่ำกว่า 7 วัน ตาย</strong>				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a10" type="text" class="style16" id="a10" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b10" type="text" class="style16" id="b10" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c10" type="text" class="style16" id="c10" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d10" type="text" class="style16" id="d10" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;3.1&nbsp;จำนวนทารกตายปริกำเนิด (ข้อ 2.2 + ข้อ 3)				
				</span></td>
                  <td width="10%"><span class="style23">
                                        <input name="a18" type="text" class="style16" id="a" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
                  </span>
                  <td width="10%"><span class="style23">
                                        <input name="b18" type="text" class="style16" id="b" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                  <td width="10%"><span class="style23">
                                        <input name="c18" type="text" class="style16" id="c" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                  <td width="10%"><span class="style23">
                                        <input name="d18" type="text" class="style16" id="d" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				<strong>4&nbsp;</strong><strong>สาเหตุการตายของทารกปริกำเนิด(ข้อ 3.1)</strong>				
				</span></td>
                  <td width="10%"><span class="style23">
                                        <input name="a19" type="text" class="style16" id="a" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
                  </span>
                  <td width="10%"><span class="style23">
                                        <input name="b19" type="text" class="style16" id="b" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                  <td width="10%"><span class="style23">
                                        <input name="c19" type="text" class="style16" id="c" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                  <td width="10%"><span class="style23">
                                        <input name="d19" type="text" class="style16" id="d" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;4.1&nbsp;ตายเปื่อยยุ่ย				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a20" type="text" class="style16" id="a20" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b20" type="text" class="style16" id="b20" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c20" type="text" class="style16" id="c20" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d20" type="text" class="style16" id="d20" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;4.2&nbsp;ตายคลอดสด				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a21" type="text" class="style16" id="a21" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b21" type="text" class="style16" id="b21" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c21" type="text" class="style16" id="c21" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d21" type="text" class="style16" id="d21" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;4.3&nbsp;รูปวิปริต/ พิการแต่กำเนิด				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a22" type="text" class="style16" id="a22" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b22" type="text" class="style16" id="b22" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c22" type="text" class="style16" id="c22" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d22" type="text" class="style16" id="d22" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;4.4&nbsp;ขาดออกซิเจนขณะคลอด				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a23" type="text" class="style16" id="a23" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b23" type="text" class="style16" id="b23" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c23" type="text" class="style16" id="c23" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d23" type="text" class="style16" id="d23" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;4.5&nbsp;คลอดก่อนกำหนด				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a24" type="text" class="style16" id="a24" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b24" type="text" class="style16" id="b24" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c24" type="text" class="style16" id="c24" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d24" type="text" class="style16" id="d24" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;4.6&nbsp;สาเหตุเฉพาะอื่นๆ ทั้งในมารดาหรือในทารก				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a25" type="text" class="style16" id="a25" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b25" type="text" class="style16" id="b25" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c25" type="text" class="style16" id="c25" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d25" type="text" class="style16" id="d25" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;4.7&nbsp;ไม่ทราบสาเหตุ				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a26" type="text" class="style16" id="a26" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b26" type="text" class="style16" id="b26" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c26" type="text" class="style16" id="c26" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d26" type="text" class="style16" id="d26" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            -->
               <!-- จำนวนเด็กเกิดมีชีพน้ำหนัก < 2,500 กรัม -->
              <? include "report/bw2500than.php";?>
<? include "report/baby_apgar_score.php";?>
  
 

										        <?
			   //วิธีการคลอดของเด็กที่มีคะแนน Apgar score น้อยกว่าหรือเท่ากับ  7 คะแนน			
	// ในเขตอำเภอ age  Cloth of Gold delivery.  ผ่าท้องคลอด
	$sql_clothofgold1="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND (apgar<='7')  AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O82' AND 'O829') or  (dx_mom2 BETWEEN 'O82' AND 'O829') or  (dx_mom3 BETWEEN 'O82' AND 'O829') or  (dx_mom4 BETWEEN 'O82' AND 'O829') or  (dx_mom5 BETWEEN 'O82' AND 'O829') or  (dx_mom6 BETWEEN 'O82' AND 'O829')) AND (aumper='02' AND province='34') ORDER BY lbw_id desc";
	$sqlquery_clothofgold1=$mysqli->query($sql_clothofgold1);
	 $sqlnum_clothofgold1=$sqlquery_clothofgold1->fetch_assoc();
	// นอกเขตอำเภอ  

	 $sql_clothofgold2="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND (apgar<='7')  AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O82' AND 'O829') or  (dx_mom2 BETWEEN 'O82' AND 'O829') or  (dx_mom3 BETWEEN 'O82' AND 'O829') or  (dx_mom4 BETWEEN 'O82' AND 'O829') or  (dx_mom5 BETWEEN 'O82' AND 'O829') or  (dx_mom6 BETWEEN 'O82' AND 'O829')) AND  (aumper!='02' AND province='34') ORDER BY lbw_id desc";
	$sqlquery_clothofgold2=$mysqli->query($sql_clothofgold2);
	$sqlnum_clothofgold2=$sqlquery_clothofgold2->fetch_assoc();
		// นอกเขตจังหวัด

		
 	$sql_clothofgold3="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND (apgar<='7')  AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O82' AND 'O829') or  (dx_mom2 BETWEEN 'O82' AND 'O829') or  (dx_mom3 BETWEEN 'O82' AND 'O829') or  (dx_mom4 BETWEEN 'O82' AND 'O829') or  (dx_mom5 BETWEEN 'O82' AND 'O829') or  (dx_mom6 BETWEEN 'O82' AND 'O829')) AND    (province!='34') AND (province!='00')  ORDER BY lbw_id desc";
	$sqlquery_clothofgold3=$mysqli->query($sql_clothofgold3);
	$sqlnum_clothofgold3=$sqlquery_clothofgold3->fetch_assoc();
		// นอกเขตประเทศ
 
 	$sql_clothofgold4="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND (apgar<='7')  AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O82' AND 'O829') or  (dx_mom2 BETWEEN 'O82' AND 'O829') or  (dx_mom3 BETWEEN 'O82' AND 'O829') or  (dx_mom4 BETWEEN 'O82' AND 'O829') or  (dx_mom5 BETWEEN 'O82' AND 'O829') or  (dx_mom6 BETWEEN 'O82' AND 'O829')) AND     (province='00') ORDER BY lbw_id desc";
	$sqlquery_clothofgold4=$mysqli->query($sql_clothofgold4);
	$sqlnum_clothofgold4=$sqlquery_clothofgold4->fetch_assoc();
			   ?>

    
               
   <tr bgcolor=#ffe6a4>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;6.3&nbsp;วิธีการคลอดของเด็กที่มีคะแนน Apgar score น้อยกว่าหรือเท่ากับ  7 คะแนน				
				</span></td>
                  <td width="10%"><span class="style23">
                                        <input name="a34" type="text" class="style16" id="a" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
                  </span>
                  <td width="10%"><span class="style23">
                                        <input name="b34" type="text" class="style16" id="b" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                  <td width="10%"><span class="style23">
                                        <input name="c34" type="text" class="style16" id="c" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                  <td width="10%"><span class="style23">
                                        <input name="d34" type="text" class="style16" id="d" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                 </tr>           
<tr bgcolor=#fbff94>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.3.1&nbsp;โดยวิธีการผ่าท้องคลอด&nbsp;[O82 ถึง O829]
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a35" type="text" class="style16" id="a35" onKeyPress="checknumber()" value="<?=$sqlnum_clothofgold1[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b35" type="text" class="style16" id="b35" onKeyPress="checknumber()" value="<?=$sqlnum_clothofgold2[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c35" type="text" class="style16" id="c35" onKeyPress="checknumber()" value="<?=$sqlnum_clothofgold3[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d35" type="text" class="style16" id="d35" onKeyPress="checknumber()" value="<?=$sqlnum_clothofgold4[num]?>"  size="3" maxlength="4">
              </span>
                 </tr>
 
              		
														
														<?
			   //วิธีการคลอดของเด็กที่มีคะแนน Apgar score น้อยกว่าหรือเท่ากับ  7 คะแนน			
	// ในเขตอำเภอ age  Cloth of Gold delivery.  โดยวิธีใช้คีม
	$sql_clothofgoldk1="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND (apgar<='7')  AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O810' AND 'O813') or  (dx_mom2 BETWEEN 'O810' AND 'O813') or  (dx_mom3 BETWEEN 'O810' AND 'O813') or  (dx_mom4 BETWEEN 'O810' AND 'O813') or  (dx_mom5 BETWEEN 'O810' AND 'O813') or  (dx_mom6 BETWEEN 'O810' AND 'O813')) AND  (aumper='02' AND province='34') ORDER BY lbw_id desc";
	$sqlquery_clothofgoldk1=$mysqli->query($sql_clothofgoldk1);
	 $sqlnum_clothofgoldk1=$sqlquery_clothofgoldk1->fetch_assoc();
	// นอกเขตอำเภอ  
	 $sql_clothofgoldk2="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND (apgar<='7')  AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O810' AND 'O813') or  (dx_mom2 BETWEEN 'O810' AND 'O813') or  (dx_mom3 BETWEEN 'O810' AND 'O813') or  (dx_mom4 BETWEEN 'O810' AND 'O813') or  (dx_mom5 BETWEEN 'O810' AND 'O813') or  (dx_mom6 BETWEEN 'O810' AND 'O813')) AND  (aumper!='02' AND province='34') ORDER BY lbw_id desc";
	$sqlquery_clothofgoldk2=$mysqli->query($sql_clothofgoldk2);
	$sqlnum_clothofgoldk2=$sqlquery_clothofgoldk2->fetch_assoc();
		// นอกเขตจังหวัด

		
 	$sql_clothofgoldk3="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND (apgar<='7')  AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O810' AND 'O813') or  (dx_mom2 BETWEEN 'O810' AND 'O813') or  (dx_mom3 BETWEEN 'O810' AND 'O813') or  (dx_mom4 BETWEEN 'O810' AND 'O813') or  (dx_mom5 BETWEEN 'O810' AND 'O813') or  (dx_mom6 BETWEEN 'O810' AND 'O813')) AND    (province!='34') AND (province!='00')  ORDER BY lbw_id desc";
	$sqlquery_clothofgoldk3=$mysqli->query($sql_clothofgoldk3);
	$sqlnum_clothofgoldk3=$sqlquery_clothofgoldk3->fetch_assoc();
		// นอกเขตประเทศ
 
 	$sql_clothofgoldk4="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND (apgar<='7')  AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O810' AND 'O813') or  (dx_mom2 BETWEEN 'O810' AND 'O813') or  (dx_mom3 BETWEEN 'O810' AND 'O813') or  (dx_mom4 BETWEEN 'O810' AND 'O813') or  (dx_mom5 BETWEEN 'O810' AND 'O813') or  (dx_mom6 BETWEEN 'O810' AND 'O813')) AND     (province='00') ORDER BY lbw_id desc";
	$sqlquery_clothofgoldk4=$mysqli->query($sql_clothofgoldk4);
	$sqlnum_clothofgoldk4=$sqlquery_clothofgoldk4->fetch_assoc();
			   ?>
<tr bgcolor=#ffe6a4>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.3.2&nbsp;โดยวิธีใช้คีม  [O810 - O813]
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a36" type="text" class="style16" id="a36" onKeyPress="checknumber()" value="<?=$sqlnum_clothofgoldk1[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b36" type="text" class="style16" id="b36" onKeyPress="checknumber()" value="<?=$sqlnum_clothofgoldk2[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c36" type="text" class="style16" id="c36" onKeyPress="checknumber()" value="<?=$sqlnum_clothofgoldk3[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d36" type="text" class="style16" id="d36" onKeyPress="checknumber()" value="<?=$sqlnum_clothofgoldk4[num]?>"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
                  									        <?
			   //วิธีการคลอดของเด็กที่มีคะแนน Apgar score น้อยกว่าหรือเท่ากับ  7 คะแนน			
	// ในเขตอำเภอ age  Cloth of Gold delivery.  โดยวิธีใช้เครื่องสูญญากาศ  vacuum
	$sql_vacuum1="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND (apgar<='7')  AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O814' AND 'O814') or  (dx_mom2 BETWEEN 'O814' AND 'O814') or  (dx_mom3 BETWEEN 'O814' AND 'O814') or  (dx_mom4 BETWEEN 'O814' AND 'O814') or  (dx_mom5 BETWEEN 'O814' AND 'O814') or  (dx_mom6 BETWEEN 'O814' AND 'O814')) AND (aumper='02' AND province='34') ORDER BY lbw_id desc";
	$sqlquery_vacuum1=$mysqli->query($sql_vacuum1);
	 $sqlnum_vacuum1=$sqlquery_vacuum1->fetch_assoc();
	// นอกเขตอำเภอ  

	 $sql_vacuum2="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND (apgar<='7')  AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O814' AND 'O814') or  (dx_mom2 BETWEEN 'O814' AND 'O814') or  (dx_mom3 BETWEEN 'O814' AND 'O814') or  (dx_mom4 BETWEEN 'O814' AND 'O814') or  (dx_mom5 BETWEEN 'O814' AND 'O814') or  (dx_mom6 BETWEEN 'O814' AND 'O814')) AND  (aumper!='02' AND province='34') ORDER BY lbw_id desc";
	$sqlquery_vacuum2=$mysqli->query($sql_vacuum2);
	$sqlnum_vacuum2=$sqlquery_vacuum2->fetch_assoc();
		// นอกเขตจังหวัด

		
 	$sql_vacuum3="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND (apgar<='7')  AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O814' AND 'O814') or  (dx_mom2 BETWEEN 'O814' AND 'O814') or  (dx_mom3 BETWEEN 'O814' AND 'O814') or  (dx_mom4 BETWEEN 'O814' AND 'O814') or  (dx_mom5 BETWEEN 'O814' AND 'O814') or  (dx_mom6 BETWEEN 'O814' AND 'O814')) AND    (province!='34') AND (province!='00')  ORDER BY lbw_id desc";
	$sqlquery_vacuum3=$mysqli->query($sql_vacuum3);
	$sqlnum_vacuum3=$sqlquery_vacuum3->fetch_assoc();
		// นอกเขตประเทศ
 
 	$sql_vacuum4="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND (apgar<='7')  AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O814' AND 'O814') or  (dx_mom2 BETWEEN 'O814' AND 'O814') or  (dx_mom3 BETWEEN 'O814' AND 'O814') or  (dx_mom4 BETWEEN 'O814' AND 'O814') or  (dx_mom5 BETWEEN 'O814' AND 'O814') or  (dx_mom6 BETWEEN 'O814' AND 'O814')) AND     (province='00') ORDER BY lbw_id desc";
	$sqlquery_vacuum4=$mysqli->query($sql_vacuum4);
	$sqlnum_vacuum4=$sqlquery_vacuum4->fetch_assoc();
			   ?>         
<tr bgcolor=#fbff94>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.3.3&nbsp;โดยวิธีใช้เครื่องสูญญากาศ [O814]				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a37" type="text" class="style16" id="a37" onKeyPress="checknumber()" value="<?=$sqlnum_vacuum1[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b37" type="text" class="style16" id="b37" onKeyPress="checknumber()" value="<?=$sqlnum_vacuum2[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c37" type="text" class="style16" id="c37" onKeyPress="checknumber()" value="<?=$sqlnum_vacuum3[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d37" type="text" class="style16" id="d37" onKeyPress="checknumber()" value="<?=$sqlnum_vacuum4[num]?>"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
                            									        <?
			   //วิธีการคลอดของเด็กที่มีคะแนน Apgar score น้อยกว่าหรือเท่ากับ  7 คะแนน			
	// ในเขตอำเภอ age  Cloth of Gold delivery.  breech position.
	$sql_breech1="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND (apgar<='7')  AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O801' AND 'O801') or  (dx_mom2 BETWEEN 'O801' AND 'O801') or  (dx_mom3 BETWEEN 'O801' AND 'O801') or  (dx_mom4 BETWEEN 'O801' AND 'O801') or  (dx_mom5 BETWEEN 'O801' AND 'O801') or  (dx_mom6 BETWEEN 'O801' AND 'O801')) AND (aumper='02' AND province='34') ORDER BY lbw_id desc";
	$sqlquery_breech1=$mysqli->query($sql_breech1);
	 $sqlnum_breech1=$sqlquery_breech1->fetch_assoc();
	// นอกเขตอำเภอ  

	 $sql_breech2="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND (apgar<='7')  AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O801' AND 'O801') or  (dx_mom2 BETWEEN 'O801' AND 'O801') or  (dx_mom3 BETWEEN 'O801' AND 'O801') or  (dx_mom4 BETWEEN 'O801' AND 'O801') or  (dx_mom5 BETWEEN 'O801' AND 'O801') or  (dx_mom6 BETWEEN 'O801' AND 'O801')) AND  (aumper!='02' AND province='34') ORDER BY lbw_id desc";
	$sqlquery_breech2=$mysqli->query($sql_breech2);
	$sqlnum_breech2=$sqlquery_breech2->fetch_assoc();
		// นอกเขตจังหวัด

		
 	$sql_breech3="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND (apgar<='7')  AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O801' AND 'O801') or  (dx_mom2 BETWEEN 'O801' AND 'O801') or  (dx_mom3 BETWEEN 'O801' AND 'O801') or  (dx_mom4 BETWEEN 'O801' AND 'O801') or  (dx_mom5 BETWEEN 'O801' AND 'O801') or  (dx_mom6 BETWEEN 'O801' AND 'O801')) AND    (province!='34') AND (province!='00')  ORDER BY lbw_id desc";
	$sqlquery_breech3=$mysqli->query($sql_breech3);
	$sqlnum_breech3=$sqlquery_breech3->fetch_assoc();
		// นอกเขตประเทศ
 
 	$sql_breech4="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND (apgar<='7')  AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O801' AND 'O801') or  (dx_mom2 BETWEEN 'O801' AND 'O801') or  (dx_mom3 BETWEEN 'O801' AND 'O801') or  (dx_mom4 BETWEEN 'O801' AND 'O801') or  (dx_mom5 BETWEEN 'O801' AND 'O801') or  (dx_mom6 BETWEEN 'O801' AND 'O801')) AND     (province='00') ORDER BY lbw_id desc";
	$sqlquery_breech4=$mysqli->query($sql_breech4);
	$sqlnum_breech4=$sqlquery_breech4->fetch_assoc();
			   ?>  
<tr bgcolor=#ffe6a4>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.3.4&nbsp;คลอดท่าก้น [O801]			 	
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a38" type="text" class="style16" id="a38" onKeyPress="checknumber()" value="<?=$sqlnum_breech1[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b38" type="text" class="style16" id="b38" onKeyPress="checknumber()" value="<?=$sqlnum_breech2[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c38" type="text" class="style16" id="c38" onKeyPress="checknumber()" value="<?=$sqlnum_breech3[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d38" type="text" class="style16" id="d38" onKeyPress="checknumber()" value="<?=$sqlnum_breech4[num]?>"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
                                         									        <?
			   //วิธีการคลอดของเด็กที่มีคะแนน Apgar score น้อยกว่าหรือเท่ากับ  7 คะแนน			
	// ในเขตอำเภอ age  Cloth of Gold delivery.  breech position.
	$sql_breechnormal1="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND (apgar<='7')  AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O800' AND 'O800') or  (dx_mom2 BETWEEN 'O800' AND 'O800') or  (dx_mom3 BETWEEN 'O800' AND 'O800') or  (dx_mom4 BETWEEN 'O800' AND 'O800') or  (dx_mom5 BETWEEN 'O800' AND 'O800') or  (dx_mom6 BETWEEN 'O800' AND 'O800')) AND (aumper='02' AND province='34') ORDER BY lbw_id desc";
	$sqlquery_breechnormal1=$mysqli->query($sql_breechnormal1);
	 $sqlnum_breechnormal1=$sqlquery_breechnormal1->fetch_assoc();
	// นอกเขตอำเภอ  

	 $sql_breechnormal2="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND (apgar<='7')  AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O800' AND 'O800') or  (dx_mom2 BETWEEN 'O800' AND 'O800') or  (dx_mom3 BETWEEN 'O800' AND 'O800') or  (dx_mom4 BETWEEN 'O800' AND 'O800') or  (dx_mom5 BETWEEN 'O800' AND 'O800') or  (dx_mom6 BETWEEN 'O800' AND 'O800')) AND  (aumper!='02' AND province='34') ORDER BY lbw_id desc";
	$sqlquery_breechnormal2=$mysqli->query($sql_breechnormal2);
	$sqlnum_breechnormal2=$sqlquery_breechnormal2->fetch_assoc();
		// นอกเขตจังหวัด

		
 	$sql_breechnormal3="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND (apgar<='7')  AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O800' AND 'O800') or  (dx_mom2 BETWEEN 'O800' AND 'O800') or  (dx_mom3 BETWEEN 'O800' AND 'O800') or  (dx_mom4 BETWEEN 'O800' AND 'O800') or  (dx_mom5 BETWEEN 'O800' AND 'O800') or  (dx_mom6 BETWEEN 'O800' AND 'O800')) AND    (province!='34') AND (province!='00')  ORDER BY lbw_id desc";
	$sqlquery_breechnormal3=$mysqli->query($sql_breechnormal3);
	$sqlnum_breechnormal3=$sqlquery_breechnormal3->fetch_assoc();
		// นอกเขตประเทศ
 
 	$sql_breechnormal4="SELECT COUNT( * ) AS num  FROM   lr_lbw WHERE  (stat_event!='2' AND stat_event!='3 ') AND (apgar<='7')  AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND ( (dx_mom1 BETWEEN 'O800' AND 'O800') or  (dx_mom2 BETWEEN 'O800' AND 'O800') or  (dx_mom3 BETWEEN 'O800' AND 'O800') or  (dx_mom4 BETWEEN 'O800' AND 'O800') or  (dx_mom5 BETWEEN 'O800' AND 'O800') or  (dx_mom6 BETWEEN 'O800' AND 'O800')) AND     (province='00') ORDER BY lbw_id desc";
	$sqlquery_breechnormal4=$mysqli->query($sql_breechnormal4);
	$sqlnum_breechnormal4=$sqlquery_breechnormal4->fetch_assoc();
			   ?>  
<tr bgcolor=#fbff94>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.3.5&nbsp;คลอดปกติ [O800]				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a39" type="text" class="style16" id="a39" onKeyPress="checknumber()" value="<?=$sqlnum_breechnormal1[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b39" type="text" class="style16" id="b39" onKeyPress="checknumber()" value="<?=$sqlnum_breechnormal2[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c39" type="text" class="style16" id="c39" onKeyPress="checknumber()" value="<?=$sqlnum_breechnormal3[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d39" type="text" class="style16" id="d39" onKeyPress="checknumber()" value="<?=$sqlnum_breechnormal4[num]?>"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              <!--
<tr bgcolor=#ffe6a4>                <td width="50%" height="25"><span class="style23">
				<strong>7&nbsp;</strong><strong>จำนวนมารดาเสียชีวิตจากการตั้งครรภ์/ คลอด XXX</strong>				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a41" type="text" class="style16" id="a41" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b41" type="text" class="style16" id="b41" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c41" type="text" class="style16" id="c41" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d41" type="text" class="style16" id="d41" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            -->
               
        <? // สาเหตุการตาย
	//	include "report/report_dead_mom.php";
		?>              
              
<tr bgcolor=#ffe6a4>                <td width="50%" height="25"><span class="style23">
				<strong>9&nbsp;</strong><strong>จำนวนมารดาอายุต่ำกว่า 20 ปี คลอด</strong>				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a56" type="text" class="style16" id="a56" onKeyPress="checknumber()" value="<?=$sqlnum_chin1[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b56" type="text" class="style16" id="b56" onKeyPress="checknumber()" value="<?=$sqlnum_chin2[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c56" type="text" class="style16" id="c56" onKeyPress="checknumber()" value="<?=$sqlnum_chin3[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d56" type="text" class="style16" id="d56" onKeyPress="checknumber()" value="<?=$sqlnum_chin4[num]?>"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
                             <?
			   //การเฝ้าระวังภาวะโลหิตจางในหญิงตั้งครรภ์
	// ในเขตอำเภอ age
	$chkper_hct1="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND  hct1>'0' AND  (aumper='02' AND province='34')";

	$sqlquery_hct1=$mysqli->query($chkper_hct1);
	$sqlnum_hct1=$sqlquery_hct1->fetch_assoc();
	// นอกเขตอำเภอ  
	 	$chkper_hct12="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND hct1>'0' AND  (aumper!='02' AND province='34')";
	$sqlquery_hct12=$mysqli->query($chkper_hct12);
	$sqlnum_hct12=$sqlquery_hct12->fetch_assoc();
		// นอกเขตจังหวัด
 	$chkper_hct13="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND hct1>'0' AND  (province!='34') AND (province!='00')";
	$sqlquery_hct13=$mysqli->query($chkper_hct13);
	$sqlnum_hct13=$sqlquery_hct13->fetch_assoc();
		// นอกเขตประเทศ
 	$chkper_hct14="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND hct1>'0' AND  (province='00')";
	$sqlquery_hct14=$mysqli->query($chkper_hct14);
	$sqlnum_hct14=$sqlquery_hct14->fetch_assoc();
			   ?>




<tr bgcolor=#fbff94>                <td width="50%" height="25"><span class="style23">
				<strong>10&nbsp;</strong><strong>การเฝ้าระวังภาวะโลหิตจางในหญิงตั้งครรภ์</strong>				
				</span></td>
                  <td width="10%"><span class="style23">
                                      <td width="10%"><span class="style23">
                                      <td width="10%"><span class="style23">
                                      <td width="10%"><span class="style23">
                 </tr>
            
               
              
<tr bgcolor=#ffe6a4>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;10.1&nbsp;การเจาะ เลือดเพื่อตรวจ Hb หรือ Hct ครั้งที่ 1				
				</span></td>
                  <td width="10%"><span class="style23">
                                      <td width="10%"><span class="style23">
                                      <td width="10%"><span class="style23">
                                      <td width="10%"><span class="style23">
                 </tr>
            
               
              
<tr bgcolor=#fbff94>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10.1.1&nbsp;จำนวนมารดาที่ได้รับการเจาะ Hb หรือ Hct ครั้งที่ 1 -->				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a94" type="text" class="style16" id="a94" onKeyPress="checknumber()" value="<?=$sqlnum_hct1[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b94" type="text" class="style16" id="b94" onKeyPress="checknumber()" value="<?=$sqlnum_hct12[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c94" type="text" class="style16" id="c94" onKeyPress="checknumber()" value="<?=$sqlnum_hct13[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d94" type="text" class="style16" id="d94" onKeyPress="checknumber()" value="<?=$sqlnum_hct14[num]?>"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
                              <?
			   //การเฝ้าระวังภาวะโลหิตจางในหญิงตั้งครรภ์
	// ในเขตอำเภอ age
	$chkper_hct1Lessthan33="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND  hct1<'33' AND  (aumper='02' AND province='34')";

	$sqlquery_hct1Lessthan33=$mysqli->query($chkper_hct1Lessthan33);
	$sqlnum_hct1Lessthan33=$sqlquery_hct1Lessthan33->fetch_assoc();
	// นอกเขตอำเภอ  
	 	$chkper_hct12Lessthan33="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND hct1<'33' AND  (aumper!='02' AND province='34')";
	$sqlquery_hct12Lessthan33=$mysqli->query($chkper_hct12Lessthan33);
	$sqlnum_hct12Lessthan33=$sqlquery_hct12Lessthan33->fetch_assoc();
		// นอกเขตจังหวัด
 	$chkper_hct13Lessthan33="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND hct1<'33' AND  (province!='34') AND (province!='00')";
	$sqlquery_hct13Lessthan33=$mysqli->query($chkper_hct13Lessthan33);
	$sqlnum_hct13Lessthan33=$sqlquery_hct13Lessthan33->fetch_assoc();
		// นอกเขตประเทศ
 	$chkper_hct14Lessthan33="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND hct1<'33' AND  (province='00')";
	$sqlquery_hct14Lessthan33=$mysqli->query($chkper_hct14Lessthan33);
	$sqlnum_hct14Lessthan33=$sqlquery_hct14Lessthan33->fetch_assoc();
			   ?>             
<tr bgcolor=#ffe6a4>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10.1.2&nbsp;มารดามี Hb < 11 g% หรือ Hct  < 33 % -->				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a58" type="text" class="style16" id="a58" onKeyPress="checknumber()" value="<?=$sqlnum_hct1Lessthan33[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b58" type="text" class="style16" id="b58" onKeyPress="checknumber()" value="<?=$sqlnum_hct12Lessthan33[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c58" type="text" class="style16" id="c58" onKeyPress="checknumber()" value="<?=$sqlnum_hct13Lessthan33[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d58" type="text" class="style16" id="d58" onKeyPress="checknumber()" value="<?=$sqlnum_hct14Lessthan33[num]?>"  size="3" maxlength="4">
              </span>
                             </tr>
            
               
 <?
 			   //การเจาะ เลือดเพื่อตรวจ Hb หรือ Hct ครั้งที่ 2	์
	// ในเขตอำเภอ age
	$chkper_hct21="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND  hct2>'0' AND  (aumper='02' AND province='34')";

	$sqlquery_hct21=$mysqli->query($chkper_hct21);
	$sqlnum_hct21=$sqlquery_hct21->fetch_assoc();
	// นอกเขตอำเภอ  
	 	$chkper_hct212="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND hct2>'0' AND  (aumper!='02' AND province='34')";
	$sqlquery_hct212=$mysqli->query($chkper_hct212);
	$sqlnum_hct212=$sqlquery_hct212->fetch_assoc();
		// นอกเขตจังหวัด
 	$chkper_hct213="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND hct2>'0' AND  (province!='34') AND (province!='00')";
	$sqlquery_hct213=$mysqli->query($chkper_hct213);
	$sqlnum_hct213=$sqlquery_hct213->fetch_assoc();
		// นอกเขตประเทศ
 	$chkper_hct214="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND hct2>'0' AND  (province='00')";
	$sqlquery_hct214=$mysqli->query($chkper_hct214);
	$sqlnum_hct214=$sqlquery_hct214->fetch_assoc();
			   ?>
       
<tr bgcolor=#fbff94>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;10.2&nbsp;การเจาะ เลือดเพื่อตรวจ Hb หรือ Hct ครั้งที่ 2 				
				</span></td>
                  <td width="10%"><span class="style23">
                                      <td width="10%"><span class="style23">
                                      <td width="10%"><span class="style23">
                                      <td width="10%"><span class="style23">
                 </tr>
            
               
              
<tr bgcolor=#ffe6a4>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10.2.1&nbsp;จำนวนมารดาที่ได้รับการเจาะ Hb หรือ Hct ครั้งที่ 2 -->				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a96" type="text" class="style16" id="a96" onKeyPress="checknumber()" value="<?=$sqlnum_hct21[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b96" type="text" class="style16" id="b96" onKeyPress="checknumber()" value="<?=$sqlnum_hct212[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c96" type="text" class="style16" id="c96" onKeyPress="checknumber()" value="<?=$sqlnum_hct213[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d96" type="text" class="style16" id="d96" onKeyPress="checknumber()" value="<?=$sqlnum_hct214[num]?>"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
                                        <?
			   //การเฝ้าระวังภาวะโลหิตจางในหญิงตั้งครรภ์
	// ในเขตอำเภอ age
	$chkper_hct21Lessthan33="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND  hct2<'33' AND  (aumper='02' AND province='34')";
	$sqlquery_hct21Lessthan33=$mysqli->query($chkper_hct21Lessthan33);
	$sqlnum_hct21Lessthan33=$sqlquery_hct21Lessthan33->fetch_assoc();
	// นอกเขตอำเภอ  
	 	$chkper_hct212Lessthan33="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND hct2<'33' AND  (aumper!='02' AND province='34')";
	$sqlquery_hct212Lessthan33=$mysqli->query($chkper_hct212Lessthan33);
	$sqlnum_hct212Lessthan33=$sqlquery_hct212Lessthan33->fetch_assoc();
		// นอกเขตจังหวัด
 	$chkper_hct213Lessthan33="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND hct2<'33' AND  (province!='34') AND (province!='00')";
	$sqlquery_hct213Lessthan33=$mysqli->query($chkper_hct213Lessthan33);
	$sqlnum_hct213Lessthan33=$sqlquery_hct213Lessthan33->fetch_assoc();
		// นอกเขตประเทศ
 	$chkper_hct214Lessthan33="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND hct2<'33' AND  (province='00')";
	$sqlquery_hct214Lessthan33=$mysqli->query($chkper_hct214Lessthan33);
	$sqlnum_hct214Lessthan33=$sqlquery_hct214Lessthan33->fetch_assoc();
			   ?>
<tr bgcolor=#fbff94>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10.2.2&nbsp;มารดามี Hb < 11 g% หรือ Hct  < 33 %	 -->			
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a59" type="text" class="style16" id="a59" onKeyPress="checknumber()" value="<?=$sqlnum_hct21Lessthan33[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b59" type="text" class="style16" id="b59" onKeyPress="checknumber()" value="<?=$sqlnum_hct212Lessthan33[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c59" type="text" class="style16" id="c59" onKeyPress="checknumber()" value="<?=$sqlnum_hct213Lessthan33[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d59" type="text" class="style16" id="d59" onKeyPress="checknumber()" value="<?=$sqlnum_hct214Lessthan33[num]?>"  size="3" maxlength="4">
              </span>
                 </tr>
            
               <!--
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				<strong>11&nbsp;</strong><strong>ภาวะแทรกซ้อนขณะตั้งครรภ์/ คลอด/ หลังคลอด</strong>				
				</span></td>
                  <td width="10%"><span class="style23">
                                        <input name="a60" type="text" class="style16" id="a" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
                  </span>
                  <td width="10%"><span class="style23">
                                        <input name="b60" type="text" class="style16" id="b" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                  <td width="10%"><span class="style23">
                                        <input name="c60" type="text" class="style16" id="c" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                  <td width="10%"><span class="style23">
                                        <input name="d60" type="text" class="style16" id="d" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;11.1&nbsp;ภาวะแทรกซ้อนขณะตั้งครรภ์				
				</span></td>
                  <td width="10%"><span class="style23">
                                        <input name="a61" type="text" class="style16" id="a" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
                  </span>
                  <td width="10%"><span class="style23">
                                        <input name="b61" type="text" class="style16" id="b" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                  <td width="10%"><span class="style23">
                                        <input name="c61" type="text" class="style16" id="c" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                  <td width="10%"><span class="style23">
                                        <input name="d61" type="text" class="style16" id="d" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11.1.1&nbsp;ภาวะครรภ์เป็นพิษ				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a62" type="text" class="style16" id="a62" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b62" type="text" class="style16" id="b62" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c62" type="text" class="style16" id="c62" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d62" type="text" class="style16" id="d62" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11.1.2&nbsp;ตกเลือดก่อนคลอด				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a63" type="text" class="style16" id="a63" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b63" type="text" class="style16" id="b63" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c63" type="text" class="style16" id="c63" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d63" type="text" class="style16" id="d63" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11.1.3&nbsp;น้ำเดินก่อนเจ็บครรภ์เกิน 24 ชม.				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a64" type="text" class="style16" id="a64" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b64" type="text" class="style16" id="b64" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c64" type="text" class="style16" id="c64" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d64" type="text" class="style16" id="d64" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11.1.4&nbsp;แท้ง				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a65" type="text" class="style16" id="a65" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b65" type="text" class="style16" id="b65" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c65" type="text" class="style16" id="c65" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d65" type="text" class="style16" id="d65" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11.1.5&nbsp;โรคหัวใจ				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a66" type="text" class="style16" id="a66" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b66" type="text" class="style16" id="b66" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c66" type="text" class="style16" id="c66" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d66" type="text" class="style16" id="d66" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11.1.6&nbsp;โรคเบาหวาน				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a67" type="text" class="style16" id="a67" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b67" type="text" class="style16" id="b67" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c67" type="text" class="style16" id="c67" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d67" type="text" class="style16" id="d67" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11.1.7&nbsp;อื่น ๆ				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a68" type="text" class="style16" id="a68" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b68" type="text" class="style16" id="b68" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c68" type="text" class="style16" id="c68" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d68" type="text" class="style16" id="d68" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;11.2&nbsp;ภาวะแทรกซ้อนขณะคลอด				
				</span></td>
                  <td width="10%"><span class="style23">
                                        <input name="a69" type="text" class="style16" id="a" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
                  </span>
                  <td width="10%"><span class="style23">
                                        <input name="b69" type="text" class="style16" id="b" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                  <td width="10%"><span class="style23">
                                        <input name="c69" type="text" class="style16" id="c" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                  <td width="10%"><span class="style23">
                                        <input name="d69" type="text" class="style16" id="d" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11.2.1&nbsp;มดลูกแตก				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a70" type="text" class="style16" id="a70" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b70" type="text" class="style16" id="b70" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c70" type="text" class="style16" id="c70" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d70" type="text" class="style16" id="d70" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11.2.2&nbsp;น้ำคร่ำเป็นพิษ				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a71" type="text" class="style16" id="a71" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b71" type="text" class="style16" id="b71" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c71" type="text" class="style16" id="c71" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d71" type="text" class="style16" id="d71" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11.2.3&nbsp;รกติด				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a72" type="text" class="style16" id="a72" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b72" type="text" class="style16" id="b72" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c72" type="text" class="style16" id="c72" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d72" type="text" class="style16" id="d72" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11.2.4&nbsp;ตกเลือด				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a98" type="text" class="style16" id="a98" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b98" type="text" class="style16" id="b98" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c98" type="text" class="style16" id="c98" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d98" type="text" class="style16" id="d98" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11.2.5&nbsp;อื่นๆ				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a73" type="text" class="style16" id="a73" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b73" type="text" class="style16" id="b73" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c73" type="text" class="style16" id="c73" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d73" type="text" class="style16" id="d73" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;11.3&nbsp;ภาวะแทรกซ้อนหลังคลอด				
				</span></td>
                  <td width="10%"><span class="style23">
                                        <input name="a74" type="text" class="style16" id="a" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
                  </span>
                  <td width="10%"><span class="style23">
                                        <input name="b74" type="text" class="style16" id="b" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                  <td width="10%"><span class="style23">
                                        <input name="c74" type="text" class="style16" id="c" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                  <td width="10%"><span class="style23">
                                        <input name="d74" type="text" class="style16" id="d" onKeyPress="checknumber()"  size="3" maxlength="4" disabled="disabled"  value="xx">
            </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11.3.1&nbsp;ตกเลือด				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a75" type="text" class="style16" id="a75" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b75" type="text" class="style16" id="b75" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c75" type="text" class="style16" id="c75" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d75" type="text" class="style16" id="d75" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
              
<tr bgcolor=#000000>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11.3.2&nbsp;ติดเชื้อ				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a76" type="text" class="style16" id="a76" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b76" type="text" class="style16" id="b76" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c76" type="text" class="style16" id="c76" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d76" type="text" class="style16" id="d76" onKeyPress="checknumber()" value="0"  size="3" maxlength="4">
              </span>
                 </tr>
            -->
               
              
<tr bgcolor=#ffffff>                <td width="50%" height="25"><span class="style23">
				<strong>12&nbsp;</strong><strong>ข้อมูลการได้รับการฝากครรภ์ของมารดาที่คลอด</strong>				
				</span></td>
                  <td width="10%"><span class="style23">
                                      <td width="10%"><span class="style23">
                                      <td width="10%"><span class="style23">
                                      <td width="10%"><span class="style23">
                 </tr>
            
               <?
			   //จำนวนมารดาที่ ANC คลอดทั้งหมด
	// ในเขตอำเภอ age
	$chkper_anc1="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND  anc>'0' AND  (aumper='02' AND province='34')";

	$sqlquery_anc1=$mysqli->query($chkper_anc1);
	$sqlnum_anc1=$sqlquery_anc1->fetch_assoc();
	// นอกเขตอำเภอ  
	 	$chkper_anc2="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND anc>'0' AND  (aumper!='02' AND province='34')";
	$sqlquery_anc2=$mysqli->query($chkper_anc2);
	$sqlnum_anc2=$sqlquery_anc2->fetch_assoc();
		// นอกเขตจังหวัด
 	$chkper_anc3="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND anc>'0' AND  (province!='34') AND (province!='00')";
	$sqlquery_anc3=$mysqli->query($chkper_anc3);
	$sqlnum_anc3=$sqlquery_anc3->fetch_assoc();
		// นอกเขตประเทศ
 	$chkper_anc4="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND anc>'0' AND  (province='00')";
	$sqlquery_anc4=$mysqli->query($chkper_anc4);
	$sqlnum_anc4=$sqlquery_anc4->fetch_assoc();
			   ?>
              
<tr bgcolor=#f2fbff>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;12.1&nbsp;จำนวนมารดาที่ ANC คลอดทั้งหมด-->		
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a97" type="text" class="style16" id="a97" onKeyPress="checknumber()" value="<?=$sqlnum_anc1[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b97" type="text" class="style16" id="b97" onKeyPress="checknumber()" value="<?=$sqlnum_anc2[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c97" type="text" class="style16" id="c97" onKeyPress="checknumber()" value="<?=$sqlnum_anc3[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d97" type="text" class="style16" id="d97" onKeyPress="checknumber()" value="<?=$sqlnum_anc4[num]?>"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
          
	               <?
			   //จำนวนมารดาที่ ANC คลอดทั้งหมด
	// ในเขตอำเภอ age
	$chkper_anc1chk="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND anctf='1' AND  (aumper='02' AND province='34')";
	$sqlquery_anc1chk=$mysqli->query($chkper_anc1chk);
	$sqlnum_anc1chk=$sqlquery_anc1chk->fetch_assoc();
	// นอกเขตอำเภอ  
	 	$chkper_anc2chk="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND anctf='1' AND  (aumper!='02' AND province='34')";
	$sqlquery_anc2chk=$mysqli->query($chkper_anc2chk);
	$sqlnum_anc2chk=$sqlquery_anc2chk->fetch_assoc();
		// นอกเขตจังหวัด
 	$chkper_anc3chk="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND anctf='1' AND  (province!='34') AND (province!='00')";
	$sqlquery_anc3chk=$mysqli->query($chkper_anc3chk);
	$sqlnum_anc3chk=$sqlquery_anc3chk->fetch_assoc();
		// นอกเขตประเทศ
 	$chkper_anc4chk="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND anctf='1' AND  (province='00')";
	$sqlquery_anc4chk=$mysqli->query($chkper_anc4chk);
	$sqlnum_anc4chk=$sqlquery_anc4chk->fetch_assoc();
			   ?>
	 
<tr bgcolor=#ffffff>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;12.2&nbsp;จำนวนมารดาที่ ANC ครบ 5 ครั้งตามเกณฑ์				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a78" type="text" class="style16" id="a78" onKeyPress="checknumber()" value="<?=$sqlnum_anc1chk[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b78" type="text" class="style16" id="b78" onKeyPress="checknumber()" value="<?=$sqlnum_anc2chk[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c78" type="text" class="style16" id="c78" onKeyPress="checknumber()" value="<?=$sqlnum_anc3chk[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d78" type="text" class="style16" id="d78" onKeyPress="checknumber()" value="<?=$sqlnum_anc4chk[num]?>"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
                    <?
			   //จำนวนมารดาที่ ANC ครั้งที่ 1 (ฝากครรภ์ก่อนหรือเท่ากับ 12 wk)			 SUBSTR(`age`,1,2 )
	// ในเขตอำเภอ age
	$chkper_anc1221="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND  anc<='12' AND  (aumper='02' AND province='34')";
	$sqlquery_anc1221=$mysqli->query($chkper_anc1221);
	$sqlnum_anc1221=$sqlquery_anc1221->fetch_assoc();
	// นอกเขตอำเภอ  
	$chkper_anc21221="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND anc<='12'  AND  (aumper!='02' AND province='34')";
	$sqlquery_anc21221=$mysqli->query($chkper_anc21221);
	$sqlnum_anc21221=$sqlquery_anc21221->fetch_assoc();
		// นอกเขตจังหวัด
 	$chkper_anc31221="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND anc<='12'  AND  (province!='34') AND (province!='00')";
	$sqlquery_anc31221=$mysqli->query($chkper_anc31221);
	$sqlnum_anc31221=$sqlquery_anc31221->fetch_assoc();
		// นอกเขตประเทศ
 	$chkper_anc41221="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND anc<='12'  AND  (province='00')";
	$sqlquery_anc41221=$mysqli->query($chkper_anc41221);
	$sqlnum_anc41221=$sqlquery_anc41221->fetch_assoc();
			   ?>         
<tr bgcolor=#f2fbff>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12.2.1&nbsp;จำนวนมารดาที่ ANC ครั้งที่ 1 (ฝากครรภ์ก่อนหรือเท่ากับ 12 wk)-->				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a79" type="text" class="style16" id="a79" onKeyPress="checknumber()" value="<?=$sqlnum_anc1221[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b79" type="text" class="style16" id="b79" onKeyPress="checknumber()" value="<?=$sqlnum_anc21221[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c79" type="text" class="style16" id="c79" onKeyPress="checknumber()" value="<?=$sqlnum_anc31221[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d79" type="text" class="style16" id="d79" onKeyPress="checknumber()" value="<?=$sqlnum_anc41221[num]?>"  size="3" maxlength="4">
              </span>
                 </tr>
            
                           <?
			   //จำนวนมารดาที่ ANC ครั้งที่ 1 (ฝากครรภ์ก่อนหรือเท่ากับ 12 wk)			 SUBSTR(`age`,1,2 )
	// ในเขตอำเภอ age
	$chkper_anc20wk1="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND  (anc  BETWEEN '16' AND '20')  AND  (aumper='02' AND province='34')";
	$sqlquery_anc20wk1=$mysqli->query($chkper_anc20wk1);
	$sqlnum_anc20wk1=$sqlquery_anc20wk1->fetch_assoc();
	// นอกเขตอำเภอ  
	$chkper_anc20wk2="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND (anc  BETWEEN '16' AND '20')   AND  (aumper!='02' AND province='34')";
	$sqlquery_anc20wk2=$mysqli->query($chkper_anc20wk2);
	$sqlnum_anc20wk2=$sqlquery_anc20wk2->fetch_assoc();
		// นอกเขตจังหวัด
 	$chkper_anc20wk3="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND (anc  BETWEEN '16' AND '20')   AND  (province!='34') AND (province!='00')";
	$sqlquery_anc20wk3=$mysqli->query($chkper_anc20wk3);
	$sqlnum_anc20wk3=$sqlquery_anc20wk3->fetch_assoc();
		// นอกเขตประเทศ
 	$chkper_anc20wk4="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND (anc  BETWEEN '16' AND '20')  AND  (province='00')";
	$sqlquery_anc20wk4=$mysqli->query($chkper_anc20wk4);
	$sqlnum_anc20wk4=$sqlquery_anc20wk4->fetch_assoc();
			   ?>     

			   
              
<tr bgcolor=#ffffff>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12.2.2&nbsp;จำนวนมารดาที่ ANC ครั้งที่ 2 (อายุครรภ์ 16 - 20 wk)				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a89" type="text" class="style16" id="a89" onKeyPress="checknumber()" value="<?=$sqlnum_anc20wk1[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b89" type="text" class="style16" id="b89" onKeyPress="checknumber()" value="<?=$sqlnum_anc20wk2[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c89" type="text" class="style16" id="c89" onKeyPress="checknumber()" value="<?=$sqlnum_anc20wk3[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d89" type="text" class="style16" id="d89" onKeyPress="checknumber()" value="<?=$sqlnum_anc20wk4[num]?>"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
                                         <?
			   //จำนวนมารดาที่ ANC ครั้งที่ 1 (ฝากครรภ์ก่อนหรือเท่ากับ 12 wk)			 SUBSTR(`age`,1,2 )
	// ในเขตอำเภอ age
	$chkper_anc28wk1="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND  (anc  BETWEEN '24' AND '28')  AND  (aumper='02' AND province='34')";
	$sqlquery_anc28wk1=$mysqli->query($chkper_anc28wk1);
	$sqlnum_anc28wk1=$sqlquery_anc28wk1->fetch_assoc();
	// นอกเขตอำเภอ  
	$chkper_anc28wk2="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND (anc  BETWEEN '24' AND '28')   AND  (aumper!='02' AND province='34')";
	$sqlquery_anc28wk2=$mysqli->query($chkper_anc28wk2);
	$sqlnum_anc28wk2=$sqlquery_anc28wk2->fetch_assoc();
		// นอกเขตจังหวัด
 	$chkper_anc28wk3="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND (anc  BETWEEN '24' AND '28')   AND  (province!='34') AND (province!='00')";
	$sqlquery_anc28wk3=$mysqli->query($chkper_anc28wk3);
	$sqlnum_anc28wk3=$sqlquery_anc28wk3->fetch_assoc();
		// นอกเขตประเทศ
 	$chkper_anc28wk4="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND (anc  BETWEEN '24' AND '28')  AND  (province='00')";
	$sqlquery_anc28wk4=$mysqli->query($chkper_anc28wk4);
	$sqlnum_anc28wk4=$sqlquery_anc28wk4->fetch_assoc();
			   ?>     
<tr bgcolor=#f2fbff>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12.2.3&nbsp;จำนวนมารดาที่ ANC ครั้งที่ 3 (อายุครรภ์ 24 - 28 wk)				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a90" type="text" class="style16" id="a90" onKeyPress="checknumber()" value="<?=$sqlnum_anc28wk1[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b90" type="text" class="style16" id="b90" onKeyPress="checknumber()" value="<?=$sqlnum_anc28wk2[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c90" type="text" class="style16" id="c90" onKeyPress="checknumber()" value="<?=$sqlnum_anc28wk3[num]?>"  size="3" maxlength="4">
              </span>
                                <td width="10%"><span class="style23">
                                  <input name="d90" type="text" class="style16" id="d90" onKeyPress="checknumber()" value="<?=$sqlnum_anc28wk4[num]?>"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
                                                       <?
			   //จำนวนมารดาที่ ANC ครั้งที่ 1 (ฝากครรภ์ก่อนหรือเท่ากับ 12 wk)			 SUBSTR(`age`,1,2 )
	// ในเขตอำเภอ age
	$chkper_anc34wk1="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND  (anc  BETWEEN '30' AND '34')  AND  (aumper='02' AND province='34')";
	$sqlquery_anc34wk1=$mysqli->query($chkper_anc34wk1);
	$sqlnum_anc34wk1=$sqlquery_anc34wk1->fetch_assoc();
	// นอกเขตอำเภอ  
	$chkper_anc34wk2="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND (anc  BETWEEN '30' AND '34')   AND  (aumper!='02' AND province='34')";
	$sqlquery_anc34wk2=$mysqli->query($chkper_anc34wk2);
	$sqlnum_anc34wk2=$sqlquery_anc34wk2->fetch_assoc();
		// นอกเขตจังหวัด
 	$chkper_anc34wk3="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND (anc  BETWEEN '30' AND '34')   AND  (province!='34') AND (province!='00')";
	$sqlquery_anc34wk3=$mysqli->query($chkper_anc34wk3);
	$sqlnum_anc34wk3=$sqlquery_anc34wk3->fetch_assoc();
		// นอกเขตประเทศ
 	$chkper_anc34wk4="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND (anc  BETWEEN '30' AND '34')  AND  (province='00')";
	$sqlquery_anc34wk4=$mysqli->query($chkper_anc34wk4);
	$sqlnum_anc34wk4=$sqlquery_anc34wk4->fetch_assoc();
			   ?>   
<tr bgcolor=#ffffff>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12.2.4&nbsp;จำนวนมารดาที่ ANC ครั้งที่ 4 (อายุครรภ์ 30 - 34 wk)				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a91" type="text" class="style16" id="a91" onKeyPress="checknumber()" value="<?=$sqlnum_anc34wk1[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b91" type="text" class="style16" id="b91" onKeyPress="checknumber()" value="<?=$sqlnum_anc34wk2[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c91" type="text" class="style16" id="c91" onKeyPress="checknumber()" value="<?=$sqlnum_anc34wk3[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d91" type="text" class="style16" id="d91" onKeyPress="checknumber()" value="<?=$sqlnum_anc34wk4[num]?>"  size="3" maxlength="4">
              </span>
                 </tr>
            
               
                                            <?
			   //จำนวนมารดาที่ ANC ครั้งที่ 1 (ฝากครรภ์ก่อนหรือเท่ากับ 12 wk)			 SUBSTR(`age`,1,2 )
	// ในเขตอำเภอ age
	$chkper_anc40wk1="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND  (anc  BETWEEN '36' AND '40')  AND  (aumper='02' AND province='34')";
	$sqlquery_anc40wk1=$mysqli->query($chkper_anc40wk1);
	$sqlnum_anc40wk1=$sqlquery_anc40wk1->fetch_assoc();
	// นอกเขตอำเภอ  
	$chkper_anc40wk2="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND (anc  BETWEEN '36' AND '40')   AND  (aumper!='02' AND province='34')";
	$sqlquery_anc40wk2=$mysqli->query($chkper_anc40wk2);
	$sqlnum_anc40wk2=$sqlquery_anc40wk2->fetch_assoc();
		// นอกเขตจังหวัด
 	$chkper_anc40wk3="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND (anc  BETWEEN '36' AND '40')   AND  (province!='34') AND (province!='00')";
	$sqlquery_anc40wk3=$mysqli->query($chkper_anc40wk3);
	$sqlnum_anc40wk3=$sqlquery_anc40wk3->fetch_assoc();
		// นอกเขตประเทศ
 	$chkper_anc40wk4="SELECT COUNT( * ) AS num  FROM lr_lbw WHERE stat_event!='2' AND  (date  BETWEEN '$_POST[date_a]' AND '$_POST[date_b]')  AND (anc  BETWEEN '36' AND '40')  AND  (province='00')";
	$sqlquery_anc40wk4=$mysqli->query($chkper_anc40wk4);
	$sqlnum_anc40wk4=$sqlquery_anc40wk4->fetch_assoc();
			   ?>   
<tr bgcolor=#f2fbff>                <td width="50%" height="25"><span class="style23">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12.2.5&nbsp;จำนวนมารดาที่ ANC ครั้งที่ 5 (อายุครรภ์ 36 - 40 wk)				
				</span></td>
                  <td width="10%"><span class="style23">
                                  <input name="a92" type="text" class="style16" id="a92" onKeyPress="checknumber()" value="<?=$sqlnum_anc40wk1[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="b92" type="text" class="style16" id="b92" onKeyPress="checknumber()" value="<?=$sqlnum_anc40wk2[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="c92" type="text" class="style16" id="c92" onKeyPress="checknumber()" value="<?=$sqlnum_anc40wk3[num]?>"  size="3" maxlength="4">
              </span>
                  <td width="10%"><span class="style23">
                                  <input name="d92" type="text" class="style16" id="d92" onKeyPress="checknumber()" value="<?=$sqlnum_anc40wk4[num]?>"  size="3" maxlength="4">
              </span>
                 </tr>
            
      </table>
 

 <? } ?>

 
