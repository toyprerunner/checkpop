<!--
//***********************************************************
function check_userpass() {
e_k=event.keyCode
if ((e_k < 13) || (e_k >13 && e_k < 45) || (e_k > 45 && e_k < 48) || (e_k > 57 && e_k < 65) || (e_k > 90 && e_k < 95) || (e_k > 95 && e_k < 97) || (e_k > 122)) {
event.returnValue = false;
alert("��ͧ�繵���ѡ�������ѧ���, ����Ţ, ����ͧ���� \"-\", ����ͧ���� \"_\" ��ҹ��  \n��������ա�������ä�索Ҵ ��سҵ�Ǩ�ͺ�����Ţͧ��ҹ�ա����... \nMust be at letters(a-z, A-Z), number (0-9), \"-\" sign, \"_\" sign, but no space \nPlease enter your information again...");
}
}
//***********************************************************
function check_number() {
e_k=event.keyCode
if ((e_k < 48) || (e_k > 57)) {
event.returnValue = false;
alert("��ͧ�繵���Ţ��ҹ�� ��سҵ�Ǩ�ͺ�����Ţͧ��ҹ�ա����...\nMust be at Number Please enter your information again...");
}
}   
//***********************************************************
function idcardinput(obj)
{
var tt = new String("");
var nm = new String("");
tt = obj.value;

nm = obj.id;
nm = nm.slice(0,nm.length - 1) + (parseInt(nm.slice(nm.length - 1,nm.length))+1);

if (tt.length  == obj.maxLength)
{
try
{
document.all.item(nm).focus();
document.all.item(nm).select();

}
catch(ex)
{}
}
}
//***********************************************************
function numofdate(dayget)
{
	var i;
	document.write("<SELECT NAME="+dayget+" SIZE='1' CLASS='TopMenuBarRight'>");
	document.write("<OPTION VALUE=0>-�ѹ���-</OPTION>");
	for(i=1;i<=31;i++)
	{
		document.write("<OPTION VALUE="+i+">"+i+"</OPTION>");
	}
	document.write("</SELECT> ")
	
}
//*********************************************************
function numofmonth(monthget)
{
	document.write("<SELECT NAME="+monthget+" SIZE=1 CLASS=TopMenuBarRight>");
	document.write("<OPTION VALUE=0>-��͹-</OPTION>");
	document.write("<OPTION VALUE=1>���Ҥ�</OPTION><OPTION VALUE=2>����Ҿѹ��</OPTION>");
	document.write("<OPTION VALUE=3>�չҤ�</OPTION><OPTION VALUE=4>����¹</OPTION>");
	document.write("<OPTION VALUE=5>����Ҥ�</OPTION><OPTION VALUE=6>�Զع�¹</OPTION>");
	document.write("<OPTION VALUE=7>�á�Ҥ�</OPTION><OPTION VALUE=8>�ԧ�Ҥ�</OPTION>");
	document.write("<OPTION VALUE=9>�ѹ��¹</OPTION><OPTION VALUE=10>���Ҥ�</OPTION>");
	document.write("<OPTION VALUE=11>��Ȩԡ�¹</OPTION><OPTION VALUE=12>�ѹ�Ҥ�</OPTION>");
	document.write("</SELECT> ");
}
//***********************************************************
function numofyear(yearget,minus)
{
	var i,start,end;
	CurrentDate=new Date();
	start=CurrentDate.getYear()+543;
	end=start-minus;
	if(minus==6)
	{	
		start=start+6;
	}

	document.write("<SELECT NAME="+yearget+" SIZE='1' CLASS='TopMenuBarRight'>");
	document.write("<OPTION VALUE=0>-��-</OPTION>");
	for(i=start;i>=end;i--)
	{
		document.write("<OPTION VALUE="+i+">"+i+"</OPTION>");
	}
	document.write("</SELECT> ")
	
}
//*********************************************************
function numofchangwat(changwatget)
{
	
	document.write("<SELECT NAME="+changwatget+" CLASS=TopMenuBarRight ID=address3>");
	document.write("<OPTION VALUE=0>-�ѧ��Ѵ-</OPTION>");
	document.write("<OPTION VALUE=1>��к��</OPTION>");
	document.write("<OPTION VALUE=2>��ا෾��ҹ��</OPTION>");
	document.write("<OPTION VALUE=3>�ҭ������</OPTION>");
	document.write("<OPTION VALUE=4>����Թ���</OPTION>");
	document.write("<OPTION VALUE=5>��ᾧྪ�</OPTION>");
	document.write("<OPTION VALUE=6>�͹��</OPTION>");
	document.write("<OPTION VALUE=7>�ѹ�����</OPTION>");
	document.write("<OPTION VALUE=8>���ԧ���</OPTION>");
	document.write("<OPTION VALUE=9>�ź���</OPTION>");
	document.write("<OPTION VALUE=10>��¹ҷ</OPTION>");
	document.write("<OPTION VALUE=11>�������</OPTION>");
	document.write(" <OPTION VALUE=12>�����</OPTION>");
	document.write("<OPTION VALUE=13>��§���</OPTION>");
	document.write("<OPTION VALUE=14>��§����</OPTION>");
	document.write("<OPTION VALUE=15>��ѧ</OPTION>");
	document.write("<OPTION VALUE=16>��Ҵ</OPTION>");
	document.write("<OPTION VALUE=17>�ҡ</OPTION>");
	document.write("<OPTION VALUE=18>��ù�¡</OPTION>");
	document.write("<OPTION VALUE=19>��û��</OPTION>");
	document.write("<OPTION VALUE=20>��þ��</OPTION>");
	document.write("<OPTION VALUE=21>����Ҫ����</OPTION>");
	document.write("<OPTION VALUE=22>�����ո����Ҫ</OPTION>");
	document.write("<OPTION VALUE=23>������ä�</OPTION>");
	document.write(" <OPTION VALUE=24>�������</OPTION>");
	document.write("<OPTION VALUE=25>��Ҹ����</OPTION>");
	document.write("<OPTION VALUE=26>��ҹ</OPTION>");
	document.write("<OPTION VALUE=27>���������</OPTION>");
	document.write("<OPTION VALUE=28>�����ҹ�</OPTION>");
	document.write("<OPTION VALUE=29>��ШǺ���բѹ��</OPTION>");
	document.write(" <OPTION VALUE=30>��Ҩչ����</OPTION>");
	document.write("<OPTION VALUE=31>�ѵ�ҹ�</OPTION>");
	document.write("<OPTION VALUE=32>��й�������ظ��</OPTION>");
	document.write("<OPTION VALUE=33>�����</OPTION>");
	document.write("<OPTION VALUE=34>�ѧ��</OPTION>");
	document.write("<OPTION VALUE=35>�ѷ�ا</OPTION>");
	document.write("<OPTION VALUE=36>�ԨԵ�</OPTION>");
	document.write("<OPTION VALUE=37>��ɳ��š</OPTION>");
	document.write("<OPTION VALUE=38>ྪú���</OPTION>");
	document.write("<OPTION VALUE=39>ྪú�ó�</OPTION>");
	document.write("<OPTION VALUE=40>���</OPTION>");
	document.write("<OPTION VALUE=41>����</OPTION>");
	document.write("<OPTION VALUE=42>�����ä��</OPTION>");
	document.write("<OPTION VALUE=43>�ء�����</OPTION>");
	document.write(" <OPTION VALUE=44>�����ͧ�͹</OPTION>");
	document.write("<OPTION VALUE=45>��ʸ�</OPTION>");
	document.write(" <OPTION VALUE=46>����</OPTION>");
	document.write("<OPTION VALUE=47>�������</OPTION>");
	document.write("<OPTION VALUE=48>�йͧ</OPTION>");
	document.write(" <OPTION VALUE=49>���ͧ</OPTION>");
	document.write("<OPTION VALUE=50>�Ҫ����</OPTION>");
	document.write("<OPTION VALUE=51>ž����</OPTION>");
	document.write("<OPTION VALUE=52>�ӻҧ</OPTION>");
	document.write("<OPTION VALUE=53>�Ӿٹ</OPTION>");
	document.write("<OPTION VALUE=54>���</OPTION>");
	document.write("<OPTION VALUE=55>�������</OPTION>");
	document.write(" <OPTION VALUE=56>ʡŹ��</OPTION>");
	document.write(" <OPTION VALUE=57>ʧ���</OPTION>");
	document.write("<OPTION VALUE=58>ʵ��</OPTION>");
	document.write("<OPTION VALUE=59>��طû�ҡ��</OPTION>");
	document.write("<OPTION VALUE=60>��ط�ʧ����</OPTION>");
	document.write("<OPTION VALUE=61>��ط��Ҥ�</OPTION>");
	document.write("<OPTION VALUE=62>������</OPTION>");
	document.write("<OPTION VALUE=63>��к���</OPTION>");
	document.write("<OPTION VALUE=64>�ԧ�����</OPTION>");
	document.write("<OPTION VALUE=65>��⢷��</OPTION>");
	document.write(" <OPTION VALUE=66>�ؾ�ó����</OPTION>");
	document.write("<OPTION VALUE=67>����ɮ��ҹ�</OPTION>");
	document.write(" <OPTION VALUE=68>���Թ���</OPTION>");
	document.write("<OPTION VALUE=69>˹ͧ���</OPTION>");
	document.write("<OPTION VALUE=70>˹ͧ�������</OPTION>");
	document.write("<OPTION VALUE=71>��ҧ�ͧ</OPTION>");
	document.write("<OPTION VALUE=72>�ӹҨ��ԭ</OPTION>");
	document.write("<OPTION VALUE=73>�شøҹ�</OPTION>");
	document.write("<OPTION VALUE=74>�صô�ɵ�</OPTION>");
	document.write("<OPTION VALUE=75>�ط�¸ҹ�</OPTION>");
	document.write("<OPTION VALUE=76>�غ��Ҫ�ҹ�</OPTION>");
	document.write("</SELECT>");
}
//*************************************************************************
function doapplication()
{
	var postal1length=new String("");
	var postal2length=new String("");
	var ttlength=new String("");
	postal1length=document.application.postal1.value;
	postal2length=document.application.postal2.value;
	ttlength=document.application.id_t_1.value+document.application.id_t_2.value+document.application.id_t_3.value+document.application.id_t_4.value+document.application.id_t_5.value;
	if(document.application.username.value==""){	alert("��سҡ�͡���� Username");	 document.application.username.focus();	}else
	if(document.application.password.value==""){	alert("��سҡ�͡ Password");	 document.application.password.focus();	}else
	if(document.application.repassword.value==""){	alert("��س��׹�ѹ Password");	 document.application.repassword.focus();	}else
	if(document.application.password.value!=document.application.repassword.value){		alert("�س��͡���ʼ�ҹ����ͧ��ͧ���ç�ѹ");	 document.application.repassword.focus();	}else
	if(document.application.startday.value=="0" || document.application.startmonth.value=="0" || document.application.startyear.value=="0"){	alert("��س��к��ѹ������ӧҹ");	 document.application.startday.focus();	}else
	if(document.application.position.value==""){	alert("��س��кص��˹觾�ѡ�ҹ");	 document.application.position.focus();	}else
	if(document.application.name.value==""){	alert("��سҡ�͡���;�ѡ�ҹ");	 document.application.name.focus();	}else
	if(document.application.sname.value==""){		alert("��سҡ�͡���ʡ��������");	 document.application.sname.focus();	}else
	if(document.application.ename.value==""){		alert("��سҡ�͡���������ѧ���");	 document.application.ename.focus();	}else
	if(document.application.esname.value==""){	alert("��سҡ�͡���ʡ�������ѧ���");	 document.application.esname.focus();	}else
	if(document.application.address1.value==""){		alert("��سҡ�͡�����ŷ������Ѩ�غѹ");	 document.application.address1.focus();	}else
	if(document.application.address2.value==""){		alert("��س��к�����ͧ͢�������Ѩ�غѹ");	 document.application.address2.focus();	}else
	if(document.application.problem.value=="0"){	alert("��س��кبѧ��Ѵ�ͧ�������Ѩ�غѹ");	 document.application.problem.focus();	}else
	if(document.application.postal1.value==""){	 	alert("��س��к�������ɳ���");	 document.application.postal1.focus();	}else
	if(document.application.address4.value==""){		alert("��سҡ�͡�����ŷ������������¹��ҹ");	 document.application.address4.focus();	}else
	if(document.application.address5.value==""){		alert("��س��к�����ͧ͢�������������¹��ҹ");	 document.application.address5.focus();	}else
	if(document.application.address6.value=="0"){	alert("��س��кبѧ��Ѵ�ͧ�������������¹��ҹ");	 document.application.address6.focus();	}else
	if(document.application.postal2.value==""){		alert("��س��к�������ɳ���");	 document.application.postal2.focus();	}else
	if(document.application.birthday.value=="0" || document.application.birthmonth.value=="0" || document.application.birthyear.value=="0"){	alert("��س��к��ѹ�Դ�ͧ��ѡ�ҹ");	 document.application.birthday.focus();	}else
	if(postal1length.length!=5){	alert("��ҹ��͡������ɳ������ú 5 ��ѡ");	document.application.postal1.focus();}else
	if(postal2length.length!=5){	alert("��ҹ��͡������ɳ������ú 5 ��ѡ");	document.application.postal2.focus();}else
	if(ttlength.length!=13){	alert("��ҹ��͡�Ţ���ѵû�ЪҪ����ú 13 ��ѡ");	document.application.id_t_1.focus();}else
	{
		document.application.submit();
	}
}
//*****************************************

//-->
