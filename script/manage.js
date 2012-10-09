var base_url="http://localhost/ngaokiem_t7/";
var table="product";
$(document).ready(function(){
    
    product_reload("all");
    product_reload("public");
    product_reload("private");
    product_reload("trash");
    if(window.location.href.indexOf("#")>0){
        var parm = window.location.href.replace(/^.*#/, '');
        $(".goog-tab-selected").removeClass("goog-tab-selected");
        $(".id-detail-dialog-"+parm+"-tab").addClass("goog-tab-selected");
        $(".detail-dialog-tab-content").hide();
        $('.'+$(".id-detail-dialog-"+parm+"-tab").attr("tabcontent")).show();
    }
    $(".detail-dialog-tab.goog-tab,.nivtab").click(function(){
        $(".goog-tab-selected").removeClass("goog-tab-selected");
        if($(this).attr("class").indexOf("detail-dialog-tab")>0)
            $(this).addClass("goog-tab-selected");
        else
            $("."+$(this).attr("tabactive")).addClass("goog-tab-selected");
        $(".detail-dialog-tab-content").hide();
        $('.'+$(this).attr("tabcontent")).show();
    });
    $("#txt_q").keypress(function(event) {
        if ( event.which == 13 ) {
            product_reload("all");
            product_reload("public");
            product_reload("private");
            product_reload("trash");
        }
    });
});

function product_reload(type){
    var groupby,sdata;
    if($("#id-config-"+type).length){
        $config=JSON.parse($("#id-config-"+type).html());
        var groupby=$config.group;
        var sdata={
                "config":JSON.stringify($config),
                "q":$("#txt_q").val()
        };
    }else{
        groupby="none";
        sdata={
                
        };
    }
    var surl=base_url+"admin-planners/home/getlist/"+table+"/"+type+"/"+groupby+"//";
    //$(".id-product-"+type).load(surl);
    jQuery.ajax({
            type:"POST", 
            data:sdata, 
            dataType:"text", 
            url:surl, 
            success: function (data){
                $(".id-product-"+type).html(data);
            },
            error: function (xhr, ajaxOptions, thrownError){
                showmsg("<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+thrownError);
            }
    });
}
function product_groupby(type,groupby){
    $config=JSON.parse($("#id-config-"+type).html());
    if($config.group!=groupby){
        $config.group=groupby;
        $config.sort="DESC";
    }else{
        if($config.sort=="DESC")
            $config.sort="ASC";
        else if ($config.sort=="ASC"){
            $config.sort="";
            $config.group='none';
        }else
            $config.sort="DESC";
    }
    $("#id-config-"+type).html((JSON.stringify($config)));
    product_reload(type);
}
function show_item(id,type){
    load_product_detail(id);return;
}
function restoreproduct(id){
    if(!confirm("Bạn muốn khôi phục?")) return;
    var surl=base_url+"admin-planners/home/restore/"+table;
    var sdata={
            "id":id
    };
    jQuery.ajax({
            type:"POST", 
            data:sdata, 
            dataType:"text", 
            url:surl, 
            success: function (data){
                if(data=="true"){
                    showmsg("Đã khôi phục.",2000);

                    $(".id-head-row.trash"+id).find("td:last-child").html("Restoring...");
                    product_reload("all");
                    product_reload("public");
                    product_reload("private");
                    setTimeout(function(){
                        product_reload("trash");
                    },2000);
                }else{
                    showmsg(data);
                }

            },
            error: function (xhr, ajaxOptions, thrownError){
                    showmsg("<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+thrownError);

            }
    });
}
function deleteproduct(id){
    if(!confirm("Bạn muốn xóa?")) return;
    var surl=base_url+"admin-planners/home/delete/"+table;
    var sdata={
            "id":id
    };
    
    jQuery.ajax({
            type:"POST", 
            data:sdata, 
            dataType:"text", 
            url:surl, 
            success: function (data){
                if(data=="true"){
                    
                    $(".id-head-row.all"+id).find("td:last-child").html("Moving to trash...");
                    $(".id-head-row.public"+id).find("td:last-child").html("Moving to trash...");
                    $(".id-head-row.private"+id).find("td:last-child").html("Moving to trash...");
                    showmsg("Đã xóa.",2000);
                    product_reload("trash");
                    setTimeout(function(){
                        product_reload("all");
                        product_reload("public");
                        product_reload("private");
                    },2000);
                }else{
                    showmsg(data);
                }

            },
            error: function (xhr, ajaxOptions, thrownError){
                    showmsg("<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+thrownError);

            }
    });
}
function statusProduct(id,status){
    var surl=base_url+"admin-planners/home/changeStatus/"+table;    
    var sdata={
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
                    showmsg("Thành Công.",2000);
                    if(status=="Private"){
                        $(".id-head-row.all"+id+" .showifhover").html("<a href=\"javascript:statusProduct('"+id+"','Public');\">Private → Public</a>");
                        $(".id-head-row.all"+id+" .hideifhover").html("Private");
                        $(".id-head-row.all"+id).removeClass("cblue");
                        
                        $(".id-head-row.public"+id+" .showifhover").html("<a href=\"javascript:statusProduct('"+id+"','Public');\">Private → Public</a>");
                        $(".id-head-row.public"+id+" .hideifhover").html("Private");
                        $(".id-head-row.public"+id).removeClass("cblue");
                        $(".id-head-row.public"+id).find("td:last-child").html("Moving to private list...");
                    }else{
                        $(".id-head-row.all"+id+" .showifhover").html("<a href=\"javascript:statusProduct('"+id+"','Private');\">Public → Private</a>");
                        $(".id-head-row.all"+id+" .hideifhover").html("Public");
                        $(".id-head-row.all"+id).addClass("cblue");
                        
                        $(".id-head-row.private"+id+" .showifhover").html("<a href=\"javascript:statusProduct('"+id+"','Private');\">Public → Private</a>");
                        $(".id-head-row.private"+id+" .hideifhover").html("Public");
                        $(".id-head-row.private"+id).addClass("cblue");
                        $(".id-head-row.private"+id).find("td:last-child").html("Moving to public list...");
                    }
                    setTimeout(function(){
                        product_reload("public");
                        product_reload("private");
                    },2000);
                    

                }else{
                    showmsg(data);
                    
                }

            },
            error: function (xhr, ajaxOptions, thrownError){
                    showmsg("<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+thrownError);
            }
    });
}
function load_product_detail(id){
    if($("#txt_template_detail_id").val()==id && id!="" &&id!=null){
        $(".detail-dialog-tab-content").hide();
        $('.id-detail-dialog-detail-tab-content').show();
        return;
    }
    $(".detail-dialog-tab-content").hide();
    $('.id-detail-dialog-detail-tab-content').show();
    $('.id-product-detail').load(base_url+"admin-planners/home/detail/"+table+"/"+id);
}
function huy(){
    $('.id-detail-dialog-detail-tab-content').hide();
    $('.'+$('.detail-dialog-tab.goog-tab.goog-tab-selected').attr("tabcontent")).show();
}
function save(){
    process("insert");
}
function update(){

    process("update");
}
function process(action){

    if(!_FcheckFilled($("#txt_product_detail_name").val())){$("#txt_product_detail_name").focus();return;}
    if(!_FcheckFilled($("#txt_product_detail_start").val())){$("#txt_product_detail_start").focus();return;}
    if(!_FcheckFilled($("#txt_product_detail_end").val())){$("#txt_product_detail_end").focus();return;}


    var surl=base_url+"admin-planners/home/save/"+table;

    var sdata={
            "action":action,
            "id":$("#txt_product_detail_id").val(),
            "name":$("#txt_product_detail_name").val(),
            "game":$("#cbx_product_detail_game").val(),
            "startdate":$("#txt_product_detail_start").val(),
            "enddate":$("#txt_product_detail_end").val(),
            "type":$("#txt_product_detail_type").val(),
            "params":JSON.stringify({
                    "id":$("#txt_product_detail_id").val(),
                    "name":$("#txt_product_detail_name").val(),
                    "game":$("#cbx_product_detail_game").val(),
                    "startdate":$("#txt_product_detail_start").val(),
                    "enddate":$("#txt_product_detail_end").val(),
                    "type":$("#txt_product_detail_type").val()

            })
    };
    showmsg("Please wait...");
    jQuery.ajax({
            type:"POST", 
            data:sdata, 
            dataType:"text", 
            url:surl, 
            success: function (data){
                if(data=="true"){
                    $("#warningmsg").html("Thành Công.Tải lại trang trong 2 giây.");
                    showmsg("Thành Công.Tải lại trang trong 2 giây.",2000);
                    $("#warningmsg").show();
                    product_reload("all");
                    product_reload("public");
                    product_reload("private");
                    setTimeout(function() {
                        $("#warningmsg").hide();
                        hidemsg();
                        $('.id-detail-dialog-detail-tab-content').hide();
                        $('.'+$('.detail-dialog-tab.goog-tab.goog-tab-selected').attr("tabcontent")).show();
                    },2000);

                }else{
                    showmsg(data);
                    showerrorbox(null,data);
                    $("#warningmsg").html(data);
                    $("#warningmsg").show();
                }

            },
            error: function (xhr, ajaxOptions, thrownError){
                    showmsg("<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+thrownError);
                    $("#warningmsg").html("<b>Status</b>:"+xhr.status+"<br/><b>ThrownError</b>:"+thrownError);
                    $("#warningmsg").show();
            }
    });

}