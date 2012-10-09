$(document).ready(function(){
    
});
function insertCategory(){
    
    process("insert");
}
function updateCategory(){
    process("update");
}
function deleteCategory(id){
    var surl="./Controller/";
    
    var sdata={
            "controller":"CategoryController",
            "action":"delete",
            "id":id
            
    };
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
                    setTimeout(function() {
                        window.location.href="?Unit=07_category";
                    },2000);

                }else{
                    $(".id-head-row."+id).addClass("editting");
                    $(".id-content-row."+id).addClass("editting");
                    $(".id-content-row."+id).show();
                    $(".id-content-row."+id+" td").html(data);
                    
                }

            },
            error: function (xhr, ajaxOptions, thrownError){
                    $(".id-content-row."+id).show();
                    $(".id-head-row."+id).addClass("editting");
                    $(".id-content-row."+id).addClass("editting");
                    $(".id-content-row."+id+" td").html("<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+thrownError);
                    
            }
    });

}
function restoreCategory(id){
    var surl="./Controller/";
    
    var sdata={
            "controller":"CategoryController",
            "action":"restore",
            "id":id
            
    };
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
                    setTimeout(function() {
                        window.location.href="?Unit=07_category";
                    },2000);

                }else{
                    $(".id-head-row."+id).addClass("editting");
                    $(".id-content-row."+id).addClass("editting");
                    $(".id-content-row."+id).show();
                    $(".id-content-row."+id+" td").html(data);
                    
                }

            },
            error: function (xhr, ajaxOptions, thrownError){
                    $(".id-content-row."+id).show();
                    $(".id-head-row."+id).addClass("editting");
                    $(".id-content-row."+id).addClass("editting");
                    $(".id-content-row."+id+" td").html("<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+thrownError);
                    
            }
    });
}
function statusCategory(id,status){
    var surl="./Controller/";
    
    var sdata={
            "controller":"CategoryController",
            "action":"changestatus",
            "id":id,
            "status":status
            
    };
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
                    setTimeout(function() {
                        window.location.href="?Unit=07_category";
                    },2000);

                }else{
                    $(".id-head-row."+id).addClass("editting");
                    $(".id-content-row."+id).addClass("editting");
                    $(".id-content-row."+id).show();
                    $(".id-content-row."+id+" td").html(data);
                    
                }

            },
            error: function (xhr, ajaxOptions, thrownError){
                    $(".id-content-row."+id).show();
                    $(".id-head-row."+id).addClass("editting");
                    $(".id-content-row."+id).addClass("editting");
                    $(".id-content-row."+id+" td").html("<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+thrownError);
                    
            }
    });
}
function process(action){
            
    if(!_FcheckFilled($("#txt_category_name").val())){$("#txt_category_name").focus();return;}
    var surl="./Controller/";
    
    var sdata={
            "controller":"CategoryController",
            "action":action,
            "id":$("#txt_category_id").val(),
            "name":$("#txt_category_name").val(),
            "type":$("#cbx_category_type").val()
    };
    $(".category_notice").html("Đợi tý. Đang xử lý.");
    jQuery.ajax({
            type:"POST", 
            data:sdata, 
            dataType:"text", 
            url:surl, 
            success: function (data){
                if(data=="true"){
                    $(".category_notice").html("Thành Công.Tải lại trang trong 2 giây.");
                    setTimeout(function() {
                        window.location.href="?Unit=07_category";
                    },2000);

                }else{
                    $(".category_notice").html(data);
                    
                }

            },
            error: function (xhr, ajaxOptions, thrownError){
                    $(".category_notice").html("<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+thrownError);
                    
            }
    });

}