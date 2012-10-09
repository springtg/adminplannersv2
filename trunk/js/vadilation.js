/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


var d = document;

// ham chinh checkform

// xac nhan gui
function Fconfirm(){
var agree=confirm("Th척ng tin h沼즤 l沼� B梳죒 c처 mu沼몁 ti梳퓈 t沼쩭 휃훱ng k첵 kh척ng?");
if (agree)
    return true ;
else
    return false ;
}
function LTrim( value ) {

	var re = /\s*((\S+\s*)*)/;
	return value.replace(re, "$1");

}

// Removes ending whitespaces
function RTrim( value ) {

	var re = /((\s*\S+)*)\s*/;
	return value.replace(re, "$1");

}

// Removes leading and ending whitespaces
function Trim( value ) {

	return LTrim(RTrim(value));

}
// kiem tra dien chua
function FcheckFilled(n,v){
if(Trim(v)==""){ alert(n+" ph梳즜 휃튼沼즓 nh梳춑!");return false; }
else { return true; }
}
function _FcheckFilled(v){
if(Trim(v)==""){return false; }
else { return true; }
}
//kiem tra dien chua va khac cai gi do
function __FcheckFilled(v,vv){
if(Trim(v)=="" || Trim(v)==Trim(vv)){return false; }
else { return true; }
}
// kiem tra so ki tu toi thieu
function FcheckMinLength(n,v,num){
if(v.length<num){ alert("S沼�k첵 t沼�챠t nh梳쩿 c沼쬪 "+n+" l횪 "+num+" k챠 t沼�");return false; }
else { return true; }
}
function _FcheckMinLength(v,num){
if(v.length<num){return false; }
else { return true; }
}
// kiem tra so ki tu toi da
function FcheckMaxLength(n,v,num){
if(v.length>num){ alert("S沼�k첵 t沼�nhi沼걏 nh梳쩿 c沼쬪 "+n+" l횪 "+num+" k챠 t沼�");return false; }
else { return true; }
}
function _FcheckMaxLength(v,num){
if(v.length>num){return false; }
else { return true; }
}
// kiem tra la so hay khong
function FcheckNumber(n,v){
if((isNaN(v))||(v=="")){ alert(n+" ph梳즜 l횪 s沼�");return false; }
else { return true; }
}
function _FcheckNumber(v){
if((isNaN(v))||(v=="")){return false; }
else { return true; }
}
// kiem tra so ki tu toi da va cho biet so ki tu bi lo
function FcheckChars(n,v,num){
if(v.length>num){ alert("S沼�k챠 t沼�t沼멼 휃a c沼쬪 "+n+" l횪 "+num+" k챠 tu!\n"+(v.length-num)+" k첵 t沼�b沼�lo梳죍!");return false; }
else { return true; }
}
function _FcheckChars(v,num){
if(v.length>num){return false; }
else { return true; }
}
// kiem tra email hop le
function FcheckEmail(n,v){
var a=0
var p=0
for(var i=1;i<v.length;i++){
if(!v.charAt(i))return false
else if(v.charAt(i)=='@'){a++;if(v.charAt(i+1)==''){ alert(n+" kh척ng h?p l?!");return false; }}
else   if(v.charAt(i)=='.'){p++;if(v.charAt(i+1)==''||v.charAt(i+1)=='@'||v.charAt(i-1)=='@'){  alert(n+" kh척ng h沼즤 l沼�");return false; }}
}
if(a==1&&p){ return true; }
else { alert(n+" kh척ng h沼즤 l沼�");return false; }
}
function _FcheckEmail(v){
var a=0
var p=0
for(var i=1;i<v.length;i++){
if(!v.charAt(i))return false
else if(v.charAt(i)=='@'){a++;if(v.charAt(i+1)==''){ return false; }}
else   if(v.charAt(i)=='.'){p++;if(v.charAt(i+1)==''||v.charAt(i+1)=='@'||v.charAt(i-1)=='@'){ return false; }}
}
if(a==1&&p){ return true; }
else { return false; }
}
// kiem tra radio button da duoc chon chua
function FcheckRadio(n,v){
var r = false;
var i;
for (i = 0;  i < v.length;  i++){
   if (v.checked)
       r = true;
 }
if (!r){ alert("Ch沼뛫 gi찼 tr沼�cho "+n+"!");return (false); }
else { return true; }
}
function _FcheckRadio(v){
var r = false;
var i;
for (i = 0;  i < v.length;  i++){
   if (v.checked)
       r = true;
 }
if (!r){return (false); }
else { return true; }
}
// kiem tra dropdown da duoc chon gia tri chua
function FcheckDropOne(n,v){
if(v.selectedIndex<=0){ alert("H찾y ch沼뛫 gi찼 tri cho "+n+"!");return false; }
else { return true; }
}
function _FcheckDropOne(v){
if(v.selectedIndex<=0){return false; }
else { return true; }
}
// kiem tra dropdown co so lua chon trong khoang (mi,ma) hay khong
function FcheckDropMultiple(n,v,mi,ma){
var sel = 0;
 var i;
 for (i = 0;  i < v.length;  i++){ if (v.options.selected) sel++; }

if(mi>0){
if (sel < mi) { alert("횒t nhat l횪 "+mi+" chon lua cho "+n+"!");return false; }
}
if(ma>0){
 if (sel > ma) { alert("Nhieu nhat l횪 "+ma+" chon lua cho "+n+"!");return false; }
}
 return true;
}
function _FcheckDropMultiple(v,mi,ma){
var sel = 0;
 var i;
 for (i = 0;  i < v.length;  i++){ if (v.options.selected) sel++; }

if(mi>0){
if (sel < mi) {return false; }
}
if(ma>0){
 if (sel > ma) {return false; }
}
 return true;
}
// kiem tra checkbox co so box duoc check co nam trong khoang (mi,ma) hay khong
function FcheckBoxes(n,v,mi,ma){
 var sel = 0;
var i;
 for (i = 0;  i < v.length;  i++){ if (v[i].checked==true) sel++; }

if(mi>0){
	if (sel < mi) { alert("횒t nh梳쩿 l횪 "+mi+" ch沼뛫 l沼켥 cho "+n+"!");return false; }
	}
	if(ma>0){
	 if (sel > ma) { alert("Nhi沼걏 nh梳쩿 l횪 "+ma+" ch沼뛫 l沼켥 cho "+n+"!");return false; }
	}
 	return true;
}
function _FcheckBoxes(v,mi,ma){
 var sel = 0;
var i;
 for (i = 0;  i < v.length;  i++){ if (v[i].checked==true) sel++; }

if(mi>0){
	if (sel < mi) {return false; }
	}
	if(ma>0){
	 if (sel > ma) {return false; }
	}
 	return true;
}

// kiem tra v1 va v2 co phai la khong giong hay khong
function FcheckNotLike(n1,n2,v1,v2){
if (v1==v2)
{ alert(n1 + " gi沼몁g " + n2 + "!"); return false; }
return true
}
function _FcheckNotLike(v1,v2){
if (v1==v2)
{return false; }
return true
}
// kiem tra v1 va v2 co phai la giong hay khong
function FcheckLike(n1,n2,v1,v2){
if (v1!=v2)
{ alert(n1 + " kh척ng gi沼몁g " + n2 + "!"); return false; }
return true
}
function _FcheckLike(v1,v2){
if (v1!=v2)
{return false; }
return true
}

function _utf8_encode(string){
    string = string.replace(/\r\n/g,"\n");
    var utftext = "";

    for (var n = 0; n < string.length; n++) {

            var c = string.charCodeAt(n);

            if (c < 128) {
                    utftext += String.fromCharCode(c);
            }
            else if((c > 127) && (c < 2048)) {
                    utftext += String.fromCharCode((c >> 6) | 192);
                    utftext += String.fromCharCode((c & 63) | 128);
            }
            else {
                    utftext += String.fromCharCode((c >> 12) | 224);
                    utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                    utftext += String.fromCharCode((c & 63) | 128);
            }

    }

    return utftext;
}