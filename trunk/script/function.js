function hidemsg(){
    $.unblockUI();
}
function showmsg(smsg,ntimeout){
    $(".id-message-growl-content").html(smsg);
    $.blockUI({ 
        message: $("#id-message-growl"), 
        fadeIn: 700, 
        fadeOut: 700, 
        timeout: ntimeout, 
        showOverlay: false,
        centerY: false, 
        css: { 
            margin:'0 0 0 -200px',
            width: '400px', 
            top: '0px', 
            left: '50%', 
            right: '10px', 
            border: '1px solid #CCC', 
            padding: '8px 8px 9px 8px',
            background: "#FFF1A8",
            '-webkit-border-radius': '0px', 
            '-moz-border-radius': '0px', 
            color: '#000' 
        } 
    }); 
} 
function hideerrorbox(){
    $(".error-message-box").hide();
}
function showerrorbox(id,msg){
    $(".error-message-box").show();
    $(".error-message-box .id").html(id);
    $(".error-message-box .msg").html(msg);
}
function showgrowl(snotice,smsg){
    $.growlUI(snotice, smsg);
}


