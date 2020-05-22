function doSave(frm){
var isEmpty = false;
for(var i3=0;i3<frm.elements.length;i3++){


if (frm.elements[i3].id == 'frmchk[]'){
	if (frm.elements[i3].value == "") {
	isEmpty = true;
	break;
		} 
	}
}
if(isEmpty){
alert("กรุณากรอกข้อมูลให้ครบทุกช่อง..\n ");
frm.elements[i3].focus() ;
return false;
}else{
return true; 
}
}
 

function doSave2(frm){
 

frm.elements[0].focus() ;

}
