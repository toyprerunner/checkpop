<?php  @session_start();
set_time_limit(0);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php 
include "include.con/config.inc.php";
include "include.con/page.php";
require_once "txt.php";
include 'include.con/Datelibrary.php';

$Dlib = new DateLib();
$bg1 = "#eee68c";
$bg2 = "#d0fac6";
$i_table=0;
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
 <link rel="stylesheet" type="text/css" href="css/style.css" />
<LINK href="images/stylesheet.css" type=text/css rel=stylesheet>
<LINK href="images/tagbox.css" type=text/css rel=stylesheet>
  <!-- autocomplete--> 
<script type="text/javascript" src="auto_c/autocomplete.js"></script>
<link rel="stylesheet" href="auto_c/autocomplete.css"  type="text/css"/>
<!-- autocomplete-->	
<SCRIPT type="text/javascript" src="popcalendar.js"></SCRIPT>
<script type="text/javascript" src="editor/ed.js"></script>  
<script type="text/javascript" src="doSave_Form.js"></script>
	 
<link rel="stylesheet" type="text/css" href="css_button.css" />
<script type="text/javascript" src="highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
<!--Editor -->
<script type="text/javascript" src="fckeditor/fckeditor.js"></script>
<!--Editor -->
<!-- Bootstrap Core CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css" />

<script type="text/javascript">
	hs.graphicsDir = 'highslide/graphics/';
	hs.outlineType = 'rounded-white';
	hs.showCredits = false;
	hs.wrapperClassName = 'draggable-header';
</script>
<script>
	function RestrictSpace() {
		if (event.keyCode == 32) {
			event.returnValue = false;
			return false;
		}
	}
</script>
<script language="JavaScript">
	function fncInput(val)
	{
		 if(val.value.length==2 || val.value.length==5)
		 {
			val.value = val.value + "-";
		 }
	}
</script>
<script type="text/javascript" src="tab_menu/jquery.js"></script>
<script type="text/javascript" src="tab_menu/sliding_effect.js"></script>
<script type="text/javascript" src="include.con/popcalendar.js"></script>
<script language=JavaScript>
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=yes,location=0,statusbar=0,menubar=0,resizable=yes,width=600,height=400,left = 100,top = 50');");
}
</script>
<!-- ID CARD -->
<script language="javascript">
function checkID(id)
{
if(id.length != 13) return false;
for(i=0, sum=0; i < 12; i++)
sum += parseFloat(id.charAt(i))*(13-i); if((11-sum%11)%10!=parseFloat(id.charAt(12)))
return false; return true;}
function checkForm()
{ if(!checkID(document.form1.txtID.value))
alert('รหัสประชาชนไม่ถูกต้อง');
else alert('รหัสประชาชนถูกต้อง เชิญผ่านได้');}
</script>
<!--Timepicker to jQuery UI  -->	
<link rel="stylesheet" media="all" type="text/css" href="timepicker/jquery-ui.css" />
<link rel="stylesheet" media="all" type="text/css" href="timepicker/jquery-ui-timepicker-addon.css" />
<script type="text/javascript" src="timepicker/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="timepicker/jquery-ui.min.js"></script>
<script type="text/javascript" src="timepicker/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript">
	$(function(){
		$('#tabs').tabs();
			$('.example-container > pre').each(function(i){
			eval($(this).text());
		});
	});
</script>
<!--Timepicker to jQuery UI  -->	
<!--#popupDatepicker 4.0.1 -->	
<link type="text/css" href="datepick410/jquery.datepick.css" rel="stylesheet">
<!--tinyMCE-->	
<link rel="stylesheet" href="tinyeditor.css">
<script src="tiny.editor.packed.js"></script>
 <!--tinyMCE-->	
<script type="text/javascript" src="datepick410/jquery.datepick.js"></script>
<script type="text/javascript" src="datepick410/jquery.datepick-th.js"></script>
<script type="text/javascript">
$(function() {
	$('#popupDatepicker').datepick();
		$('#popupDatepicker2').datepick();
	$('#inlineDatepicker').datepick({onSelect: showDate});
});
function showDate(date) {
	alert('The date chosen is ' + date);
}
</script>
<!--#popupDatepicker 4.0.1 -->
</head>
<div class="container">
<div class="row">
<body >
<table class"tabel">
	<tr>
		<td>
    		<tbody>
              <tr>
                <td width="57%"   background="images/bgs.jpg"  style="no-repeat" ><img src="images/header2.jpg"  ><img src='images/ajaxloader.gif'></TD>
                
		</td>
        	</tbody>
</table>
			 <?php  
                if(!empty($_SESSION[sess_id_datacenter])){
                    include "menu/menu.php";
                    }
            ?>
            </tr>
<td> 

 
 <table class="table">
  <tr>
<script>
function disp_confirm()
{
var r=confirm("ยืนยัน  ออกจากระบบ")
if (r==true)
  {
 window.location = 'log_out.php';
  }
}
</script>
    <td  vAlign=top bgcolor="#FFFFFF" > 
	<div align="right">
 
                  <table class="table">
                  <tr><td class="alert-info">
                 <div align="rigth"> <font color='#FFFFFF'>
           
					 <img src="images/276.gif"><img src='loading.gif' border='0'><a href="?menu=main"><b>&nbsp;&nbsp;<div align='right'>Reload<img src='iconset/user_online.gif' border='0'></div></b></a>
					</font> </div>

						

                    </td>
                  </tr>
                </table><BR>
			 
	</div>
      <div align="center">
	  <BR><BR>
	  

	  <?php		    
					  if($_GET[option]=='main'){
					   include "board.php"; 	 
						  } 
						 else  if($_GET[option]=='register'){
							 echo "<BR><BR>";
					   include "register.php"; 	 
						  }
						   
						  else if($_GET[option]=='admin'){
							  if(empty($_SESSION[sess_id_datacenter])){
						   include "frm_log.php";
							  }else{
							    include "board.php"; 	 
							  }
						  }
						  else if($_GET[option]=='chkpass'){
					   include "chkpass.php";
						  }else if($_GET[option]=='add_user'){
					   include "add_user.php";
						  }else if($_GET[option]=='report_lrall_month'){
					   include "report_lrall_month.php";
						  }else{
						  include "board.php"; 	
						  }

	  ?>
      </div>
<?=$txt?>

</body>
</div>
</div>
</html>
 

