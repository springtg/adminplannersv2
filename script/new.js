$(document).ready(function(){
    $("#txt_new_title").focus()
});
function insertNew(){
    
    process("insert");
}
function updateNew(){
    process("update");
}
function deleteNew(id){
    var surl="./Controller/";
    
    var sdata={
            "controller":"NewController",
            "action":"delete",
            "id":id
            
    };
    showmsg("Please wait...");
    jQuery.ajax({
            type:"POST", 
            data:sdata, 
            dataType:"text", 
            url:surl, 
            success: function (data){
                if(data=="true"){
                    $(".id-head-row."+id).addClass("editting");
                    $(".id-content-row."+id).addClass("editting");
                    $(".id-content-row."+id).show();
                    $(".id-content-row."+id+" td").html("Thành Công.Tải lại trang trong 2 giây.");
                    showmsg("Thành Công.Tải lại trang trong 2 giây.");
                    setTimeout(function() {
                        window.location.href="?Unit=09_new";
                    },2000);

                }else{
                    $(".id-head-row."+id).addClass("editting");
                    $(".id-content-row."+id).addClass("editting");
                    $(".id-content-row."+id).show();
                    $(".id-content-row."+id+" td").html(data);
                    showmsg(data);
                }

            },
            error: function (xhr, ajaxOptions, thrownError){
                    $(".id-content-row."+id).show();
                    $(".id-head-row."+id).addClass("editting");
                    $(".id-content-row."+id).addClass("editting");
                    $(".id-content-row."+id+" td").html("<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+thrownError);
                    showmsg("<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+thrownError)
            }
    });

}
function restoreNew(id){
    var surl="./Controller/";
    
    var sdata={
            "controller":"NewController",
            "action":"restore",
            "id":id
            
    };
    showmsg("Please wait...");
    jQuery.ajax({
            type:"POST", 
            data:sdata, 
            dataType:"text", 
            url:surl, 
            success: function (data){
                if(data=="true"){
                    $(".id-head-row."+id).addClass("editting");
                    $(".id-content-row."+id).addClass("editting");
                    $(".id-content-row."+id).show();
                    $(".id-content-row."+id+" td").html("Thành Công.Tải lại trang trong 2 giây.");
                    showmsg("Thành Công.Tải lại trang trong 2 giây.");
                    setTimeout(function() {
                        window.location.href="?Unit=09_new";
                    },2000);

                }else{
                    $(".id-head-row."+id).addClass("editting");
                    $(".id-content-row."+id).addClass("editting");
                    $(".id-content-row."+id).show();
                    $(".id-content-row."+id+" td").html(data);
                    showmsg(data);
                }

            },
            error: function (xhr, ajaxOptions, thrownError){
                    $(".id-content-row."+id).show();
                    $(".id-head-row."+id).addClass("editting");
                    $(".id-content-row."+id).addClass("editting");
                    $(".id-content-row."+id+" td").html("<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+thrownError);
                    showmsg("<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+thrownError);
            }
    });
}
function statusNew(id,status){
    var surl="./Controller/";
    
    var sdata={
            "controller":"NewController",
            "action":"changestatus",
            "id":id,
            "status":status
            
    };
    showmsg("Please wait...");
    jQuery.ajax({
            type:"POST", 
            data:sdata, 
            dataType:"text", 
            url:surl, 
            success: function (data){
                if(data=="true"){
                    $(".id-head-row."+id).addClass("editting");
                    $(".id-content-row."+id).addClass("editting");
                    $(".id-content-row."+id).show();
                    $(".id-content-row."+id+" td").html("Thành Công.Tải lại trang trong 2 giây.");
                    showmsg("Thành Công.Tải lại trang trong 2 giây.");
                    setTimeout(function() {
                        window.location.href="?Unit=09_New";
                    },2000);

                }else{
                    $(".id-head-row."+id).addClass("editting");
                    $(".id-content-row."+id).addClass("editting");
                    $(".id-content-row."+id).show();
                    $(".id-content-row."+id+" td").html(data);
                    showmsg(data);
                    
                }

            },
            error: function (xhr, ajaxOptions, thrownError){
                    $(".id-content-row."+id).show();
                    $(".id-head-row."+id).addClass("editting");
                    $(".id-content-row."+id).addClass("editting");
                    $(".id-content-row."+id+" td").html("<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+thrownError);
                    showmsg("<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+thrownError);
            }
    });
}
function process(action){
            
    if(!_FcheckFilled($("#txt_new_title").val())){$("#txt_new_title").focus();return;}
    if(!_FcheckFilled($("#txt_new_brief").val())){$("#txt_new_brief").focus();return;}
    if(!_FcheckFilled(tinyMCE.get('txt_new_content').getContent())){tinyMCE.get('txt_new_content').focus();return;}
    
    var surl="./Controller/";
    
    var sdata={
            "controller":"NewController",
            "action":action,
            "id":$("#txt_new_id").val(),
            "category":$("#cbx_new_category").val(),
            "image":$("#txt_new_image").val(),
            "title":$("#txt_new_title").val(),
            "brief":$("#txt_new_brief").val(),
            "des":tinyMCE.get('txt_new_content').getContent(),
            "second_title":$("#txt_new_title_second").val(),
            "small_image":$("#txt_new_small_image").val()

    };
    $(".new_notice").html("Đợi tý. Đang xử lý.");
    showmsg("Đợi tý. Đang xử lý.");
    jQuery.ajax({
            type:"POST", 
            data:sdata, 
            dataType:"text", 
            url:surl, 
            success: function (data){
                if(data=="true"){
                    $(".new_notice").html("Thành Công.Tải lại trang trong 2 giây.");
                    showmsg("Thành Công.Tải lại trang trong 2 giây.");
                    setTimeout(function() {
                        window.location.href="?Unit=09_New";
                    },2000);

                }else{
                    $(".new_notice").html(data);
                    showmsg(data);
                }

            },
            error: function (xhr, ajaxOptions, thrownError){
                    $(".new_notice").html("<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+thrownError);
                    showmsg("<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+thrownError);
            }
    });

}