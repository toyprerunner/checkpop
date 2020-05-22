<?
			  $q_count="SELECT count(*) as countz FROM  lr_lbw  WHERE stat_event!='2'";
			  $query_count=$mysqli->query($q_count);
			  $rs_count=$query_count->fetch_assoc();
			  			  $q_count_ev1="SELECT count(*) as countz FROM  lr_lbw WHERE stat_event='0'";
			  $query_countev1=$mysqli->query($q_count_ev1);
			  $rs_countev1=$query_countev1->fetch_assoc();

			  			  			  $q_count_ev2="SELECT count(*) as countz FROM  lr_lbw WHERE stat_event='1'";
			  $query_countev2=$mysqli->query($q_count_ev2);
			  $rs_countev2=$query_countev2->fetch_assoc();

			  			  			  			  $q_count_ev3="SELECT count(*) as countz FROM  lr_lbw WHERE stat_event='3'";
			  $query_countev3=$mysqli->query($q_count_ev3);
			  $rs_countev3=$query_countev3->fetch_assoc();

?>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="green">
                    <tr>
                    <td colspan="9" bgcolor="#180372">
                    <DIV align=left class="FontMenu"><strong><img src="iconset/user_female.png">รายการหญิงคลอดทั้งหมด จำนวน [ <?=$rs_count[countz]?> ] รายการ</strong> <BR>
					 <img src="iconset/heart.png">คลอดที่ รพ.-> ปกติ [<?=$rs_countev1[countz]?>]<BR>
					 <img src="iconset/cross.png">คลอดที่ รพ.-> เด็กเสียชีวิต [<?=$rs_countev2[countz]?>]<BR>
					 <img src="iconset/heart.png">ไม่ได้คลอดที่ รพ. [คลอดที่บ้าน/อื่นๆ]  [<?=$rs_countev3[countz]?>]<BR>
					</DIV> 		 				
					<form name="checkFormsearch" onSubmit="return check()"   method="POST" enctype="multipart/form-data" >
					<div align="right"><img src="images/search.png"  />
						  <input type="text" name="search" id="textfield" />
                              <input type="hidden" name="s" id="textfield"  value="1"/>
                              <input type="submit" name="button" id="button" value="ค้นหา" class='btn' />
                      </div>               
					       </form>                </td>
                    </tr>
                  <tr>
                    <td   align="center" bgcolor="#CCCCCC"><strong>HN</strong></td>
                    					<td   align="center" bgcolor="#CCCCCC"><strong>เลขบัตรประชาชน</strong></td>
                    <td  align="center" bgcolor="#CCCCCC"><strong>ชื่อ-สกุล</strong></td>
                    <td   align="center" bgcolor="#CCCCCC"><strong>อายุ</strong></td>

					<td   align="center" bgcolor="#CCCCCC"><strong>วันที่รับไ้ว้</strong></td>
					<td   align="center" bgcolor="#CCCCCC"><strong>วันคลอด</strong></td>
                    <td   align="center" bgcolor="#CCCCCC"><strong>การส่งต่อผู้ป่วย</strong></td>
										<td   align="center" bgcolor="#CCCCCC"><strong>ผู้บันทึก/แก้ไข</strong></td>
					<td   align="center" bgcolor="#CCCCCC"><strong>จัดการ</strong></td>

                  </tr>
         <?
		 		 if($_POST[s]=="1"){
		$_POST[search]=trim($_POST[search]);
				
				$q = "SELECT * FROM   lr_lbw WHERE (name LIKE  '%$_POST[search]%' OR hn LIKE '%$_POST[search]%') AND stat_event!='2' ORDER BY lbw_id desc";
		
 	 
		}else{
			  $q="SELECT * FROM  lr_lbw WHERE stat_event!='2' ORDER BY  date DESC";
 
		}
 
									$qr=$mysqli->query($q);
									 $total=$qr->num_rows;
 
if($total<1){
echo "<div align=center><font color=red><b>ไม่พบข้อมูลที่ค้นหา</b></font><BR></div><BR>";
?>
<input type="button" name="button" id="button" value="ไม่พบข้อมูลที่ค้นหา"   class='btn' onclick="javascript:location.href='?option=lrall'"  />
<?
exit();
}

									$e_page=20; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
if(!isset($_GET['s_page'])){   
	$_GET['s_page']=0;   
}else{   
	$chk_page=$_GET['s_page'];     
	$_GET['s_page']=$_GET['s_page']*$e_page;   
}   
$q.=" LIMIT ".$_GET['s_page'].",$e_page";
$qr=$mysqli->query($q);
if($qrx=$qr->num_rows>=1){   
	$plus_p=($chk_page*$e_page)+$qrx=$qr->num_rows;   
}else{   
	$plus_p=($chk_page*$e_page);       
}   
$total_p=ceil($total/$e_page);   
$before_p=($chk_page*$e_page)+1;  


										while($rs=$qr->fetch_assoc()){
			 
$i_table++;
if($i_table%2==0)
{
$bg = $bg1;
//f1eaae
}
else
{
$bg = $bg2;
}



$SQLADD_nurse="SELECT * FROM dct WHERE dct='$rs[nurse_id]'";
$sqlquery_nurse=$mysqli_hi->query($SQLADD_nurse);
 $rs_nurse=$sqlquery_nurse->fetch_assoc();
 $SQLADD_nurse2="SELECT * FROM dct WHERE dct='$rs[nurse_id_edit]'";
$sqlquery_nurse2=$mysqli_hi->query($SQLADD_nurse2);
 $rs_nurse2=$sqlquery_nurse2->fetch_assoc();
 
		 ?>
                  <tr bgcolor="<?=$bg;?>">
                    <td><?=$rs[hn]?></td>
                    <td><div  class="FontNormal"><strong><img src="iconset/information-balloon.png">&nbsp;<a href="lr_page_view.php?vid=<?=$rs[hn]?>&vdd=<?=$rs[date]?>&events=<?=$rs[stat_event]?>"  onclick="return hs.htmlExpand(this, { objectType: 'iframe' } )"><?=$rs[idcard]?></a><BR><font color='#000982'></font></strong></div></td>
                    <td><?=$rs[name]?></td>
                    <td><?=$rs[age]?></td>
					<td><?=$Dlib->MadeDay($rs[date])?></td>
					<td>					<?
if($rs[date_birth]=='0000-00-00'){ echo "ไม่พบข้อมูล";}else{
echo $Dlib->MadeDay($rs[date_birth]);
					}
?></td>
					<td><? 
					if($rs[stat_refer]=='0'){$refre="No Refer";}else if($rs[stat_refer]=='1'){$refre="<font color=red><b>Refer</b></font>";}?>
					<?=$refre?>
					</td>
					 <td><?=$rs_nurse[fname]?><?if(!empty($rs_nurse2[fname])){ echo "/$rs_nurse2[fname]";}else if(empty($rs_nurse[fname])){ echo "$rs_nurse2[fname]";}?></td>
                    <td><div  class="FontNormal"><strong><img src="iconset/vcard_edit.png">&nbsp;<a href="?option=wap_lr_edit&hn=<?=$rs[hn]?>&vdd=<?=$rs[date]?>&events=<?=$rs[stat_event]?>">แก้ไข</a></strong></div></td>

                  </tr>
        <?
 	
} 
		$qr->free();
		?>

                     <tr>
                    <td colspan="9" bgcolor="#f5f89b">
 <? if($total>0){ ?>
<div class="browse_page">
 <?php   
 // เรียกใช้งานฟังก์ชั่น สำหรับแสดงการแบ่งหน้า   
 $show='?option=lrall';
  page_navigator($show,$before_p,$plus_p,$total,$total_p,$chk_page);    
  ?> 
</div>
<?php } ?></td>
                    </tr>
</table>
