
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html lang="en" xmlns="http://www.w3.org/1999/xhtml"> 
	<head> 
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Adding a Timepicker to jQuery UI Datepicker</title> 
 
 
		<!--Timepicker to jQuery UI  -->	
		<link rel="stylesheet" media="all" type="text/css" href="jquery-ui.css" />
		<link rel="stylesheet" media="all" type="text/css" href="jquery-ui-timepicker-addon.css" />
		
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
		<script type="text/javascript" src="jquery-ui-timepicker-addon.js"></script>
	<!--	<script type="text/javascript" src="jquery-ui-sliderAccess.js"></script>-->
		<script type="text/javascript">
			
			$(function(){
				$('#tabs').tabs();
		
				$('.example-container > pre').each(function(i){
					eval($(this).text());
				});
			});
			
		</script>
			<!--Timepicker to jQuery UI Datepicker-->
	</head> 
	<body> 
 

 
				
					<!-- ============= example -->
 
					 		<input type="text" name="basic_example_3" id="basic_example_3" value="" />
  

					<h3 id="timezone_examples">Using Timezones</h3>

					<!-- ============= example -->
					<div class="example-container">
						<p>Simplest timezone usage:</p>
						<div>
					 		<input type="text" name="timezone_example_1" id="timezone_example_1" value="" />
						</div>					
<pre>
$('#timezone_example_1').datetimepicker({
	timeFormat: 'hh:mm tt z'
});
</pre>
					</div>

					<!-- ============= example -->
					<div class="example-container">
						<p>Define your own timezone options:</p>
						<div>
					 		<input type="text" name="timezone_example_2" id="timezone_example_2" value="" />
						</div>					
<pre>
$('#timezone_example_2').datetimepicker({
	timeFormat: 'HH:mm z',
	timezoneList: [ 
			{ value: -300, label: 'Eastern'}, 
			{ value: -360, label: 'Central' }, 
			{ value: -420, label: 'Mountain' }, 
			{ value: -480, label: 'Pacific' } 
		]
});
</pre>
					</div>

					<!-- ============= example -->
					<div class="example-container">
						<p>You may also use timezone string abbreviations for values.  This should be used with caution.  Computing accurate javascript Date objects may not be possible when trying to retrieve or set the date from timepicker (see setDate and getDate examples below).  For simple input values however this should work.</p>
						<div>
					 		<input type="text" name="timezone_example_3" id="timezone_example_3" value="" />
						</div>					
<pre>
$('#timezone_example_3').datetimepicker({
	timeFormat: 'HH:mm z',
	timezone: 'MT',
	timezoneList: [ 
			{ value: 'ET', label: 'Eastern'}, 
			{ value: 'CT', label: 'Central' }, 
			{ value: 'MT', label: 'Mountain' }, 
			{ value: 'PT', label: 'Pacific' } 
		]
});

</pre>
					</div>

					<h3 id="slider_examples">Slider Modifications</h3>

					<!-- ============= example -->
					<div class="example-container">
						<p>Add a grid to each slider:</p>
						<div>
					 		<input type="text" name="slider_example_1" id="slider_example_1" value="" />
						</div>					
<pre>
$('#slider_example_1').timepicker({
	hourGrid: 4,
	minuteGrid: 10,
	timeFormat: 'hh:mm tt'
});
</pre>
					</div>

					<!-- ============= example -->
					<div class="example-container">
						<p>Set the interval step of sliders:</p>
						<div>
					 		<input type="text" name="slider_example_2" id="slider_example_2" value="" />
						</div>					
<pre>
$('#slider_example_2').datetimepicker({
	timeFormat: 'HH:mm:ss',
	stepHour: 2,
	stepMinute: 10,
	stepSecond: 10
});
</pre>
					</div>

					<!-- ============= example -->
					<div class="example-container">
						<p>Add sliderAccess plugin for touch devices:</p>
						<div>
					 		<input type="text" name="slider_example_3" id="slider_example_3" value="" />
						</div>					
<pre>
$('#slider_example_3').datetimepicker({
	addSliderAccess: true,
	sliderAccessArgs: { touchonly: false }
});</pre>
					</div>

					<!-- ============= example -->
					<div class="example-container">
						<p>Use dropdowns instead of sliders.  By default if slider is not available dropdowns will be used.</p>
						<div>
					 		<input type="text" name="slider_example_4" id="slider_example_4" value="" />
						</div>					
<pre>
$('#slider_example_4').datetimepicker({
	controlType: 'select',
	timeFormat: 'hh:mm tt'
});</pre>
					</div>

					<!-- ============= example -->
					<div class="example-container">
						<p>Create your own control by implementing the create, options, and value methods. If you want to use your new control for all instances use the $.timepicker.setDefaults({controlType:myControl}). Here we implement jQueryUI's spinner control (jQueryUI 1.9+).</p>
						<div>
					 		<input type="text" name="slider_example_5" id="slider_example_5" value="" />
						</div>					
<pre>var myControl=  {
	create: function(tp_inst, obj, unit, val, min, max, step){
		$('&lt;input class="ui-timepicker-input" value="'+val+'" style="width:50%"&gt;')
			.appendTo(obj)
			.spinner({
				min: min,
				max: max,
				step: step,
				change: function(e,ui){ // key events
						// don't call if api was used and not key press
						if(e.originalEvent !== undefined)
							tp_inst._onTimeChange();
						tp_inst._onSelectHandler();
					},
				spin: function(e,ui){ // spin events
						tp_inst.control.value(tp_inst, obj, unit, ui.value);
						tp_inst._onTimeChange();
						tp_inst._onSelectHandler();
					}
			});
		return obj;
	},
	options: function(tp_inst, obj, unit, opts, val){
		if(typeof(opts) == 'string' && val !== undefined)
				return obj.find('.ui-timepicker-input').spinner(opts, val);
		return obj.find('.ui-timepicker-input').spinner(opts);
	},
	value: function(tp_inst, obj, unit, val){
		if(val !== undefined)
			return obj.find('.ui-timepicker-input').spinner('value', val);
		return obj.find('.ui-timepicker-input').spinner('value');
	}
};

$('#slider_example_5').datetimepicker({
	controlType: myControl
});</pre>
					</div>

					<h3 id="alt_examples">Alternate Fields</h3>

					<!-- ============= example -->
					<div class="example-container">
						<p>Alt field in the simplest form:</p>
						<div>
					 		<input type="text" name="alt_example_1" id="alt_example_1" value="09/15/2012" />
					 		<input type="text" name="alt_example_1_alt" id="alt_example_1_alt" value="10:15" />
						</div>					
<pre>
$('#alt_example_1').datetimepicker({
	altField: "#alt_example_1_alt"
});
</pre>
					</div>

					<!-- ============= example -->
					<div class="example-container">
						<p>With datetime in both:</p>
						<div>
					 		<input type="text" name="alt_example_2" id="alt_example_2" value="" />
					 		<input type="text" name="alt_example_2_alt" id="alt_example_2_alt" value="" />
						</div>					
<pre>
$('#alt_example_2').datetimepicker({
	altField: "#alt_example_2_alt",
	altFieldTimeOnly: false
});
</pre>
					</div>

					<!-- ============= example -->
					<div class="example-container">
						<p>Format the altField differently:</p>
						<div>
					 		<input type="text" name="alt_example_3" id="alt_example_3" value="" />
					 		<input type="text" name="alt_example_3_alt" id="alt_example_3_alt" value="" />
						</div>					
<pre>
$('#alt_example_3').datetimepicker({
	altField: "#alt_example_3_alt",
	altFieldTimeOnly: false,
	altFormat: "yy-mm-dd",
	altTimeFormat: "h:m t",
	altSeparator: " @ "
});
</pre>
					
				</div></div>	
					
					
					<!-- ============= example -->
					<div class="example-container">
						 
						<div>
					 		<input type="text" name="basic_example_2" id="basic_example_2" value="" />
						</div>					
<pre>
$('#basic_example_2').timepicker();
</pre>
					</div>

 
  <table width="60%" border="0" align="center" cellpadding="0" cellspacing="0"> 
<tr>
                      <td bgcolor="#000000"><DIV align=left class="FontMenu"><strong><br>&nbsp;&nbsp;<img src='iconset/information-balloon.png'>บันทึกข้อมูล
					   <input type="button" name="button2" id="button2" value="ย้อนกลับ" onclick="javascript:location.href='?option=debt_chk'" class='btn' />
					  <br><br></strong>   </DIV>                       </td>
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
                                      <td><div align="right" class="style6">วันที่รับไว้</div></td>
                                      <td><span class="style9">
                                      <INPUT   type=text  name="date11"   onClick="popUpCalendar(this, frmdebt.date11, 'yyyy-mm-dd')" readonly  value="" onKeyDown="if(event.keyCode==13){ document.frmdebt.pricepay.focus()}" /> *<br /></span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">HN</div></td>
                                      <td><span class="style9">
                                      <input name="hnno" type="text" id="textfield17" size="55"  onKeyDown="if(event.keyCode==13){ document.frmdebt.anno.focus()}"   value='<?=$rs[hn]?>' readonly />
                                       </span></td>
                                    </tr>
									          <tr>
                                      <td width="18%"><div align="right" class="style6">เลขที่บัตรประชาชน</div></td>
                                      <td width="82%"><span class="style9">
                                      <input name="idcard1" type="text" id="textfield3" size="55"  onKeyDown="if(event.keyCode==13){ document.frmdebt.myname.focus()}"  value='<?=$rs[pop_id]?>'  onkeypress="autoTab(this)"  readonly  />
                                       </span></td>
                                    </tr>
                                    <tr>
                                      <td width="18%"><div align="right" class="style6">ข้าพเจ้า</div></td>
                                      <td width="82%"><span class="style9">
                                      <input name="myname" type="text" id="textfield3" size="55"  onKeyDown="if(event.keyCode==13){ document.frmdebt.age.focus()}"  value='<?=$rs[pname]?><?=$rs[fname]?>&nbsp;&nbsp;<?=$rs[lname]?>' readonly />

                                       </span></td>
                                    </tr>
                      <tr>
                                      <td width="18%"><div align="right" class="style6">วันเกิด</div></td>
                                      <td width="82%"><span class="style9">
                                 
									  
									  <input name="brthdate_day" type="hidden" id="textfield3" size="55"  onKeyDown="if(event.keyCode==13){ document.frmdebt.age.focus()}"  value='<?=$rs[brthdate]?>' readonly />
 
                                     </span></td>
                                    </tr>

									
                                    <tr>
                                      <td><div align="right" class="style6">อายุ</div></td>
                                      <td><span class="style9"> <input name="age" type="text" id="textfield3" size="5"  onKeyDown="if(event.keyCode==13){ document.frmdebt.address.focus()}"  value='<?=$calage3?>' readonly />ปี  </span></td>
                                    </tr>     <tr>
                                      <td><div align="right" class="style6">อาชีพ</div></td>
                                      <td><span class="style9">
 <input name="ca_career" type="text" id="ca_career" size="40" value="" style="width:200px;"  class='tb7' />
Code<input name="career" type="text" id="career" value=""  style="width:50px;"  readonly />
 
 คลิกเลือกจากรายการเท่านั้น </span></td>
                                    </tr>
									     <tr>
                                      <td><div align="right" class="style6">การศึกษา</div></td>
                                      <td><span class="style9">

 


                                       *</span>
									  
									  </td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">ที่อยู่ปัจจุบัน</div></td>
                                      <td><span class="style9">
                                      <input name="address" type="text" id="textfield5" size="55" onKeyDown="if(event.keyCode==13){ document.frmdebt.address.focus()}"  value='<?=$rs[addrpart]?>' />
                                      *</span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">หมู่ที่</div></td>
                                      <td><span class="style9">
                                      <input name="moo" type="text" id="textfield6" size="55" onKeyDown="if(event.keyCode==13){ document.frmdebt.moo.focus()}"  value='<?=$rs[moopart]?>' />
                                      *</span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">ตำบล</div></td>
                                      <td><span class="style9"><?=$rs[nametumb]?>
                                      <input name="tumbon" type="hidden" id="textfield7" size="55"  onKeyDown="if(event.keyCode==13){ document.frmdebt.tumbon.focus()}" value='<?=$rs[tmbpart]?>'/></span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">อำเภอ</div></td>
                                      <td><span class="style9"><?=$rs[nameampur]?>
                                      <input name="aumper" type="hidden" id="textfield8" size="55"  onKeyDown="if(event.keyCode==13){ document.frmdebt.aumper.focus()}"  value='<?=$rs[amppart]?>'  /></span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">จังหวัด</div></td>
                                      <td><span class="style9"><?=$rs[namechw]?>
									  <input name="province" type="hidden" id="textfield3" size="55" value='<?=$rs[chwpart]?>' readonly /></span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">รหัสไปรษณีย์</div></td>
                                      <td><span class="style9">!ไม่เปิดใช้
                                      <input name="postcode" type="hidden" id="textfield10" size="55"  maxlength='5' onKeyDown="if(event.keyCode==13){ document.frmdebt.postcode.focus()}" value='11111' />
                                      </span></td>
                                    </tr>
                                    <tr>
                                      <td><div align="right" class="style6">ANC</div></td>
                                      <td><span class="style9">
                                      <input name="anc" type="text" id="textfield10" size="25"  onKeyDown="if(event.keyCode==13){ document.frmdebt.anc.focus()}" value='' />Weak<BR>
									<input name="anc1" type="text" id="textfield10" size="55"  onKeyDown="if(event.keyCode==13){ document.frmdebt.anc.focus()}" value='' />
										<select name="anctf" >
									<option   value="" selected>-- ครบ/ไม่ครบ --</option>
									  <option value="0">ไม่ครบ</option>
									  <option value="1">ครบ</option>
									   
									  </select>
                                  
                                      *</span></td>
                                    </tr>
									                <tr>
                                      <td><div align="right" class="style6">อนามัย</div></td>
                                      <td><span class="style9">
                                      <input name="plan" type="text" id="textfield10" size="55"  onKeyDown="if(event.keyCode==13){ document.frmdebt.plan.focus()}" value='' />
                                      *</td>
                                    </tr>
									<tr>
                                      <td><div align="right" class="style6">Hiv</div></td>
                                      <td><span class="style9">
									  <select name="hiv"  >
										<option   value="" selected>-- เลือก --</option>
									  <option value="0">Negative</option>
									  <option value="1">Positive</option>
									   
									  </select>
                               

                                 
                                      *</span></td>
                                    </tr>
   <tr>
                                      <td><div align="right" class="style6">VDRL</div></td>
                                      <td><span class="style9">
                                    									  <select name="vdrl" >
	<option   value="" selected>-- เลือก --</option>
									  <option value="0">Negative</option>
									  <option value="1">Positive</option>
									   
									  </select>
                                      *</span></td>
                                    </tr>                                    </tr>
   <tr>
                                      <td><div align="right" class="style6">HBSAG</div></td>
                                      <td><span class="style9">
                                        <select name="hbsag" >
	<option   value="" selected>-- เลือก --</option>
									  <option value="0">Negative</option>
									  <option value="1">Positive</option>
									   
									  </select>
                                      *</span></td>
                                    </tr>
									                                    </tr>
   <tr>
                                      <td><div align="right" class="style6">OF</div></td>
                                      <td><span class="style9">
									  									  <select name="ofdcid" >
									<option   value="" selected>-- เลือก --</option>
									  <option value="0">Negative</option>
									  <option value="1">Positive</option>
									   
									  </select>
                 
                                      *</span></td>
                                    </tr>
									  <tr>
                                      <td><div align="right" class="style6">DCID</div></td>
                                      <td><span class="style9">
									  									  <select name="dcid" >
									<option   value="" selected>-- เลือก --</option>
									  <option value="0">Negative</option>
									  <option value="1">Positive</option>
									   
									  </select>
                 
                                      *</span></td>
                                    </tr>
									                                    </tr>
   <tr>
                                      <td><div align="right" class="style6">HCT1</div></td>
                                      <td><span class="style9">
                                      <input name="hct1" type="text" id="textfield2" size="40"  value="">%
                                      <BR>*กรอกเฉพาะตัวเลข</span></td>
                                    </tr>
									                                    </tr>
   <tr>
                                      <td><div align="right" class="style6">HCT2</div></td>
                                      <td><span class="style9">
                                      <input name="hct2" type="text" id="textfield2" size="40"  value="">%
                                      <BR>*กรอกเฉพาะตัวเลข</span></td>
                                    </tr>   <tr>
                                      <td><div align="right" class="style6">HCT3</div></td>
                                      <td><span class="style9">
                                      <input name="hct3" type="text" id="textfield2" size="40"  value="">%
                                      <BR>*กรอกเฉพาะตัวเลข</span></td>
                                    </tr>   <tr>
                                      <td><div align="right" class="style6">GPALD</div></td>
                                      <td><span class="style9">
                                      
G=<input name="g1" type="text" id="textfield2" size="4"  value="">
P=<input name="g2" type="text" id="textfield2" size="4"  value="">
A=<input name="g3" type="text" id="textfield2" size="4"  value="">
L=<input name="g4" type="text" id="textfield2" size="4"  value="">
D=<input name="g5" type="text" id="textfield2" size="4"  value="">


                                      <BR>*กรอกเฉพาะตัวเลข</span></td>
                                    </tr>   <tr>
                                      <td><div align="right" class="style6">GA</div></td>
                                      <td><span class="style9">
                                      <input name="ga11" type="text" id="textfield2" size="10"  value="" maxlength="2">+
									  <select name="ga22" >
										<option   value="0" >0</option>
									  <option value="1">1</option>
									  <option value="2">2</option>
									  <option value="3">3</option>
									  <option value="4">4</option>
									  <option value="5">5</option>
									  <option value="6">6</option>

									   
									  </select>
                                      Weak <BR>* ตัวอย่าง 32+2</span></td>
                                    </tr>  
									<tr>
                                      <td><div align="right" class="style6">GA BY Ballard Score</div></td>
                                      <td><span class="style9">
                                      <input name="ballardscore" type="text" id="textfield2" size="55"  value="">
                                       <BR>*</span></td>
                                    </tr>  
									 <tr>
                                      <td><div align="right" class="style6">วันเกิด</div></td>
                                      <td><span class="style9">
                                   
									    <INPUT   type=text  name="date_birth"   onClick="popUpCalendar(this, frmdebt.date_birth, 'yyyy-mm-dd')" readonly  value=""  />
                                      *</span></td>
                                    </tr>
									 <tr>
                                      <td><div align="right" class="style6">เวลาที่เกิด</div></td>
                                      <td><span class="style9"> 
									  				 <input type="text" name="birthtime" id="birthtime" value="" />
													<span><script>$('#birthtime').timepicker();</script></span>
<!--http://trentrichardson.com/examples/timepicker/-->
                                      *09:30 	</span>
									  		 

									  </td>
                                    </tr>
																		 <tr>
                                      <td><div align="right" class="style6">HN ลูก</div></td>
                                      <td><span class="style9">
                                      <input name="hnbaby" type="text" id="textfield2" size="55"  value="">
                                      *</span></td>
                                    </tr>
									 <tr>
                                      <td><div align="right" class="style6">เพศ</div></td>
                                      <td><span class="style9">
									   <select name="birthsex">
										<option   value="" selected>-- เลือก --</option>
									  <option value="0">ชาย</option>
									  <option value="1">หญิง</option>
									   
									  </select>

                                 
                                      *</span></td>
                                    </tr>
									 <tr>
                                      <td><div align="right" class="style6">น้ำหนักตัว</div></td>
                                      <td><span class="style9">
                                      <input name="birthbw" type="text" id="textfield2" size="55"  value="">กรัม [ GM ]
                                      *</span></td>
                                    </tr>
									 <tr>
                                      <td><div align="right" class="style6">HCT</div></td>
                                      <td><span class="style9">
                                      <input name="hct" type="text" id="textfield2" size="55"  value="">
                                      % *</span></td>
                                    </tr>
									 <tr>
                                      <td><div align="right" class="style6">DTX</div></td>
                                      <td><span class="style9">
                                      <input name="dtx" type="text" id="textfield2" size="55"  value="">
                                      % [Mg]*</span></td>
                                    </tr>								 <tr>
                                      <td><div align="right" class="style6">APGAR</div></td>
                                      <td><span class="style9">
<input name="apgar1" type="text" id="textfield2" size="4"  value="">
-<input name="apgar2" type="text" id="textfield2" size="4"  value="">
-<input name="apgar3" type="text" id="textfield2" size="4"  value="">
-<input name="apgar4" type="text" id="textfield2" size="4"  value="">


                                     </span></td>
                                    </tr>								 <tr>
                                      <td><div align="right" class="style6">AF</div></td>
                                      <td><span class="style9">
                                      <input name="af" type="text" id="textfield2" size="55"  value="">
                                      *</span></td>
                                    </tr><tr>
                                      <td><div align="right" class="style6">LATCH</div></td>
                                      <td><span class="style9">
                                      <input name="latch" type="text" id="textfield2" size="55"  value="">
                                     คะแนน *</span></td>
                                    </tr><tr>
                                      <td><div align="right" class="style6">DX</div></td>
                                      <td><span class="style9">
                                     [ แม่ ] Dx คลิกเลือกจากรายการเท่านั้น <BR>






<input name="dx_mom1" type="text" id="dx_mom1" size="40" value="" style="width:200px;"  class='tb7' />
Code<input name="dx_id_mom1" type="text" id="dx_id_mom1" value="" style="width:40px;"   readonly/><BR>

<input name="dx_mom2" type="text" id="dx_mom2" size="40" value="" style="width:200px;"  class='tb7' />
Code<input name="dx_id_mom2" type="text" id="dx_id_mom2" value="" style="width:40px;" readonly/><BR>

<input name="dx_mom3" type="text" id="dx_mom3" size="40" value="" style="width:200px;"  class='tb7' />
Code<input name="dx_id_mom3" type="text" id="dx_id_mom3" value="" style="width:40px;" readonly/><BR>

<input name="dx_mom4" type="text" id="dx_mom4" size="40" value="" style="width:200px;"  class='tb7' />
Code<input name="dx_id_mom4" type="text" id="dx_id_mom4" value="" style="width:40px;" readonly /><BR>

<input name="dx_mom5" type="text" id="dx_mom5" size="40" value="" style="width:200px;"  class='tb7' />
Code<input name="dx_id_mom5" type="text" id="dx_id_mom5" value=""  style="width:40px;" readonly/><BR>

<input name="dx_mom6" type="text" id="dx_mom6" size="40" value="" style="width:200px;"  class='tb7' />
Code<input name="dx_id_mom6" type="text" id="dx_id_mom6" value="" style="width:40px;" readonly />


                                      *<BR>
									  [ ลูก ] Dx คลิกเลือกจากรายการเท่านั้น<BR>
<input name="dx_baby1" type="text" id="dx_baby1" size="40" value="" style="width:200px;"  class='tb7' />
Code<input name="dx_id_baby1" type="text" id="dx_id_baby1" value="" style="width:40px;" readonly/><BR>

<input name="dx_baby2" type="text" id="dx_baby2" size="40" value="" style="width:200px;"  class='tb7' />
Code<input name="dx_id_baby2" type="text" id="dx_id_baby2" value="" style="width:40px;" readonly/><BR>

<input name="dx_baby3" type="text" id="dx_baby3" size="40" value="" style="width:200px;"  class='tb7' />
Code<input name="dx_id_baby3" type="text" id="dx_id_baby3" value="" style="width:40px;" readonly/><BR>

<input name="dx_baby4" type="text" id="dx_baby4" size="40" value="" style="width:200px;"  class='tb7' />
Code<input name="dx_id_baby4" type="text" id="dx_id_baby4" value="" style="width:40px;" readonly/><BR>

<input name="dx_baby5" type="text" id="dx_baby5" size="40" value="" style="width:200px;"  class='tb7' />
Code<input name="dx_id_baby5" type="text" id="dx_id_baby5" value="" style="width:40px;" readonly/><BR>

<input name="dx_baby6" type="text" id="dx_baby6" size="40" value="" style="width:200px;"  class='tb7' />
Code<input name="dx_id_baby6" type="text" id="dx_id_baby6" value="" style="width:40px;" readonly/>
<BR><font color="#000992">หมายเหตุ การพิมพ์ชื่อ DX ต้องเป็นตัวพ์ใหญ่ทั้งหมด</font>
 </td>
                                    </tr>

	 <tr>
                                      <td><div align="right" class="style6">REFER</div></td>
                                      <td><span class="style9">
                                 <input type="radio" name="chkColor" value="0" checked >ไม่มีการส่ง Refer 
								<input type="radio" name="chkColor" value="1">ส่ง Refer<br>
                                     </span></td>
                                    </tr>
                  
                    <tr>
                      <td colspan="2" valign="top" bgcolor="#FF0000"><div align="center"><span class="style5"><br />
                      * ห้ามเว้นช่องว่าง ไม่มีให้ -</span><br />
                      <br />  
					  <input type="hidden" name="searchforhn" id="button" value="<?=$rs[hn]?>" />
					  <input type="hidden" name="p_check" id="button" value="1" />
                        <input type="submit" name="button" id="button" value="บันทึกข้อมูล" class='btn' />
                        <input type="button" name="button2" id="button2" value="ยกเลิก" onclick="javascript:history.back(-1)" class='btn' />
                    
                      </div></td>
                      </tr>
                  </table>
                  </form>
 
 
 
	</body> 
</html>
