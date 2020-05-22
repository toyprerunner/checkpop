<?
$date_pp=date('d-m-Y-h-i-s');
/*$strWordFileName    ="$date_pp.doc";
 header("Content-Type: application/vnd.ms-word; name=\"$strWordFileName\"");
 header("Content-Disposition: inline; filename=\"$strWordFileName\"");
 header("Pragma: no-cache");
 */
include "include.con/Datelibrary.php";
include "include.con/config.inc.php";

   $Dlib = new DateLib();
 
function num2thai($number){
$t1 = array("ศูนย์", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
$t2 = array("เอ็ด", "ยี่", "สิบ", "ร้อย", "พัน", "หมื่น", "แสน", "ล้าน");
$zerobahtshow = 0; // ในกรณีที่มีแต่จำนวนสตางค์ เช่น 0.25 หรือ .75 จะให้แสดงคำว่า ศูนย์บาท หรือไม่ 0 = ไม่แสดง, 1 = แสดง
(string) $number;
$number = explode(".", $number);
if(!empty($number[1])){
if(strlen($number[1]) == 1){
$number[1] .= "0";
}elseif(strlen($number[1]) > 2){
if($number[1]{2} < 5){
$number[1] = substr($number[1], 0, 2);
}else{
$number[1] = $number[1]{0}.($number[1]{1}+1);
}
}
}
for($i=0; $i<count($number); $i++){
$countnum[$i] = strlen($number[$i]);
if($countnum[$i] <= 7){
$var[$i][] = $number[$i];
}else{
$loopround = ceil($countnum[$i]/6);
for($j=1; $j<=$loopround; $j++){
if($j == 1){
$slen = 0;
$elen = $countnum[$i]-(($loopround-1)*6);
}else{
$slen = $countnum[$i]-((($loopround+1)-$j)*6);
$elen = 6;
}
$var[$i][] = substr($number[$i], $slen, $elen);
}
}
$nstring[$i] = "";
for($k=0; $k<count($var[$i]); $k++){
if($k > 0) $nstring[$i] .= $t2[7];
$val = $var[$i][$k];
$tnstring = "";
$countval = strlen($val);
for($l=7; $l>=2; $l--){
if($countval >= $l){
$v = substr($val, -$l, 1);
if($v > 0){
if($l == 2 && $v == 1){
$tnstring .= $t2[($l)];
}elseif($l == 2 && $v == 2){
$tnstring .= $t2[1].$t2[($l)];
}else{
$tnstring .= $t1[$v].$t2[($l)];
}
}
}
}
if($countval >= 1){
$v = substr($val, -1, 1);
if($v > 0){
if($v == 1 && $countval > 1 && substr($val, -2, 1) > 0){
$tnstring .= $t2[0];
}else{
$tnstring .= $t1[$v];
}
}
}
$nstring[$i] .= $tnstring;
}
}
$rstring = "";
if(!empty($nstring[0]) || $zerobahtshow == 1 || empty($nstring[1])){
if($nstring[0] == "") $nstring[0] = $t1[0];
$rstring .= $nstring[0]."บาท";
}
if(count($number) == 1 || empty($nstring[1])){
$rstring .= "ถ้วน";
}else{
$rstring .= $nstring[1]."สตางค์";
}
return $rstring;
}
?>
<?
	  		$q_num9="SELECT * FROM   debt WHERE hn_id_auto='$_GET[id_auto]'";
		  	$qr99=mysql_db_query($dbname,$q_num9);
			$rs=mysql_fetch_array($qr99);

							  		$q_num999="SELECT * FROM   book_debt  WHERE b_no_ref='$rs[book_id]'";
								  	$qr9999=mysql_db_query($dbname,$q_num999);
									$rs99=mysql_fetch_array($qr9999);
?><html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 14">
<meta name=Originator content="Microsoft Word 14">
<link rel=File-List href="paypay.files/filelist.xml">
<link rel=Edit-Time-Data href="paypay.files/editdata.mso">
<!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
w\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]-->
<title>หนังสือเรียกเก็บค่ารักษาพยาบาลกรณีค้างชำระ</title>
<!--[if gte mso 9]><xml>
 <o:DocumentProperties>
  <o:Author>ACER</o:Author>
  <o:LastAuthor>KKD 2011 V.2</o:LastAuthor>
  <o:Revision>3</o:Revision>
  <o:TotalTime>116</o:TotalTime>
  <o:LastPrinted>2012-11-15T00:48:00Z</o:LastPrinted>
  <o:Created>2012-12-04T04:52:00Z</o:Created>
  <o:LastSaved>2012-12-04T06:47:00Z</o:LastSaved>
  <o:Pages>1</o:Pages>
  <o:Words>181</o:Words>
  <o:Characters>1038</o:Characters>
  <o:Lines>8</o:Lines>
  <o:Paragraphs>2</o:Paragraphs>
  <o:CharactersWithSpaces>1217</o:CharactersWithSpaces>
  <o:Version>14.00</o:Version>
 </o:DocumentProperties>
 <o:OfficeDocumentSettings>
  <o:TargetScreenSize>800x600</o:TargetScreenSize>
 </o:OfficeDocumentSettings>
</xml><![endif]-->
<link rel=themeData href="paypay.files/themedata.thmx">
<link rel=colorSchemeMapping href="paypay.files/colorschememapping.xml">
<!--[if gte mso 9]><xml>
 <w:WordDocument>
  <w:View>Print</w:View>
  <w:SpellingState>Clean</w:SpellingState>
  <w:GrammarState>Clean</w:GrammarState>
  <w:TrackMoves>false</w:TrackMoves>
  <w:TrackFormatting/>
  <w:PunctuationKerning/>
  <w:ValidateAgainstSchemas/>
  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>
  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
  <w:DoNotPromoteQF/>
  <w:LidThemeOther>EN-US</w:LidThemeOther>
  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>
  <w:LidThemeComplexScript>TH</w:LidThemeComplexScript>
  <w:Compatibility>
   <w:BreakWrappedTables/>
   <w:SnapToGridInCell/>
   <w:ApplyBreakingRules/>
   <w:WrapTextWithPunct/>
   <w:UseAsianBreakRules/>
   <w:DontGrowAutofit/>
   <w:DontUseIndentAsNumberingTabStop/>
   <w:FELineBreak11/>
   <w:WW11IndentRules/>
   <w:DontAutofitConstrainedTables/>
   <w:AutofitLikeWW11/>
   <w:HangulWidthLikeWW11/>
   <w:UseNormalStyleForList/>
   <w:DontVertAlignCellWithSp/>
   <w:DontBreakConstrainedForcedTables/>
   <w:DontVertAlignInTxbx/>
   <w:Word11KerningPairs/>
   <w:CachedColBalance/>
   <w:UseFELayout/>
  </w:Compatibility>
  <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>
  <m:mathPr>
   <m:mathFont m:val="Cambria Math"/>
   <m:brkBin m:val="before"/>
   <m:brkBinSub m:val="&#45;-"/>
   <m:smallFrac m:val="off"/>
   <m:dispDef/>
   <m:lMargin m:val="0"/>
   <m:rMargin m:val="0"/>
   <m:defJc m:val="centerGroup"/>
   <m:wrapIndent m:val="1440"/>
   <m:intLim m:val="subSup"/>
   <m:naryLim m:val="undOvr"/>
  </m:mathPr></w:WordDocument>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="false"
  DefSemiHidden="false" DefQFormat="false" LatentStyleCount="267">
  <w:LsdException Locked="false" QFormat="true" Name="Normal"/>
  <w:LsdException Locked="false" QFormat="true" Name="heading 1"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   QFormat="true" Name="heading 2"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   QFormat="true" Name="heading 3"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   QFormat="true" Name="heading 4"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   QFormat="true" Name="heading 5"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   QFormat="true" Name="heading 6"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   QFormat="true" Name="heading 7"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   QFormat="true" Name="heading 8"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   QFormat="true" Name="heading 9"/>
  <w:LsdException Locked="false" SemiHidden="true" UnhideWhenUsed="true"
   QFormat="true" Name="caption"/>
  <w:LsdException Locked="false" QFormat="true" Name="Title"/>
  <w:LsdException Locked="false" QFormat="true" Name="Subtitle"/>
  <w:LsdException Locked="false" QFormat="true" Name="Strong"/>
  <w:LsdException Locked="false" QFormat="true" Name="Emphasis"/>
  <w:LsdException Locked="false" Priority="99" SemiHidden="true"
   Name="Placeholder Text"/>
  <w:LsdException Locked="false" Priority="1" QFormat="true" Name="No Spacing"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 1"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 1"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 1"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 1"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 1"/>
  <w:LsdException Locked="false" Priority="99" SemiHidden="true" Name="Revision"/>
  <w:LsdException Locked="false" Priority="34" QFormat="true"
   Name="List Paragraph"/>
  <w:LsdException Locked="false" Priority="29" QFormat="true" Name="Quote"/>
  <w:LsdException Locked="false" Priority="30" QFormat="true"
   Name="Intense Quote"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 1"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 1"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 1"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 1"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 1"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 1"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 2"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 2"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 2"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 2"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 2"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 2"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 2"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 2"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 3"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 3"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 3"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 3"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 3"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 3"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 3"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 3"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 4"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 4"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 4"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 4"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 4"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 4"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 4"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 4"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 5"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 5"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 5"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 5"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 5"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 5"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 5"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 5"/>
  <w:LsdException Locked="false" Priority="60" Name="Light Shading Accent 6"/>
  <w:LsdException Locked="false" Priority="61" Name="Light List Accent 6"/>
  <w:LsdException Locked="false" Priority="62" Name="Light Grid Accent 6"/>
  <w:LsdException Locked="false" Priority="63" Name="Medium Shading 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="64" Name="Medium Shading 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="65" Name="Medium List 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="66" Name="Medium List 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="67" Name="Medium Grid 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="68" Name="Medium Grid 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="69" Name="Medium Grid 3 Accent 6"/>
  <w:LsdException Locked="false" Priority="70" Name="Dark List Accent 6"/>
  <w:LsdException Locked="false" Priority="71" Name="Colorful Shading Accent 6"/>
  <w:LsdException Locked="false" Priority="72" Name="Colorful List Accent 6"/>
  <w:LsdException Locked="false" Priority="73" Name="Colorful Grid Accent 6"/>
  <w:LsdException Locked="false" Priority="19" QFormat="true"
   Name="Subtle Emphasis"/>
  <w:LsdException Locked="false" Priority="21" QFormat="true"
   Name="Intense Emphasis"/>
  <w:LsdException Locked="false" Priority="31" QFormat="true"
   Name="Subtle Reference"/>
  <w:LsdException Locked="false" Priority="32" QFormat="true"
   Name="Intense Reference"/>
  <w:LsdException Locked="false" Priority="33" QFormat="true" Name="Book Title"/>
  <w:LsdException Locked="false" Priority="37" SemiHidden="true"
   UnhideWhenUsed="true" Name="Bibliography"/>
  <w:LsdException Locked="false" Priority="39" SemiHidden="true"
   UnhideWhenUsed="true" QFormat="true" Name="TOC Heading"/>
 </w:LatentStyles>
</xml><![endif]-->
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Batang;
	panose-1:2 3 6 0 0 1 1 1 1 1;
	mso-font-alt:\BC14\D0D5;
	mso-font-charset:129;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-1342176593 1775729915 48 0 524447 0;}
@font-face
	{font-family:"Angsana New";
	panose-1:2 2 6 3 5 4 5 2 3 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:16777219 0 0 0 65537 0;}
@font-face
	{font-family:"Angsana New";
	panose-1:2 2 6 3 5 4 5 2 3 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:16777219 0 0 0 65537 0;}
@font-face
	{font-family:Tahoma;
	panose-1:2 11 6 4 3 5 4 4 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:1627400839 -2147483648 8 0 66047 0;}
@font-face
	{font-family:"\@Batang";
	panose-1:2 3 6 0 0 1 1 1 1 1;
	mso-font-charset:129;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-1342176593 1775729915 48 0 524447 0;}
@font-face
	{font-family:"TH SarabunPSK";
	panose-1:2 11 5 0 4 2 0 2 0 3;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-1593835409 1342185562 0 0 65923 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	mso-bidi-font-size:14.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:Batang;
	mso-bidi-font-family:"Angsana New";
	mso-fareast-language:KO;}
a:link, span.MsoHyperlink
	{mso-style-unhide:no;
	color:blue;
	text-decoration:underline;
	text-underline:single;}
a:visited, span.MsoHyperlinkFollowed
	{mso-style-unhide:no;
	color:purple;
	mso-themecolor:followedhyperlink;
	text-decoration:underline;
	text-underline:single;}
p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
	{mso-style-unhide:no;
	mso-style-link:"ข้อความบอลลูน อักขระ";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:8.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Tahoma","sans-serif";
	mso-fareast-font-family:Batang;
	mso-bidi-font-family:"Angsana New";
	mso-fareast-language:KO;}
span.a
	{mso-style-name:"ข้อความบอลลูน อักขระ";
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:ข้อความบอลลูน;
	mso-ansi-font-size:8.0pt;
	font-family:"Tahoma","sans-serif";
	mso-ascii-font-family:Tahoma;
	mso-hansi-font-family:Tahoma;
	mso-fareast-language:KO;}
span.SpellE
	{mso-style-name:"";
	mso-spl-e:yes;}
span.GramE
	{mso-style-name:"";
	mso-gram-e:yes;}
.MsoChpDefault
	{mso-style-type:export-only;
	mso-default-props:yes;
	mso-fareast-font-family:Batang;
	mso-bidi-font-family:"Angsana New";}
@page WordSection1
	{size:595.3pt 841.9pt;
	margin:42.55pt 2.0cm 72.0pt 82.2pt;
	mso-header-margin:35.45pt;
	mso-footer-margin:35.45pt;
	mso-paper-source:0;}
div.WordSection1
	{page:WordSection1;}
-->
</style>
<!--[if gte mso 10]>
<style>
 /* Style Definitions */
 table.MsoNormalTable
	{mso-style-name:ตารางปกติ;
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-noshow:yes;
	mso-style-unhide:no;
	mso-style-parent:"";
	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
	mso-para-margin:0cm;
	mso-para-margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Times New Roman","serif";
	mso-bidi-font-family:"Angsana New";}
table.MsoTableGrid
	{mso-style-name:เส้นตาราง;
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-unhide:no;
	border:solid windowtext 1.0pt;
	mso-border-alt:solid windowtext .5pt;
	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
	mso-border-insideh:.5pt solid windowtext;
	mso-border-insidev:.5pt solid windowtext;
	mso-para-margin:0cm;
	mso-para-margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Times New Roman","serif";
	mso-bidi-font-family:"Angsana New";}
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:shapedefaults v:ext="edit" spidmax="1029"/>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <o:shapelayout v:ext="edit">
  <o:idmap v:ext="edit" data="1"/>
 </o:shapelayout></xml><![endif]-->
</head>

<body lang=EN-US link=blue vlink=purple style='tab-interval:36.0pt'>

<div class=WordSection1>

<p class=MsoNormal><!--[if gte vml 1]><v:rect id="_x0000_s1026" style='position:absolute;
 margin-left:264.3pt;margin-top:75.1pt;width:233.95pt;height:58.4pt;z-index:251657216'
 stroked="f"/><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
position:absolute;z-index:251657216;margin-left:352px;margin-top:100px;
width:316px;height:82px'>

<table cellpadding=0 cellspacing=0>
 <tr>
  <td width=316 height=82 bgcolor=white style='vertical-align:top;background:
  white'><![endif]><![if !mso]><span style='position:absolute;mso-ignore:vglayout;
  z-index:251657216'>
  <table cellpadding=0 cellspacing=0 width="100%">
   <tr>
    <td><![endif]>
    <div v:shape="_x0000_s1026" style='padding:3.6pt 7.2pt 3.6pt 7.2pt'
    class=shape>
    <p class=MsoNormal><span lang=TH style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'><span
    style='mso-spacerun:yes'>&nbsp;&nbsp; </span><span
    style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>โรงพยาบาลศรีเมืองใหม่
    <BR>&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตำบลนาคำ</span><span style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'><o:p></o:p></span></p>
    <p class=MsoNormal><span lang=TH style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'><span
    style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span>อำเภอศรีเมืองใหม่ <BR>&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จังหวัดอุบลราชธานี</span><span style='font-size:
    16.0pt;font-family:"TH SarabunPSK","sans-serif"'><o:p></o:p></span></p>
    <p class=MsoNormal><span lang=TH style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'><span
    style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span>34250<o:p></o:p></span></p>
    </div>
    <![if !mso]></td>
   </tr>
  </table>
  </span><![endif]><![if !mso & !vml]>&nbsp;<![endif]><![if !vml]></td>
 </tr>
</table>

</span><![endif]><!--[if gte vml 1]><v:rect id="_x0000_s1027" style='position:absolute;
 margin-left:-7.65pt;margin-top:75.1pt;width:127.25pt;height:31.05pt;z-index:251658240'
 stroked="f"/><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
position:absolute;z-index:251658240;margin-left:-10px;margin-top:100px;
width:173px;height:46px'>

<table cellpadding=0 cellspacing=0>
 <tr>
  <td   bgcolor=white style='vertical-align:top;background:
  white'><![endif]><![if !mso]><span style='position:absolute;mso-ignore:vglayout;
  z-index:251658240'>
  <table cellpadding=0 cellspacing=0 width="100%">
   <tr>
    <td><![endif]>
    <div v:shape="_x0000_s1027" style='padding:3.6pt 7.2pt 3.6pt 7.2pt'
    class=shape>
    <p class=MsoNormal><span lang=TH style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'>ที่&nbsp;<o:p><?=$rs99[b_no]?></o:p></span></p>
    </div>
    <![if !mso]></td>
   </tr>
  </table>
  </span><![endif]><![if !mso & !vml]>&nbsp;<![endif]><![if !vml]></td>
 </tr>
</table>

</span><![endif]><span style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;</span><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;</span><!--[if gte vml 1]><v:shapetype
 id="_x0000_t75" coordsize="21600,21600" o:spt="75" o:preferrelative="t"
 path="m@4@5l@4@11@9@11@9@5xe" filled="f" stroked="f">
 <v:stroke joinstyle="miter"/>
 <v:formulas>
  <v:f eqn="if lineDrawn pixelLineWidth 0"/>
  <v:f eqn="sum @0 1 0"/>
  <v:f eqn="sum 0 0 @1"/>
  <v:f eqn="prod @2 1 2"/>
  <v:f eqn="prod @3 21600 pixelWidth"/>
  <v:f eqn="prod @3 21600 pixelHeight"/>
  <v:f eqn="sum @0 0 1"/>
  <v:f eqn="prod @6 1 2"/>
  <v:f eqn="prod @7 21600 pixelWidth"/>
  <v:f eqn="sum @8 21600 0"/>
  <v:f eqn="prod @7 21600 pixelHeight"/>
  <v:f eqn="sum @10 21600 0"/>
 </v:formulas>
 <v:path o:extrusionok="f" gradientshapeok="t" o:connecttype="rect"/>
 <o:lock v:ext="edit" aspectratio="t"/>
</v:shapetype><v:shape id="_x0000_i1025" type="#_x0000_t75" style='width:105.75pt;
 height:106.5pt' fillcolor="window">
 <v:imagedata src="paypay.files/image001.wmz" o:title=""/>
</v:shape><![endif]--><![if !vml]><img 
src="paypay.files/image002.gif" v:shapes="_x0000_i1025"><![endif]><span
style='mso-tab-count:1'>&nbsp;&nbsp;&nbsp;&nbsp; </span><span lang=TH><span
style='mso-spacerun:yes'>&nbsp;</span></span><o:p></o:p></span></p>

<p class=MsoNormal><span lang=TH style='font-size:8.0pt;font-family:"TH SarabunPSK","sans-serif"'><span
style='mso-spacerun:yes'>&nbsp;</span></span><span style='font-size:8.0pt;
font-family:"TH SarabunPSK","sans-serif"'><o:p></o:p></span></p>

<p class=MsoNormal><span lang=TH style='font-size:8.0pt;font-family:"TH SarabunPSK","sans-serif"'><span
style='mso-spacerun:yes'>&nbsp;</span></span><span lang=TH style='font-size:
16.0pt;font-family:"TH SarabunPSK","sans-serif"'><span style='mso-tab-count:
6'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span
style='font-size:8.0pt;font-family:"TH SarabunPSK","sans-serif"'><o:p></o:p></span></p>

<p class=MsoNormal><span lang=TH style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'><o:p></o:p></span></p>

<p class=MsoNormal><span style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'><span
style='mso-spacerun:yes'>&nbsp;</span><span style='mso-tab-count:6'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span
lang=TH><span style='mso-spacerun:yes'>&nbsp; </span>
<?
$ppyear=date('d-m-Y');
$ppyear2=date('Y')+543;
function convert($number){

$txtnum1 = array('๐','๑','๒','๓','๔','๕','๖','๗','๘','๙');

$number = str_replace(",","",$number);
$number = str_replace(" ","",$number);
$number = explode(".",$number);


if(sizeof($number)>2)
{
return 'ทศนิยมหลายตัวนะจ๊ะ';
exit;
}

$strlen = strlen($number[0]);
$convert = '';

for($i=0;$i<$strlen;$i++)

{

$n = substr($number[0], $i,1);
if($n!=0)
{

if($i==($strlen-2) AND $n==1) { $convert .= ''; }
else{ $convert .= $txtnum1[$n]; }

}	
}

$convert .= '.';

if($number[1]=='0' OR $number[1]=='00' OR $number[1]=='') 
{ $convert .= ''; }
else

{ $strlen = strlen($number[1]);
for($i=0;$i<$strlen;$i++)
{
$n = substr($number[1], $i,1);
if($n!=0)
{ $convert .= $txtnum1[$n]; }
}
} 
return $convert;

}

//$numx = $numc;

//echo $x.' => '.convert($ppyear2);
?><BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<? echo "".$Dlib->MadeDay2($ppyear)."&nbsp;&nbsp;".convert($ppyear2)."";?>

<span
style='mso-spacerun:yes'>&nbsp; </span></span><o:p></o:p></span></p>
 
 

<p class=MsoNormal><span lang=TH style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'>เรื่อง<span
style='mso-tab-count:1'>&nbsp;&nbsp;&nbsp;&nbsp; </span>ขอเรียกเก็บค่ารักษาพยาบาลกรณี
ค้างชำระ <span style='mso-spacerun:yes'>&nbsp;</span><br style='mso-special-character:
line-break'>
<![if !supportLineBreakNewLine]><br style='mso-special-character:line-break'>
<![endif]></span> 

<p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'><span
lang=TH style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'>เรียน&nbsp;&nbsp;&nbsp;&nbsp; <?=$rs[dept_name]?><span
style='mso-tab-count:1'></span></span><span
style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'><o:p></o:p></span></p>

<p class=MsoNormal><span style='font-size:5.0pt;font-family:"TH SarabunPSK","sans-serif"'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-indent:72.0pt'><span lang=TH style='font-size:
16.0pt;font-family:"TH SarabunPSK","sans-serif"'>ตามที่<span
style='mso-spacerun:yes'>&nbsp;&nbsp;
</span>ได้รับการรักษาพยาบาลโรงพยาบาลศรีเมืองใหม่ อำเภอศรีเมืองใหม่
จังหวัดอุบลราชธานี และค้างชำระค่ารักษาพยาบาล เป็นเงินทั้งสิ้น <?=number_format($rs[dept_price_balance])?> บาท (&nbsp;<?=num2thai($rs[dept_price_balance])?>&nbsp;)<span
style='mso-spacerun:yes'>&nbsp; </span>ตามหนังสือสภาพหนี้ เลขที่&nbsp;<?=$rs99[b_no_ref]?>&nbsp;&nbsp;ลงวันที่&nbsp; <?=$Dlib->MadeDay($rs[debt_date])?>&nbsp;&nbsp;<span
style='mso-spacerun:yes'>&nbsp; </span>ตามรายละเอียดทราบแล้วนั้นในการนี้ศูนย์สิทธิบัตร
โรงพยาบาลศรีเมืองใหม่ ใครขอแจ้งเตือนวันครบกำหนดนัดชำระหนี้ ซึ่งกำหนดไว้
เป็นวันที่<span style='mso-spacerun:yes'>&nbsp;<?=$Dlib->MadeDay($rs[date_pay])?>&nbsp;&nbsp;</span>ซึ่งล่วงเลยวัน/เดือน/ปี
ที่กำหนดไว้ท่านยังมิได้รับ ชำระหนี้ค่ารักษาพยาบาล โรงพยาบาลจำเป็นจะต้องมีการดำเนินการตามมาตรการที่ได้แจ้งตามรายละเอียด
ในหนังสือยอมรับสภาพหนี้โดยเคร่งครัดต่อไป</span><span style='font-size:8.0pt;
font-family:"TH SarabunPSK","sans-serif"'><o:p></o:p></span></p>

<p class=MsoNormal><span style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=TH style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'><span
style='mso-spacerun:yes'>&nbsp;</span><span style='mso-tab-count:2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>จึงเรียนมาเพื่อโปรดทราบและดำเนินการชำระหนี้ต่อไป
ต้องขออภัยมา ณ ที่นี้ด้วย หากท่านได้ชำระ ค่าบริการทางการแพทย์ไปก่อนหน้านี้แล้ว<br
style='mso-special-character:line-break'>
<![if !supportLineBreakNewLine]><br style='mso-special-character:line-break'>
<![endif]></span><span style='font-size:8.0pt;font-family:"TH SarabunPSK","sans-serif"'><o:p></o:p></span></p>

<p class=MsoNormal><![if !vml]><span style='mso-ignore:vglayout;position:
absolute;z-index:251660284;margin-left:330px;margin-top:28px;width:82px;
height:91px'>

<table cellpadding=0 cellspacing=0>
 <tr>
  <td  bgcolor=white style='vertical-align:top;background:
  white'><![endif]><![if !mso]><span style='position:absolute;mso-ignore:vglayout;
  z-index:251660284'>
  <table cellpadding=0 cellspacing=0 width="100%">
   <tr>
    <td><![endif]>
    <div v:shape="กล่องข้อความ_x0020_2" style='padding:3.6pt 7.2pt 3.6pt 7.2pt'
    class=shape>
    <p class=MsoNormal><!--[if gte vml 1]><v:shape id="_x0000_i1026" type="#_x0000_t75"
     style='width:44.25pt;height:57.75pt'>
     <v:imagedata src="paypay.files/image003.gif" o:title="2555-12-04 13-38-04_0045"/>
    </v:shape><![endif]--><![if !vml]><img
    src="paypay.files/image004.gif" v:shapes="_x0000_i1026"><![endif]></p>
    </div>
    <![if !mso]></td>
   </tr>
  </table>
  </span><![endif]><![if !mso & !vml]>&nbsp;<![endif]><![if !vml]></td>
 </tr>
</table>

</span><![endif]><span lang=TH style='font-size:8.0pt;font-family:"TH SarabunPSK","sans-serif"'><br>
</span><span lang=TH style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'><span
style='mso-tab-count:6'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span
style='mso-spacerun:yes'>&nbsp;</span><span
style='mso-spacerun:yes'>&nbsp;&nbsp; </span><span
style='mso-spacerun:yes'>&nbsp;</span>ขอแสดงความนับถือ</span><span
style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'><o:p></o:p></span></p>

<p class=MsoNormal><span style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=TH style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'><span
style='mso-tab-count:5'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span
style='mso-spacerun:yes'>&nbsp;&nbsp; </span><span
style='mso-spacerun:yes'>&nbsp;</span></span><span style='font-size:16.0pt;
font-family:"TH SarabunPSK","sans-serif"'><o:p></o:p></span></p>

<p class=MsoNormal><span lang=TH style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'><span
style='mso-tab-count:6'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span
style='mso-spacerun:yes'>&nbsp;</span>( นายไพศาล<span
style='mso-spacerun:yes'>&nbsp; </span>แก้วนพรัตน์ )</span><span
style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'><o:p></o:p></span></p>

<p class=MsoNormal><span lang=TH style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'><span
style='mso-tab-count:4'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span
style='mso-spacerun:yes'>&nbsp;</span><span style='mso-tab-count:1'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>ผู้อำนวยการโรงพยาบาลศรีเมืองใหม่<o:p></o:p></span></p>

 



<p class=MsoNormal><span lang=TH style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'>งานประกันสุขภาพ<o:p></o:p></span></p>

<p class=MsoNormal><span lang=TH style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'>โทร
๐ ๔๕-๓๙๙๑๘๓-๔ ต่อ ๑๒๖<br>
โทรศัพท์มือถือ ๐๘๖-๒๕๘๕๑๖๙<o:p></o:p></span></p>

<p class=MsoNormal><span lang=TH style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'>ผู้ประสาน
นางสาวประดิษฐ์<span style='mso-spacerun:yes'>&nbsp; </span>นาม<span
class=SpellE>วงษา</span></span><span style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'><o:p></o:p></span></p>
 
<p class=MsoNormal><span style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'><o:p>&nbsp;</o:p></span></p>
<p class=MsoNormal align=center style='text-align:center'><span
style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'>“<span
class=GramE><span lang=TH>นครแห่งธรรม<span style='mso-spacerun:yes'>&nbsp;
</span>นครแห่งเทียน</span></span><span lang=TH> นครแห่งการพัฒนา<span
style='mso-spacerun:yes'>&nbsp; </span>นครแห่งความฮักแพง</span>”<o:p></o:p></span></p>

<p class=MsoNormal align=center style='text-align:center'><span lang=TH
style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'>ปี ๒๕๕๕<span
style='mso-spacerun:yes'>&nbsp; </span>ปีแห่งการเร่งรัดการพัฒนาอุบลราชธานี</span><span
style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'><o:p></o:p></span></p>

<p class=MsoNormal align=center style='text-align:center'><span lang=TH
style='font-size:16.0pt;font-family:"TH SarabunPSK","sans-serif"'>ปี
แห่งการละเลิกเหล้า และ บุหรี่</span><span style='font-size:16.0pt;font-family:
"TH SarabunPSK","sans-serif"'><o:p></o:p></span></p>

</div>

</body>

</html>
