  <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>  
 
<div class="buttons">
<!--    <button type="button" name="button222" id="button" value="บันทึกข้อมูลลูกหนี้"  onclick="javascript:location.href='?option=debt'" class="positive">-->
    <button type="button" name="button222" id="button" value="บันทึกข้อมูลลูกหนี้"  onclick="javascript:location.href='?option=debt_chk'" class="positive">
 <img src="images/tick.png" alt=""/> บันทึกข้อมูลลูกหนี้
    </button> 
    <button type="button" name="button222" id="button" value="บันทึกข้อมูลลูกหนี้"  onclick="javascript:location.href='?option=debt_end'" class="positive">
 <img src="images/tick.png" alt=""/>ข้อมูลลูกหนี้ไม่ค้างชำระ
    </button> 
                      </td>
                    </tr>
                  </table>

 
                  <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="green">
                    <tr>
                    <td colspan="7" bgcolor="#333">
                    <DIV align=left class="FontMenu"><strong>รายการสภาพหนี้</strong>   </DIV> 		 				
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
                    <td  align="center" bgcolor="#CCCCCC"><strong>ชื่อ-สกุล</strong></td>
                    <td   align="center" bgcolor="#CCCCCC"><strong>อายุ</strong></td>
					<td   align="center" bgcolor="#CCCCCC"><strong>ทำสัญญาวันที่</strong></td>
					<td   align="center" bgcolor="#CCCCCC"><strong>คงค้าง</strong></td>
					<td   align="center" bgcolor="#CCCCCC"><strong>ค่าใช้จ่ายทั้งสิ้น</strong></td>
                    <td   align="center" bgcolor="#CCCCCC"><strong>จัดการ</strong></td>
                  </tr>
         <?
		 		 if($_POST[s]=="1"){
		$_POST[search]=trim($_POST[search]);
				
				$q = "SELECT * FROM  debt where  dept_price_balance<1 AND hn_id  LIKE '%$_POST[search]%' OR dept_name LIKE '%$_POST[search]%'    ORDER BY  `hn_id_auto` DESC ";
		
 	 
		}else{
			  $q="SELECT * FROM  debt where  dept_price_balance<1  ORDER BY  hn_id_auto DESC ";
 
		}
 
									$qr=mysql_db_query($dbname,$q);
									 $total=mysql_num_rows($qr);

if($total<1){
echo "<div align=center><font color=red><b>ไม่พบข้อมูลที่ค้นหา</b></font><BR> <input type='button' name='resetall' id='button2' value='ยกเลิก'  class='btn'  onclick='javascript:history.back(-1)' /></div><BR><BR>";
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
$qr=mysql_db_query($dbname,$q);
if($qrx=mysql_num_rows($qr)>=1){   
	$plus_p=($chk_page*$e_page)+$qrx=mysql_num_rows($qr);   
}else{   
	$plus_p=($chk_page*$e_page);       
}   
$total_p=ceil($total/$e_page);   
$before_p=($chk_page*$e_page)+1;  

										while($rs=mysql_fetch_array($qr)){
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
		 ?>
                   <tr bgcolor="<?=$bg;?>">
                    <td><div  class="FontNormal"><strong><img src="iconset/arrow-000-small.png">&nbsp;
                    <?=$rs[hn_id]?>
                    </strong></div></td>
                    <td><div  class="FontNormal"><strong><img src="iconset/user.png">&nbsp;<a href="wap_debt_pay_num_his.php?id_auto=<?=$rs[hn_id_auto]?>"  onclick="return hs.htmlExpand(this, { objectType: 'iframe' } )"><?=$rs[dept_name]?>
                    </a><BR>สัญญาเลขที่ <?=$rs[book_id]?></strong></div></td>
                    <td><div  class="FontNormal"><strong> &nbsp;
                    <?=$rs[dept_age]?>
                    &nbsp;ปี</strong></div></td>
					<td><div  class="FontNormal"><strong> &nbsp;
				    <?=$Dlib->MadeDay($rs[debt_date])?>
			 
					</strong></div></td>
					<td><div  class="FontNormal"><strong> &nbsp;
				    <?=number_format($rs[dept_price_balance])?>
				    &nbsp;บาท</strong></div></td>
					<td><div  class="FontNormal"><strong> &nbsp;
				    <?=number_format($rs[dept_price_all])?>
				    &nbsp;บาท</strong></div></td>
                    <td>
					<? if($rs[dept_price_balance]<1){?>
				<div  class="FontNormal"><img src='iconset/emotion_waii.png'><font color='#000000'><b>ไม่มีรายการค้างชำระ</b></font></div>
					<?}else{
					?>
										<div  class="FontNormal">
					<strong><img src="iconset/pencil-ruler.png">&nbsp;<a href='?option=debt_edit&id_auto=<?=$rs[hn_id_auto]?>'  >แก้ไข</a></strong>
					<strong><img src="iconset/page_white_word.png">&nbsp;<a href='report_doc.php?id_auto=<?=$rs[hn_id_auto]?>' target='_bank'>พิมพ์สัญญา</a></strong></div>
					<?}?>
					
					</td>
                  </tr>
        <? } ?>

                     <tr>
                    <td colspan="7">
 <? if($total>0){ ?>
<div class="browse_page">
 <?php   
 // เรียกใช้งานฟังก์ชั่น สำหรับแสดงการแบ่งหน้า   
 $show='?option=debt_end';
  page_navigator($show,$before_p,$plus_p,$total,$total_p,$chk_page);    
  ?> 
</div>
<?php } ?></td>
                    </tr>
</table>
